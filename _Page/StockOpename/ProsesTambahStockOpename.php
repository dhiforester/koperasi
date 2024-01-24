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
            $tanggal=$_POST['tanggal'];
            $status=$_POST['status'];
            //Validasi data duplikat
            $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename WHERE tanggal='$tanggal' AND status='$status'"));
            if(!empty($ValidasiDuplikat)){
                echo '<small class="text-danger">Data Tersebut sudah ada</small>';
            }else{
                //Simpan data
                $entry="INSERT INTO stok_opename (
                    id_akses,
                    tanggal,
                    status
                ) VALUES (
                    '$SessionIdAkses',
                    '$tanggal',
                    '$status'
                )";
                $Input=mysqli_query($Conn, $entry);
                if($Input){
                    $KategoriLog="Stock Opename";
                    $KeteranganLog="Buat Sesi Stock Opename";
                    include "../../_Config/InputLog.php";
                    $_SESSION ["NotifikasiSwal"]="Tambah Stock Opename Berhasil";
                    echo '<small class="text-success" id="NotifikasiTambahSesiStockOpenameBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>