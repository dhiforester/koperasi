<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Id Akses
    if(empty($_POST['id_akses'])){
        echo '<small class="text-danger">ID Akses tidak boleh kosong</small>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $kontak_akses_lama= $DataDetailAkses['kontak_akses'];
        $email_akses_lama = $DataDetailAkses['email_akses'];
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
                    echo '<small class="text-danger">Kontak hanya boleh terdiri dari 6-20 karakter numerik</small>';
                }else{
                    //Validasi kontak tidak boleh duplikat
                    $kontak_akses=$_POST['kontak_akses'];
                    if($kontak_akses_lama==$kontak_akses){
                        $ValidasiKontakDuplikat=0;
                    }else{
                        $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE kontak_akses='$kontak_akses'"));
                    }
                    if(!empty($ValidasiKontakDuplikat)){
                        echo '<small class="text-danger">Nomor kontak sudah terdaftar</small>';
                    }else{
                        //Validasi email tidak boleh kosong
                        if(empty($_POST['email_akses'])){
                            echo '<small class="text-danger">Email tidak boleh kosong</small>';
                        }else{
                            //Validasi email duplikat
                            $email_akses=$_POST['email_akses'];
                            if($email_akses_lama==$email_akses){
                                $ValidasiEmailDuplikat=0;
                            }else{
                                $ValidasiEmailDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email_akses='$email_akses'"));
                            }
                            if(!empty($ValidasiEmailDuplikat)){
                                echo '<small class="text-danger">Email yang anda gunakan sudah terdaftar</small>';
                            }else{
                                //Validasi Status tidak boleh kosong
                                if(empty($_POST['status'])){
                                    echo '<small class="text-danger">Status akses tidak boleh kosong</small>';
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
                                        echo '<small class="text-danger">Level Akses tidak boleh kosong</small>';
                                    }else{
                                        //Variabel Lainnya
                                        $nama_akses=$_POST['nama_akses'];
                                        $kontak_akses=$_POST['kontak_akses'];
                                        $email_akses=$_POST['email_akses'];
                                        $status=$_POST['status'];
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
                                                        $ValidasiGambar="Upload gambar gagal";
                                                    }
                                                }else{
                                                    $ValidasiGambar="File gambar tidak boleh lebih dari 2 Mb";
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
                                            if(!empty($_FILES['image_akses']['name'])){
                                                $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                                    nama_akses='$nama_akses',
                                                    kontak_akses='$kontak_akses',
                                                    email_akses='$email_akses',
                                                    image_akses='$namabaru',
                                                    akses='$akses',
                                                    status='$status',
                                                    datetime_update='$now'
                                                WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                                                if($UpdateAkses){
                                                    //Hapus Akses lama
                                                    $HapusIjinAksesLama = mysqli_query($Conn, "DELETE FROM akses_ijin WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
                                                    if($HapusIjinAksesLama){
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
                                                        $KategoriLog="Akses";
                                                        $KeteranganLog="Edit Akses Berhasil";
                                                        include "../../_Config/InputLog.php";
                                                        include "../../_Page/Akses/ProsesUpdateEntitas.php";
                                                        echo '<small class="text-success" id="NotifikasiEditAksesBerhasil">Success</small>';
                                                    }else{
                                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menghapus ijin akses lama</small>';
                                                    }
                                                }else{
                                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                                }
                                            }else{
                                                $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                                    nama_akses='$nama_akses',
                                                    kontak_akses='$kontak_akses',
                                                    email_akses='$email_akses',
                                                    akses='$akses',
                                                    status='$status',
                                                    datetime_update='$now'
                                                WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                                                if($UpdateAkses){
                                                    //Hapus Akses lama
                                                    $HapusIjinAksesLama = mysqli_query($Conn, "DELETE FROM akses_ijin WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
                                                    if($HapusIjinAksesLama){
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
                                                        $KategoriLog="Akses";
                                                        $KeteranganLog="Edit Akses Berhasil";
                                                        include "../../_Config/InputLog.php";
                                                        include "../../_Page/Akses/ProsesUpdateEntitas.php";
                                                        echo '<small class="text-success" id="NotifikasiEditAksesBerhasil">Success</small>';
                                                    }else{
                                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menghapus ijin akses lama</small>';
                                                    }
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
?>