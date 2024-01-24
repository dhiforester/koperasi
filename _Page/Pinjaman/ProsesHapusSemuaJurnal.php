<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_pinjaman'])){
        echo '<span class="text-danger">ID Pinjaman tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_pinjaman=$_POST['id_pinjaman'];
       //Proses hapus jurnal
       $HapusJurnal = mysqli_query($Conn, "DELETE FROM jurnal WHERE id_pinjaman='$id_pinjaman'") or die(mysqli_error($Conn));
       if($HapusJurnal) {
           echo '<span class="text-success" id="NotifikasiHapusSemuaJurnalBerhasil">Success</span>';
           $KategoriLog="Jurnal";
           $KeteranganLog="Hapus Semua Jurnal Pinjaman";
           include "../../_Config/InputLog.php";
       }else{
           echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data jurnal</span>';
       }
    }
?>