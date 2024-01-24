<?php
    if(!empty($_POST['DataSet'])){
        $DataSet=$_POST['DataSet'];
    }else{
        $DataSet="";
    }
    include "../../_Config/Connection.php";
    echo '<option>Semua</option>';
    if(!empty($DataSet)){
        $QryDataValue = mysqli_query($Conn, "SELECT DISTINCT $DataSet FROM log ORDER BY $DataSet asc");
        while ($dATA = mysqli_fetch_array($QryDataValue)) {
            $lISTdATAvALUE= $dATA[$DataSet];
            if($DataSet=="id_akses"){
                //Buka data akses
                $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$lISTdATAvALUE'")or die(mysqli_error($Conn));
                $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                $nama_akses= $DataDetailAkses['nama_akses'];
                echo '<option value="'.$lISTdATAvALUE.'">'.$nama_akses.'</option>';
            }else{
                echo '<option value="'.$lISTdATAvALUE.'">'.$lISTdATAvALUE.'</option>';
            }
        }
    }
?>