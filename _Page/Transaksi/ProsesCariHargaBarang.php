<?php
    //Koneksi
    include "../../_Config/Connection.php";
    //Tangkap Data
    if(empty($_POST['id_barang'])){
        echo "0";
    }else{
        $id_barang=$_POST['id_barang'];
        if(empty($_POST['rincian_satuan_barang'])){
            $id_barang_satuan=0;
            if(empty($_POST['kategori_harga'])){
                $kategori_harga="";
                $QryBarangDetail = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                $DataBarangDetail = mysqli_fetch_array($QryBarangDetail);
                $harga_beli= $DataBarangDetail['harga_beli'];
                $HargaBarang=$harga_beli;
                echo "$HargaBarang";
            }else{
                $kategori_harga=$_POST['kategori_harga'];
                //Mencari harga pada database barang_harga
                $QryHargaBarang = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND id_barang_satuan='$id_barang_satuan' AND kategori_harga='$kategori_harga'")or die(mysqli_error($Conn));
                $DataBarang = mysqli_fetch_array($QryHargaBarang);
                if(empty($DataBarang['harga'])){
                    $HargaBarang=0;
                }else{
                    $HargaBarang=$DataBarang['harga'];
                }
                echo "$HargaBarang";
            }
        }else{
            $id_barang_satuan=$_POST['rincian_satuan_barang'];
            if(empty($_POST['kategori_harga'])){
                $kategori_harga="";
                //Mencari harga pada database barang_harga
                $QryHargaBarang = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND id_barang_satuan='$id_barang_satuan' AND kategori_harga='$kategori_harga'")or die(mysqli_error($Conn));
                $DataBarang = mysqli_fetch_array($QryHargaBarang);
                if(empty($DataBarang['harga'])){
                    $HargaBarang=0;
                }else{
                    $HargaBarang=$DataBarang['harga'];
                }
                echo "$HargaBarang";
            }else{
                $kategori_harga=$_POST['kategori_harga'];
                //Mencari harga pada database barang_harga
                $QryHargaBarang = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND id_barang_satuan='$id_barang_satuan' AND kategori_harga='$kategori_harga'")or die(mysqli_error($Conn));
                $DataBarang = mysqli_fetch_array($QryHargaBarang);
                if(empty($DataBarang['harga'])){
                    $QryBarangDetail = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                    $DataBarangDetail = mysqli_fetch_array($QryBarangDetail);
                    $harga_beli= $DataBarangDetail['harga_beli'];
                    $HargaBarang=$harga_beli;
                }else{
                    $HargaBarang=$DataBarang['harga'];
                }
                echo "$HargaBarang";
            }
        }    
        
    }
?>