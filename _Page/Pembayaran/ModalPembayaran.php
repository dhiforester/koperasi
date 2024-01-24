<div class="modal fade" id="ModalFilterPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesFilterPembayaran">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-funnel"></i> Filter Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="FilterBatas">Data</label>
                            <select name="FilterBatas" id="FilterBatas" class="form-control">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
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
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Petugas/User</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="kategori">Kategori</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="metode">Metode Pembayaran</option>
                                <option value="keterangan">Keterangan Pembayaran</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="ShortBy">Tipe urutan</label>
                            <select name="ShortBy" id="ShortBy" class="form-control">
                                <option value="ASC">A To Z</option>
                                <option value="DESC">Z To A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="KeywordBy">Pencarian</label>
                            <select name="KeywordBy" id="KeywordBy" class="form-control">
                                <option value="">Pilih</option>
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Petugas/User</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="kategori">Kategori</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="metode">Metode Pembayaran</option>
                                <option value="keterangan">Keterangan Pembayaran</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="FormFilterKeyword">
                            <label for="FilterKeyword">Kata Kunci</label>
                            <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">
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
<div class="modal fade" id="ModalExportPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Pembayaran/ExportPembayaran.php" method="POST" target="_blank">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-download"></i> Export Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="OrderByExport">Mode Urutan</label>
                            <select name="OrderByExport" id="OrderByExport" class="form-control">
                                <option value="">Pilih</option>
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Petugas/User</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="kategori">Kategori</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="metode">Metode Pembayaran</option>
                                <option value="keterangan">Keterangan Pembayaran</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="ShortByExport">Tipe urutan</label>
                            <select name="ShortByExport" id="ShortByExport" class="form-control">
                                <option value="ASC">A To Z</option>
                                <option value="DESC">Z To A</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="KeywordByExport">Pencarian</label>
                            <select name="KeywordByExport" id="KeywordByExport" class="form-control">
                                <option value="">Pilih</option>
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Petugas/User</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="kategori">Kategori</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="metode">Metode Pembayaran</option>
                                <option value="keterangan">Keterangan Pembayaran</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3" id="FormFilterKeywordExport">
                            <label for="FilterKeyword">Kata Kunci</label>
                            <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">
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
<div class="modal fade" id="ModalPilihTransaksi" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-check"></i> Pilih Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="PencarianTransaksiPembayaran">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <select name="JumlahData" id="JumlahData" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small for="JumlahData">Data</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <select name="KeywordByTransaksi" id="KeywordByTransaksi" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="id_transaksi">ID Transaksi</option>
                                    <option value="id_akses">Petugas/User</option>
                                    <option value="id_anggota">Anggota</option>
                                    <option value="id_supplier">Supplier</option>
                                    <option value="kategori">Kategori</option>
                                    <option value="tanggal">Tanggal</option>
                                    <option value="metode">Metode Pembayaran</option>
                                    <option value="keterangan">Keterangan Pembayaran</option>
                                </select>
                                <small for="KeywordByTransaksi">Mode</small>
                            </div>
                            <div class="col-md-5 mb-3" id="FormKeywordTransaksi">
                                <input type="text" name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">
                                <small for="KeywordTransaksi">Pencarian</small>
                            </div>
                            <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="scrollspy-example-2" id="FormPilihTransaksi" data-bs-spy="scroll" tabindex="0">

                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPilihAnggota" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-check"></i> Pilih Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="PencarianAnggota">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <select name="JumlahDataAnggota" id="JumlahDataAnggota" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small for="JumlahDataAnggota">Data</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <select name="KeywordByAnggota" id="KeywordByAnggota" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="tanggal_masuk">Tanggal Masuk</option>
                                    <option value="nip">NIP</option>
                                    <option value="nama">Nama Anggota</option>
                                    <option value="email">Email</option>
                                    <option value="kontak">Kontak</option>
                                    <option value="status">Status</option>
                                </select>
                                <small for="KeywordByAnggota">Mode</small>
                            </div>
                            <div class="col-md-5 mb-3" id="FormKeywordAnggota">
                                <input type="text" name="KeywordAnggota" id="KeywordAnggota" class="form-control">
                                <small for="KeywordAnggota">Pencarian</small>
                            </div>
                            <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="scrollspy-example-2" id="FormPilihAnggota" data-bs-spy="scroll" tabindex="0">

                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPilihSupplier" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-check"></i> Pilih Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="PencarianSupplier">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <select name="JumlahDataSupplier" id="JumlahDataSupplier" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small for="JumlahDataSupplier">Data</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <select name="KeywordBySupplier" id="KeywordBySupplier" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="nama_supplier">Supplier</option>
                                    <option value="email_supplier">Email</option>
                                    <option value="kontak_supplier">Kontak</option>
                                </select>
                                <small for="KeywordBySupplier">Mode</small>
                            </div>
                            <div class="col-md-5 mb-3" id="FormKeywordSupplier">
                                <input type="text" name="KeywordSupplier" id="KeywordSupplier" class="form-control">
                                <small for="KeywordSupplier">Pencarian</small>
                            </div>
                            <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="scrollspy-example-2" id="FormPilihSupplier" data-bs-spy="scroll" tabindex="0">

                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="index.php?Page=Pembayaran&Sub=TambahPembayaran" method="POST">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-check"></i> Tambah Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahPembayaran">
                    
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-arrow-right"></i> Lanjutkan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalKonfirmasiTransaksi" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-check"></i> Konfirmasi Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormKonfirmasiTransaksi">
                
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalKonfirmasiAnggota" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-check"></i> Konfirmasi Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormKonfirmasiAnggota">
                
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalKonfirmasiSupplier" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-check"></i> Konfirmasi Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormKonfirmasiSupplier">
                
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-outline-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-cash-coin"></i> Detail Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailPembayaran">

            </div>
            <div class="modal-footer bg-info">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditPembayaran" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="FormEditPembayaran">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDeletePembayaran" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeletePembayaran">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusPembayaran">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>