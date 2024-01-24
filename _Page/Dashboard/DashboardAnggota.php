<?php
    //Jumlah Pembelian
    $SumPembelian = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='Penjualan' AND id_anggota='$SessionIdAnggota'"));
    $JumlahPembelian = $SumPembelian['tagihan'];
    $JumlahPembelian = "" . number_format($JumlahPembelian,0,',','.');
    //Jumlah Pinjaman
    $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM pinjaman WHERE id_anggota='$SessionIdAnggota'"));
    $JumlahPinjaman = $SumPinjaman['jumlah_pinjaman'];
    $JumlahPinjaman = "" . number_format($JumlahPinjaman,0,',','.');
    //Jumlah Angsuran
    $SumAngsuran = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE kategori_angsuran='Pokok' AND id_anggota='$SessionIdAnggota'"));
    $JumlahAngsuran = $SumAngsuran['jumlah'];
    $JumlahAngsuran = "" . number_format($JumlahAngsuran,0,',','.');
    //Simpanan Kotor
    $SumSimpananKotor = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori!='Penarikan' AND id_anggota='$SessionIdAnggota'"));
    $JumlahSimpananKotor = $SumSimpananKotor['jumlah'];
    //Penarikan Simpanan
    $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori='Penarikan' AND id_anggota='$SessionIdAnggota'"));
    $JumlahPenarikan = $SumPenarikan['jumlah'];
    //Jumlah Simpanan Bersih
    $JumlahSimpananBersih=$JumlahSimpananKotor-$JumlahPenarikan;
    $JumlahSimpananBersih = "" . number_format($JumlahSimpananBersih,0,',','.');
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Selamat Datang Di Halaman Utama <b>'.$title_page.'</b><br> ';
                echo '  Pada halaman ini anda bisa melihat semua riwayat transaksi anda. Hubungi pengurus/admin apabila terdapat kesalahan pada pencatatan transaksi untuk dapat segera diperbaiki.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pembelian</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart-plus"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahPembelian.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Rp/IDR</span><br>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>
                                <a href="index.php?Page=RiwayatAnggota&Sub=Pembelian">Lihat Selengkapnya</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Simpanan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahSimpananBersih.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Rp/IDR</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>
                                <a href="index.php?Page=RiwayatAnggota&Sub=Simpanan">Lihat Selengkapnya</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pinjaman</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bank"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahPinjaman.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Rp/IDR</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>
                                <a href="index.php?Page=RiwayatAnggota&Sub=Pinjaman">Lihat Selengkapnya</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Angsuran</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahAngsuran.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Rp/IDR</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small>
                                <a href="index.php?Page=RiwayatAnggota&Sub=Pinjaman">Lihat Selengkapnya</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>