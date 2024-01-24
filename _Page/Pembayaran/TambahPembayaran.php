<?php
    $tanggal_sekarang=date('Y-m-d');
    $jam_sekarang=date('H:i');
?>
<form action="javascript:void(0);" id="ProsesSimpanPembayaran">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <b class="card-title">Form Tambah Pembayaran</b>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="index.php?Page=Pembayaran" class="btn btn-md btn-block btn-dark btn-rounded">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="id_transaksi">ID.Transaksi</label>
                                <select name="id_transaksi" id="id_transaksi" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihTransaksi" data-id="" title="Pilih Transaksi">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="id_anggota">ID.Anggota</label>
                                <select name="id_anggota" id="id_anggota" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihAnggota" data-id="" title="Pilih Anggota">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="id_supplier">ID.Supplier</label>
                                <select name="id_supplier" id="id_supplier" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihSupplier" data-id="" title="Pilih Supplier">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" id="kategori" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal_sekarang";?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="jam">Jam</label>
                                <input type="time" name="jam" id="jam" class="form-control" value="<?php echo "$jam_sekarang";?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="metode">Metode Pembayaran</label>
                                <select name="metode" id="metode" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Online">Online</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="jumlah">Jumlah (Rp)</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control format_uang">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="keterangan">Keterangan Pembayaran</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="NotifikasiSimpanPembayaran">
                                <span class="text-primary">Pastikan bahwa data pembayaran sudah terisi dengan benar</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-md btn-warning">
                            <i class="bi bi-arrow-90deg-left"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>