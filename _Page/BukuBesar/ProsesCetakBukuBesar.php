<?php
    include '../../_Config/Connection.php';
    include '../../_Config/Session.php';
?>
<html>
    <head>
        <title>Buku Besar</title>
        <style type="text/css">
            @page {
                margin-top: 1cm;
                margin-bottom: 1cm;
                margin-left: 1cm;
                margin-right: 1cm;
            }
            body {
                background-color: #FFF;
                font-family: arial;
            }
            table{
                border-collapse: collapse;
                margin-top:10px;
            }
            table.kostum tr td {
                border:none;
                color:#333;
                border-spacing: 0px;
                padding: 2px;
                border-collapse: collapse;
                font-size:12px;
            }
            table.data tr td {
                border: 1px solid #666;
                color:#333;
                border-spacing: 0px;
                padding: 10px;
                border-collapse: collapse;
            }
        </style>
    </head>
<?php
    //Tangkap variabel
    if(empty($_GET['periode1'])){
        $periode1="";
        echo 'Data Tidak Bisa Dicetak Karena Periode Awal Kosong';
    }else{
        if(empty($_GET['periode2'])){
            $periode2="";
            echo 'Data Tidak Bisa Dicetak Karena Periode Akhir Kosong';
        }else{
            if(empty($_GET['id_perkiraan'])){
                echo 'Data Tidak Bisa Dicetak Karena Akun Perkiraan Kosong';
            }else{
                $periode1=$_GET['periode1'];
                $periode2=$_GET['periode2'];
                $id_perkiraan=$_GET['id_perkiraan'];
                //BUKA AKUN PERKIRAAN
                $QryPerkiraan = mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'")or die(mysqli_error($Conn));
                $DataPerkiraan = mysqli_fetch_array($QryPerkiraan);
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
                    $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND  tanggal<'$periode1' AND d_k='Debet'") or die(mysqli_error($Conn));
                    $DataDebet = mysqli_fetch_array($QryDebet);
                    $JumlahDebet=$DataDebet['nilai'];
                    //Hitung Kredit
                    $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND  tanggal<'$periode1' AND d_k='Kredit'") or die(mysqli_error($Conn));
                    $DataKredit = mysqli_fetch_array($QryKredit);
                    $JumlahKredit=$DataKredit['nilai'];
                    //Saldo
                    $SaldoAsumsi=$JumlahKredit-$JumlahDebet;
                }
                $SaldoAsumsiRp = "Rp " . number_format($SaldoAsumsi,0,',','.');
                //koneksi dan error
                echo '<body>';
                echo '  <table class="Kop" width="100%">';
                echo '      <tr>';
                echo '          <td align="center" colspan="6"><dt><h3>BUKU BESAR</h3></dt></td>';
                echo '      </tr>';
                echo '      <tr>';
                echo '          <td align="center" colspan="6"><dt>PERIODE '.$periode1.' S/D '.$periode2.'</dt></td>';
                echo '      </tr>';
                echo '      <tr>';
                echo '          <td align="center" colspan="6">Kode/Akun : '.$KodePerkiraan.' '.$NamaPerkiraan.' ('.$saldo_normal.')</td>';
                echo '      </tr>';
                echo '</table>';
                echo '<table class="data" width="100%">';
                echo '  <tr>';
                echo '      <td align="center"><b>No</b></td>';
                echo '      <td align="center"><b>Tanggal</b></td>';
                echo '      <td align="center"><b>Referensi</b></td>';
                echo '      <td align="center"><b>Debet</b></td>';
                echo '      <td align="center"><b>Kredit</b></td>';
                echo '      <td align="center"><b>Saldo</b></td>';
                echo '  </tr>';
                echo '  <tr>';
                echo '      <td align="center"></td>';
                echo '      <td align="left" colspan="4">Asumsi Saldo Transaksi Sebelumnya..</td>';
                echo '      <td align="right">'.$SaldoAsumsiRp.'</td>';
                echo '  </tr>';
                $no = 1;
                $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY id_jurnal ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_jurnal = $data['id_jurnal'];
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
                        //tanggal
                        if(!empty($data['tanggal'])){
                            $tanggal = $data['tanggal'];
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
                            $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND id_jurnal<='$id_jurnal' AND d_k='Debet'") or die(mysqli_error($Conn));
                            $DataDebet = mysqli_fetch_array($QryDebet);
                            $JumlahDebet=$DataDebet['nilai'];
                            //Hitung Kredit
                            $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND id_jurnal<='$id_jurnal' AND d_k='Kredit'") or die(mysqli_error($Conn));
                            $DataKredit = mysqli_fetch_array($QryKredit);
                            $JumlahKredit=$DataKredit['nilai'];
                            //Saldo
                            $Saldo=$JumlahDebet-$JumlahKredit;
                        }else{
                            //Hitung Debet
                            $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND id_jurnal<='$id_jurnal' AND d_k='Debet'") or die(mysqli_error($Conn));
                            $DataDebet = mysqli_fetch_array($QryDebet);
                            $JumlahDebet=$DataDebet['nilai'];
                            //Hitung Kredit
                            $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE id_perkiraan='$id_perkiraan' AND id_jurnal<='$id_jurnal' AND d_k='Kredit'") or die(mysqli_error($Conn));
                            $DataKredit = mysqli_fetch_array($QryKredit);
                            $JumlahKredit=$DataKredit['nilai'];
                            //Saldo
                            $Saldo=$JumlahKredit-$JumlahDebet;
                        }
                        $SaldoRp = "Rp " . number_format($Saldo,0,',','.');
                        echo '  <tr>';
                        echo '      <td align="center">'.$no.'</td>';
                        echo '      <td align="left">'.$tanggal.'</td>';
                        echo '      <td align="left">'.$LabelTransaksi.'</td>';
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
                echo '  </table>';
                echo '</body>';
            }
        }
    }
?>
</html>