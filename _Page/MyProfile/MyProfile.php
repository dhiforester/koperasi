<?php
    if(!empty($_GET['Sub'])){
        $Sub=$_GET['Sub'];
        if($Sub=="EditProfile"){
            include "_Page/MyProfile/EditProfile.php";
        }else{
            if($Sub=="ChangePassword"){
                include "_Page/MyProfile/ChangePassword.php";
            }else{
                if($Sub=="EditProfileAnggota"){
                    include "_Page/MyProfile/EditProfileAnggota.php";
                }else{
                    if($Sub=="ChangePasswordAnggota"){
                        include "_Page/MyProfile/ChangePasswordAnggota.php";
                    }else{
                        include "_Page/MyProfile/DetailProfile.php";
                    }
                }
            }
        }
    }else{
        $Sub="";
        include "_Page/MyProfile/DetailProfile.php";
    }
?>