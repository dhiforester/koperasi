<?php
    if(empty($_GET['Sub'])){
        include "_Page/Help/HelpHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="HelpData"){
            include "_Page/Help/HelpData.php";
        }else{
            if($Sub=="HelpHome"){
                include "_Page/Help/HelpHome.php";
            }else{
                if($Sub=="TambahHelp"){
                    include "_Page/Help/FormTambahHelp.php";
                }else{
                    if($Sub=="EditHelp"){
                        include "_Page/Help/FormEditHelp.php";
                    }else{
                        if($Sub=="DetailHelp"){
                            include "_Page/Help/DetailHelp.php";
                        }
                    }
                }
            }
        }
    }
?>