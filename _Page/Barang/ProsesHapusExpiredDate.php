<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_barang_bacth'])){
        echo '<span class="text-danger">ID Batch Baraang Tidak Boleh Kosong</span>';
    }else{
        $id_barang_bacth=$_POST['id_barang_bacth'];
        //Proses hapus Expired Date
        $HapusExpiredDate= mysqli_query($Conn, "DELETE FROM barang_bacth WHERE id_barang_bacth='$id_barang_bacth'") or die(mysqli_error($Conn));
        if($HapusExpiredDate) {
            $_SESSION ["NotifikasiSwal"]="Hapus Expired Date Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusExpiredDateBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Expired Date Gagal</span>';
        }
    }
?>