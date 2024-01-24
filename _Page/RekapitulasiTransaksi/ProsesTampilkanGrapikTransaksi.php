<?php
    include "../../_Config/Connection.php";
    date_default_timezone_set('Asia/Jakarta');
    if(!empty($_POST['KategoriTransaksi'])){
        $KategoriTransaksi=$_POST['KategoriTransaksi'];
    }else{
        $KategoriTransaksi="";
    }
    if(!empty($_POST['StatusStransaksi'])){
        $StatusStransaksi=$_POST['StatusStransaksi'];
    }else{
        $StatusStransaksi="";
    }
    if(!empty($_POST['Periode'])){
        $Periode=$_POST['Periode'];
    }else{
        $Periode="Tahun";
    }
    if(!empty($_POST['Tahun'])){
        $tahun=$_POST['Tahun'];
    }else{
        $tahun=date('Y');
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
            $WaktuPencarian="$tahun-$i";
            $WaktuFormating="$tahun-$i-01";
            $Waktu = strtotime($WaktuFormating);
            $Waktu = date('F', $Waktu);
            if(empty($KategoriTransaksi)){
                if(empty($StatusStransaksi)){
                    //Jumlah Transaksi
                    $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE tanggal like '%$WaktuPencarian%'"));
                    $DataTransaksi = $SumTransaksi['tagihan'];
                    $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                }else{
                    //Jumlah Transaksi
                    $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                    $DataTransaksi = $SumTransaksi['tagihan'];
                    $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                }
            }else{
                if(empty($StatusStransaksi)){
                    //Jumlah Transaksi
                    $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='$KategoriTransaksi' AND tanggal like '%$WaktuPencarian%'"));
                    $DataTransaksi = $SumTransaksi['tagihan'];
                    $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                }else{
                    //Jumlah Transaksi
                    $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='$KategoriTransaksi' AND status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                    $DataTransaksi = $SumTransaksi['tagihan'];
                    $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                }
            }
            
            $data [] = array(
                'x' => $Waktu,
                'y' => $DataTransaksi
            );
        }
    }else{
        if($Periode=="Bulanan"){
            $TahunBulan="$tahun-$Bulan";
            $JumlahHari = cal_days_in_month(CAL_GREGORIAN, $Bulan, $tahun);
            $a=1;
            $b=$JumlahHari;
            for ( $i =$a; $i<=$b; $i++ ){
                //Zero pading
                $i=sprintf("%02d", $i);
                $WaktuPencarian="$tahun-$Bulan-$i";
                $WaktuFormating="$tahun-$Bulan-$i";
                $Waktu = strtotime($WaktuFormating);
                $Waktu = date('d', $Waktu);
                if(empty($KategoriTransaksi)){
                    if(empty($StatusStransaksi)){
                        //Jumlah Transaksi
                        $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE tanggal like '%$WaktuPencarian%'"));
                        $DataTransaksi = $SumTransaksi['tagihan'];
                        $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                    }else{
                        //Jumlah Transaksi
                        $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                        $DataTransaksi = $SumTransaksi['tagihan'];
                        $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                    }
                }else{
                    if(empty($StatusStransaksi)){
                        //Jumlah Transaksi
                        $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='$KategoriTransaksi' AND tanggal like '%$WaktuPencarian%'"));
                        $DataTransaksi = $SumTransaksi['tagihan'];
                        $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                    }else{
                        //Jumlah Transaksi
                        $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='$KategoriTransaksi' AND status='$StatusStransaksi' AND tanggal like '%$WaktuPencarian%'"));
                        $DataTransaksi = $SumTransaksi['tagihan'];
                        $JumlahTransaksi = "" . number_format($DataTransaksi,0,',','.');
                    }
                }
                $data [] = array(
                    'x' => $i,
                    'y' => $DataTransaksi
                );
            }
        }else{
            
        }
    }
    $json =json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents("GrafikTransaksi.json", $json)){
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