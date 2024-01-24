<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
?>
<table class="table table-responsive table-bordered table-hover">
    <thead>
        <tr>
            <th><b>No</b></th>
            <th><b>Periode</b></th>
            <th><b>Pinjaman</b></th>
            <th><b>Angsuran (Pokok)</b></th>
            <th><b>Jasa</b></th>
            <th><b>Angsuran</b></th>
            <th><b>Sisa</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(empty($_POST['tanggal_pinjaman'])){
                echo '<tr><td colspan="7">Isi Tanggal Pinjaman Terlebih Dulu</td></tr>';
            }else{
                if(empty($_POST['jumlah_pinjaman'])){
                    echo '<tr><td colspan="7">Isi Jumlah Pinjaman Terlebih Dulu</td></tr>';
                }else{
                    $tanggal_pinjaman=$_POST['tanggal_pinjaman'];
                    $jumlah_pinjaman=$_POST['jumlah_pinjaman'];
                    if(empty($_POST['nilai_angsuran'])){
                        $nilai_angsuran=0;
                    }else{
                        $nilai_angsuran=$_POST['nilai_angsuran'];
                    }
                    if(empty($_POST['periode_angsuran'])){
                        $periode_angsuran=0;
                    }else{
                        $periode_angsuran=$_POST['periode_angsuran'];
                    }
                    if(empty($_POST['persen_jasa'])){
                        $persen_jasa="0";
                    }else{
                        $persen_jasa=$_POST['persen_jasa'];
                    }
                    $jumlah_pinjaman= str_replace(".", "", $jumlah_pinjaman);
                    $nilai_angsuran= str_replace(".", "", $nilai_angsuran);
                    $periode_angsuran= str_replace(".", "", $periode_angsuran);
                    $persen_jasa= str_replace(".", "", $persen_jasa);
                    if(!preg_match("/^[0-9]*$/", $jumlah_pinjaman)){
                        echo '<tr><td colspan="7">Jumlah Pinjaman Hanya Boleh Angka</td></tr>'; 
                    }else{
                        if(!preg_match("/^[0-9]*$/", $nilai_angsuran)){
                            echo '<tr><td colspan="7">Nilai Angsuran Hanya Boleh Angka</td></tr>'; 
                        }else{
                            if(!preg_match("/^[0-9]*$/", $periode_angsuran)){
                                echo '<tr><td colspan="7">Periode Angsuran Hanya Boleh Angka</td></tr>'; 
                            }else{
                                if(!preg_match("/^[0-9]*$/", $persen_jasa)){
                                    echo '<tr><td colspan="7">Periode Jasa Hanya Boleh Angka</td></tr>'; 
                                }else{
                                    if(empty($nilai_angsuran)&&empty($periode_angsuran)&&empty($persen_jasa)){
                                        echo '<tr><td colspan="7">Isi Nilai Angsuran atau Periode Angsuran atau Persen jasa Terlebih Dulu</td></tr>';
                                    }else{
                                        if(empty($nilai_angsuran)&&empty($periode_angsuran)){
                                            echo '<tr><td colspan="7">Isi Periode Angsuran atau Persen jasa Terlebih Dulu</td></tr>';
                                        }else{
                                            $TotalAngsuranPokok=0;
                                            $TotalJasa=0;
                                            $TotalAngsuranBruto=0;
                                            if(empty($nilai_angsuran)){
                                                //Simulasi berdasarkan periode angsuran
                                                $SisaPinjaman=$jumlah_pinjaman;
                                                for ( $i=1; $i<=$periode_angsuran; $i++ ){
                                                    $AngsuranPokok=$jumlah_pinjaman/$periode_angsuran;
                                                    $AngsuranPokokRp = "Rp " . number_format($AngsuranPokok,0,',','.');
                                                    $NominalJasa=($persen_jasa/100)*$jumlah_pinjaman;
                                                    $NominalJasaRp = "Rp " . number_format($NominalJasa,0,',','.');
                                                    $AngsuranTotal=$NominalJasa+$AngsuranPokok;
                                                    $AngsuranTotalRp = "Rp " . number_format($AngsuranTotal,0,',','.');
                                                    $GetPeriodePinjaman=date('d/m/Y', strtotime('+'.$i.' month', strtotime($tanggal_pinjaman))); 
                                                    //Pinjaman RP
                                                    $jumlah_pinjaman_rp = "Rp " . number_format($jumlah_pinjaman,0,',','.');
                                                    $SisaPinjaman=$SisaPinjaman-$AngsuranPokok;
                                                    $SisaPinjamanRp = "Rp " . number_format($SisaPinjaman,0,',','.');
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">'.$i.'</td>';
                                                    echo '  <td class="text-left">'.$GetPeriodePinjaman.'</td>';
                                                    echo '  <td class="text-right">'.$jumlah_pinjaman_rp.'</td>';
                                                    echo '  <td class="text-right">'.$AngsuranPokokRp.'</td>';
                                                    echo '  <td class="text-right">'.$NominalJasaRp.' ('.$persen_jasa.'%)</td>';
                                                    echo '  <td class="text-right">'.$AngsuranTotalRp.'</td>';
                                                    echo '  <td class="text-right">'.$SisaPinjamanRp.'</td>';
                                                    echo '';
                                                    echo '</tr>';
                                                    $TotalAngsuranPokok=$TotalAngsuranPokok+$AngsuranPokok;
                                                    $TotalJasa=$TotalJasa+$NominalJasa;
                                                    $TotalAngsuranBruto=$TotalAngsuranBruto+$AngsuranTotal;
                                                }
                                            }else{
                                                //Simulasi berdasarkan Nilai angsuran
                                                //Mencari Periode Angsuran
                                                $NominalJasa=($persen_jasa/100)*$jumlah_pinjaman;
                                                if($nilai_angsuran<=$NominalJasa){
                                                    echo '<tr><td colspan="7">Nilai Angsuran Tidak Boleh Lebih Kecil/sama dengan nominal jasa</td></tr>';
                                                }else{
                                                    $periode_angsuran=$jumlah_pinjaman/($nilai_angsuran-$NominalJasa);
                                                    $periode_angsuran=ceil($periode_angsuran);
                                                    $SisaPinjaman=$jumlah_pinjaman;
                                                    for ( $i=1; $i<=$periode_angsuran; $i++ ){
                                                        $AngsuranPokok=$nilai_angsuran-$NominalJasa;
                                                        $AngsuranPokokRp = "Rp " . number_format($AngsuranPokok,0,',','.');
                                                        $NominalJasa=($persen_jasa/100)*$jumlah_pinjaman;
                                                        $NominalJasaRp = "Rp " . number_format($NominalJasa,0,',','.');
                                                        $AngsuranTotal=$NominalJasa+$AngsuranPokok;
                                                        if($SisaPinjaman<$AngsuranTotal){
                                                            $AngsuranTotal=$SisaPinjaman+$NominalJasa;
                                                            $AngsuranPokok=$SisaPinjaman;
                                                            $AngsuranPokokRp = "Rp " . number_format($AngsuranPokok,0,',','.');
                                                            $SisaPinjaman=$SisaPinjaman-$AngsuranPokok;
                                                            $SisaPinjamanRp = "Rp " . number_format($SisaPinjaman,0,',','.');
                                                        }else{
                                                            $AngsuranTotal=$NominalJasa+$AngsuranPokok;
                                                            $SisaPinjaman=$SisaPinjaman-$AngsuranPokok;
                                                            $SisaPinjamanRp = "Rp " . number_format($SisaPinjaman,0,',','.');
                                                        }
                                                        $AngsuranTotalRp = "Rp " . number_format($AngsuranTotal,0,',','.');
                                                        $GetPeriodePinjaman=date('d/m/Y', strtotime('+'.$i.' month', strtotime($tanggal_pinjaman))); 
                                                        //Pinjaman RP
                                                        $jumlah_pinjaman_rp = "Rp " . number_format($jumlah_pinjaman,0,',','.');
                                                        
                                                        echo '<tr>';
                                                        echo '  <td class="text-center">'.$i.'</td>';
                                                        echo '  <td class="text-left">'.$GetPeriodePinjaman.'</td>';
                                                        echo '  <td class="text-right">'.$jumlah_pinjaman_rp.'</td>';
                                                        echo '  <td class="text-right">'.$AngsuranPokokRp.'</td>';
                                                        echo '  <td class="text-right">'.$NominalJasaRp.' ('.$persen_jasa.'%)</td>';
                                                        echo '  <td class="text-right">'.$AngsuranTotalRp.'</td>';
                                                        echo '  <td class="text-right">'.$SisaPinjamanRp.'</td>';
                                                        echo '';
                                                        echo '</tr>';
                                                        $TotalAngsuranPokok=$TotalAngsuranPokok+$AngsuranPokok;
                                                        $TotalJasa=$TotalJasa+$NominalJasa;
                                                        $TotalAngsuranBruto=$TotalAngsuranBruto+$AngsuranTotal;
                                                    }
                                                }
                                            }
                                            $TotalAngsuranPokokRp = "Rp " . number_format($TotalAngsuranPokok,0,',','.');
                                            $TotalJasaRp = "Rp " . number_format($TotalJasa,0,',','.');
                                            $TotalAngsuranBrutoRp = "Rp " . number_format($TotalAngsuranBruto,0,',','.');
                                            echo '<tr>';
                                            echo '  <td class="text-center" colspan="3">JUMLAH TOTAL</td>';
                                            echo '  <td class="text-right">'.$TotalAngsuranPokokRp.'</td>';
                                            echo '  <td class="text-right">'.$TotalJasaRp.'</td>';
                                            echo '  <td class="text-right">'.$TotalAngsuranBrutoRp.'</td>';
                                            echo '  <td class="text-right">0</td>';
                                            echo '';
                                            echo '</tr>';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        ?>
    </tbody>
</table>
