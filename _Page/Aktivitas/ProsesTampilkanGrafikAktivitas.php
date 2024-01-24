<?php
    include "../../_Config/Connection.php";
    date_default_timezone_set('Asia/Jakarta');
    if(!empty($_POST['DataSet'])){
        $DataSet=$_POST['DataSet'];
    }else{
        $DataSet="";
    }
    if(!empty($_POST['DataValue'])){
        $DataValue=$_POST['DataValue'];
    }else{
        $DataValue="";
    }
    if(!empty($_POST['mode_waktu'])){
        $Periode=$_POST['mode_waktu'];
    }else{
        $Periode="Bulanan";
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
    if($Periode=="Tahunan"){
        $a=1;
        $b=12;
        for ( $i =$a; $i<=$b; $i++ ){
            //Zero pading
            $i=sprintf("%02d", $i);
            $WaktuPencarian="$tahun-$i";
            $WaktuFormating="$tahun-$i-01";
            $Waktu = strtotime($WaktuFormating);
            $Waktu = date('F Y', $Waktu);
            if(empty($DataSet)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE datetime_log like '%$WaktuPencarian%'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE (datetime_log like '%$WaktuPencarian%') AND ($DataSet like '%$DataValue%')"));
            }
            
            $data [] = array(
                'x' => $Waktu,
                'y' => $jml_data
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
                if(empty($DataSet)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE datetime_log like '%$WaktuPencarian%'"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE (datetime_log like '%$WaktuPencarian%') AND ($DataSet like '%$DataValue%')"));
                }
                $data [] = array(
                    'x' => $i,
                    'y' => $jml_data
                );
            }
        }else{
            
        }
    }
    $json =json_encode($data, JSON_PRETTY_PRINT);
    if (file_put_contents("GrafikAktivitas.json", $json)){
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