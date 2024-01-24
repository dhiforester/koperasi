<?php
    if(empty($_GET['Sub'])){
        include "_Page/Komisi/KomisiHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailKomisi"){
            include "_Page/Komisi/DetailKomisi.php";
        }else{
            include "_Page/Komisi/KomisiHome.php";
        }
    }
?>