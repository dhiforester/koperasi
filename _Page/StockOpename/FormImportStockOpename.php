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
        <div class="col-md-3 mb-3">
            <a href="_Page/StockOpename/Tamplate.php" target="_blank" class="btn btn-md btn-info btn-block" title="Download File Tamplate">
                <i class="bi bi-download"></i> Tamplate
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <input type="file" name="file" id="file" class="form-control">
            <small for="file">Upload File Excel</small>
        </div>
        <div class="col-md-3 mb-3">
            <button type="submit" class="btn btn-md btn-primary btn-block">
                <i class="bi bi-upload"></i> Import
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="height: 350px; overflow-y: scroll;">
            <div class="table table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center"><b>No</b></th>
                            <th class="text-center"><b>Barang</b></th>
                            <th class="text-center"><b>Stok</b></th>
                            <th class="text-center"><b>Selisih</b></th>
                            <th class="text-center"><b>Jumlah</b></th>
                            <th class="text-center"><b>Status</b></th>
                        </tr>
                    </thead>
                    <tbody id="NotifikasiImportStockOpename">
                        <tr>
                            <td colspan="6" class="text-center text-danger">
                                Belum Ada Proses Import
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>