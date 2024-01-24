<form action="javascript:void(0);" id="ProsesEditPassword">
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>Ganti Password</h4>
                </div>
                <div class="col-md-2">
                    <a href="index.php?Page=MyProfile" class="btn btn-md btn-block btn-dark">
                        <i class="bi bi-arrow-90deg-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <input type="hidden" name="id_akses" id="id_akses" value="<?php echo "$SessionIdAkses"; ?>">
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="old_password">Password Lama</label>
                </div>
                <div class="col-md-9">
                    <input type="password" name="old_password" id="old_password" class="form-control" value="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="password1">Password Baru</label>
                </div>
                <div class="col-md-9">
                    <input type="password" name="password1" id="password1" class="form-control" value="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="password2">Ulangi Password</label>
                </div>
                <div class="col-md-9">
                    <input type="password" name="password2" id="password2" class="form-control" value="">
                    <div id="NotifikasiEditPassword">
                        <small class="text-primary">Pastikan bahwa password yang anda masukan sudah sesuai</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <small class="credit">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword2" name="TampilkanPassword2">
                            <label class="form-check-label" for="TampilkanPassword2">
                                Tampilkan Password
                            </label>
                        </div>
                    </small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-md btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </div>
</form>