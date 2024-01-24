<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi_pencairan'])){
        echo '<span class="text-danger">ID Transaksi Pencairan tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_transaksi_pencairan=$_POST['id_transaksi_pencairan'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM transaksi_pencairan WHERE id_transaksi_pencairan='$id_transaksi_pencairan'") or die(mysqli_error($Conn));
        if ($query) {
            echo '<span class="text-success" id="NotifikasiHapusPencairanBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>