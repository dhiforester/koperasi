<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Waktu
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    $updatetime_api=strtotime($now);
    //Variabel kategori_api
    if(empty($_POST['kategori_api'])){
        echo '<span class="text-danger">API Category Cannot Be Empty!</span>';
    }else{
        if(empty($_POST['judul_api'])){
            echo '<span class="text-danger">API Title Cannot Be Empty!</span>';
        }else{
            if(empty($_POST['metode_api'])){
                echo '<span class="text-danger">API Method Cant Be Empty!</span>';
            }else{
                if(empty($_POST['url_api'])){
                    echo '<span class="text-danger">URL API Method Cant Be Empty!</span>';
                }else{
                    $kategori_api=$_POST['kategori_api'];
                    $judul_api=$_POST['judul_api'];
                    $metode_api=$_POST['metode_api'];
                    $url_api=$_POST['url_api'];
                    if(empty($_POST['request_api'])){
                        $request_api="";
                    }else{
                        $request_api=$_POST['request_api'];
                    }
                    if(empty($_POST['response_api'])){
                        $response_api="";
                    }else{
                        $response_api=$_POST['response_api'];
                    }
                    //Proses simpan data
                    $entry="INSERT INTO dokumentasi_api (
                        updatetime_api,
                        judul_api,
                        kategori_api,
                        metode_api,
                        url_api,
                        request_api,
                        response_api
                    ) VALUES (
                        '$updatetime_api',
                        '$judul_api',
                        '$kategori_api',
                        '$metode_api',
                        '$url_api',
                        '$request_api',
                        '$response_api'
                    )";
                    $Input=mysqli_query($Conn, $entry);
                    if($Input){
                        $id_mitra=0;
                        $KategoriLog="Input Dokumentasi API";
                        $KeteranganLog="Input Dokumentasi API Berhasil";
                        include "../../_Config/InputLog.php";
                        $_SESSION ["NotifikasiSwal"]="Simpan Dokumentasi API Berhasil";
                        echo '<small class="text-success" id="NotifikasiTambahApiDokumentasiBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">An error occurred while inputting data</small>';
                    }
                }
            }
        }
    }
    
?>