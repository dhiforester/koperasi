<?php
    //Membuka data auto jurnal Simpanan
    $QrySimpanan = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Simpanan'")or die(mysqli_error($Conn));
    $DataSimpanan = mysqli_fetch_array($QrySimpanan);
    if(!empty($DataSimpanan['id_auto_jurnal'])){
        $id_auto_jurnal1= $DataSimpanan['id_auto_jurnal'];
        $kategori_transaksi1= $DataSimpanan['kategori_transaksi'];
        $debet_id1= $DataSimpanan['debet_id'];
        $debet_name1= $DataSimpanan['debet_name'];
        $kredit_id1= $DataSimpanan['kredit_id'];
        $kredit_name1= $DataSimpanan['kredit_name'];
    }else{
        $id_auto_jurnal1="";
        $kategori_transaksi1="";
        $debet_id1="";
        $debet_name1="";
        $kredit_id1="";
        $kredit_name1="";
    }
    //Membuka data auto jurnal Penarikan
    $QryPenarikan= mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Penarikan'")or die(mysqli_error($Conn));
    $DataPenarikan = mysqli_fetch_array($QryPenarikan);
    if(!empty($DataPenarikan['id_auto_jurnal'])){
        $id_auto_jurnal2= $DataPenarikan['id_auto_jurnal'];
        $kategori_transaksi2= $DataPenarikan['kategori_transaksi'];
        $debet_id2= $DataPenarikan['debet_id'];
        $debet_name2= $DataPenarikan['debet_name'];
        $kredit_id2= $DataPenarikan['kredit_id'];
        $kredit_name2= $DataPenarikan['kredit_name'];
    }else{
        $id_auto_jurnal2="";
        $kategori_transaksi2="";
        $debet_id2="";
        $debet_name2="";
        $kredit_id2="";
        $kredit_name2="";
    }
    //Membuka data auto jurnal pinjaman
    $QryPinjaman= mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Pinjaman'")or die(mysqli_error($Conn));
    $DataPinjaman = mysqli_fetch_array($QryPinjaman);
    if(!empty($DataPinjaman['id_auto_jurnal'])){
        $id_auto_jurnal4= $DataPinjaman['id_auto_jurnal'];
        $kategori_transaksi4= $DataPinjaman['kategori_transaksi'];
        $debet_id4= $DataPinjaman['debet_id'];
        $debet_name4= $DataPinjaman['debet_name'];
        $kredit_id4= $DataPinjaman['kredit_id'];
        $kredit_name4= $DataPinjaman['kredit_name'];
    }else{
        $id_auto_jurnal4="";
        $kategori_transaksi4="";
        $debet_id4="";
        $debet_name4="";
        $kredit_id4="";
        $kredit_name4="";
    }
    //Membuka data auto jurnal angsuran
    $QryAngsuran= mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Angsuran'")or die(mysqli_error($Conn));
    $DataAngsuran = mysqli_fetch_array($QryAngsuran);
    if(!empty($DataAngsuran['id_auto_jurnal'])){
        $id_auto_jurnal5= $DataAngsuran['id_auto_jurnal'];
        $kategori_transaksi5= $DataAngsuran['kategori_transaksi'];
        $debet_id5= $DataAngsuran['debet_id'];
        $debet_name5= $DataAngsuran['debet_name'];
        $kredit_id5= $DataAngsuran['kredit_id'];
        $kredit_name5= $DataAngsuran['kredit_name'];
    }else{
        $id_auto_jurnal5="";
        $kategori_transaksi5="";
        $debet_id5="";
        $debet_name5="";
        $kredit_id5="";
        $kredit_name5="";
    }
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesAutoJurnal">
                <div class="card">
                    <div class="card-header">
                        <b>Auto Jurnal Simpan/Pinjam</b>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="debet_id_simpanan">Akun Debet Simpanan</label>
                                <select name="debet_id_simpanan" id="debet_id_simpanan" class="form-control">
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
                                                if($debet_id1==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kredit_id_simpanan">Akun Kredit Simpanan</label>
                                <select name="kredit_id_simpanan" id="kredit_id_simpanan" class="form-control">
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
                                                if($kredit_id1==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="debet_id_penarikan">Akun Debet Penarikan</label>
                                <select name="debet_id_penarikan" id="debet_id_penarikan" class="form-control">
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
                                                if($debet_id2==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kredit_id_penarikan">Akun Kredit Penarikan</label>
                                <select name="kredit_id_penarikan" id="kredit_id_penarikan" class="form-control">
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
                                                if($kredit_id2==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="debet_id_pinjaman">Akun Debet Pijaman</label>
                                <select name="debet_id_pinjaman" id="debet_id_pinjaman" class="form-control">
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
                                                if($debet_id4==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kredit_id_pinjaman">Akun Kredit Pijaman</label>
                                <select name="kredit_id_pinjaman" id="kredit_id_pinjaman" class="form-control">
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
                                                if($kredit_id4==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="debet_id_angsuran">Akun Debet Angsuran</label>
                                <select name="debet_id_angsuran" id="debet_id_angsuran" class="form-control">
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
                                                if($debet_id5==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="kredit_id_angsuran">Akun Kredit Angsuran</label>
                                <select name="kredit_id_angsuran" id="kredit_id_angsuran" class="form-control">
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
                                                if($kredit_id5==$id_perkiraan){
                                                    echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }else{
                                                    echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 text-right" id="NotifikasiSimpanAutoJurnal">
                                <small class="text-primary">Pastikan Setting Auto Jurnal Sudah Benar.</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-md btn-warning">
                            <i class="bi bi-arrow-left-circle"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>