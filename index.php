<?php
    //Koneksi
    include "_Config/Connection.php";
    //Session
    include "_Config/Session.php";
    include "_Partial/FungsiAkses.php";
    include "_Config/SettingGeneral.php";
    include "_Config/Notifikasi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include "_Partial/JsPlugin.php";
        ?>
    </head>
    <body>
        <?php
            include "_Partial/Navbar.php";
            include "_Partial/Menu.php";
        ?>
        <main id="main" class="main">
            <?php
                include "_Partial/PageTitle.php";
                include "_Partial/RoutingPage.php";
                include "_Partial/Modal.php";
            ?>
        </main>
        <?php
            include "_Partial/Copyright.php";
            include "_Partial/BackToTop.php";
            include "_Partial/FooterJs.php";
            include "_Partial/RoutingJs.php";
            include "_Partial/RoutingSwal.php";
        ?>
    </body>
</html>