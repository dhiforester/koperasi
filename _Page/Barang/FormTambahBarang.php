<?php
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
?>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="kode_barang">Kode Barang</label>
        <input type="text" name="kode_barang" id="kode_barang" class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="kategori_barang">Kategori</label>
        <input type="text" name="kategori_barang" id="kategori_barang" list="Listkategori" class="form-control">
        <datalist id="Listkategori">
            <?php
                $QryKategori = mysqli_query($Conn, "SELECT DISTINCT kategori_barang FROM barang ORDER BY kategori_barang ASC");
                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                    $kategori_barang= $DataKategori['kategori_barang'];
                    echo '<option value="'.$kategori_barang.'">';
                }
            ?>
        </datalist>
    </div>
    <div class="col-md-6 mb-3">
        <label for="satuan_barang">Satuan</label>
        <input type="text" name="satuan_barang" id="satuan_barang" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-3">
        <label for="konversi">Konversi</label>
        <input type="number" min="1" name="konversi" id="konversi" class="form-control" required value="1">
    </div>
    <div class="col-md-3 mb-3">
        <label for="stok_barang">Stok</label>
        <input type="number" min="0" name="stok_barang" id="stok_barang" class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="harga_beli">Harga Beli</label>
        <input type="number" min="0" name="harga_beli" id="harga_beli" class="form-control">
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
                echo '<div class="col-md-6 mb-2">';
                echo '  <label for="Harga'.$no.'"><small>'.$kategori_harga.'</small></label>';
                echo '  <input type="number" min="0" name="Harga'.$no.'" id="Harga'.$no.'" class="form-control">';
                echo '';
                echo '</div>';
                $no++;
            }
        }
    ?>
</div>
<div class="row">
    <div class="col-md-12" id="NotifikasiTambahBarang">
        <span class="text-primary">Pastikan bahwa informasi barang yang anda masukan sudah benar</span>
    </div>
</div>
