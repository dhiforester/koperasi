<?php
    if(empty($_GET['periode1'])){
        echo "Periode Awal Tidak Boleh Kosong!";
    }else{
        if(empty($_GET['periode2'])){
            echo "Periode Akhir Tidak Boleh Kosong!";
        }else{
            $periode1=$_GET['periode1'];
            $periode2=$_GET['periode2'];
            include '../../_Config/Connection.php';
            include '../../vendor/autoload.php';
?>
            <html>
                <head>
                    <style type="text/css">
                        @page {
                            margin-top: 1cm;
                            margin-bottom: 1cm;
                            margin-left: 1cm;
                            margin-right: 1cm;
                        }
                        body {
                            background-color: #FFF;
                            font-family: 11 px;
                            margin-top: 30 mm;
                            margin-bottom:  30 mm;
                            margin-left:  30 mm;
                            margin-right: 30 mm;
                        }
                        table.data tr td {
                            border-collapse:collapse;
                            border: 0.5px solid #666;
                            font-size: 12px;
                            font: arial;
                            color:#333;
                            border-spacing: 0px;
                            padding: 4px;
                        }
                    </style>
                </head>
                <body>
                    <table width="100%">
                        <tr>
                            <td align="center">
                                <b>NERACA SALDO</b><br>
                                Periode <?php echo "$periode1 - $periode2";?>
                            </td>
                        </tr>
                    </table>
                    <table class="data" width="100%" cellspacing="0">
                        <tr>
                            <td><b class="sub-title">No</b></td>
                            <td><b class="sub-title">Kode</b></td>
                            <td><b class="sub-title">Akun Perkiraan</b></td>
                            <td><b class="sub-title">SN</b></td>
                            <td><b class="sub-title">Debet</b></td>
                            <td><b class="sub-title">Kredit</b></td>
                            <td><b class="sub-title">Saldo</b></td>
                        </tr>
                        <?php
                            $no = 1;
                            //KONDISI PENGATURAN MASING FILTER
                            $query = mysqli_query($Conn, "SELECT*FROM akun_perkiraan ORDER BY kode ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                $id_perkiraan = $data['id_perkiraan'];
                                $kode_perkiraan = $data['kode'];
                                $nama_perkiraan = $data['nama'];
                                $level_perkiraan= $data['level'];
                                $saldo_normal= $data['saldo_normal'];
                                $status= $data['status'];
                                //WARNA TEXT
                                if($saldo_normal=='Kredit'){
                                    $LabelSaldo="<b class='text-danger'>K</b>";
                                }else{
                                    $LabelSaldo="<b class='text-info'>D</b>";
                                }
                                //menghitung jumlah anak
                                if($level_perkiraan=='1'){
                                    $jml_anak_akun="2";
                                }else{
                                    $jml_anak_akun = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE kd$level_perkiraan='$kode_perkiraan' AND level>'$level_perkiraan'"));
                                }
                                //Mengatur warna tabel
                                if($level_perkiraan=="1"){
                                    $ClassTabel="table-primary";
                                }else{
                                    if($level_perkiraan=="2"){
                                        $ClassTabel="table-info";
                                    }else{
                                        if($level_perkiraan=="3"){
                                            $ClassTabel="table-secondary";
                                        }else{
                                            $ClassTabel="table-light";
                                        }
                                    }
                                }
                            ?>
                                <tr class="table-light">
                                    <td><?php echo "$no";?></td>    
                                    <td class="" align="left">
                                        <?php 
                                            for ( $i = 1; $i<= $level_perkiraan; $i++ ){
                                                echo "&emsp;";
                                            }
                                            if(empty($jml_anak_akun)){
                                                echo "$kode_perkiraan";
                                            }else{
                                                echo "<b>$kode_perkiraan</b>";
                                            }
                                        ?>
                                    </td>
                                    <td class="">
                                        <?php 
                                            if(empty($jml_anak_akun)){
                                                echo "$nama_perkiraan";
                                            }else{
                                                echo "<b>$nama_perkiraan</b>";
                                            }
                                        ?>
                                    </td>
                                    <td class=""><?php echo "$LabelSaldo";?></td>
                                    <td class="text-right">
                                        <?php
                                            $JumlahDebet=0;
                                            //Araykan semua anak akun ini
                                            $QryAnak = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level_perkiraan='$kode_perkiraan'");
                                            while ($DataAnak = mysqli_fetch_array($QryAnak)) {
                                                $kodePerkiraanAnakAkun = $DataAnak['kode'];
                                                //Hitung Jumlah Debet nilai pada jurnal anak akun
                                                $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE kode_perkiraan='$kodePerkiraanAnakAkun' AND tanggal>='$periode1' AND tanggal<='$periode2' AND d_k='Debet'") or die(mysqli_error($Conn));
                                                $DataDebet = mysqli_fetch_array($QryDebet);
                                                if(empty($DataDebet['nilai'])){
                                                    $Debet="0";
                                                }else{
                                                    $Debet=$DataDebet['nilai'];
                                                }
                                                $JumlahDebet=$JumlahDebet+$Debet;
                                            }
                                            
                                            $JumlahDebetRp = "" . number_format($JumlahDebet,0,',','.');
                                            echo "$JumlahDebetRp";
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <?php
                                            $JumlahKredit="0";
                                            //Araykan semua anak akun ini
                                            $QryAnak = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level_perkiraan='$kode_perkiraan'");
                                            while ($DataAnak = mysqli_fetch_array($QryAnak)) {
                                                $kodePerkiraanAnakAkun = $DataAnak['kode'];
                                                //Hitung Jumlah Debet nilai pada jurnal anak akun
                                                $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE kode_perkiraan='$kodePerkiraanAnakAkun' AND tanggal>='$periode1' AND tanggal<='$periode2' AND d_k='Kredit'") or die(mysqli_error($Conn));
                                                $DataKredit = mysqli_fetch_array($QryKredit);
                                                if(empty($DataKredit['nilai'])){
                                                    $Kredit="0";
                                                }else{
                                                    $Kredit=$DataKredit['nilai'];
                                                }
                                                $JumlahKredit=$JumlahKredit+$Kredit;
                                            }
                                            
                                            $JumlahKreditRp = "" . number_format($JumlahKredit,0,',','.');
                                            echo "$JumlahKreditRp";
                                        ?>
                                    </td>
                                    <td class="text-right">
                                        <?php
                                            if($saldo_normal=="Debet"){
                                                $Saldo=$JumlahDebet-$JumlahKredit;
                                            }else{
                                                $Saldo=$JumlahKredit-$JumlahDebet;
                                            }
                                            $SaldoRp = "" . number_format($Saldo,0,',','.');
                                            echo "<dt>$SaldoRp</dt>";
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            $no++; }
                        ?>
                    </table>
                </body>
            </html>
<?php
        }
    }
?>