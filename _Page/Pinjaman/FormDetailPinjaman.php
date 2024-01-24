<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_pinjaman
    if(empty($_POST['id_pinjaman'])){
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
        $id_pinjaman=$_POST['id_pinjaman'];
        //Buka data Anggota
        $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
        $DataPinjaman = mysqli_fetch_array($QryPinjaman);
        $id_anggota= $DataPinjaman['id_anggota'];
        $id_akses= $DataPinjaman['id_akses'];
        $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
        $tanggal_input= $DataPinjaman['tanggal_input'];
        $nama= $DataPinjaman['nama'];
        $jumlah_pinjaman= $DataPinjaman['jumlah_pinjaman'];
        $persen_jasa= $DataPinjaman['persen_jasa'];
        $nilai_angsuran= $DataPinjaman['nilai_angsuran'];
        $periode_angsuran= $DataPinjaman['periode_angsuran'];
        $token= $DataPinjaman['token'];
        $status= $DataPinjaman['status'];
        $strotime1=strtotime($tanggal_pinjaman);
        $tanggal_pinjaman=date('d/m/Y',$strotime1);
        $strotime2=strtotime($tanggal_input);
        $tanggal_input=date('d/m/Y H:i',$strotime2);
        $jumlah_pinjaman = "Rp " . number_format($jumlah_pinjaman,0,',','.');
        $nilai_angsuran = "Rp " . number_format($nilai_angsuran,0,',','.');
        if($status=="Pending"){
            $LabelStatus='<span class="badge bg-inf">Pending</span>';
        }else{
            if($status=="Active"){
                $LabelStatus='<span class="badge bg-primary">Active</span>';
            }else{
                if($status=="Lunas"){
                    $LabelStatus='<span class="badge bg-sccess">Active</span>';
                }else{
                    if($status=="Macet"){
                        $LabelStatus='<span class="badge bg-danger">Macet</span>';
                    }else{
                        $LabelStatus='<span class="badge bg-dark">'.$status.'</span>';
                    }
                }
            }
        }
?>
    <div class="modal-body">
        <div class="row mt-2"> 
            <div class="col-md-12 table table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <small><dt>Tanggal Pinjaman</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $tanggal_pinjaman; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Tanggal Input</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $tanggal_input; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Nama Anggota</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $nama; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Jumlah Pinjaman</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $jumlah_pinjaman; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Jumlah Angsuran</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo $nilai_angsuran; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Periode Angsuran</dt></small>
                            </td>
                            <td><b>:</b></td>
                            <td>
                                <small><?php echo "$periode_angsuran Kali" ; ?></small>
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
    <div class="modal-footer bg-info">
        <a href="index.php?Page=Pinjaman&Sub=DetailPinjaman&id=<?php echo "$id_pinjaman"; ?>" class="btn btn-success btn-rounded">
            <i class="bi bi-three-dots"></i> Selengkapnya
        </a>
        <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Tutup
        </button>
    </div>
<?php } ?>