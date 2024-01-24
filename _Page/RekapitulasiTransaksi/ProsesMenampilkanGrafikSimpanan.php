<?php
    include "../../_Config/Connection.php";
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
            $Transaksi [] = array($DataTransaksi, $Frekuensi);
            $data [] = array(
                'x' => $Waktu,
                'y' => $Transaksi
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
                $Transaksi [] = array($DataTransaksi, $Frekuensi);
                $data [] = array(
                    'x' => $Waktu,
                    'y' => $Transaksi
                );
            }
        }else{
            
        }
    }
    $json =json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents("GrafikSimpanan.json", $json)){
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