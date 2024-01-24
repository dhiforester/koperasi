<?php 
    // header("Content-type: application/vnd-ms-excel");
    // header("Content-Disposition: attachment; filename=simpanan.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    if(!empty($_GET['kategori'])){
        $KategoriTransaksi=$_GET['kategori'];
    }else{
        $KategoriTransaksi="";
    }
    //periode
    if(!empty($_GET['periode'])){
        $periode=$_GET['periode'];
    }else{
        $periode="";
    }
    if(empty($KategoriTransaksi)){
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE tanggal like '%$periode%'"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE tanggal like '%$periode%' AND kategori='$KategoriTransaksi'"));
    }
    
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
                    <b>ID Simpanan</b>
                </td>
                <td align="center">
                    <b>ID Anggota</b>
                </td>
                <td align="center">
                    <b>Nama Anggota</b>
                </td>
                <td align="center">
                    <b>Tanggal</b>
                </td>
                <td align="center">
                    <b>Kategori</b>
                </td>
                <td align="center">
                    <b>Keterangan</b>
                </td>
                <td align="center">
                    <b>Jumlah</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="7">';
                    echo '      <span class="text-danger">Belum Memiliki Data Simpanan</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    $total=0;
                    if(empty($KategoriTransaksi)){
                        $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE tanggal like '%$periode%'");
                    }else{
                        $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE tanggal like '%$periode%' AND kategori='$KategoriTransaksi'");
                    }
                    while ($data = mysqli_fetch_array($query)) {
                        $id_simpanan= $data['id_simpanan'];
                        $id_anggota= $data['id_anggota'];
                        $kategori= $data['kategori'];
                        $keterangan= $data['keterangan'];
                        $nama= $data['nama'];
                        $jumlah= $data['jumlah'];
                        $tanggal= $data['tanggal'];
                        $total=$total+$jumlah;
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$id_simpanan" ?>
                    </td>
                    <td align="left">
                        <?php echo "$id_anggota" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama" ?>
                    </td>
                    <td align="left">
                        <?php echo "$tanggal" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kategori" ?>
                    </td>
                    <td align="left">
                        <?php echo "$keterangan" ?>
                    </td>
                    <td align="right">
                        <?php echo "$jumlah" ?>
                    </td>
                </tr>
                <?php
                            $no++; 
                        }
                    }
                ?>
                <tr>
                    <td colspan="6"><b>JUMLAH</b></td>
                    <td align="right"><b><?php echo "$total" ?></b></td>
                </tr>
        </table>
    </body>
</html>