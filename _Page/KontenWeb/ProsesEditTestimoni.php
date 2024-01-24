<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_testimoni'])){
        echo '<span class="text-danger">ID Testimoni Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['tanggal'])){
            echo '<span class="text-danger">Tanggal Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['jam'])){
                echo '<span class="text-danger">Jam Tidak Boleh Kosong</span>';
            }else{
                if(empty($_POST['nama'])){
                    echo '<span class="text-danger">Nama User Tidak Boleh Kosong</span>';
                }else{
                    if(empty($_POST['testimoni'])){
                        echo '<span class="text-danger">Testimoni Tidak Boleh Kosong</span>';
                    }else{
                        if(empty($_POST['status'])){
                            echo '<span class="text-danger">Status Testimoni Tidak Boleh Kosong</span>';
                        }else{
                            $id_testimoni=$_POST['id_testimoni'];
                            $tanggal=$_POST['tanggal'];
                            $jam=$_POST['jam'];
                            $nama=$_POST['nama'];
                            $testimoni=$_POST['testimoni'];
                            $status=$_POST['status'];
                            $tanggal="$tanggal $jam";
                            if(!empty($_POST['email'])){
                                $email=$_POST['email'];
                            }else{
                                $email="";
                            }
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
                                $path = "../../assets/img/Testimoni/".$namabaru;
                                if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                    if($ukuran_gambar<2000000){
                                        if(move_uploaded_file($tmp_gambar, $path)){
                                            $UpdateTestimoni=mysqli_query($Conn,"UPDATE testimoni SET 
                                                tanggal='$tanggal',
                                                nama='$nama',
                                                email='$email',
                                                image='$namabaru',
                                                testimoni='$testimoni',
                                                status='$status'
                                            WHERE id_testimoni='$id_testimoni'") or die(mysqli_error($Conn)); 
                                            if($UpdateTestimoni){
                                                echo '<small class="text-success" id="NotifikasiEditTestimoniBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">An error occurred while inputting data</small>';
                                            }
                                        }else{
                                            $ValidasiGambar="Upload File Gambar Gagal!";
                                            echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                        }
                                    }else{
                                        $ValidasiGambar="File melebihi 2 Mb";
                                        echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                    }
                                }else{
                                    echo '<small class="text-danger">Tipe File hanya boleh JPG, JPEG, PNG dan GIF</small>';
                                }
                            }else{
                                $UpdateTestimoni=mysqli_query($Conn,"UPDATE testimoni SET 
                                    tanggal='$tanggal',
                                    nama='$nama',
                                    email='$email',
                                    testimoni='$testimoni',
                                    status='$status'
                                WHERE id_testimoni='$id_testimoni'") or die(mysqli_error($Conn)); 
                                if($UpdateTestimoni){
                                    echo '<small class="text-success" id="NotifikasiEditTestimoniBerhasil">Success</small>';
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