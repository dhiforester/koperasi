<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_help'])){
        echo '<span class="text-danger">ID Documentation Cannot be captured during deletion process</span>';
    }else{
        $id_help=$_POST['id_help'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM help WHERE id_help='$id_help'") or die(mysqli_error($Conn));
        if ($query) {
            $_SESSION ["NotifikasiSwal"]="Hapus Help Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusHelpBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Clear Data Fail</span>';
        }
    }
?>