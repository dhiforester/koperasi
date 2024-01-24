<?php
    date_default_timezone_set('Asia/Jakarta');
    if(!empty($_POST['StatusPinjaman'])){
        $StatusPinjaman=$_POST['StatusPinjaman'];
    }else{
        $StatusPinjaman="Active";
    }
    if(!empty($_POST['GrafikShow'])){
        $GrafikShow=$_POST['GrafikShow'];
    }else{
        $GrafikShow="Pinjaman";
    }
    if(!empty($_POST['Periode'])){
        $Periode=$_POST['Periode'];
    }else{
        $Periode="Bulanan";
    }
    if(!empty($_POST['Tahun'])){
        $Tahun=$_POST['Tahun'];
    }else{
        $Tahun=date('Y');
    }
    if(!empty($_POST['Bulan'])){
        $Bulan=$_POST['Bulan'];
    }else{
        $Bulan=date('m');
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form action="index.php?Page=RekapitulasiTransaksi&Sub=Pinjaman" method="POST" id="ProsesMenampilkanGrafikPinjaman">
                    <div class="row">
                        <div class="col-md-2">
                            <select name="StatusPinjaman" id="StatusPinjaman" class="form-control">
                                <option value="">Semua</option>
                                <?php
                                    $QrySimpanan = mysqli_query($Conn, "SELECT DISTINCT status FROM pinjaman ORDER BY status ASC");
                                    while ($DataSimpanan = mysqli_fetch_array($QrySimpanan)) {
                                        $status= $DataSimpanan['status'];
                                        if($StatusPinjaman==$status){
                                            echo '<option selected value="'.$status.'">'.$status.'</option>';
                                        }else{
                                            echo '<option value="'.$status.'">'.$status.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <small>Status</small>
                        </div>
                        <div class="col-md-2">
                            <select name="GrafikShow" id="GrafikShow" class="form-control">
                                <option <?php if($GrafikShow=="Pinjaman"){echo "selected";} ?> value="Pinjaman">Pinjaman</option>
                                <option <?php if($GrafikShow=="Angsuran"){echo "selected";} ?> value="Angsuran">Angsuran</option>
                                <option <?php if($GrafikShow=="Jasa"){echo "selected";} ?> value="Jasa">Jasa</option>
                                <option <?php if($GrafikShow=="Denda"){echo "selected";} ?> value="Denda">Denda</option>
                            </select>
                            <small>Grafik</small>
                        </div>
                        <div class="col-md-2">
                            <select name="Periode" id="Periode" class="form-control">
                                <option <?php if($Periode=="Bulanan"){echo "selected";} ?> value="Bulanan">Bulanan</option>
                                <option <?php if($Periode=="Tahun"){echo "selected";} ?> value="Tahun">Tahun</option>
                            </select>
                            <small>Periode</small>
                        </div>
                        <div class="col-md-2">
                            <select name="Tahun" id="Tahun" class="form-control">
                                <?php
                                    $TahunSekarang=date('Y');
                                    $TahunKedepan=$TahunSekarang+5;
                                    for ( $i=2005; $i<=$TahunKedepan; $i++ ){
                                        if($Tahun==$i){
                                            echo '<option selected value="'.$i.'">'.$i.'</option>';
                                        }else{
                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <small>Tahun</small>
                        </div>
                        <div class="col-md-2" id="form_bulan">
                            <select name="Bulan" id="Bulan" class="form-control">
                                <option <?php if($Bulan=='01'){echo "selected";} ?> value="01">Januari</option>
                                <option <?php if($Bulan=='02'){echo "selected";} ?> value="02">Februari</option>
                                <option <?php if($Bulan=='03'){echo "selected";} ?> value="03">Maret</option>
                                <option <?php if($Bulan=='04'){echo "selected";} ?> value="04">April</option>
                                <option <?php if($Bulan=='05'){echo "selected";} ?> value="05">Mei</option>
                                <option <?php if($Bulan=='06'){echo "selected";} ?> value="06">Juni</option>
                                <option <?php if($Bulan=='07'){echo "selected";} ?> value="07">Juli</option>
                                <option <?php if($Bulan=='08'){echo "selected";} ?> value="08">Agustus</option>
                                <option <?php if($Bulan=='09'){echo "selected";} ?> value="09">September</option>
                                <option <?php if($Bulan=='10'){echo "selected";} ?> value="10">Oktober</option>
                                <option <?php if($Bulan=='11'){echo "selected";} ?> value="11">November</option>
                                <option <?php if($Bulan=='12'){echo "selected";} ?> value="12">Desember</option>
                            </select>
                            <small>Bulan</small>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-md btn-primary w-100">
                                Tampilkan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="GrafikRekapitulasiPinjaman"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"><b>No</b></th>
                                    <th class="text-center"><b>Periode</b></th>
                                    <th class="text-center"><b>Pinjaman (Rp)</b></th>
                                    <th class="text-center"><b>Angsuran (Rp)</b></th>
                                    <th class="text-center"><b>Jasa (Rp)</b></th>
                                    <th class="text-center"><b>Denda (Rp)</b></th>
                                    <th class="text-center"><b>Opsi</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($Periode=="Tahun"){
                                        $a=1;
                                        $b=12;
                                    }else{
                                        $TahunBulan="$Tahun-$Bulan";
                                        $JumlahHari = cal_days_in_month(CAL_GREGORIAN, $Bulan, $Tahun);
                                        $a=1;
                                        $b=$JumlahHari;
                                    }
                                    $no=1;
                                    $TotalPinjaman=0;
                                    $TotalAngsuran=0;
                                    $TotalJasa=0;
                                    $TotalDenda=0;
                                    for ( $i =$a; $i<=$b; $i++ ){
                                        if($Periode=="Bulanan"){
                                            //Zero pading
                                            $i=sprintf("%02d", $i);
                                            $WaktuPencarian="$Tahun-$Bulan-$i";
                                            $WaktuFormating="$Tahun-$Bulan-$i";
                                            $Waktu = strtotime($WaktuFormating);
                                            $Waktu = date('d/m/Y', $Waktu);
                                        }else{
                                            $i=sprintf("%02d", $i);
                                            $WaktuPencarian="$Tahun-$i";
                                            $WaktuFormating="$Tahun-$i-01";
                                            $Waktu = strtotime($WaktuFormating);
                                            $Waktu = date('F Y', $Waktu);
                                        }
                                        if(empty($StatusPinjaman)){
                                            //Jumlah Pinjaman
                                            $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM pinjaman WHERE tanggal_pinjaman like '%$WaktuPencarian%'"));
                                            $JumlahPinjaman = $SumPinjaman['jumlah_pinjaman'];
                                            $JumlahPinjamanRp = "" . number_format($JumlahPinjaman,0,',','.');
                                        }else{
                                            //Jumlah Pinjaman
                                            $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM pinjaman WHERE tanggal_pinjaman like '%$WaktuPencarian%' AND status like '%$StatusPinjaman%'"));
                                            $JumlahPinjaman = $SumPinjaman['jumlah_pinjaman'];
                                            $JumlahPinjamanRp = "" . number_format($JumlahPinjaman,0,',','.');
                                        }
                                        //Angsuran
                                        $SumAngsuran = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE kategori_angsuran='Pokok' AND tanggal like '%$WaktuPencarian%'"));
                                        $JumlahAngsuran = $SumAngsuran['jumlah'];
                                        $JumlahAngsuranRp = "" . number_format($JumlahAngsuran,0,',','.');
                                        //Jasa
                                        $SumJasa = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE kategori_angsuran='Jasa' AND tanggal like '%$WaktuPencarian%'"));
                                        $JumlahJasa = $SumJasa['jumlah'];
                                        $JumlahJasaRp = "" . number_format($JumlahJasa,0,',','.');
                                        //Denda
                                        $SumDenda = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE kategori_angsuran='Denda' AND tanggal like '%$WaktuPencarian%'"));
                                        $JumlahDenda = $SumDenda['jumlah'];
                                        $JumlahDendaRp = "" . number_format($JumlahDenda,0,',','.');
                                        //Total
                                        $TotalPinjaman=$TotalPinjaman+$JumlahPinjaman;
                                        $TotalAngsuran=$TotalAngsuran+$JumlahAngsuran;
                                        $TotalJasa=$TotalJasa+$JumlahJasa;
                                        $TotalDenda=$TotalDenda+$JumlahDenda;
                                        echo '<tr>';
                                        echo '  <td class="text-center">'.$no.'</td>';
                                        echo '  <td class="text-left">'.$Waktu.'</td>';
                                        echo '  <td align="right">'.$JumlahPinjamanRp.'</td>';
                                        echo '  <td align="right">'.$JumlahAngsuranRp.'</td>';
                                        echo '  <td align="right">'.$JumlahJasaRp.'</td>';
                                        echo '  <td align="right">'.$JumlahDendaRp.'</td>';
                                        echo '  <td class="text-center">';
                                        echo '      <a href="_Page/RekapitulasiTransaksi/CetakUraianPinjaman.php?status='.$StatusPinjaman.'&periode='.$WaktuPencarian.'" target="_blank" class="btn btn-sm btn-success">';
                                        echo '          View';
                                        echo '      </a>';
                                        echo '  </td>';
                                        echo '</tr>';
                                        $no++;
                                    }
                                    $TotalPinjamanRp = "" . number_format($TotalPinjaman,0,',','.');
                                    $TotalAngsuranRp = "" . number_format($TotalAngsuran,0,',','.');
                                    $TotalJasaRp = "" . number_format($TotalJasa,0,',','.');
                                    $TotalDendaRp = "" . number_format($TotalDenda,0,',','.');
                                    echo '<tr>';
                                    echo '  <td class="text-center"></td>';
                                    echo '  <td class="text-left"><b>JUMLAH TOTAL</b></td>';
                                    echo '  <td align="right"><b>'.$TotalPinjamanRp.'</b></td>';
                                    echo '  <td align="right"><b>'.$TotalAngsuranRp.'</b></td>';
                                    echo '  <td align="right"><b>'.$TotalJasaRp.'</b></td>';
                                    echo '  <td align="right"><b>'.$TotalDendaRp.'</b></td>';
                                    echo '  <td class="text-center">';
                                    echo '  </td>';
                                    echo '</tr>';
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12">
                        <a href="_Page/RekapitulasiTransaksi/CetakRekapPinjaman.php?status=<?php echo "$StatusPinjaman"; ?>&Periode=<?php echo "$Periode"; ?>&Tahun=<?php echo "$Tahun"; ?>&Bulan=<?php echo "$Bulan"; ?>&Format=HTML" target="_blank" class="btn btn-sm btn-outline-info">
                            HTML
                        </a>
                        <a href="_Page/RekapitulasiTransaksi/CetakRekapPinjaman.php?status=<?php echo "$StatusPinjaman"; ?>&Periode=<?php echo "$Periode"; ?>&Tahun=<?php echo "$Tahun"; ?>&Bulan=<?php echo "$Bulan"; ?>&Format=Excel" target="_blank" class="btn btn-sm btn-outline-success">
                            Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>