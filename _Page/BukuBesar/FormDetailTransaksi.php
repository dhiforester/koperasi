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
        $id_transaksi = $DataTransaksi['id_transaksi'];
        $id_akses= $DataTransaksi['id_akses'];
        $id_mitra= $DataTransaksi['id_mitra'];
        $id_pasien= $DataTransaksi['id_pasien'];
        $id_kunjungan= $DataTransaksi['id_kunjungan'];
        $tanggal= $DataTransaksi['tanggal'];
        $kategori= $DataTransaksi['kategori'];
        $tagihan= $DataTransaksi['tagihan'];
        $pembayaran= $DataTransaksi['pembayaran'];
        $metode= $DataTransaksi['metode'];
        $status= $DataTransaksi['status'];
        $pembayaran = "Rp " . number_format($pembayaran,2,',','.');
        $tagihan = "Rp " . number_format($tagihan,2,',','.');
        //Buka data mitra
        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
        $DataMitra = mysqli_fetch_array($QryMitra);
        $nama_mitra= $DataMitra['nama_mitra'];
        if(empty($id_pasien)){
            $QryPasien = mysqli_query($Conn,"SELECT * FROM pasien WHERE id_pasien='$id_pasien'")or die(mysqli_error($Conn));
            $DataPasien = mysqli_fetch_array($QryPasien);
            $nama_pasien= $DataPasien['nama_pasien'];
        }else{
            $QryPasien = mysqli_query($Conn,"SELECT * FROM pasien WHERE id_pasien='$id_pasien'")or die(mysqli_error($Conn));
            $DataPasien = mysqli_fetch_array($QryPasien);
            $nama_pasien= $DataPasien['nama_pasien'];
        }
?>
<div class="modal-body">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td><small><dt>ID Transaksi</dt></small></td>
                            <td><small><?php echo "$id_transaksi"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Tanggal</dt></small></td>
                            <td><small><?php echo "$tanggal"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>No.RM/ID.REG</dt></small></td>
                            <td><small><?php echo "$id_pasien/$id_kunjungan"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Pasien</dt></small></td>
                            <td><small><?php echo "$nama_pasien"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Kategori</dt></small></td>
                            <td><small><?php echo "$kategori"; ?></small></td>
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
                            <td><small><dt>Metode Pembayaran</dt></small></td>
                            <td><small><?php echo "$metode"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Mitra</dt></small></td>
                            <td><small><?php echo "$nama_mitra"; ?></small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
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