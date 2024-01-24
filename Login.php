<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            //Koneksi
            include "_Config/Connection.php";
            include "_Config/SettingGeneral.php";
            $Page="Login";
            include "_Partial/JsPlugin.php";
            if(!empty($_GET['Notifikasi'])){
                $Notifikasi=$_GET['Notifikasi'];
            }else{
                $Notifikasi="";
            }
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
                                            <h5 class="card-title text-center pb-0 fs-4">Login Ke Akun Anda</h5>
                                            <p class="text-center small">Masukan Email Dan Password Untuk Melakukan Login</p>
                                            <?php
                                                if($Notifikasi=="Berhasil"){
                                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                                    echo '  Pendaftaran <b>Berhasil</b>, silahkan lakukan validasi email pada pesan yang kami kirim ke email anda. ';
                                                    echo '  Apabila anda tidak menerima email, kunjungi  <a href="UlangiVerifikasiEmail.php">halaman berikut</a>';
                                                    echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                    echo '</div>';
                                                }else{
                                                    if($Notifikasi=="KirimUlangValidasiEmailBerhasil"){
                                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                                        echo '  Kami telah mengirimkan ulang kode validasi email ke alamat yang anda input. ';
                                                        echo '  Silahkan cek kembali inbox email anda.</a>';
                                                        echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                        echo '</div>';
                                                    }else{
                                                        
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <form action="javascript:void(0);" class="row g-3" id="ProsesLogin">
                                            <div class="col-12">
                                                <label for="mode_akses" class="form-label">Mode Akses</label>
                                                <select name="mode_akses" id="mode_akses" class="form-control">
                                                    <option value="Pengurus">Pengurus</option>
                                                    <option value="Anggota">Anggota</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="email" name="email" class="form-control" id="email" required>
                                                    <div class="invalid-feedback">Please enter your username.</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                                <small class="credit">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword2" name="TampilkanPassword2">
                                                        <label class="form-check-label" for="TampilkanPassword2">
                                                            Tampilkan Password
                                                        </label>
                                                    </div>
                                                </small>
                                            </div>
                                            <div class="col-12" id="NotifikasiLogin">
                                                Pastikan email dan password sudah benar.
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit" id="TombolLogin">Login</button>
                                            </div>
                                            <div class="col-12">
                                                <a href="Pendaftaran.php" class="btn btn-warning w-100">
                                                    Daftar
                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <p class="small mb-0">Anda Lupa Password? <a href="LupaPassword.php">Reset password</a></p>
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
                    </div>
                    <?php
                        // include "_Partial/Copyright.php";
                    ?>
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