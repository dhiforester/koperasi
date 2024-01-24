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
        //Hitung jumlah kategori harga
        $JumlahKategoriHarga=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_harga WHERE id_barang='$id_barang'"));
?>
    <input type="hidden" name="id_barang" id="id_barang" value="<?php echo $id_barang;?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="<?php echo "$kode_barang"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo "$nama_barang"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kategori_barang">Kategori</label>
            <input type="text" name="kategori_barang" id="kategori_barang" list="Listkategori" class="form-control" value="<?php echo "$kategori_barang"; ?>">
            <datalist id="Listkategori">
                <?php
                    $QryKategori = mysqli_query($Conn, "SELECT DISTINCT kategori_barang FROM barang ORDER BY kategori_barang ASC");
                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                        $kategori_barang_list= $DataKategori['kategori_barang'];
                        echo '<option value="'.$kategori_barang_list.'">';
                    }
                ?>
            </datalist>
        </div>
        <div class="col-md-6 mb-3">
            <label for="satuan_barang">Satuan</label>
            <input type="text" name="satuan_barang" id="satuan_barang" class="form-control" value="<?php echo "$satuan_barang"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="konversi">Konversi</label>
            <input type="number" min="1" name="konversi" id="konversi" class="form-control" required value="<?php echo "$konversi"; ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="stok_barang">Stok</label>
            <input type="number" min="0" name="stok_barang" id="stok_barang" class="form-control" value="<?php echo "$stok_barang"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" min="0" name="harga_beli" id="harga_beli" class="form-control" value="<?php echo "$harga_beli"; ?>">
        </div>
    </div>
    <div class="row">
        <?php
            $JmlKategori = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga"));
            if(!empty($JmlKategori)){
                $no=1;
                $QryKategoriHarga = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                while ($DataKategoriHarga = mysqli_fetch_array($QryKategoriHarga)) {
                    $kategori_harga= $DataKategoriHarga['kategori_harga'];
                    //Mencari nilai harga
                    $QryHarga = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$kategori_harga'")or die(mysqli_error($Conn));
                    $DataHarga = mysqli_fetch_array($QryHarga);
                    $harga_multi= $DataHarga['harga'];
                    echo '<div class="col-md-6 mb-2">';
                    echo '  <label for="Harga'.$no.'"><small>'.$kategori_harga.'</small></label>';
                    echo '  <input type="number" min="0" name="Harga'.$no.'" id="Harga'.$no.'" class="form-control" value="'.$harga_multi.'">';
                    echo '';
                    echo '</div>';
                    $no++;
                }
            }
        ?>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditBarang">
            <span class="text-primary">Pastikan bahwa informasi barang yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>