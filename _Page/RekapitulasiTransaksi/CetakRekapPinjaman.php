<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(!empty($_GET['status'])){
        $StatusPinjaman=$_GET['status'];
    }else{
        $StatusPinjaman="";
    }
    if(!empty($_GET['Periode'])){
        $Periode=$_GET['Periode'];
    }else{
        $Periode="Bulanan";
    }
    if(!empty($_GET['Tahun'])){
        $Tahun=$_GET['Tahun'];
    }else{
        $Tahun=date('Y');
    }
    if(!empty($_GET['Bulan'])){
        $Bulan=$_GET['Bulan'];
    }else{
        $Bulan=date('m');
    }
    if(!empty($_GET['Format'])){
        $Format=$_GET['Format'];
    }else{
        $Format="HTML";
    }
    if($Format=="Excel"){
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=RekapitulasiSimpanan.xls");
    }
?>
<html>
    <head>
        <title>Laporan Rekapitulasi Pinjaman</title>
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
    <body>
        <table width="100%">
            <tr>
                <td align="center">
                    <b>REKAPITULASI PINJAMAN</b><br>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                        echo '<b>Status: </b> '.$StatusPinjaman.'<br>';
                        echo '<b>Periode: </b> '.$Periode.'<br>';
                        echo '<b>Bulan: </b> '.$Bulan.'<br>';
                        echo '<b>Tahun: </b> '.$Tahun.'<br>';
                    ?>
                </td>
            </tr>
        </table>
        <table class="data" width="100%" cellspacing="0">
            <tr>
                <td align="center"><b>No</b></td>
                <td align="center"><b>Periode</b></td>
                <td align="center"><b>Pinjaman (Rp)</b></td>
                <td align="center"><b>Angsuran (Rp)</b></td>
                <td align="center"><b>Jasa (Rp)</b></td>
                <td align="center"><b>Denda (Rp)</b></td>
            </tr>
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
                    echo '  <td align="center">'.$no.'</td>';
                    echo '  <td>'.$Waktu.'</td>';
                    echo '  <td align="right">'.$JumlahPinjamanRp.'</td>';
                    echo '  <td align="right">'.$JumlahAngsuranRp.'</td>';
                    echo '  <td align="right">'.$JumlahJasaRp.'</td>';
                    echo '  <td align="right">'.$JumlahDendaRp.'</td>';
                    echo '</tr>';
                    $no++;
                }
                $TotalPinjamanRp = "" . number_format($TotalPinjaman,0,',','.');
                $TotalAngsuranRp = "" . number_format($TotalAngsuran,0,',','.');
                $TotalJasaRp = "" . number_format($TotalJasa,0,',','.');
                $TotalDendaRp = "" . number_format($TotalDenda,0,',','.');
                echo '<tr>';
                echo '  <td align="center"></td>';
                echo '  <td><b>JUMLAH TOTAL</b></td>';
                echo '  <td align="right"><b>'.$TotalPinjamanRp.'</b></td>';
                echo '  <td align="right"><b>'.$TotalAngsuranRp.'</b></td>';
                echo '  <td align="right"><b>'.$TotalJasaRp.'</b></td>';
                echo '  <td align="right"><b>'.$TotalDendaRp.'</b></td>';
                echo '</tr>';
            ?>
        </table>
    </body>
</html>
