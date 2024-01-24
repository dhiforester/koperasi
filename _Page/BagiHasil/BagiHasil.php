<?php
    if(empty($_GET['Sub'])){
        include "_Page/BagiHasil/BagiHasilHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailBagiHasil"){
            include "_Page/BagiHasil/DetailBagiHasil.php";
        }else{
            include "_Page/BagiHasil/BagiHasilHome.php";
        }
    }
?>