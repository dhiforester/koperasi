<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_konten_url'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3 text-center text-danger">';
        echo '      ID Konten Tidak Bisa Ditangkap Oleh Sistem!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_konten_url=$_POST['id_konten_url'];
        $QryUrlDinamis = mysqli_query($Conn,"SELECT * FROM konten_url WHERE id_konten_url='$id_konten_url'")or die(mysqli_error($Conn));
        $DataUrlDinamis = mysqli_fetch_array($QryUrlDinamis);
        $id_konten_url= $DataUrlDinamis['id_konten_url'];
        $id_setting_api_key= $DataUrlDinamis['id_setting_api_key'];
        $nama_url= $DataUrlDinamis['nama_url'];
        $kategori_url= $DataUrlDinamis['kategori_url'];
        $konten_url= $DataUrlDinamis['konten_url'];
        $text_url= $DataUrlDinamis['text_url'];
        $image_url= $DataUrlDinamis['image_url'];
?>
    <input type="hidden" name="id_konten_url" id="id_konten_url" value="<?php echo "$id_konten_url";?>">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="id_setting_api_key">API Key</label>
            <select name="id_setting_api_key" id="id_setting_api_key" class="form-control">
                <option value="">Pilih</option>
                <?php
                    include "../../_Config/Connection.php";
                    $QryApiKey = mysqli_query($Conn, "SELECT*FROM setting_api_key ORDER BY title_api_key ASC");
                    while ($DataApiKey = mysqli_fetch_array($QryApiKey)) {
                        $id_setting_api_key_list= $DataApiKey['id_setting_api_key'];
                        $title_api_key_list= $DataApiKey['title_api_key'];
                        if($id_setting_api_key==$id_setting_api_key_list){
                            echo '<option selected value="'.$id_setting_api_key_list.'">'.$title_api_key_list.'</option>';
                        }else{
                            echo '<option value="'.$id_setting_api_key_list.'">'.$title_api_key_list.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="kategori_url">Kategori URL</label>
            <select name="kategori_url" id="kategori_url" class="form-control">
                <option <?php if($kategori_url==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($kategori_url=="Medsos"){echo "selected";} ?> value="Medsos">Media Sosial</option>
                <option <?php if($kategori_url=="Text Link"){echo "selected";} ?> value="Text Link">Text Link</option>
                <option <?php if($kategori_url=="Slider"){echo "selected";} ?> value="Slider">Slider</option>
                <option <?php if($kategori_url=="Banner"){echo "selected";} ?> value="Banner">Banner</option>
                <option <?php if($kategori_url=="Image"){echo "selected";} ?> value="Image">Image Link</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama_url">Nama URL</label>
            <input type="text" name="nama_url" id="nama_url" class="form-control" value="<?php echo "$nama_url"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="image_url">Image</label>
            <input type="file" name="image_url" id="image_url" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="konten_url">URL</label>
            <input type="text" name="konten_url" id="konten_url" class="form-control" value="<?php echo "$konten_url"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="text_url">Text/Label</label>
            <input type="text" name="text_url" id="text_url" class="form-control" value="<?php echo "$text_url"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiEditUrlDinamis">
            <small class="credit text-primary">Pastikan data URL Dinamis Yang Anda Input Sudah Benar</small>
        </div>
    </div>
<?php } ?>