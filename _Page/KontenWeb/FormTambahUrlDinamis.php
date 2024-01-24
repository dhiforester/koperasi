<div class="row">
    <div class="col-md-6 mb-3">
        <label for="id_setting_api_key">API Key</label>
        <select name="id_setting_api_key" id="id_setting_api_key" class="form-control">
            <option value="">Pilih</option>
            <?php
                include "../../_Config/Connection.php";
                $QryApiKey = mysqli_query($Conn, "SELECT*FROM setting_api_key ORDER BY title_api_key ASC");
                while ($DataApiKey = mysqli_fetch_array($QryApiKey)) {
                    $id_setting_api_key= $DataApiKey['id_setting_api_key'];
                    $title_api_key= $DataApiKey['title_api_key'];
                    echo '<option value="'.$id_setting_api_key.'">'.$title_api_key.'</option>';
                }
            ?>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="kategori_url">Kategori URL</label>
        <select name="kategori_url" id="kategori_url" class="form-control">
            <option value="">Pilih</option>
            <option value="Medsos">Media Sosial</option>
            <option value="Text Link">Text Link</option>
            <option value="Slider">Slider</option>
            <option value="Banner">Banner</option>
            <option value="Image">Image Link</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="nama_url">Nama URL</label>
        <input type="text" name="nama_url" id="nama_url" class="form-control">
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
        <input type="text" name="konten_url" id="konten_url" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="text_url">Text/Label</label>
        <input type="text" name="text_url" id="text_url" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3" id="NotifikasiTambahUrlDinamis">
        <small class="credit text-primary">Pastikan data URL Dinamis Yang Anda Input Sudah Benar</small>
    </div>
</div>