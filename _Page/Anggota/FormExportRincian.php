<?php
    if(empty($_POST['id_anggota'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-danger">';
        echo '      ID Anggota Tidak Boleh Kosong!!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_anggota=$_POST['id_anggota'];
?>
    <input type="hidden" name="id_anggota" value="<?php echo "$id_anggota" ?>">
    <div class="row">
        <div class="col-md-6">
            <label for="periode1">Periode Awal</label>
            <input type="date" name="periode1" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="periode2">Periode Akhir</label>
            <input type="date" name="periode2" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="format">Format</label>
            <select name="format" id="format" class="form-control">
                <option value="HTML">HTML</option>
                <option value="EXCEL">EXCEL</option>
            </select>
        </div>
    </div>
<?php } ?>