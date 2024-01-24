<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                // echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                // echo '  Berikut ini adalah halaman pengelolaan data akses. Anda bisa menambahkan data akses baru, melihat detail informasi user, ';
                // echo '  Dan melihat riwayat aktivitas user tersebut. Ijin akses dan entitas akses disesuaikan berdasarkan pengaturan aplikasi.';
                // echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                // echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatasSimpanan">
                        <div class="row">
                            <div class="col-md-1 mt-3">
                                <select name="BatasSimpanan" id="BatasSimpanan" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Batas</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <select name="KeywordBySimpanan" id="KeywordBySimpanan" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="tanggal">Tanggal</option>
                                    <option value="kategori">Kategori</option>
                                </select>
                                <small>Pencarian</small>
                            </div>
                            <div class="col-md-4 mt-3" id="FormKeywordSimpanan">
                                <input type="text" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Mulai Mencari">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 mt-3">
                                <a href="index.php" class="btn btn-md btn-info btn-block btn-rounded" title="Kembali Ke Halaman Utama">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="MenampilkanRiwayatSimpanan">

    </div>
</section>