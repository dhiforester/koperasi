<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    include "../../_Config/SettingEmail.php";
    session_start();
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    $Datetime_generate=date('Y-m-d H:i:s');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi nama tidak boleh kosong
    if(empty($_POST['nama_akses'])){
        echo '<small class="text-danger">Nama tidak boleh kosong</small>';
    }else{
        //Validasi kontak tidak boleh kosong
        if(empty($_POST['kontak_akses'])){
            echo '<small class="text-danger">Kontak tidak boleh kosong</small>';
        }else{
            //Validasi kontak tidak boleh lebih dari 20 karakter
            $JumlahKarakterKontak=strlen($_POST['kontak_akses']);
            if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak_akses'])){
                echo '<small class="text-danger">Kontak terdiri dari 6-20 karakter numerik</small>';
            }else{
                //Validasi kontak tidak boleh duplikat
                $kontak_akses=$_POST['kontak_akses'];
                $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE kontak='$kontak_akses'"));
                if(!empty($ValidasiKontakDuplikat)){
                    echo '<small class="text-danger">Nomor kontak tersebut sudah terdaftar</small>';
                }else{
                    //Validasi email tidak boleh kosong
                    if(empty($_POST['email_akses'])){
                        echo '<small class="text-danger">Email tidak boleh kosong</small>';
                    }else{
                        //Validasi email duplikat
                        $email_akses=$_POST['email_akses'];
                        $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE email='$email_akses'"));
                        if(!empty($ValidasiEmailDuplikat)){
                            echo '<small class="text-danger">Email sudah digunakan</small>';
                        }else{
                            //Validasi Password tidak boleh kosong
                            if(empty($_POST['password1'])){
                                echo '<small class="text-danger">Password tidak boleh kosong</small>';
                            }else{
                                if($_POST['password1']!==$_POST['password2']){
                                    echo '<small class="text-danger">Password Tidak sama</small>';
                                }else{
                                    //Validasi jumlah dan jenis karakter password
                                    $JumlahKarakterPassword=strlen($_POST['password1']);
                                    if($JumlahKarakterPassword>20||$JumlahKarakterPassword<6||!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password1'])){
                                        echo '<small class="text-danger">Password can only have 6-20 numeric characters</small>';
                                    }else{
                                        //kondisi apabila akses kosong
                                        $akses="User";
                                        if(empty($akses)){
                                            echo '<small class="text-danger">Level akses tidak boleh kosong</small>';
                                        }else{
                                            $id_unit_kerja=0;
                                            //Variabel Lainnya
                                            $nama_akses=$_POST['nama_akses'];
                                            $kontak_akses=$_POST['kontak_akses'];
                                            $email_akses=$_POST['email_akses'];
                                            $status="Register";
                                            $password1=$_POST['password1'];
                                            $password1=MD5($password1);
                                            //Mencari nilai id_akses terbesar
                                            $QryMaxIdAkses=mysqli_query($Conn, "SELECT max(id_akses_anggota) as id_akses_anggota FROM akses_anggota")or die(mysqli_error($Conn));
                                            while($HasilNilai=mysqli_fetch_array($QryMaxIdAkses)){
                                                $id_akses_max=$HasilNilai['id_akses_anggota'];
                                            }
                                            $id_akses_anggota=$id_akses_max+1;
                                            //Membuat Token Validasi
                                            $TokenValidasi=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                            //Apakah id_akses sudah ada token?
                                            $CekToken=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_validasi WHERE id_akses_anggota='$id_akses_anggota'"));
                                            if(empty($CekToken)){
                                                //Insert Token
                                                $EntryTokenAkses="INSERT INTO akses_validasi (
                                                    id_akses_anggota,
                                                    token,
                                                    datetime
                                                ) VALUES (
                                                    '$id_akses_anggota',
                                                    '$TokenValidasi',
                                                    '$Datetime_generate'
                                                )";
                                                $GenerateToken=mysqli_query($Conn, $EntryTokenAkses);
                                            }else{
                                                $GenerateToken = mysqli_query($Conn,"UPDATE akses_validasi SET 
                                                    token='$TokenValidasi',
                                                    datetime='$Datetime_generate'
                                                WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn)); 
                                            }
                                            if($GenerateToken){
                                                //Kirim Email
                                                $subjek_email="Validasi Email Pendaftaran $title_page";
                                                $isi_email="$pesan_validasi_email <a href=$base_url/ValidasiEmail.php?Token=$TokenValidasi>Klik Disini</a>";
                                                $datetime_email=strtotime(date('Y-m-d H:i:s'));
                                                $email_tujuan=$email_akses;
                                                $nama_tujuan= $nama_akses;
                                                //Mengirim Email
                                                include "../../_Config/SendEmail.php";
                                                if($GetPesan!=="Email Terkirim"){
                                                    echo '<small class="text-danger">Terjadi kesalahan pada saat mengirim email validasi</small>';
                                                }else{
                                                    $entry="INSERT INTO akses_anggota (
                                                        id_akses_anggota ,
                                                        id_anggota,
                                                        tanggal,
                                                        nama_anggota,
                                                        email,
                                                        kontak,
                                                        password,
                                                        status
                                                    ) VALUES (
                                                        '$id_akses_anggota',
                                                        '0',
                                                        '$now',
                                                        '$nama_akses',
                                                        '$email_akses',
                                                        '$kontak_akses',
                                                        '$password1',
                                                        'Pending'
                                                    )";
                                                    $Input=mysqli_query($Conn, $entry);
                                                    if($Input){
                                                        $_SESSION ["NotifikasiSwal"]="Pendaftaran Berhasil";
                                                        echo '<small class="text-success" id="NotifikasiPendaftaranBerhasil">Success</small>';
                                                    }else{
                                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                                    }
                                                }
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat membuat kode validasi akun</small>';
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>