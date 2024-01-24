<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_anggota'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12 text-center text-danger">';
        echo '      ID Anggota Tidak Boleh Kosong';
        echo '  </div>';
        echo '</div>';
    }else{
        //keyword_by
        if(!empty($_POST['keyword_by'])){
            $keyword_by=$_POST['keyword_by'];
        }else{
            $keyword_by="";
        }
        //keyword
        if(!empty($_POST['keyword'])){
            $keyword=$_POST['keyword'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['batas'])){
            $batas=$_POST['batas'];
        }else{
            $batas="10";
        }
        //batas
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
        }else{
            $page="";
        }
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
    <div class="row mb-2">
        <div class="col-md-12" style="height: 350px; overflow-y: scroll;">
            <div class="table table-responsive">
                <table class="table table-bordered table-responsive">
                    <tbody>
                        <tr>
                            <td>
                                <small><dt>ID.Anggota</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small id="GetIdAnggota2"><?php echo $id_anggota; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>NIP</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $nip; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Nama</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $nama; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Tanggal Masuk</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $tanggal_masuk; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Email</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $email; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Kontak</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $kontak; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Status</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $LabelStatus; ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <button type="button" class="btn btn-block btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalPilihAnggota" data-id="<?php echo "$keyword_by,$keyword,$batas,$page"; ?>" title="Kembali Pilih Anggota">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </button>
        </div>
        <div class="col-md-6 mb-2">
            <button type="button" class="btn btn-block btn-primary" id="LanjutkanPilihAnggota" title="Lanjutkan Pilih Anggota">
                Lanjutkan <i class="bi bi-arrow-right-circle"></i>
            </button>
        </div>
    </div>
<?php } ?>