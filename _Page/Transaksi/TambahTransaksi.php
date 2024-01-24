<?php
    $GetIdAnggota="";
    $GetIdSupplier="0";
    $now=date('Y-m-d');
    $jam=date('H:i');
    $GetKategori="0";
    $GetMetode="0";
    $GetKeterangan="";
    $GetPembayaran="0";
    $GetStatus="0";
    $datetime_kunjungan="";
?>
<form action="javascript:void(0);" id="ProsesTambahTransaksi" autocomplete="off">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 mt-3">
                                <b class="card-title">Form Tambah Transaksi</b>
                            </div>
                            <div class="col-md-2 mt-3">
                                <a href="index.php?Page=Transaksi" class="btn btn-md btn-dark btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-short"></i> Kembali
                                </a>
                            </div>
                            <div class="col-md-2 mt-3" id="TombolAutoJurnal">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahRincian">
                                    <i class="bi bi-plus-lg"></i> Rincian Barang
                                </button>
                            </div>
                            <div class="col-md-4 mb-2">
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahRincianLainnya">
                                    <i class="bi bi-plus-lg"></i> Rincian Lainnya
                                </button>
                            </div>
                            <div class="col-md-4 mb-2">
                                <button type="button" class="btn btn-sm btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahPpn">
                                    <i class="bi bi-plus-lg"></i> PPN
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="MenampilkanTabelRincian">
                                <!-- Menampilkan Data Rincian Transaksi -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$now"; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="jam">Jam</label>
                                <input type="time" name="jam" id="jam" class="form-control" value="<?php echo "$jam"; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="kategori">Kategori Transaksi</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option <?php if($GetKategori=="0"){echo "selected";} ?> value="">Pilih</option>
                                    <option <?php if($GetKategori=="Pembelian"){echo "selected";} ?> value="Pembelian">Pembelian</option>
                                    <option <?php if($GetKategori=="Penjualan"){echo "selected";} ?> value="Penjualan">Penjualan</option>
                                    <option <?php if($GetKategori=="Penerimaan"){echo "selected";} ?> value="Penerimaan">Penerimaan</option>
                                    <option <?php if($GetKategori=="Pengeluaran"){echo "selected";} ?> value="Penerimaan">Pengeluaran</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="status">Status Transaksi</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label for="id_anggota">Anggota</label>
                                <select name="id_anggota" id="GetIdAnggota" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalCariAnggota">
                                    <option value="">Pilih</option>
                                </select>
                                <small>
                                    <a href="javascript:void(0);" id="ReloadAnggota">
                                        <small><i class="bi bi-arrow-counterclockwise"></i> Reload</small>
                                    </a>
                                </small>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="PilihSupplier">Supplier</label>
                                <select name="id_supplier" id="GetIdSupplier" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalCariSupplier">
                                    <option value="">Pilih</option>
                                </select>
                                <small>
                                    <a href="javascript:void(0);" id="ReloadSupplier">
                                        <small><i class="bi bi-arrow-counterclockwise"></i> Reload</small>
                                    </a>
                                </small>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="form-group">
                                    <label for="jumlah_transaksi">Jumlah Tagihan</label>
                                    <input type="text" name="jumlah_transaksi" id="jumlah_transaksi" class="form-control">
                                    <small>
                                        <a href="javascript:void(0);" id="ClickTambahDariRincian">
                                            <small><i class="bi bi-arrow-90deg-left"></i> Reload Tagihan</small>
                                        </a>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="pembayaran">Pembayaran</label>
                                <input type="text" name="pembayaran" id="pembayaran" class="form-control" value="<?php echo "$GetPembayaran"; ?>">
                                <small>
                                    <a href="javascript:void(0);" id="ClickSesuaikanPembayaran">
                                        <small><i class="bi bi-arrow-90deg-left"></i> Sesuaikan</small>
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="kembalian" id="ShowKembalian">Kembalian</label>
                                <input type="text" name="kembalian" id="kembalian" class="form-control" value="<?php echo "$GetPembayaran"; ?>">
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="keterangan">Keterangan Transaksi</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo "$GetKeterangan"; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="NotifikasiTambahTransaksi">
                                <div class="alert alert-info text-center" role="alert">
                                    Pastikan bahwa data transaksi sudah terisi dengan benar!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-3 mt-3">
                                <button type="submit" class="btn btn-md btn-block btn-success">
                                    <i class="bi bi-save"></i> Simpan Transaksi
                                </button>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-md btn-block btn-warning" data-bs-toggle="modal" data-bs-target="#ModalBatalkanTransaksi">
                                    <i class="bi bi-arrow-counterclockwise"></i> Batalkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>