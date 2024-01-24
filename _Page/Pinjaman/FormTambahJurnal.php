<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    $tanggal=date('Y-m-d');
    if(empty($_POST['id_pinjaman'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12 text-danger text-center">';
        echo '      ID Pinjaman Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pinjaman=$_POST['id_pinjaman'];
?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">ID Pinjaman</label>
            <input type="text" readonly name="id_pinjaman" id="id_pinjaman" class="form-control" value="<?php echo $id_pinjaman; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label>Angsuran Pinjaman</label>
            <select name="id_pinjaman_angsuran" id="id_pinjaman_angsuran" class="form-control">
                <?php
                    echo '<option value="">Pilih</option>';
                    $QryAngsuran= mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman'");
                    while ($DataAngsuran=mysqli_fetch_array($QryAngsuran)) {
                        $id_pinjaman_angsuran = $DataAngsuran['id_pinjaman_angsuran'];
                        $tanggal = $DataAngsuran['tanggal'];
                        $kategori_angsuran = $DataAngsuran['kategori_angsuran'];
                        $jumlah = $DataAngsuran['jumlah'];
                        echo '<option value="'.$id_pinjaman_angsuran.'">'.$tanggal.' ('.$kategori_angsuran.')</option>';
                    }
                ?>
            </select>
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
            <input type="text" required class="form-control format_uang" name="nilai">
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
<?php } ?>