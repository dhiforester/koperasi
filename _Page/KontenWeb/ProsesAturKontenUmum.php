<?php
    //Koneksi
    include "../../_Config/Connection.php";
    date_default_timezone_set("Asia/Jakarta");
    $lastupdate_konten=date('Y-m-d H:i:s');
    //Tangkap data
    if(empty($_POST['id_setting_api_key'])){
        echo '<span class="text-danger">ID Api Key Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['judul_konten'])){
            echo '<span class="text-danger">Judul konten tidak boleh kosong</span>';
        }else{
            if(empty($_POST['keyword_konten'])){
                echo '<span class="text-danger">Judul konten tidak boleh kosong</span>';
            }else{
                if(empty($_POST['deskripsi_konten'])){
                    echo '<span class="text-danger">Deskripsi tidak boleh kosong</span>';
                }else{
                    if(empty($_POST['alamat_konten'])){
                        echo '<span class="text-danger">Alamat tidak boleh kosong</span>';
                    }else{
                        if(empty($_POST['email_konten'])){
                            echo '<span class="text-danger">Email tidak boleh kosong</span>';
                        }else{
                            if(empty($_POST['kontak_konten'])){
                                echo '<span class="text-danger">Kontak tidak boleh kosong</span>';
                            }else{
                                if(empty($_POST['baseurl_konten'])){
                                    echo '<span class="text-danger">Base URL tidak boleh kosong</span>';
                                }else{
                                    if(empty($_POST['id_konten_umum'])){
                                        $id_konten_umum="";
                                    }else{
                                        $id_konten_umum=$_POST['id_konten_umum'];
                                    }
                                    $id_setting_api_key=$_POST['id_setting_api_key'];
                                    $judul_konten=$_POST['judul_konten'];
                                    $keyword_konten=$_POST['keyword_konten'];
                                    $deskripsi_konten=$_POST['deskripsi_konten'];
                                    $alamat_konten=$_POST['alamat_konten'];
                                    $email_konten=$_POST['email_konten'];
                                    $kontak_konten=$_POST['kontak_konten'];
                                    $baseurl_konten=$_POST['baseurl_konten'];
                                    $JumlahKarakterJudul=strlen($judul_konten);
                                    $JumlahKarakterKontak=strlen($kontak_konten);
                                    //Validasi Jumlah Karakter judul
                                    if($JumlahKarakterJudul>20){
                                        echo '<span class="text-danger">Judul/Title Halaman Tidak Lebih Dari 20 Karakter</span>';
                                    }else{
                                        //Kontak hanya boleh angka
                                        if(!preg_match("/^[0-9]*$/", $kontak_konten)){
                                            echo '<span class="text-danger">Kontak hanya boleh angka</span>';
                                        }else{
                                            if($JumlahKarakterKontak>20){
                                                echo '<span class="text-danger">Kontak Tidak Lebih Dari 20 Karakter Numeric</span>';
                                            }else{
                                                //Buka data lama
                                                $QryAturKontenUmum = mysqli_query($Conn,"SELECT * FROM konten_umum WHERE id_setting_api_key='$id_setting_api_key'")or die(mysqli_error($Conn));
                                                $DataAturKontenUmum = mysqli_fetch_array($QryAturKontenUmum);
                                                if(empty($DataAturKontenUmum['id_konten_umum'])){
                                                    $favicon_konten="";
                                                    $logo_konten="";
                                                }else{
                                                    $favicon_konten= $DataAturKontenUmum['favicon_konten'];
                                                    $logo_konten= $DataAturKontenUmum['logo_konten'];
                                                }
                                                if(!empty($_FILES['favicon_konten']['name'])){
                                                    $nama_gambar_favicon=$_FILES['favicon_konten']['name'];
                                                    $ukuran_gambar_favicon = $_FILES['favicon_konten']['size']; 
                                                    $tipe_gambar_favicon = $_FILES['favicon_konten']['type']; 
                                                    $tmp_gambar_favicon = $_FILES['favicon_konten']['tmp_name'];
                                                    $timestamp_favicon = strval(time()-strtotime('1970-01-01 00:00:00'));
                                                    $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                                    $FileNameRand=$key;
                                                    $Pecah = explode("." , $nama_gambar_favicon);
                                                    $BiasanyaNama=$Pecah[0];
                                                    $Ext=$Pecah[1];
                                                    $namabarufavicon = "$FileNameRand.$Ext";
                                                    $path_favicon = "../../assets/img/".$namabarufavicon;
                                                    if($tipe_gambar_favicon=="image/jpeg"||$tipe_gambar_favicon=="image/jpg"||$tipe_gambar_favicon=="image/gif"||$tipe_gambar_favicon=="image/png"){
                                                        if($ukuran_gambar_favicon<2000000){
                                                            if(move_uploaded_file($tmp_gambar_favicon, $path_favicon)){
                                                                $ValidasiGambarFavicon="Valid";
                                                            }else{
                                                                $ValidasiGambarFavicon="Image upload failed";
                                                            }
                                                        }else{
                                                            $ValidasiGambarFavicon="File size cannot be more than 2 Mb";
                                                        }
                                                    }else{
                                                        $ValidasiGambarFavicon="File Types Can Only JPG, JPEG, PNG and GIF";
                                                    }
                                                }else{
                                                    $ValidasiGambarFavicon="Valid";
                                                    $namabarufavicon =$favicon_konten;
                                                }
                                                if(!empty($_FILES['logo_konten']['name'])){
                                                    $nama_gambar_logo=$_FILES['logo_konten']['name'];
                                                    $ukuran_gambar_logo = $_FILES['logo_konten']['size']; 
                                                    $tipe_gambar_logo = $_FILES['logo_konten']['type']; 
                                                    $tmp_gambar_logo = $_FILES['logo_konten']['tmp_name'];
                                                    $timestamp_logo = strval(time()-strtotime('1970-01-01 00:00:00'));
                                                    $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                                    $FileNameRand=$key;
                                                    $Pecah = explode("." , $nama_gambar_logo);
                                                    $BiasanyaNama=$Pecah[0];
                                                    $Ext=$Pecah[1];
                                                    $namabarulogo = "$FileNameRand.$Ext";
                                                    $path_logo = "../../assets/img/".$namabarulogo;
                                                    if($tipe_gambar_logo=="image/jpeg"||$tipe_gambar_logo=="image/jpg"||$tipe_gambar_logo=="image/gif"||$tipe_gambar_logo=="image/png"){
                                                        if($ukuran_gambar_logo<2000000){
                                                            if(move_uploaded_file($tmp_gambar_logo, $path_logo)){
                                                                $ValidasiGambarLogo="Valid";
                                                            }else{
                                                                $ValidasiGambarLogo="Image upload failed";
                                                            }
                                                        }else{
                                                            $ValidasiGambarLogo="File size cannot be more than 2 Mb";
                                                        }
                                                    }else{
                                                        $ValidasiGambarLogo="File Types Can Only JPG, JPEG, PNG and GIF";
                                                    }
                                                }else{
                                                    $ValidasiGambarLogo="Valid";
                                                    $namabarulogo=$logo_konten;
                                                }
                                                if($ValidasiGambarFavicon!=="Valid"){
                                                    echo '<span class="text-danger">'.$ValidasiGambarFavicon.'</span>';
                                                }else{
                                                    if($ValidasiGambarLogo!=="Valid"){
                                                        echo '<span class="text-danger">'.$ValidasiGambarLogo.'</span>';
                                                    }else{
                                                        if(empty($_POST['id_konten_umum'])){
                                                            $entry="INSERT INTO konten_umum (
                                                                id_setting_api_key,
                                                                judul_konten,
                                                                keyword_konten,
                                                                deskripsi_konten,
                                                                alamat_konten,
                                                                email_konten,
                                                                kontak_konten,
                                                                favicon_konten,
                                                                logo_konten,
                                                                baseurl_konten,
                                                                lastupdate_konten
                                                            ) VALUES (
                                                                '$id_setting_api_key',
                                                                '$judul_konten',
                                                                '$keyword_konten',
                                                                '$deskripsi_konten',
                                                                '$alamat_konten',
                                                                '$email_konten',
                                                                '$kontak_konten',
                                                                '$namabarufavicon',
                                                                '$namabarulogo',
                                                                '$baseurl_konten',
                                                                '$lastupdate_konten'
                                                            )";
                                                            $Input=mysqli_query($Conn, $entry);
                                                            if($Input){
                                                                echo '<small class="text-success" id="NotifikasiAturKontenUmumBerhasil">Success</small>';
                                                            }else{
                                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                                            }
                                                        }else{
                                                            $Update = mysqli_query($Conn,"UPDATE konten_umum SET 
                                                                id_setting_api_key='$id_setting_api_key',
                                                                judul_konten='$judul_konten',
                                                                keyword_konten='$keyword_konten',
                                                                deskripsi_konten='$deskripsi_konten',
                                                                alamat_konten='$alamat_konten',
                                                                email_konten='$email_konten',
                                                                kontak_konten='$kontak_konten',
                                                                favicon_konten='$namabarufavicon',
                                                                logo_konten='$namabarulogo',
                                                                baseurl_konten='$baseurl_konten',
                                                                lastupdate_konten='$lastupdate_konten'
                                                            WHERE id_konten_umum='$id_konten_umum'") or die(mysqli_error($Conn)); 
                                                            if($Update){
                                                                echo '<small class="text-success" id="NotifikasiAturKontenUmumBerhasil">Success</small>';
                                                            }else{
                                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan perubahan data</small>';
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
        }
    }
?>