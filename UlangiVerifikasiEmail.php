<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            //Koneksi
            include "_Config/Connection.php";
            include "_Config/SettingGeneral.php";
            $Page="UlangiVerifikasiEmail";
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
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Verifikasi Email</h5>
                                            <p class="text-center small">Sistem akan mengirimkan ulang kode verifikasi ke email anda.</p>
                                            <p class="text-center small">Dalam kondisi teretntu mungkin email yang kami kirim akan masuk ke kotak spam.</p>
                                        </div>
                                        <form action="javascript:void(0);" class="row g-3" id="ProsesUlangiVerifikasiEmail">
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email" class="form-control" id="email" required>
                                                    <div class="invalid-feedback">Please enter your username.</div>
                                                </div>
                                            </div>
                                            <div class="col-12" id="NotifikasiUlangiVerifikasiEmail">
                                                <small>
                                                    Pastikan email yang anda masukan sudah benar.
                                                </small>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit" id="TombolResetPassword">Kirim</button>
                                            </div>
                                            <div class="col-12">
                                                <a href="Login.php" class="btn btn-dark w-100" type="button">Kembali Ke Login</a>
                                            </div>
                                        </form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <small class="credits">
                                    <small>
                                        <div class="copyright text-white">
                                            &copy; Copyright <strong><span><?php echo "$title_page"; ?></span></strong>. All Rights Reserved 2023
                                            Designed by <a href="https://parasilva.site" class="text-light">Parasilva Technology</a>
                                        </div>
                                    </small>
                                </small>
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
            //JS proses ada di halaman pendaftaran
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