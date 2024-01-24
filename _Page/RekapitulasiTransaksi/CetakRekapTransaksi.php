<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(!empty($_GET['kategori'])){
        $KategoriTransaksi=$_GET['kategori'];
    }else{
        $KategoriTransaksi="";
    }
    if(!empty($_GET['status'])){
        $StatusStransaksi=$_GET['status'];
    }else{
        $StatusStransaksi="";
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
        header("Content-Disposition: attachment; filename=RekapitulasiTransaksi.xls");
    }
?>
<html>
    <head>
        <title>Laporan Rekapitulasi Transaksi</title>
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
                    <b>REKAPITULASI TRANSAKSI</b><br>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                        echo '<b>Kategori: </b> '.$KategoriTransaksi.'<br>';
                        echo '<b>Status: </b> '.$StatusStransaksi.'<br>';
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
                <td align="center"><b>Frekuensi</b></td>
                <td align="center"><b>Jumlah (Rp)</b></td>
                <td align="center"><b>Rate (Rp)</b></td>
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
                    if(empty($KategoriTransaksi)){
                        if(empty($StatusStransaksi)){
                            //Jumlah Transaksi
                            $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE tanggal like '%$WaktuPencarian%'"));
                            $DataTransaksi = $SumTransaksi['tagihan'];
                            $JumlahTransaksiRp = "" . number_format($DataTransaksi,0,',','.');
                            $Frekuensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$WaktuPencarian%'"));
                        }else{
                            //Jumlah Transaksi
                            $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                            $DataTransaksi = $SumTransaksi['tagihan'];
                            $JumlahTransaksiRp = "" . number_format($DataTransaksi,0,',','.');
                            $Frekuensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                        }
                    }else{
                        if(empty($StatusStransaksi)){
                            //Jumlah Transaksi
                            $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='$KategoriTransaksi' AND tanggal like '%$WaktuPencarian%'"));
                            $DataTransaksi = $SumTransaksi['tagihan'];
                            $JumlahTransaksiRp = "" . number_format($DataTransaksi,0,',','.');
                            $Frekuensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE kategori='$KategoriTransaksi' AND tanggal like '%$WaktuPencarian%'"));
                        }else{
                            //Jumlah Transaksi
                            $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='$KategoriTransaksi' AND status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                            $DataTransaksi = $SumTransaksi['tagihan'];
                            $JumlahTransaksiRp = "" . number_format($DataTransaksi,0,',','.');
                            $Frekuensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE kategori='$KategoriTransaksi' AND status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                        }
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
                    echo '  <td align="center">'.$no.'</td>';
                    echo '  <td>'.$Waktu.'</td>';
                    echo '  <td align="right">'.$Frekuensi.' Record</td>';
                    echo '  <td align="right">'.$JumlahTransaksiRp.'</td>';
                    echo '  <td align="right">'.$RateRp.'</td>';
                    echo '</tr>';
                    $no++;
                }
                $FrekuensiTotalRp = "" . number_format($FrekuensiTotal,0,',','.');
                $JumlahTotalRp = "" . number_format($JumlahTotal,0,',','.');
                $RateTotalRp = "" . number_format($RateTotal,0,',','.');
                echo '<tr>';
                echo '  <td align="center"></td>';
                echo '  <td><b>JUMLAH TOTAL</b></td>';
                echo '  <td align="right"><b>'.$FrekuensiTotalRp.' Record</b></td>';
                echo '  <td align="right"><b>'.$JumlahTotalRp.'</b></td>';
                echo '  <td align="right"><b>'.$RateTotalRp.'</b></td>';
                echo '</tr>';
            ?>
        </table>
    </body>
</html>
