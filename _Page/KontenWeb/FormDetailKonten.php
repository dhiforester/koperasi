<?php
    include "../../_Config/Connection.php";
    date_default_timezone_set('UTC');
    if(empty($_POST['id_setting_api_key'])){
        echo '<div class="modal-body">';
        echo '  <div class="row mb-3">';
        echo '      <div class="col-md-12 text-center text-danger">';
        echo '          ID APIs Key Tidak Bisa Ditangkap Oleh Sistem';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '      <i class="bi bi-x-circle"></i> Close';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_setting_api_key=$_POST['id_setting_api_key'];
        $QryAturKontenUmum = mysqli_query($Conn,"SELECT * FROM konten_umum WHERE id_setting_api_key='$id_setting_api_key'")or die(mysqli_error($Conn));
        $DataAturKontenUmum = mysqli_fetch_array($QryAturKontenUmum);
        if(empty($DataAturKontenUmum['id_konten_umum'])){
            $id_konten_umum="";
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
            $api_key="";
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
            $QryAturKontenUmum = mysqli_query($Conn,"SELECT * FROM setting_api_key WHERE id_setting_api_key='$id_setting_api_key'")or die(mysqli_error($Conn));
            $DataAturKontenUmum = mysqli_fetch_array($QryAturKontenUmum);
            $api_key= $DataAturKontenUmum['api_key'];
        }
        
?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><small class="credit"><b>API Key</b></small></td>
                            <td><small class="credit"><?php echo "$api_key"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Judul/Title</b></small></td>
                            <td><small class="credit"><?php echo "$judul_konten"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Kata Kunci</b></small></td>
                            <td><small class="credit"><?php echo "$keyword_konten"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Deskripsi</b></small></td>
                            <td><small class="credit"><?php echo "$deskripsi_konten"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Alamat Perusahaan</b></small></td>
                            <td><small class="credit"><?php echo "$alamat_konten"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Email Perusahaan</b></small></td>
                            <td><small class="credit"><?php echo "$email_konten"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Kontak Perusahaan</b></small></td>
                            <td><small class="credit"><?php echo "$kontak_konten"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Pavicon URL</b></small></td>
                            <td><small class="credit"><a href="assets/img/<?php echo "$favicon_konten"; ?>" target="_blank">View Image</a></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Logo URL</b></small></td>
                            <td><small class="credit"><a href="assets/img/<?php echo "$logo_konten"; ?>" target="_blank">View Image</a></small></td>
                        </tr>
                        <tr>
                            <td><small class="credit"><b>Base URL</b></small></td>
                            <td><small class="credit"><?php echo "$baseurl_konten"; ?></small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Close
    </button>
</div>
<?php } ?>