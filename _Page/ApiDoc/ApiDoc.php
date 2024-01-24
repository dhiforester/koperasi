<?php
    if(empty($_GET['Sub'])){
        include "_Page/ApiDoc/ApiDocHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="TambahApiDoc"){
            include "_Page/ApiDoc/FormTambahApiDoc.php";
        }else{
            if($Sub=="ApiDocViewer"){
                include "_Page/ApiDoc/ApiDocViewer.php";
            }else{
                if($Sub=="ApiDocEditor"){
                    include "_Page/ApiDoc/ApiDocEditor.php";
                }else{
        
                }
            }
        }
    }
?>