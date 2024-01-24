<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['kategori'])){
        echo '<span class="text-danger">Kategori Kosong!</span>';
    }else{
        $kategori_harga=$_POST['kategori'];
        //Validasi duplikasi data
        $ValidasiDuplikatHarga=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga WHERE kategori_harga='$kategori_harga'"));
        if(!empty($ValidasiDuplikatHarga)){
            echo '<span class="text-danger">Data Sudah Ada!</span>';
        }else{
            //Simpan data
            $EnterMultiHarga="INSERT INTO barang_kategori_harga (
                kategori_harga
            ) VALUES (
                '$kategori_harga'
            )";
            $InputMultiHarga=mysqli_query($Conn, $EnterMultiHarga);
            if($InputMultiHarga){
                $KategoriLog="Barang";
                $KeteranganLog="Tambah kategori harga untuk $kategori_harga";
                include "../../_Config/InputLog.php";
                echo '<small class="text-success" id="NotifikasiTambahKategoriHargaBarangBerhasil">Success</small>';
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data satuan!</span>';
            }
        }
    }
?>