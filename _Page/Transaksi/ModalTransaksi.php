<div class="modal fade" id="ModalFilterTransaksi" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesFilterTransaksi">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-funnel"></i> Filter Transaksi</h5>
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
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Akses/Petugas</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kategori">Kaegori Transaksi</option>
                                <option value="keterangan">Keterangan</option>
                                <option value="status">Status</option>
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
                            <label for="keyword_by">Pencarian</label>
                            <select name="keyword_by" id="keyword_by" class="form-control">
                                <option value="">Pilih</option>
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Akses/Petugas</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kategori">Kaegori Transaksi</option>
                                <option value="keterangan">Keterangan</option>
                                <option value="status">Status</option>
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
<div class="modal fade" id="ModalDownloadTransaksi" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Transaksi/ExportTransaksi.php" method="POST" target="_blank">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-download"></i> Export Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="OrderBy">Mode Urutan</label>
                            <select name="OrderBy" id="OrderBy" class="form-control">
                                <option value="">Pilih</option>
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Akses/Petugas</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kategori">Kaegori Transaksi</option>
                                <option value="keterangan">Keterangan</option>
                                <option value="status">Status</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="ShortBy">Tipe Urutan</label>
                            <select name="ShortBy" id="ShortBy" class="form-control">
                                <option value="ASC">A To Z</option>
                                <option value="DESC">Z To A</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="keyword_by">Pencarian</label>
                            <select name="keyword_by" id="keyword_by2" class="form-control">
                                <option value="">Pilih</option>
                                <option value="id_transaksi">ID Transaksi</option>
                                <option value="id_akses">Akses/Petugas</option>
                                <option value="id_anggota">Anggota</option>
                                <option value="id_supplier">Supplier</option>
                                <option value="tanggal">Tanggal</option>
                                <option value="kategori">Kaegori Transaksi</option>
                                <option value="keterangan">Keterangan</option>
                                <option value="status">Status</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3" id="FormFilterKeyword2">
                            <label for="keyword">Kata Kunci</label>
                            <input type="text" name="keyword" id="keyword" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-success">
                    <button type="submit" class="btn btn-primary btn-rounded">
                        <i class="bi bi-download"></i> Download
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalCariAnggota" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-search"></i> Cari Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="ProsesCariAnggota">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="PencarianAnggota" id="PencarianAnggota" class="form-control" placeholder="Kata Kunci">
                            <small>Pencarian</small>
                        </div>
                        <div class="col-md-2">
                            <select name="JumlahDataAnggota" id="JumlahDataAnggota" class="form-control">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <small>Data</small>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block btn-rounded">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12" id="MenampilkanTabelAnggota">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalCariSupplier" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-search"></i> Cari Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="ProsesCariSupplier">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="PencarianSupplier" id="PencarianSupplier" class="form-control" placeholder="Kata Kunci">
                            <small>Pencarian</small>
                        </div>
                        <div class="col-md-2">
                            <select name="JumlahDataSupplier" id="JumlahDataSupplier" class="form-control">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <small>Data</small>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block btn-rounded">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12" id="MenampilkanTabelSupplier">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPilihAnggota" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-check"></i> Konfirmasi Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="MenampilkanKonfirmasiAnggota">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPilihSupplier" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-check"></i> Konfirmasi Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="MenampilkanKonfirmasiSupplier">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahRincian" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah Rincian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="ClickPencarian">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="PencarianRincian" id="PencarianRincian" class="form-control" placeholder="Kata Kunci">
                            <small>Pencarian</small>
                        </div>
                        <div class="col-md-2">
                            <select name="JumlahData" id="JumlahData" class="form-control">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <small>Data</small>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-rounded" >
                                <i class="bi bi-search"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12" id="MenampilkanTabelBarangTindakan">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-primary">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahRincianBarang" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahRincianBarang">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah Rincian Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="FormTambahRincianBarang">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-plus-lg"></i> Tambahkan
                    </button>
                    <button type="button" class="btn btn-info btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahRincian">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahRincianLainnya" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahRincianLainnya">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah Rincian Lainnya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="FormTambahRincianLainnya">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-plus-lg"></i> Tambahkan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahPpn" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahPpn">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah PPN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="FormTambahPpn">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahPpnEdit" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahPpnEdit">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Update PPN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="FormTambahPpnEdit">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Update
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailTransaksi" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-box"></i> Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="FormDetailTransaksi">
                
            </div>
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
<div class="modal fade" id="ModalHapusSemuaJurnal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Semua Jurnal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormhapusSemuaJurnal">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusSemuaJurnal">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahPembayaran">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-coin"></i> Tambah Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahPembayaran">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalDetailPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-info-circle"></i> Detail Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailPembayaran">
                
            </div>
            <div class="modal-footer bg-info">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditPembayaran">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditPembayaran">
                    
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
<div class="modal fade" id="ModalHapusPembayaran" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Delete Pembayaran</h5>
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
<div class="modal fade" id="ModalHapusSemuaPembayaran" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormHapusSemuaPembayaran">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusSemuaPembayaran">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDeleteTransaksi" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Delete Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteTransaksi">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusTransaksi">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditTransaksi2" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditTransaksi2">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditTransaksi2">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalSettingAutoJurnal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesSettingAutoJurnal">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-gear"></i> Setting Auto Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormSettingAutoJurnal">
                    
                </div>
                <div class="modal-footer bg-info">
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
<div class="modal fade" id="ModalEditSatuan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditSatuan">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Satuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditSatuan">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalDeleteSatuan" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Satuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormHapusSatuan">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusSatuan">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahKategoriHarga" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahKategoriHarga">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-person-plus"></i> Tambah Kategori Harga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahKategoriHarga">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalEditKategoriHarga" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditKategoriHarga">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Kategori Harga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditKategoriHarga">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalResetSettingAutoJurnal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-gear"></i> Reset Auto Jurnal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormResetSettingAutoJurnal">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiResetAutoJurnal">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahExpiredDate" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahExpiredDate">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-person-plus"></i> Tambah Batch & Expired</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahExpiredDate">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalEditExpiredDate" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditExpiredDate">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Batch & Expired</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditExpiredDate">
                    
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalDeleteTransaksiRincian" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Rincian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteRincian">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusRincian">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalBatalkanTransaksi" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Batalkan Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormBatalkanTransaksi">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiBatalkanTransaksi">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditRincianBarang" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditRincianBarang">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Rincian Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="FormEditRincianBarang">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
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
<div class="modal fade" id="ModalEditRincianLainnya" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditRincianLainnya">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Rincian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="FormEditRincianLainnya">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-primary">
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
