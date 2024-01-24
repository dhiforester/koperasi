<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_akses_anggota'])){
        echo '<span class="text-danger">ID akses Anggota tidak dapat ditangkap oleh sistem</span>';
    }else{
        if(empty($_POST['id_anggota'])){
            echo '<span class="text-danger">ID Anggota tidak dapat ditangkap oleh sistem</span>';
        }else{
            $id_akses_anggota=$_POST['id_akses_anggota'];
            $id_anggota=$_POST['id_anggota'];
            //buka email akses
            $QryAksesAnggota = mysqli_query($Conn,"SELECT * FROM akses_anggota WHERE id_akses_anggota='$id_akses_anggota'")or die(mysqli_error($Conn));
            $DataAksesAnggota = mysqli_fetch_array($QryAksesAnggota);
            $email=$DataAksesAnggota['email'];
            $UpdateAksesAnggota = mysqli_query($Conn,"UPDATE akses_anggota SET 
                id_anggota='$id_anggota',
                status='Active'
            WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn)); 
            if($UpdateAksesAnggota){
                $UpdateAnggota = mysqli_query($Conn,"UPDATE anggota SET 
                    email='$email'
                WHERE id_anggota='$id_anggota'") or die(mysqli_error($Conn)); 
                if($UpdateAnggota){
                    $KategoriLog="Angggota";
                    $KeteranganLog="Update Akses Anggota Berhasil";
                    include "../../_Config/InputLog.php";
                    echo '<small class="text-success" id="NotifikasiHubungkanAnggotaBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat melakukan update data anggota</small>';
                }
            }else{
                echo '<small class="text-danger">Terjadi kesalahan pada saat melakukan update data akses anggota</small>';
            }
        }
    }
?>