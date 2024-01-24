<?php
    //Koneksi
    include "../../_Config/Connection.php";
    //Inisiasi tanggal sekarang
    date_default_timezone_set("Asia/Jakarta");
    $now=date('Y-m-d H:i:s');
    $tanggal_sekarang=date('Y-m-d H:i:s');
    $tanggal_sekarang=strtotime($tanggal_sekarang);
    //menangkap data dari link
    if(empty($_POST['email'])){
        echo '<small class="text-center text-danger">Email Tidak Boleh Kosong.</small>';
    }else{
        if(empty($_POST['token'])){
            echo '<small class="text-center text-danger">Kode Verifikasi Tidak Boleh Kosong.</small>';
        }else{
            $email=$_POST['email'];
            $token=$_POST['token'];
            //Validasi email pda data akses
            $Qry=mysqli_query($Conn,"SELECT*FROM akses_anggota WHERE email='$email'")or die(mysqli_error($Conn));
            $DataAkses = mysqli_fetch_array($Qry);
            if(empty($DataAkses["id_akses_anggota"])){
                echo '<small class="text-center text-danger">Email Yang Anda Gunakan Tidak Terdaftar.</small>';
            }else{
                $id_akses_anggota=$DataAkses["id_akses_anggota"];
                $code_unik=md5($token);
                //Validasi email dan token
                $QryLupaPassword=mysqli_query($Conn,"SELECT*FROM lupa_password WHERE id_akses_anggota='$id_akses_anggota' AND code_unik='$code_unik'")or die(mysqli_error($Conn));
                $DataLupaPassword = mysqli_fetch_array($QryLupaPassword);
                if(empty($DataLupaPassword["id_akses_anggota"])){
                    echo '<small class="text-center text-danger">Kode Verifikasi Yang Anda Gunakan Tidak Terdaftar.</small>';
                }else{
                    $tanggal_expired=$DataLupaPassword["tanggal_expired"];
                    if($tanggal_sekarang>$tanggal_expired){
                        echo '<small class="text-center text-danger">Email Yang Anda Gunakan Tidak Terdaftar.</small>';
                    }else{
                        if(empty($_POST['PasswordBaru1'])){
                            echo '<small class="text-center text-danger">Password Baru Tidak Boleh Kosong.</small>';
                        }else{
                            if(empty($_POST['PasswordBaru2'])){
                                echo '<small class="text-center text-danger">Password Yang Anda Gunakan Tidak Sama.</small>';
                            }else{
                                $JumlahKarakterPassword=strlen($_POST['PasswordBaru1']);
                                if($JumlahKarakterPassword>20||$JumlahKarakterPassword<6||!preg_match("/^[a-zA-Z0-9]*$/", $_POST['PasswordBaru1'])){
                                    echo '<small class="text-danger">Password Hanya Boleh Terdiri dari 6-20 karakter huruf dan angka</small>';
                                }else{
                                    if($_POST['PasswordBaru1']!==$_POST['PasswordBaru2']){
                                        echo '<small class="text-danger">Password Tidak sama</small>';
                                    }else{
                                        $password1=$_POST['PasswordBaru1'];
                                        $password1=md5($password1);
                                        //Simpan data password baru
                                        $UpdateAkses = mysqli_query($Conn,"UPDATE akses_anggota SET 
                                            password='$password1'
                                        WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn)); 
                                        if($UpdateAkses){
                                            //Hapus data token yang lama
                                            $query = mysqli_query($Conn, "DELETE FROM lupa_password WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn));
                                            if($query) {
                                                echo '<small class="text-success" id="NotifikasiUbahPasswordBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menghapus kode token yang lama</small>';
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
?>