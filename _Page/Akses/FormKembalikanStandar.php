<?php
    if(!empty($_POST['id_akses'])){
        $id_akses=$_POST['id_akses'];
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
            Dengan mengembalikan ijin akses ke settingan standar memungkinkan user tidak dapat mengakses fitur tertentu.<br>
            <span class="modal-title my-3" id="NotifikasiIjinAksesStandar">Apakah anda yakin akan mengembalikan ijin akses ini?</span>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_akses="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">Sorry, No access data selected.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>