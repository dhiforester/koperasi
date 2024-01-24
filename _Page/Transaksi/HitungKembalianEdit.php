<?php
    if(empty($_POST['jumlah_transaksi_edit'])){
        $jumlah_transaksi_edit=0;
    }else{
        $jumlah_transaksi_edit=$_POST['jumlah_transaksi_edit'];
    }
    if(empty($_POST['pembayaran_edit'])){
        $pembayaran_edit=0;
    }else{
        $pembayaran_edit=$_POST['pembayaran_edit'];
    }
    $jumlah_transaksi_edit= str_replace(".", "", $jumlah_transaksi_edit);
    $pembayaran_edit= str_replace(".", "", $pembayaran_edit);
    $kembalian=$pembayaran_edit-$jumlah_transaksi_edit;
    if($kembalian<0){
        $kembalian=0;
    }
    $KembalianRp="" . number_format($kembalian,0,',','.');
    echo "$KembalianRp";
?>