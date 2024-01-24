<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap GetIdSupplier
    if(empty($_POST['GetIdSupplier'])){
        echo ' <div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Supplier Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
        echo ' </div>';
        echo ' <div class="modal-footer">';
        echo '  <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '      <i class="bi bi-x-circle"></i> Tutup';
        echo '  </button>';
        echo ' </div>';
    }else{
        $GetIdSupplier=$_POST['GetIdSupplier'];
        //keyword
        if(!empty($_POST['keyword'])){
            $keyword=$_POST['keyword'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['batas'])){
            $batas=$_POST['batas'];
        }else{
            $batas="0";
        }
        //ShortBy
        if(!empty($_POST['ShortBy'])){
            $ShortBy=$_POST['ShortBy'];
        }else{
            $ShortBy="DESC";
        }
        //OrderBy
        if(!empty($_POST['OrderBy'])){
            $OrderBy=$_POST['OrderBy'];
            $keyword_by=$_POST['OrderBy'];
        }else{
            $OrderBy="id_transaksi";
            $keyword_by="";
        }
?>
<form action="_Page/Supplier/ProsesExportRiwayatTransaksi.php" method="POST" target="_blank">
    <div class="modal-body">
        <input type="hidden" name="GetIdSupplier2" id="GetIdSupplier2" value="<?php echo $GetIdSupplier;?>">
        <div class="row">
            <div class="col-md-6 mt-3">
                <select name="batas" class="form-control">
                    <option <?php if($batas==""){echo "selected";} ?> value="">All</option>
                    <option <?php if($batas=="5"){echo "selected";} ?> value="5">5</option>
                    <option <?php if($batas=="10"){echo "selected";} ?> value="10">10</option>
                    <option <?php if($batas=="25"){echo "selected";} ?> value="25">25</option>
                    <option <?php if($batas=="50"){echo "selected";} ?> value="50">50</option>
                    <option <?php if($batas=="100"){echo "selected";} ?> value="100">100</option>
                    <option <?php if($batas=="250"){echo "selected";} ?> value="250">250</option>
                    <option <?php if($batas=="500"){echo "selected";} ?> value="500">500</option>
                </select>
                <small>Data</small>
            </div>
            <div class="col-md-6 mt-3">
                <select name="OrderBy3" class="form-control">
                    <option value="">Pilih</option>
                    <option <?php if($OrderBy=="kategori"){echo "selected";} ?>  value="kategori">Kategori</option>
                    <option <?php if($OrderBy=="tanggal"){echo "selected";} ?> value="tanggal">Tanggal</option>
                    <option <?php if($OrderBy=="metode"){echo "selected";} ?> value="metode">Metode</option>
                    <option <?php if($OrderBy=="status"){echo "selected";} ?> value="status">Status</option>
                    <option <?php if($OrderBy=="tagihan"){echo "selected";} ?> value="tagihan">Tagihan</option>
                </select>
                <small>Pencarian</small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <select name="ShortBy3" class="form-control">
                    <option value="">Pilih</option>
                    <option <?php if($ShortBy=="ASC"){echo "selected";} ?>  value="ASC">A to Z</option>
                    <option <?php if($ShortBy=="DESC"){echo "selected";} ?> value="DESC">Z to A</option>
                </select>
                <small>Ururtan</small>
            </div>
            <div class="col-md-6 mt-3">
                <input type="text" name="keyword3" class="form-control" value="<?php echo "$keyword"; ?>">
                <small>Kata Kunci</small>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-success">
        <button type="submit" class="btn btn-primary btn-rounded">
            <i class="bi bi-download"></i> Download
        </button>
        <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Tidak
        </button> 
    </div>
</form>   
<?php } ?>