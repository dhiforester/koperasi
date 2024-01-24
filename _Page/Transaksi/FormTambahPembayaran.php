<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('Asia/Jakarta');
    //Menangkap id_transaksi
    if(empty($_POST['id_transaksi'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12">';
        echo '      ID Transaksi Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_transaksi= $DataTransaksi['id_transaksi'];
        $id_akses= $DataTransaksi['id_akses'];
        $id_anggota= $DataTransaksi['id_anggota'];
        $id_supplier= $DataTransaksi['id_supplier'];
        $tanggal=date('Y-m-d H:i');
        $kategori= $DataTransaksi['kategori'];
        $tagihan= $DataTransaksi['tagihan'];
        $pembayaran= $DataTransaksi['pembayaran'];
        $kembalian= $DataTransaksi['kembalian'];
        $metode= $DataTransaksi['metode'];
        $keterangan= $DataTransaksi['keterangan'];
        $status= $DataTransaksi['status'];
        $pembayaran = "" . number_format($pembayaran,0,',','.');
        $tagihan = "" . number_format($tagihan,0,',','.');
        $kembalian = "" . number_format($kembalian,0,',','.');
        $strtotime=strtotime($tanggal);
        $tanggal=date('Y-m-d',$strtotime);
        $jam=date('H:i',$strtotime);
?>
    <input type="hidden" name="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
    <input type="hidden" name="id_anggota" value="<?php echo "$id_anggota"; ?>">
    <input type="hidden" name="id_supplier" value="<?php echo "$id_supplier"; ?>">
    <input type="hidden" name="kategori" value="<?php echo "$kategori"; ?>">
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control"  value="<?php echo "$tanggal"; ?>">
        </div>
        <div class="col-md-6 mb-2">
            <label for="jam">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control"  value="<?php echo "$jam"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="metode">Metode Pembayaran</label>
            <select name="metode" id="metode" class="form-control">
                <option value="">Pilih</option>
                <option value="Cash">Cash</option>
                <option value="Transfer">Transfer</option>
                <option value="Online">Online</option>
            </select>
        </div>
        <div class="col-md-6 mb-2">
            <label for="jumlah">Jumlah (Rp)</label>
            <input type="text" name="jumlah" id="jumlah" class="form-control format_uang" value="<?php echo $tagihan;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiTambahPembayaran">
            <span class="text-primary">Pastikan Data Pembayaran Sudah Benar</span>
        </div>
    </div>
<?php } ?>