<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_tabungan'])){
        echo '<span class="text-danger">ID Tabungan tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_tabungan=$_POST['id_tabungan'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM simpanan WHERE id_simpanan='$id_tabungan'") or die(mysqli_error($Conn));
        if ($query) {
            $HapusJurnal = mysqli_query($Conn, "DELETE FROM jurnal WHERE id_simpanan='$id_tabungan'") or die(mysqli_error($Conn));
            if ($HapusJurnal) {
                echo '<span class="text-success" id="NotifikasiHapusTabunganBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Terjadi Kesalahan Pada Saat Menghapus Jurnal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>