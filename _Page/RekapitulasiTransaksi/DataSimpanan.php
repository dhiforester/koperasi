<?php
    date_default_timezone_set('Asia/Jakarta');
    if(!empty($_POST['KategoriSimpanan'])){
        $KategoriSimpanan=$_POST['KategoriSimpanan'];
    }else{
        $KategoriSimpanan="Simpanan Pokok";
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
                <form action="index.php?Page=RekapitulasiTransaksi&Sub=Simpanan" method="POST" id="ProsesMenampilkanGrafikSimpanan">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="KategoriSimpanan" id="KategoriSimpanan" class="form-control">
                                <option value="">Semua</option>
                                <?php
                                    $QrySimpanan = mysqli_query($Conn, "SELECT DISTINCT kategori FROM simpanan ORDER BY kategori ASC");
                                    while ($DataSimpanan = mysqli_fetch_array($QrySimpanan)) {
                                        $kategori= $DataSimpanan['kategori'];
                                        if($KategoriSimpanan==$kategori){
                                            echo '<option selected value="'.$kategori.'">'.$kategori.'</option>';
                                        }else{
                                            echo '<option value="'.$kategori.'">'.$kategori.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                            <small>Kategori</small>
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
                        <div id="GrafikRekapitulasiSimpanan">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"><b>No</b></th>
                                    <th class="text-center"><b>Periode</b></th>
                                    <th class="text-center"><b>Frekuensi</b></th>
                                    <th class="text-center"><b>Jumlah (Rp)</b></th>
                                    <th class="text-center"><b>Rate (Rp)</b></th>
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
                                    $JumlahTotal=0;
                                    $FrekuensiTotal=0;
                                    $RateTotal=0;
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
                                        if(empty($KategoriSimpanan)){
                                            //Jumlah Transaksi
                                            $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE tanggal like '%$WaktuPencarian%'"));
                                            $DataTransaksi = $SumTransaksi['jumlah'];
                                            $JumlahTransaksiRp = "" . number_format($DataTransaksi,0,',','.');
                                            $Frekuensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE tanggal like '%$WaktuPencarian%'"));
                                        }else{
                                            //Jumlah Transaksi
                                            $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori='$KategoriSimpanan' AND tanggal like '%$WaktuPencarian%'"));
                                            $DataTransaksi = $SumTransaksi['jumlah'];
                                            $JumlahTransaksiRp = "" . number_format($DataTransaksi,0,',','.');
                                            $Frekuensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE kategori='$KategoriSimpanan' AND tanggal like '%$WaktuPencarian%'"));
                                        }
                                        if(!empty($DataTransaksi)){
                                            $Rate=$DataTransaksi/$Frekuensi;
                                        }else{
                                            $Rate=0;
                                        }
                                        $RateRp = "" . number_format($Rate,0,',','.');
                                        $JumlahTotal=$JumlahTotal+$DataTransaksi;
                                        $FrekuensiTotal=$FrekuensiTotal+$Frekuensi;
                                        $RateTotal=$RateTotal+$Rate;
                                        echo '<tr>';
                                        echo '  <td class="text-center">'.$no.'</td>';
                                        echo '  <td class="text-left">'.$Waktu.'</td>';
                                        echo '  <td align="right">'.$Frekuensi.' Record</td>';
                                        echo '  <td align="right">'.$JumlahTransaksiRp.'</td>';
                                        echo '  <td align="right">'.$RateRp.'</td>';
                                        echo '  <td class="text-center">';
                                        echo '      <a href="_Page/RekapitulasiTransaksi/CetakUraianSimpanan.php?kategori='.$KategoriSimpanan.'&periode='.$WaktuPencarian.'" target="_blank" class="btn btn-sm btn-success">';
                                        echo '          View';
                                        echo '      </a>';
                                        echo '  </td>';
                                        echo '</tr>';
                                        $no++;
                                    }
                                    $FrekuensiTotalRp = "" . number_format($FrekuensiTotal,0,',','.');
                                    $JumlahTotalRp = "" . number_format($JumlahTotal,0,',','.');
                                    $RateTotalRp = "" . number_format($RateTotal,0,',','.');
                                    echo '<tr>';
                                    echo '  <td class="text-center"></td>';
                                    echo '  <td class="text-left"><b>JUMLAH TOTAL</b></td>';
                                    echo '  <td align="right"><b>'.$FrekuensiTotalRp.' Record</b></td>';
                                    echo '  <td align="right"><b>'.$JumlahTotalRp.'</b></td>';
                                    echo '  <td align="right"><b>'.$RateTotalRp.'</b></td>';
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
                        <a href="_Page/RekapitulasiTransaksi/CetakRekapSimpanan.php?kategori=<?php echo "$KategoriSimpanan"; ?>&Periode=<?php echo "$Periode"; ?>&Tahun=<?php echo "$Tahun"; ?>&Bulan=<?php echo "$Bulan"; ?>&Format=HTML" target="_blank" class="btn btn-sm btn-outline-info">
                            HTML
                        </a>
                        <a href="_Page/RekapitulasiTransaksi/CetakRekapSimpanan.php?kategori=<?php echo "$KategoriSimpanan"; ?>&Periode=<?php echo "$Periode"; ?>&Tahun=<?php echo "$Tahun"; ?>&Bulan=<?php echo "$Bulan"; ?>&Format=Excel" target="_blank" class="btn btn-sm btn-outline-success">
                            Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>