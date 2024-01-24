<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_pembayaran'])){
        echo '<span class="text-danger">ID Pembayaran Tidak Boleh Kosong!</span>';
    }else{
        $id_pembayaran=$_POST['id_pembayaran'];
        //Proses Hapus Pembayaran
        $HapusPembayaran = mysqli_query($Conn, "DELETE FROM transaksi_pembayaran WHERE id_pembayaran='$id_pembayaran'") or die(mysqli_error($Conn));
        if($HapusPembayaran){
            $KategoriLog="Pembayaran";
            $KeteranganLog="Hapus Pembayaran Berhasil";
            include "../../_Config/InputLog.php";
            $_SESSION ["NotifikasiSwal"]="Hapus Pembayaran Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusPembayaranBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Jurnal Transaksi Gagal</span>';
        }
    }
?>