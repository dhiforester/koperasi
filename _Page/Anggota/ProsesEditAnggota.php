<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //id_anggota
    if(empty($_POST['id_anggota'])){
        echo '<small class="text-danger">ID Anggota Tidak Boleh Kosong</small>';
    }else{
        $id_anggota=$_POST['id_anggota'];
        //Buka data askes
        $QryDataAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryDataAnggota);
        $NipLama= $DataAnggota['nip'];
        $KontakLama= $DataAnggota['kontak'];
        $EmailLama = $DataAnggota['email'];
        //Validasi tanggal_masuk tidak boleh kosong
        if(empty($_POST['tanggal_masuk'])){
            echo '<small class="text-danger">Tanggal masuk boleh kosong</small>';
        }else{
            //Validasi nama tidak boleh kosong
            if(empty($_POST['nama'])){
                echo '<small class="text-danger">Nama tidak boleh kosong</small>';
            }else{
                //Validasi status tidak boleh kosong
                if(empty($_POST['status'])){
                    echo '<small class="text-danger">Status anggota tidak boleh kosong</small>';
                }else{
                    //Buat Variabel
                    $tanggal_masuk=$_POST['tanggal_masuk'];
                    $nama=$_POST['nama'];
                    $status=$_POST['status'];
                    if(!empty($_POST['nip'])){
                        $nip=$_POST['nip'];
                        if($nip==$NipLama){
                            $ValidasiNip="";
                        }else{
                            $ValidasiNip=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE nip='$nip'"));
                        }
                    }else{
                        $nip="";
                        $ValidasiNip="";
                    }
                    if(!empty($_POST['email'])){
                        $email=$_POST['email'];
                        if($email==$EmailLama){
                            $ValidasiEmailDuplikat="";
                        }else{
                            $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE email='$email'"));
                        }
                    }else{
                        $email="";
                        $ValidasiEmailDuplikat="";
                    }
                    if(!empty($_POST['kontak'])){
                        $kontak=$_POST['kontak'];
                        if($kontak==$KontakLama){
                            $ValidasiKontakDuplikat="";
                        }else{
                            $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE kontak='$kontak'"));
                        }
                    }else{
                        $kontak="";
                        $ValidasiKontakDuplikat="";
                    }
                    //Validasi kontak tidak boleh lebih dari 20 karakter
                    $JumlahKarakterKontak=strlen($_POST['kontak']);
                    if($JumlahKarakterKontak>20||!preg_match("/^[^a-zA-Z ]*$/", $_POST['kontak'])){
                        echo '<small class="text-danger">Kontak maksimal 20 karakter numerik</small>';
                    }else{
                        if(!empty($ValidasiNip)){
                            echo '<small class="text-danger">NIP tersebut sudah terdaftar</small>';
                        }else{
                            if(!empty($ValidasiKontakDuplikat)){
                                echo '<small class="text-danger">Nomor kontak tersebut sudah terdaftar</small>';
                            }else{
                                if(!empty($ValidasiEmailDuplikat)){
                                    echo '<small class="text-danger">Email sudah digunakan</small>';
                                }else{
                                    //Validasi Gambar
                                    if(!empty($_FILES['image']['name'])){
                                        //nama gambar
                                        $nama_gambar=$_FILES['image']['name'];
                                        //ukuran gambar
                                        $ukuran_gambar = $_FILES['image']['size']; 
                                        //tipe
                                        $tipe_gambar = $_FILES['image']['type']; 
                                        //sumber gambar
                                        $tmp_gambar = $_FILES['image']['tmp_name'];
                                        $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                                        $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                        $FileNameRand=$key;
                                        $Pecah = explode("." , $nama_gambar);
                                        $BiasanyaNama=$Pecah[0];
                                        $Ext=$Pecah[1];
                                        $namabaru = "$FileNameRand.$Ext";
                                        $path = "../../assets/img/Anggota/".$namabaru;
                                        if($tipe_gambar == "image/jpeg"||tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                            if($ukuran_gambar<2000000){
                                                if(move_uploaded_file($tmp_gambar, $path)){
                                                    $ValidasiGambar="Valid";
                                                }else{
                                                    $ValidasiGambar="Upload file gagal";
                                                }
                                            }else{
                                                $ValidasiGambar="File tidak boleh lebih dari 2 Mb";
                                            }
                                        }else{
                                            $ValidasiGambar="Tipe file hanya boleh JPG, JPEG, PNG and GIF";
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
                                            $UpdateAnggota = mysqli_query($Conn,"UPDATE anggota SET 
                                                tanggal_masuk='$tanggal_masuk',
                                                nip='$nip',
                                                nama='$nama',
                                                email='$email',
                                                kontak='$kontak',
                                                image='$namabaru',
                                                status='$status'
                                            WHERE id_anggota='$id_anggota'") or die(mysqli_error($Conn)); 
                                            if($UpdateAnggota){
                                                $KategoriLog="Angggota";
                                                $KeteranganLog="Edit Anggota Berhasil";
                                                include "../../_Config/InputLog.php";
                                                echo '<small class="text-success" id="NotifikasiEditAnggotaBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data akses</small>';
                                            }
                                        }else{
                                            $UpdateAnggota = mysqli_query($Conn,"UPDATE anggota SET 
                                                tanggal_masuk='$tanggal_masuk',
                                                nip='$nip',
                                                nama='$nama',
                                                email='$email',
                                                kontak='$kontak',
                                                status='$status'
                                            WHERE id_anggota='$id_anggota'") or die(mysqli_error($Conn)); 
                                            if($UpdateAnggota){
                                                $KategoriLog="Angggota";
                                                $KeteranganLog="Edit Anggota Berhasil";
                                                include "../../_Config/InputLog.php";
                                                echo '<small class="text-success" id="NotifikasiEditAnggotaBerhasil">Success</small>';
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
    }
?>