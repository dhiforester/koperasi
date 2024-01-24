<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_stok_opename_barang'])){
        echo '<span class="text-danger">ID Stock Opename Barang Tidak Boleh Kosong</span>';
    }else{
        $id_stok_opename_barang=$_POST['id_stok_opename_barang'];
        $HapusStockOpenameBarang= mysqli_query($Conn, "DELETE FROM stok_opename_barang WHERE id_stok_opename_barang='$id_stok_opename_barang'") or die(mysqli_error($Conn));
        if($HapusStockOpenameBarang) {
            //Simpan Log
            $KategoriLog="Stock Opename";
            $KeteranganLog="Hapus Stock Opename Berhasil";
            include "../../_Config/InputLog.php";
            echo '<span class="text-success" id="NotifikasiHapusStockOpenameBarangBerhasasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Stock Opename Barang Gagal</span>';
        }
    }
?>