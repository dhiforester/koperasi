<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_pinjaman
    if(empty($_POST['id_pinjaman'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Pinjaman Tidak Bisa Ditangkap Oleh Sistem.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_pinjaman=$_POST['id_pinjaman'];
        //Buka data pinjaman
        //Buka data Anggota
        $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
        $DataPinjaman = mysqli_fetch_array($QryPinjaman);
        $id_anggota= $DataPinjaman['id_anggota'];
        $id_akses= $DataPinjaman['id_akses'];
        $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
        $tanggal_input= $DataPinjaman['tanggal_input'];
        $nama= $DataPinjaman['nama'];
        $jumlah_pinjaman= $DataPinjaman['jumlah_pinjaman'];
        $persen_jasa= $DataPinjaman['persen_jasa'];
        $estimasi_jasa= $DataPinjaman['estimasi_jasa'];
        $nilai_angsuran= $DataPinjaman['nilai_angsuran'];
        $periode_angsuran= $DataPinjaman['periode_angsuran'];
        $token= $DataPinjaman['token'];
        $status= $DataPinjaman['status'];
        $strotime2=strtotime($tanggal_input);
        $tanggal_input=date('d/m/Y H:i',$strotime2);
        $jumlah_pinjaman = "" . number_format($jumlah_pinjaman,0,',','.');
        $nilai_angsuran = "" . number_format($nilai_angsuran,0,',','.');
?>
    <input type="hidden" name="id_pinjaman" id="id_pinjaman" value="<?php echo "$id_pinjaman"; ?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="tanggal_pinjaman">Tanggal Pinjaman</label>
            <input type="date" name="tanggal_pinjaman" id="tanggal_pinjaman" class="form-control" value="<?php echo "$tanggal_pinjaman"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
            <input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control format_uang" value="<?php echo "$jumlah_pinjaman"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="persen_jasa">Persen Jasa (%)</label>
            <input type="text" class="form-control format_uang" name="persen_jasa" value="<?php echo "$persen_jasa";?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="estimasi_jasa">Estimasi Jasa (Rp)</label>
            <input type="text" class="form-control format_uang" name="estimasi_jasa" value="<?php echo "$estimasi_jasa";?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nilai_angsuran">Nilai Angsuran</label>
            <input type="text" class="form-control format_uang" name="nilai_angsuran" value="<?php echo "$nilai_angsuran";?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="periode_angsuran">Periode Angsuran</label>
            <input type="text" class="form-control format_uang" name="periode_angsuran" value="<?php echo "$periode_angsuran";?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="status">Status Pinjaman</label>
            <select name="status" id="status"  class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status=="Active"){echo "selected";} ?> value="Active">Active</option>
                <option <?php if($status=="Lunas"){echo "selected";} ?> value="Lunas">Lunas</option>
                <option <?php if($status=="Macet"){echo "selected";} ?> value="Macet">Macet</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiEditPinjaman">
            <span class="text-info">
                Pastikan Data Pinjaman Yang Anda Ubah Sudah Benar.
            </span>
        </div>
    </div>
<?php } ?>