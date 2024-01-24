<?php
    include '../../_Config/Connection.php';
    include '../../_Config/Session.php';
    include '../../vendor/autoload.php';
    if(empty($_POST['id_dokter'])){
        echo "ID Dokter Tidak Boleh Kosong!";
    }else{
        if(empty($_POST['periode1'])){
            echo "Mode Filter Periode Awal Tidak Boleh Kosong!";
        }else{
            if(empty($_POST['periode2'])){
                echo "Mode Filter Periode Akhir Tidak Boleh Kosong!";
            }else{
                if(empty($_POST['FormatCetak'])){
                    echo "Format Cetak Tidak Boleh Kosong!";
                }else{
                    $id_dokter=$_POST['id_dokter'];
                    $periode1=$_POST['periode1'];
                    $periode2=$_POST['periode2'];
                    $FormatCetak=$_POST['FormatCetak'];
                    if($FormatCetak=="PDF"){
                        $mpdf = new \Mpdf\Mpdf();
                        $nama_dokumen= "Jasa-Tindakan";
                        // $mpdf=new mPDF('utf-8', array($panjang_x,$lebar_y)); 
                        $html='<style>@page *{margin-top: 0px;}</style>'; 
                        //Beginning Buffer to save PHP variables and HTML tags
                        ob_start();
                    }else{
                        if($FormatCetak=="Excel"){
                            header("Content-type: application/vnd-ms-excel");
                            header("Content-Disposition: attachment; filename=Jasa-Tindakan.xls");
                        }else{
    
                        }
                    }
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pasien_kunjungan WHERE id_dokter='$id_dokter' AND datetime_kunjungan>='$periode1' AND datetime_kunjungan<='$periode2'"));
                    
?>
<html>
    <head>
        <title>Jasa Tindakan</title>
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
        <table class="data" width="100%" cellspacing="0">
            <tr>
                <td align="center"><b class="sub-title">No</b></td>
                <td align="center"><b class="sub-title">Tanggal</b></td>
                <td align="center"><b class="sub-title">Pasien</b></td>
                <td align="center"><b class="sub-title">Tindakan</b></td>
                <td align="center"><b class="sub-title">Volume</b></td>
                <td align="center"><b class="sub-title">Komisi</b></td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="5" class="text-center">';
                    echo '      <span class="text-danger">Belum Ada Data Pencairan</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    $TotalBagiHasil=0;
                    $QryKunjungan = mysqli_query($Conn, "SELECT * FROM pasien_kunjungan WHERE id_dokter='$id_dokter' AND datetime_kunjungan>='$periode1' AND datetime_kunjungan<='$periode2' ORDER BY id_kunjungan ASC");
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
                                    $id_transaksi_rincian= $DataRincian['id_transaksi_rincian'];
                                    $id_mitra_tindakan= $DataRincian['id_mitra_tindakan'];
                                    $nama_tindakan= $DataRincian['nama_tindakan'];
                                    $jumlah= $DataRincian['jumlah'];
                                    $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
                                    $JumlahKomisi =0;
                                    //Membuka jumlah komisi
                                    $QryTindakan=mysqli_query($Conn,"SELECT * FROM mitra_tindakan WHERE id_mitra_tindakan='$id_mitra_tindakan'")or die(mysqli_error($Conn));
                                    $DataTindakan=mysqli_fetch_array($QryTindakan);
                                    $id_mitra_tindakan_detail= $DataTindakan['id_mitra_tindakan'];
                                    $jasa_dokter_detail=$DataTindakan['jasa_dokter'];
                                    $TotalBagiHasil=$jasa_dokter_detail+$TotalBagiHasil;
                                    $JumlahBagiHasilRp="Rp " . number_format($jasa_dokter_detail,0,',','.');
            ?>
                <tr>
                    <td align="center">
                        <?php echo "$no" ?>
                    </td>
                    <td class="text-left" align="left">
                        <?php echo "$datetime_kunjungan" ?>
                    </td>
                    <td class="text-left" align="left">
                        <?php echo "$nama_pasien" ?>
                    </td>
                    <td class="text-left" align="left">
                        <?php echo "$nama_tindakan" ?>
                    </td>
                    <td class="text-left" align="right">
                        <?php echo "$JumlahRp" ?>
                    </td>
                    <td class="text-left" align="right">
                        <?php echo "$JumlahBagiHasilRp" ?>
                    </td>
                </tr>
            <?php 
                                $no++; 
                            }
                        }
                    }
                }
                $JumlahTotalPencairanRp = "Rp " . number_format($TotalBagiHasil,0,',','.');
            ?>
                <tr>
                    <td colspan="5">
                        JUMLAH TOTAL
                    </td>
                    <td class="text-left" align="right">
                        <?php echo "$JumlahTotalPencairanRp" ?>
                    </td>
                </tr>
        </table>
    </body>
</html>
<?php 
    }}}}

    if($FormatCetak=="PDF"){
        $html = ob_get_contents();
        ob_end_clean();
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->Output($nama_dokumen.".pdf" ,'I');
        exit;
    }
?>