<?php
    $sekarang=date('Y-m-d');
    //Menangkap data POST id_anggota
    if(empty($_POST['id_anggota'])){
        $id_anggota="";
        $nama="";
    }else{
        $id_anggota=$_POST['id_anggota'];
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $nama= $DataAnggota['nama'];
    }
    //Cek auto jurnal
    $AutoJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM auto_jurnal WHERE kategori_transaksi='Pinjaman'"));
?>
<section class="section dashboard">
    <form action="javascript:void(0);" id="ProsesTambahTabungan">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 mt-3">
                                <b>Tambah Simpanan Anggota</b>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <a href="javascript:void(0);" class="btn btn-md btn-info btn-block position-relative" data-bs-toggle="modal" data-bs-target="#ModalAutoJurnalTabungan" title="Setting Auto Jurnal Simpanan">
                                    <i class="bi bi-gear"></i> Auto Jurnal
                                    <?php if(empty($AutoJurnal)){ ?>
                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                    <?php }else{ ?>
                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <a href="index.php?Page=Tabungan" class="btn btn-md w-100 btn-dark" title="Kembali Ke Halaman Simpanan">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="id_anggota">ID Anggota</label>
                                <input type="text" readonly name="id_anggota" id="id_anggota" class="form-control" value="<?php echo "$id_anggota"; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama">Nama Anggota</label>
                                <input type="text" readonly name="nama" id="nama" class="form-control" value="<?php echo "$nama"; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Simpanan Pokok">Simpanan Pokok</option>
                                    <option value="Simpanan Wajib">Simpanan Wajib</option>
                                    <option value="Simpanan Sukarela">Simpanan Sukarela</option>
                                    <option value="Penarikan">Penarikan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="jumlah">Nominal (Rp/IDR)</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control format_uang">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <span class="text-primary" id="NotifikasiTambahTabungan">Pastikan data simpanan anggota yang anda input sudah benar</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary" title="Simpan Simpanan">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-md btn-warning" title="Reset Form Simpanan">
                            <i class="bi bi-arrow-90deg-left"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card" id="MenampilkanTabelSimpananAnggota">
               
            </div>
        </div>
    </div>
</section>