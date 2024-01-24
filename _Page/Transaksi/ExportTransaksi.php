<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Transaksi.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="10";
    }
    //ShortBy
    if(!empty($_POST['ShortBy'])){
        $ShortBy=$_POST['ShortBy'];
    }else{
        $ShortBy="DESC";
    }
    //OrderBy
    if(!empty($_POST['OrderBy'])){
        $OrderBy=$_POST['OrderBy'];
    }else{
        $OrderBy="id_transaksi";
    }
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE $keyword_by like '%$keyword%'"));
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
                    <b>Tagihan</b>
                </td>
                <td align="center">
                    <b>Pembayaran</b>
                </td>
                <td align="center">
                    <b>Kembalian</b>
                </td>
                <td align="center">
                    <b>Metode</b>
                </td>
                <td align="center">
                    <b>Keterangan</b>
                </td>
                <td align="center">
                    <b>Status</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="12">';
                    echo '      <span class="text-danger">Belum Memiliki Data Transaksi</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    //KONDISI PENGATURAN MASING FILTER
                    if(empty($keyword_by)){
                        if(empty($keyword)){
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy");
                        }
                    }else{
                        if(empty($keyword)){
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy");
                        }
                    }
                    while ($data = mysqli_fetch_array($query)) {
                        $id_transaksi= $data['id_transaksi'];
                        $id_akses= $data['id_akses'];
                        $tanggal= $data['tanggal'];
                        $kategori= $data['kategori'];
                        $tagihan= $data['tagihan'];
                        $pembayaran= $data['pembayaran'];
                        $kembalian= $data['kembalian'];
                        $metode= $data['metode'];
                        $keterangan= $data['keterangan'];
                        $status= $data['status'];
                        //Buka data anggota
                        if(!empty($data['id_anggota'])){
                            $id_anggota= $data['id_anggota'];
                            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                            $DataAnggota = mysqli_fetch_array($QryAnggota);
                            $nama_anggota= $DataAnggota['nama'];
                        }else{
                            $nama_anggota="None";
                        }
                        //Buka Supplier
                        if(empty($data['id_supplier'])){
                            $nama_supplier="None";
                        }else{
                            $id_supplier= $data['id_supplier'];
                            $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                            $DataSupplier = mysqli_fetch_array($QrySupplier);
                            $nama_supplier= $DataSupplier['nama_supplier'];
                        }
                        $strtotime=strtotime($tanggal);
                        $TanggalTransaksi=date('d/m/Y', $strtotime);
                        $JamTrasaksi=date('H:i', $strtotime);
                        $IdTransaksi = sprintf("%07d", $id_transaksi);
                        //Buka data akses
                        $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                        $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
                        $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$id_transaksi" ?>
                    </td>
                    <td align="left">
                        <?php echo "$NamaAksesTransaksi" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_anggota" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_supplier" ?>
                    </td>
                    <td align="left">
                        <?php echo "$tanggal" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kategori" ?>
                    </td>
                    <td align="left">
                        <?php echo "$tagihan" ?>
                    </td>
                    <td align="left">
                        <?php echo "$pembayaran" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kembalian" ?>
                    </td>
                    <td align="left">
                        <?php echo "$metode" ?>
                    </td>
                    <td align="left">
                        <?php echo "$keterangan" ?>
                    </td>
                    <td align="left">
                        <?php echo "$status" ?>
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