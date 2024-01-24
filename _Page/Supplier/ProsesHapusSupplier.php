<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_supplier'])){
        echo '<span class="text-danger">ID Supplier Tidak Boleh Kosong!</span>';
    }else{
        $id_supplier=$_POST['id_supplier'];
        //Proses hapus data
        $HapusSupplier = mysqli_query($Conn, "DELETE FROM supplier WHERE id_supplier='$id_supplier'") or die(mysqli_error($Conn));
        if($HapusSupplier){
            $KategoriLog="Supplier";
            $KeteranganLog="Hapus Supplier $id_supplier";
            include "../../_Config/InputLog.php";
            echo '<span class="text-success" id="NotifikasiHapusSupplierBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Supplier Tidak Boleh Kosong</span>';
        }
    }
?>