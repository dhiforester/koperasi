<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_anggota
    if(empty($_POST['id_anggota'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        //Tangkap id_shu_session
        if(empty($_POST['id_shu_session'])){
            echo '  <div class="row">';
            echo '      <div class="col-md-6 mb-3">';
            echo '          ID Bagi Hasil Tidak Boleh Kosong.';
            echo '      </div>';
            echo '  </div>';
        }else{
        $id_anggota=$_POST['id_anggota'];
        $id_shu_session=$_POST['id_shu_session'];
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $tanggal_masuk= $DataAnggota['tanggal_masuk'];
        $nama= $DataAnggota['nama'];
?>
    <input type="hidden" name="id_shu_session" value="<?php echo "$id_shu_session";?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">ID Anggota</label>
            <input type="text" readonly name="id_anggota" id="id_anggota" class="form-control" value="<?php echo "$id_anggota"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Nama Anggota</label>
            <input type="text" readonly name="nama_anggota" id="nama_anggota" class="form-control" value="<?php echo $nama; ?>">
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Simpanan</label>
            <input type="text" name="simpanan" id="simpanan" class="form-control format_uang">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Jasa Simpanan</label>
            <input type="text" name="jasa_simpanan" id="jasa_simpanan" class="form-control format_uang">
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Pinjaman</label>
            <input type="text" name="pinjaman" id="pinjaman" class="form-control format_uang">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Jasa Pinjaman</label>
            <input type="text" name="jasa_pinjaman" id="jasa_pinjaman" class="form-control format_uang">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Penjualan</label>
            <input type="text" name="penjualan" id="penjualan" class="form-control format_uang">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Jasa Penjualan</label>
            <input type="text" name="jasa_penjualan" id="jasa_penjualan" class="form-control format_uang">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="">Bagi Hasil</label>
            <input type="text" name="shu" id="shu" class="form-control format_uang">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiTambahRincian">
            <span class="text-info">
                Pastikan data rincian bagi hasil sudah sesuai.
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <button type="button" class="btn btn-md btn-info btn-block" data-bs-toggle="modal" data-bs-target="#ModalPilihAnggota" data-id="<?php echo "$id_shu_session"; ?>" title="Tambah Rincian">
                <i class="bi bi-arrow-left"></i> Kembali
            </button>
        </div>
    </div>
<?php }} ?>