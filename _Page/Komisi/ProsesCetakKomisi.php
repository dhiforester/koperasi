<?php
    include '../../_Config/Connection.php';
    include '../../_Config/Session.php';
    include '../../vendor/autoload.php';
    if(empty($_POST['id_dokter'])){
        echo "ID Dokter Tidak Boleh Kosong!";
    }else{
        if(empty($_POST['periode'])){
            echo "Mode Filter Periode Tidak Boleh Kosong!";
        }else{
            if(empty($_POST['FormatCetak'])){
                echo "Format Cetak Tidak Boleh Kosong!";
            }else{
                $id_dokter=$_POST['id_dokter'];
                $periode=$_POST['periode'];
                $FormatCetak=$_POST['FormatCetak'];
                //Menangkap metode pembayaran
                if(empty($_POST['metode_pembayaran'])){
                    $MetodePembayaran="";
                }else{
                    $MetodePembayaran=$_POST['metode_pembayaran'];
                }
                //Menangkap status
                if(empty($_POST['status'])){
                    $StatusPencairan="";
                }else{
                    $StatusPencairan=$_POST['status'];
                }
                //Apabila periode adalah periode
                if($periode=="Periode"){
                    if(empty($_POST['periode1'])){
                        $periode1="";
                        $ValidasiPeriode="Tidak Valid";
                    }else{
                        if(empty($_POST['periode2'])){
                            $periode1="";
                            $periode2="";
                            $ValidasiPeriode="Tidak Valid";
                        }else{
                            $periode1=$_POST['periode1'];
                            $periode2=$_POST['periode2'];
                            $ValidasiPeriode="Valid";
                        }
                    }
                }else{
                    //Apabila periode adalah harian
                    if($periode=="Harian"){
                        if(empty($_POST['periode_hari'])){
                            $keyword="";
                            $ValidasiPeriode="Tidak Valid";
                        }else{
                            $keyword=$_POST['periode_hari'];
                            $ValidasiPeriode="Valid";
                        }
                    }else{
                        //Apabila periode adalah Bulanan
                        if($periode=="Bulanan"){
                            if(empty($_POST['tahun'])){
                                $tahun="";
                                $bulan="";
                                $keyword="";
                                $ValidasiPeriode="Tidak Valid";
                            }else{
                                if(empty($_POST['bulan'])){
                                    $tahun="";
                                    $bulan="";
                                    $keyword="";
                                    $ValidasiPeriode="Tidak Valid";
                                }else{
                                    $tahun=$_POST['tahun'];
                                    $bulan=$_POST['bulan'];
                                    $keyword="$tahun-$bulan";
                                    $ValidasiPeriode="Valid";
                                }
                            }
                        }else{
                            //Apabila periode adalah Tahunan
                            if($periode=="Tahunan"){
                                if(empty($_POST['tahun'])){
                                    $keyword="";
                                    $ValidasiPeriode="Tidak Valid";
                                }else{
                                    $keyword=$_POST['tahun'];
                                    $ValidasiPeriode="Valid";
                                }
                            }else{
                                $ValidasiPeriode="Tidak Valid";
                            }
                        }
                    }
                }
                if($ValidasiPeriode!=="Valid"){
                    echo "Periode Waktu harus Diisi!";
                }else{
                    if($FormatCetak=="PDF"){
                        $mpdf = new \Mpdf\Mpdf();
                        $nama_dokumen= "Pencairan-Komisi";
                        // $mpdf=new mPDF('utf-8', array($panjang_x,$lebar_y)); 
                        $html='<style>@page *{margin-top: 0px;}</style>'; 
                        //Beginning Buffer to save PHP variables and HTML tags
                        ob_start();
                    }else{
                        if($FormatCetak=="Excel"){
                            header("Content-type: application/vnd-ms-excel");
                            header("Content-Disposition: attachment; filename=Cetak-Pencairan-Komisi.xls");
                        }else{
    
                        }
                    }
                    if($MetodePembayaran==""){
                        if($StatusPencairan==""){
                            if($periode=="Periode"){
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND tanggal>'$periode1' AND tanggal<'$periode2'"));
                            }else{
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND tanggal like '%$keyword%'"));
                            }
                        }else{
                            if($periode=="Periode"){
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='$StatusPencairan' AND tanggal>'$periode1' AND tanggal<'$periode2'"));
                            }else{
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='$StatusPencairan' AND tanggal like '%$keyword%'"));
                            }
                        }
                    }else{
                        if($StatusPencairan==""){
                            if($periode=="Periode"){
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND tanggal>'$periode1' AND tanggal<'$periode2'"));
                            }else{
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND tanggal like '%$keyword%'"));
                            }
                        }else{
                            if($periode=="Periode"){
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND status='$StatusPencairan' AND tanggal>'$periode1' AND tanggal<'$periode2'"));
                            }else{
                                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND status='$StatusPencairan' AND tanggal like '%$keyword%'"));
                            }
                        }
                    }
                    
?>
<html>
    <head>
        <title>Laporan Laba Rugi</title>
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
                <td align="center"><b class="sub-title">Metode</b></td>
                <td align="center"><b class="sub-title">Status</b></td>
                <td align="center"><b class="sub-title">Jumlah</b></td>
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
                    $JumlahTotalPencairan=0;
                    //KONDISI PENGATURAN
                    if($MetodePembayaran==""){
                        if($StatusPencairan==""){
                            if($periode=="Periode"){
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND tanggal>'$periode1' AND tanggal<'$periode2'");
                            }else{
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND tanggal like '%$keyword%'");
                            }
                        }else{
                            if($periode=="Periode"){
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='$StatusPencairan' AND tanggal>'$periode1' AND tanggal<'$periode2'");
                            }else{
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='$StatusPencairan' AND tanggal like '%$keyword%'");
                            }
                        }
                    }else{
                        if($StatusPencairan==""){
                            if($periode=="Periode"){
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND tanggal>'$periode1' AND tanggal<'$periode2'");
                            }else{
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND tanggal like '%$keyword%'");
                            }
                        }else{
                            if($periode=="Periode"){
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND status='$StatusPencairan' AND tanggal>'$periode1' AND tanggal<'$periode2'");
                            }else{
                                $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND metode_pembayaran='$MetodePembayaran' AND status='$StatusPencairan' AND tanggal like '%$keyword%'");
                            }
                        }
                    }
                    
                    while ($data = mysqli_fetch_array($query)) {
                        $id_transaksi_pencairan= $data['id_transaksi_pencairan'];
                        $id_dokter= $data['id_dokter'];
                        $id_mitra= $data['id_mitra'];
                        $tanggal= $data['tanggal'];
                        $metode_pembayaran= $data['metode_pembayaran'];
                        $keterangan= $data['keterangan'];
                        $jumlah= $data['jumlah'];
                        $status= $data['status'];
                        $JumlahTotalPencairan=$JumlahTotalPencairan+$jumlah;
                        $JumlahPencairan = "Rp " . number_format($jumlah,0,',','.');
                ?>
                <tr>
                    <td align="center">
                        <?php echo "$no" ?>
                    </td>
                    <td class="text-left" align="left">
                        <?php echo "$tanggal" ?>
                    </td>
                    <td class="text-left" align="left">
                        <?php echo "$metode_pembayaran" ?>
                    </td>
                    <td class="text-left" align="left">
                        <?php echo "$status" ?>
                    </td>
                    <td class="text-left" align="right">
                        <?php echo "$JumlahPencairan" ?>
                    </td>
                </tr>
            <?php 
                        $no++; 
                    }
                }
                $JumlahTotalPencairanRp = "Rp " . number_format($JumlahTotalPencairan,0,',','.');
            ?>
                <tr>
                    <td colspan="4">
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