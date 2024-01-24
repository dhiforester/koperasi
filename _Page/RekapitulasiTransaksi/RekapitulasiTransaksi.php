<?php
    //Menangkap Sub
    if(empty($_GET['Sub'])){
        $BackGround1="";
        $BackGround2="";
        $BackGround3="";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Transaksi"){
            $BackGround1="bg-info";
            $BackGround2="";
            $BackGround3="";
        }else{
            if($Sub=="Simpanan"){
                $BackGround1="";
                $BackGround2="bg-info";
                $BackGround3="";
            }else{
                if($Sub=="Pinjaman"){
                    $BackGround1="";
                    $BackGround2="";
                    $BackGround3="bg-info";
                }
            }
        }
    }
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman rekapitulasi transaksi.';
                echo '  Laporan ini menampilkan akumulasi transaksi berdasarkan kategori transaksi.';
                echo '  Untuk menampilkan laporan pilih periode transaksi yang diinginkan.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card info-card sales-card <?php echo $BackGround1; ?>">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">
                                <a href="index.php?Page=RekapitulasiTransaksi&Sub=Transaksi">
                                    Transaksi
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card info-card sales-card <?php echo $BackGround2; ?>">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">
                                <a href="index.php?Page=RekapitulasiTransaksi&Sub=Simpanan">
                                    Simpanan
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card info-card sales-card <?php echo $BackGround3; ?>">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="card-title">
                                <a href="index.php?Page=RekapitulasiTransaksi&Sub=Pinjaman">
                                    Pinjaman
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(empty($_GET['Sub'])){
            include "_Page/RekapitulasiTransaksi/DataTransaksi.php";
        }else{
            if($Sub=="Transaksi"){
                include "_Page/RekapitulasiTransaksi/DataTransaksi.php";
            }else{
                if($Sub=="Simpanan"){
                    include "_Page/RekapitulasiTransaksi/DataSimpanan.php";
                }else{
                    if($Sub=="Pinjaman"){
                        include "_Page/RekapitulasiTransaksi/DataPinjaman.php";
                    }else{
                        
                    }
                }
            }
        }
    ?>
</section>