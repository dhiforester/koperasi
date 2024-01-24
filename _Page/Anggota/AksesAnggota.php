<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman permintaan akses anggota.';
                echo '  Beberapa anggota mungkin meminta anda melakukan verifikasi aksesnya.';
                echo '  Anda bisa mengatur siapa saja yang mendapatkan akses informasi keanggotaan disini.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <b>
                                <a href="index.php?Page=Anggota">Data Anggota</a>
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card info-card sales-card bg-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-key"></i>
                        </div>
                        <div class="ps-3 text-light">
                            <b>
                                Akses Anggota
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatasAksesAnggota">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <select name="BatasAksesAnggota" id="BatasAksesAnggota" class="form-control">
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
                            <div class="col-md-2 mt-3">
                                <select name="StatusAksesAnggota" id="StatusAksesAnggota" class="form-control">
                                    <option value="">Semua</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Requested">Requested</option>
                                    <option value="Active">Active</option>
                                </select>
                                <small>Status</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="text" name="KeywordAksesAnggota" id="KeywordAksesAnggota" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-3 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahAksesAnggota" title="Tambah Akses Anggota Manual">
                                    <i class="bi bi-plus-lg"></i> Tambah Manual
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelAksesAnggota">

                </div>
            </div>
        </div>
    </div>
</section>