<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_akses_anggota'])){
        echo '<span class="text-danger">ID akses Anggota tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_akses_anggota=$_POST['id_akses_anggota'];
        $HapusAksesAnggota = mysqli_query($Conn, "DELETE FROM akses_anggota WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn));
        if($HapusAksesAnggota) {
            echo '<span class="text-success" id="NotifikasiHapusPermintaanAksesAnggotaBerhasil">Success</span>';
            $KategoriLog="Angggota";
            $KeteranganLog="Hapus Akses Anggota Berhasil";
            include "../../_Config/InputLog.php";
        }else{
            echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data anggota</span>';
        }
    }
?>