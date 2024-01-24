<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_anggota'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_anggota=$_POST['id_anggota'];
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $tanggal_masuk= $DataAnggota['tanggal_masuk'];
        $nama= $DataAnggota['nama'];
        if(!empty($DataAnggota['image'])){
            $image= $DataAnggota['image'];
        }else{
            $image="";
        }
        if(!empty($DataAnggota['email'])){
            $email= $DataAnggota['email'];
        }else{
            $email='';
        }
        if(!empty($DataAnggota['kontak'])){
            $kontak= $DataAnggota['kontak'];
        }else{
            $kontak='';
        }
        if(!empty($DataAnggota['nip'])){
            $nip= $DataAnggota['nip'];
        }else{
            $nip='';
        }
        $status= $DataAnggota['status'];
?>
    <input type="hidden" name="id_anggota" value="<?php echo "$id_anggota"; ?>">
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="nip">NIP*</label>
            <input type="text" name="nip" id="nip" class="form-control" value="<?php echo "$nip"; ?>">
        </div>
        <div class="col-md-6 mb-2">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="<?php echo "$tanggal_masuk"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo "$nama"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="email">Email*</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="youemail@domain.com" value="<?php echo "$email"; ?>">
        </div>
        <div class="col-md-6 mb-2">
            <label for="kontak">Kontak*</label>
            <input type="text" name="kontak" id="kontak" class="form-control" placeholder="62" value="<?php echo "$kontak"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="image">Foto*</label>
            <input type="file" name="image" id="image" class="form-control">
            <small>Maksimal 20 Mb (PNG, JPG, JPEG, GIF)</small>
        </div>
        <div class="col-md-6 mb-2">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilih..</option>
                <option <?php if($status=="Active"){echo "selected";} ?> value="Active">Active</option>
                <option <?php if($status=="Non-Active"){echo "selected";} ?> value="Non-Active">Non-Active</option>
                <option <?php if($status=="Resign"){echo "selected";} ?> value="Resign">Resign</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2" id="NotifikasiEditAnggota">
            <small class="text-primary">Pastkan data yang anda input sudah benar</small>
        </div>
    </div>
<?php } ?>