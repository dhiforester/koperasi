<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_barang_satuan
    if(empty($_POST['id_barang_satuan'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Supplier Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_barang_satuan=$_POST['id_barang_satuan'];
        //Buka data supplier
        $QryBarangSatuan = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
        $DataBarangSatuan= mysqli_fetch_array($QryBarangSatuan);
        $id_barang= $DataBarangSatuan['id_barang'];
        $kode_barang= $DataBarangSatuan['kode_barang'];
        $satuan_multi= $DataBarangSatuan['satuan_multi'];
        $konversi= $DataBarangSatuan['konversi_multi'];
        $stok_multi= $DataBarangSatuan['stok_multi'];
?>
    <input type="hidden" name="id_barang_satuan" id="id_barang_satuan" value="<?php echo $id_barang_satuan;?>">
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_barang;?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="<?php echo "$kode_barang"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="satuan_multi">Nama Satuan</label>
            <input type="text" name="satuan_multi" id="satuan_multi" class="form-control" list="ListSatuanMulti" value="<?php echo "$satuan_multi"; ?>">
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
            <input type="number" name="konversi" id="konversi_satuan_multi" class="form-control" value="<?php echo "$konversi";?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="stok_multi">Stok Multi</label>
            <input type="text" readonly name="stok_multi" id="stok_multi_edit" class="form-control" value="<?php echo "$stok_multi";?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditSatuan">
            <span class="text-primary">Pastikan bahwa informasi barang yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>