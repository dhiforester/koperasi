<?php
    //Tangkap id_pinjaman
    if(empty($_GET['id'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pinjaman=$_GET['id'];
        //Buka data pinjaman
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
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <b class="card-title">
                                <i class="bi bi-info-circle"></i> Detail Pinjaman
                            </b>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?Page=Pinjaman" class="btn btn-md btn-dark btn-rounded btn-block">
                                <i class="bi bi-arrow-left-short"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2"> 
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <td>
                                            <small><dt>ID Pinjaman</dt></small>
                                        </td>
                                        <td><b>:</b></td>
                                        <td>
                                            <small id="GetIdPinjaman"><?php echo "$id_pinjaman"; ?></small>
                                        </td>
                                    </tr>
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
                                            <small><?php echo "$nilai_angsuran ($persen_jasa %)"; ?></small>
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
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-success btn-sm w-100" data-bs-toggle="modal" data-bs-target="#ModalEditPinjaman2" data-id="<?php echo "$id_pinjaman"; ?>" title="Edit Data pinjaman">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button> 
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger btn-sm w-100" data-bs-toggle="modal" data-bs-target="#ModalDeletePinjaman2" data-id="<?php echo "$id_pinjaman"; ?>" title="Hapus Data pinjaman">
                                <i class="bi bi-x"></i> Hapus
                            </button> 
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-sm btn-outline-info w-100" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i> Lainnya
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" id="AngsuranPinjaman">Angsuran</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" id="JurnalPinjaman">Jurnal</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);" id="SimulasiPinjaman">Simulasi Pinjaman</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="DetailPinjamanLainnya">
        <!-- Detail Lainnya -->
</div>
<?php } ?>