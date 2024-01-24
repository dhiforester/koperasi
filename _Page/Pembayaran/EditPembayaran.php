<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_pembayaran
    if(empty($_GET['id'])){
        echo '<section class="section dashboard">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3 text-danger">';
        echo '          ID Pembayaran Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
        echo '</section>';
    }else{
        $id_pembayaran=$_GET['id'];
        //Buka data askes
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE id_pembayaran='$id_pembayaran'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        $id_pembayaran=$DataPembayaran['id_pembayaran'];
        $id_transaksi=$DataPembayaran['id_transaksi'];
        $id_akses=$DataPembayaran['id_akses'];
        $id_anggota=$DataPembayaran['id_anggota'];
        $id_supplier=$DataPembayaran['id_supplier'];
        $tanggal=$DataPembayaran['tanggal'];
        $strtotime=strtotime($tanggal);
        $tanggal_sekarang=date('Y-m-d',$strtotime);
        $jam_sekarang=date('H:i',$strtotime);
        $metode=$DataPembayaran['metode'];
        $jumlah=$DataPembayaran['jumlah'];
        $keterangan=$DataPembayaran['keterangan'];
        $kategori=$DataPembayaran['kategori'];
        //Format Rupiah
        $jumlah = "" . number_format($jumlah,0,',','.');
        //Buka data petugas
        if(!empty($id_akses)){
            $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $DataAkses = mysqli_fetch_array($QryAkses);
            if(empty($DataAkses['nama_akses'])){
                $NamaAkses="Akses None";
            }else{
                $NamaAkses= $DataAkses['nama_akses'];
            }
        }else{
            $NamaAkses="None";
        }
        //Buka data asnggota
        if(!empty($id_anggota)){
            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
            $DataAnggota = mysqli_fetch_array($QryAnggota);
            if(empty($DataAnggota['nama'])){
                $NamaAnggota="Anggota None";
            }else{
                $NamaAnggota= $DataAnggota['nama'];
            }
        }else{
            $NamaAnggota="None";
        }
        //Buka Supplier
        if(!empty($id_supplier)){
            $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
            $DataSupplier = mysqli_fetch_array($QrySupplier);
            if(!empty($DataSupplier['nama_supplier'])){
                $NamaSupplier= $DataSupplier['nama_supplier'];
            }else{
                $NamaSupplier="Supplier None";
            }
        }else{
            $NamaSupplier="None";
        }
?>
    <form action="javascript:void(0);" id="ProsesEditPembayaran">
        <input type="hidden" name="id_pembayaran" value="<?php echo "$id_pembayaran"; ?>">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10 mb-3">
                                    <b class="card-title">Form Edit Pembayaran</b>
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
                                        <?php
                                            if(!empty($id_transaksi)){
                                                echo '<option selected value="'.$id_transaksi.'">'.$id_transaksi.'.'.$kategori.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="id_anggota">ID.Anggota</label>
                                    <select name="id_anggota" id="id_anggota" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihAnggota" data-id="" title="Pilih Anggota">
                                        <option value="">Pilih</option>
                                        <?php
                                            if(!empty($id_anggota)){
                                                echo '<option selected value="'.$id_anggota.'">'.$id_anggota.'.'.$NamaAnggota.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="id_supplier">ID.Supplier</label>
                                    <select name="id_supplier" id="id_supplier" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihSupplier" data-id="" title="Pilih Supplier">
                                        <option value="">Pilih</option>
                                        <?php
                                            if(!empty($id_supplier)){
                                                echo '<option selected value="'.$id_supplier.'">'.$id_supplier.'.'.$NamaSupplier.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo "$kategori";?>">
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
                                        <option <?php if($metode==""){echo "selected";} ?> value="">Pilih</option>
                                        <option <?php if($metode=="Cash"){echo "selected";} ?> value="Cash">Cash</option>
                                        <option <?php if($metode=="Transfer"){echo "selected";} ?> value="Transfer">Transfer</option>
                                        <option <?php if($metode=="Online"){echo "selected";} ?> value="Online">Online</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="jumlah">Jumlah (Rp)</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control format_uang" value="<?php echo "$jumlah"; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="keterangan">Keterangan Pembayaran</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"><?php echo "$keterangan"; ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3" id="NotifikasiEditPembayaran">
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
<?php } ?>