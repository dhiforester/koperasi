<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_jurnal
    if(empty($_POST['id_jurnal'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Jurnal Tidak Bisa Ditangkap Oleh Siste.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_jurnal=$_POST['id_jurnal'];
        //Buka data jurnal
        $QryJurnal = mysqli_query($Conn,"SELECT * FROM jurnal WHERE id_jurnal='$id_jurnal'")or die(mysqli_error($Conn));
        $DataJurnal = mysqli_fetch_array($QryJurnal);
        $id_jurnal = $DataJurnal['id_jurnal'];
        $id_shu_session = $DataJurnal['id_shu_session'];
        $id_perkiraan = $DataJurnal['id_perkiraan'];
        $tanggal = $DataJurnal['tanggal'];
        $kode_perkiraan = $DataJurnal['kode_perkiraan'];
        $nama_perkiraan = $DataJurnal['nama_perkiraan'];
        $d_k = $DataJurnal['d_k'];
        $nilai = $DataJurnal['nilai'];
        //Format rupiah
        $NominalRp = "" . number_format($nilai,0,',','.');
?>
    <input type="hidden" name="id_jurnal" id="id_jurnal" value="<?php echo "$id_jurnal"; ?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">ID Bagi Hasil</label>
            <input type="text" name="id_shu_session" id="id_shu_session" class="form-control" value="<?php echo $id_shu_session; ?>">
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
                        $id_perkiraan_list = $DataAkun['id_perkiraan'];
                        $kode= $DataAkun['kode'];
                        $nama_perkiraan_list = $DataAkun['nama'];
                        $level= $DataAkun['level'];
                        $saldo_normal_list= $DataAkun['saldo_normal'];
                        //Cek apakah di levelnya ada lagi?
                        $LevelTerbawah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level='$kode'"));
                        if($LevelTerbawah=="1"){
                            if($id_perkiraan_list==$id_perkiraan){
                                echo '<option selected value="'.$id_perkiraan_list.'">'.$nama_perkiraan_list.' ('.$saldo_normal_list.')</option>';
                            }else{
                                echo '<option value="'.$id_perkiraan_list.'">'.$nama_perkiraan_list.' ('.$saldo_normal_list.')</option>';
                            }
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nilai (Rp)</label>
            <input type="text" class="form-control format_uang" name="nilai" value="<?php echo "$NominalRp";?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Debet/Kredit</label>
            <select name="d_k" id="d_k" class="form-control" required>
                <option <?php if($d_k==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($d_k=="Debet"){echo "selected";} ?> value="Debet">Debet</option>
                <option <?php if($d_k=="Kredit"){echo "selected";} ?> value="Kredit">Kredit</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiEditJurnal">
            <span class="text-info">
                Pastikan perubahan data jurnal sudah sesuai.
            </span>
        </div>
    </div>
<?php } ?>