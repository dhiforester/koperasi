<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $CekSettingPembelian = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM setting_autojurnal WHERE id_akses='$SessionIdAkses'"));
    //Buka data auto jurnal
    $QryAutoJurnal = mysqli_query($Conn,"SELECT * FROM setting_autojurnal WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
    $DataAutoJurnal = mysqli_fetch_array($QryAutoJurnal);
    if(empty($DataAutoJurnal['id_setting_autojurnal'])){
        $id_setting_autojurnal ="";
        $trans_account1 ="";
        $cash_account1 ="";
        $debt_account1 ="";
        $receivables_account1 ="";
        $trans_account2 ="";
        $cash_account2 = "";
        $debt_account2 ="";
        $receivables_account2 ="";
    }else{
        $id_setting_autojurnal = $DataAutoJurnal['id_setting_autojurnal'];
        $trans_account1 = $DataAutoJurnal['trans_account1'];
        $cash_account1 = $DataAutoJurnal['cash_account1'];
        $debt_account1 = $DataAutoJurnal['debt_account1'];
        $receivables_account1 = $DataAutoJurnal['receivables_account1'];
        $trans_account2 = $DataAutoJurnal['trans_account2'];
        $cash_account2 = $DataAutoJurnal['cash_account2'];
        $debt_account2 = $DataAutoJurnal['debt_account2'];
        $receivables_account2 = $DataAutoJurnal['receivables_account2'];
    }
?>

<div class="row">
    <div class="col-md-12">
        <b class="card-title">
            Transaksi Pembelian
        </b>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="trans_account1">Akun Transaksi</label>
        <select name="trans_account1" id="trans_account1" class="form-control">
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
                        if($trans_account1==$id_perkiraan){
                            echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }else{
                            echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }
                    }
                }
            ?>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="cash_account1">Akun Kas</label>
        <select name="cash_account1" id="cash_account1" class="form-control">
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
                        if($cash_account1==$id_perkiraan){
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
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="debt_account1">Akun Utang</label>
        <select name="debt_account1" id="debt_account1" class="form-control">
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
                        if($debt_account1==$id_perkiraan){
                            echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }else{
                            echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }
                    }
                }
            ?>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="receivables_account1">Akun Piutang</label>
        <select name="receivables_account1" id="receivables_account1" class="form-control">
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
                        if($receivables_account1==$id_perkiraan){
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
<div class="row">
    <div class="col-md-12">
        <b class="card-title">
            Transaksi Penjualan
        </b>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="trans_account2">Akun Transaksi</label>
        <select name="trans_account2" id="trans_account2" class="form-control">
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
                        if($trans_account2==$id_perkiraan){
                            echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }else{
                            echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }
                    }
                }
            ?>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="cash_account2">Akun Kas</label>
        <select name="cash_account2" id="cash_account2" class="form-control">
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
                        if($cash_account2==$id_perkiraan){
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
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="debt_account2">Akun Utang</label>
        <select name="debt_account2" id="debt_account2" class="form-control">
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
                        if($debt_account2==$id_perkiraan){
                            echo '<option selected value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }else{
                            echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                        }
                    }
                }
            ?>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="receivables_account2">Akun Piutang</label>
        <select name="receivables_account2" id="receivables_account2" class="form-control">
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
                        if($receivables_account2==$id_perkiraan){
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
<div class="row">
    <div class="col-md-12 mb-3">
        <?php if(!empty($CekSettingPembelian)){ ?>
            <button type="button" class="btn btn-md btn-block btn-outline-danger" data-bs-toggle="modal" data-bs-target="#ModalResetSettingAutoJurnal">
                Reset/Hapus Pengaturan
            </button>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3" id="NotifikasiSettingAutoJurnal">
        <small class="text-primary">
            Pastikan Pengaturan Akun Jurnal Sudah Sesuai
        </small>
    </div>
</div>
