<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_stok_opename_barang'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Stck Opename Tidak Boleh Kosong!.';
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
            $id_stok_opename_barang=$_POST['id_stok_opename_barang'];
            $id_stok_opename=$_POST['id_stok_opename'];
            //Buka data stock opename barang
            $Qry = mysqli_query($Conn,"SELECT * FROM stok_opename_barang WHERE id_stok_opename_barang='$id_stok_opename_barang'")or die(mysqli_error($Conn));
            $Data = mysqli_fetch_array($Qry);
            $id_barang= $Data['id_barang'];
            $nama_barang= $Data['nama_barang'];
            $satuan= $Data['satuan'];
            $stok_awal= $Data['stok_awal'];
            $stok_akhir= $Data['stok_akhir'];
            $stok_gap= $Data['stok_gap'];
            $harga= $Data['harga'];
            $jumlah= $Data['jumlah'];
?>
    <input type="hidden" name="id_stok_opename_barang" id="id_stok_opename_barang" value="<?php echo "$id_stok_opename_barang"; ?>">
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
            <input type="text" readonly name="satuan" id="satuan" class="form-control" value="<?php echo "$satuan"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="stok_awal">Stock Awal</label>
            <input type="text" name="stok_awal" id="stok_awal" class="form-control" value="<?php echo "$stok_awal"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="stok_akhir">Stock Akhir</label>
            <input type="text" name="stok_akhir" id="stok_akhir" class="form-control format_uang" value="<?php echo "$stok_akhir"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control format_uang" value="<?php echo "$harga"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiEditStockOpenameBarang">
            <span class="text-primary">
                Pastikan data stock opename sudah sesuai.
            </span>
        </div>
    </div>
<?php }} ?>