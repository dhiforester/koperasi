<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_akses_anggota
    if(empty($_GET['id_akses_anggota'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          Access ID Data Undefined.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_akses_anggota=$_GET['id_akses_anggota'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses_anggota WHERE id_akses_anggota='$id_akses_anggota'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $nama_akses= $DataDetailAkses['nama_anggota'];
        $kontak_akses= $DataDetailAkses['kontak'];
        $email_akses = $DataDetailAkses['email'];
        $password= $DataDetailAkses['password'];
        $gambar= $DataDetailAkses['photo_profile'];
        if(empty($gambar)){
            $gambar="No-Image.png";
        }else{
            $gambar="$gambar";
        }
?>
    <form action="javascript:void(0);" id="ProsesEditAksesAnggota">
        <div class="card mt-5">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4>Edit Profile Anggota</h4>
                    </div>
                    <div class="col-md-2">
                        <a href="index.php?Page=MyProfile" class="btn btn-md btn-block btn-dark">
                            <i class="bi bi-arrow-90deg-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" name="id_akses_anggota" id="id_akses_anggota_edit" value="<?php echo "$id_akses_anggota"; ?>">
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="nama_akses">Nama Lengkap</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nama_akses" id="nama_akses_edit" class="form-control" value="<?php echo "$nama_akses"; ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="kontak_akses_edit">Nomor Kontak</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="kontak_akses" id="kontak_akses_edit" class="form-control" value="<?php echo "$kontak_akses"; ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="email_akses">Alamat Email</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" name="email_akses" id="email_akses_edit" class="form-control" value="<?php echo "$email_akses"; ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="image_akses">Photo Profile</label>
                    </div>
                    <div class="col-md-9">
                        <input type="file" name="image_akses" id="image_akses_edit" class="form-control">
                        <small class="credit">Maksimal file 2 Mb (PNG, JPG, JPEG, GIF)</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9" id="NotifikasiEditProfileAnggota">
                        <small class="text-primary">Pastikan bahwa data yang anda input sudah sesuai</small>
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
<?php } ?>