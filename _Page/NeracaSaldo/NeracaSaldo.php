<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman laporan neraca saldo.';
                echo '  Laporan ini menampilkan akumulasi transaksi saldo berdasarkan aku perkiraan.';
                echo '  Untuk menampilkan laporan pilih periode transaksi yang diinginkan.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesLaporanNeracaSaldo">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="date" name="periode1" id="periode1" class="form-control">
                                <small>Periode Awal</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="date" name="periode2" id="periode2" class="form-control">
                                <small>Periode Akhir</small>
                            </div>
                            <div class="col-md-4 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari & Tampilkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelNeracaSaldo">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="alert alert-danger" role="alert">
                                    Silahkan Pilih Nama Mitra, Periode Transaksi dan Klik Pada Tombol Cari
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>