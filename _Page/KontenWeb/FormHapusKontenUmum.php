<?php
    if(!empty($_POST['id_setting_api_key'])){
        $id_setting_api_key=$_POST['id_setting_api_key'];
        include "../../_Config/Connection.php";
        date_default_timezone_set('UTC');
        $id_setting_api_key=$_POST['id_setting_api_key'];
        $QryAturKontenUmum = mysqli_query($Conn,"SELECT * FROM setting_api_key WHERE id_setting_api_key='$id_setting_api_key'")or die(mysqli_error($Conn));
        $DataAturKontenUmum = mysqli_fetch_array($QryAturKontenUmum);
        $api_key= $DataAturKontenUmum['api_key'];
?>
<div class="row">
        <div class="col col-md-12 text-center">
            <span class="modal-icon display-2-lg">
                <img src="assets/img/question.gif" width="70%">
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center mb-3">
            <small class="credit">
                API Key : <?php echo "$api_key"; ?>
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12 text-center mb-3">
            <small class="modal-title my-3" id="NotifikasiHapusKontenUmum">Apakah anda yakin akan menghapus data konten ini?</small>
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