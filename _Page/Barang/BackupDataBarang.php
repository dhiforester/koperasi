<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=barang.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang"));
    $JmlKategori = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga"));
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
                    <b>ID Barang</b>
                </td>
                <td align="center">
                    <b>Kode Barang</b>
                </td>
                <td align="center">
                    <b>Nama/Merek</b>
                </td>
                <td align="center">
                    <b>Kategori</b>
                </td>
                <td align="center">
                    <b>Satuan</b>
                </td>
                <td align="center">
                    <b>Konversi</b>
                </td>
                <td align="center">
                    <b>Harga Beli</b>
                </td>
                <?php
                    if(!empty($JmlKategori)){
                        $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                        while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                            $KategoriHarga= $DataKategori['kategori_harga'];
                            echo '<td align="center">';
                            echo '  <b>'.$KategoriHarga.'</b>';
                            echo '</td>';
                        }
                    }
                ?>
                <td align="center">
                    <b>Stok</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="8">';
                    echo '      <span class="text-danger">Tidak Ada Data Barang</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    $query = mysqli_query($Conn, "SELECT*FROM barang");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_barang= $data['id_barang'];
                        $kode_barang= $data['kode_barang'];
                        $nama_barang= $data['nama_barang'];
                        $kategori_barang= $data['kategori_barang'];
                        $satuan_barang= $data['satuan_barang'];
                        $konversi= $data['konversi'];
                        $harga_beli= $data['harga_beli'];
                        $harga_beli_rp = "Rp " . number_format($harga_beli,0,',','.');
                        $stok_barang= $data['stok_barang'];
                        $stok_barang_rp = "" . number_format($stok_barang,0,',','.');
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$id_barang" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kode_barang" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_barang" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kategori_barang" ?>
                    </td>
                    <td align="left">
                        <?php echo "$satuan_barang" ?>
                    </td>
                    <td align="left">
                        <?php echo "$konversi" ?>
                    </td>
                    <td align="left">
                        <?php echo "$harga_beli" ?>
                    </td>
                    <?php
                        if(!empty($JmlKategori)){
                            $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                            while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                $KategoriHarga= $DataKategori['kategori_harga'];
                                //Buka data multi harga
                                $QryHargaMulti = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND id_barang_satuan='0' AND kategori_harga='$KategoriHarga'")or die(mysqli_error($Conn));
                                $DataHargaMulti= mysqli_fetch_array($QryHargaMulti);
                                $HargaMulti= $DataHargaMulti['harga'];
                                echo '<td align="left">';
                                echo '  '.$HargaMulti.'';
                                echo '</td>';
                            }
                        }
                    ?>
                    <td align="left">
                        <?php echo "$stok_barang" ?>
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