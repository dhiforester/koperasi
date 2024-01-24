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
    <input type="hidden" name="id_dokumentasi_api" id="id_dokumentasi_api" value="<?php echo "$id_dokumentasi_api"; ?>">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">
                                    <i class="bi bi-clipboard-plus"></i> Edit API Documentation Form
                                </h4>
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
                            <div class="col-md-3 mb-3">
                                <label for="kategori_api">Category</label>
                                <input type="text" name="kategori_api" id="kategori_api" class="form-control" value="<?php echo "$kategori_api";?>">
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="judul_api">Documentation Title</label>
                                <input type="text" name="judul_api" id="judul_api" class="form-control" value="<?php echo "$judul_api";?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="metode_api">Method</label>
                                <select name="metode_api" id="metode_api" class="form-control">
                                    <option <?php if($metode_api=="POST"){echo "selected";} ?> value="POST">POST</option>
                                    <option <?php if($metode_api=="GET"){echo "selected";} ?> value="GET">GET</option>
                                </select>
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="url_api">URL</label>
                                <input type="text" name="url_api" id="url_api" class="form-control" value="<?php echo "$url_api";?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="request_api">Request</label>
                                <textarea name="request_api" id="get_request_api" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="response_api">Response</label>
                                <textarea name="response_api" id="get_response_api" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12" id="NotifikasiEditApiDokumentasi">
                                <span class="text-dark">Make sure that the form is filled out correctly</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-rounded btn-primary" id="ClickSimpanEditDokumentasiApi">
                            <i class="bi bi-save"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>