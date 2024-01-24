<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_tabungan
    if(empty($_POST['id_tabungan'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Wilayah Tidak Dapat Ditangkap Oleh Sistem.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_tabungan=$_POST['id_tabungan'];
        //Buka data askes
        $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_tabungan'")or die(mysqli_error($Conn));
        $DataSimpanan = mysqli_fetch_array($QrySimpanan);
        $id_simpanan= $DataSimpanan['id_simpanan'];
        $id_anggota= $DataSimpanan['id_anggota'];
        $kategori= $DataSimpanan['kategori'];
        $keterangan= $DataSimpanan['keterangan'];
        $nama= $DataSimpanan['nama'];
        $jumlah= $DataSimpanan['jumlah'];
        $tanggal= $DataSimpanan['tanggal'];
?>
    <input type="hidden" name="id_simpanan" id="id_simpanan" value="<?php echo "$id_simpanan"; ?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="id_anggota">ID Anggota</label>
            <input type="text" readonly name="id_anggota" id="id_anggota" class="form-control" value="<?php echo "$id_anggota"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nama">Nama Anggota</label>
            <input type="text" readonly name="nama" id="nama" class="form-control" value="<?php echo "$nama"; ?>">
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="kategori">Kategori</label>
            <input type="text" readonly name="kategori" id="kategori" class="form-control" value="<?php echo "$kategori"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo "$keterangan"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="jumlah">Nominal (Rp/IDR)</label>
            <input type="number" min="0" name="jumlah" id="jumlah" class="form-control" value="<?php echo "$jumlah"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <small>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <b>Penting!!</b> 
                    Setelah melakukan perubahan pada data ini sebaiknya anda juga melakukan pengecekan pada data jurnal.
                </div>
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <small class="text-primary" id="NotifikasiEditTabungan">
                Pastikan data simpanan anggota yang anda input sudah benar!
            </small>
        </div>
    </div>
<?php } ?>