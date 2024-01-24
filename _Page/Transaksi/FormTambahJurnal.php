<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    $tanggal=date('Y-m-d');
    if(empty($_POST['id_transaksi'])){
        $id_transaksi="";
        $id_mitra="";
    }else{
        $id_transaksi=$_POST['id_transaksi'];
    }
    
?>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">ID Transaksi</label>
        <input type="text" name="id_transaksi" id="id_transaksi" class="form-control" value="<?php echo $id_transaksi; ?>">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label>Akun Perkiraan</label>
        <select name="id_perkiraan" id="id_perkiraan" class="form-control" required>
            <?php
                echo '<option value="">Pilih</option>';
                $QryAkun= mysqli_query($Conn, "SELECT*FROM akun_perkiraan ORDER BY nama");
                while ($DataAkun=mysqli_fetch_array($QryAkun)) {
                    $id_perkiraan = $DataAkun['id_perkiraan'];
                    $kode= $DataAkun['kode'];
                    $nama_perkiraan = $DataAkun['nama'];
                    $level= $DataAkun['level'];
                    $saldo_normal= $DataAkun['saldo_normal'];
                    //Cek apakah di levelnya ada lagi?
                    $LevelTerbawah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level='$kode'"));
                    if($LevelTerbawah=="1"){
                        echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                    }
                }
            ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label>Nilai (Rp)</label>
        <input type="number" min="0" required class="form-control" name="nilai">
    </div>
    <div class="col-md-6 mb-3">
        <label>Debet/Kredit</label>
        <select name="d_k" id="d_k" class="form-control" required>
            <option value="">Pilih</option>
            <option value="Debet">Debet</option>
            <option value="Kredit">Kredit</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3" id="NotifikasiTambahJurnal">
        <small class="text-info">
            Isi data jurnal dengan benar. Periksa kembali kode transaksi dan parameter lainnya sebelum disimpan.
        </small>
    </div>
</div>