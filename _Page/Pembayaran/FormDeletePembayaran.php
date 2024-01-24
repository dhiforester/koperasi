<?php
    if(!empty($_POST['id_pembayaran'])){
        $id_pembayaran=$_POST['id_pembayaran'];
?>
<div class="row">
        <div class="col col-md-12 text-center">
            <span class="modal-icon display-2-lg">
                <img src="assets/img/question.gif" width="70%">
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12 text-center mb-3">
            <small class="modal-title my-3" id="NotifikasiHapusPembayaran">Apakah anda yakin akan menghapus data ini?</small>
        </div>
    </div>
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
    }
?>