<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_transaksi_rincian
    if(empty($_POST['id_transaksi_rincian'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger mb-3">';
        echo '          ID Rincian Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_transaksi_rincian=$_POST['id_transaksi_rincian'];
        //Buka data rincian
        $QryRincian = mysqli_query($Conn,"SELECT * FROM transaksi_rincian WHERE id_transaksi_rincian='$id_transaksi_rincian'")or die(mysqli_error($Conn));
        $DataRincian = mysqli_fetch_array($QryRincian);
        $nama_barang= $DataRincian['nama_barang'];
        $qty= $DataRincian['qty'];
        $HargaRincian= $DataRincian['harga'];
        $JumlahRincian= $DataRincian['jumlah'];
        //Pada saat mode edit transaksi
        if(empty($_POST['GetIdTransaksi'])){
            $GetIdTransaksi=0;
        }else{
            $GetIdTransaksi=$_POST['GetIdTransaksi'];
        }
?>
    <input type="hidden" name="id_transaksi_rincian" id="id_transaksi_rincian" value="<?php echo "$id_transaksi_rincian"; ?>">
    <input type="hidden" name="GetIdTransaksi" id="GetIdTransaksi" value="<?php echo "$GetIdTransaksi"; ?>">
    <div class="row mt-2"> 
        <div class="col-md-12 mb-3">
            <label for="nama_barang">Nama Tindakan</label>
            <input type="text" readonly name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $nama_barang;?>">
        </div>
    </div>
    <div class="row mt-2"> 
        <div class="col-md-6 mb-3">
            <label for="qty">QTY</label>
            <input type="number" name="qty" id="qty_rincian4" class="form-control" value="<?php echo $qty;?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga_rincian4" class="form-control" value="<?php echo $HargaRincian;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="text" readonly name="jumlah" id="jumlah_rincian4" class="form-control" value="<?php echo "$JumlahRincian";?>">
        </div>
    </div>
    <div class="row mb-2"> 
        <div class="col-md-12" id="NotifikasiEditRincianLainnya">
            <span>Pastikan rincian yang anda input sudah sesuai</span>
        </div>
    </div>
<?php } ?>