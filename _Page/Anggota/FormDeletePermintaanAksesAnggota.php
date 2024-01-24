<?php
    if(!empty($_POST['id_akses_anggota'])){
        $id_akses_anggota=$_POST['id_akses_anggota'];
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
            <small class="modal-title my-3">
                Menghapus permintaan akses anggota ini akan menyebabkan anggota yang bersangkutan tidak dapat lagi mengakses akunnya.
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12 text-center mb-3">
            <small class="modal-title my-3" id="NotifikasiHapusPermintaanAksesAnggota">Apakah anda yakin akan menghapus data ini?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_akses_anggota="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Anggota Tidak Boleh Kosong.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>