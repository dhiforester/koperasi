<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_shu_session
    if(empty($_POST['id_shu_session'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Sesi Bagi Hasil Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
?>
    <div class="modal-body">
        <div class="row">
            <div class="col col-md-12 text-center">
                <span class="modal-icon display-2-lg">
                    <img src="assets/img/question.gif" width="70%">
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 text-center mb-3">
                <small class="modal-title my-3">Apakah anda yakin ingin export data ini?</small>
            </div>
        </div>
    </div>
    
    <div class="modal-footer bg-success">
        <div class="row">
            <div class="col-md-12 mb-2">
                <a href="_Page/BagiHasil/ProsesExportRincian.php?id_shu_session=<?php echo "$id_shu_session"; ?>" class="btn btn-primary btn-rounded" target="_blank">
                    <i class="bi bi-download"></i> Export
                </a>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
<?php } ?>