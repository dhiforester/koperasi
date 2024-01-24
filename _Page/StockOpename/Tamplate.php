<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=TamplateStockOpename.xls");
    //koneksi
    include "../../_Config/Connection.php";
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
        <table width="100%">
            <tr>
                <td align="center">
                    <b>No</b>
                </td>
                <td align="center">
                    <b>ID Barang</b>
                </td>
                <td align="center">
                    <b>Nama Barang</b>
                </td>
                <td align="center">
                    <b>Satuan</b>
                </td>
                <td align="center">
                    <b>Harga Beli</b>
                </td>
                <td align="center">
                    <b>Stok Awal</b>
                </td>
                <td align="center">
                    <b>Stok Akhir</b>
                </td>
                <td align="center">
                    <b>Selisih</b>
                </td>
            </tr>
            <?php
                $no = 1;
                //KONDISI PENGATURAN MASING FILTER
                $query = mysqli_query($Conn, "SELECT*FROM barang ORDER BY nama_barang ASC");
                while ($data = mysqli_fetch_array($query)) {
                    $id_barang= $data['id_barang'];
                    $kode_barang= $data['kode_barang'];
                    $nama_barang= $data['nama_barang'];
                    $kategori_barang= $data['kategori_barang'];
                    $satuan_barang= $data['satuan_barang'];
                    $konversi= $data['konversi'];
                    $harga_beli= $data['harga_beli'];
                    $harga_beli_rp = "" . number_format($harga_beli,0,',','.');
                    $stok_barang= $data['stok_barang'];
                    $stok_barang_rp = "" . number_format($stok_barang,0,',','.');
            ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
                        <td align="left">
                            <?php echo "$id_barang" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama_barang" ?>
                        </td>
                        <td align="left">
                            <?php echo "$satuan_barang" ?>
                        </td>
                        <td align="left">
                            <?php echo "$harga_beli" ?>
                        </td>
                        <td align="left">
                            <?php echo "$stok_barang" ?>
                        </td>
                        <td align="left">
                            <?php echo "$stok_barang" ?>
                        </td>
                        <td align="right">0</td>
                    </tr>
            <?php
                    $no++; 
                }
            ?>
        </table>
    </body>
</html>
