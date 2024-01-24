<?php
    //koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingPayment.php";
    //Tangkap data dari form
    if(empty($_POST['ServerKey'])){
        echo '<span class="text-danger">Server Key Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['production'])){
            echo '<span class="text-danger">Production Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['order_id'])){
                echo '<span class="text-danger">Order ID Tidak Boleh Kosong</span>';
            }else{
                if(empty($_POST['gross_amount'])){
                    echo '<span class="text-danger">Jumlah Tagihan Tidak Boleh Kosong</span>';
                }else{
                    if(empty($_POST['first_name'])){
                        echo '<span class="text-danger">first name Tidak Boleh Kosong</span>';
                    }else{
                        if(empty($_POST['last_name'])){
                            echo '<span class="text-danger">last name Tidak Boleh Kosong</span>';
                        }else{
                            if(empty($_POST['email'])){
                                echo '<span class="text-danger">email Tidak Boleh Kosong</span>';
                            }else{
                                if(empty($_POST['phone'])){
                                    echo '<span class="text-danger">phone Tidak Boleh Kosong</span>';
                                }else{
                                    $ServerKey = $_POST['ServerKey'];
                                    $production = $_POST['production'];
                                    $order_id = $_POST['order_id'];
                                    $gross_amount = $_POST['gross_amount'];
                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    //Krim data dengan CURL
                                    $headers = array(
                                        'Content-Type:Application/x-www-form-urlencoded',         
                                    );
                                    //CURL send data
                                    $arr = array(
                                        "ServerKey" => "$ServerKey",
                                        "Production" => "$production",
                                        "order_id" => "$order_id",
                                        "gross_amount" => "$gross_amount",
                                        "first_name" => "$first_name",
                                        "last_name" => "$last_name",
                                        "email" => "$email",
                                        "phone" => "$phone",
                                    );
                                    $json = json_encode($arr);
                                    $curl = curl_init();
                                    curl_setopt($curl, CURLOPT_URL, "$api_payment_url/GetSnapToken.php");
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
                                    if($code=="200"){
                                        echo '<span class="text-success">';
                                        echo '  <b>Keterangan :</b> Tarik Data Snap Token '.$pesan.'<br>';
                                        echo '  <b>Token :</b> <i id="TokenDiperoleh">'.$token.'</i><br>';
                                        echo '</span>';
                                    }else{
                                        echo '<span class="text-danger">Get Snap Token Gagal Dibuat!</span>';
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