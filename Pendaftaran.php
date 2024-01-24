<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            //Koneksi
            include "_Config/Connection.php";
            include "_Config/SettingGeneral.php";
            $Page="Pendaftaran";
            include "_Partial/JsPlugin.php";
        ?>
    </head>
    <body>
        <main class="login_background">
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-sm-8 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.php" class="logo d-flex align-items-center w-auto">
                                        <img src="assets/img/<?php echo $logo;?>" alt="">
                                        <span class="d-none d-lg-block"><?php echo $title_page;?></span>
                                    </a>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Pendaftaran</h5>
                                            <p class="text-center small">Lengkapi data pendaftaran dengan informasi yang valid</p>
                                        </div>
                                        <form action="javascript:void(0);" class="row g-3" id="ProsesPendaftaran" autocomplete="off">
                                            <div class="col-md-6">
                                                <label for="nama_akses" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="nama_akses" class="form-control" id="nama_akses" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="kontak_akses" class="form-label">Kontak</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">+62</span>
                                                    <input type="text" name="kontak_akses" class="form-control" id="kontak_akses" required>
                                                    <div class="invalid-feedback">Masukan nomor kontak HP / WA</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="email_akses" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email_akses" class="form-control" id="email_akses" required>
                                                    <div class="invalid-feedback">Please enter your username.</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password1" class="form-label">Password</label>
                                                <input type="password" name="password1" class="form-control" id="password1" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password2" class="form-label">Ulangi Password</label>
                                                <input type="password" name="password2" class="form-control" id="password2" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <div class="col-md-12">
                                                <small class="credit">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword3" name="TampilkanPassword3">
                                                        <label class="form-check-label" for="TampilkanPassword3">
                                                            Tampilkan Password
                                                        </label>
                                                    </div>
                                                </small>
                                            </div>
                                            <div class="col-md-12" id="NotifikasiPendaftaran">
                                                Pastikan informasi pendaftaran sudah benar.
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <button class="btn btn-primary w-100" type="submit" id="TombolDaftar">Daftar</button>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <a href="Login.php" class="btn btn-dark w-100">Kembali</a>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="small mb-0">
                                                    Apabila anda tidak menerima email setelah pendaftaran, kunjungi  <a href="UlangiVerifikasiEmail.php">halaman berikut.</a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
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
            $('#TampilkanPassword3').click(function(){
                if($(this).is(':checked')){
                    $('#password1').attr('type','text');
                    $('#password2').attr('type','text');
                }else{
                    $('#password1').attr('type','password');
                    $('#password2').attr('type','password');
                }
            });
        </script>
    </body>

</html>