<?php
    $ApiKey=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
?>
<div class="row">
    <div class="col-md-12 mt-3">
        <label for="title_api_key">Nama Api Key</label>
        <input type="text" name="title_api_key" id="title_api_key" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <label for="description_api_key">Keterangan</label>
        <textarea name="description_api_key" id="description_api_key" cols="30" rows="3" class="form-control"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <label for="api_key">Api Key</label>
        <input type="text" readonly name="api_key" id="api_key" class="form-control" value="<?php echo "$ApiKey";?>" required>
        <small class="credit">
            <a href="javascript:void(0);" id="GenerateApiKey">Generate Ulang API Key</a>
        </small>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <label for="status_api_key">Status</label>
        <select name="status_api_key" id="status_api_key" class="form-control" required>
            <option value="">Pilih..</option>
            <option value="Active">Active</option>
            <option value="Not Active">Not Active</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3" id="NotifikasiTambahApiKey">
        <small class="text-primary">Pastikan Data API Key Sudah Sesuai</small>
    </div>
</div>