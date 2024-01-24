<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_anggota'])){
        $id_anggota="";
    }else{
        $id_anggota=$_POST['id_anggota'];
    }
    if(empty($id_anggota)){
        echo '<div class="row">';
        echo '  <div class="col-md-12">';
        echo '      <div class="card">';
        echo '          <div class="card-body">';
        echo '              <div class="row">';
        echo '                  <div class="col-md-12 mb-3 text-danger text-center">';
        echo '                      ID Anggota Tidak Boleh Kosong.';
        echo '                  </div>';
        echo '              </div>';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
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
        //Jumlah Pembelian
        $SumPembelian = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE id_anggota='$id_anggota'"));
        $JumlahPembelian = $SumPembelian['tagihan'];
        $JumlahPembelian = "" . number_format($JumlahPembelian,0,',','.');
        //Jumlah Rincian
        $SumRincian = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_rincian WHERE id_anggota='$id_anggota'"));
        $JumlahRincian = $SumRincian['jumlah'];
        $JumlahRincian = "" . number_format($JumlahRincian,0,',','.');
        //Jumlah Simpanan
        $SumSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE (kategori='Simpanan Pokok' OR kategori='Simpanan Wajib' OR kategori='Simpanan Sukarela') AND (id_anggota='$id_anggota')"));
        $JumlahSmpanan = $SumSimpanan['jumlah'];
        $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE (kategori='Penarikan') AND (id_anggota='$id_anggota')"));
        $JumlahPenarikan = $SumPenarikan['jumlah'];
        $SaldoTabungan=$JumlahSmpanan-$JumlahPenarikan;
        $SaldoTabungan = "" . number_format($JumlahSmpanan,0,',','.');
        $JumlahPenarikan = "" . number_format($JumlahPenarikan,0,',','.');
        //Jumlah Saldo Pinjaman
        $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM pinjaman WHERE id_anggota='$id_anggota'"));
        $JumlahPinjaman = $SumPinjaman['jumlah_pinjaman'];
        $SumAngsuranPokok = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_anggota='$id_anggota' AND kategori_angsuran='Pokok'"));
        $JumlahAngsuranPokok = $SumAngsuranPokok['jumlah'];
        $SisaPinjaman=$JumlahPinjaman-$JumlahAngsuranPokok;
        $JumlahPinjaman = "" . number_format($JumlahPinjaman,0,',','.');
        $JumlahAngsuranPokok = "" . number_format($JumlahAngsuranPokok,0,',','.');
        $SisaPinjaman = "" . number_format($SisaPinjaman,0,',','.');
        //Jumlah SHU
        $SumShu = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(shu) AS shu FROM shu_rincian WHERE id_anggota='$id_anggota'"));
        $JumlahShu = $SumShu['shu'];
        $JumlahShu = "" . number_format($JumlahShu,0,',','.');
?>
    <div class="row">
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Transaksi<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart-plus"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo "$JumlahPembelian" ;?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Rincian<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo "$JumlahRincian" ;?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Simpanan<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-wallet"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo $SaldoTabungan ;?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Penarikan<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-wallet"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo $JumlahPenarikan ;?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Pinjaman<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo "$JumlahPinjaman";?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Angsuran<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo $JumlahAngsuranPokok ;?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Sisa Utang<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo $SisaPinjaman ;?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Bagi Hasil<span></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="ps-3">
                            <small><?php echo $JumlahShu ;?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>