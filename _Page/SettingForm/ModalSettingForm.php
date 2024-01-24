<?php
    if(!empty($_GET['id'])){
        $id_form_medrek=$_GET['id'];
        //Buka detail FormSetting
        $QryFormSetting = mysqli_query($Conn,"SELECT * FROM form_medrek WHERE id_form_medrek='$id_form_medrek'")or die(mysqli_error($Conn));
        $DataFormSetting = mysqli_fetch_array($QryFormSetting);
        $nama_form_medrek= $DataFormSetting['nama_form_medrek'];
        $deskripsi_form_medrek= $DataFormSetting['deskripsi_form_medrek'];
        $form_medrek= $DataFormSetting['form_medrek'];
        $updatetime= $DataFormSetting['updatetime'];
    }else{
        $id_form_medrek="";
        $nama_form_medrek="";
        $deskripsi_form_medrek="";
        $form_medrek="";
        $updatetime="";
    }
?>
<div class="modal fade" id="ModalEditSettingForm" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="GetFormmedrek"> 
                        <?php echo "$form_medrek";?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDeleteSettingForm" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Tamplate Medrek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteSettingForm">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusSettingForm">
                    <i class="bi bi-check"></i> Yes
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> No
                </button>
            </div>
        </div>
    </div>
</div>