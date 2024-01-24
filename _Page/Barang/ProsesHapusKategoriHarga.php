<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_barang_harga'])){
        echo '<span class="text-danger">ID Satuan Baraang Tidak Boleh Kosong</span>';
    }else{
        $id_barang_harga=$_POST['id_barang_harga'];
        $QryHarga = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang_harga='$id_barang_harga'")or die(mysqli_error($Conn));
        $DataHarga = mysqli_fetch_array($QryHarga);
        $id_barang= $DataHarga['id_barang'];
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $nama_barang= $DataBarang['nama_barang'];
        //Proses hapus data
        $HapusKategoriHarga= mysqli_query($Conn, "DELETE FROM barang_harga WHERE id_barang_harga='$id_barang_harga'") or die(mysqli_error($Conn));
        if($HapusKategoriHarga) {
            $KategoriLog="Barang";
            $KeteranganLog="Hapus multi harga untuk $nama_barang";
            include "../../_Config/InputLog.php";
            $_SESSION ["NotifikasiSwal"]="Hapus Kategori Harga Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusKategoriHargaBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Kategori Harga gagal</span>';
        }
    }
?>