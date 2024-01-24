<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
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
                    $ValidasiNip=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE nip='$nip'"));
                }else{
                    $nip="";
                    $ValidasiNip="";
                }
                if(!empty($_POST['email'])){
                    $email=$_POST['email'];
                    $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE email='$email'"));
                }else{
                    $email="";
                    $ValidasiEmailDuplikat="";
                }
                if(!empty($_POST['kontak'])){
                    $kontak=$_POST['kontak'];
                    $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE kontak='$kontak'"));
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
                                    $EntryAnggota="INSERT INTO anggota (
                                        tanggal_masuk,
                                        nip,
                                        nama,
                                        email,
                                        kontak,
                                        image,
                                        status
                                    ) VALUES (
                                        '$tanggal_masuk',
                                        '$nip',
                                        '$nama',
                                        '$email',
                                        '$kontak',
                                        '$namabaru',
                                        '$status'
                                    )";
                                    $InputAnggota=mysqli_query($Conn, $EntryAnggota);
                                    if($InputAnggota){
                                        $KategoriLog="Angggota";
                                        $KeteranganLog="Tambah Anggota baru";
                                        include "../../_Config/InputLog.php";
                                        $_SESSION ["NotifikasiSwal"]="Tambah Anggota Berhasil";
                                        echo '<small class="text-success" id="NotifikasiTambahAnggotaBerhasil">Success</small>';
                                    }else{
                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data anggota</small>';
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