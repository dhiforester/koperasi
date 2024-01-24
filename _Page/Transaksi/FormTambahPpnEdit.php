<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Menangkap id_transaksi
    if(!empty($_POST['id_transaksi'])){
        $id_transaksi=$_POST['id_transaksi'];
    }else{
        $id_transaksi=0;
    }
    //menghitung jumlah tagihan
    $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'"));
    $jumlah_transaksi = $Sum['jumlah'];
    //Buka Transaksi_ppn
    $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
    $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
    if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
        //Buka Setting Transaksi
        $QrySettingTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi_setting WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
        $DataSettingTransaksi = mysqli_fetch_array($QrySettingTransaksi);
        if(!empty($DataSettingTransaksi['id_transaksi_setting'])){
            $ppn =$DataSettingTransaksi['ppn'];
            $ppn_set_persen =$DataSettingTransaksi['ppn_set_persen'];
        }else{
            $ppn="No";
            $ppn_set_persen=0;
        }
        if(!empty($ppn_set_persen)){
            $ppn_rp=($ppn_set_persen/100)*$jumlah_transaksi;
        }else{
            $ppn_rp=0;
        }
    }else{
        $QrySettingTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi_setting WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
        $DataSettingTransaksi = mysqli_fetch_array($QrySettingTransaksi);
        if(!empty($DataSettingTransaksi['id_transaksi_setting'])){
            $ppn =$DataSettingTransaksi['ppn'];
        }else{
            $ppn="No";
        }
        $ppn_set_persen =$dataTransaksiPpn['ppn_persen'];
        $ppn_rp =$dataTransaksiPpn['ppn_rp'];
    }
?>
<input type="hidden" name="id_transaksi" value="<?php echo "$id_transaksi"; ?>">
<input type="hidden" name="id_akses" value="<?php echo "$SessionIdAkses"; ?>">
<div class="row">
    <div class="col-md-12 mb-2">
        <label for="subtotal">Subtotal</label>
        <input type="number" readonly name="subtotal" id="GetSubtotalEdit" class="form-control format_uang"  value="<?php echo "$jumlah_transaksi"; ?>">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-2">
        <label for="ppn_persen"> (%) PPN</label>
        <input type="text" name="ppn_persen" id="GetPpnPersenEdit" class="form-control format_uang" value="<?php echo $ppn_set_persen;?>">
    </div>
    <div class="col-md-6 mb-2">
        <label for="ppn_rp"> (Rp) PPN</label>
        <input type="text" name="ppn_rp" id="GetPpnRpEdit" class="form-control format_uang" value="<?php echo $ppn_rp;?>">
    </div>
</div>
<div class="row">
    <div class="col-md-12" id="NotifikasiTambahPpnEdit">
        <span class="text-primary">Pastikan Pengaturan PPN Sudah Benar</span>
    </div>
</div>