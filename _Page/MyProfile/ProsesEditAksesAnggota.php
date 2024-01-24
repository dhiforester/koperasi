<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Id Akses
    if(empty($_POST['id_akses_anggota'])){
        echo '<small class="text-danger">ID Akses Anggota Tidak Boleh Kosong</small>';
    }else{
        $id_akses_anggota=$_POST['id_akses_anggota'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses_anggota WHERE id_akses_anggota='$id_akses_anggota'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $kontak_akses_lama= $DataDetailAkses['kontak'];
        $email_akses_lama = $DataDetailAkses['email'];
        //Validasi nama tidak boleh kosong
        if(empty($_POST['nama_akses'])){
            echo '<small class="text-danger">Nama Tidak Boleh Kosong</small>';
        }else{
            //Validasi kontak tidak boleh kosong
            if(empty($_POST['kontak_akses'])){
                echo '<small class="text-danger">Nomor Kontak Tidak Boleh Kosong</small>';
            }else{
                //Validasi kontak tidak boleh lebih dari 20 karakter
                $JumlahKarakterKontak=strlen($_POST['kontak_akses']);
                if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak_akses'])){
                    echo '<small class="text-danger">Kontak hanya boleh 6-20 karakter</small>';
                }else{
                    //Validasi kontak tidak boleh duplikat
                    $kontak_akses=$_POST['kontak_akses'];
                    if($kontak_akses_lama==$kontak_akses){
                        $ValidasiKontakDuplikat=0;
                    }else{
                        $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE kontak='$kontak_akses'"));
                    }
                    if(!empty($ValidasiKontakDuplikat)){
                        echo '<small class="text-danger">Nomor kontak sudah terdaftar</small>';
                    }else{
                        //Validasi email tidak boleh kosong
                        if(empty($_POST['email_akses'])){
                            echo '<small class="text-danger">Email Tidak Boleh Kosong</small>';
                        }else{
                            //Validasi email duplikat
                            $email_akses=$_POST['email_akses'];
                            if($email_akses_lama==$email_akses){
                                $ValidasiEmailDuplikat=0;
                            }else{
                                $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE email='$email_akses'"));
                            }
                            if(!empty($ValidasiEmailDuplikat)){
                                echo '<small class="text-danger">Email Sudah Terdaftar</small>';
                            }else{
                                //Variabel Lainnya
                                $nama_akses=$_POST['nama_akses'];
                                $kontak_akses=$_POST['kontak_akses'];
                                $email_akses=$_POST['email_akses'];
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
                                    if($tipe_gambar == "image/jpeg"||tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                        if($ukuran_gambar<2000000){
                                            if(move_uploaded_file($tmp_gambar, $path)){
                                                $ValidasiGambar="Valid";
                                            }else{
                                                $ValidasiGambar="Upload File Gagal";
                                            }
                                        }else{
                                            $ValidasiGambar="File tidak boleh lebih dari 2 Mb";
                                        }
                                    }else{
                                        $ValidasiGambar="Format File Hanya Boleh JPG, JPEG, PNG and GIF";
                                    }
                                }else{
                                    $ValidasiGambar="Valid";
                                    $namabaru="";
                                }
                                //Apabila validasi upload valid maka simpan di database
                                if($ValidasiGambar!=="Valid"){
                                    echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                }else{
                                    if(!empty($_FILES['image_akses']['name'])){
                                        $UpdateAkses = mysqli_query($Conn,"UPDATE akses_anggota SET 
                                            nama_anggota='$nama_akses',
                                            kontak='$kontak_akses',
                                            email='$email_akses',
                                            photo_profile='$namabaru',
                                            tanggal='$now'
                                        WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn)); 
                                        if($UpdateAkses){
                                            $_SESSION ["NotifikasiSwal"]="Edit Akses Berhasil";
                                            echo '<small class="text-success" id="NotifikasiEditProfileAnggotaBerhasil">Success</small>';
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data akses</small>';
                                        }
                                    }else{
                                        $UpdateAkses = mysqli_query($Conn,"UPDATE akses_anggota SET 
                                            nama_anggota='$nama_akses',
                                            kontak='$kontak_akses',
                                            email='$email_akses',
                                            tanggal='$now'
                                        WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn)); 
                                        if($UpdateAkses){
                                            $_SESSION ["NotifikasiSwal"]="Edit Akses Berhasil";
                                            echo '<small class="text-success" id="NotifikasiEditProfileAnggotaBerhasil">Success</small>';
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data akses</small>';
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