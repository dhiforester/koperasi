<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('UTC');
    $datetime_url=date('Y-m-d H:i:s');
    $datetime_url=strtotime($datetime_url);
    if(empty($_POST['id_konten_url'])){
        echo '<span class="text-danger">ID Konten URL Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['kategori_url'])){
            echo '<span class="text-danger">Kategori URL Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['nama_url'])){
                echo '<span class="text-danger">Nama URL Tidak Boleh Kosong</span>';
            }else{
                if(empty($_POST['konten_url'])){
                    echo '<span class="text-danger">Konten URL Tidak Boleh Kosong</span>';
                }else{
                    if(empty($_POST['text_url'])){
                        echo '<span class="text-danger">Text URL Tidak Boleh Kosong</span>';
                    }else{
                        $id_konten_url=$_POST['id_konten_url'];
                        $kategori_url=$_POST['kategori_url'];
                        $nama_url=$_POST['nama_url'];
                        $konten_url=$_POST['konten_url'];
                        $text_url=$_POST['text_url'];
                        if(!empty($_POST['id_setting_api_key'])){
                            $id_setting_api_key=$_POST['id_setting_api_key'];
                        }else{
                            $id_setting_api_key=0;
                        }
                        $JumlahKarakterNama=strlen($nama_url);
                        if($JumlahKarakterNama>20){
                            echo '<span class="text-danger">Nama URL Maksimal 20 karakter</span>';
                        }else{
                            if(!empty($_FILES['image_url']['name'])){
                                //nama gambar
                                $nama_gambar=$_FILES['image_url']['name'];
                                //ukuran gambar
                                $ukuran_gambar = $_FILES['image_url']['size']; 
                                //tipe
                                $tipe_gambar = $_FILES['image_url']['type']; 
                                //sumber gambar
                                $tmp_gambar = $_FILES['image_url']['tmp_name'];
                                $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                                $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                $FileNameRand=$key;
                                $Pecah = explode("." , $nama_gambar);
                                $BiasanyaNama=$Pecah[0];
                                $Ext=$Pecah[1];
                                $namabaru = "$FileNameRand.$Ext";
                                $path = "../../assets/img/Posting/".$namabaru;
                                if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                    if($ukuran_gambar<2000000){
                                        if(move_uploaded_file($tmp_gambar, $path)){
                                            $UpdateUrlDinamis=mysqli_query($Conn,"UPDATE konten_url SET 
                                                id_setting_api_key='$id_setting_api_key',
                                                nama_url='$nama_url',
                                                konten_url='$konten_url',
                                                text_url='$text_url',
                                                image_url='$namabaru',
                                                datetime_url='$datetime_url'
                                            WHERE id_konten_url='$id_konten_url'") or die(mysqli_error($Conn)); 
                                            if($UpdateUrlDinamis){
                                                echo '<small class="text-success" id="NotifikasiEditUrlDinamisBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">An error occurred while inputting data</small>';
                                            }
                                        }else{
                                            $ValidasiGambar="Upload File Gambar Gagal!";
                                        }
                                    }else{
                                        $ValidasiGambar="File melebihi 2 Mb";
                                    }
                                }else{
                                    $ValidasiGambar="Tipe File hanya boleh JPG, JPEG, PNG dan GIF";
                                }
                            }else{
                                $UpdateUrlDinamis=mysqli_query($Conn,"UPDATE konten_url SET 
                                    id_setting_api_key='$id_setting_api_key',
                                    nama_url='$nama_url',
                                    konten_url='$konten_url',
                                    text_url='$text_url',
                                    datetime_url='$datetime_url'
                                WHERE id_konten_url='$id_konten_url'") or die(mysqli_error($Conn)); 
                                if($UpdateUrlDinamis){
                                    echo '<small class="text-success" id="NotifikasiEditUrlDinamisBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">An error occurred while inputting data</small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>