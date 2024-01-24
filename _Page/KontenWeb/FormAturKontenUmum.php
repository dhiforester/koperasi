<?php
    include "../../_Config/Connection.php";
    date_default_timezone_set('UTC');
    if(empty($_POST['id_setting_api_key'])){
        echo '<div class="row mb-3">';
        echo '  <div class="col-md-12 text-center text-danger">';
        echo '      ID APIs Key Tidak Bisa Ditangkap Oleh Sistem';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_setting_api_key=$_POST['id_setting_api_key'];
        $QryAturKontenUmum = mysqli_query($Conn,"SELECT * FROM konten_umum WHERE id_setting_api_key='$id_setting_api_key'")or die(mysqli_error($Conn));
        $DataAturKontenUmum = mysqli_fetch_array($QryAturKontenUmum);
        if(empty($DataAturKontenUmum['id_konten_umum'])){
            $id_konten_umum="";
            $judul_konten="";
            $keyword_konten="";
            $deskripsi_konten="";
            $alamat_konten="";
            $email_konten="";
            $kontak_konten="";
            $favicon_konten="";
            $logo_konten="";
            $baseurl_konten="";
        }else{
            $id_konten_umum= $DataAturKontenUmum['id_konten_umum'];
            $judul_konten= $DataAturKontenUmum['judul_konten'];
            $keyword_konten= $DataAturKontenUmum['keyword_konten'];
            $deskripsi_konten= $DataAturKontenUmum['deskripsi_konten'];
            $alamat_konten= $DataAturKontenUmum['alamat_konten'];
            $email_konten= $DataAturKontenUmum['email_konten'];
            $kontak_konten= $DataAturKontenUmum['kontak_konten'];
            $favicon_konten= $DataAturKontenUmum['favicon_konten'];
            $logo_konten= $DataAturKontenUmum['logo_konten'];
            $baseurl_konten= $DataAturKontenUmum['baseurl_konten'];
        }
        
?>
    <input type="hidden" name="id_konten_umum" id="id_konten_umum" value="<?php echo "$id_konten_umum"; ?>">
    <input type="hidden" name="id_setting_api_key" id="id_setting_api_key" value="<?php echo "$id_setting_api_key"; ?>">
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="judul_konten">Judul Halaman</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="judul_konten" id="judul_konten" class="form-control" placeholder="Klinik ABC" value="<?php echo "$judul_konten"; ?>">
            <small>Maksimal 20 karakter</small>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="keyword_konten">Kata Kunci</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="keyword_konten" id="keyword_konten" class="form-control" value="<?php echo "$keyword_konten"; ?>">
            <small>(Ex: keyword1, keyword2, keyword3)</small>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="deskripsi_konten">Deskripsi</label>
        </div>
        <div class="col-md-9">
            <textarea name="deskripsi_konten" id="deskripsi_konten" cols="30" rows="3" class="form-control"><?php echo "$deskripsi_konten"; ?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="alamat_konten">Alamat Perusahaan</label>
        </div>
        <div class="col-md-9">
            <textarea name="alamat_konten" id="alamat_konten" cols="30" rows="3" class="form-control"><?php echo "$alamat_konten"; ?></textarea>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="email_konten">Email Perusahaan</label>
        </div>
        <div class="col-md-9">
            <input type="email" name="email_konten" id="email_konten" class="form-control" placeholder="email@domain.com" value="<?php echo "$email_konten"; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="kontak_konten">Kontak Perusahaan</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="kontak_konten" id="kontak_konten" class="form-control" placeholder="+62" value="<?php echo "$kontak_konten"; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="favicon_konten">Favicon</label>
        </div>
        <div class="col-md-9">
            <input type="file" name="favicon_konten" id="favicon_konten" class="form-control">
            <small>
                Maksimal File 2 Mb 
                <?php
                    if(!empty($favicon_konten)){
                        echo '<a href="assets/img/'.$favicon_konten.'" target="_blank">View Image Here</a>';
                    }
                ?>
            </small>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="logo_konten">Logo</label>
        </div>
        <div class="col-md-9">
            <input type="file" name="logo_konten" id="logo_konten" class="form-control">
            <small>
                Maksimal File 2 Mb 
                <?php
                    if(!empty($logo_konten)){
                        echo '<a href="assets/img/'.$logo_konten.'" target="_blank">View Image Here</a>';
                    }
                ?>
            </small>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="baseurl_konten">Base URL</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="baseurl_konten" id="baseurl_konten" class="form-control" placeholder="https://" value="<?php echo "$baseurl_konten"; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-3">
        </div>
        <div class="col-md-9 text-right" id="NotifikasiAturKontenUmum">
            <small class="text-dark">Pastikan data yang anda input sudah sesuai.</small>
        </div>
    </div>
<?php } ?>