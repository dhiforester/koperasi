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
            <label for="id_barang_satuan">Satuan</label>
            <select name="id_barang_satuan" id="id_barang_satuan_detail" class="form-control">
                <option value="0"><?php echo "$satuan_barang"; ?></option>
                <?php
                    $QrySatuanMulti = mysqli_query($Conn, "SELECT * FROM barang_satuan WHERE id_barang='$id_barang' ORDER BY satuan_multi ASC");
                    while ($DataSatuanMulti = mysqli_fetch_array($QrySatuanMulti)) {
                        $id_barang_satuan= $DataSatuanMulti['id_barang_satuan'];
                        $satuan_multi= $DataSatuanMulti['satuan_multi'];
                        echo '<option value="'.$id_barang_satuan.'">'.$satuan_multi.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="no_batch">No/Kode Batch</label>
            <input type="text" name="no_batch" id="no_batch" class="form-control" value="<?php echo $kode_barang;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="expired_date">Expired</label>
            <input type="date" name="expired_date" id="expired_date" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="reminder_date">Pemberitahuan</label>
            <input type="date" name="reminder_date" id="reminder_date" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="qty_batch">Jumlah</label>
            <input type="number" name="qty_batch" id="qty_batch" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Pilih</option>
                <option value="Terdaftar">Terdaftar</option>
                <option value="Terjual">Terjual</option>
                <option value="None">None</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiTambahExpiredDate">
            <span class="text-primary">Pastikan bahwa informasi data yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>