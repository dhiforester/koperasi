<?php
    //Tangkap id_akses
    if(empty($_GET['id'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Transaksi Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_transaksi=$_GET['id'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_transaksi= $DataTransaksi['id_transaksi'];
        $id_akses= $DataTransaksi['id_akses'];
        $tanggal= $DataTransaksi['tanggal'];
        $kategori= $DataTransaksi['kategori'];
        $tagihan= $DataTransaksi['tagihan'];
        $pembayaran= $DataTransaksi['pembayaran'];
        $kembalian= $DataTransaksi['kembalian'];
        $metode= $DataTransaksi['metode'];
        $keterangan= $DataTransaksi['keterangan'];
        $status= $DataTransaksi['status'];
        $pembayaran = "Rp " . number_format($pembayaran,0,',','.');
        $tagihan = "Rp " . number_format($tagihan,0,',','.');
        $kembalian = "Rp " . number_format($kembalian,0,',','.');
        //Buka data anggota
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
        $strtotime=strtotime($tanggal);
        $TanggalTransaksi=date('d/m/Y', $strtotime);
        $JamTrasaksi=date('H:i', $strtotime);
        $IdTransaksi = sprintf("%07d", $id_transaksi);
        //Buka data akses
        $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
        $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
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
?>
    <input type="hidden" name="GetIdTransaksi2" id="GetIdTransaksi2" value="<?php echo $id_transaksi;?>">
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <b class="card-title">Detail Transaksi</b>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=RiwayatAnggota&Sub=Pembelian" class="btn btn-md btn-info btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><small><dt>ID Transaksi</dt></small></td>
                                                <td><small id="GetIdTransaksi"><?php echo "$id_transaksi"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Tanggal</dt></small></td>
                                                <td><small><?php echo "$TanggalTransaksi $JamTrasaksi"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>User/Petugas</dt></small></td>
                                                <td><small><?php echo "$NamaAksesTransaksi"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Anggota</dt></small></td>
                                                <td><small><?php echo "$nama_anggota"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Supplier</dt></small></td>
                                                <td><small><?php echo "$nama_supplier"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Kategori</dt></small></td>
                                                <td><small><?php echo "$kategori"; ?></small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td><small><dt>Keterangan</dt></small></td>
                                                <td><small><?php echo "$keterangan"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Tagihan</dt></small></td>
                                                <td><small><?php echo "$tagihan"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Pembayaran</dt></small></td>
                                                <td><small><?php echo "$pembayaran"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Kembalian</dt></small></td>
                                                <td><small><?php echo "$kembalian"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Metode Pembayaran</dt></small></td>
                                                <td><small><?php echo "$metode"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Status</dt></small></td>
                                                <td><small><?php echo "$status"; ?></small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b class="card-title">Rincian Transaksi</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'"));
                                    if(empty($jml_data)){
                                        echo '<div class="alert alert-danger" role="alert">';
                                        echo '  Belum ada data rincian transaksi yang bisa ditampilkan.';
                                        echo '</div>';
                                    }else{
                                ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered align-items-center mb-0">
                                            <thead class="">
                                                <tr>
                                                    <th class="text-center">
                                                        <b>No</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>Rincian</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>Kategori</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>Harga</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>QTY</b>
                                                    </th>
                                                    <th class="text-center">
                                                        <b>Jumlah</b>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    $JumlahRincianTotal=0;
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                        $id_transaksi_rincian= $data['id_transaksi_rincian'];
                                                        $id_barang= $data['id_barang'];
                                                        $id_barang_harga= $data['id_barang_harga'];
                                                        $id_barang_satuan= $data['id_barang_satuan'];
                                                        $nama_barang= $data['nama_barang'];
                                                        $tanggal= $data['tanggal'];
                                                        $kategori_rincian= $data['kategori_rincian'];
                                                        $harga= $data['harga'];
                                                        $qty= $data['qty'];
                                                        $satuan= $data['satuan'];
                                                        $jumlah= $data['jumlah'];
                                                        if($kategori_rincian=="Barang"){
                                                            $ModalEdit="#ModalEditRincianBarang";
                                                        }else{
                                                            $ModalEdit="#ModalEditRincianLainnya";
                                                        }
                                                        //FormatRupiahJumlah
                                                        $JumlahRp="Rp " . number_format($jumlah,0,',','.');
                                                        $HargaRp="Rp " . number_format($harga,0,',','.');
                                                        $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                                                ?>
                                                        <tr>
                                                            <td class="text-center text-xs">
                                                                <?php 
                                                                    echo "<small >$no</small>";
                                                                ?>
                                                            </td>
                                                            <td class="text-left" align="left">
                                                                <?php 
                                                                    echo "<small>$nama_barang</small>";
                                                                ?>
                                                            </td>
                                                            <td class="text-left" align="left">
                                                                <?php 
                                                                    echo "<small>$kategori_rincian</small>";
                                                                ?>
                                                            </td>
                                                            <td class="text-right" align="right">
                                                                <?php 
                                                                    echo "<small>$HargaRp</small>";
                                                                ?>
                                                            </td>
                                                            <td class="text-left" align="left">
                                                                <?php 
                                                                    echo "<small>$qty $satuan</small>";
                                                                ?>
                                                            </td>
                                                            <td class="text-right" align="right">
                                                                <?php 
                                                                    echo "<small>$JumlahRp</small>";
                                                                ?>
                                                            </td>
                                                        </tr>
                                                <?php 
                                                    $no++; } 
                                                    if(empty($jml_data)){
                                                        $JumlahTotalRp="Rp 0";
                                                    }else{
                                                        $JumlahTotalRp="Rp " . number_format($JumlahRincianTotal,0,',','.');
                                                    }
                                                    $JumlahTotalDanPpn=$JumlahRincianTotal+$ppn_rp;
                                                    $JumlahTotalDanPpnRp="Rp " . number_format($JumlahTotalDanPpn,0,',','.');
                                                ?>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="4" align="left">
                                                            <b>SUBTOTAL</b>
                                                        </td>
                                                        <td class="text-right" align="right">
                                                            <?php 
                                                                echo "<b>$JumlahTotalRp</b>";
                                                            ?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="4" align="left">
                                                            <b>PPN/PPH (<?php echo "$ppn_persen%";?>)</b>
                                                        </td>
                                                        <td class="text-right" align="right">
                                                            <?php 
                                                                echo "<b>$PpnPphRp</b>";
                                                            ?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="4" align="left">
                                                            <b>JUMLAH TOTAL</b>
                                                        </td>
                                                        <td class="text-right" align="right">
                                                            <?php 
                                                                echo "<b>$JumlahTotalDanPpnRp</b>";
                                                            ?>
                                                        </td>
                                                        
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>