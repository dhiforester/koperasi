<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_dokumentasi_api'])){
        echo '<span class="text-danger">Api Documentation ID Cannot be captured during deletion process</span>';
    }else{
        $id_dokumentasi_api=$_POST['id_dokumentasi_api'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM dokumentasi_api WHERE id_dokumentasi_api='$id_dokumentasi_api'") or die(mysqli_error($Conn));
        if ($query) {
            echo '<span class="text-success" id="NotifikasiHapusApiDocBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Clear Data Fail</span>';
        }
    }
?>