<?php
    if(!empty($_POST['id_transaksi_rincian'])){
        $id_transaksi_rincian=$_POST['id_transaksi_rincian'];
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
            <small class="modal-title my-3" id="NotifikasiHapusRincian">Apakah anda yakin akan menghapus data ini?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_transaksi_rincian="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Rincian Transaksi tidak boleh kosong!!.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>