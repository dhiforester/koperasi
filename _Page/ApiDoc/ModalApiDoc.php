<div class="modal fade" id="ModalDeleteDocApi" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Delete API Documentation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteDocApi">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusDocApi">
                    <i class="bi bi-check"></i> Yes
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> No
                </button>
            </div>
        </div>
    </div>
</div>
<?php
    //Ketika kondisi edit
    if(empty($_GET['Sub'])){
        $Sub="";
    }else{
        $Sub=$_GET['Sub'];
    }
    if($Sub=="ApiDocEditor"){
        if(!empty($_GET['id'])){
            $id_dokumentasi_api=$_GET['id'];
            //Buka data dokumentasi_api
            $QryDokumentasiApi = mysqli_query($Conn,"SELECT * FROM dokumentasi_api WHERE id_dokumentasi_api='$id_dokumentasi_api'")or die(mysqli_error($Conn));
            $DataDokumentasiApi = mysqli_fetch_array($QryDokumentasiApi);
            $judul_api=$DataDokumentasiApi['judul_api'];
            $kategori_api=$DataDokumentasiApi['kategori_api'];
            $metode_api= $DataDokumentasiApi['metode_api'];
            $url_api= $DataDokumentasiApi['url_api'];
            $request_api= $DataDokumentasiApi['request_api'];
            $response_api= $DataDokumentasiApi['response_api'];
        }else{
            $id_dokumentasi_api="";
            $judul_api="";
            $kategori_api="";
            $metode_api="";
            $url_api="";
            $request_api="";
            $response_api="";
        }
?>
    <div class="modal fade" id="ModalEditApi" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="GetRequestApiDoc"> 
                            <?php echo "$request_api";?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="GetResponseApiDoc"> 
                            <?php echo "$response_api";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>