<?php
    //Koneksi
    include "_Config/Connection.php";
    //Inisiasi tanggal sekarang
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_sekarang=date('Y-m-d H:i:s');
    $tanggal_sekarang=strtotime($tanggal_sekarang);
    //menangkap data dari link
    if(empty($_GET['email'])){
        echo '<div class="card-body">';
        echo '  <div class="pt-4 pb-2">';
        echo '      <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>';
        echo '      <p class="text-center text-danger small">Email Tidak Boleh Kosong.</p>';
        echo '  </div>';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '          <h1><i class="bi bi-x-circle"></i></h1>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '          <a href="Login.php" class="btn btn-dark w-100" type="button">Kembali Ke Login</a>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        if(empty($_GET['token'])){
            echo '<div class="card-body">';
            echo '  <div class="pt-4 pb-2">';
            echo '      <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>';
            echo '      <p class="text-center text-danger small">Kode Tidak Boleh Kosong.</p>';
            echo '  </div>';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center">';
            echo '          <h1><i class="bi bi-x-circle"></i></h1>';
            echo '      </div>';
            echo '  </div>';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center">';
            echo '          <a href="Login.php" class="btn btn-dark w-100" type="button">Kembali Ke Login</a>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $email=$_GET['email'];
            $token=$_GET['token'];
            //Validasi email pda data akses
            $Qry=mysqli_query($Conn,"SELECT*FROM akses_anggota WHERE email='$email'")or die(mysqli_error($Conn));
            $DataAkses = mysqli_fetch_array($Qry);
            if(empty($DataAkses["id_akses_anggota"])){
                echo '<div class="card-body">';
                echo '  <div class="pt-4 pb-2">';
                echo '      <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>';
                echo '      <p class="text-center text-danger small">Email Yang Anda Gunakan Tidak Terdaftar.</p>';
                echo '  </div>';
                echo '  <div class="row">';
                echo '      <div class="col-md-12 text-center">';
                echo '          <h1><i class="bi bi-x-circle"></i></h1>';
                echo '      </div>';
                echo '  </div>';
                echo '  <div class="row">';
                echo '      <div class="col-md-12 text-center">';
                echo '          <a href="Login.php" class="btn btn-dark w-100" type="button">Kembali Ke Login</a>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }else{
                $id_akses_anggota=$DataAkses["id_akses_anggota"];
                $code_unik=md5($token);
                //Validasi email dan token
                $QryLupaPassword=mysqli_query($Conn,"SELECT*FROM lupa_password WHERE id_akses_anggota='$id_akses_anggota' AND code_unik='$code_unik'")or die(mysqli_error($Conn));
                $DataLupaPassword = mysqli_fetch_array($QryLupaPassword);
                if(empty($DataLupaPassword["id_akses_anggota"])){
                    echo '<div class="card-body">';
                    echo '  <div class="pt-4 pb-2">';
                    echo '      <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>';
                    echo '      <p class="text-center text-danger small">Kode Verifikasi Tidak Terdaftar.</p>';
                    echo '  </div>';
                    echo '  <div class="row">';
                    echo '      <div class="col-md-12 text-center">';
                    echo '          <h1><i class="bi bi-x-circle"></i></h1>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '  <div class="row">';
                    echo '      <div class="col-md-12 text-center">';
                    echo '          <a href="Login.php" class="btn btn-dark w-100" type="button">Kembali Ke Login</a>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                }else{
                    $tanggal_expired=$DataLupaPassword["tanggal_expired"];
                    if($tanggal_sekarang>$tanggal_expired){
                        echo '<div class="card-body">';
                        echo '  <div class="pt-4 pb-2">';
                        echo '      <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>';
                        echo '      <p class="text-center text-danger small">Kode Verifikasi Sudah Expired.</p>';
                        echo '  </div>';
                        echo '  <div class="row">';
                        echo '      <div class="col-md-12 text-center">';
                        echo '          <h1><i class="bi bi-x-circle"></i></h1>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '  <div class="row">';
                        echo '      <div class="col-md-12 text-center">';
                        echo '          <a href="Login.php" class="btn btn-dark w-100" type="button">Kembali Ke Login</a>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '</div>';
                    }else{
?>
    <form action="javascript:void(0);" id="ProsesUbahPassword">
        <input type="hidden" name="email" value="<?php echo "$email"; ?>">
        <input type="hidden" name="token" value="<?php echo "$token"; ?>">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Ubah Password</h5>
                <p class="text-center small">Silahkan masukan password baru</p>
            </div>
            <form action="javascript:void(0);" class="row g-3" id="prosesUbahPassword">
                <div class="col-12">
                    <label for="password1" class="form-label">Password Baru</label>
                    <input type="password" name="PasswordBaru1" id="PasswordBaru1" class="form-control" required>
                </div>
                <div class="col-12">
                    <label for="password2" class="form-label">Ulangi Password</label>
                    <input type="password" name="PasswordBaru2" id="PasswordBaru2" class="form-control" required>
                    <small class="credit">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanUbahPassword" name="TampilkanUbahPassword">
                            <label class="form-check-label" for="TampilkanUbahPassword">
                                Tampilkan Password
                            </label>
                        </div>
                    </small>
                </div>
                <div class="col-12" id="NotifikasiUbahPassword">
                    Pastikan password yang anda gunakan dapat diingat
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0"></p>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <br>
                </div>
            </div>
        </div>
    </form>
<?php }}}}} ?>