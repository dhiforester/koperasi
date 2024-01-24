<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(empty($_POST['id_akses'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          ID Akses Tidak Ditemukan.';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo ' <div class="modal-footer bg-info">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '              <i class="bi bi-x-circle"></i> Tutup';
        echo '          </button>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $nama_akses= $DataDetailAkses['nama_akses'];
        $kontak_akses= $DataDetailAkses['kontak_akses'];
        $email_akses = $DataDetailAkses['email_akses'];
        $password= $DataDetailAkses['password'];
        $Akses= $DataDetailAkses['akses'];
        $gambar= $DataDetailAkses['image_akses'];
        if(empty($gambar)){
            $gambar="No-Image.png";
        }else{
            $gambar="$gambar";
        }
        $akses= $DataDetailAkses['akses'];
        $status= $DataDetailAkses['status'];
        $datetime_daftar= $DataDetailAkses['datetime_daftar'];
        $datetime_update= $DataDetailAkses['datetime_update'];
        $registration=$datetime_daftar;
        $updatetime=$datetime_update;
?>
<div class="modal-body" style="height: 350px; overflow-y: scroll;">
    <div class="row mt-2"> 
        <div class="col-md-12 text-center mb-3">
            <img src="assets/img/User/<?php echo "$gambar"; ?>" alt="" width="150px" class="rounded-circle">
        </div>
        <div class="col-md-12  mb-3">
            <div class="table table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <small><b>Nama</b></small>
                            </td>
                            <td>
                                <small><?php echo $nama_akses; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><b>Email</b></small>
                            </td>
                            <td>
                                <small><?php echo $email_akses; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><b>Kontak</b></small>
                            </td>
                            <td>
                                <small><?php echo $kontak_akses; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><b>Daftar</b></small>
                            </td>
                            <td>
                                <small><?php echo $registration; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Status</dt></small>
                            </td>
                            <td>
                                <small><?php echo $status; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Akses</dt></small>
                            </td>
                            <td>
                                <small><?php echo $Akses; ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <a href="index.php?Page=Akses&Sub=DetailAkses&id_akses=<?php echo $id_akses;?>" class="btn btn-success btn-rounded">
        <i class="bi bi-three-dots"></i> Selengkapna
    </a>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>
<?php } ?>