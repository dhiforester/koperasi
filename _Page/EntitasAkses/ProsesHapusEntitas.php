<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['akses'])){
        echo '<span class="text-danger">Informasi Akses Tidak Boleh Kosong</span>';
    }else{
        $akses=$_POST['akses'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM akses_entitas WHERE akses='$akses'") or die(mysqli_error($Conn));
        if ($query) {
            echo '<span class="text-success" id="NotifikasiHapusEntitasBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Clear Data Fail</span>';
        }
    }
?>