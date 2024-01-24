<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    if(empty($_POST['tanggal'])){
        echo '<span class="text-danger">Tanggal Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['jam'])){
            echo '<span class="text-danger">Jam Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['id_pembayaran'])){
                echo '<span class="text-danger">ID Pembayaran Tidak Boleh Kosong</span>';
            }else{
                if(!empty($_POST['metode'])){
                    $metode=$_POST['metode'];
                }else{
                    $metode="";
                }
                if(!empty($_POST['metode'])){
                    $metode=$_POST['metode'];
                }else{
                    $metode="";
                }
                if(!empty($_POST['jumlah'])){
                    $jumlah=$_POST['jumlah'];
                }else{
                    $jumlah="0";
                }
                if(!empty($_POST['keterangan'])){
                    $keterangan=$_POST['keterangan'];
                }else{
                    $keterangan="";
                }
                $id_pembayaran=$_POST['id_pembayaran'];
                $tanggal=$_POST['tanggal'];
                $jam=$_POST['jam'];
                $tanggal="$tanggal $jam";
                $jumlah= str_replace(".", "", $jumlah);
                //Update Pembayaran
                $UpdatePembayaran = mysqli_query($Conn,"UPDATE transaksi_pembayaran SET 
                    tanggal='$tanggal',
                    metode='$metode',
                    jumlah='$jumlah',
                    keterangan='$keterangan'
                WHERE id_pembayaran='$id_pembayaran'") or die(mysqli_error($Conn)); 
                if($UpdatePembayaran){
                    $KategoriLog="Pembayaran";
                    $KeteranganLog="Edit Pembayaran Berhasil";
                    include "../../_Config/InputLog.php";
                    $_SESSION ["NotifikasiSwal"]="Simpan Pembayaran Berhasil";
                    echo '<small class="text-success" id="NotifikasiEditPembayaranBerhasil">Success</small>';
                }else{
                    echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data!</span>';
                }
            }
        }
    }
?>