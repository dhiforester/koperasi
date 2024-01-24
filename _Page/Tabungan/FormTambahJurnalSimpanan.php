<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    if(empty($_POST['id_simpanan'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12 text-danger text-center">';
        echo '      ID Simpanan Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_simpanan=$_POST['id_simpanan'];
        //Buka data simpanan
        $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
        $DataSimpanan = mysqli_fetch_array($QrySimpanan);
        $jumlah= $DataSimpanan['jumlah'];
        $tanggal= $DataSimpanan['tanggal'];
?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">ID Pinjaman</label>
            <input type="text" readonly name="id_simpanan" id="id_simpanan" class="form-control" value="<?php echo $id_simpanan; ?>">
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
            <input type="text" required class="form-control format_uang" name="nilai" value="<?php echo "$jumlah"; ?>">
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
        <div class="col-md-12 mb-3" id="NotifikasiTambahJurnalSimpanan">
            <small class="text-info">
                Isi data jurnal dengan benar. Periksa kembali kode transaksi dan parameter lainnya sebelum disimpan.
            </small>
        </div>
    </div>
<?php } ?>