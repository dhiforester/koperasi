<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Waktu
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    $updatetime_api=strtotime($now);
    //Variabel
    if(empty($_POST['id_dokumentasi_api'])){
        echo '<span class="text-danger">ID Api Documentation Cannot Be Empty!</span>';
    }else{
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
                        $id_dokumentasi_api=$_POST['id_dokumentasi_api'];
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
                        $UpdateApiDoc = mysqli_query($Conn,"UPDATE dokumentasi_api SET 
                            updatetime_api='$updatetime_api',
                            judul_api='$judul_api',
                            kategori_api='$kategori_api',
                            metode_api='$metode_api',
                            url_api='$url_api',
                            request_api='$request_api',
                            response_api='$response_api'
                        WHERE id_dokumentasi_api='$id_dokumentasi_api'") or die(mysqli_error($Conn)); 
                        if($UpdateApiDoc){
                            $id_mitra=0;
                            $KategoriLog="Edit Dokumentasi API";
                            $KeteranganLog="Edit Dokumentasi API Berhasil";
                            include "../../_Config/InputLog.php";
                            $_SESSION ["NotifikasiSwal"]="Simpan Dokumentasi API Berhasil";
                            echo '<small class="text-success" id="NotifikasiEditApiDokumentasiBerhasil">Success</small>';
                        }else{
                            echo '<small class="text-danger">An error occurred while inputting data</small>';
                        }
                    }
                }
            }
        }
    }
?>