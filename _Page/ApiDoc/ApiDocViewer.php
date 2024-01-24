<?php
    if(empty($_GET['id'])){
        echo "<span>ID cannot be empty</span>";
    }else{
        $id_dokumentasi_api=$_GET['id'];
        //Buka data dokumentasi_api
        $QryDokumentasiApi = mysqli_query($Conn,"SELECT * FROM dokumentasi_api WHERE id_dokumentasi_api='$id_dokumentasi_api'")or die(mysqli_error($Conn));
        $DataDokumentasiApi = mysqli_fetch_array($QryDokumentasiApi);
        $updatetime_api=$DataDokumentasiApi['updatetime_api'];
        $judul_api=$DataDokumentasiApi['judul_api'];
        $kategori_api=$DataDokumentasiApi['kategori_api'];
        $metode_api= $DataDokumentasiApi['metode_api'];
        $url_api= $DataDokumentasiApi['url_api'];
        $request_api= $DataDokumentasiApi['request_api'];
        $response_api= $DataDokumentasiApi['response_api'];
        //Ubah waktu ke format lokal
        date_default_timezone_set('Asia/Jakarta');
        //Ubah STRTOTIME to DATETIME
        $updatetime_api=date('d F Y H:i:s',$updatetime_api);
?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <?php 
                                    echo '<h4 class="card-title">'.$judul_api.'</h4>'; 
                                    echo '<small class="credit">Category: '.$kategori_api.'</small>'; 
                                ?>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=ApiDoc" class="btn btn-md btn-dark btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-short"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3"><b>URL : </b><?php echo "$url_api"; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3"><b>Method : </b><?php echo "$metode_api"; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3"><b>Request :</b><br><?php echo "$request_api"; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3"><b>Response :</b><br><?php echo "$response_api"; ?></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php
                            echo '<small class="credit">Last Update: '.$updatetime_api.'</small>'; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>