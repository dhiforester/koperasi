<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_kelas
    if(empty($_POST['id_perkiraan'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3 text-danger text-center">';
        echo '          Mohon Maaf!! ID Akun Perkiraan Tidak Dapat didefinisikan.<br>';
        echo '          Hubungi admin aplikasi untuk permasalahn berikut ini.<br>';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_perkiraan=$_POST['id_perkiraan'];
        //Buka Data Akun Perkiraan
        $Qry = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        $kode = $Data['kode'];
        $rank = $Data['rank'];
        $nama = $Data['nama'];
        $level = $Data['level'];
        $saldo_normal = $Data['saldo_normal'];
        $status = $Data['status'];
?>
    <input type="hidden" name="id_perkiraan" value="<?php echo "$id_perkiraan"; ?>">
    <div class="row">
        <div class="col-md-12 mb-3 form-group form-primary">
            <label class="float-label">ID Akun</label>
            <input type="text" readonly name="ID" id="ID" class="form-control" value="<?php echo "$id_perkiraan";?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3 form-group form-primary">
            <label class="float-label">Kode Akun</label>
            <input type="text" readonly name="kode" id="kode" class="form-control" value="<?php echo "$kode";?>" required>
        </div>
        <div class="col-md-6 mb-3 form-group form-primary">
            <label class="float-label">Level</label>
            <input type="text" readonly name="level_perkiraan" id="level_perkiraan" class="form-control" value="<?php echo "$level";?>" required>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12 mb-3 form-group form-primary">
            <label class="float-label">Nama Akun</label>
            <input type="text" name="nama_perkiraan1" id="nama_perkiraan1" class="form-control" value="<?php echo "$nama";?>" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3 form-group form-primary">
            <label class="float-label">Saldo Normal</label>
            <?php
                if($level=="1"){
                    if($saldo_normal=="Debet"){
                        echo '<select required name="saldo_normal" class="form-control">';
                        echo '  <option selected value="Debet">Debet</option>';
                        echo '  <option value="Kredit">Kredit</option>';
                        echo '</select>';
                    }else{
                        echo '<select required name="saldo_normal" class="form-control">';
                        echo '  <option value="Debet">Debet</option>';
                        echo '  <option selected value="Kredit">Kredit</option>';
                        echo '</select>';
                    }
                }else{
                    echo '<input type="text" readonly required name="saldo_normal" class="form-control" value="'.$saldo_normal.'">';
                }
            ?>
        </div>
        <div class="col-md-6 mb-3 form-group form-primary">
            <label class="float-label">Status Akun</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status=="Closed"){echo "selected";} ?> value="Closed">Closed</option>
                <option <?php if($status=="Open"){echo "selected";} ?> value="Open">Open</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div id="NotifikasiEditAkunPerkiraan">
                <small class="text-primary">Pastikan data perubahan yang anda isi sesuai.</small>
            </div>
        </div>
    </div>
<?php } ?>