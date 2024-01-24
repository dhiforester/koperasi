<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        $id_barang=$_POST['id_barang'];
        if(empty($_POST['id_barang_satuan'])){
            $id_barang_satuan=0;
        }else{
            $id_barang_satuan=$_POST['id_barang_satuan'];
        }
        if(empty($_POST['id_barang_harga'])){
            $id_barang_harga="";
        }else{
            $id_barang_harga=$_POST['id_barang_harga'];
        }
        if(empty($_POST['kategori_harga'])){
            $kategori_harga="";
        }else{
            $kategori_harga=$_POST['kategori_harga'];
        }
        if(empty($_POST['harga_multi'])){
            $harga_multi="";
        }else{
            $harga_multi=$_POST['harga_multi'];
        }
        if(!empty($_POST['id_barang_harga'])){
            //Validasi duplikasi data
            $UpdateKategoriHargaBarang = mysqli_query($Conn,"UPDATE barang_harga SET 
                id_barang_satuan='$id_barang_satuan',
                kategori_harga='$kategori_harga',
                harga='$harga_multi'
            WHERE id_barang_harga='$id_barang_harga'") or die(mysqli_error($Conn)); 
            if($UpdateKategoriHargaBarang){
                $QryHarga = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang_harga='$id_barang_harga'")or die(mysqli_error($Conn));
                $DataHarga = mysqli_fetch_array($QryHarga);
                $id_barang= $DataHarga['id_barang'];
                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                $DataBarang = mysqli_fetch_array($QryBarang);
                $nama_barang= $DataBarang['nama_barang'];
                $KategoriLog="Barang";
                $KeteranganLog="Edit multi harga untuk $nama_barang";
                include "../../_Config/InputLog.php";
                $_SESSION ["NotifikasiSwal"]="Update Kategori Harga Berhasil";
                echo '<small class="text-success" id="NotifikasiEditKategoriHargaBerhasil">Success</small>';
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data satuan!</span>';
            }
        }else{
            //Simpan data
            $EnterMultiHarga="INSERT INTO barang_harga (
                id_barang,
                id_barang_satuan,
                kategori_harga,
                harga
            ) VALUES (
                '$id_barang',
                '$id_barang_satuan',
                '$kategori_harga',
                '$harga_multi'
            )";
            $InputMultiHarga=mysqli_query($Conn, $EnterMultiHarga);
            if($InputMultiHarga){
                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                $DataBarang = mysqli_fetch_array($QryBarang);
                $nama_barang= $DataBarang['nama_barang'];
                $KategoriLog="Barang";
                $KeteranganLog="Tambah multi harga untuk $nama_barang";
                include "../../_Config/InputLog.php";
                $_SESSION ["NotifikasiSwal"]="Tambah Harga Berhasil";
                echo '<small class="text-success" id="NotifikasiEditKategoriHargaBerhasil">Success</small>';
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data satuan!</span>';
            }
        }
    }
?>