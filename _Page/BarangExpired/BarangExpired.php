<?php
    if(empty($_GET['Sub'])){
        include "_Page/BarangExpired/BarangExpiredHome.php";
    }else{
        if($_GET['Sub']=="TambahBarangExpired"){
            include "_Page/BarangExpired/TambahBarangExpired.php";
        }else{
            if($_GET['Sub']=="Import"){
                include "_Page/BarangExpired/ImportBarangExpired.php";
            }else{
                include "_Page/BarangExpired/BarangExpiredHome.php";
            }
        }
    }
?>