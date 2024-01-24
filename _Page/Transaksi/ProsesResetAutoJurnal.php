<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $HapusAutoJurnal = mysqli_query($Conn, "DELETE FROM setting_autojurnal WHERE id_akses='$SessionIdAkses'") or die(mysqli_error($Conn));
    if($HapusAutoJurnal){
        echo '<span class="text-success" id="NotifikasiResetAutoJurnalBerhasil">Success</span>';
    }else{
        echo '<span class="text-danger">Reset Auto Jurnal Gagal</span>';
    }
?>