<?php
    //Menangkap mode data
    if(empty($_GET['mode'])){
        $mode="Tabel";
    }else{
        $mode=$_GET['mode'];
    }
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman data log aktivitas.';
                echo '  Fitur ini digunakan untuk mempermudah anda dalam melakukan monitoring aktivitas user.';
                echo '  Tampilkan data menggunakan mode grafik atau tabel sesuai keinginan anda.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <a href="index.php?Page=Aktivitas&Sub=AktivitasUmum&mode=Tabel">
                <div class="card info-card sales-card <?php if($mode=="Tabel"){echo "bg-primary";}else{echo "bg-info";} ?> ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-table"></i>
                            </div>
                            <div class="ps-3 text-light">
                                Dataset
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index.php?Page=Aktivitas&Sub=AktivitasUmum&mode=Rekapitulasi">
                <div class="card info-card sales-card <?php if($mode=="Rekapitulasi"){echo "bg-primary";}else{echo "bg-info";} ?> ">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-table"></i>
                            </div>
                            <div class="ps-3 text-light">
                                Rekapitulasi
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="index.php?Page=Aktivitas&Sub=AktivitasUmum&mode=Grafik">
                <div class="card info-card sales-card <?php if($mode=="Grafik"){echo "bg-primary";}else{echo "bg-info";} ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <div class="ps-3 text-light">
                                Grafik
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
                if($mode=="Tabel"){
                    include "_Page/Aktivitas/AktivitasUmumTabel.php";
                }else{
                    if($mode=="Rekapitulasi"){
                        include "_Page/Aktivitas/AktivitasUmumRekapitulasi.php";
                    }else{
                        include "_Page/Aktivitas/AktivitasUmumGrafik.php";
                    }
                }
            ?>
        </div>
    </div>
</section>