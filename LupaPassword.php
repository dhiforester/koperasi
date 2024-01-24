<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            //Koneksi
            include "_Config/Connection.php";
            include "_Config/SettingGeneral.php";
            $Page="Login";
            include "_Partial/JsPlugin.php";
        ?>
    </head>
    <body>
        <main class="login_background">
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                                        <img src="assets/img/<?php echo $logo;?>" alt="">
                                        <span class="d-none d-lg-block"><?php echo $title_page;?></span>
                                    </a>
                                </div>
                                <div class="card mb-3">
                                    <?php
                                        if(!empty($_GET['Page'])){
                                            $Page=$_GET['Page'];
                                            if($Page=="KirimKodeBerhasil"){
                                                include "_Page/ResetPassword/KirimKodeBerhasil.php";
                                            }else{
                                                if($Page=="UbahPassword"){
                                                    include "_Page/ResetPassword/FormUbahPassword.php";
                                                }else{
                                                    if($Page=="Berhasil"){
                                                        include "_Page/ResetPassword/Berhasil.php";
                                                    }else{
                                                        include "_Page/ResetPassword/FormKirimKode.php";
                                                    }
                                                }
                                            }
                                        }else{
                                            include "_Page/ResetPassword/FormKirimKode.php";
                                        }
                                    ?>
                                </div>
                                <div class="credits">
                                    <small>
                                        <div class="copyright text-white">
                                            &copy; Copyright <strong><span><?php echo "$title_page"; ?></span></strong>. All Rights Reserved 2023
                                        </div>
                                        <div class="credits">
                                            Designed by <a href="https://parasilva.site" class="text-light">Parasilva Technology</a>
                                        </div>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    </main>
        <?php
            include "_Partial/BackToTop.php";
            include "_Partial/FooterJs.php";
            include "_Partial/RoutingJs.php";
        ?>
        <script>
            //Kondisi saat tampilkan password
            $('#TampilkanPassword2').click(function(){
                if($(this).is(':checked')){
                    $('#password').attr('type','text');
                }else{
                    $('#password').attr('type','password');
                }
            });
        </script>
    </body>

</html>