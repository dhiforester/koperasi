<script>
    setTimeout(function(){ 
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/CronJob/ProsesCronJob.php',
            success     : function(data){
                $('#MenampilkanProses').html(data);
            }
        });
    },300000);  
</script>
<?php
    //Koneksi Database
    include "../../_Config/Connection.php";
    include "../../_Config/SettingWhatsapp.php";
    include "../../_Config/SettingFilemanager.php";
    //Format Waktu
    date_default_timezone_set("Asia/Jakarta");
    //Sekarang
    $date_now=date('Y-m-d');
    $time_now=date('H:i:s');
    //Looping Rencana Kirim Pesan
    $JumlahRencanaKirim = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM whatsapp_rencana_kirim WHERE tanggal_kirim='$date_now' AND status='None'"));
    if(!empty($JumlahRencanaKirim)){
        $query = mysqli_query($Conn, "SELECT*FROM whatsapp_rencana_kirim WHERE tanggal_kirim='$date_now' AND status='None'");
        while ($data = mysqli_fetch_array($query)) {
            $id_rencana_kirim= $data['id_rencana_kirim'];
            $id_mitra= $data['id_mitra'];
            $clientId= $data['clientId'];
            $tanggal_kirim= $data['tanggal_kirim'];
            $no_tujuan= $data['no_tujuan'];
            $pesan= $data['pesan'];
            $status= $data['status'];
            //Membuka nomor WA Data Client ID
            $QryClientId = mysqli_query($Conn,"SELECT * FROM whatsapp_client WHERE id_mitra='$id_mitra' AND clientId='$clientId'")or die(mysqli_error($Conn));
            $DataClientId = mysqli_fetch_array($QryClientId);
            if(empty($DataClientId['nomor_akun_wa'])){
                echo '<span class="text-danger">ID Client '.$clientId.' Tidak Ditemukan ('.$time_now.')</span><br>';
            }else{
                $nomor_akun_wa = $DataClientId['nomor_akun_wa'];
                $media="";
                $mimetype="";
                $fileName="";
                //Mengirim Pesan
                $arr = array(
                    "api_key" => "$api_key_Whatsapp",
                    "nomor_akun_wa" => "$pengirim",
                    "nomor_tujuan" => "$no_tujuan",
                    "pesan" => "$pesan",
                    "media" => "$media",
                    "mimetype" => "$mimetype",
                    "fileName" => "$fileName"
                );
                $arr = array(
                    "api_key" => "$api_key_Whatsapp",
                    "nomor_akun_wa" => "$pengirim",
                    "nomor_tujuan" => "$tujuan",
                    "pesan" => "$pesan",
                    "media" => "$media",
                    "mimetype" => "$mimetype",
                    "fileName" => "$fileName"
                );
                $headers = array(
                    'Content-Type:Application/x-www-form-urlencoded'
                );
                $json=json_encode($arr);
                //Kirim data CURL
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, "$url_send_message");
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch,CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch,CURLOPT_TIMEOUT, 30);
                curl_setopt($ch,CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch,CURLOPT_HEADER, 0);
                curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
                curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json))
                );
                $result = curl_exec($ch);
                curl_close($ch);
                $ambil_json =json_decode($result, true);
                if($ambil_json["response"]["code"]!==200){
                    $pesan=$ambil_json["response"]["massage"];
                    echo '<span class="text-danger">'.$pesan.'('.$time_now.')</span><br>';
                }else{
                    //Update ststus rencana kirim pesan
                    $UpdateRencanaKirim = mysqli_query($Conn,"UPDATE whatsapp_rencana_kirim SET 
                        status='Terkirim'
                    WHERE id_rencana_kirim='$id_rencana_kirim'") or die(mysqli_error($Conn)); 
                    if($UpdateAkses){
                        echo '<span class="text-success">Kirim Pesan Ke '.$tujuan.' Berhasil! ('.$time_now.')</span><br>';
                    }else{
                        echo '<span class="text-danger">Terjadi kesalahan pada saat melakukan update data rencana kirim ('.$time_now.')</span><br>';
                    }
                }
            }
        }
    }else{
        echo '<span class="text-danger">Tidak ada pesan untuk dikirim! ('.$time_now.')</span><br>';
    }
?>