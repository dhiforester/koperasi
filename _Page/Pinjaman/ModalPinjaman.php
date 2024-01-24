<div class="modal fade" id="ModalFilterPinjaman" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesFilterPinjaman">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-funnel"></i> Filter Pinjaman</h5>
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
                                <option value="">Pilih</option>
                                <option value="tanggal_pinjaman">Tanggal Pinjaman</option>
                                <option value="tanggal_input">Tanggal Input</option>
                                <option value="nama">Nama Anggota</option>
                                <option value="jumlah_pinjaman">Jumlah Pinjaman</option>
                                <option value="nilai_angsuran">Nilai Angsuran</option>
                                <option value="periode_angsuran">Periode Angsuran</option>
                                <option value="status">Status</option>
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
                                <option value="tanggal_pinjaman">Tanggal Pinjaman</option>
                                <option value="tanggal_input">Tanggal Input</option>
                                <option value="nama">Nama Anggota</option>
                                <option value="jumlah_pinjaman">Jumlah Pinjaman</option>
                                <option value="nilai_angsuran">Nilai Angsuran</option>
                                <option value="periode_angsuran">Periode Angsuran</option>
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
<div class="modal fade" id="ModalExportPinjaman" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Pinjaman/ProsesExportPinjaman.php" method="POST">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-download"></i> Export Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="KeywordByExport">Pencarian</label>
                            <select name="KeywordByExport" id="KeywordByExport" class="form-control">
                                <option value="">Pilih</option>
                                <option value="tanggal_pinjaman">Tanggal Pinjaman</option>
                                <option value="tanggal_input">Tanggal Input</option>
                                <option value="nama">Nama Anggota</option>
                                <option value="jumlah_pinjaman">Jumlah Pinjaman</option>
                                <option value="nilai_angsuran">Nilai Angsuran</option>
                                <option value="periode_angsuran">Periode Angsuran</option>
                                <option value="status">Status</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <label for="FilterKeywordExport">Kata Kunci</label>
                            <input type="text" name="FilterKeywordExport" id="FilterKeywordExport" class="form-control">
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
<div class="modal fade" id="ModalTambahPinjaman" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahPinjaman">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-check"></i> Pilih Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahPinjaman">
                    
                </div>
                <div class="modal-footer bg-primary">
                    <!-- <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button> -->
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalAutoJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-info-circle"></i> Auto Jurnal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2 table-responsive">
                        <table class="table">
                            <?php
                                //Membuka Auto Jurnal Pinjaman
                                $QryAutoJurnalPinjaman = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Pinjaman'")or die(mysqli_error($Conn));
                                $DataAutoJurnalPinjaman = mysqli_fetch_array($QryAutoJurnalPinjaman);
                                $DebetNamePinjaman= $DataAutoJurnalPinjaman['debet_name'];
                                $KreditNamePinjaman= $DataAutoJurnalPinjaman['kredit_name'];
                                //Membuka Auto Jurnal Angsuran
                                $QryAutoJurnalAngsuran = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Angsuran'")or die(mysqli_error($Conn));
                                $DataAutoJurnalAngsuran = mysqli_fetch_array($QryAutoJurnalAngsuran);
                                $DebetNameAngsuran= $DataAutoJurnalAngsuran['debet_name'];
                                $KreditNameAngsuran= $DataAutoJurnalAngsuran['kredit_name'];

                            ?>
                            <tr>
                                <td><b>Kategori</b></td>
                                <td><b>D/K</b></td>
                                <td><b>Akun</b></td>
                            </tr>
                            <tr>
                                <td>Pinjaman</td>
                                <td>D</td>
                                <td><?php echo "$DebetNamePinjaman"; ?></td>
                            </tr>
                            <tr>
                                <td>Pinjaman</td>
                                <td>K</td>
                                <td><?php echo "$KreditNamePinjaman"; ?></td>
                            </tr>
                            <tr>
                                <td>Angsuran</td>
                                <td>D</td>
                                <td><?php echo "$DebetNameAngsuran"; ?></td>
                            </tr>
                            <tr>
                                <td>Angsuran</td>
                                <td>K</td>
                                <td><?php echo "$KreditNameAngsuran"; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        Untuk melakukan perubahan pada auto jurnal maka anda harus masuk ke halaman pengaturan.
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-info">
                <a href="index.php?Page=AutoJurnal" class="btn btn-success btn-rounded">
                    <i class="bi bi-gear"></i> Auto Jurnal
                </a>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditPinjaman" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditPinjaman">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditPinjaman">
                    
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
<div class="modal fade" id="ModalPilihAnggota" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="index.php?Page=Pinjaman&Sub=TambahPinjaman" method="POST">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-check"></i> Pilih Anggota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormPilihAnggota">
                    
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-arrow-right"></i> Lanjutkan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahTabungan">
                        <i class="bi bi-x-circle"></i> Kembali
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailPinjaman" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-info-circle"></i> Detail Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="FormDetailPinjaman">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditPinjaman" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditPinjaman">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditPinjaman">
                    
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
<div class="modal fade" id="ModalDeletePinjaman" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeletePinjaman">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusPinjaman">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalExportImportPinjaman" tabindex="-1">
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
                                Silahkan download terlebih dulu <i>backup</i> data Pinjaman yang sudah ada pada tautan 
                                <a href="_Page/Pinjaman/BackupDataPinjaman.php">berikut ini <i class="bi bi-file-earmark-ruled-fill"></i> .</a>
                                <ul>
                                    <li>
                                        Pada kolom ID Pinjaman, anda bisa mengisi ID baru berformat angka untuk Pinjaman baru.
                                    </li>
                                    <li>
                                        Untuk ID lama, secara otomatis sistem akan melakukan update/replace pada data id yang sama.
                                    </li>
                                    <li>
                                        Tanggal daftar harus berformat YYYY-mm-dd misalnya "2023-01-29"
                                    </li>
                                    <li>
                                        NIP, Email dan kontak boleh di kosongkan. Selebihnya wajib diisi.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Persiapkan data Pinjaman format excel anda sesuai pada tamplate yang sudah anda download tadi.
                            </li>
                            <li>Lanjutkan proses <i>import</i> dengan memilih tombol lanjutkan berikut ini.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-warning">
                <a href="index.php?Page=Pinjaman&Sub=Import" class="btn btn-primary btn-rounded">
                    <i class="bi bi-arrow-right"></i> Lanjutkan
                </a>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahAngsuran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahAngsuran">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah Angsuran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahAngsuran">
                    
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
<div class="modal fade" id="ModalExportAngsuran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Pinjaman/ProsesExportAngsuran.php" method="POST" target="_blank">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-download"></i> Export Angsuran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="FormExportAngsuran">
                    
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalHapusAngsuran" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Angsuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormHapusAngsuran">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusAngsuran">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
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
            <div class="modal-body" id="FormHapusJurnal">
                
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Semua Jurnal Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormHapusSemuaJurnal">
                
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
<div class="modal fade" id="ModalTambahJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahJurnal">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah Jurnal Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahJurnal">
                    
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
<div class="modal fade" id="ModalEditJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditJurnal">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Jurnal Pinjaman</h5>
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
<div class="modal fade" id="ModalExportJurnal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Pinjaman/ProsesExportJurnal.php" method="POST" target="_blank">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-download"></i> Export Jurnal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="FormExportJurnal">
                    
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalHapusSemuaAngsuran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Semua Angsuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormHapusSemuaAngsuran">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusSemuaAngsuran">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEditPinjaman2" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditPinjaman2">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditPinjaman2">
                    
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
<div class="modal fade" id="ModalDeletePinjaman2" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Pinjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeletePinjaman2">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusPinjaman2">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>