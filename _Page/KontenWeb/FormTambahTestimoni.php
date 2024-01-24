<?php 
    date_default_timezone_set("Asia/Jakarta");
?>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label for="jam">Jam</label>
        <input type="time" name="jam" id="jam" class="form-control" value="<?php echo date('H:i'); ?>">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="nama">Nama User</label>
        <input type="text" name="nama" id="nama" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
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
        <textarea name="testimoni" id="testimoni" cols="30" rows="3" class="form-control"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="Pending">Pending</option>
            <option value="Draft">Draft</option>
            <option value="Publish">Publish</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3" id="NotifikasiTambahTestimoni">
        <small class="credit text-primary">Pastikan Testimoni Yang Anda Input Sudah Benar</small>
    </div>
</div>