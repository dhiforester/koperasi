<?php
    if(empty($_GET['id'])){
        echo '<section class="section dashboard">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12">';
        echo '          <div class="alert alert-danger" role="alert">';
        echo '              Maaf!! ID Transaksi Tidak Boleh Kosong!!';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</section>';
    }else{
        $id_transaksi=$_GET['id'];
        //Buka data transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        if(empty($DataTransaksi['id_transaksi'])){
            echo '<section class="section dashboard">';
            echo '  <div class="row">';
            echo '      <div class="col-md-12">';
            echo '          <div class="alert alert-danger" role="alert">';
            echo '              Maaf!! ID Transaksi Tersebut Tidak Ditemukan!!';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
            echo '</section>';
        }else{
            $id_transaksi = $DataTransaksi['id_transaksi'];
            $id_akses= $DataTransaksi['id_akses'];
            $id_anggota= $DataTransaksi['id_anggota'];
            $id_supplier= $DataTransaksi['id_supplier'];
            $tanggal= $DataTransaksi['tanggal'];
            $kategori= $DataTransaksi['kategori'];
            $tagihan= $DataTransaksi['tagihan'];
            $pembayaran= $DataTransaksi['pembayaran'];
            $kembalian= $DataTransaksi['kembalian'];
            $metode= $DataTransaksi['metode'];
            $keterangan= $DataTransaksi['keterangan'];
            $status= $DataTransaksi['status'];
           //Buka data akses
            $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
            $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
            //Buka data supplier dan anggota
            if(!empty($DataTransaksi['id_anggota'])){
                $id_anggota= $DataTransaksi['id_anggota'];
                $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                $DataAnggota = mysqli_fetch_array($QryAnggota);
                $nama_anggota= $DataAnggota['nama'];
            }else{
                $nama_anggota="None";
            }
            //Buka Supplier
            if(empty($DataTransaksi['id_supplier'])){
                $nama_supplier="None";
            }else{
                $id_supplier= $DataTransaksi['id_supplier'];
                $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                $DataSupplier = mysqli_fetch_array($QrySupplier);
                $nama_supplier= $DataSupplier['nama_supplier'];
            }
            //Buka PPN dan PPH
            $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
            $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
            if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
                $ppn_persen=0;
                $ppn_rp=0;
            }else{
                $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                $ppn_rp=$dataTransaksiPpn['ppn_rp'];
            }
            $PpnPphRp="Rp " . number_format($ppn_rp,0,',','.');
            //Pecah tanggal dan jam
            $strtotime=strtotime($tanggal);
            $tanggal=date('Y-m-d',$strtotime);
            $jam=date('H:i',$strtotime);
            $tagihan="" . number_format($tagihan,0,',','.');
?>
    <form action="javascript:void(0);" id="ProsesEditTransaksi" autocomplete="off">
        <input type="hidden" name="GetIdTransaksiEdit" id="GetIdTransaksiEdit" value="<?php echo "$id_transaksi"; ?>">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10 mt-3">
                                    <b class="card-title">Form Edit Transaksi</b>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <a href="index.php?Page=Transaksi&Sub=DetailTransaksi&id=<?php echo "$id_transaksi"; ?>" class="btn btn-md btn-dark btn-rounded btn-block">
                                        <i class="bi bi-arrow-left-short"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="jam">Jam</label>
                                    <input type="time" name="jam" id="jam" class="form-control" value="<?php echo "$jam"; ?>">
                                </div>
                                <div class="col-md-3 mb-3" id="PutIdPasien">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" readonly name="kategori" id="kategori" class="form-control" value="<?php echo "$kategori"; ?>">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="status">Status Transaksi</label>
                                    <select name="status" id="status" class="form-control">
                                        <option <?php if($status==""){echo "selected";} ?> value="">Pilih</option>
                                        <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                                        <option <?php if($status=="Lunas"){echo "selected";} ?> value="Lunas">Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label for="id_anggota">Anggota</label>
                                    <select name="id_anggota" id="GetIdAnggota" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalCariAnggota">
                                        <?php
                                            if(!empty($DataTransaksi['id_anggota'])){
                                                echo '<option value="'.$id_anggota.'">'.$nama_anggota.'</option>';
                                            }else{
                                                echo '<option value="">Pilih</option>';
                                            }
                                        ?>
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
                                        <?php
                                            if(!empty($DataTransaksi['id_supplier'])){
                                                echo '<option value="'.$id_supplier.'">'.$nama_supplier.'</option>';
                                            }else{
                                                echo '<option value="">Pilih</option>';
                                            }
                                        ?>
                                    </select>
                                    <small>
                                        <a href="javascript:void(0);" id="ReloadSupplier">
                                            <small><i class="bi bi-arrow-counterclockwise"></i> Reload</small>
                                        </a>
                                    </small>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="tagihan">Jumlah Tagihan</label>
                                        <input type="text" name="tagihan" id="jumlah_transaksi_edit" class="form-control" value="<?php echo "$tagihan"; ?>">
                                        <label>
                                            <a href="javascript:void(0);" id="ClickTambahDariRincianEdit">
                                                <small>Update Dari Rincian</small>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="pembayaran">Pembayaran</label>
                                    <input type="text" name="pembayaran" id="pembayaran_edit" class="form-control" value="<?php echo "$pembayaran"; ?>">
                                    <label>
                                        <a href="javascript:void(0);" id="ClickPembayaranEdit">
                                            <small>Samakan Dengan Tagihan</small>
                                        </a>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="kembalian" id="ShowKembalian">Kembalian</label>
                                    <input type="text" name="kembalian" id="kembalian_edit" class="form-control" value="<?php echo "$kembalian"; ?>">
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
                                <div class="col-md-6 mb-3">
                                    <label for="keterangan">Keterangan Transaksi</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo "$keterangan"; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3" id="NotifikasiEditTransaksi">
                                    <span class="text-primary">
                                        Pastikan bahwa informasi transaksi sudah terisi dengan benar!
                                    </sp>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-2 mt-3">
                                    <button type="submit" class="btn btn-md btn-block btn-success">
                                        <i class="bi bi-save"></i> Simpan
                                    </button>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <button type="reset" class="btn btn-md btn-block btn-warning">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
<?php }} ?>