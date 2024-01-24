<?php
    if(empty($_GET['id_akses'])){
        echo '<section class="section dashboard">';
        echo '  <div class="row">';
        echo '      <div class="col-lg-12">';
        echo '          <div class="card">';
        echo '              <div class="card-body">';
        echo '                  ID Akses Tidak Boleh Kosong';
        echo '              </div>';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_akses=$_GET['id_akses'];
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
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="card">
                    <di class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <b class="card-title">
                                    <i class="bi bi-info-circle"></i> Detail Akses
                                </b>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=Akses" class="btn btn-md btn-dark btn-rounded btn-block" title="Kembali Ke Halaman Akses">
                                    <i class="bi bi-arrow-left-short"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </di>
                    <div class="card-body">
                        <div class="row mt-2"> 
                            <div class="col-md-4 text-center">
                                <img src="assets/img/User/<?php echo "$gambar"; ?>" alt="" width="70%" class="rounded-circle">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <small><dt>ID Akses</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small id="GetIdAkses"><?php echo $id_akses; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Nama</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $nama_akses; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Email</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $email_akses; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Kontak</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $kontak_akses; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Daftar</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $registration; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Update</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $updatetime; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Status</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $status; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Akses</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $Akses; ?></small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <button type="button" class="btn btn-block btn-info" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword2" data-id="<?php echo "$id_akses"; ?>" title="Ubah Password">
                                    <i class="bi bi-key"></i> Ubah Password
                                </button>
                            </div>
                            <div class="col-md-4 mb-2">
                                <button type="button" class="btn btn-block btn-success" data-bs-toggle="modal" data-bs-target="#ModalEditAkses2" data-id="<?php echo "$id_akses"; ?>" title="Edit Akses">
                                    <i class="bi bi-pencil"></i> Edit Akses
                                </button>
                            </div>
                            <div class="col-md-4 mb-2">
                                <button type="button" class="btn btn-block btn-warning" data-bs-toggle="dropdown" title="Fitur Lainnya">
                                    <i class="bi bi-three-dots"></i> Lainnya
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <!-- <li>
                                        <a class="dropdown-item" href="javascript:void(0);" id="DashboardAkses">
                                            Dashboard Akses
                                        </a>
                                    </li> -->
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" id="IjinAkses">
                                            Ijin Akses
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);" id="LogAktivitas">
                                            Log Aktivitas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section dashboard" id="HalamanDetailAkses">
        <!-- Menampilkan Fitur Lanjutan Disini -->
    </section>
<?php } ?>