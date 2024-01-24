<?php
    if(empty($_GET['Sub'])){
        include "_Page/Error/PageNotFound.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="NoAccess"){
            include "_Page/Error/NoAccess.php";
        }else{
            if($Sub=="UnderConstruction"){
                include "_Page/Error/UnderConstruction.php";
            }else{
                include "_Page/Error/PageNotFound.php";
            }
        }
    }
?>