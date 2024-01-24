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
?>
    <input type="hidden" name="id_stok_opename" id="id_stok_opename" value="<?php echo $id_stok_opename;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="format">Format Data</label>
            <select name="format" id="format" class="form-control">
                <option value="HTML">HTML</option>
                <option value="Excel">Excel</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <span class="text-primary">Lanjutkan Proses Ini Untuk Melakukan Export Stock Opename</span>
        </div>
    </div>
<?php } ?>