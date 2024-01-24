<?php
    if(empty($_GET['Sub'])){
        include "_Page/Supplier/SupplierHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailSupplier"){
            include "_Page/Supplier/DetailSupplier.php";
        }else{
            if($Sub=="Import"){
                include "_Page/Supplier/ImportSupplier.php";
            }else{
                include "_Page/Supplier/SupplierHome.php";
            }
        }
    }
?>