<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman laporan laba-rugi.';
                echo '  Laporan ini menampilkan akumulasi transaksi pedaaatan dan beban.';
                echo '  Untuk menampilkan laporan pilih periode transaksi dan komponen akun pendapatan dan beban yang diinginkan.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesLaporanLabaRugi">
                        <div class="row">
                            <div class="col-md-2 mt-2">
                                <input type="date" name="periode1" id="periode1" class="form-control">
                                <small>Periode Awal</small>
                            </div>
                            <div class="col-md-2 mt-2">
                                <input type="date" name="periode2" id="periode2" class="form-control">
                                <small>Periode Akhir</small>
                            </div>
                            <div class="col-md-3 mt-2">
                                <select name="akun_pemasukan" id="akun_pemasukan" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                        $QueryAkun1 = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE level='1' ORDER BY kode ASC");
                                        while ($DataAkun1 = mysqli_fetch_array($QueryAkun1)) {
                                            $IdPerkiraan = $DataAkun1['id_perkiraan '];
                                            $KodeAkun= $DataAkun1['kode'];
                                            $NamaAkun= $DataAkun1['nama'];
                                            echo '<option value="'.$KodeAkun.'">'.$KodeAkun.' '.$NamaAkun.'</option>';
                                        }
                                    ?>
                                </select>
                                <small>Akun Pemasukan</small>
                            </div>
                            <div class="col-md-3 mt-2">
                                <select name="akun_pengeluaran" id="akun_pengeluaran" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                        $QueryAkun2 = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE level='1' ORDER BY kode ASC");
                                        while ($DataAkun2 = mysqli_fetch_array($QueryAkun2)) {
                                            $IdPerkiraan = $DataAkun2['id_perkiraan '];
                                            $KodeAkun= $DataAkun2['kode'];
                                            $NamaAkun= $DataAkun2['nama'];
                                            echo '<option value="'.$KodeAkun.'">'.$KodeAkun.' '.$NamaAkun.'</option>';
                                        }
                                    ?>
                                </select>
                                <small>Akun Pengeluaran</small>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Tampilkan Laporaa Laba Rugi">
                                    <i class="bi bi-search"></i> Tampilkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelLabaRugi">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="alert alert-danger" role="alert">
                                    Silahkan Isi Form Periode, Akun Laba-Rugi dan Nama Mitra
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>