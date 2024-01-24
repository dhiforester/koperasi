<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
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
                $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE kontak_akses='$kontak_akses'"));
                if(!empty($ValidasiKontakDuplikat)){
                    echo '<small class="text-danger">Nomor kontak tersebut sudah terdaftar</small>';
                }else{
                    //Validasi email tidak boleh kosong
                    if(empty($_POST['email_akses'])){
                        echo '<small class="text-danger">Email tidak boleh kosong</small>';
                    }else{
                        //Validasi email duplikat
                        $email_akses=$_POST['email_akses'];
                        $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email_akses='$email_akses'"));
                        if(!empty($ValidasiEmailDuplikat)){
                            echo '<small class="text-danger">Email sudah digunakan</small>';
                        }else{
                            //Validasi Status tidak boleh kosong
                            if(empty($_POST['status'])){
                                echo '<small class="text-danger">Status akses tidak boleh kosong</small>';
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
                                            if(empty($_POST['akses'])){
                                                //Apakah grup_akses kosong?
                                                if(empty($_POST['grup_akses'])){
                                                    //Apakah grup_akses kosong?
                                                    $akses="";
                                                }else{
                                                    $akses=$_POST['grup_akses'];
                                                }
                                            }else{
                                                $akses=$_POST['akses'];
                                            }
                                            if(empty($akses)){
                                                echo '<small class="text-danger">Level akses tidak boleh kosong</small>';
                                            }else{
                                                //Kondisi Apabila id_mitra kosong
                                                if(empty($_POST['id_mitra'])){
                                                    $id_mitra=0;
                                                }else{
                                                    $id_mitra=$_POST['id_mitra'];
                                                }
                                                //Variabel Lainnya
                                                $nama_akses=$_POST['nama_akses'];
                                                $kontak_akses=$_POST['kontak_akses'];
                                                $email_akses=$_POST['email_akses'];
                                                $status=$_POST['status'];
                                                $password1=$_POST['password1'];
                                                $password1=MD5($password1);
                                                //Validasi Gambar
                                                if(!empty($_FILES['image_akses']['name'])){
                                                    //nama gambar
                                                    $nama_gambar=$_FILES['image_akses']['name'];
                                                    //ukuran gambar
                                                    $ukuran_gambar = $_FILES['image_akses']['size']; 
                                                    //tipe
                                                    $tipe_gambar = $_FILES['image_akses']['type']; 
                                                    //sumber gambar
                                                    $tmp_gambar = $_FILES['image_akses']['tmp_name'];
                                                    $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                                                    $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                                    $FileNameRand=$key;
                                                    $Pecah = explode("." , $nama_gambar);
                                                    $BiasanyaNama=$Pecah[0];
                                                    $Ext=$Pecah[1];
                                                    $namabaru = "$FileNameRand.$Ext";
                                                    $path = "../../assets/img/User/".$namabaru;
                                                    if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                                        if($ukuran_gambar<2000000){
                                                            if(move_uploaded_file($tmp_gambar, $path)){
                                                                $ValidasiGambar="Valid";
                                                            }else{
                                                                $ValidasiGambar="Upload file gambar gagal";
                                                            }
                                                        }else{
                                                            $ValidasiGambar="File gambar tidak boleh lebih dari 2 mb";
                                                        }
                                                    }else{
                                                        $ValidasiGambar="tipe file hanya boleh JPG, JPEG, PNG and GIF";
                                                    }
                                                }else{
                                                    $ValidasiGambar="Valid";
                                                    $namabaru="";
                                                }
                                                //Apabila validasi upload valid maka simpan di database
                                                if($ValidasiGambar!=="Valid"){
                                                    echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                                }else{
                                                    $entry="INSERT INTO akses (
                                                        nama_akses,
                                                        kontak_akses,
                                                        email_akses,
                                                        password,
                                                        image_akses,
                                                        akses,
                                                        status,
                                                        datetime_daftar,
                                                        datetime_update
                                                    ) VALUES (
                                                        '$nama_akses',
                                                        '$kontak_akses',
                                                        '$email_akses',
                                                        '$password1',
                                                        '$namabaru',
                                                        '$akses',
                                                        '$status',
                                                        '$now',
                                                        '$now'
                                                    )";
                                                    $Input=mysqli_query($Conn, $entry);
                                                    if($Input){
                                                        $KategoriLog="Input Akses Baru";
                                                        $KeteranganLog="Input Akses Baru Berhasil";
                                                        include "../../_Config/InputLog.php";
                                                        //Cari id_akses bersangkutan
                                                        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE email_akses='$email_akses'")or die(mysqli_error($Conn));
                                                        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                                                        $id_akses = $DataDetailAkses['id_akses'];
                                                        //Buat Ijin Aksees
                                                        $query = mysqli_query($Conn, "SELECT*FROM akses_referensi ORDER BY kode_referensi ASC");
                                                        while ($data = mysqli_fetch_array($query)) {
                                                            $kode_referensi= $data['kode_referensi'];
                                                            //Cek pada entitas akses
                                                            $QryEntitas = mysqli_query($Conn,"SELECT * FROM akses_entitas WHERE akses='$akses' AND kode_akses='$kode_referensi'")or die(mysqli_error($Conn));
                                                            $DataEntitas = mysqli_fetch_array($QryEntitas);
                                                            if(!empty($DataEntitas['akses'])){
                                                                $entry_lagi="INSERT INTO akses_ijin (
                                                                    id_akses,
                                                                    akses,
                                                                    kode_akses
                                                                ) VALUES (
                                                                    '$id_akses',
                                                                    '$akses',
                                                                    '$kode_referensi'
                                                                )";
                                                                $InputLagi=mysqli_query($Conn, $entry_lagi);
                                                            }
                                                        }
                                                        $_SESSION ["NotifikasiSwal"]="Tambah Akses Berhasil";
                                                        echo '<small class="text-success" id="NotifikasiTambahAksesBerhasil">Success2</small>';
                                                    }else{
                                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
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
        }
    }
?>