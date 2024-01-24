<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_pinjaman'])){
        echo '<span class="text-danger">ID Pinjaman Tidak Boleh Kosong!</span>';
    }else{
        $id_pinjaman=$_POST['id_pinjaman'];
        //Buka data Anggota
        $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
        $DataPinjaman = mysqli_fetch_array($QryPinjaman);
        if(empty($DataPinjaman['id_anggota'])){
            echo '<span class="text-danger">Data Angsuran tidak ditemukan!</span>';
        }else{
            $id_anggota= $DataPinjaman['id_anggota'];
            $id_akses= $DataPinjaman['id_akses'];
            $nilai_angsuran= $DataPinjaman['nilai_angsuran'];
            $tanggal=date('Y-m-d');
?>
    <input type="hidden" name="id_anggota" value="<?php echo "$id_anggota"; ?>">
    <input type="hidden" name="id_pinjaman" value="<?php echo "$id_pinjaman"; ?>">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="tanggal">Tangal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $tanggal; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="kategori_angsuran">Kategori</label>
            <select name="kategori_angsuran" id="kategori_angsuran" class="form-control">
                <option value="">Pilih</option>
                <option value="Pokok">Pokok</option>
                <option value="Jasa">Jasa</option>
                <option value="Denda">Denda</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" class="form-control format_uang" value="<?php echo "$nilai_angsuran"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiTambahAngsuran">
            <small class="text-primary">Pastkan data yang anda input sudah benar</small>
        </div>
    </div>
<?php }} ?>