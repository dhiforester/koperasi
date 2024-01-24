<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Proses Hapus Transaksi
        $HapusTransaksi = mysqli_query($Conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
        if($HapusTransaksi){
            $HapusRincian = mysqli_query($Conn, "DELETE FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
            if($HapusRincian){
                echo '<span class="text-success" id="NotifikasiHapusTransaksiBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Rincian Transaksi Gagal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Transaksi Gagal</span>';
        }
    }
?>