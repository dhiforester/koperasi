<?php
    //koneksi dan session
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Validasi Eksistensi variabel
    if(empty($_POST['api_payment_url'])){
        $api_payment_url="";
    }else{
        $api_payment_url=$_POST['api_payment_url'];
    }
    if(empty($_POST['id_marchant'])){
        $id_marchant="";
    }else{
        $id_marchant=$_POST['id_marchant'];
    }
    if(empty($_POST['client_key'])){
        $client_key="";
    }else{
        $client_key=$_POST['client_key'];
    }
    if(empty($_POST['server_key'])){
        $server_key="";
    }else{
        $server_key=$_POST['server_key'];
    }
    if(empty($_POST['snap_url'])){
        $snap_url="";
    }else{
        $snap_url=$_POST['snap_url'];
    }
    if(empty($_POST['production'])){
        $production="false";
    }else{
        $production=$_POST['production'];
    }
    if(empty($_POST['aktif_payment_gateway'])){
        $aktif_payment_gateway="Tidak";
    }else{
        $aktif_payment_gateway=$_POST['aktif_payment_gateway'];
    }
    $Update= mysqli_query($Conn,"UPDATE setting_payment SET 
        api_payment_url='$api_payment_url',
        id_marchant='$id_marchant',
        client_key='$client_key',
        server_key='$server_key',
        snap_url='$snap_url',
        production='$production',
        aktif_payment_gateway='$aktif_payment_gateway'
    WHERE id_setting_payment='1'") or die(mysqli_error($Conn)); 
    if($Update){
        $_SESSION ["NotifikasiSwal"]="Simpan Setting Payment Berhasil";
        echo '<span class="text-success" id="NotifikasiSimpanSettingPaymentBerhasil">Success</span>';
    }else{
        echo '<span class="text-danger">Save Parallel Whatsapp integration settings Failed</span>';
    }
?>