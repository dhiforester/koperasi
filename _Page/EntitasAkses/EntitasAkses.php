<?php
    if(empty($_GET['Sub'])){
        include "_Page/EntitasAkses/EntitasAksesHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="BuatEntitas"){
            include "_Page/EntitasAkses/BuatEntitas.php";
        }else{
            if($Sub=="EditEntitas"){
                include "_Page/EntitasAkses/EditEntitas.php";
            }else{
                include "_Page/EntitasAkses/EntitasAksesHome.php";
            }
        }
    }
?>