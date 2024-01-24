<?php
    if(!empty($_POST['akses'])){
        $akses=$_POST['akses'];
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
                <small class="modal-title my-3">
                    Untuk melakukan perubahan entitas akses, anda akan diarahkan pada halaman form edit entitas akses.<br>
                    Apakah anda yakin akan masuk ke halaman tersebut?
                </small>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-success">
    <a href="index.php?Page=EntitasAkses&Sub=EditEntitas&akses=<?php echo "$akses"; ?>" class="btn btn-primary btn-rounded">
        <i class="bi bi-check"></i> Ya, Lanjutkan
    </a>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tidak
    </button>
</div>
<?php 
    }else{
        $akses="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">Informasi Akses Tidak Boleh Kosong.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>