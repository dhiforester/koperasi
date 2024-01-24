<?php
    if(!empty($_GET['short_expired'])){
        $short_expired=$_GET['short_expired'];
    }else{
        $short_expired="";
    }
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman untuk mengelola data batch dan tanggal expired barang.';
                echo '  Anda bisa menambahkan data batch berikut dengan tanggal expired.';
                echo '  Isi tanggal notifikasi agar sistem memberikan peringatan sebelum barang expired.';
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
                        <input type="hidden" name="HanyaExpired" id="HanyaExpired" value="<?php echo $short_expired;?>">
                        <div class="row">
                            <div class="col-md-1 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="text" name="keyword" id="keyword" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Cari Data Expired & Batch">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalFilterBarangExpired" title="Filter Data Expired Barang">
                                    <i class="bi bi-funnel"></i> Filter
                                </button>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-md btn-warning btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalDatabaseBarangExpired" title="Export/Import Data Expired Barang">
                                    <i class="bi bi-server"></i> Database
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPilihBarang" title="Tambah Data Expired Barang">
                                    <i class="bi bi-calendar-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelBarangExpired">

                </div>
            </div>
        </div>
    </div>
</section>