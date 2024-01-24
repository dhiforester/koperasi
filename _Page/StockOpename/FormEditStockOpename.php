<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_stok_opename'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Stock Opename Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_stok_opename=$_POST['id_stok_opename'];
        //Buka data Stock Opename
        $QryStockOpename = mysqli_query($Conn,"SELECT * FROM stok_opename WHERE id_stok_opename='$id_stok_opename'")or die(mysqli_error($Conn));
        $DataStockOpename = mysqli_fetch_array($QryStockOpename);
        $tanggal= $DataStockOpename['tanggal'];
        $status= $DataStockOpename['status'];
?>
    <input type="hidden" name="id_stok_opename" id="id_stok_opename" value="<?php echo $id_stok_opename;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $tanggal;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status=="Selesai"){echo "selected";} ?> value="Selesai">Selesai</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditStockOpename">
            <span class="text-primary">Pastikan bahwa informasi barang yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>