<?php
    if(empty($_POST['pembayaran'])){
        $pembayaran=0;
    }else{
        $pembayaran=$_POST['pembayaran'];
    }
    if(empty($_POST['jumlah_transaksi'])){
        $jumlah_transaksi=0;
    }else{
        $jumlah_transaksi=$_POST['jumlah_transaksi'];
    }
    $kembalian=$pembayaran-$jumlah_transaksi;
    if($kembalian<0){
        $kembalian=0;
    }
    $KembalianRp="" . number_format($kembalian,0,',','.');
    echo "$KembalianRp";
?>