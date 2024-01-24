<?php
    if(!empty($_POST['id_pinjaman'])){
        $id_pinjaman=$_POST['id_pinjaman'];
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
            <small class="modal-title my-3" id="NotifikasiHapusSemuaJurnal">Apakah anda yakin akan menghapus semua data jurnal pada pinjaman ini?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_pinjaman="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Jurnal Tidak Boleh Kosong.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>