<?php 
    if(empty($_POST['id_stok_opename'])){
        echo 'ID Stock Opename Tidak Boleh Kosong!.';
    }else{
        if(empty($_POST['format'])){
            echo 'Format Data Tidak Boleh Kosong!.';
        }else{
            $id_stok_opename=$_POST['id_stok_opename'];
            $format=$_POST['format'];
            if($format=="Excel"){
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=StockOpename$id_stok_opename.xls");
            }
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
                <td align="center">
                    <b>Jumlah</b>
                </td>
            </tr>
            <?php
                $no = 1;
                //KONDISI PENGATURAN MASING FILTER
                $query = mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename' ORDER BY nama_barang ASC");
                while ($data = mysqli_fetch_array($query)) {
                    $id_barang= $data['id_barang'];
                    $nama_barang= $data['nama_barang'];
                    $satuan= $data['satuan'];
                    $harga= $data['harga'];
                    $stok_awal= $data['stok_awal'];
                    $stok_akhir= $data['stok_akhir'];
                    $stok_gap= $data['stok_gap'];
                    $jumlah= $data['jumlah'];
                    $harga_beli_rp = "" . number_format($harga,0,',','.');
                    $JumlahRp = "" . number_format($jumlah,0,',','.');
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
                            <?php echo "$satuan" ?>
                        </td>
                        <td align="left">
                            <?php echo "$harga_beli_rp" ?>
                        </td>
                        <td align="left">
                            <?php echo "$stok_awal" ?>
                        </td>
                        <td align="left">
                            <?php echo "$stok_akhir" ?>
                        </td>
                        <td align="left">
                            <?php echo "$stok_gap" ?>
                        </td>
                        <td align="left">
                            <?php echo "$JumlahRp" ?>
                        </td>
                    </tr>
            <?php
                    $no++; 
                }
            ?>
        </table>
    </body>
</html>
<?php }} ?>