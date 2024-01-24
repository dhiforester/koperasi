<?php
    if(empty($_GET['Sub'])){
        include "_Page/Pembayaran/PembayaranHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="TambahPembayaran"){
            include "_Page/Pembayaran/TambahPembayaran.php";
        }else{
            if($Sub=="EditPembayaran"){
                include "_Page/Pembayaran/EditPembayaran.php";
            }
        }
    }
?>