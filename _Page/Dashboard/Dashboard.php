<?php
    if($SessionAkses=="Anggota"){
        include "_Page/Dashboard/DashboardAnggota.php";
    }else{
        include "_Page/Dashboard/DashboardAdmin.php";
    }
?>