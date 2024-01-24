<?php
    session_destroy();   
    session_unset();
    session_start();
    $_SESSION ["id_akses"]="";
    header('Location:../../Login.php');
?>