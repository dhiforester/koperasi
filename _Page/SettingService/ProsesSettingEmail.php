<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Validasi Eksistensi variabel
    if(empty($_POST['url_provider'])){
        $url_provider="";
    }else{
        $url_provider=$_POST['url_provider'];
    }
    if(empty($_POST['port_gateway'])){
        $port_gateway="";
    }else{
        $port_gateway=$_POST['port_gateway'];
    }
    if(empty($_POST['email_gateway'])){
        $email_gateway="";
    }else{
        $email_gateway=$_POST['email_gateway'];
    }
    if(empty($_POST['password_gateway'])){
        $password_gateway="";
    }else{
        $password_gateway=$_POST['password_gateway'];
    }
    if(empty($_POST['nama_pengirim'])){
        $nama_pengirim="";
    }else{
        $nama_pengirim=$_POST['nama_pengirim'];
    }
    if(empty($_POST['url_service'])){
        $url_service="";
    }else{
        $url_service=$_POST['url_service'];
    }
    if(empty($_POST['validasi_email'])){
        $validasi_email="";
    }else{
        $validasi_email=$_POST['validasi_email'];
    }
    if(empty($_POST['redirect_validasi'])){
        $redirect_validasi="";
    }else{
        $redirect_validasi=$_POST['redirect_validasi'];
    }
    if(empty($_POST['pesan_validasi_email'])){
        $pesan_validasi_email="";
    }else{
        $pesan_validasi_email=$_POST['pesan_validasi_email'];
    }
    $Update= mysqli_query($Conn,"UPDATE setting_email_gateway SET 
        email_gateway='$email_gateway',
        password_gateway='$password_gateway',
        url_provider='$url_provider',
        port_gateway='$port_gateway',
        nama_pengirim='$nama_pengirim',
        url_service='$url_service',
        validasi_email='$validasi_email',
        redirect_validasi='$redirect_validasi',
        pesan_validasi_email='$pesan_validasi_email'
    WHERE id_setting_email_gateway='1'") or die(mysqli_error($Conn)); 
    if($Update){
        $_SESSION ["NotifikasiSwal"]="Simpan Setting Email Berhasil";
        echo '<span class="text-success" id="NotifikasiSimpanSettingEmailBerhasil">Success</span>';
    }else{
        echo '<span class="text-danger">Save Parallel Whatsapp integration settings Failed</span>';
    }
?>