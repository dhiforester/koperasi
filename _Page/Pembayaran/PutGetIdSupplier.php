<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_supplier'])){
        echo '<option value="">Pilih</option>';
    }else{
        $id_supplier=$_POST['id_supplier'];
        //Supplier
        $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
        $DataSupplier = mysqli_fetch_array($QrySupplier);
        $id_supplier= $DataSupplier['id_supplier'];
        $nama_supplier= $DataSupplier['nama_supplier'];
        echo '<option value="'.$id_supplier.'">'.$id_supplier.'.'.$nama_supplier.'</option>';
    }
?>