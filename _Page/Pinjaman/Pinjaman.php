<?php
    if(empty($_GET['Sub'])){
        include "_Page/Pinjaman/PinjamanHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailPinjaman"){
            include "_Page/Pinjaman/DetailPinjaman.php";
        }else{
            if($Sub=="Import"){
                include "_Page/Pinjaman/ImportPinjaman.php";
            }else{
                if($Sub=="TambahPinjaman"){
                    include "_Page/Pinjaman/TambahPinjaman.php";
                }else{
                    include "_Page/Pinjaman/PinjamanHome.php";
                }
            }
        }
    }
?>