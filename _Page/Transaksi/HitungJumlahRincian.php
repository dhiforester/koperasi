<?php
    if(empty($_POST['harga_rincian2'])){
        $harga_rincian2=0;
    }else{
        $harga_rincian2=$_POST['harga_rincian2'];
    }
    if(empty($_POST['qty_rincian2'])){
        $qty_rincian2=0;
    }else{
        $qty_rincian2=$_POST['qty_rincian2'];
    }
    $JumlahRincian=$qty_rincian2*$harga_rincian2;
    echo "$JumlahRincian";
?>