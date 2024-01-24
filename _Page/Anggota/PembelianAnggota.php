<?php
    //id_anggota
    if(empty($_POST['id_anggota'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-danger">';
        echo '      ID Anggota Tidak Boeh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_anggota=$_POST['id_anggota'];
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatasPembelian">
                        <input type="hidden" name="id_anggota" id="id_anggota" value="<?php echo "$id_anggota"; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <b class="card-title">Riwayat Transaksi Anggota</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1 mt-3">
                                <select name="BatasPembelian" id="BatasPembelian" class="form-control">
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
                            <div class="col-md-2 mt-3">
                                <select name="OrderByPembelian" id="OrderByPembelian" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="id_transaksi">ID Transaksi</option>
                                    <option value="id_akses">Akses/Petugas</option>
                                    <option value="tanggal">Tanggal</option>
                                    <option value="kategori">Kategori</option>
                                    <option value="keterangan">Keterangan</option>
                                    <option value="status">Status</option>
                                </select>
                                <small>Mode</small>
                            </div>
                            <div class="col-md-1 mt-3">
                                <select name="ShortByPembelian" id="ShortByPembelian" class="form-control">
                                    <option value="ASC">A-Z</option>
                                    <option value="DESC">Z-A</option>
                                </select>
                                <small>Urutan</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <select name="KeywordByPembelian" id="KeywordByPembelian" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="id_transaksi">ID Transaksi</option>
                                    <option value="id_akses">Akses/Petugas</option>
                                    <option value="tanggal">Tanggal</option>
                                    <option value="kategori">Kategori</option>
                                    <option value="keterangan">Keterangan</option>
                                    <option value="status">Status</option>
                                </select>
                                <small>Pencarian</small>
                            </div>
                            <div class="col-md-3 mt-3" id="FormKeywordPembelian">
                                <input type="text" name="KeywordPembelian" id="KeywordPembelian" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-1 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalExportPembelian" data-id="<?php echo "$id_anggota"; ?>">
                                    <i class="bi bi-download"></i> Export
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelPembelian">

                </div>
            </div>
        </div>
    </div>
<?php } ?>