<?php
    //Jumlah Akses
    $JumlahAkses1 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
    $JumlahAkses = "" . number_format($JumlahAkses1,0,',','.');
    //Jumlah Anggota
    $JumlahAnggota1 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota"));
    $JumlahAnggota = "" . number_format($JumlahAnggota1,0,',','.');
    //Jumlah Barang
    $JumlahBarang1 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang"));
    $JumlahBarang = "" . number_format($JumlahBarang1,0,',','.');
    //Jumlah Supplier
    $JumlahSupplier = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier"));
    $JumlahSupplier = "" . number_format($JumlahSupplier,0,',','.');
    //Jumlah Akun
    $JumlahAkun = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akun_perkiraan"));
    $JumlahAkun = "" . number_format($JumlahAkun,0,',','.');
    //Jumlah Transaksi
    $JumlahTransaksi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
    $JumlahTransaksi = "" . number_format($JumlahTransaksi,0,',','.');
    //Jumlah Penjualan
    $SumPenjualan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='Penjualan'"));
    $JumlahPenjualan = $SumPenjualan['tagihan'];
    $JumlahPenjualan = "" . number_format($JumlahPenjualan,0,',','.');
    //Jumlah Pembelian
    $SumPembelian = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='Pembelian'"));
    $JumlahPembelian = $SumPembelian['tagihan'];
    $JumlahPembelian = "" . number_format($JumlahPembelian,0,',','.');
    //Simpanan Kotor
    $SumSimpananKotor = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori='Simpanan Pokok' OR kategori='Simpanan Wajib' OR kategori='Simpanan Sukarela'"));
    $JumlahSimpananKotor = $SumSimpananKotor['jumlah'];
    //Penarikan Simpanan
    $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori='Penarikan'"));
    $JumlahPenarikan = $SumPenarikan['jumlah'];
    //Jumlah Simpanan Bersih
    $JumlahSimpananBersih=$JumlahSimpananKotor-$JumlahPenarikan;
    $JumlahSimpananBersih = "" . number_format($JumlahSimpananBersih,0,',','.');
    //Jumlah Pinjaman
    $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM pinjaman"));
    $JumlahPinjaman = $SumPinjaman['jumlah_pinjaman'];
    $JumlahPinjaman = "" . number_format($JumlahPinjaman,0,',','.');
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Akses</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahAkses.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">User</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Anggota</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahAnggota.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Orang</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Supplier</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-truck"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahSupplier.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Record</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Barang</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahBarang.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Item</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Akun Keuangan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bookmark-check"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahAkun.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Akun</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahTransaksi.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Record</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Penjualan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart-check"></i>
                                </div>
                                <div class="ps-3">
                                    <?php
                                        echo '  <span class="text-muted small pt-1 fw-bold">'.$JumlahPenjualan.'</span><br>';
                                        echo '  <span class="text-muted small pt-2 ps-1">Rp/IDR</span>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        echo '  <span class="text-muted small pt-2 ps-1">Rp/IDR</span>';
                                    ?>
                                </div>
                            </div>
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
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Reports -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="javascript:void(0);" id="ProsesTampilkanGrapik">
                                <div class="row">
                                    <div class="col-md-2">
                                        <select name="KategoriTransaksi" id="KategoriTransaksi" class="form-control">
                                            <option value="">Semua</option>
                                            <?php
                                                $QryTransaksi = mysqli_query($Conn, "SELECT DISTINCT kategori FROM transaksi ORDER BY kategori ASC");
                                                while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                                    $kategori= $DataTransaksi['kategori'];
                                                    echo '<option value="'.$kategori.'">'.$kategori.'</option>';
                                                }
                                            ?>
                                        </select>
                                        <small>Kategori</small>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="StatusStransaksi" id="StatusStransaksi" class="form-control">
                                            <option value="">Semua</option>
                                            <?php
                                                $QryTransaksi = mysqli_query($Conn, "SELECT DISTINCT status FROM transaksi ORDER BY status ASC");
                                                while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                                    $status= $DataTransaksi['status'];
                                                    echo '<option value="'.$status.'">'.$status.'</option>';
                                                }
                                            ?>
                                        </select>
                                        <small>Status</small>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="Periode" id="Periode" class="form-control">
                                            <option selected value="Bulanan">Bulanan</option>
                                            <option value="Tahun">Tahun</option>
                                        </select>
                                        <small>Periode</small>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="Tahun" id="Tahun" class="form-control">
                                            <?php
                                                $TahunSekarang=date('Y');
                                                $TahunKedepan=$TahunSekarang+5;
                                                for ( $i=2005; $i<=$TahunKedepan; $i++ ){
                                                    if($TahunSekarang==$i){
                                                        echo '<option selected value="'.$i.'">'.$i.'</option>';
                                                    }else{
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <small>Tahun</small>
                                    </div>
                                    <div class="col-md-2" id="form_bulan">
                                        <select name="Bulan" id="Bulan" class="form-control">
                                            <option <?php if(date('m')=='01'){echo "selected";} ?> value="01">Januari</option>
                                            <option <?php if(date('m')=='02'){echo "selected";} ?> value="02">Februari</option>
                                            <option <?php if(date('m')=='03'){echo "selected";} ?> value="03">Maret</option>
                                            <option <?php if(date('m')=='04'){echo "selected";} ?> value="04">April</option>
                                            <option <?php if(date('m')=='05'){echo "selected";} ?> value="05">Mei</option>
                                            <option <?php if(date('m')=='06'){echo "selected";} ?> value="06">Juni</option>
                                            <option <?php if(date('m')=='07'){echo "selected";} ?> value="07">Juli</option>
                                            <option <?php if(date('m')=='08'){echo "selected";} ?> value="08">Agustus</option>
                                            <option <?php if(date('m')=='09'){echo "selected";} ?> value="09">September</option>
                                            <option <?php if(date('m')=='10'){echo "selected";} ?> value="10">Oktober</option>
                                            <option <?php if(date('m')=='11'){echo "selected";} ?> value="11">November</option>
                                            <option <?php if(date('m')=='12'){echo "selected";} ?> value="12">Desember</option>
                                        </select>
                                        <small>Bulan</small>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-md btn-primary">
                                            Tampilkan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" id="NamaTitleData"></h5>
                            <div id="reportsChart">
                                <!-- Line Chart -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Baru</h5>
                            <div class="activity">
                                <?php
                                    if(empty($JumlahAkses1)){
                                        echo '<div class="activity-item d-flex">';
                                        echo '  Belum Ada User';
                                        echo '</div>';
                                    }else{
                                        //Arraykan Akses
                                        $QryAkses = mysqli_query($Conn, "SELECT*FROM akses ORDER BY id_akses DESC LIMIT 5");
                                        while ($DataAkses = mysqli_fetch_array($QryAkses)) {
                                            $nama_akses= $DataAkses['nama_akses'];
                                            $email_akses= $DataAkses['email_akses'];
                                            $datetime_daftar= $DataAkses['datetime_daftar'];
                                            $datetime_daftar= strtotime($datetime_daftar);
                                            $datetime_daftar=date('d/m/y H:i', $datetime_daftar);
                                            echo '<div class="activity-item d-flex">';
                                            echo '  <div class="activite-label">'.$datetime_daftar.'</div>';
                                            echo '  <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>';
                                            echo '  <div class="activity-content">';
                                            echo '      <b>'.$nama_akses.'</b><br>'.$email_akses.'';
                                            echo '  </div>';
                                            echo '</div>';
                                        }
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Anggota Baru</h5>
                            <div class="activity">
                                <?php
                                    if(empty($JumlahAnggota1)){
                                        echo '<div class="activity-item d-flex">';
                                        echo '  Belum Ada Anggota';
                                        echo '</div>';
                                    }else{
                                        //Arraykan Anggota
                                        $QryAnggota = mysqli_query($Conn, "SELECT*FROM anggota ORDER BY id_anggota DESC LIMIT 5");
                                        while ($DataAnggota = mysqli_fetch_array($QryAnggota)) {
                                            $NamaAnggota= $DataAnggota['nama'];
                                            $tanggal_masuk= $DataAnggota['tanggal_masuk'];
                                            $nip= $DataAnggota['nip'];
                                            $tanggal_masuk= strtotime($tanggal_masuk);
                                            $tanggal_masuk=date('d/m/y H:i', $tanggal_masuk);
                                            echo '<div class="activity-item d-flex">';
                                            echo '  <div class="activite-label">'.$tanggal_masuk.'</div>';
                                            echo '  <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>';
                                            echo '  <div class="activity-content">';
                                            echo '      <b>'.$NamaAnggota.'</b><br>'.$nip.'';
                                            echo '  </div>';
                                            echo '</div>';
                                        }
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Barang Baru</h5>
                            <div class="activity">
                                <?php
                                    if(empty($JumlahBarang1)){
                                        echo '<div class="activity-item d-flex">';
                                        echo '  Belum Ada Barang';
                                        echo '</div>';
                                    }else{
                                        //Arraykan Barang
                                        $QryBarang = mysqli_query($Conn, "SELECT*FROM barang ORDER BY id_barang DESC LIMIT 5");
                                        while ($DataBarang = mysqli_fetch_array($QryBarang)) {
                                            $id_barang= $DataBarang['id_barang'];
                                            $nama_barang= $DataBarang['nama_barang'];
                                            $satuan_barang= $DataBarang['satuan_barang'];
                                            $stok_barang= $DataBarang['stok_barang'];
                                            echo '<div class="activity-item d-flex">';
                                            echo '  <div class="activite-label">'.$id_barang.'</div>';
                                            echo '  <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>';
                                            echo '  <div class="activity-content">';
                                            echo '      <b>'.$nama_barang.'</b><br>'.$stok_barang.' '.$satuan_barang.'';
                                            echo '  </div>';
                                            echo '</div>';
                                        }
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>