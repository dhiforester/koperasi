<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi nama_akses tidak boleh kosong
    if(empty($_POST['nama_akses'])){
        echo '<small class="text-danger">Nama Akses Anggota Tidak Boleh Kosong!</small>';
    }else{
        //Validasi kontak_akses tidak boleh kosong
        if(empty($_POST['kontak_akses'])){
            echo '<small class="text-danger">Kontak Tidak Boleh Kosong!</small>';
        }else{
            //Validasi email_akses tidak boleh kosong
            if(empty($_POST['email_akses'])){
                echo '<small class="text-danger">Email Tidak Boleh Kosong!</small>';
            }else{
                //Validasi password1 tidak boleh kosong
                if(empty($_POST['password1'])){
                    echo '<small class="text-danger">Password Tidak Boleh Kosong!</small>';
                }else{
                    //Validasi password2 tidak boleh kosong
                    if(empty($_POST['password2'])){
                        echo '<small class="text-danger">Password Tidak Sama!</small>';
                    }else{
                        //Buat Variabel
                        $nama_akses=$_POST['nama_akses'];
                        $kontak_akses=$_POST['kontak_akses'];
                        $email_akses=$_POST['email_akses'];
                        $password1=$_POST['password1'];
                        $password2=$_POST['password2'];
                        $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE kontak='$kontak_akses'"));
                        $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE email='$email_akses'"));
                        if(!empty($ValidasiKontakDuplikat)){
                            echo '<small class="text-danger">Kontak yang digunakan sudah terdaftar!</small>';
                        }else{
                            if(!empty($ValidasiEmailDuplikat)){
                                echo '<small class="text-danger">Email yang digunakan sudah terdaftar!</small>';
                            }else{
                                $JumlahKarakterKontak=strlen($_POST['kontak_akses']);
                                if($JumlahKarakterKontak>20||!preg_match("/^[^a-zA-Z ]*$/", $_POST['kontak_akses'])){
                                    echo '<small class="text-danger">Kontak maksimal 20 karakter numerik</small>';
                                }else{
                                    if($_POST['password1']!==$_POST['password2']){
                                        echo '<small class="text-danger">Password Tidak sama</small>';
                                    }else{
                                        //Validasi jumlah dan jenis karakter password
                                        $JumlahKarakterPassword=strlen($_POST['password1']);
                                        if($JumlahKarakterPassword>20||$JumlahKarakterPassword<6||!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password1'])){
                                            echo '<small class="text-danger">Password hanya boleh 6-20 numeric characters</small>';
                                        }else{
                                            $password=MD5($password1);
                                            $EntryAnggota="INSERT INTO akses_anggota (
                                                id_anggota,
                                                tanggal,
                                                nama_anggota,
                                                email,
                                                kontak,
                                                password,
                                                status,
                                                photo_profile
                                            ) VALUES (
                                                '0',
                                                '$now',
                                                '$nama_akses',
                                                '$email_akses',
                                                '$kontak_akses',
                                                '$password',
                                                'Requested',
                                                ''
                                            )";
                                            $InputAnggota=mysqli_query($Conn, $EntryAnggota);
                                            if($InputAnggota){
                                                $KategoriLog="Angggota";
                                                $KeteranganLog="Tambah Akses Anggota";
                                                include "../../_Config/InputLog.php";
                                                echo '<small class="text-success" id="NotifikasiTambahAksesAnggotaBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data akses anggota</small>';
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