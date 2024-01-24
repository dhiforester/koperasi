<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Id Akses
    if(empty($_POST['id_akses'])){
        echo '<small class="text-danger">ID Akses Tidak Boleh Kosong</small>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $email= $DataDetailAkses['email_akses'];
        if(empty($DataDetailAkses['email_akses'])){
            echo '<small class="text-danger">Email Tidak Ditemukan</small>';
        }else{
            //Validasi nama tidak boleh kosong
            if(empty($_POST['old_password'])){
                echo '<small class="text-danger">Password Lama Tidak Boleh Kosong</small>';
            }else{
                $old_password=$_POST['old_password'];
                $old_password=MD5($old_password);
                $Qry=mysqli_query($Conn,"SELECT*FROM akses WHERE email_akses='$email' AND password='$old_password'")or die(mysqli_error($Conn));
                $DataAkses = mysqli_fetch_array($Qry);
                if(empty($DataAkses["id_akses"])){
                    echo '<small class="text-danger">Password Lama Yang Anda Masukan Salah</small>';
                }else{
                    if(empty($_POST['password1'])){
                        echo '<small class="text-danger">Password Tidak Boleh Kosong</small>';
                    }else{
                        //Validasi kontak tidak boleh kosong
                        if($_POST['password1']!==$_POST['password2']){
                            echo '<small class="text-danger">Passwords Tidak Sama</small>';
                        }else{
                            //Validasi jumlah dan jenis karakter password
                            $JumlahKarakterPassword=strlen($_POST['password1']);
                            if($JumlahKarakterPassword>20||$JumlahKarakterPassword<6||!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password1'])){
                                echo '<small class="text-danger">Password Hanya Boleh Terdiri Dari 6-20 karakter</small>';
                            }else{
                                $password1=$_POST['password1'];
                                $password1=MD5($password1);
                                $UpdateAkses = mysqli_query($Conn,"UPDATE akses SET 
                                    password='$password1',
                                    datetime_update='$now'
                                WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
                                if($UpdateAkses){
                                    $_SESSION ["NotifikasiSwal"]="Edit Password Berhasil";
                                    echo '<small class="text-success" id="NotifikasiEditPasswordBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan dan akses</small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>