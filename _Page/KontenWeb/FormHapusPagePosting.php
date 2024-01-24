<?php
    if(!empty($_POST['id_konten_posting'])){
        $id_konten_posting=$_POST['id_konten_posting'];
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
            <small class="modal-title my-3" id="NotifikasiHapusPagePosting">Apakah anda yakin akan menghapus data konten ini?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_setting_api_key="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">Tidak ada data yang dipilih.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>