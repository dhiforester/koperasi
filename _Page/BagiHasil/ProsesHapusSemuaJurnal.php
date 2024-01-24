<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_shu_session'])){
        echo '<span class="text-danger">ID Bagi Hasil Tidak Boleh Kosong</span>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
        //Proses hapus Jurnal
        $HapusJurnal= mysqli_query($Conn, "DELETE FROM jurnal WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn));
        if($HapusJurnal) {
            echo '<span class="text-success" id="NotifikasiHapusSemuaJurnalBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Expired Date Gagal</span>';
        }
    }
?>