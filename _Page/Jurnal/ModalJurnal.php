<div class="modal fade" id="ModalFilterJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesFilterJurnal">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-filter"></i> Filter Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="batas">Data</label>
                            <select name="batas" id="batas" class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="OrderBy">Mode Urutan</label>
                            <select name="OrderBy" id="OrderBy" class="form-control">
                                <option value="">Pilih</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kode_perkiraan">Kode Perkiraan</option>
                                <option value="nama_perkiraan">Nama Perkiraan</option>
                                <option value="d_k">Debet Kredit</option>
                                <option value="nilai">Nominal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="ShortBy">Tipe Urutan</label>
                            <select name="ShortBy" id="ShortBy" class="form-control">
                                <option value="ASC">A To Z</option>
                                <option value="DESC">Z To A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="KeywordBy">Pencarian</label>
                            <select name="KeywordBy" id="KeywordBy" class="form-control">
                                <option value="">Pilih</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kode_perkiraan">Kode Perkiraan</option>
                                <option value="nama_perkiraan">Nama Perkiraan</option>
                                <option value="d_k">Debet Kredit</option>
                                <option value="nilai">Nominal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="FormFilterKeyword">
                            <label for="keyword">Kata Kunci</label>
                            <input type="text" name="keyword" id="keyword" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-info">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Filter
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPilihTransaksi" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Pilih Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="ProsesBatasPilihTransaksi">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <select name="Referensi" id="Referensi" class="form-control">
                                <option value="Transaksi">Transaksi</option>
                                <option value="Simpanan">Simpanan</option>
                                <option value="Pinjaman">Pinjaman</option>
                                <option value="Angsuran">Angsuran</option>
                                <option value="Bagi Hasil">Bagi Hasil</option>
                            </select>
                            <small>Referensi</small>
                        </div>
                        <div class="col-md-2 mb-3">
                            <select name="BatasTransaksi" id="BatasTransaksi" class="form-control">
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
                        <div class="col-md-4 mb-3">
                            <input type="text" name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">
                            <small>Kata Kunci</small>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-md btn-block btn-info btn-rounded">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
                <div id="FormPilihTransaksi">

                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahJurnal">
                    Lewati <i class="bi bi-arrow-right-circle"></i> 
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalExportJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Jurnal/ProsesExportJurnal.php" method="POST">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-download"></i> Export Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="batas_export">Batas</label>
                            <select name="batas_export" id="batas_export" class="form-control">
                                <option value="">Semua</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="OrderByExport">Mode Urutan</label>
                            <select name="OrderByExport" id="OrderByExport" class="form-control">
                                <option value="">Pilih</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kode_perkiraan">Kode Perkiraan</option>
                                <option value="nama_perkiraan">Nama Perkiraan</option>
                                <option value="d_k">Debet Kredit</option>
                                <option value="nilai">Nominal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="ShortByExport">Tipe Urutan</label>
                            <select name="ShortByExport" id="ShortByExport" class="form-control">
                                <option value="ASC">A To Z</option>
                                <option value="DESC">Z To A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="KeywordByExport">Pencarian</label>
                            <select name="KeywordByExport" id="KeywordByExport" class="form-control">
                                <option value="">Pilih</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kode_perkiraan">Kode Perkiraan</option>
                                <option value="nama_perkiraan">Nama Perkiraan</option>
                                <option value="d_k">Debet Kredit</option>
                                <option value="nilai">Nominal</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="keyword_export">Kata Kunci</label>
                            <input type="text" name="keyword_export" id="keyword_export" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-success">
                    <button type="submit" class="btn btn-primary btn-rounded">
                        <i class="bi bi-download"></i> Export
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahJurnal">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Buat Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahJurnal">
                    
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-info btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPilihTransaksi">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailJurnal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-file-ruled"></i> Detail Jurnal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="FormDetailJurnal">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditJurnal">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-person-plus"></i> Edit Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditJurnal">
                    
                </div>
                <div class="modal-footer bg-success">
                    <button type="submit" class="btn btn-primary btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalHapusJurnal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Jurnal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormhapusJurnal">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusJurnal">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>