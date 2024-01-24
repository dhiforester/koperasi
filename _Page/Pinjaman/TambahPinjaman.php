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
    <form action="javascript:void(0);" id="ProsesTambahPinjaman">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 mt-3">
                                <b>Tambah Pinjaman Anggota</b>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <a href="javascript:void(0);" class="btn btn-md btn-info btn-block position-relative" data-bs-toggle="modal" data-bs-target="#ModalAutoJurnal" title="Setting Auto Jurnal">
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
                                <a href="index.php?Page=Pinjaman" class="btn btn-md w-100 btn-dark" title="Kembali Ke Halaman Pinjaman">
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
                            <div class="col-md-3 mb-3">
                                <label for="nama">Nama Anggota</label>
                                <input type="text" readonly name="nama" id="nama" class="form-control" value="<?php echo "$nama"; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tanggal_pinjaman">Tanggal Pinjaman</label>
                                <input type="date" name="tanggal_pinjaman" id="tanggal_pinjaman" class="form-control" value="<?php echo "$sekarang"; ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="tanggal_input">Tanggal Pencatatan</label>
                                <input type="date" readonly name="tanggal_input" id="tanggal_input" class="form-control" value="<?php echo "$sekarang"; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="jumlah_pinjaman">Jumlah Pinjaman (Rp/IDR)</label>
                                <input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control format_uang">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="persen_jasa">Persen Jasa</label>
                                <input type="text" name="persen_jasa" id="persen_jasa" class="form-control format_uang">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="nilai_angsuran">Angsuran (Rp/IDR)</label>
                                <input type="text" name="nilai_angsuran" id="nilai_angsuran" class="form-control format_uang">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="periode_angsuran">Periode Angsuran</label>
                                <input type="text" name="periode_angsuran" id="periode_angsuran" class="form-control format_uang">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="estimasi_jasa">Estimasi Jasa(Rp/IDR)</label>
                                <input type="text" name="estimasi_jasa" id="estimasi_jasa" class="form-control format_uang">
                                <small>
                                    <a href="javascript:void(0);" id="HitungSimulasi">
                                        Simulasi Pinjaman <i class="bi bi-r-circle"></i>
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="SimulasiPinjaman">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <span class="text-primary" id="NotifikasiTambahPinjaman">
                                    Pastikan data Pinjaman anggota yang anda input sudah benar.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary" title="Simpan Pinjaman">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-md btn-warning" title="Reset Form Pinjaman">
                            <i class="bi bi-arrow-90deg-left"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>