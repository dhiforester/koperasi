<?php
    if(empty($_GET['Sub'])){
        include "_Page/Tabungan/TabunganHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailTabungan"){
            include "_Page/Tabungan/DetailTabungan.php";
        }else{
            if($Sub=="Import"){
                include "_Page/Tabungan/ImportTabungan.php";
            }else{
                if($Sub=="TambahTabungan"){
                    include "_Page/Tabungan/TambahTabungan.php";
                }else{
                    include "_Page/Tabungan/TabunganHome.php";
                }
            }
        }
    }
?>