<?php
    //Koneksi
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi_pencairan'])){
        echo '<span class="text-danger">ID Dokter Tidaa Boleh Kosong!</span>';
    }else{
        $id_transaksi_pencairan=$_POST['id_transaksi_pencairan'];
        //Buka data Pencairan
        $QryPencairan = mysqli_query($Conn,"SELECT * FROM transaksi_pencairan WHERE id_transaksi_pencairan='$id_transaksi_pencairan'")or die(mysqli_error($Conn));
        $DataPencairan = mysqli_fetch_array($QryPencairan);
        $id_mitra= $DataPencairan['id_mitra'];
        $id_dokter= $DataPencairan['id_dokter'];
        $nama_mitra= $DataPencairan['nama_mitra'];
        $nama_dokter= $DataPencairan['nama_dokter'];
        $tanggal= $DataPencairan['tanggal'];
        $metode_pembayaran= $DataPencairan['metode_pembayaran'];
        $jumlah= $DataPencairan['jumlah'];
        $status= $DataPencairan['status'];
        $keterangan= $DataPencairan['keterangan'];
?>
    <input type="hidden" name="id_transaksi_pencairan" id="id_transaksi_pencairan" value="<?php echo "$id_transaksi_pencairan"; ?>">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" readonly name="nama_dokter" id="nama_dokter" class="form-control" value="<?php echo "$nama_dokter"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
        </div>
        <div class="col-md-6 mt-3">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?php echo "$jumlah"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                <option <?php if($metode_pembayaran==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($metode_pembayaran=="Cash"){echo "selected";} ?> value="Cash">Cash</option>
                <option <?php if($metode_pembayaran=="Transfer"){echo "selected";} ?> value="Transfer">Transfer</option>
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status=="Valid"){echo "selected";} ?> value="Valid">Valid</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"><?php echo $keterangan;?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditPencairan">
            <small class="text-primary">Pastikan Data Pencairan Sudah Sesuai</small>
        </div>
    </div>
<?php } ?>