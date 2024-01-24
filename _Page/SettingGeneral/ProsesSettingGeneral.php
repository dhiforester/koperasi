<?php
    session_start();
    //Koneksi
    include "../../_Config/Connection.php";
    //Tangkap data
    if(empty($_POST['title_page'])){
        echo '<span class="text-danger">Application title cannot be empty</span>';
    }else{
        if(empty($_POST['kata_kunci'])){
            echo '<span class="text-danger">Application keywords cannot be empty</span>';
        }else{
            if(empty($_POST['deskripsi'])){
                echo '<span class="text-danger">Application description cannot be empty</span>';
            }else{
                if(empty($_POST['alamat_bisnis'])){
                    echo '<span class="text-danger">Company address cannot be empty</span>';
                }else{
                    if(empty($_POST['email_bisnis'])){
                        echo '<span class="text-danger">Email address cannot be empty</span>';
                    }else{
                        if(empty($_POST['telepon_bisnis'])){
                            echo '<span class="text-danger">Company phone cannot be empty</span>';
                        }else{
                            if(empty($_POST['base_url'])){
                                echo '<span class="text-danger">Base URL cannot be empty</span>';
                            }else{
                                $title_page=$_POST['title_page'];
                                $kata_kunci=$_POST['kata_kunci'];
                                $deskripsi=$_POST['deskripsi'];
                                $alamat_bisnis=$_POST['alamat_bisnis'];
                                $email_bisnis=$_POST['email_bisnis'];
                                $telepon_bisnis=$_POST['telepon_bisnis'];
                                $base_url=$_POST['base_url'];
                                if(!empty($_FILES['favicon']['name'])){
                                    $nama_gambar_favicon=$_FILES['favicon']['name'];
                                    $ukuran_gambar_favicon = $_FILES['favicon']['size']; 
                                    $tipe_gambar_favicon = $_FILES['favicon']['type']; 
                                    $tmp_gambar_favicon = $_FILES['favicon']['tmp_name'];
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
                                                $UpdateSettingGeneral = mysqli_query($Conn,"UPDATE setting_general SET 
                                                    favicon='$namabarufavicon'
                                                WHERE id_setting_general='1'") or die(mysqli_error($Conn)); 
                                                if($UpdateSettingGeneral){
                                                    $ValidasiGambarFavicon="Valid";
                                                }else{
                                                    $ValidasiGambarFavicon="Favicon Upload Failed";
                                                }
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
                                }
                                if(!empty($_FILES['logo']['name'])){
                                    $nama_gambar_logo=$_FILES['logo']['name'];
                                    $ukuran_gambar_logo = $_FILES['logo']['size']; 
                                    $tipe_gambar_logo = $_FILES['logo']['type']; 
                                    $tmp_gambar_logo = $_FILES['logo']['tmp_name'];
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
                                                $UpdateSettingGeneral = mysqli_query($Conn,"UPDATE setting_general SET 
                                                    logo='$namabarulogo'
                                                WHERE id_setting_general='1'") or die(mysqli_error($Conn)); 
                                                if($UpdateSettingGeneral){
                                                    $ValidasiGambarLogo="Valid";
                                                }else{
                                                    $ValidasiGambarLogo="Logo Upload Failed";
                                                }
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
                                }
                            }
                            if($ValidasiGambarFavicon!=="Valid"){
                                echo '<span class="text-danger">'.$ValidasiGambarFavicon.'</span>';
                            }else{
                                if($ValidasiGambarLogo!=="Valid"){
                                    echo '<span class="text-danger">'.$ValidasiGambarLogo.'</span>';
                                }else{
                                    $UpdateSetting = mysqli_query($Conn,"UPDATE setting_general SET 
                                        title_page='$title_page',
                                        kata_kunci='$kata_kunci',
                                        deskripsi='$deskripsi',
                                        alamat_bisnis='$alamat_bisnis',
                                        email_bisnis='$email_bisnis',
                                        telepon_bisnis='$telepon_bisnis',
                                        base_url='$base_url'
                                    WHERE id_setting_general='1'") or die(mysqli_error($Conn)); 
                                    if($UpdateSetting){
                                        $_SESSION ["NotifikasiSwal"]="Simpan Setting General Berhasil";
                                        echo '<small class="text-success" id="NotifikasiSimpanSettingGeneralBerhasil">Success</small>';
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
    }
    
?>