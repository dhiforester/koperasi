<?php
    if(!empty($_POST['id_stok_opename'])){
        $id_stok_opename=$_POST['id_stok_opename'];
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
            <small class="modal-title my-3" id="NotifikasiHapusStockOpename">Apakah anda yakin akan menghapus data ini?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_stok_opename="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Stock Opename Tidak Boleh Kosong!</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>