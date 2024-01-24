<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['kategori_harga'])){
            $kategori_harga="0";
        }else{
            $kategori_harga=$_POST['kategori_harga'];
        }
        if(empty($_POST['harga_multi'])){
            echo '<span class="text-danger">Harga Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['id_barang_satuan'])){
                $id_barang_satuan_detail=0;
            }else{
                $id_barang_satuan_detail=$_POST['id_barang_satuan'];
            }
            $id_barang=$_POST['id_barang'];
            $harga_multi=$_POST['harga_multi'];
            $kategori_harga=$_POST['kategori_harga'];
            //Validasi duplikasi data
            $ValidasiDuplikatHarga=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$kategori_harga' AND id_barang_satuan='$id_barang_satuan_detail'"));
            if(!empty($ValidasiDuplikatHarga)){
                echo '<span class="text-danger">Data Sudah Ada!</span>';
            }else{
                //Simpan data
                $EnterMultiHarga="INSERT INTO barang_harga (
                    id_barang,
                    id_barang_satuan,
                    kategori_harga,
                    harga
                ) VALUES (
                    '$id_barang',
                    '$id_barang_satuan_detail',
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
                    echo '<small class="text-success" id="NotifikasiTambahKategoriHargaBerhasil">Success</small>';
                }else{
                    echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data satuan!</span>';
                }
            }
        }
    }
?>