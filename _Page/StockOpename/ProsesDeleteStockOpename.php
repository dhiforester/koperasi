<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_stok_opename'])){
        echo '<span class="text-danger">ID Stock Opename Tidak Boleh Kosong</span>';
    }else{
        $id_stok_opename=$_POST['id_stok_opename'];
        $HapusStockOpename= mysqli_query($Conn, "DELETE FROM stok_opename WHERE id_stok_opename='$id_stok_opename'") or die(mysqli_error($Conn));
        if($HapusStockOpename) {
            $HapusStockOpenameBarang= mysqli_query($Conn, "DELETE FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename'") or die(mysqli_error($Conn));
            if($HapusStockOpenameBarang) {
                //Simpan Log
                $KategoriLog="Stock Opename";
                $KeteranganLog="Hapus Stock Opename Berhasil";
                include "../../_Config/InputLog.php";
                echo '<span class="text-success" id="NotifikasiHapusStockOpenameBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Stock Opename Barang Gagal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Stock Opename Gagal</span>';
        }
    }
?>