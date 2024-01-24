<?php
    if(empty($_GET['periode1'])){
        echo "Periode Awal Tidak Boleh Kosong!";
    }else{
        if(empty($_GET['periode2'])){
            echo "Periode Akhir Tidak Boleh Kosong!";
        }else{
            if(empty($_GET['id_mitra'])){
                echo "Mitra Tidak Boleh Kosong!";
            }else{
                $periode1=$_GET['periode1'];
                $periode2=$_GET['periode2'];
                $id_mitra=$_GET['id_mitra'];
                include '../../_Config/Connection.php';
                include '../../_Config/Session.php';
                include '../../vendor/autoload.php';
                $mpdf = new \Mpdf\Mpdf();
                $nama_dokumen= "Rekapitulasi-Transaksi";
                // $mpdf=new mPDF('utf-8', array($panjang_x,$lebar_y)); 
                $html='<style>@page *{margin-top: 0px;}</style>'; 
                //Beginning Buffer to save PHP variables and HTML tags
                ob_start();
                $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                $DataMitra = mysqli_fetch_array($QryMitra);
                $id_mitra= $DataMitra['id_mitra'];
                $id_akses= $DataMitra['id_akses'];
                $id_wilayah= $DataMitra['id_wilayah'];
                $nama_mitra= $DataMitra['nama_mitra'];
?>
<html>
    <head>
        <title>Laporan Bagi Hasil</title>
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
                    <b>LAPORAN BAGI HASIL</b><br>
                    <?php echo "<b>$nama_mitra</b><br>"; ?>
                    Periode <?php echo "$periode1 - $periode2";?>
                </td>
            </tr>
        </table>
        
        <table class="data" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td class="text-center"><b class="sub-title">No</b></td>
                    <td class="text-center"><b class="sub-title">Tanggal</b></td>
                    <td class="text-center"><b class="sub-title">Pasien</b></td>
                    <td class="text-center"><b class="sub-title">Tindakan</b></td>
                    <td class="text-center"><b class="sub-title">Volume</b></td>
                    <td class="text-center"><b class="sub-title">Komisi</b></td>
                </tr>
            </thead>
            <tbody>
                <?php
                    //Data dokter/nakes mitra
                    $JumlahKomisi =0;
                    $NomorDokter = 1;
                    $NomorRincian=0;
                    $QryDokter = mysqli_query($Conn, "SELECT * FROM dokter WHERE id_mitra='$id_mitra' ORDER BY nama_dokter ASC");
                    while ($DataDokter = mysqli_fetch_array($QryDokter)) {
                        $id_dokter= $DataDokter['id_dokter'];
                        $NamaDokter= $DataDokter['nama_dokter'];
                        echo '<tr>';
                        echo '  <td class="text-left"><b>'.$NomorDokter.'.0</b></td>';
                        echo '  <td class="text-left" colspan="5"><b>'.$NamaDokter.'</b></td>';
                        echo '</tr>';
                        $NomorKunjungan = 1;
                        $TotalBagiHasil=0;
                        $QryKunjungan = mysqli_query($Conn, "SELECT * FROM pasien_kunjungan WHERE id_dokter='$id_dokter' AND id_mitra='$id_mitra' AND datetime_kunjungan>='$periode1' AND datetime_kunjungan<='$periode2' ORDER BY id_kunjungan ASC");
                        while ($DataKunjungan = mysqli_fetch_array($QryKunjungan)) {
                            $id_kunjungan= $DataKunjungan['id_kunjungan'];
                            $nama_pasien= $DataKunjungan['nama_pasien'];
                            $datetime_kunjungan= $DataKunjungan['datetime_kunjungan'];
                            //Buka Data Transaksi
                            $NomorTransaksi = 1;
                            $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE id_kunjungan='$id_kunjungan' ORDER BY id_kunjungan ASC");
                            while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                $id_transaksi= $DataTransaksi['id_transaksi'];
                                //Buka rincian transaksi
                                $QryRincian = mysqli_query($Conn, "SELECT * FROM transaksi_rincian WHERE id_transaksi='$id_transaksi' AND id_mitra_tindakan!='' ORDER BY id_transaksi_rincian ASC");
                                while ($DataRincian = mysqli_fetch_array($QryRincian)) {
                                    $NomorRincian=$NomorRincian+1;
                                    $id_transaksi_rincian= $DataRincian['id_transaksi_rincian'];
                                    $id_mitra_tindakan= $DataRincian['id_mitra_tindakan'];
                                    $nama_tindakan= $DataRincian['nama_tindakan'];
                                    $jumlah= $DataRincian['jumlah'];
                                    $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
                                    $JumlahKomisi =0;
                                    //Membuka jumlah komisi
                                    $QryTindakan=mysqli_query($Conn,"SELECT * FROM mitra_tindakan WHERE id_mitra_tindakan='$id_mitra_tindakan'")or die(mysqli_error($Conn));
                                    $DataTindakan=mysqli_fetch_array($QryTindakan);
                                    if(!empty($DataTindakan['id_mitra_tindakan'])){
                                        $id_mitra_tindakan_detail= $DataTindakan['id_mitra_tindakan'];
                                        $jasa_dokter_detail=$DataTindakan['jasa_dokter'];
                                        $TotalBagiHasil=$jasa_dokter_detail+$TotalBagiHasil;
                                        $JumlahBagiHasilRp="Rp " . number_format($jasa_dokter_detail,0,',','.');
                                    }else{
                                        $id_mitra_tindakan_detail=0;
                                        $jasa_dokter_detail="0";
                                        $TotalBagiHasil=$jasa_dokter_detail+$TotalBagiHasil;
                                        $JumlahBagiHasilRp="Rp " . number_format($jasa_dokter_detail,0,',','.');
                                    }
                                    echo '<tr>';
                                    echo '  <td class="text-center">'.$NomorDokter.'.'.$NomorRincian.'</td>';
                                    echo '  <td class="text-left">'.$datetime_kunjungan.'</td>';
                                    echo '  <td class="text-left">'.$nama_pasien.'</td>';
                                    echo '  <td class="text-left">'.$nama_tindakan.'</td>';
                                    echo '  <td class="text-left">'.$JumlahRp.'</td>';
                                    echo '  <td class="text-left">'.$JumlahBagiHasilRp.'</td>';
                                    echo '</tr>';
                                }
                            }
                        }
                        $JumlahKomisiRp = "Rp " . number_format($TotalBagiHasil,0,',','.');
                        echo '<tr>';
                        echo '  <td class="text-left"></td>';
                        echo '  <td class="text-left" colspan="4">VOLUME KOMISI</td>';
                        echo '  <td class="text-left">'.$JumlahKomisiRp.'</td>';
                        echo '</tr>';
                        $NomorDokter++;
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php 
    }}}
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;
?>