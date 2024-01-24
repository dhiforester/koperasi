<?php
    if(!empty($_POST['KategoriTransaksi'])){
        $KategoriTransaksi=$_POST['KategoriTransaksi'];
    }else{
        $KategoriTransaksi="Semua Kategori";
    }
    if(!empty($_POST['StatusStransaksi'])){
        $StatusStransaksi=$_POST['StatusStransaksi'];
    }else{
        $StatusStransaksi="Semua Status";
    }
    if(!empty($_POST['Periode'])){
        $Periode=$_POST['Periode'];
    }else{
        $Periode="Bulanan";
    }
    if(!empty($_POST['Tahun'])){
        $tahun=$_POST['Tahun'];
    }else{
        $tahun=date('Y');
    }
    if(!empty($_POST['Bulan'])){
        $Bulan=$_POST['Bulan'];
    }else{
        $Bulan=date('m');
    }
    $WaktuFormating="$tahun-$Bulan-01";
    $Waktu = strtotime($WaktuFormating);
    if($Periode=="Bulanan"){
        $WaktuFormating="$tahun-$Bulan-01";
        $Waktu = strtotime($WaktuFormating);
        $Waktu = date('F Y', $Waktu);
        $Waktu="Bulan $Waktu";
    }else{
        $Waktu="Tahun $tahun";
    }
    echo "Transaksi $KategoriTransaksi /$StatusStransaksi <span>/$Waktu</span>";
?>