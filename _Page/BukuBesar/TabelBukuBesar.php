<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_perkiraan'])){
        echo '<div class="card-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger">';
        echo '          <div class="alert alert-danger" role="alert">';
        echo '              ID Akun Perkiraan Tidak Boleh Kosong';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        if(empty($_POST['periode1'])){
            echo '<div class="card-body">';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center text-danger">';
            echo '          Periode Awal Tidak Boleh';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center">';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            if(empty($_POST['periode2'])){
                echo '<div class="card-body">';
                echo '  <div class="row">';
                echo '      <div class="col-md-12 text-center text-danger">';
                echo '          Periode Awal Tidak Boleh';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '  <div class="row">';
                echo '      <div class="col-md-12 text-center">';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }else{
                $id_perkiraan=$_POST['id_perkiraan'];
                $periode1=$_POST['periode1'];
                $periode2=$_POST['periode2'];
?>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                    //BUKA AKUN PERKIRAAN
                    $QryPerkiraan = mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'")or die(mysqli_error($Conn));
                    $DataPerkiraan = mysqli_fetch_array($QryPerkiraan);
                    if(!empty($DataPerkiraan['kode'])){
                        $KodePerkiraan=$DataPerkiraan['kode'];
                        $RankPerkiraan=$DataPerkiraan['rank'];
                        $NamaPerkiraan=$DataPerkiraan['nama'];
                        $LevelAccount=$DataPerkiraan['level'];
                        $saldo_normal=$DataPerkiraan['saldo_normal'];
                        $status=$DataPerkiraan['status'];
                        if($saldo_normal=="Debet"){
                            //Hitung Debet
                            $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND tanggal<'$periode1' AND d_k='Debet'") or die(mysqli_error($Conn));
                            $DataDebet = mysqli_fetch_array($QryDebet);
                            $JumlahDebet=$DataDebet['nilai'];
                            //Hitung Kredit
                            $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND tanggal<'$periode1' AND d_k='Kredit'") or die(mysqli_error($Conn));
                            $DataKredit = mysqli_fetch_array($QryKredit);
                            $JumlahKredit=$DataKredit['nilai'];
                            //Saldo
                            $SaldoAsumsi=$JumlahDebet-$JumlahKredit;
                        }else{
                            //Hitung Debet
                            $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND tanggal<'$periode1' AND d_k='Debet'") or die(mysqli_error($Conn));
                            $DataDebet = mysqli_fetch_array($QryDebet);
                            $JumlahDebet=$DataDebet['nilai'];
                            //Hitung Kredit
                            $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND tanggal<'$periode1' AND d_k='Kredit'") or die(mysqli_error($Conn));
                            $DataKredit = mysqli_fetch_array($QryKredit);
                            $JumlahKredit=$DataKredit['nilai'];
                            //Saldo
                            $SaldoAsumsi=$JumlahKredit-$JumlahDebet;
                        }
                        $SaldoAsumsiRp = "Rp " . number_format($SaldoAsumsi,0,',','.');
                        echo '      <div class="table-responsive">';
                        echo '          <table class="table table-hover">';
                        echo '              <thead>';
                        echo '                  <tr>';
                        echo '                      <th class="text-center"><dt>No</dt></th>';
                        echo '                      <th class="text-center"><dt>Tanggal</dt></th>';
                        echo '                      <th class="text-center"><dt>Referensi</dt></th>';
                        echo '                      <th class="text-center"><dt>Debet</dt></th>';
                        echo '                      <th class="text-center"><dt>Kredit</dt></th>';
                        echo '                      <th class="text-center"><dt>Saldo</dt></th>';
                        echo '                  </tr>';
                        echo '              </thead>';
                        echo '              <tbody>';
                        echo '                  <tr>';
                        echo '                      <td class="text-center"></td>';
                        echo '                      <td class="text-left" colspan="4">Asumsi Saldo Transaksi Sebelumnya..</td>';
                        echo '                      <td class="text-right">'.$SaldoAsumsiRp.'</td>';
                        echo '                  </tr>';
                        $no = 1;
                        $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY id_jurnal ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                if(!empty($data['id_transaksi'])){
                                    $IdReferensi=$data['id_transaksi'];
                                    $Referensi="Transaksi";
                                    //Buka Transaksi
                                    $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$IdReferensi'")or die(mysqli_error($Conn));
                                    $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                    $KategoriTransaksi= $DataTransaksi['kategori'];
                                    $LabelTransaksi="<span class='text-success'>Tansaksi $KategoriTransaksi ($IdReferensi)</span>";
                                    $UrlDetail="index.php?Page=Transaksi&Sub=DetailTransaksi&id=$IdReferensi";
                                }else{
                                    if(!empty($data['id_simpanan'])){
                                        $IdReferensi=$data['id_simpanan'];
                                        $Referensi="Simpanan";
                                        //buka Simpanan
                                        $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$IdReferensi'")or die(mysqli_error($Conn));
                                        $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                                        $KategoriTransaksi= $DataSimpanan['kategori'];
                                        $TanggalSimpanan= $DataSimpanan['tanggal'];
                                        $strtotime=strtotime($TanggalSimpanan);
                                        $TanggalSimpanan=date('d/m/Y',$strtotime);
                                        $LabelTransaksi="<span class='text-success'>$KategoriTransaksi $TanggalSimpanan ($IdReferensi)</span>";
                                        $UrlDetail="index.php?Page=Tabungan&Sub=DetailTabungan&id=$IdReferensi";
                                    }else{
                                        if(!empty($data['id_pinjaman'])){
                                            $IdReferensi=$data['id_pinjaman'];
                                            $Referensi="Pinjaman";
                                            //buka pinjaman
                                            $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$IdReferensi'")or die(mysqli_error($Conn));
                                            $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                            $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                            $strtotime=strtotime($tanggal_pinjaman);
                                            $tanggal_pinjaman=date('d/m/Y',$strtotime);
                                            $LabelTransaksi="<span class='text-success'>Pinjaman $tanggal_pinjaman ($IdReferensi)</span>";
                                            $UrlDetail="index.php?Page=Pinjaman&Sub=DetailPinjaman&id=$IdReferensi";
                                        }else{
                                            if(!empty($data['id_pinjaman_angsuran'])){
                                                $IdReferensi=$data['id_pinjaman_angsuran'];
                                                $Referensi="Angsuran";
                                                //Buka Angsuran
                                                $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$IdReferensi'")or die(mysqli_error($Conn));
                                                $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                                $id_pinjaman= $DataAngsuran['id_pinjaman'];
                                                $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                                $LabelTransaksi="<span class='text-success'>Angsuran $KategoriTransaksi ($IdReferensi)</span>";
                                                $UrlDetail="index.php?Page=Pinjaman&Sub=DetailPinjaman&id=$id_pinjaman";
                                            }else{
                                                if(!empty($data['id_shu_session'])){
                                                    $IdReferensi=$data['id_shu_session'];
                                                    $Referensi="Bagi Hasil";
                                                    //buka SHU
                                                    $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$IdReferensi'")or die(mysqli_error($Conn));
                                                    $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                                    $sesi_shu= $DatabagiHasil['sesi_shu'];
                                                    $LabelTransaksi="<span class='text-success'>Bagi Hasil $sesi_shu ($IdReferensi)</span>";
                                                    $UrlDetail="index.php?Page=BagiHasil&Sub=DetailBagiHasil&id=$IdReferensi";
                                                }else{
                                                    $IdReferensi=0;
                                                    $Referensi="None";
                                                    $LabelTransaksi="<span class='text-danger'>None</span>";
                                                    $UrlDetail="";
                                                }
                                            }
                                        }
                                    }
                                }
                                $id_jurnal = $data['id_jurnal'];
                                //tanggal
                                if(!empty($data['tanggal'])){
                                    $tanggal = $data['tanggal'];
                                    $strtotime=strtotime($tanggal);
                                    $tanggal=date('d/m/Y',$strtotime);
                                }else{
                                    $tanggal ="<i class='text-danger'>None</i>";
                                }
                                //kode_perkiraan
                                if(!empty($data['kode_perkiraan'])){
                                    $kode_perkiraan = $data['kode_perkiraan'];
                                }else{
                                    $kode_perkiraan ="<i class='text-danger'>None</i>";
                                }
                                //d_k
                                if(!empty($data['d_k'])){
                                    $d_k = $data['d_k'];
                                }else{
                                    $d_k ="";
                                }
                                //nilai
                                if(!empty($data['nilai'])){
                                    $nilai = $data['nilai'];
                                }else{
                                    $nilai ="0";
                                }
                                $NilaiRp="Rp " . number_format($nilai,0,',','.');
                                //updatetime
                                if(!empty($data['updatetime'])){
                                    $updatetime = $data['updatetime'];
                                }else{
                                    $updatetime ="";
                                }
                                //Menghitung Saldo
                                if($saldo_normal=="Debet"){
                                    //Hitung Debet
                                    $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan'  AND id_jurnal<='$id_jurnal' AND d_k='Debet'") or die(mysqli_error($Conn));
                                    $DataDebet = mysqli_fetch_array($QryDebet);
                                    $JumlahDebet=$DataDebet['nilai'];
                                    //Hitung Kredit
                                    $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan'  AND id_jurnal<='$id_jurnal' AND d_k='Kredit'") or die(mysqli_error($Conn));
                                    $DataKredit = mysqli_fetch_array($QryKredit);
                                    $JumlahKredit=$DataKredit['nilai'];
                                    //Saldo
                                    $Saldo=$JumlahDebet-$JumlahKredit;
                                }else{
                                    //Hitung Debet
                                    $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan'  AND id_jurnal<='$id_jurnal' AND d_k='Debet'") or die(mysqli_error($Conn));
                                    $DataDebet = mysqli_fetch_array($QryDebet);
                                    $JumlahDebet=$DataDebet['nilai'];
                                    //Hitung Kredit
                                    $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan'  AND id_jurnal<='$id_jurnal' AND d_k='Kredit'") or die(mysqli_error($Conn));
                                    $DataKredit = mysqli_fetch_array($QryKredit);
                                    $JumlahKredit=$DataKredit['nilai'];
                                    //Saldo
                                    $Saldo=$JumlahKredit-$JumlahDebet;
                                }
                                $SaldoRp = "Rp " . number_format($Saldo,0,',','.');
                                echo '  <tr class="isi">';
                                echo '      <td align="center">'.$no.'</td>';
                                echo '      <td align="left">'.$tanggal.'</td>';
                                echo '      <td align="left"><a href="'.$UrlDetail.'" target="_blank" class="text-primary">'.$LabelTransaksi.'</a></td>';
                                if($d_k=="Debet"){
                                    echo '      <td align="right">'.$NilaiRp.'</td>';
                                    echo '      <td align="right">Rp 00</td>';
                                }else{
                                    echo '      <td align="right">Rp 00</td>';
                                    echo '      <td align="right">'.$NilaiRp.'</td>';
                                }
                                echo '      <td align="right"><b>'.$SaldoRp.'</b></td>';
                                echo '  </tr>';
                            $no++;}
                        echo '              </tbody>';
                        echo '          </table>';
                    }else{
                        echo "Akun Perkiraan Tidak Valid";
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="_Page/BukuBesar/ProsesCetakBukuBesar.php?id_perkiraan=<?php echo "$id_perkiraan"; ?>&periode1=<?php echo "$periode1"; ?>&periode2=<?php echo "$periode2"; ?>" target="_blank" class="btn btn-md btn-rounded btn-primary" title="Cetak Laporan Buku Besar">
            Cetak
        </a>
    </div>
<?php }}} ?>