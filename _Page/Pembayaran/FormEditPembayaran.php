<?php
    if(!empty($_POST['id_pembayaran'])){
        $id_pembayaran=$_POST['id_pembayaran'];
?>
'<div class="modal-body">
    <div class="row">
            <div class="col col-md-12 text-center">
                <span class="modal-icon display-2-lg">
                    <img src="assets/img/question.gif" width="70%">
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 text-center mb-3">
                <small class="modal-title my-3">Apakah anda yakin akan melakukan perubahan pada data ini?</small>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-success">
    <a href="index.php?Page=Pembayaran&Sub=EditPembayaran&id=<?php echo "$id_pembayaran" ?>" class="btn btn-primary btn-rounded">
        <i class="bi bi-check"></i> Ya
    </a>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tidak
    </button>
</div>
<?php 
    }else{
        $id_pembayaran="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Pembayaran Tidak Dapat Ditangkap.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12">';
        echo '          <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '              <i class="bi bi-x-circle"></i> Tutup';
        echo '          </button>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>