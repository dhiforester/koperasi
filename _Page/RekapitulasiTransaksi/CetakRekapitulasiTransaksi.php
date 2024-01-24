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
                    <?php echo "<b>$nama_mitra</b><br>"; ?>
                    Periode <?php echo "$periode1 - $periode2";?>
                </td>
            </tr>
        </table>
        <table class="data" width="100%" cellspacing="0">
            <tr>
                <td><b class="sub-title">No</b></td>
                <td><b class="sub-title">Tanggal</b></td>
                <td><b class="sub-title">Mitra</b></td>
                <td><b class="sub-title">Status</b></td>
                <td><b class="sub-title">Jumlah</b></td>
            </tr>
            <?php
                //Data Kategori Transaksi
                $NomorKategori = 1;
                $QryKategoriTransaksi = mysqli_query($Conn, "SELECT DISTINCT kategori FROM transaksi WHERE id_mitra='$id_mitra' AND tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY kategori ASC");
                while ($DataKategori = mysqli_fetch_array($QryKategoriTransaksi)) {
                    $kategori= $DataKategori['kategori'];
                    echo '<tr>';
                    echo '  <td class="text-left"><b>'.$NomorKategori.'.0</b></td>';
                    echo '  <td class="text-left" colspan="4"><b>Transaksi '.$kategori.'</b></td>';
                    echo '</tr>';
                    $NomorTransaksi = 1;
                    $JumlahTransaksi=0;
                    $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE kategori='$kategori' AND id_mitra='$id_mitra' AND tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY id_transaksi ASC");
                    while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                        $id_transaksi= $DataTransaksi['id_transaksi'];
                        $id_akses= $DataTransaksi['id_akses'];
                        $tanggal= $DataTransaksi['tanggal'];
                        $tagihan= $DataTransaksi['tagihan'];
                        $pembayaran= $DataTransaksi['pembayaran'];
                        $metode= $DataTransaksi['metode'];
                        $status= $DataTransaksi['status'];
                        $JumlahTransaksi=$JumlahTransaksi+$pembayaran;
                        $pembayaran = "Rp " . number_format($pembayaran,2,',','.');
                        $tagihan = "Rp " . number_format($tagihan,2,',','.');
                        //Buka data mitra
                        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                        $DataMitra = mysqli_fetch_array($QryMitra);
                        $nama_mitra= $DataMitra['nama_mitra'];
                        echo '<tr>';
                        echo '  <td class="text-center">'.$NomorKategori.'.'.$NomorTransaksi.'</td>';
                        echo '  <td class="text-left">'.$tanggal.'</td>';
                        echo '  <td class="text-left">'.$nama_mitra.'</td>';
                        echo '  <td class="text-left">'.$status.'</td>';
                        echo '  <td class="text-left">'.$pembayaran.'</td>';
                        echo '</tr>';
                        $NomorTransaksi++;
                    }
                    $JumlahTransaksiRp = "Rp " . number_format($JumlahTransaksi,2,',','.');
                    echo '<tr>';
                    echo '  <td class="text-left"></td>';
                    echo '  <td class="text-left" colspan="3">JUMLAH TOTAL</td>';
                    echo '  <td class="text-left">'.$JumlahTransaksiRp.'</td>';
                    echo '</tr>';
                    $NomorKategori++;
                }
            ?>
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