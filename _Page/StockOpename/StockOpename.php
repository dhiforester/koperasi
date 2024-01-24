<?php
    if(empty($_GET['Sub'])){
        include "_Page/StockOpename/StockOpenameHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailStockOpename"){
            include "_Page/StockOpename/DetailStockOpename.php";
        }else{
            include "_Page/StockOpename/StockOpenameHome.php";
        }
    }
?>