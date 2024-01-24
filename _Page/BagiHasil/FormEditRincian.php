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
        <div class="col-md-6 mb-3">
            <label for="">ID Rincian</label>
            <input type="text" readonly name="id_shu_rincian" id="id_shu_rincian" class="form-control" value="<?php echo "$id_shu_rincian"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Nama Anggota</label>
            <input type="text" readonly name="nama_anggota" id="nama_anggota" class="form-control" value="<?php echo $nama_anggota; ?>">
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Simpanan</label>
            <input type="text" name="simpanan" id="simpanan" class="form-control format_uang" value="<?php echo "$simpanan"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Jasa Simpanan</label>
            <input type="text" name="jasa_simpanan" id="jasa_simpanan" class="form-control format_uang" value="<?php echo $jasa_simpanan; ?>">
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Pinjaman</label>
            <input type="text" name="pinjaman" id="pinjaman" class="form-control format_uang" value="<?php echo $pinjaman; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Jasa Pinjaman</label>
            <input type="text" name="jasa_pinjaman" id="jasa_pinjaman" class="form-control format_uang" value="<?php echo "$jasa_pinjaman"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Penjualan</label>
            <input type="text" name="penjualan" id="penjualan" class="form-control format_uang" value="<?php echo "$penjualan"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Jasa Penjualan</label>
            <input type="text" name="jasa_penjualan" id="jasa_penjualan" class="form-control format_uang" value="<?php echo $jasa_penjualan; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="">Bagi Hasil</label>
            <input type="text" name="shu" id="shu" class="form-control format_uang" value="<?php echo "$shu"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiEditRincian">
            <span class="text-info">
                Pastikan perubahan data rincian bagi hasil sudah sesuai.
            </span>
        </div>
    </div>
<?php } ?>