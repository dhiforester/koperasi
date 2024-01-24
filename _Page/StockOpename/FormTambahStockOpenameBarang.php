<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_barang
    if(empty($_POST['id_barang'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Barang Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        if(empty($_POST['id_stok_opename'])){
            echo '  <div class="row">';
            echo '      <div class="col-md-6 mb-3">';
            echo '          ID Stck Opename Tidak Boleh Kosong!.';
            echo '      </div>';
            echo '  </div>';
        }else{
            $id_barang=$_POST['id_barang'];
            $id_stok_opename=$_POST['id_stok_opename'];
            //Buka data supplier
            $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataBarang = mysqli_fetch_array($QryBarang);
            $id_barang= $DataBarang['id_barang'];
            $kode_barang= $DataBarang['kode_barang'];
            $nama_barang= $DataBarang['nama_barang'];
            $kategori_barang= $DataBarang['kategori_barang'];
            $satuan_barang= $DataBarang['satuan_barang'];
            $konversi= $DataBarang['konversi'];
            $harga_beli= $DataBarang['harga_beli'];
            $stok_barang= $DataBarang['stok_barang'];
            //Hitung jumlah kategori harga
            $JumlahKategoriHarga=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_harga WHERE id_barang='$id_barang'"));
?>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo "$id_barang"; ?>">
    <input type="hidden" name="id_stok_opename" id="id_stok_opename" value="<?php echo "$id_stok_opename"; ?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" readonly name="nama_barang" id="nama_barang" class="form-control" value="<?php echo "$nama_barang"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="satuan">Satuan</label>
            <input type="text" readonly name="satuan" id="satuan" class="form-control" value="<?php echo "$satuan_barang"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="stok_awal">Stock Awal</label>
            <input type="text" readonly name="stok_awal" id="stok_awal" class="form-control" value="<?php echo "$stok_barang"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="harga">Harga</label>
            <input type="text" readonly name="harga" id="harga" class="form-control" value="<?php echo "$harga_beli"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="stok_akhir">Stock Akhir</label>
            <input type="text" name="stok_akhir" id="stok_akhir" class="form-control format_uang">
        </div>
        <div class="col-md-6 mb-3">
            <label for="harga_baru">Harga</label>
            <input type="text" name="harga_baru" id="harga_baru" class="form-control format_uang" value="<?php echo "$harga_beli"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Sistem akan melakukan update stok dan harga beli sesuai form ini.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiTambahSesiStockOpenameBarang">
            <span class="text-primary">
                Pastikan data sesi sudah sesuai.
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <button type="button" class="btn btn-md btn-info btn-block" data-bs-toggle="modal" data-bs-target="#ModalPilihBarang" data-id="<?php echo "$id_stok_opename"; ?>">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </button>
        </div>
    </div>
<?php }} ?>