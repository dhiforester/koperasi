<?php
    if(empty($_GET['Sub'])){
        include "_Page/Aktivitas/AktivitasUmum.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="AktivitasUmum"){
            include "_Page/Aktivitas/AktivitasUmum.php";
        }else{
            if($Sub=="APIs"){
                include "_Page/Aktivitas/AktivitasApis.php";
            }else{
                if($Sub=="Email"){
                    include "_Page/Aktivitas/AktivitasEmail.php";
                }else{
                    include "_Page/Aktivitas/AktivitasUmum.php";
                }
            }
        }
    }
?>