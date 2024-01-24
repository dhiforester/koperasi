<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12 text-center text-danger">';
        echo '      ID Transaksi Tidak Boleh Kosong';
        echo '  </div>';
        echo '</div>';
    }else{
        //keyword_by
        if(!empty($_POST['keyword_by'])){
            $keyword_by=$_POST['keyword_by'];
        }else{
            $keyword_by="";
        }
        //keyword
        if(!empty($_POST['keyword'])){
            $keyword=$_POST['keyword'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['batas'])){
            $batas=$_POST['batas'];
        }else{
            $batas="10";
        }
        //batas
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
        }else{
            $page="";
        }
        $id_transaksi=$_POST['id_transaksi'];
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
        $pembayaran = "" . number_format($pembayaran,0,',','.');
        $tagihan = "" . number_format($tagihan,0,',','.');
        $kembalian = "" . number_format($kembalian,0,',','.');
        //Buka data anggota
        if(!empty($DataTransaksi['id_anggota'])){
            $id_anggota= $DataTransaksi['id_anggota'];
            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
            $DataAnggota = mysqli_fetch_array($QryAnggota);
            $nama_anggota= $DataAnggota['nama'];
        }else{
            $id_anggota=0;
            $nama_anggota="None";
        }
        //Buka Supplier
        if(empty($DataTransaksi['id_supplier'])){
            $id_supplier=0;
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
?>
    <div class="row mb-2">
        <div class="col-md-12" style="height: 350px; overflow-y: scroll;">
            <div class="table table-responsive">
                <table class="table table-bordered table-responsive">
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
                            <td><small><b id="GetIdAnggota"><?php echo "$id_anggota"; ?></b>.<?php echo "$nama_anggota"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Supplier</dt></small></td>
                            <td><small><b id="GetIdSupplier"><?php echo "$id_supplier"; ?></b>.<?php echo "$nama_supplier"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Kategori</dt></small></td>
                            <td><small id="GetKategori"><?php echo "$kategori"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Keterangan</dt></small></td>
                            <td><small><?php echo "$keterangan"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Tagihan</dt></small></td>
                            <td><small id="GetTagihan"><?php echo "$tagihan"; ?></small></td>
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
                            <td><small id="GetMetode"><?php echo "$metode"; ?></small></td>
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
    <div class="row">
        <div class="col-md-6 mb-2">
            <button type="button" class="btn btn-block btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalPilihTransaksi" data-id="<?php echo "$keyword_by,$keyword,$batas,$page"; ?>" title="Kembali Pilih Transaksi">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </button>
        </div>
        <div class="col-md-6 mb-2">
            <button type="button" class="btn btn-block btn-primary" id="LanjutkanPilihTransaksi" title="Lanjutkan Pilih Transaksi">
                Lanjutkan <i class="bi bi-arrow-right-circle"></i>
            </button>
        </div>
    </div>
<?php } ?>