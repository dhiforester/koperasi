<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
?>
<div class="card">
    <form action="javascript:void(0);" id="ProsesImportTabungan">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <b class="card-title">
                        <i class="bi bi-upload"></i> Import Data Simpanan
                    </b>
                </div>
                <div class="col-md-2">
                    <a href="index.php?Page=Simpanan" class="btn btn-md btn-dark btn-rounded btn-block">
                        <i class="bi bi-arrow-left-short"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-2"> 
                <div class="col-md-12">
                    <label for="file">Upload Data Excel Simpanan</label>
                    <input type="file" name="file" id="file" class="form-control">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-md btn-primary">
                <i class="bi bi-upload"></i> Mulai Proses
            </button>
        </div>
    </form>
</div>
<div class="card">
    <div class="card-header">
        <b>Log Proses</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12" style="height: 350px; overflow-y: scroll;" id="NotifikasiLogProsesImport">
                <span>Belum Ada Proses</span>
            </div>
        </div>
    </div>
</div>