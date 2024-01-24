<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong</span>';
    }else{
        $id_barang=$_POST['id_barang'];
        //Proses hapus data
        $HapusBarang= mysqli_query($Conn, "DELETE FROM barang WHERE id_barang='$id_barang'") or die(mysqli_error($Conn));
        if ($HapusBarang) {
            $HapusBarangHarga= mysqli_query($Conn, "DELETE FROM barang_harga WHERE id_barang='$id_barang'") or die(mysqli_error($Conn));
            if($HapusBarangHarga) {
                $HapusBarangSatuan= mysqli_query($Conn, "DELETE FROM barang_satuan WHERE id_barang='$id_barang'") or die(mysqli_error($Conn));
                if($HapusBarangSatuan) {
                    echo '<span class="text-success" id="NotifikasiHapusBarangBerhasil">Success</span>';
                }else{
                    echo '<span class="text-danger">Hapus Harga Satuan gagal</span>';
                }
            }else{
                echo '<span class="text-danger">Hapus Harga Barang gagal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Barang Gagal</span>';
        }
    }
?>