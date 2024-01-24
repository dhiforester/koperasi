<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap Data
    if(empty($_POST['id_barang'])){
        echo "ID Barang Tidak Boleh Kosong!";
    }else{
        $id_barang=$_POST['id_barang'];
        if(empty($_POST['kategori_harga'])){
            $kategori_harga="";
        }else{
            $kategori_harga=$_POST['kategori_harga'];
        }
        if(empty($_POST['id_barang_satuan'])){
            $id_barang_satuan="";
        }else{
            $id_barang_satuan=$_POST['id_barang_satuan'];
        }
        //Buka data harga
        $QryBarangHarga = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$kategori_harga' AND id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
        $DataBarangHarga = mysqli_fetch_array($QryBarangHarga);
        if(!empty($DataBarangHarga['id_barang_harga'])){
            $id_barang_harga= $DataBarangHarga['id_barang_harga'];
            $harga= $DataBarangHarga['harga'];
        }else{
            $id_barang_harga="";
            $harga=0;
        }
        //Buka barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $satuan_barang= $DataBarang['satuan_barang'];
?>
    <input type="hidden" name="id_barang_harga" value="<?php echo $id_barang_harga;?>">
    <input type="hidden" name="id_barang" value="<?php echo $id_barang;?>">
    <input type="hidden" name="id_barang_satuan" value="<?php echo $id_barang_satuan;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="id_barang_satuan">Satuan</label>
            <select disabled name="id_barang_satuan" id="id_barang_satuan_detail2" class="form-control">
                <option value="0"><?php echo "$satuan_barang"; ?></option>
                <?php
                    $QrySatuanMulti = mysqli_query($Conn, "SELECT * FROM barang_satuan WHERE id_barang='$id_barang' ORDER BY satuan_multi ASC");
                    while ($DataSatuanMulti = mysqli_fetch_array($QrySatuanMulti)) {
                        $id_barang_satuan_list= $DataSatuanMulti['id_barang_satuan'];
                        $satuan_multi_list= $DataSatuanMulti['satuan_multi'];
                        if($id_barang_satuan_list==$id_barang_satuan){
                            echo '<option selected value="'.$id_barang_satuan_list.'">'.$satuan_multi_list.'</option>';
                        }else{
                            echo '<option  value="'.$id_barang_satuan_list.'">'.$satuan_multi_list.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="kategori_harga">Kategori Harga</label>
            <input type="text" readonly name="kategori_harga" id="kategori_harga" class="form-control" placeholder="Harga Beli" value="<?php echo "$kategori_harga";?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="harga_multi">Harga</label>
            <input type="text" name="harga_multi" id="harga_multi2" class="form-control" value="<?php echo "$harga";?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditKategoriHarga">
            <span class="text-primary">Pastikan informasi harga sudah benar</span>
        </div>
    </div>
<?php } ?>