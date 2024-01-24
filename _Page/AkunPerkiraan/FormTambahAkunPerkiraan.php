<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_kelas
    if(empty($_POST['id_perkiraan'])){
        $id_perkiraan="";
        $keterangan='';
        $rank ="";
        $nama ="";
        $name ="";
        $level ="1";
        $saldo_normal ="";
        $status ="";
        $KolomAkunLevel="kd$level";
        $QryAkun=mysqli_query($Conn, "SELECT MAX(kode) as kode FROM akun_perkiraan WHERE level='1'")or die(mysqli_error($conn));
        while($HasilKode=mysqli_fetch_array($QryAkun)){
            $KodeUtamaMax=$HasilKode['kode'];
        }
        $KodePlus=$KodeUtamaMax+1;
        $kode=$KodePlus;
        $rank="1";
        $LevelBaru="1";
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
        //Keterangan
        $keterangan="Anda akan menambahkan data sub akun untuk akun perkiraan $nama, sehingga secara standar kode dan level akun tidak bisa di rubah";
        //Menciptakan kode baru
        $KolomAkunLevelLama="kd$level";
        $LevelBaru=$level+1;
        $QryAkun=mysqli_query($Conn, "SELECT MAX(rank) as rank FROM akun_perkiraan WHERE $KolomAkunLevelLama='$kode' AND level='$LevelBaru'")or die(mysqli_error($Conn));
        while($HasilKode=mysqli_fetch_array($QryAkun)){
            $KodeUtamaMax=$HasilKode['rank'];
        }
        $KodePlus=$KodeUtamaMax+1;
        $kode="$kode.$KodePlus";
        $rank=$KodePlus;
    }
?>
<input type="hidden" name="id_perkiraan" value="<?php echo "$id_perkiraan"; ?>">
<input type="hidden" name="rank" value="<?php echo "$rank"; ?>">
<div class="row">
    <div class="col-md-6 mb-3 form-group form-primary">
        <label class="float-label">Kode Akun</label>
        <input type="text" readonly name="kode" id="kode" class="form-control" value="<?php echo "$kode";?>" required>
    </div>
    <div class="col-md-6 mb-3 form-group form-primary">
        <label class="float-label">Level</label>
        <input type="number" min="1" readonly name="level_perkiraan" id="level_perkiraan" class="form-control" value="<?php echo "$LevelBaru";?>" required>
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
            if(empty($_POST['id_perkiraan'])){
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
            <option value="">Pilih</option>
            <option value="Closed">Closed</option>
            <option value="Open">Open</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div id="NotifikasiTambahAkunPerkiraan">
            <small class="text-primary">Pastikan anda mengisi form akun perkiraan dengan benar!</small>
        </div>
    </div>
</div>