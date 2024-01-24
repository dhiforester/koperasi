<?php
    if(empty($_GET['periode1'])){
        echo "Periode Awal Tidak Boleh Kosong!";
    }else{
        if(empty($_GET['periode2'])){
            echo "Periode Akhir Tidak Boleh Kosong!";
        }else{
            if(empty($_GET['pemasukan'])){
                echo "Akun pemasukan Tidak Boleh Kosong!";
            }else{
                if(empty($_GET['pengeluaran'])){
                    echo "Akun Pengeluaran Tidak Boleh Kosong!";
                }else{
                    $periode1=$_GET['periode1'];
                    $periode2=$_GET['periode2'];
                    $pemasukan=$_GET['pemasukan'];
                    $pengeluaran=$_GET['pengeluaran'];
                    include '../../_Config/Connection.php';
                    include '../../_Config/Session.php';
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
        <table width="100%">
            <tr>
                <td align="center">
                    <h3>
                        <b>Laporan Laba-Rugi</b>
                    </h3>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <?php echo "$periode1 - $periode2";?>
                </td>
            </tr>
        </table>
        <table class="data" width="100%" cellspacing="0">
            <tr>
                <td><b class="sub-title">No</b></td>
                <td><b class="sub-title">Tanggal</b></td>
                <td><b class="sub-title">Kode Akun</b></td>
                <td><b class="sub-title">Transaksi</b></td>
                <td><b class="sub-title">Jumlah</b></td>
            </tr>
            <tr>
                <td><b>A.</b></td>
                <td colspan="4"><b>Transaksi Pemasukan</b></td>
            </tr>
            <?php
                //Data pemasukan
                $NoPemasukan = 1;
                $JumlahPemasukan=0;
                //KONDISI PENGATURAN MASING FILTER
                $QryJurnal = mysqli_query($Conn, "SELECT*FROM jurnal WHERE (kode_perkiraan like '%$pemasukan%') AND (tanggal>='$periode1') AND (tanggal<='$periode2') ORDER BY id_jurnal DESC");
                while ($DataJurnal = mysqli_fetch_array($QryJurnal)) {
                    $id_jurnal= $DataJurnal['id_jurnal'];
                    $id_perkiraan= $DataJurnal['id_perkiraan'];
                    $tanggal= $DataJurnal['tanggal'];
                    $kode_perkiraan= $DataJurnal['kode_perkiraan'];
                    $nama_perkiraan= $DataJurnal['nama_perkiraan'];
                    $d_k= $DataJurnal['d_k'];
                    $nilai= $DataJurnal['nilai'];
                    $NominalRp = "Rp " . number_format($nilai,0,',','.');
                    if(empty($DataJurnal['id_transaksi'])){
                        if(empty($DataJurnal['id_simpanan'])){
                            if(empty($DataJurnal['id_pinjaman_angsuran'])){
                                if(empty($DataJurnal['id_pinjaman'])){
                                    if(empty($DataJurnal['id_shu_session'])){
                                        $LabelTransaksi="<span class='text-danger'>None</span>";
                                    }else{
                                        $id_shu_session = $DataJurnal['id_shu_session'];
                                        //buka SHU
                                        $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                        $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                        $sesi_shu= $DatabagiHasil['sesi_shu'];
                                        $LabelTransaksi="<span class='text-success'>Bagi Hasil $sesi_shu ID.$id_shu_session</span>";
                                    }
                                }else{
                                    $id_pinjaman = $DataJurnal['id_pinjaman'];
                                    //buka pinjaman
                                    $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                    $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                    $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                    $LabelTransaksi="<span class='text-success'>Pinjaman $tanggal_pinjaman ID.$id_pinjaman</span>";
                                }
                            }else{
                                $id_pinjaman_angsuran = $DataJurnal['id_pinjaman_angsuran'];
                                //buka Angsuran
                                $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                                $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                $LabelTransaksi="<span class='text-success'>Angsuran $KategoriTransaksi ID.$id_pinjaman_angsuran</span>";
                            }
                        }else{
                            $id_simpanan = $DataJurnal['id_simpanan'];
                            //buka Simpanan
                            $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                            $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                            $KategoriTransaksi= $DataSimpanan['kategori'];
                            $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                        }
                    }else{
                        $id_transaksi = $DataJurnal['id_transaksi'];
                        //buka Transaksi
                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                        $KategoriTransaksi= $DataTransaksi['kategori'];
                        $LabelTransaksi="<span class='text-success'>Tansaksi $KategoriTransaksi ID.$id_transaksi</span>";
                    }
                    $JumlahPemasukan=$JumlahPemasukan+$nilai;
                    echo '<tr>';
                    echo '  <td class="text-center">A.'.$NoPemasukan.'</td>';
                    echo '  <td class="text-left">'.$tanggal.'</td>';
                    echo '  <td class="text-left">'.$kode_perkiraan.' '.$nama_perkiraan.'</td>';
                    echo '  <td class="text-left">'.$LabelTransaksi.'</td>';
                    echo '  <td class="text-right">'.$NominalRp.'</td>';
                    echo '</tr>';
                    $NoPemasukan++;
                }
            ?>
            <tr>
                <td><b>B.</b></td>
                <td colspan="4"><b>Transaksi Pengeluaran</b></td>
            </tr>
            <?php
                //Data Pengeluaran
                $NoPengeluaran = 1;
                $JumlahPengeluaran=0;
                //KONDISI PENGATURAN MASING FILTER
                $QryJurnal = mysqli_query($Conn, "SELECT*FROM jurnal WHERE (kode_perkiraan like '%$pengeluaran%') AND (tanggal>='$periode1') AND (tanggal<='$periode2') ORDER BY id_jurnal DESC");
                while ($DataJurnal = mysqli_fetch_array($QryJurnal)) {
                    $id_jurnal= $DataJurnal['id_jurnal'];
                    $id_perkiraan= $DataJurnal['id_perkiraan'];
                    $tanggal= $DataJurnal['tanggal'];
                    $kode_perkiraan= $DataJurnal['kode_perkiraan'];
                    $nama_perkiraan= $DataJurnal['nama_perkiraan'];
                    $d_k= $DataJurnal['d_k'];
                    $nilai= $DataJurnal['nilai'];
                    $NominalRp = "Rp " . number_format($nilai,0,',','.');
                    if(empty($DataJurnal['id_transaksi'])){
                        if(empty($DataJurnal['id_simpanan'])){
                            if(empty($DataJurnal['id_pinjaman_angsuran'])){
                                if(empty($DataJurnal['id_pinjaman'])){
                                    if(empty($DataJurnal['id_shu_session'])){
                                        $LabelTransaksi="<span class='text-danger'>None</span>";
                                    }else{
                                        $id_shu_session = $DataJurnal['id_shu_session'];
                                        //buka SHU
                                        $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                        $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                        $sesi_shu= $DatabagiHasil['sesi_shu'];
                                        $LabelTransaksi="<span class='text-success'>Bagi Hasil $sesi_shu ID.$id_shu_session</span>";
                                    }
                                }else{
                                    $id_pinjaman = $DataJurnal['id_pinjaman'];
                                    //buka pinjaman
                                    $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                    $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                    $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                    $LabelTransaksi="<span class='text-success'>Pinjaman $tanggal_pinjaman ID.$id_pinjaman</span>";
                                }
                            }else{
                                $id_pinjaman_angsuran = $DataJurnal['id_pinjaman_angsuran'];
                                //buka Angsuran
                                $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                                $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                $LabelTransaksi="<span class='text-success'>Angsuran $KategoriTransaksi ID.$id_pinjaman_angsuran</span>";
                            }
                        }else{
                            $id_simpanan = $DataJurnal['id_simpanan'];
                            //buka Simpanan
                            $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                            $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                            $KategoriTransaksi= $DataSimpanan['kategori'];
                            $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                        }
                    }else{
                        $id_transaksi = $DataJurnal['id_transaksi'];
                        //buka Transaksi
                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                        $KategoriTransaksi= $DataTransaksi['kategori'];
                        $LabelTransaksi="<span class='text-success'>Tansaksi $KategoriTransaksi ID.$id_transaksi</span>";
                    }
                    $JumlahPengeluaran=$JumlahPengeluaran+$nilai;
                    echo '<tr>';
                    echo '  <td class="text-center">A.'.$NoPengeluaran.'</td>';
                    echo '  <td class="text-left">'.$tanggal.'</td>';
                    echo '  <td class="text-left">'.$kode_perkiraan.' '.$nama_perkiraan.'</td>';
                    echo '  <td class="text-left">'.$LabelTransaksi.'</td>';
                    echo '  <td class="text-right">'.$NominalRp.'</td>';
                    echo '</tr>';
                    $NoPengeluaran++;
                }
                $JumlahPengeluaranRp = "Rp " . number_format($JumlahPengeluaran,0,',','.');
                $JumlahPemasukanRp = "Rp " . number_format($JumlahPemasukan,0,',','.');
                $LabaRugi=$JumlahPemasukan-$JumlahPengeluaran;
                $LabaRugiRp = "Rp " . number_format($LabaRugi,0,',','.');
                echo '<tr>';
                echo '  <td class="text-center"></td>';
                echo '  <td class="text-left" colspan="3"><b>JUMLAH PEMASUKAN</b></td>';
                echo '  <td class="text-right"><b>'.$JumlahPemasukanRp.'</b></td>';
                echo '</tr>';
                echo '<tr>';
                echo '  <td class="text-center"></td>';
                echo '  <td class="text-left" colspan="3"><b>JUMLAH PENGELUARAN</b></td>';
                echo '  <td class="text-right"><b>'.$JumlahPengeluaranRp.'</b></td>';
                echo '</tr>';
                echo '<tr>';
                echo '  <td class="text-center"></td>';
                echo '  <td class="text-left" colspan="3"><b>LABA/RUGI</b></td>';
                echo '  <td class="text-right"><b>'.$LabaRugiRp.'</b></td>';
                echo '</tr>';
            ?>
        </table>
    </body>
</html>
<?php 
                }
            }
        }
    }
?>