<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_shu_session
    if(empty($_POST['id_shu_session'])){
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
        $id_shu_session=$_POST['id_shu_session'];
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
        $modal_anggota = "" . number_format($modal_anggota,0,',','.');
        $penjualan = "" . number_format($penjualan,0,',','.');
        $pinjaman_rp = "" . number_format($pinjaman,0,',','.');
        $jasa_modal_anggota_rp = "" . number_format($jasa_modal_anggota,0,',','.');
        $laba_penjualan_rp = "" . number_format($laba_penjualan,0,',','.');
        $jasa_pinjaman_rp = "" . number_format($jasa_pinjaman,0,',','.');
        $persen_usaha_rp = "" . number_format($persen_usaha,0,',','.');
        $alokasi_hitung_rp = "" . number_format($alokasi_hitung,0,',','.');
        $alokasi_nyata_rp = "" . number_format($alokasi_nyata,0,',','.');
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
<div class="modal-body">
    <div class="row mt-2"> 
        <div class="col-md-12 table table-responsive" style="height: 350px; overflow-y: scroll;">
            <table class="table table-bordered table-hover">
                <tbody>
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
<div class="modal-footer bg-primary">
    <a href="index.php?Page=BagiHasil&Sub=DetailBagiHasil&id=<?php echo $id_shu_session;?>" class="btn btn-success btn-rounded">
        <i class="bi bi-three-dots"></i> Selengkapna
    </a>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>
<?php } ?>