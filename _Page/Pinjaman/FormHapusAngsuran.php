<?php
    if(!empty($_POST['id_pinjaman_angsuran'])){
        $id_pinjaman_angsuran=$_POST['id_pinjaman_angsuran'];
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
            <small class="modal-title my-3" id="NotifikasiHapusAngsuran">Apakah anda yakin akan menghapus data ini?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_pinjaman_angsuran="";
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Angsuran tidak boleh kosong!!.</small>';
        echo '      </div>';
        echo '  </div>';
    }
?>