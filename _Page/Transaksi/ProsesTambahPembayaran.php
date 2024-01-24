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
            //Inisiasi Variable
            if(!empty($_POST['id_transaksi'])){
                $id_transaksi=$_POST['id_transaksi'];
            }else{
                $id_transaksi=0;
            }
            if(!empty($_POST['id_akses'])){
                $id_akses=$_POST['id_akses'];
            }else{
                $id_akses=0;
            }
            if(!empty($_POST['id_anggota'])){
                $id_anggota=$_POST['id_anggota'];
            }else{
                $id_anggota=0;
            }
            if(!empty($_POST['id_supplier'])){
                $id_supplier=$_POST['id_supplier'];
            }else{
                $id_supplier=0;
            }
            if(!empty($_POST['kategori'])){
                $kategori=$_POST['kategori'];
            }else{
                $kategori="";
            }
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
            $tanggal=$_POST['tanggal'];
            $jam=$_POST['jam'];
            $tanggal="$tanggal $jam";
            $jumlah= str_replace(".", "", $jumlah);
            //Cek Duplikasi data
            $QryDuplikasiData = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi' AND tanggal='$tanggal'")or die(mysqli_error($Conn));
            $DataDuplikasi = mysqli_fetch_array($QryDuplikasiData);
            if(!empty($DataDuplikasi['id_pembayaran'])){
                echo '<span class="text-danger">Data Tersebut Sudah Ada</span>';
            }else{
                //Simpan data
                $EntryData="INSERT INTO transaksi_pembayaran (
                    id_transaksi,
                    id_akses,
                    id_anggota,
                    id_supplier,
                    kategori,
                    tanggal,
                    metode,
                    jumlah,
                    keterangan
                ) VALUES (
                    '$id_transaksi',
                    '$SessionIdAkses',
                    '$id_anggota',
                    '$id_supplier',
                    '$kategori',
                    '$tanggal',
                    '$metode',
                    '$jumlah',
                    '$keterangan'
                )";
                $InputData=mysqli_query($Conn, $EntryData);
                if($InputData){
                    $KategoriLog="Pembayaran";
                    $KeteranganLog="Tambah Pembayaran Berhasil";
                    include "../../_Config/InputLog.php";
                    $_SESSION ["NotifikasiSwal"]="Simpan Pembayaran Berhasil";
                    echo '<small class="text-success" id="NotifikasiTambahPembayaranBerhasil">Success</small>';
                }else{
                    echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data!</span>';
                }
            }
        }
    }
?>