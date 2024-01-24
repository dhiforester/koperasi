<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_jurnal'])){
        echo '<span class="text-danger">ID Pinjaman tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_jurnal=$_POST['id_jurnal'];
       //Proses hapus jurnal
       $HapusJurnal = mysqli_query($Conn, "DELETE FROM jurnal WHERE id_jurnal='$id_jurnal'") or die(mysqli_error($Conn));
       if($HapusJurnal) {
           echo '<span class="text-success" id="NotifikasiHapusJurnalBerhasil">Success</span>';
           $KategoriLog="Jurnal";
           $KeteranganLog="Hapus Data Jurnal Pinjaman";
           include "../../_Config/InputLog.php";
       }else{
           echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data jurnal</span>';
       }
    }
?>