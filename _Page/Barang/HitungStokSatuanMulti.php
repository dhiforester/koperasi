<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang'])){
        echo '0';
    }else{
        if(empty($_POST['konversi'])){
            echo '0';
        }else{
            $id_barang=$_POST['id_barang'];
            $konversi=$_POST['konversi'];
            //Buka data supplier
            $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataBarang = mysqli_fetch_array($QryBarang);
            $konversi_barang= $DataBarang['konversi'];
            $stok_barang= $DataBarang['stok_barang'];
            $StokAktual=$stok_barang*($konversi_barang/$konversi);
            echo "$StokAktual";
        }
    }
?>