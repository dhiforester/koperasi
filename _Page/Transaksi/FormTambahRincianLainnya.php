<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //apabila ada id transaksi
    if(!empty($_POST['id_transaksi'])){
        $id_transaksi=$_POST['id_transaksi'];
    }else{
        $id_transaksi="";
    }
?>
<input type="hidden" name="id_transaksi" id="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
<div class="row mt-2"> 
    <div class="col-md-12 mb-3">
        <label for="nama_barang">Nama Rincian</label>
        <input type="text" name="nama_barang" class="form-control" value="">
    </div>
</div>
<div class="row mt-2"> 
    <div class="col-md-6 mb-3">
        <label for="qty">QTY</label>
        <input type="number" name="qty" id="qty_rincian2" class="form-control" value="1">
    </div>
    <div class="col-md-6 mb-3">
        <label for="satuan">Satuan</label>
        <input type="text" name="satuan" id="satuan" class="form-control" value="">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga_rincian2" class="form-control" value="">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="jumlah">Jumlah</label>
        <input type="text" name="jumlah" id="jumlah_rincian2" class="form-control" value="">
    </div>
</div>
<div class="row mb-2"> 
    <div class="col-md-12" id="NotifikasiTambahRincianLainnya">
        <span>Pastikan rincian yang anda input sudah sesuai</span>
    </div>
</div>