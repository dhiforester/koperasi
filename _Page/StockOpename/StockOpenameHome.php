<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman stock opename.';
                echo '  Anda bisa mengelola perubahan stock barang dengan melakukan pemeriksaan stok secara rutin.';
                echo '  Anda juga bisa memanfaatkan fitur database untuk melakukan import data dari excel.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas">
                        <div class="row">
                            <div class="col-md-2 mt-2">
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
                            <div class="col-md-3 mt-2">
                                <input type="text" name="keyword" id="keyword" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Cari Stock Opename">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalFilterStockOpename" title="Filter Data Stock Opename">
                                    <i class="bi bi-funnel"></i> Filter
                                </button>
                            </div>
                            <div class="col-md-3 text-center mt-2">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahStockOpename" title="Tambah Data Stock Opename">
                                    <i class="bi bi-plus-lg"></i> Tambah Sesi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelStockOpename">

                </div>
            </div>
        </div>
    </div>
</section>