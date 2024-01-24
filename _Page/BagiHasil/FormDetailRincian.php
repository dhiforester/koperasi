<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_shu_rincian
    if(empty($_POST['id_shu_rincian'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Rincian Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_shu_rincian=$_POST['id_shu_rincian'];
        //Buka data detail
        $QryRincianBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_rincian WHERE id_shu_rincian='$id_shu_rincian'")or die(mysqli_error($Conn));
        $DataRincianBagihasil = mysqli_fetch_array($QryRincianBagiHasil);
        $id_anggota = $DataRincianBagihasil['id_anggota'];
        $nama_anggota = $DataRincianBagihasil['nama_anggota'];
        $simpanan = $DataRincianBagihasil['simpanan'];
        $pinjaman = $DataRincianBagihasil['pinjaman'];
        $penjualan = $DataRincianBagihasil['penjualan'];
        $jasa_simpanan = $DataRincianBagihasil['jasa_simpanan'];
        $jasa_pinjaman = $DataRincianBagihasil['jasa_pinjaman'];
        $jasa_penjualan = $DataRincianBagihasil['jasa_penjualan'];
        $shu = $DataRincianBagihasil['shu'];
        //Format rupiah
        $simpanan = "" . number_format($simpanan,0,',','.');
        $pinjaman = "" . number_format($pinjaman,0,',','.');
        $penjualan = "" . number_format($penjualan,0,',','.');
        $jasa_simpanan = "" . number_format($jasa_simpanan,0,',','.');
        $jasa_pinjaman = "" . number_format($jasa_pinjaman,0,',','.');
        $jasa_penjualan = "" . number_format($jasa_penjualan,0,',','.');
        $shu = "" . number_format($shu,0,',','.');
?>
    <div class="row">
        <div class="col-md-12 mb-3 table table-responsive" style="height: 350px; overflow-y: scroll;">
            <table class="table table-hover table-bordered">
                <tbody>
                    <tr>
                        <td><b>ID Rincian</b></td>
                        <td><?php echo "$id_shu_rincian"; ?></td>
                    </tr>
                    <tr>
                        <td><b>ID Anggota</b></td>
                        <td><?php echo "$id_anggota"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Anggota</b></td>
                        <td><?php echo "$nama_anggota"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Simpanan</b></td>
                        <td><?php echo "$simpanan"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Pinjaman</b></td>
                        <td><?php echo "$pinjaman"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Penjualan</b></td>
                        <td><?php echo "$penjualan"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jasa Simpanan</b></td>
                        <td><?php echo "$jasa_simpanan"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jasa Pinjaman</b></td>
                        <td><?php echo "$jasa_pinjaman"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jasa Penjualan</b></td>
                        <td><?php echo "$jasa_penjualan"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Bagi Hasil</b></td>
                        <td><?php echo "$shu"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <?php
                if(!empty($DataRincianBagihasil['id_anggota'])){
            ?>
                <a href="index.php?Page=Anggota&Sub=DetailAnggota&id=<?php echo "$id_anggota"; ?>" class="btn btn-sm btn-primary w-100" target="_blank">
                    <i class="bi bi-link-45deg"></i> Detail Anggota
                </a>
            <?php } ?>
        </div>
    </div>
<?php } ?>