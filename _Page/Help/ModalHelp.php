<div class="modal fade" id="ModalDeleteHelp" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Delete Help Documentation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteHelp">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusHelp">
                    <i class="bi bi-check"></i> Yes
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> No
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalAksesHelp" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesSimpanAksesHelp">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-person"></i> Pengaturan Akses Bantuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><b>No</b></th>
                                            <th><b>Akses</b></th>
                                            <th><b>Opsi</b></th>
                                        </tr>
                                    </thead>
                                    <tbody id="FormAksesHelp">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="NotifikasiSimpanAksesHelp">
                            <span class="text-primary">Pastikan Data Yang Anda input Sudah Benar</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-info">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Save
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> No
                    </button>
                </div>
            </form>
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
    if($Sub=="EditHelp"){
        if(!empty($_GET['id'])){
            $id_help=$_GET['id'];
            //Buka data dokumentasi_api
            $QryHelp = mysqli_query($Conn,"SELECT * FROM help WHERE id_help='$id_help'")or die(mysqli_error($Conn));
            $DataHelp = mysqli_fetch_array($QryHelp);
            $title=$DataHelp['title'];
            $category=$DataHelp['category'];
            $description= $DataHelp['description'];
            $datetime= $DataHelp['datetime'];
        }else{
            $title="";
            $category="";
            $description="";
            $datetime="";
        }
?>
    <div class="modal fade" id="ModalEditApi" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="GetHelDescription"> 
                            <?php echo "$description";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="modal fade" id="ModalDetailHelp" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-info"></i> Detail Bantuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="FormDetailHelp">

                    </div>
                </div>
            </div>
            <div class="modal-footer bg-info">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>