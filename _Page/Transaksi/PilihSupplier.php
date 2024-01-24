<?php
    //Koneksi
    include "../../_Config/Connection.php";
    //Tangkap id_mitra
    if(empty($_POST['id_mitra'])){
        echo '<option value="">Pilih</option>';
    }else{
        $id_mitra=$_POST['id_mitra'];
        $JumlahDataSupplier = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier WHERE id_mitra='$id_mitra'"));
        if(empty($JumlahDataSupplier)){
            echo '<option value="">Pilih</option>';
        }else{
            echo '<option value="">Pilih</option>';
            $QrySupplier = mysqli_query($Conn, "SELECT*FROM supplier WHERE id_mitra='$id_mitra' ORDER BY nama_supplier ASC");
            while ($DataSupplier = mysqli_fetch_array($QrySupplier)) {
                $id_supplier= $DataSupplier['id_supplier'];
                $nama_supplier= $DataSupplier['nama_supplier'];
                echo '<option value="'.$id_supplier.'">'.$nama_supplier.'</option>';
            }
        }
    }
?>