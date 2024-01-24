<?php
    if(empty($_GET['Sub'])){
        include "_Page/Transaksi/TransaksiHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="TambahTransaksi"){
            include "_Page/Transaksi/TambahTransaksi.php";
        }else{
            if($Sub=="EditTransaksi"){
                include "_Page/Transaksi/EditTransaksi.php";
            }else{
                if($Sub=="DetailTransaksi"){
                    include "_Page/Transaksi/DetailTransaksi.php";
                }else{
                    include "_Page/Transaksi/TransaksiHome.php";
                }
            }
        }
    }
?>