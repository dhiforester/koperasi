<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_jurnal
    if(empty($_POST['id_jurnal'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Jurnal Tidak Bisa Ditangkap Oleh Siste.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_jurnal=$_POST['id_jurnal'];
        //Buka data jurnal
        $QryJurnal = mysqli_query($Conn,"SELECT * FROM jurnal WHERE id_jurnal='$id_jurnal'")or die(mysqli_error($Conn));
        $DataJurnal = mysqli_fetch_array($QryJurnal);
        $id_jurnal = $DataJurnal['id_jurnal'];
        $id_transaksi = $DataJurnal['id_transaksi'];
        $id_perkiraan = $DataJurnal['id_perkiraan'];
        $tanggal = $DataJurnal['tanggal'];
        $kode_perkiraan = $DataJurnal['kode_perkiraan'];
        $nama_perkiraan = $DataJurnal['nama_perkiraan'];
        $d_k = $DataJurnal['d_k'];
        $nilai = $DataJurnal['nilai'];
        //Format rupiah
        $NominalRp = "Rp " . number_format($nilai,0,',','.');
        if(empty($DataJurnal['id_transaksi'])){
            if(empty($DataJurnal['id_simpanan'])){
                if(empty($DataJurnal['id_simpanan'])){
                    if(empty($DataJurnal['id_pinjaman_angsuran'])){
                        if(empty($DataJurnal['id_pinjaman'])){
                            if(empty($DataJurnal['id_shu_session'])){
                                $LabelTransaksi="<span class='text-danger'>None</span>";
                            }else{
                                $id_shu_session = $DataJurnal['id_shu_session'];
                                //buka SHU
                                $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                $sesi_shu= $DatabagiHasil['sesi_shu'];
                                $LabelTransaksi="<span class='text-success'>Bagi Hasil $sesi_shu ID.$id_shu_session</span>";
                                $UrlDetail="index.php?Page=BagiHasil&Sub=DetailBagiHasil&id=$id_pinjaman";
                            }
                        }else{
                            $id_pinjaman = $DataJurnal['id_pinjaman'];
                            //buka pinjaman
                            $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                            $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                            $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                            $LabelTransaksi="<span class='text-success'>Pinjaman $tanggal_pinjaman ID.$id_pinjaman</span>";
                            $UrlDetail="index.php?Page=Pinjaman&Sub=DetailPinjaman&id=$id_pinjaman";
                        }
                    }else{
                        $id_pinjaman_angsuran = $DataJurnal['id_pinjaman_angsuran'];
                        //buka Angsuran
                        $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                        $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                        $id_pinjaman= $DataAngsuran['id_pinjaman'];
                        $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                        $LabelTransaksi="<span class='text-success'>Angsuran $KategoriTransaksi ID.$id_pinjaman_angsuran</span>";
                        $UrlDetail="index.php?Page=Pinjaman&Sub=DetailPinjaman&id=$id_pinjaman";
                    }
                }else{
                    $id_simpanan = $DataJurnal['id_simpanan'];
                    //buka Simpanan
                    $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                    $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                    $KategoriTransaksi= $DataSimpanan['kategori'];
                    $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                    $UrlDetail="index.php?Page=Tabungan&Sub=DetailTabungan&id=$id_simpanan";
                }
            }else{
                $id_simpanan = $DataJurnal['id_simpanan'];
                //buka Simpanan
                $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                $KategoriTransaksi= $DataSimpanan['kategori'];
                $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                $UrlDetail="index.php?Page=Tabungan&Sub=DetailTabungan&id=$id_simpanan";
            }
        }else{
            $id_transaksi = $DataJurnal['id_transaksi'];
            //buka Transaksi
            $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
            $DataTransaksi = mysqli_fetch_array($QryTransaksi);
            $KategoriTransaksi= $DataTransaksi['kategori'];
            $LabelTransaksi="<span class='text-success'>Tansaksi $KategoriTransaksi ID.$id_transaksi</span>";
            $UrlDetail="index.php?Page=Transaksi&Sub=DetailTransaksi&id=$id_transaksi";
        }
?>
<div class="modal-body">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="table table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <small><dt>Tanggal</dt></small>
                            </td>
                            <td>
                                <small><?php echo "$tanggal"; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Referensi</dt></small>
                            </td>
                            <td>
                                <small><?php echo "$LabelTransaksi"; ?></small> <a href="<?php echo "$UrlDetail"; ?>" target="_blank">(Lihat Detai)</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Akun Perkiraan</dt></small>
                            </td>
                            <td>
                                <small><?php echo "$kode_perkiraan. $nama_perkiraan"; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Debet/Kredit</dt></small>
                            </td>
                            <td>
                                <small><?php echo "$d_k"; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Nilai</dt></small>
                            </td>
                            <td>
                                <small><?php echo $NominalRp; ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <button type="button" class="btn btn-success btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalEditJurnal">
        <i class="bi bi-pencil-square"></i> Edit
    </button>
    <button type="button" class="btn btn-danger btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalHapusJurnal">
        <i class="bi bi-trash"></i> Hapus
    </button>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>
<?php } ?>