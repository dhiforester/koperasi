<?php
    include "../../_Config/Connection.php";
    date_default_timezone_set('Asia/Jakarta');
    if(!empty($_POST['DataSet'])){
        if(!empty($_POST['Periode'])){
            $Dataset=$_POST['DataSet'];
            $Periode=$_POST['Periode'];
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
            if($Dataset=="Log Aktivitas"){
                if($Periode=="Tahun"){
                    $FileName="LogAktivitasTahun.json";
                }else{
                    $FileName="LogAktivitasBulan.json";
                }
                $Databasename="log";
                $KolomWaku="datetime_log";
            }else{
                if($Dataset=="Akses"){
                    if($Periode=="Tahun"){
                        $FileName="AksesTahun.json";
                    }else{
                        $FileName="AksesBulan.json";
                    }
                    $Databasename="akses";
                    $KolomWaku="datetime_daftar";
                }else{
                    if($Dataset=="Dukungan IT"){
                        if($Periode=="Tahun"){
                            $FileName="DukunganTahun.json";
                        }else{
                            $FileName="DukunganBulan.json";
                        }
                        $Databasename="dukungan";
                        $KolomWaku="tanggal_request";
                    }else{
                        if($Dataset=="Agenda"){
                            if($Periode=="Tahun"){
                                $FileName="AgendaTahun.json";
                            }else{
                                $FileName="AgendaBulan.json";
                            }
                            $Databasename="agenda";
                            $KolomWaku="tanggal";
                        }else{
                            if($Dataset=="Kegiatan"){
                                if($Periode=="Tahun"){
                                    $FileName="KegiatanTahun.json";
                                }else{
                                    $FileName="KegiatanBulan.json";
                                }
                                $Databasename="event";
                                $KolomWaku="tanggal_mulai";
                            }else{
                                if($Dataset=="Tamplate"){
                                    if($Periode=="Tahun"){
                                        $FileName="TamplateTahun.json";
                                    }else{
                                        $FileName="TamplateBulan.json";
                                    }
                                    $Databasename="tamplate";
                                    $KolomWaku="updatetime";
                                }else{
                                    if($Dataset=="Survey"){
                                        if($Periode=="Tahun"){
                                            $FileName="SurveyTahun.json";
                                        }else{
                                            $FileName="SurveyBulan.json";
                                        }
                                        $Databasename="survey";
                                        $KolomWaku="mulai_survey";
                                    }else{
                                        if($Dataset=="Waktu Henti"){
                                            if($Periode=="Tahun"){
                                                $FileName="WaktuHentiTahun.json";
                                            }else{
                                                $FileName="WaktuHentiBulan.json";
                                            }
                                            $Databasename="waktu_henti";
                                            $KolomWaku="tanggal_mulai";
                                        }else{
                                            if($Dataset=="Inventaris"){
                                                if($Periode=="Tahun"){
                                                    $FileName="InventarisTahun.json";
                                                }else{
                                                    $FileName="InventarisBulan.json";
                                                }
                                                $Databasename="inventaris";
                                                $KolomWaku="tanggal_input";
                                            }else{
                                                if($Dataset=="Riwayat Kerja"){
                                                    if($Periode=="Tahun"){
                                                        $FileName="RiwayatKerjaTahun.json";
                                                    }else{
                                                        $FileName="RiwayatKerjaBulan.json";
                                                    }
                                                    $Databasename="riwayat_kerja";
                                                    $KolomWaku="tanggal";
                                                }else{
                                    
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
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
                    $Waktu = date('F Y', $Waktu);
                    $Jumlah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM $Databasename WHERE $KolomWaku like '%$WaktuPencarian%'"));
                    $data [] = array(
                        'x' => $Waktu,
                        'y' => $Jumlah
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
                        $WaktuFormating="$tahun-$i-$i";
                        $Waktu = strtotime($WaktuFormating);
                        $Waktu = date('d', $Waktu);
                        $Jumlah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM $Databasename WHERE $KolomWaku like '%$WaktuPencarian%'"));
                        $data [] = array(
                            'x' => $i,
                            'y' => $Jumlah
                        );
                    }
                }else{
                    
                }
            }
        }
    }
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($FileName, $jsonfile);
?>