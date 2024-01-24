<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_shu_session'])){
        echo '<span class="text-danger">ID Sesi tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
        //Proses hapus Sessi
        $HapusSessi = mysqli_query($Conn, "DELETE FROM shu_session WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn));
        if($HapusSessi) {
            $HapusRincianSessi = mysqli_query($Conn, "DELETE FROM shu_rincian WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn));
            if($HapusRincianSessi) {
                $HapusJurnal = mysqli_query($Conn, "DELETE FROM jurnal WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn));
                if($HapusJurnal) {
                    $_SESSION ["NotifikasiSwal"]="Hapus Bagi Hasil Berhasil";
                    echo '<span class="text-success" id="NotifikasiHapusBagiHasilBerhasil">Success</span>';
                    $KategoriLog="Bagi Hasil";
                    $KeteranganLog="Hapus Data Bagi Hasil Berhasil";
                    include "../../_Config/InputLog.php";
                }else{
                    echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data Rincian Bagi Hasil</span>';
                }
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data Rincian Bagi Hasil</span>';
            }
        }else{
            echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data Bagi Hasil</span>';
        }
    }
?>