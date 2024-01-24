<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Menangkap data id_simpanan
    if(empty($_POST['id_simpanan'])){
        echo "<span class='text-danger'>ID Simpanan/Tabungan Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['tanggal'])){
            echo "<span class='text-danger'>Tanggal Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['jumlah'])){
                echo "<span class='text-danger'>Jumlah Simpanan Tidak Boleh Kosong!!</span>";
            }else{
                $id_simpanan=$_POST['id_simpanan'];
                $jumlah=$_POST['jumlah'];
                $tanggal=$_POST['tanggal'];
                $jumlah=$_POST['jumlah'];
                if(empty($_POST['keterangan'])){
                    $keterangan="";
                }else{
                    $keterangan=$_POST['keterangan'];
                }
                $UpdateSimpanan = mysqli_query($Conn,"UPDATE simpanan SET 
                    tanggal='$tanggal',
                    keterangan='$keterangan',
                    jumlah='$jumlah'
                WHERE id_simpanan='$id_simpanan'") or die(mysqli_error($Conn)); 
                if($UpdateSimpanan){
                    $KategoriLog="Tabungan";
                    $KeteranganLog="Edit Tabungan Berhasil";
                    include "../../_Config/InputLog.php";
                    echo '<small class="text-success" id="NotifikasiEditTabunganBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>