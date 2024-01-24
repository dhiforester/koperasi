<?php
    if(!empty($_POST['id_perkiraan'])){
        $id_perkiraan=$_POST['id_perkiraan'];
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
            <small class="modal-title my-3" id="NotifikasiHapusAkunPerkiraan">Apakah anda yakin akan menghapus data ini?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_perkiraan="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">Maaf! Sistem tidak bisa menangkap ID Akun Perkiraan.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>