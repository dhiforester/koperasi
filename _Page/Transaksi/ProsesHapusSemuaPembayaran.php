<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Proses Hapus Jurnal
        $HapusPembayaran = mysqli_query($Conn, "DELETE FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
        if($HapusPembayaran){
            $KategoriLog="Pembayaran";
            $KeteranganLog="Hapus Pembayaran Berhasil";
            include "../../_Config/InputLog.php";
            $_SESSION ["NotifikasiSwal"]="Hapus Pembayaran Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusSemuaPembayaranBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Jurnal Transaksi Gagal</span>';
        }
    }
?>