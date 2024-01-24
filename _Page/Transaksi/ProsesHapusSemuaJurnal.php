<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Proses Hapus Jurnal
        $HapusJurnal = mysqli_query($Conn, "DELETE FROM jurnal WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
        if($HapusJurnal){
            echo '<span class="text-success" id="NotifikasiHapussemuaJurnalBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Jurnal Transaksi Gagal</span>';
        }
    }
?>