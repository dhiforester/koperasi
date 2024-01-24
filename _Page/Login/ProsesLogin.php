<?php
    session_start();
    include "../../_Config/Connection.php";
    //Validasi keberadaan email dan password
    if(empty($_POST["email"])){
        echo 'Login Failed Error Code :<span id="ErrorCode">1</span>';
    }else{
        if(empty($_POST["password"])){
            echo 'Login Failed Error Code :<span id="ErrorCode">2</span>';
        }else{
            if(empty($_POST["mode_akses"])){
                echo 'Login Failed Error Code :<span id="ErrorCode">4</span>';
            }else{
                $email=$_POST["email"];
                $password=$_POST["password"];
                $mode_akses=$_POST["mode_akses"];
                $passwordMd5=md5($password);
                //QUERY MEMANGGIL DATA DARI DATABASE Akses
                if($mode_akses=="Pengurus"){
                    $Qry=mysqli_query($Conn,"SELECT*FROM akses WHERE email_akses='$email' AND password='$passwordMd5'")or die(mysqli_error($Conn));
                    $DataAkses = mysqli_fetch_array($Qry);
                    if(!empty($DataAkses["id_akses"])){
                        echo '<span id="NotifikasiProsesLoginBerhasil">Success</span>';
                        $_SESSION ["id_akses"]=$DataAkses["id_akses"];
                        $_SESSION ["NotifikasiSwal"]="Login Berhasil";
                        $GetIdAksesDariData=$_SESSION["id_akses"];
                        $SessionIdAkses=$_SESSION["id_akses"];
                        $KategoriLog="Login";
                        $KeteranganLog="$email Berhasil Melakukan Login";
                        include "../../_Config/InputLog.php";
                    }else{
                        echo 'Login Failed Error Code <span id="ErrorCode">3</span>';
                    }
                }else{
                    $Qry=mysqli_query($Conn,"SELECT*FROM akses_anggota WHERE email='$email' AND password='$passwordMd5'")or die(mysqli_error($Conn));
                    $DataAkses = mysqli_fetch_array($Qry);
                    if(!empty($DataAkses["id_akses_anggota"])){
                        echo '<span id="NotifikasiProsesLoginBerhasil">Success</span>';
                        $_SESSION ["id_akses_anggota"]=$DataAkses["id_akses_anggota"];
                        $_SESSION ["NotifikasiSwal"]="Login Berhasil";
                        $GetIdAksesDariData=$_SESSION["id_akses_anggota"];
                        $SessionIdAksesAnggota=$_SESSION["id_akses_anggota"];
                    }else{
                        echo 'Login Failed Error Code <span id="ErrorCode">5</span>';
                    }
                }
            }
        }
    }	
?>