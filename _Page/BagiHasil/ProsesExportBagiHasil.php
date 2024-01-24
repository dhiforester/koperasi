<?php 
    //koneksi dan error
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session"));
    if(empty($jml_data)){
        echo "Tidak ada data bagi hasil yang dapat di export";
    }else{  
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=BagiHasil.xls");
?> 
    <html>
        <head>
                <style type="text/css">
                    table tr td {
                        border: 1px solid #666;
                        font-size:11px;
                        color:#333;
                        border-spacing: 0px;
                        padding: 4px;
                    }
                </style>
        </head>
        <body>
            <table>
                <tr>
                    <td align="center">
                        <b>No</b>
                    </td>
                    <td align="center">
                        <b>Nama Sessi</b>
                    </td>
                    <td align="center">
                        <b>Tanggal</b>
                    </td>
                    <td align="center">
                        <b>Modal Anggota</b>
                    </td>
                    <td align="center">
                        <b>Penjualan</b>
                    </td>
                    <td align="center">
                        <b>Pinjaman</b>
                    </td>
                    <td align="center">
                        <b>Jasa Modal</b>
                    </td>
                    <td align="center">
                        <b>Jasa Penjualan</b>
                    </td>
                    <td align="center">
                        <b>Jasa Pinjaman</b>
                    </td>
                    <td align="center">
                        <b>Alokasi</b>
                    </td>
                    <td align="center">
                        <b>Status</b>
                    </td>
                </tr>
                <?php
                    $no = 1;
                    //Menampilkan Data
                    $query = mysqli_query($Conn, "SELECT*FROM shu_session");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_shu_session= $data['id_shu_session'];
                        $sesi_shu= $data['sesi_shu'];
                        $periode_hitung1= $data['periode_hitung1'];
                        $periode_hitung2= $data['periode_hitung2'];
                        $modal_anggota= $data['modal_anggota'];
                        $penjualan= $data['penjualan'];
                        $pinjaman= $data['pinjaman'];
                        $jasa_modal_anggota= $data['jasa_modal_anggota'];
                        $laba_penjualan= $data['laba_penjualan'];
                        $jasa_pinjaman= $data['jasa_pinjaman'];
                        $persen_usaha= $data['persen_usaha'];
                        $persen_modal= $data['persen_modal'];
                        $persen_pinjaman= $data['persen_pinjaman'];
                        $alokasi_hitung= $data['alokasi_hitung'];
                        $alokasi_nyata= $data['alokasi_nyata'];
                        $status= $data['status'];
                        $modal_anggota = "" . number_format($modal_anggota,0,',','.');
                        $penjualan = "" . number_format($penjualan,0,',','.');
                        $pinjaman_rp = "" . number_format($pinjaman,0,',','.');
                        $jasa_modal_anggota_rp = "" . number_format($jasa_modal_anggota,0,',','.');
                        $laba_penjualan_rp = "" . number_format($laba_penjualan,0,',','.');
                        $jasa_pinjaman_rp = "" . number_format($jasa_pinjaman,0,',','.');
                        $persen_usaha_rp = "" . number_format($persen_usaha,0,',','.');
                        $persen_usaha_rp = "" . number_format($persen_usaha,0,',','.');
                        $alokasi_hitung_rp = "" . number_format($alokasi_hitung,0,',','.');
                        $alokasi_nyata_rp = "" . number_format($alokasi_nyata,0,',','.');
                        $strtotime1=strtotime($periode_hitung1);
                        $strtotime2=strtotime($periode_hitung2);
                        $periode_hitung1=date('d/m/Y',$strtotime1);
                        $periode_hitung2=date('d/m/Y',$strtotime2);
                        //Cek Status Jurnal
                        $JumlahJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_shu_session='$id_shu_session'"));
                        //Jumlah Anggota
                        $JumlahRincian = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                        $JumlahRincian = "" . number_format($JumlahRincian,0,',','.');
                        //Label Jurnal Ada/Tidak Ada
                        if(empty($JumlahJurnal)){
                            $LabelJurnal='<span class="text-dark"> <i class="bi bi-x"></i> No Jurnal</span>';
                        }else{
                            $LabelJurnal='<span class="text-sucess"> <i class="bi bi-check-circle"></i> Jurnal</span>';
                        }
                        //Label Status
                        if($status=="Pending"){
                            $LabelStatus='<span class="badge badge-warning"> <i class="bi bi-three-dots"></i> Pending</span>';
                        }else{
                            $LabelStatus='<span class="badge badge-succes"> <i class="bi bi-check-circle"></i> '.$status.'</span>';
                        }
                        $SumAlokasiNyata = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(shu) AS shu FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                        $alokasi_nyata2 = $SumAlokasiNyata['shu'];
                        $alokasi_nyata2 = "" . number_format($alokasi_nyata2,0,',','.');
                ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
                        <td align="left">
                            <?php echo "$sesi_shu" ?>
                        </td>
                        <td align="left">
                            <?php echo "$periode_hitung1 s/d $periode_hitung2" ?>
                        </td>
                        <td align="right">
                            <?php echo "$modal_anggota" ?>
                        </td>
                        <td align="right">
                            <?php echo "$penjualan" ?>
                        </td>
                        <td align="right">
                            <?php echo "$pinjaman_rp" ?>
                        </td>
                        <td align="right">
                            <?php echo "$jasa_modal_anggota_rp" ?>
                        </td>
                        <td align="right">
                            <?php echo "$laba_penjualan_rp" ?>
                        </td>
                        <td align="right">
                            <?php echo "$jasa_pinjaman_rp" ?>
                        </td>
                        <td align="right">
                            <?php echo "$alokasi_nyata_rp" ?>
                        </td>
                        <td align="right">
                            <?php echo "$status" ?>
                        </td>
                    </tr>
                    <?php
                                $no++; 
                            }
                    ?>
            </table>
        </body>
    </html>
<?php } ?>