<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['id_supplier'])){
        echo '<span class="text-danger">ID Supplier Tidak Boleh Kosong!</span>';
    }else{
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
                //Buat Variabel
                $id_supplier=$_POST['id_supplier'];
                //Update Data
                $UpdateSupplier = mysqli_query($Conn,"UPDATE supplier SET 
                    nama_supplier='$nama_supplier',
                    email_supplier='$email_supplier',
                    kontak_supplier='$kontak_supplier',
                    alamat_supplier='$alamat_supplier'
                WHERE id_supplier='$id_supplier'") or die(mysqli_error($Conn)); 
                if($UpdateSupplier){
                    $KategoriLog="Supplier";
                    $KeteranganLog="Edit Supplier $nama_supplier";
                    include "../../_Config/InputLog.php";
                    echo '<small class="text-success" id="NotifikasiEditSupplierBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>