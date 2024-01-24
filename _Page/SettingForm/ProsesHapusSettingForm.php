<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_form_medrek'])){
        echo '<span class="text-danger">ID Form Tidak Dapat Ditangkap Oleh Sistem</span>';
    }else{
        $id_form_medrek=$_POST['id_form_medrek'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM form_medrek WHERE id_form_medrek='$id_form_medrek'") or die(mysqli_error($Conn));
        if ($query) {
            $_SESSION ["NotifikasiSwal"]="Hapus Form Setting Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusSettingFormBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal!</span>';
        }
    }
?>