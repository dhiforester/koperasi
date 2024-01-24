<?php 
    // header("Content-type: application/vnd-ms-excel");
    // header("Content-Disposition: attachment; filename=Transaksi.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    //kategori
    if(!empty($_GET['kategori'])){
        $KategoriTransaksi=$_GET['kategori'];
    }else{
        $KategoriTransaksi="";
    }
    //status
    if(!empty($_GET['status'])){
        $StatusTransaksi=$_GET['status'];
    }else{
        $StatusTransaksi="";
    }
    //periode
    if(!empty($_GET['periode'])){
        $periode=$_GET['periode'];
    }else{
        $periode="";
    }
    if(empty($KategoriTransaksi)){
        if(empty($StatusTransaksi)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$periode%'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE status='$StatusTransaksi' AND tanggal like '%$periode%'"));
        }
    }else{
        if(empty($status)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE kategori='$KategoriTransaksi' AND tanggal like '%$periode%'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE kategori='$KategoriTransaksi' AND status='$StatusTransaksi' AND tanggal like '%$periode%'"));
        }
    }
?> 
<html>
    <head>
        <title>Laporan Rekapitulasi Transaksi</title>
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
        <table class="data" width="100%" cellspacing="0">
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
                    $JumlahTagihan=0;
                    $JumlahPembayaran=0;
                    //KONDISI PENGATURAN MASING FILTER
                    if(empty($KategoriTransaksi)){
                        if(empty($StatusTransaksi)){
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$periode%'");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE status='$StatusTransaksi' AND tanggal like '%$periode%'");
                        }
                    }else{
                        if(empty($StatusTransaksi)){
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE kategori='$KategoriTransaksi' AND tanggal like '%$periode%'");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE kategori='$KategoriTransaksi' AND status='$StatusTransaksi' AND tanggal like '%$periode%'");
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
                        $JumlahTagihan=$JumlahTagihan+$tagihan;
                        $JumlahPembayaran=$JumlahPembayaran+$pembayaran;
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
                        <?php echo "$id_transaksi"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$NamaAksesTransaksi"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_anggota"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_supplier"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$tanggal"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$kategori"; ?>
                    </td>
                    <td align="right">
                        <?php echo "$tagihan"; ?>
                    </td>
                    <td align="right">
                        <?php echo "$pembayaran"; ?>
                    </td>
                    <td align="right">
                        <?php echo "$kembalian"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$metode"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$keterangan"; ?>
                    </td>
                    <td align="left">
                        <?php echo "$status"; ?>
                    </td>
                </tr>
                <?php
                            $no++; 
                        }
                    }
                ?>
                <tr>
                    <td colspan="6"><b>JUMLAH</b></td>
                    <td align="right">
                        <?php echo "<b>$JumlahTagihan</b>"; ?>
                    </td>
                    <td align="right">
                        <?php echo "<b>$JumlahPembayaran</b>"; ?>
                    </td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                    <td align="right"></td>
                </tr>
        </table>
    </body>
</html>