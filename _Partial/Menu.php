<?php
    if(empty($_GET['Page'])){
        $PageMenu="";
    }else{
        $PageMenu=$_GET['Page'];
    }
    if(empty($_GET['Sub'])){
        $SubMenu="";
    }else{
        $SubMenu=$_GET['Sub'];
    }
    if($SessionAkses=="Anggota"){
        include "_Partial/MenuAnggota.php";
    }else{
        include "_Partial/MenuPengurus.php";
    }
?>
 
