<div class="modal fade" id="ModalFilterTabungan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesFilterTabungan">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-funnel"></i> Filter Data Simpanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="FilterBatas">Data</label>
                            <select name="FilterBatas" id="FilterBatas" class="form-control">
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
                                <option value="nama">Anggota</option>
                                <option value="kategori">Kategori</option>
                                <option value="keterangan">keterangan</option>
                                <option value="jumlah">Jumlah</option>
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
                                <option value="nama">Anggota</option>
                                <option value="kategori">Kategori</option>
                                <option value="keterangan">Keterangan</option>
                                <option value="jumlah">Jumlah</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="FormKataKunci">
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
<div class="modal fade" id="ModalTambahTabungan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="bi bi-people"></i> Pilih Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" id="ProsesCariAnggota">
                    <div class="row">
                        <div class="col-md-10 mb-2">
                            <input type="text" name="KeywordAnggota" id="KeywordAnggota" class="form-control" placeholder="Cari Anggota">
                        </div>
                        <div class="col-md-2 mb-2">
                            <button type="submit" class="btn btn-md btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div id="DataListAnggota">
                    
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="index.php?Page=Tabungan&Sub=TambahTabungan" method="POST">
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
<div class="modal fade" id="ModalAutoJurnalTabungan" tabindex="-1">
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
                                //Membuka Auto Jurnal Simpanan
                                $QryAutoJurnalSimpanan = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Simpanan'")or die(mysqli_error($Conn));
                                $DataAutoJurnalSimpanan = mysqli_fetch_array($QryAutoJurnalSimpanan);
                                $DebetNameSimpanan= $DataAutoJurnalSimpanan['debet_name'];
                                $KreditNameSimpanan= $DataAutoJurnalSimpanan['kredit_name'];
                                //Membuka Auto Jurnal Penarikan
                                $QryAutoJurnalPenarikan = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Penarikan'")or die(mysqli_error($Conn));
                                $DataAutoJurnalPenarikan = mysqli_fetch_array($QryAutoJurnalPenarikan);
                                $DebetNamePenarikan= $DataAutoJurnalPenarikan['debet_name'];
                                $KreditNamePenarikan= $DataAutoJurnalPenarikan['kredit_name'];

                            ?>
                            <tr>
                                <td><b>Kategori</b></td>
                                <td><b>D/K</b></td>
                                <td><b>Akun</b></td>
                            </tr>
                            <tr>
                                <td>Simpanan</td>
                                <td>D</td>
                                <td><?php echo "$DebetNameSimpanan"; ?></td>
                            </tr>
                            <tr>
                                <td>Simpanan</td>
                                <td>K</td>
                                <td><?php echo "$KreditNameSimpanan"; ?></td>
                            </tr>
                            <tr>
                                <td>Penarikan</td>
                                <td>D</td>
                                <td><?php echo "$DebetNamePenarikan"; ?></td>
                            </tr>
                            <tr>
                                <td>Penarikan</td>
                                <td>K</td>
                                <td><?php echo "$KreditNamePenarikan"; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <small>Untu mengubah auto jurnal anda bisa masuk ke halaman pengaturan.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-info">
                <a href="index.php?Page=AutoJurnal" target="_blank" class="btn btn-success btn-rounded" title="Ubah Pengaturan Auto Jurnal">
                    <i class="bi bi-gear-fill"></i> Auto Jurnal
                </a>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditTabungan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditTabungan">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-person-plus"></i> Edit Data Simpanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditTabungan">
                    
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
<div class="modal fade" id="ModalDetailTabungan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-info-circle"></i> Detail Data Simpanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="FormDetailTabungan">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDeleteTabungan" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light"><i class="bi bi-trash"></i> Hapus Data Simpanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteTabungan">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusTabungan">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDatabaseTabungan" tabindex="-1">
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
                                Silahkan download terlebih dulu <i>backup</i> data simpanan yang sudah ada pada tautan 
                                <a href="_Page/Tabungan/BackupSimpanan.php">berikut ini <i class="bi bi-file-earmark-ruled-fill"></i> .</a>
                                <ul>
                                    <li>
                                        Pada kolom ID simpanan, anda bisa mengisi ID baru berformat angka untuk simpanan baru.
                                    </li>
                                    <li>
                                        Untuk ID lama, secara otomatis sistem akan melakukan update/replace pada data id yang sama.
                                    </li>
                                    <li>
                                        Jumlah simpanan harus berformat angka.
                                    </li>
                                    <li>
                                        Tanggal simpanan harus berformat YYYY-mm-dd misalnya "2023-01-29"
                                    </li>
                                    <li>
                                        Kategori terdiri dari Simpanan Pokok, Simpanan Wajib, Simpanan Sukarela atau Penarikan.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Persiapkan data anggota format excel anda sesuai pada tamplate yang sudah anda download tadi.
                            </li>
                            <li>Lanjutkan proses <i>import</i> dengan memilih tombol lanjutkan berikut ini.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-warning">
                <a href="index.php?Page=Tabungan&Sub=Import" class="btn btn-primary btn-rounded">
                    <i class="bi bi-arrow-right"></i> Lanjutkan
                </a>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditSimpananAnggota" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditSimpananAnggota">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light">
                        <i class="bi bi-person-plus"></i> Edit Data Simpanan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditSimpanan">
                    
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
<div class="modal fade" id="ModalDeleteSimpananAnggota" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light">
                    <i class="bi bi-trash"></i> Hapus Data Simpanan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteSimpananAnggota">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusSimpananAnggota">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalExportSimpanan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Anggota/ProsesExportSimpanan.php" method="POST" target="_blank">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-download"></i> Export Simpanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormExportSimpanan">
                </div>
                <div class="modal-footer bg-info">
                    <button type="submit" class="btn btn-success btn-rounded">
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
<div class="modal fade" id="ModalTambahJurnalSimpanan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahJurnalSimpanan">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-plus"></i> Tambah Jurnal Simpanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahJurnalSimpanan">
                    
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
<div class="modal fade" id="ModalEditJurnalSimpanan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditJurnalSimpanan">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-pencil-square"></i> Edit Jurnal Simpanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditJurnalSimpanan">
                    
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
<div class="modal fade" id="ModalDeleteJurnalSimpanan" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-light">
                    <i class="bi bi-trash"></i> Hapus Jurnal Simpanan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDeleteJurnalSimpananAnggota">
                
            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiHapusJurnalSimpananAnggota">
                    <i class="bi bi-check"></i> Ya
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>