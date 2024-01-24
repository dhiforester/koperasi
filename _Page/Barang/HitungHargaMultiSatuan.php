<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang_satuan'])){
        if(!empty($_POST['id_barang'])){
            $id_barang=$_POST['id_barang'];
            $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataBarang = mysqli_fetch_array($QryBarang);
            $harga_beli= $DataBarang['harga_beli'];
            echo $harga_beli;
        }else{
            echo '0';
        }
    }else{
        $id_barang_satuan=$_POST['id_barang_satuan'];
        //Buka data barang_satuan
        $QryBarangSatuan = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
        $DataBarangSatuan = mysqli_fetch_array($QryBarangSatuan);
        $id_barang= $DataBarangSatuan['id_barang'];
        $konversi_multi= $DataBarangSatuan['konversi_multi'];
        //Buka data barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $konversi= $DataBarang['konversi'];
        $harga_beli= $DataBarang['harga_beli'];
        $HargaMulti=$harga_beli*($konversi_multi/$konversi);
        echo "$HargaMulti";
    }
?>