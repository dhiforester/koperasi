<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_anggota'])){
        echo '<span class="text-danger">ID akses tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_anggota=$_POST['id_anggota'];
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        if(!empty($DataAnggota['image'])){
            $image= $DataAnggota['image'];
            $UrlImage="../../assets/img/Anggota/$image";
            unlink($UrlImage);
        }else{
            $image="";
            $UrlImage="../../assets/img/Anggota/$image";
        }
        if(!file_exists($UrlImage)||empty($DataAnggota['image'])){
            //Proses hapus data
            $HapusAnggota = mysqli_query($Conn, "DELETE FROM anggota WHERE id_anggota='$id_anggota'") or die(mysqli_error($Conn));
            if($HapusAnggota) {
                echo '<span class="text-success" id="NotifikasiHapusAnggotaBerhasil">Success</span>';
                $KategoriLog="Angggota";
                $KeteranganLog="Hapus Data Anggota";
                include "../../_Config/InputLog.php";
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data anggota</span>';
            }
        }else{
            echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus file foto</span>';
        }
    }
?>