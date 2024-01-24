<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_barang_satuan'])){
        echo '<span class="text-danger">ID Satuan Baraang Tidak Boleh Kosong</span>';
    }else{
        $id_barang_satuan=$_POST['id_barang_satuan'];
        //Buka multi satuan
        $QrySatuan = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
        $DataSatuan = mysqli_fetch_array($QrySatuan);
        $id_barang= $DataSatuan['id_barang'];
        $satuan_multi= $DataSatuan['satuan_multi'];
        //Buka data barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $nama_barang= $DataBarang['nama_barang'];
        //Proses hapus data
        $HapusBarangSatuan= mysqli_query($Conn, "DELETE FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'") or die(mysqli_error($Conn));
        if($HapusBarangSatuan) {
            //Simpan Log
            $KategoriLog="Barang";
            $KeteranganLog="Hapus satuan $satuan_multi untuk $nama_barang";
            include "../../_Config/InputLog.php";
            $_SESSION ["NotifikasiSwal"]="Hapus Satuan Berhasil";
            echo '<span class="text-success" id="NotifikasiHapusSatuanBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Harga Satuan gagal</span>';
        }
    }
?>