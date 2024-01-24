<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_barang_kategori_harga'])){
        echo '<span class="text-danger">ID Harga Tidak Boleh Kosong</span>';
    }else{
        $id_barang_kategori_harga=$_POST['id_barang_kategori_harga'];
        $QryHarga = mysqli_query($Conn,"SELECT * FROM barang_kategori_harga WHERE id_barang_kategori_harga='$id_barang_kategori_harga'")or die(mysqli_error($Conn));
        $DataHarga = mysqli_fetch_array($QryHarga);
        $kategori_harga= $DataHarga['kategori_harga'];
        //Proses hapus data
        $HapusKategoriHarga= mysqli_query($Conn, "DELETE FROM barang_kategori_harga WHERE id_barang_kategori_harga='$id_barang_kategori_harga'") or die(mysqli_error($Conn));
        if($HapusKategoriHarga) {
            $KategoriLog="Barang";
            $KeteranganLog="Hapus kategori harga untuk $kategori_harga";
            include "../../_Config/InputLog.php";
            echo '<span class="text-success" id="NotifikasiTambahBarangBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Kategori Harga gagal</span>';
        }
    }
?>