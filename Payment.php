<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            //Koneksi
            include "_Config/Connection.php";
            include "_Config/SettingGeneral.php";
            $Page="Login";
            include "_Partial/JsPlugin.php";
            if(empty($_GET['snap_token'])){
                $snap_token="";
            }else{
                $snap_token=$_GET['snap_token'];
                $QryPembayaran = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE snap_token='$snap_token'")or die(mysqli_error($Conn));
                $DataPembayaran = mysqli_fetch_array($QryPembayaran);
                $id_pembayaran=$DataPembayaran['id_pembayaran'];
                $id_transaksi=$DataPembayaran['id_transaksi'];
                $id_akses=$DataPembayaran['id_akses'];
                $id_pasien=$DataPembayaran['id_pasien'];
                $id_kunjungan=$DataPembayaran['id_kunjungan'];
                $id_mitra=$DataPembayaran['id_mitra'];
                $tanggal=$DataPembayaran['tanggal'];
                $metode=$DataPembayaran['metode'];
                $server_key=$DataPembayaran['server_key'];
                $production=$DataPembayaran['production'];
                $order_id=$DataPembayaran['order_id'];
                $tagihan=$DataPembayaran['tagihan'];
                $first_name=$DataPembayaran['first_name'];
                $last_name=$DataPembayaran['last_name'];
                $email=$DataPembayaran['email'];
                $kontak=$DataPembayaran['kontak'];
                $snap_token=$DataPembayaran['snap_token'];
                $status=$DataPembayaran['status'];
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
                                            <h5 class="card-title text-center pb-0 fs-4">Halaman Pembayaran</h5>
                                            <p class="text-center small">Pastikan anda memiliki kode pembayaran yang Valid</p>
                                        </div>
                                        <form action="javascript:void(0);" class="row g-3" id="ProsesPembayaran">
                                            <input type="hidden" name="snap_token" id="snap_token" value="<?php echo $snap_token;?>">
                                            <div class="col-12">
                                                <label for="order_id" class="form-label">Order ID</label>
                                                <input type="text" readonly name="order_id" class="form-control" id="order_id" value="<?php echo $order_id;?>">
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" readonly name="email" class="form-control" id="email" value="<?php echo $email;?>">
                                            </div>
                                            <div class="col-12">
                                                <label for="tagihan" class="form-label">Jumlah Pembayaran</label>
                                                <input type="text" readonly name="tagihan" class="form-control" id="tagihan" value="<?php echo $tagihan;?>">
                                            </div>
                                            <div class="col-12">
                                                Silahkan lanjutkan untuk melakukan pembayaran.
                                            </div>
                                            <div class="col-12" id="TombolPembayaran">
                                                <button type="button" class="btn btn-info w-100">Loading...</button>
                                            </div>
                                            <div class="col-12">
                                                <p class="small mb-0">Anda mengalamai masalah? <a href="<?php echo "https://$email_bisnis";?>">Hubungi Kami</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="credits">
                                    <!-- All the links in the footer should remain intact. -->
                                    <!-- You can delete the links only if you purchased the pro version. -->
                                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
            $('#TombolPembayaran').html("Loading..");
            var form = $('#ProsesPembayaran')[0];
            var data = new FormData(form);
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/SettingService/ProsesTestGenerateButton.php',
                data 	    :  data,
                cache       : false,
                processData : false,
                contentType : false,
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#TombolPembayaran').html(data);
                }
            });
        </script>
    </body>
    <?php } ?>
</html>
