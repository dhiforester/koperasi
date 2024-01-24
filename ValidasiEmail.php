<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            //Koneksi
            include "_Config/Connection.php";
            include "_Config/SettingGeneral.php";
            include "_Config/SettingEmail.php";
            $Page="Login";
            include "_Partial/JsPlugin.php";
            date_default_timezone_set("Asia/Jakarta");
            $now=date('Y-m-d H:i:s');
            //Tangkap Token
            if(empty($_GET['Token'])){
                $HasilValidasi="Kode Token Tidak Boleh Kosong!";
            }else{
                $Token=$_GET['Token'];
                //Validasi Token ada atai tidak
                $QryValidasiAkses = mysqli_query($Conn,"SELECT * FROM akses_validasi WHERE token='$Token'")or die(mysqli_error($Conn));
                $DataValidasiAkses = mysqli_fetch_array($QryValidasiAkses);
                //Apabila data token akses tidak ada
                if(empty($DataValidasiAkses['id_akses_anggota'])){
                    $HasilValidasi="Kode Token Yang Anda Gunakan Tidak Valid<br><small>$Token</small>";
                }else{
                    $id_akses_anggota= $DataValidasiAkses['id_akses_anggota'];
                    //Lakukan update status akses
                    $UpdateAkses = mysqli_query($Conn,"UPDATE akses_anggota SET 
                        tanggal='$now',
                        status='Requested'
                    WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn)); 
                    if($UpdateAkses){
                        //Hapus Validasi Email
                        $HapusValidasiEmail = mysqli_query($Conn, "DELETE FROM akses_validasi WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn));
                        if($HapusValidasiEmail) {
                            $HasilValidasi="Success";
                        }
                    }else{
                        $HasilValidasi="Access Data Update Failed";
                    }
                }
            }
            if(!empty($redirect_validasi)){
                if($HasilValidasi=="Success"){
                    header("Location:$redirect_validasi?Code=200&message=$HasilValidasi");
                }else{
                    header("Location:$redirect_validasi?Code=2001&message=$HasilValidasi");
                }
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                    if($HasilValidasi=="Success"){
                                                        echo '<h5 class="card-title text-center pb-0 fs-4">Success!</h5>';
                                                        echo '<p class="text-center small">Access validation successful</p>';
                                                    }else{
                                                        echo '<h5 class="card-title text-center text-danger pb-0 fs-4">Oops!</h5>';
                                                        echo '<p class="text-center small">'.$HasilValidasi.'</p>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a href="Login.php" class="btn btn-primary w-100">Login to your account</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="credits">
                                    <div class="copyright text-white">
                                        &copy; Copyright <strong><span><?php echo "$title_page"; ?></span></strong>. All Rights Reserved 2023
                                        Designed by <a href="https://parasilva.site" class="text-light">Parasilva Technology</a>
                                    </div>
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
    </body>

</html>