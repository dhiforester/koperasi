<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        $id_shu_session="";
    }else{
        $id_shu_session=$_GET['id'];
    }
    if(empty($id_shu_session)){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Bagi Hasil</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Sesi SHU Tidak Boleh Kosong.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        //Buka data askes
        $QryDetail = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
        $DataDetail = mysqli_fetch_array($QryDetail);
        $id_shu_session= $DataDetail['id_shu_session'];
        $sesi_shu= $DataDetail['sesi_shu'];
        $periode_hitung1= $DataDetail['periode_hitung1'];
        $periode_hitung2= $DataDetail['periode_hitung2'];
        $modal_anggota= $DataDetail['modal_anggota'];
        $penjualan= $DataDetail['penjualan'];
        $pinjaman= $DataDetail['pinjaman'];
        $jasa_modal_anggota= $DataDetail['jasa_modal_anggota'];
        $laba_penjualan= $DataDetail['laba_penjualan'];
        $jasa_pinjaman= $DataDetail['jasa_pinjaman'];
        $persen_usaha= $DataDetail['persen_usaha'];
        $persen_modal= $DataDetail['persen_modal'];
        $persen_pinjaman= $DataDetail['persen_pinjaman'];
        $alokasi_hitung= $DataDetail['alokasi_hitung'];
        $alokasi_nyata= $DataDetail['alokasi_nyata'];
        $status= $DataDetail['status'];
        $modal_anggota = "Rp " . number_format($modal_anggota,0,',','.');
        $penjualan = "Rp " . number_format($penjualan,0,',','.');
        $pinjaman_rp = "Rp " . number_format($pinjaman,0,',','.');
        $jasa_modal_anggota_rp = "Rp " . number_format($jasa_modal_anggota,0,',','.');
        $laba_penjualan_rp = "Rp " . number_format($laba_penjualan,0,',','.');
        $jasa_pinjaman_rp = "Rp " . number_format($jasa_pinjaman,0,',','.');
        $persen_usaha_rp = "Rp " . number_format($persen_usaha,0,',','.');
        $alokasi_hitung_rp = "Rp " . number_format($alokasi_hitung,0,',','.');
        $alokasi_nyata_rp = "Rp " . number_format($alokasi_nyata,0,',','.');
        $strtotime1=strtotime($periode_hitung1);
        $strtotime2=strtotime($periode_hitung2);
        $periode_hitung1=date('d/m/Y',$strtotime1);
        $periode_hitung2=date('d/m/Y',$strtotime2);
        //Cek Status Jurnal
        $JumlahJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_shu_session='$id_shu_session'"));
        //Jumlah Anggota
        $JumlahRincian = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $JumlahRincian = "" . number_format($JumlahRincian,0,',','.');
        //Label Jurnal Ada/Tidak Ada
        if(empty($JumlahJurnal)){
            $LabelJurnal='<span class="text-dark"> <i class="bi bi-x"></i> No Jurnal</span>';
        }else{
            $LabelJurnal='<span class="text-sucess"> <i class="bi bi-check-circle"></i> Jurnal</span>';
        }
        //Label Status
        if($status=="Pending"){
            $LabelStatus='<span class="badge badge-warning"> <i class="bi bi-three-dots"></i> Pending</span>';
        }else{
            $LabelStatus='<span class="badge badge-succes"> <i class="bi bi-check-circle"></i> '.$status.'</span>';
        }
?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <b class="card-title">
                        <i class="bi bi-info-circle"></i> Detail Sesi Bagi Hasil
                    </b>
                </div>
                <div class="col-md-2">
                    <a href="index.php?Page=BagiHasil" class="btn btn-md btn-dark btn-rounded btn-block">
                        <i class="bi bi-arrow-left-short"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-2"> 
                <div class="col-md-12 table table-responsive" style="height: 350px; overflow-y: scroll;">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>
                                    <small><dt>ID Sesi</dt></small>
                                </td>
                                <td>
                                    <small id="GetIdSessi"><?php echo $id_shu_session; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Nama Sesi</dt></small>
                                </td>
                                <td>
                                    <small><?php echo $sesi_shu; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Periode Hitung</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$periode_hitung1-$periode_hitung2"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Jumlah Rincian</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$JumlahRincian Record"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Modal Anggota</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$modal_anggota"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Penjualan Anggota</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$penjualan"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Pinjaman Anggota</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$pinjaman_rp"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Jasa Modal/Simpanan</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$jasa_modal_anggota_rp"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Jasa Penjualan</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$laba_penjualan_rp"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Jasa Pinjaman</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$jasa_pinjaman_rp"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Persentase Usaha</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$persen_usaha%"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Persentase Modal</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$persen_modal%"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Persentase Pinjaman</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$persen_pinjaman%"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Alokasi Bagi Hasil</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$alokasi_nyata_rp"; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Status</dt></small>
                                </td>
                                <td>
                                    <small><?php echo "$LabelStatus"; ?></small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-outline-success btn-sm w-100" data-bs-toggle="modal" data-bs-target="#ModalEditBagiHasil" data-id="<?php echo "$id_shu_session"; ?>" title="Edit Data Bagi Hasil">
                        <i class="bi bi-pencil-square"></i> Edit
                    </button> 
                </div>
                <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-outline-danger btn-sm w-100" data-bs-toggle="modal" data-bs-target="#ModalDeleteBagiHasil" data-id="<?php echo "$id_shu_session"; ?>" title="Hapus Data Bagi Hasil">
                        <i class="bi bi-x"></i> Hapus
                    </button> 
                </div>
                <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-sm btn-outline-info w-100" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i> Lainnya
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="RincianBagiHasil">Rincian Bagi Hasil</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="JurnalBagiHasil">Jurnal</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="section dashboard" id="HalamanLainnya">
        
    </section>
<?php } ?>