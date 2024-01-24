<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_jurnal'])){
        echo '<span class="text-danger">ID Jurnal Tidak Boleh Kosong</span>';
    }else{
        $id_jurnal=$_POST['id_jurnal'];
        //Proses hapus Jurnal
        $HapusJurnal= mysqli_query($Conn, "DELETE FROM jurnal WHERE id_jurnal='$id_jurnal'") or die(mysqli_error($Conn));
        if($HapusJurnal) {
            echo '<span class="text-success" id="NotifikasiHapusJurnalBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Expired Date Gagal</span>';
        }
    }
?>