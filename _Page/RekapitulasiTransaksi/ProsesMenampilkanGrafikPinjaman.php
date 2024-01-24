<?php
    include "../../_Config/Connection.php";
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
    if($Periode=="Tahun"){
        $a=1;
        $b=12;
        for ( $i =$a; $i<=$b; $i++ ){
            //Zero pading
            $i=sprintf("%02d", $i);
            $WaktuPencarian="$Tahun-$i";
            $WaktuFormating="$Tahun-$i-01";
            $Waktu = strtotime($WaktuFormating);
            $Waktu = date('F', $Waktu);
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
            if($GrafikShow=="Pinjaman"){
                $JumlahTransaksi=$JumlahPinjaman;
            }else{
                if($GrafikShow=="Angsuran"){
                    $JumlahTransaksi=$JumlahAngsuran;
                }else{
                    if($GrafikShow=="Jasa"){
                        $JumlahTransaksi=$JumlahJasa;
                    }else{
                        if($GrafikShow=="Denda"){
                            $JumlahTransaksi=$JumlahDenda;
                        }else{
                            $JumlahTransaksi=0;
                        }
                    }
                }
            }
            $data [] = array(
                'x' => $Waktu,
                'y' => $JumlahTransaksi
            );
        }
    }else{
        if($Periode=="Bulanan"){
            $TahunBulan="$Tahun-$Bulan";
            $JumlahHari = cal_days_in_month(CAL_GREGORIAN, $Bulan, $Tahun);
            $a=1;
            $b=$JumlahHari;
            for ( $i =$a; $i<=$b; $i++ ){
                //Zero pading
                $i=sprintf("%02d", $i);
                $WaktuPencarian="$Tahun-$Bulan-$i";
                $WaktuFormating="$Tahun-$Bulan-$i";
                $Waktu = strtotime($WaktuFormating);
                $Waktu = date('d', $Waktu);
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
                if($GrafikShow=="Pinjaman"){
                    $JumlahTransaksi=$JumlahPinjaman;
                }else{
                    if($GrafikShow=="Angsuran"){
                        $JumlahTransaksi=$JumlahAngsuran;
                    }else{
                        if($GrafikShow=="Jasa"){
                            $JumlahTransaksi=$JumlahJasa;
                        }else{
                            if($GrafikShow=="Denda"){
                                $JumlahTransaksi=$JumlahDenda;
                            }else{
                                $JumlahTransaksi=0;
                            }
                        }
                    }
                }
                $data [] = array(
                    'x' => $Waktu,
                    'y' => $JumlahTransaksi
                );
            }
        }else{
            
        }
    }
    $json =json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents("GrafikPinjaman.json", $json)){
        echo '<small class="text-success" id="NotifikasiCreatJson">Success</small>';
    }else{
        echo '<small class="text-danger" id="">Gagal Membuat File JSON</small>';
    }
	// header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (10 * 60)));
	// header("Cache-Control: no-store, no-cache, must-revalidate");
	// header('Content-Type: application/json');
	// header('Pragma: no-chache');
	// header('Access-Control-Allow-Origin: *');
	// header('Access-Control-Allow-Credentials: true');
	// header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
	// header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept, Origin, x-token, token"); 
	// echo $json;
	// exit();
?>