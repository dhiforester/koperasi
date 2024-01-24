<?php
    if(!empty($_POST['id_help'])){
        $id_help=$_POST['id_help'];
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
            <small class="modal-title my-3" id="NotifikasiHapusHelp">Are You Sure You Want To Delete This Data?</small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_dokumentasi_api="";
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">Sorry, No access data selected.</small>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }
?>