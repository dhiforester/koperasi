<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">ID Akses tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Proses hapus data
        $HapusAkses = mysqli_query($Conn, "DELETE FROM akses WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
        if ($HapusAkses) {
            $HapusEntitas = mysqli_query($Conn, "DELETE FROM akses_ijin WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
            if ($HapusEntitas) {
                $KategoriLog="Akses";
                $KeteranganLog="Hapus Akses Berhasil";
                include "../../_Config/InputLog.php";
                echo '<span class="text-success" id="NotifikasiHapusAksesBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Data Gagal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>