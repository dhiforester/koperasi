<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_pinjaman_angsuran'])){
        echo '<span class="text-danger">ID Angsuran tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_pinjaman_angsuran=$_POST['id_pinjaman_angsuran'];
        //Proses hapus data
        $HapusAngsuran = mysqli_query($Conn, "DELETE FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'") or die(mysqli_error($Conn));
        if($HapusAngsuran) {
            //Hapus Jurnal
            $HapusJurnal = mysqli_query($Conn, "DELETE FROM jurnal WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'") or die(mysqli_error($Conn));
            if($HapusJurnal) {
                echo '<span class="text-success" id="NotifikasiHapusAngsuranBerhasil">Success</span>';
                $KategoriLog="Angsuran";
                $KeteranganLog="Hapus Angsuran Berhasil";
                include "../../_Config/InputLog.php";
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data jurnal</span>';
            }
        }else{
            echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data angsuran</span>';
        }
    }
?>