<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_supplier'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Supplier Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_supplier=$_POST['id_supplier'];
        //Buka data supplier
        $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
        $DataSupplier = mysqli_fetch_array($QrySupplier);
        $id_supplier= $DataSupplier['id_supplier'];
        $nama_supplier= $DataSupplier['nama_supplier'];
        $alamat_supplier= $DataSupplier['alamat_supplier'];
        $email_supplier= $DataSupplier['email_supplier'];
        $kontak_supplier= $DataSupplier['kontak_supplier'];
?>
    <input type="hidden" name="id_supplier" id="id_supplier" value="<?php echo $id_supplier;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" value="<?php echo $nama_supplier;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email_supplier">Email</label>
            <input type="email" name="email_supplier" id="email_supplier" class="form-control" value="<?php echo $email_supplier;?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="kontak_supplier">Kontak</label>
            <input type="text" name="kontak_supplier" id="kontak_supplier" class="form-control" value="<?php echo $kontak_supplier;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="alamat_supplier">Alamat</label>
            <input type="text" name="alamat_supplier" id="alamat_supplier" class="form-control" value="<?php echo $alamat_supplier;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditSupplier">
            <span class="text-primary">Pastikan bahwa informasi supplier yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>