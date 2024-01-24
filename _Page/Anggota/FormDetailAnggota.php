<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_anggota
    if(empty($_POST['id_anggota'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '      <i class="bi bi-x-circle"></i> Tutup';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_anggota=$_POST['id_anggota'];
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $tanggal_masuk= $DataAnggota['tanggal_masuk'];
        $nama= $DataAnggota['nama'];
        if(!empty($DataAnggota['image'])){
            $image= $DataAnggota['image'];
        }else{
            $image="No-Image.PNG";
        }
        if(!empty($DataAnggota['email'])){
            $email= $DataAnggota['email'];
        }else{
            $email='<span class="text-danger">Tidak Ada Email</span>';
        }
        if(!empty($DataAnggota['kontak'])){
            $kontak= $DataAnggota['kontak'];
        }else{
            $kontak='<span class="text-danger">Tidak Ada Kontak</span>';
        }
        if(!empty($DataAnggota['nip'])){
            $nip= $DataAnggota['nip'];
        }else{
            $nip='<span class="text-danger">Tidak Ada NIP</span>';
        }
        $status= $DataAnggota['status'];
        $strtotime=strtotime($tanggal_masuk);
        $TanggalMasuk=date('d/m/Y',$strtotime);
        if($status=="Active"){
            $LabelStatus='<span class="text-success">Active</span>';
        }else{
            $LabelStatus='<span class="text-danger">'.$status.'</span>';
        }
        
?>
    <div class="modal-body" style="height: 350px; overflow-y: scroll;">
        <div class="row mt-2"> 
            <div class="col-md-12 text-center mb-3">
                <img src="assets/img/Anggota/<?php echo "$image"; ?>" alt="" width="150px" class="rounded-circle">
            </div>
            <div class="col-md-12 mb-3">
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td>
                                <small><dt>NIP</dt></small>
                            </td>
                            <td>
                                <small><?php echo $nip; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Nama</dt></small>
                            </td>
                            <td>
                                <small><?php echo $nama; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Tanggal Masuk</dt></small>
                            </td>
                            <td>
                                <small><?php echo $tanggal_masuk; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Email</dt></small>
                            </td>
                            <td>
                                <small><?php echo $email; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Kontak</dt></small>
                            </td>
                            <td>
                                <small><?php echo $kontak; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Status</dt></small>
                            </td>
                            <td>
                                <small><?php echo $LabelStatus; ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-info">
        <a href="index.php?Page=Anggota&Sub=DetailAnggota&id=<?php echo "$id_anggota"; ?>" class="btn btn-success btn-rounded">
            <i class="bi bi-three-dots"></i> Selengkapnya
        </a>
        <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Tutup
        </button>
    </div>
<?php } ?>