<?php
    //Inisiasi setting
    $QryPaymentSetting = mysqli_query($Conn,"SELECT * FROM setting_email_gateway WHERE id_setting_email_gateway='1'")or die(mysqli_error($Conn));
    $DataPaymentsetting = mysqli_fetch_array($QryPaymentSetting);
    if(!empty($DataPaymentsetting['email_gateway'])){
        $email_gateway= $DataPaymentsetting['email_gateway'];
        $password_gateway= $DataPaymentsetting['password_gateway'];
        $url_provider= $DataPaymentsetting['url_provider'];
        $port_gateway= $DataPaymentsetting['port_gateway'];
        $nama_pengirim= $DataPaymentsetting['nama_pengirim'];
        $url_service= $DataPaymentsetting['url_service'];
        $validasi_email= $DataPaymentsetting['validasi_email'];
        $redirect_validasi= $DataPaymentsetting['redirect_validasi'];
        $pesan_validasi_email= $DataPaymentsetting['pesan_validasi_email'];
    }else{
        $email_gateway="";
        $password_gateway="";
        $url_provider="";
        $port_gateway="";
        $nama_pengirim="";
        $url_service="";
        $validasi_email="";
        $redirect_validasi="";
        $pesan_validasi_email="";
    }
    
?>