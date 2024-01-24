<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Supplier Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_barang=$_POST['id_barang'];
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
?>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_barang;?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" readonly name="kode_barang" id="kode_barang" class="form-control" value="<?php echo "$kode_barang"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="satuan_multi">Nama Satuan</label>
            <input type="text" name="satuan_multi" id="satuan_multi" class="form-control" list="ListSatuanMulti">
            <datalist id="ListSatuanMulti">
                <?php
                    $QrySatuanMulti = mysqli_query($Conn, "SELECT DISTINCT satuan_multi FROM barang_satuan ORDER BY satuan_multi ASC");
                    while ($DataSatuanMulti = mysqli_fetch_array($QrySatuanMulti)) {
                        $satuan_multi= $DataSatuanMulti['satuan_multi'];
                        echo '<option value="'.$satuan_multi.'">';
                    }
                ?>
            </datalist>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="konversi">Konversi</label>
            <input type="number" name="konversi" id="konversi_satuan_multi" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="stok_multi">Stok Multi</label>
            <input type="text" readonly name="stok_multi" id="stok_multi" class="form-control" value="<?php echo "$stok_barang";?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiTambahSatuan">
            <span class="text-primary">Pastikan bahwa informasi barang yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>