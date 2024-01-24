<?php 
    //koneksi dan error
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Jurnal.xls");
    //keyword
    if(!empty($_POST['keyword_export'])){
        $keyword=$_POST['keyword_export'];
    }else{
        $keyword="";
    }
    //KeywordBy
    if(!empty($_POST['KeywordByExport'])){
        $KeywordBy=$_POST['KeywordByExport'];
    }else{
        $KeywordBy="";
    }
    //batas
    if(!empty($_POST['batas_export'])){
        $batas=$_POST['batas_export'];
    }else{
        $batas="";
    }
    //ShortBy
    if(!empty($_POST['ShortByExport'])){
        $ShortBy=$_POST['ShortByExport'];
        if($ShortBy=="ASC"){
            $NextShort="DESC";
        }else{
            $NextShort="ASC";
        }
    }else{
        $ShortBy="DESC";
        $NextShort="ASC";
    }
    //OrderBy
    if(!empty($_POST['OrderByExport'])){
        $OrderBy=$_POST['OrderByExport'];
    }else{
        $OrderBy="id_jurnal";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($KeywordBy)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE nama_perkiraan like '%$keyword%' OR tanggal like '%$keyword%' OR kode_perkiraan like '%$keyword%' OR nilai like '%$keyword%' OR d_k like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE $KeywordBy like '%$keyword%'"));
        }
    }
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
                        <b>Tanggal</b>
                    </td>
                    <td align="center">
                        <b>Referensi</b>
                    </td>
                    <td align="center">
                        <b>Kode Akun</b>
                    </td>
                    <td align="center">
                        <b>Nama Akun</b>
                    </td>
                    <td align="center">
                        <b>Debet</b>
                    </td>
                    <td align="center">
                        <b>Kredit</b>
                    </td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="7" align="center">';
                        echo '      Tidak Ada Data Jurnal';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1+$posisi;
                        //KONDISI PENGATURAN MASING FILTER
                        if(empty($KeywordBy)){
                            if(empty($keyword)){
                                if(!empty($batas)){
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal ORDER BY $OrderBy $ShortBy");
                                }
                            }else{
                                if(!empty($batas)){
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE nama_perkiraan like '%$keyword%' OR tanggal like '%$keyword%' OR kode_perkiraan like '%$keyword%' OR nilai like '%$keyword%' OR d_k like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE nama_perkiraan like '%$keyword%' OR tanggal like '%$keyword%' OR kode_perkiraan like '%$keyword%' OR nilai like '%$keyword%' OR d_k like '%$keyword%' ORDER BY $OrderBy $ShortBy");
                                }
                            }
                        }else{
                            if(empty($keyword)){
                                if(!empty($batas)){
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal ORDER BY $OrderBy $ShortBy");
                                }
                            }else{
                                if(!empty($batas)){
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE $KeywordBy like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE $KeywordBy like '%$keyword%' ORDER BY $OrderBy $ShortBy");
                                }
                            }
                        }
                        while ($data = mysqli_fetch_array($query)) {
                            $id_jurnal = $data['id_jurnal'];
                            if(empty($data['id_transaksi'])){
                                if(empty($data['id_simpanan'])){
                                    if(empty($data['id_simpanan'])){
                                        if(empty($data['id_pinjaman_angsuran'])){
                                            if(empty($data['id_pinjaman'])){
                                                if(empty($data['id_shu_session'])){
                                                    $LabelTransaksi="<span class='text-danger'>None</span>";
                                                }else{
                                                    $id_shu_session = $data['id_shu_session'];
                                                    //buka SHU
                                                    $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                                    $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                                    $sesi_shu= $DatabagiHasil['sesi_shu'];
                                                    $LabelTransaksi="<span class='text-success'>Bagi Hasil $sesi_shu ID.$id_shu_session</span>";
                                                }
                                            }else{
                                                $id_pinjaman = $data['id_pinjaman'];
                                                //buka pinjaman
                                                $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                                $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                                $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                                $LabelTransaksi="<span class='text-success'>Pinjaman $tanggal_pinjaman ID.$id_pinjaman</span>";
                                            }
                                        }else{
                                            $id_pinjaman_angsuran = $data['id_pinjaman_angsuran'];
                                            //buka Angsuran
                                            $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                                            $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                            $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                            $LabelTransaksi="<span class='text-success'>Angsuran $KategoriTransaksi ID.$id_pinjaman_angsuran</span>";
                                        }
                                    }else{
                                        $id_simpanan = $data['id_simpanan'];
                                        //buka Simpanan
                                        $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                                        $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                                        $KategoriTransaksi= $DataSimpanan['kategori'];
                                        $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                                    }
                                }else{
                                    $id_simpanan = $data['id_simpanan'];
                                    //buka Simpanan
                                    $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                                    $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                                    $KategoriTransaksi= $DataSimpanan['kategori'];
                                    $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                                }
                            }else{
                                $id_transaksi = $data['id_transaksi'];
                                //buka Transaksi
                                $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                $KategoriTransaksi= $DataTransaksi['kategori'];
                                $LabelTransaksi="<span class='text-success'>Tansaksi $KategoriTransaksi ID.$id_transaksi</span>";
                            }
                            
                            $id_perkiraan = $data['id_perkiraan'];
                            $tanggal = $data['tanggal'];
                            $tanggal=strtotime($tanggal);
                            $tanggal=date('d/m/y', $tanggal);
                            $kode_perkiraan = $data['kode_perkiraan'];
                            $nama_perkiraan = $data['nama_perkiraan'];
                            $d_k= $data['d_k'];
                            $nilai= $data['nilai'];
                            //Format rupiah
                            $NominalRp = "Rp " . number_format($nilai,0,',','.');

                ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
                        <td align="left">
                            <?php echo "$tanggal" ?>
                        </td>
                        <td align="left">
                            <?php echo "$LabelTransaksi"; ?>
                        </td>
                        <td align="left">
                            <?php echo "$kode_perkiraan" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama_perkiraan" ?>
                        </td>
                        <td align="right">
                            <?php 
                                if($d_k=="Debet")
                                echo "<small>$NominalRp</small>";
                            ?>
                        </td>
                        <td align="right">
                            <?php 
                                if($d_k=="Kredit")
                                echo "<small>$NominalRp</small>";
                            ?>
                        </td>
                    </tr>
                    <?php
                                $no++; 
                            }
                        }
                    ?>
            </table>
        </body>
    </html>
