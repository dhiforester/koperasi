<?php
    //koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingPayment.php";
    if(empty($_POST['snap_token'])){
        echo '<span class="text-danger">Snap Token Tidak Boleh Kosong</span>';
    }else{
        // $ServerKey = $_POST['ServerKey'];
        // $production = $_POST['production'];
        // $order_id = $_POST['order_id'];
        // $gross_amount = $_POST['gross_amount'];
        // $first_name = $_POST['first_name'];
        // $last_name = $_POST['last_name'];
        // $email = $_POST['email'];
        // $phone = $_POST['phone'];
        $snapToken = $_POST['snap_token'];
        //Krim data dengan CURL
        $headers = array(
            'Content-Type:Application/x-www-form-urlencoded',         
        );
        //CURL send data
        $arr = array(
            "snap_url" => "$snap_url",
            "client_id" => "$server_key",
            "snapToken" => "$snapToken"
        );
        $json = json_encode($arr);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "$api_payment_url/GenerateSnapButton.php");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $data =json_decode($response, true);
        $code=$data["code"];
        $pesan=$data["pesan"];
        $token=$data["token"];
        echo "$response";
    }
?>