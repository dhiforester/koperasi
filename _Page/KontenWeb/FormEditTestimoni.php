<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    if(empty($_POST['id_testimoni'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3 text-center text-danger">';
        echo '      ID Testimoni Tidak Bisa Ditangkap Oleh Sistem!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_testimoni=$_POST['id_testimoni'];
        $QryTestimoni = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_testimoni='$id_testimoni'")or die(mysqli_error($Conn));
        $DataTestimoni = mysqli_fetch_array($QryTestimoni);
        $tanggal= $DataTestimoni['tanggal'];
        $nama= $DataTestimoni['nama'];
        $email= $DataTestimoni['email'];
        $image= $DataTestimoni['image'];
        $testimoni= $DataTestimoni['testimoni'];
        $status= $DataTestimoni['status'];
        $strtotime=strtotime($tanggal);
        $tanggal=date('Y-m-d',$strtotime);
        $jam=date('H:i',$strtotime);
?>
    <input type="hidden" name="id_testimoni" id="id_testimoni" value="<?php echo "$id_testimoni";?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $tanggal; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="jam">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control" value="<?php echo $jam; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama">Nama User</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="testimoni">Testimoni</label>
            <textarea name="testimoni" id="testimoni" cols="30" rows="3" class="form-control"><?php echo $testimoni; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status=="Draft"){echo "selected";} ?> value="Draft">Draft</option>
                <option <?php if($status=="Publish"){echo "selected";} ?> value="Publish">Publish</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiEditTestimoni">
            <small class="credit text-primary">Pastikan Testimoni Yang Anda Input Sudah Benar</small>
        </div>
    </div>
<?php } ?>