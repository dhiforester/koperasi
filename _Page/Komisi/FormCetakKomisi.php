<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_dokter'])){
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Dokter Tidak Boleh Kosong!</small>';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_dokter=$_POST['id_dokter'];
        //Buka data dokter
        $QryDokter = mysqli_query($Conn,"SELECT * FROM dokter WHERE id_dokter='$id_dokter'")or die(mysqli_error($Conn));
        $DataDokter = mysqli_fetch_array($QryDokter);
        $nama_dokter= $DataDokter['nama_dokter'];
?>
    <input type="hidden" name="id_dokter" id="id_dokter" value="<?php echo  $id_dokter; ?>">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nama_dokter">Nama Personnel</label>
            <input type="text" readonly name="nama_dokter" id="nama_dokter" class="form-control" value="<?php echo  $nama_dokter; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="periode">Periode</label>
            <select name="periode" id="periode" class="form-control" required>
                <option value="Periode">Periode</option>
                <option value="Harian">Harian</option>
                <option value="Bulanan">Bulanan</option>
                <option value="Tahunan">Tahunan</option>
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <label for="FormatCetak">Format Cetak</label>
            <select name="FormatCetak" id="FormatCetak" class="form-control" required>
                <option value="">Pilih</option>
                <option value="HTML">HTML</option>
                <option value="Excel">Excel</option>
                <option value="PDF">PDF</option>
            </select>
        </div>
    </div>
    <div class="row" id="FormTanggalCetak">
        <div class="col-md-6 mt-3">
            <label for="periode1">Periode Awal</label>
            <input type="date" name="periode1" id="periode1" class="form-control">
        </div>
        <div class="col-md-6 mt-3">
            <label for="periode2">Periode Akhir</label>
            <input type="date" name="periode2" id="periode2" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                <option value="">Semua</option>
                <option value="Transfer">Transfer</option>
                <option value="Cash">Cash</option>
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Semua</option>
                <option value="Valid">Valid</option>
                <option value="Pending">Pending</option>
            </select>
        </div>
    </div>
<?php } ?>