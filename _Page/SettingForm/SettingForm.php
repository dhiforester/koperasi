<?php
    if(empty($_GET['Sub'])){
        include "_Page/SettingForm/SettingFormHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="TambahSettingForm"){
            include "_Page/SettingForm/TambahSettingForm.php";
        }else{
            if($Sub=="EditSettingForm"){
                include "_Page/SettingForm/EditSettingForm.php";
            }else{
                include "_Page/SettingForm/SettingFormHome.php";
            }
        }
    }
?>