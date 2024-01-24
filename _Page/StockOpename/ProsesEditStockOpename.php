<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['tanggal'])){
        echo '<span class="text-danger">Tanggal Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['status'])){
            echo '<span class="text-danger">Status Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['id_stok_opename'])){
                echo '<span class="text-danger">ID Stock Opename Tidak Boleh Kosong!</span>';
            }else{
                $id_stok_opename=$_POST['id_stok_opename'];
                $tanggal=$_POST['tanggal'];
                $status=$_POST['status'];
                $UpdateStockOpename = mysqli_query($Conn,"UPDATE stok_opename SET 
                    tanggal='$tanggal',
                    status='$status'
                WHERE id_stok_opename='$id_stok_opename'") or die(mysqli_error($Conn)); 
                if($UpdateStockOpename){
                    $KategoriLog="Stock Opename";
                    $KeteranganLog="Edit Sesi Stock Opename";
                    include "../../_Config/InputLog.php";
                    echo '<small class="text-success" id="NotifikasiEditStockOpenameBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>