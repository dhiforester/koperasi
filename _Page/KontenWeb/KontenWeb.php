<?php
    if(empty($_GET['Sub'])){
        include "_Page/KontenWeb/KontenUmum.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="KontenUmum"){
            include "_Page/KontenWeb/KontenUmum.php";
        }else{
            if($Sub=="PagePosting"){
                include "_Page/KontenWeb/PagePosting.php";
            }else{
                if($Sub=="TambahPagePosting"){
                    include "_Page/KontenWeb/FormTambahPagePosting.php";
                }else{
                    if($Sub=="DetailPagePosting"){
                        include "_Page/KontenWeb/DetailPagePosting.php";
                    }else{
                        if($Sub=="EditPagePosting"){
                            include "_Page/KontenWeb/EditPagePosting.php";
                        }else{
                            if($Sub=="UrlDinamis"){
                                include "_Page/KontenWeb/UrlDinamis.php";
                            }else{
                                if($Sub=="Testimoni"){
                                    include "_Page/KontenWeb/Testimoni.php";
                                }else{
                                    if($Sub=="FAQ"){
                                        include "_Page/KontenWeb/FAQ.php";
                                    }else{
                                        if($Sub=="Banner"){
                                            include "_Page/KontenWeb/Banner.php";
                                        }else{
                                            include "_Page/KontenWeb/KontenUmum.php";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>