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
    if($jumlah_transaksi>$pembayaran){
        echo '<option value="Pending">Pending</option>';
    }else{
        echo '<option value="Lunas">Lunas</option>';
    }
?>