<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(empty($_POST['id_transaksi'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Transaksi Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
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
?>
<div class="modal-body">
    <div class="row mt-2">
        <div class="col-md-12" style="height: 350px; overflow-y: scroll;">
            <div class="table table-responsive">
                <table class="table table-bordered table-responsive">
                    <tbody>
                        <tr>
                            <td><small><dt>ID Transaksi</dt></small></td>
                            <td><small><?php echo "$id_transaksi"; ?></small></td>
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
    <div class="row">
        <div class="col-md-12 mt-3">
            <a href="index.php?Page=Transaksi&Sub=DetailTransaksi&id=<?php echo "$id_transaksi";?>" class="btn btn-sm btn-success w-100">
                <i class="bi bi-three-dots"></i> Selengkapnya
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <a href="_Page/CetakInvoice/CetakInvoiceByTransaksi.php?id_transaksi=<?php echo "$id_transaksi";?>" target="_blank" class="btn btn-sm btn-primary w-100">
                <i class="bi bi-printer"></i> Print
            </a>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Tutup
            </button>
        </div>
    </div>
</div>
<?php } ?>