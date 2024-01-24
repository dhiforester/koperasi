<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang_bacth'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Supplier Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_barang_bacth=$_POST['id_barang_bacth'];
        //Buka data supplier
        $QryBatch= mysqli_query($Conn,"SELECT * FROM barang_bacth WHERE id_barang_bacth='$id_barang_bacth'")or die(mysqli_error($Conn));
        $DataBatch= mysqli_fetch_array($QryBatch);
        $id_barang_bacth= $DataBatch['id_barang_bacth'];
        $id_barang= $DataBatch['id_barang'];
        $id_barang_satuan= $DataBatch['id_barang_satuan'];
        $no_batch= $DataBatch['no_batch'];
        $expired_date= $DataBatch['expired_date'];
        $qty_batch= $DataBatch['qty_batch'];
        $reminder_date= $DataBatch['reminder_date'];
        $StatusExpired= $DataBatch['status'];
        //Buka data barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $satuan_barang= $DataBarang['satuan_barang'];
?>
    <input type="hidden" name="id_barang_bacth" id="id_barang_bacth" value="<?php echo $id_barang_bacth;?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="id_barang_satuan">Satuan</label>
            <select name="id_barang_satuan" id="id_barang_satuan" class="form-control">
                <option value="0"><?php echo "$satuan_barang"; ?></option>
                <?php
                    if(empty($id_barang_satuan)){
                        echo '<option selected value="0">'.$satuan_barang.'</option>';
                    }
                    $QrySatuanMulti = mysqli_query($Conn, "SELECT * FROM barang_satuan WHERE id_barang='$id_barang' ORDER BY satuan_multi ASC");
                    while ($DataSatuanMulti = mysqli_fetch_array($QrySatuanMulti)) {
                        $id_barang_satuan_list= $DataSatuanMulti['id_barang_satuan'];
                        $satuan_multi_list= $DataSatuanMulti['satuan_multi'];
                        if($id_barang_satuan_list==$id_barang_satuan){
                            echo '<option selected value="'.$id_barang_satuan_list.'">'.$satuan_multi_list.'</option>';
                        }else{
                            echo '<option value="'.$id_barang_satuan_list.'">'.$satuan_multi_list.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="no_batch">No/Kode Batch</label>
            <input type="text" name="no_batch" id="no_batch" class="form-control" value="<?php echo $no_batch;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="expired_date">Tanggal Expired</label>
            <input type="date" name="expired_date" id="expired_date" class="form-control" value="<?php echo $expired_date;?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="reminder_date">Tanggal Pemberitahuan</label>
            <input type="date" name="reminder_date" id="reminder_date" class="form-control" value="<?php echo $reminder_date;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="qty_batch">Jumlah</label>
            <input type="number" name="qty_batch" id="qty_batch" class="form-control" value="<?php echo $qty_batch;?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($StatusExpired==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($StatusExpired=="Terdaftar"){echo "selected";} ?> value="Terdaftar">Terdaftar</option>
                <option <?php if($StatusExpired=="Terjual"){echo "selected";} ?> value="Terjual">Terjual</option>
                <option <?php if($StatusExpired=="None"){echo "selected";} ?> value="None">None</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditExpiredDate">
            <span class="text-primary">Pastikan bahwa informasi data yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>