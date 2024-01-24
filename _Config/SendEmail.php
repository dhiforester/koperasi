<?php
    //Sebelumnya harus include SettingEmail.php
    // $nama_tujuan="";
    // $email_tujuan="";
    // $subjek_email="";
    // $isi_email="";
    // $datetime_email="";
    //Kirim email
    $ch = curl_init();
    $headers = array(
        'Content-Type: Application/JSON',          
        'Accept: Application/JSON'     
    );
    $arr = array(
        "subjek" => "$subjek_email",
        "email_asal" => "$email_gateway",
        "password_email_asal" => "$password_gateway",
        "url_provider" => "$url_provider",
        "nama_pengirim" => "$nama_pengirim",
        "email_tujuan" => "$email_tujuan",
        "nama_tujuan" => "$nama_tujuan",
        "pesan" => "$isi_email",
        "port" => "$port_gateway"
    );
    $json = json_encode($arr);
    curl_setopt($ch, CURLOPT_URL, "$url_service");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 25); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    $get =json_decode($content, true);
    if(!empty($get['code'])){
        $GetCode=$get['code'];
    }else{
        $GetCode=200;
    }
    if(!empty($get['pesan'])){
        $GetPesan=$get['pesan'];
    }else{
        $GetPesan="Email Terkirim";
    }
?>