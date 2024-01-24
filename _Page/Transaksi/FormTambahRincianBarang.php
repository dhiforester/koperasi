<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger mb-3">';
        echo '          ID Barang Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        if(empty($_POST['KategoriTransaksi'])){
            $KategoriTransaksi="";
        }else{
            $KategoriTransaksi=$_POST['KategoriTransaksi'];
        }
        if(empty($_POST['GetIdTransaksi'])){
            $id_transaksi="";
        }else{
            $id_transaksi=$_POST['GetIdTransaksi'];
        }
        $id_barang=$_POST['id_barang'];
        //Buka data barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $id_barang= $DataBarang['id_barang'];
        $kode_barang= $DataBarang['kode_barang'];
        $nama_barang= $DataBarang['nama_barang'];
        $kategori_barang= $DataBarang['kategori_barang'];
        $satuan_barang= $DataBarang['satuan_barang'];
        $konversi= $DataBarang['konversi'];
        $harga_beli= $DataBarang['harga_beli'];
        $harga_beli_rp = "Rp " . number_format($harga_beli,0,',','.');
        $stok_barang= $DataBarang['stok_barang'];
        //Harga Barang
        if($KategoriTransaksi=="Penjualan"){
            $QryHarga = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataHarga = mysqli_fetch_array($QryHarga);
            if(empty($DataHarga['harga'])){
                $HargaMulti="";
                $HargaJual=$harga_beli;
            }else{
                $HargaMulti= $DataHarga['harga'];
                $HargaJual=$DataHarga['harga'];
            }
            $HargaInForm=$HargaJual;
        }else{
            $HargaInForm=$harga_beli;
        }
?>
    <input type="hidden" name="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
    <input type="hidden" name="id_barang" id="GetIdBarang" value="<?php echo "$id_barang"; ?>">
    <div class="row mt-2"> 
        <div class="col-md-4 mb-3">
            <label for="id_transaksi">ID Transaksi</label>
            <input type="text" readonly name="id_transaksi" class="form-control" value="<?php echo $id_transaksi;?>">
        </div>
        <div class="col-md-8 mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" readonly name="nama_barang" class="form-control" value="<?php echo $nama_barang;?>">
        </div>
    </div>
    <div class="row mt-2"> 
        <div class="col-md-6 mb-3" id="FormKategoriHarga">
            <label for="kategori_harga">Kategori Harga</label>
            <select name="kategori_harga" id="GetKategoriHarga" class="form-control">
                <?php
                    echo '<option value="">Harga Beli</option>';
                    $QryKategoriHarga= mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                    while ($DataKategoriHarga = mysqli_fetch_array($QryKategoriHarga)) {
                        $kategori_harga= $DataKategoriHarga['kategori_harga'];
                        if($KategoriTransaksi=="Penjualan"){
                            echo '<option selected value="'.$kategori_harga.'">'.$kategori_harga.'</option>';
                        }else{
                            echo '<option value="'.$kategori_harga.'">'.$kategori_harga.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="qty">Satuan</label>
            <select name="rincian_satuan_barang" id="rincian_satuan_barang" class="form-control">
                <?php
                    echo '<option value="0">'.$satuan_barang.'</option>';
                    $QrySatuan = mysqli_query($Conn, "SELECT*FROM barang_satuan WHERE id_barang='$id_barang'");
                    while ($DataSatuan = mysqli_fetch_array($QrySatuan)) {
                        $id_barang_satuan= $DataSatuan['id_barang_satuan'];
                        $satuan_multi= $DataSatuan['satuan_multi'];
                        echo '<option value="'.$id_barang_satuan.'">'.$satuan_multi.'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="qty">QTY</label>
            <input type="number" name="qty" id="qty_rincian" class="form-control" value="1">
        </div>
        <div class="col-md-6 mb-3">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga_rincian" class="form-control" value="<?php echo $HargaInForm;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah_rincian" class="form-control" value="<?php echo $HargaInForm;?>">
        </div>
    </div>
    <div class="row mb-2"> 
        <div class="col-md-12" id="NotifikasiTambahRincianBarang">
            <span>Pastikan rincian yang anda input sudah sesuai</span>
        </div>
    </div>
<?php } ?>