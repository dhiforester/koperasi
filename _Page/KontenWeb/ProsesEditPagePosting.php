<?php
    include "../../_Config/Connection.php";
    date_default_timezone_set('UTC');
    if(empty($_POST['id_konten_posting_edit'])){
        echo '<span class="text-danger">ID Posting Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['judul_posting'])){
            echo '<span class="text-danger">Judul Posting Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['kategori_posting'])){
                echo '<span class="text-danger">Kategori Posting Tidak Boleh Kosong</span>';
            }else{
                if(empty($_POST['tag_posting'])){
                    echo '<span class="text-danger">Kategori Posting Tidak Boleh Kosong</span>';
                }else{
                    if(empty($_POST['status_posting'])){
                        echo '<span class="text-danger">Status Posting Tidak Boleh Kosong</span>';
                    }else{
                        if(empty($_POST['datetime_posting'])){
                            echo '<span class="text-danger">Status Posting Tidak Boleh Kosong</span>';
                        }else{
                            $id_konten_posting_edit=$_POST['id_konten_posting_edit'];
                            $judul_posting=$_POST['judul_posting'];
                            $kategori_posting=$_POST['kategori_posting'];
                            $tag_posting=$_POST['tag_posting'];
                            $status_posting=$_POST['status_posting'];
                            $datetime_posting=$_POST['datetime_posting'];
                            if(!empty($_POST['id_setting_api_key'])){
                                $id_setting_api_key=$_POST['id_setting_api_key'];
                            }else{
                                $id_setting_api_key=0;
                            }
                            if(!empty($_FILES['image_posting']['name'])){
                                //nama gambar
                                $nama_gambar=$_FILES['image_posting']['name'];
                                //ukuran gambar
                                $ukuran_gambar = $_FILES['image_posting']['size']; 
                                //tipe
                                $tipe_gambar = $_FILES['image_posting']['type']; 
                                //sumber gambar
                                $tmp_gambar = $_FILES['image_posting']['tmp_name'];
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
                                            $UpdatePagePosting = mysqli_query($Conn,"UPDATE konten_posting SET 
                                                id_setting_api_key='$id_setting_api_key',
                                                judul_posting='$judul_posting',
                                                tag_posting='$tag_posting',
                                                kategori_posting='$kategori_posting',
                                                status_posting='$status_posting',
                                                image_posting='$namabaru',
                                                datetime_posting='$datetime_posting'
                                            WHERE id_konten_posting='$id_konten_posting_edit'") or die(mysqli_error($Conn)); 
                                            if($UpdatePagePosting){
                                                echo '<small class="text-success" id="NotifikasiEditPostingBerhasil">Success</small>';
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
                                $UpdatePagePosting = mysqli_query($Conn,"UPDATE konten_posting SET 
                                    id_setting_api_key='$id_setting_api_key',
                                    judul_posting='$judul_posting',
                                    tag_posting='$tag_posting',
                                    kategori_posting='$kategori_posting',
                                    status_posting='$status_posting',
                                    datetime_posting='$datetime_posting'
                                WHERE id_konten_posting='$id_konten_posting_edit'") or die(mysqli_error($Conn)); 
                                if($UpdatePagePosting){
                                    echo '<small class="text-success" id="NotifikasiEditPostingBerhasil">Success</small>';
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