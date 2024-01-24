<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_pembayaran'])){
        echo '<span class="text-danger">ID Akses tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_pembayaran=$_POST['id_pembayaran'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM transaksi_pembayaran WHERE id_pembayaran='$id_pembayaran'") or die(mysqli_error($Conn));
        if ($query) {
            echo '<span class="text-success" id="NotifikasiHapusPembayaranBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>