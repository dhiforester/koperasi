<div class="modal fade" id="ModalFilterBarangExpired" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesFilterBarangExpired">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-funnel"></i> Filter Batch & Expired</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="FilterBatas">Data</label>
                            <select name="FilterBatas" id="FilterBatas" class="form-control">
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
                                <option value="">Pilih..</option>
                                <option value="kode_barang">Kode</option>
                                <option value="nama_barang">Nama Barang</option>
                                <option value="satuan">Satuan</option>
                                <option value="no_batch">No Batch</option>
                                <option value="expired_date">Tanggal Expired</option>
                                <option value="reminder_date">Tanggal Pemberitahuan</option>
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
                            <label for="KeywordBy">Pencarian</label>
                            <select name="KeywordBy" id="KeywordBy" class="form-control">
                                <option value="">Pilih..</option>
                                <option value="kode_barang">Kode</option>
                                <option value="nama_barang">Nama Barang</option>
                                <option value="satuan">Satuan</option>
                                <option value="no_batch">No Batch</option>
                                <option value="expired_date">Tanggal Expired</option>
                                <option value="reminder_date">Tanggal Pemberitahuan</option>
                                <option value="status">Status</option>
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
<div class="modal fade" id="ModalPilihBarang" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-check-circle"></i> Pilih Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="ProsesBatasPilihBarang">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <select name="batas_pilih_barang" id="batas_pilih_barang" class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                                <option value="500">500</option>
                            </select>
                            <small>Data</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="keyword_pilih_barang" id="keyword_pilih_barang" class="form-control">
                            <small>Kata Kunci</small>
                        </div>
                        <div class="col-md-2 mb-3">
                            <button type="submit" class="btn btn-md btn-block btn-info btn-rounded">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
                <div id="FormPilihBarang">

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
<div class="modal fade" id="ModalTambahBarangExpired" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahBarangExpired">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah Batch & Expired</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahBarangExpired">
                    
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
<div class="modal fade" id="ModalEditBarangExpired" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditBarangExpired">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Batch & Expired</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditBarangExpired">
                    
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
<div class="modal fade" id="ModalDeleteBarangExpired" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Batch & Expired</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteBarangExpired">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusBarangExpired">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDatabaseBarangExpired" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-light"><i class="bi bi-server"></i> Database</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li>
                                Silahkan download terlebih dulu <i>backup</i> data batch & expired barang yang sudah ada pada tautan 
                                <a href="_Page/BarangExpired/BackupData.php">berikut ini <i class="bi bi-file-earmark-ruled-fill"></i> .</a>
                                <ul>
                                    <li>
                                        Pada kolom ID batch, anda bisa mengisi ID baru berformat angka untuk data batch expired baru.
                                    </li>
                                    <li>
                                        Untuk ID lama, secara otomatis sistem akan melakukan update/replace pada data id yang sama.
                                    </li>
                                    <li>
                                        Kode barang dan nama barang sesuaikan dengan data dari master barang.
                                    </li>
                                    <li>
                                        Satuan harus diisi berdasarkan data master barang.
                                    </li>
                                    <li>
                                        QTY harus berformat angka, minimal 1.
                                    </li>
                                    <li>
                                        Nomor Batch tidak wajib diisi.
                                    </li>
                                    <li>
                                        Tanggal Expired dan Reminder tidak wajib diisi.
                                    </li>
                                    <li>
                                        Tanggal Expired dan Reminder harus berformat YYYY-mm-dd misalnya "2023-01-29"
                                    </li>
                                    <li>
                                        Status hanya boleh diisi dengan Terdaftar, Terjual atau None.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Persiapkan data batch & expired dengan format excel anda sesuai pada tamplate yang sudah anda download tadi.
                            </li>
                            <li>Lanjutkan proses <i>import</i> dengan memilih tombol lanjutkan berikut ini.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-warning">
                <a href="index.php?Page=BarangExpired&Sub=Import" class="btn btn-primary btn-rounded">
                    <i class="bi bi-arrow-right"></i> Lanjutkan
                </a>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>