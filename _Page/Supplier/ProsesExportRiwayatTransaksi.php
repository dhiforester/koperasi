<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=supplier.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    //Tangkap GetIdSupplier2
    if(empty($_POST['GetIdSupplier2'])){
        echo '<table>';
        echo '  <tr>';
        echo '      <td colspan="6" class="text-center">';
        echo '          ID Supplier Tidak Boleh Kosong';
        echo '      </td>';
        echo '  </tr>';
        echo '</table>';
    }else{
        $GetIdSupplier=$_POST['GetIdSupplier2'];
        //keyword
        if(!empty($_POST['keyword3'])){
            $keyword=$_POST['keyword3'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['batas3'])){
            $batas=$_POST['batas3'];
        }else{
            $batas="0";
        }
        //ShortBy
        if(!empty($_POST['ShortBy3'])){
            $ShortBy=$_POST['ShortBy3'];
        }else{
            $ShortBy="DESC";
        }
        //OrderBy
        if(!empty($_POST['OrderBy3'])){
            $OrderBy=$_POST['OrderBy3'];
            $keyword_by=$_POST['OrderBy3'];
        }else{
            $OrderBy="id_transaksi";
            $keyword_by="";
        }
        if(empty($keyword_by)){
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%')"));
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
                        <b>Kategori</b>
                    </td>
                    <td align="center">
                        <b>Metode</b>
                    </td>
                    <td align="center">
                        <b>Status</b>
                    </td>
                    <td align="center">
                        <b>Jumlah</b>
                    </td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="6" class="text-center">';
                        echo '      Belum Ada Transaksi';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        //Menghitung Jumlah Total
                        $SumJumlahTotal = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE id_supplier='$GetIdSupplier'"));
                        $jumlah_transaksi = $SumJumlahTotal['tagihan'];
                        $jumlah_transaksi_rp = "Rp " . number_format($jumlah_transaksi,0,',','.');
                        $no = 1;
                        //KONDISI PENGATURAN MASING FILTER
                        if($batas=="0"){
                            if(empty($keyword_by)){
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%') ORDER BY $OrderBy $ShortBy");
                                }
                            }else{
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy");
                                }
                            }
                        }else{
                            if(empty($keyword_by)){
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                            }else{
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                            }
                        }
                        while ($data = mysqli_fetch_array($query)) {
                            $id_transaksi= $data['id_transaksi'];
                            $id_akses= $data['id_akses'];
                            $id_anggota= $data['id_anggota'];
                            $id_supplier= $data['id_supplier'];
                            $tanggal= $data['tanggal'];
                            $kategori= $data['kategori'];
                            $tagihan= $data['tagihan'];
                            $pembayaran= $data['pembayaran'];
                            $metode= $data['metode'];
                            $status= $data['status'];
                    ?>
                        <tr>
                            <td class="text-center text-xs">
                                <?php echo "$no";?>
                            </td>
                            <td class="text-left" align="left">
                                <?php echo "$tanggal";?>
                            </td>
                            <td class="text-left" align="left">
                                <?php echo "$kategori";?>
                            </td>
                            <td class="text-left" align="left">
                                <?php echo "$metode";?>
                            </td>
                            <td class="text-left" align="left">
                                <?php echo "$status";?>
                            </td>
                            <td class="text-right" align="right">
                                <?php echo "$tagihan";?>
                            </td>
                        </tr>
                    <?php
                                $no++; }
                            }
                    ?>
                <tr>
                    <td></td>
                    <td colspan="4" align="left"><b>JUMLAH TOTAL TRANSAKSI</b></td>
                    <td align="right"><b><?php echo $jumlah_transaksi; ?></b></td>
                </tr>
            </table>
        </body>
    </html>
<?php } ?>