<div class="card-body">
    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
        <p class="text-center small">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Fitur ini hanya berlaku untuk akses anggota.';
                echo '  Untuk poengurus, anda harus menghubungi admin untuk lupa password ini.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </p>
        <p class="text-center small">Sistem akan mengirimkan kode verifikasi ke email anda.</p>
    </div>
    <form action="javascript:void(0);" class="row g-3" id="ProsesResetPassword">
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="email" name="email" class="form-control" id="email" required>
                <div class="invalid-feedback">Please enter your username.</div>
            </div>
        </div>
        <div class="col-12" id="NotifikasiResetPassword">
            <small>
                Pastikan email yang anda masukan sudah benar.
            </small>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit" id="TombolResetPassword">Reset</button>
        </div>
        <div class="col-12">
            <a href="Login.php" class="btn btn-dark w-100" type="button">Kembali Ke Login</a>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <br>
        </div>
    </div>
</div>