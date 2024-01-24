<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Pembayaran.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    //Keyword_by
    if(!empty($_POST['KeywordByExport'])){
        $keyword_by=$_POST['KeywordByExport'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['FilterKeyword'])){
        $keyword=$_POST['FilterKeyword'];
    }else{
        $keyword="";
    }
    //ShortBy
    if(!empty($_POST['ShortByExport'])){
        $ShortBy=$_POST['ShortByExport'];
    }else{
        $ShortBy="DESC";
    }
    //OrderBy
    if(!empty($_POST['OrderByExport'])){
        $OrderBy=$_POST['OrderByExport'];
    }else{
        $OrderBy="id_pembayaran";
    }
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE tanggal like '%$keyword%' OR metode like '%$keyword%' OR kategori like '%$keyword%' OR jumlah like '%$keyword%' OR keterangan like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE $keyword_by like '%$keyword%'"));
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
                    <b>ID Transaksi</b>
                </td>
                <td align="center">
                    <b>User/Akses</b>
                </td>
                <td align="center">
                    <b>Anggota</b>
                </td>
                <td align="center">
                    <b>Supplier</b>
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
                    <b>Jumlah</b>
                </td>
                <td align="center">
                    <b>Keterangan</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="10">';
                    echo '      <span class="text-danger">Belum Memiliki Data Transaksi</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    //KONDISI PENGATURAN MASING FILTER
                    if(empty($keyword_by)){
                        if(empty($keyword)){
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran ORDER BY $OrderBy $ShortBy");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE tanggal like '%$keyword%' OR metode like '%$keyword%' OR kategori like '%$keyword%' OR jumlah like '%$keyword%' OR keterangan like '%$keyword%' ORDER BY $OrderBy $ShortBy");
                        }
                    }else{
                        if(empty($keyword)){
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran ORDER BY $OrderBy $ShortBy");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy");
                        }
                    }
                    while ($data = mysqli_fetch_array($query)) {
                        $id_pembayaran = $data['id_pembayaran'];
                        $id_transaksi = $data['id_transaksi'];
                        $id_akses = $data['id_akses'];
                        $id_anggota = $data['id_anggota'];
                        $id_supplier = $data['id_supplier'];
                        $kategori = $data['kategori'];
                        $tanggal = $data['tanggal'];
                        $metode = $data['metode'];
                        $jumlah = $data['jumlah'];
                        $keterangan = $data['keterangan'];
                        //Format rupiah
                        $TagihanRp = "Rp " . number_format($jumlah,0,',','.');
                        $strtotime=strtotime($tanggal);
                        $tanggal=date('d/m/Y H:i',$strtotime);
                        //Buka data petugas
                        if(!empty($data['id_akses'])){
                            $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                            $DataAkses = mysqli_fetch_array($QryAkses);
                            if(empty($DataAkses['nama_akses'])){
                                $NamaAkses="None";
                            }else{
                                $NamaAkses= $DataAkses['nama_akses'];
                            }
                        }else{
                            $NamaAkses="None";
                        }
                        //Buka data asnggota
                        if(!empty($data['id_anggota'])){
                            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                            $DataAnggota = mysqli_fetch_array($QryAnggota);
                            if(empty($DataAnggota['nama'])){
                                $NamaAnggota="None";
                            }else{
                                $NamaAnggota= $DataAnggota['nama'];
                            }
                        }else{
                            $NamaAnggota="None";
                        }
                        //Buka Supplier
                        if(!empty($data['id_supplier'])){
                            $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                            $DataSupplier = mysqli_fetch_array($QrySupplier);
                            $NamaSupplier= $DataSupplier['nama_supplier'];
                        }else{
                            $NamaSupplier="None";
                        }
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$no" ?>
                    </td>
                    <td align="center">
                        <?php echo "$id_transaksi" ?>
                    </td>
                    <td align="left">
                        <?php echo "$NamaAkses" ?>
                    </td>
                    <td align="left">
                        <?php echo "$NamaAnggota" ?>
                    </td>
                    <td align="left">
                        <?php echo "$NamaSupplier" ?>
                    </td>
                    <td align="left">
                        <?php echo "$tanggal" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kategori" ?>
                    </td>
                    <td align="left">
                        <?php echo "$metode" ?>
                    </td>
                    <td align="left">
                        <?php echo "$jumlah" ?>
                    </td>
                    <td align="left">
                        <?php echo "$keterangan" ?>
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