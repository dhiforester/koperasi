<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['nama_supplier'])){
        echo '<span class="text-danger">Nama Supplier Tidak Boleh Kosong!</span>';
    }else{
        $nama_supplier=$_POST['nama_supplier'];
        if(empty($_POST['email_supplier'])){
            $email_supplier="";
        }else{
            $email_supplier=$_POST['email_supplier'];
        }
        if(empty($_POST['kontak_supplier'])){
            $kontak_supplier="";
        }else{
            $kontak_supplier=$_POST['kontak_supplier'];
            $JumlahKarakterKontak=strlen($_POST['kontak_supplier']);
            if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak_supplier'])){
                $ValidasiarakterKontak="Kontak hanya boleh terdiri dari 6-20 karakter numerik";
            }else{
                $ValidasiarakterKontak="";
            }
        }
        if(empty($_POST['alamat_supplier'])){
            $alamat_supplier=$_POST['alamat_supplier'];
        }else{
            $alamat_supplier=$_POST['alamat_supplier'];
        }
        if(!empty($ValidasiarakterKontak)){
            echo '<small class="text-danger">'.$ValidasiarakterKontak.'</small>';
        }else{
            //Validasi data duplikat
            $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier WHERE nama_supplier='$nama_supplier' AND email_supplier='$email_supplier' "));
            if(!empty($ValidasiDuplikat)){
                echo '<small class="text-danger">Data Identik sudah ada</small>';
            }else{
                //Simpan data
                $entry="INSERT INTO supplier (
                    nama_supplier,
                    alamat_supplier,
                    email_supplier,
                    kontak_supplier
                ) VALUES (
                    '$nama_supplier',
                    '$alamat_supplier',
                    '$email_supplier',
                    '$kontak_supplier'
                )";
                $Input=mysqli_query($Conn, $entry);
                if($Input){
                    $KategoriLog="Supplier";
                    $KeteranganLog="Input Supplier Baru";
                    include "../../_Config/InputLog.php";
                    $_SESSION ["NotifikasiSwal"]="Tambah Supplier Berhasil";
                    echo '<small class="text-success" id="NotifikasiTambahSupplierBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>