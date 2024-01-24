<?php 
    if(empty($_POST['id_barang'])){
        echo "ID Barang Tidak Boleh Kosong";
    }else{
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=riwayat_transaksi.xls");
        //koneksi dan error
        include "../../_Config/Connection.php";
        
        $id_barang=$_POST['id_barang'];
        //periode1
        if(!empty($_POST['periode1'])){
            $periode1=$_POST['periode1'];
        }else{
            $periode1="";
        }
        //periode2
        if(!empty($_POST['periode2'])){
            $periode2=$_POST['periode2'];
        }else{
            $periode2="";
        }
        //Buka data barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $id_barang= $DataBarang['id_barang'];
        $kode_barang= $DataBarang['kode_barang'];
        $nama_barang= $DataBarang['nama_barang'];
        if(empty($periode1)||empty($periode2)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang' AND updatetime>='$periode1' AND updatetime<='$periode2'"));
        }
        $SumJumlahTotal = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_rincian WHERE id_barang='$id_barang'"));
        $jumlah_transaksi = $SumJumlahTotal['jumlah'];
        $JumlahTransaksiRp = "" . number_format($jumlah_transaksi,0,',','.');
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
                    <td align="center" colspan="6">
                        <b>Riwayat Transaksi <?php echo "$nama_barang"; ?></b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>No</b>
                    </td>
                    <td align="center">
                        <b>Tanggal</b>
                    </td>
                    <td align="center">
                        <b>Transaksi</b>
                    </td>
                    <td align="center">
                        <b>QTY</b>
                    </td>
                    <td align="center">
                        <b>Harga</b>
                    </td>
                    <td align="center">
                        <b>Jumlah</b>
                    </td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="6">';
                        echo '      <span class="text-danger">Tidak Ada Data Transaksi</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        //KONDISI PENGATURAN MASING FILTER
                        if(empty($periode1)||empty($periode2)){
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang'");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang' AND updatetime>='$periode1' AND updatetime<='$periode2'");
                        }
                        while ($data = mysqli_fetch_array($query)) {
                            $id_transaksi_rincian= $data['id_transaksi_rincian'];
                            $id_transaksi= $data['id_transaksi'];
                            $nama_barang= $data['nama_barang'];
                            $harga= $data['harga'];
                            $qty= $data['qty'];
                            $jumlah= $data['jumlah'];
                            $updatetime= $data['updatetime'];
                            $HargaRp = "" . number_format($harga,0,',','.');
                            $JumlahRp = "" . number_format($jumlah,0,',','.');
                            //Buka Data Transaksi
                            $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                            $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                            $id_transaksi = $DataTransaksi['id_transaksi'];
                            $kategori= $DataTransaksi['kategori'];
                            //Buka data barang
                            $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                            $DataBarang = mysqli_fetch_array($QryBarang);
                            $satuan_barang= $DataBarang['satuan_barang'];
                            //Format Tanggal
                            $Strtotime=strtotime($updatetime);
                            $TanggalFormat=date('d/m/Y H:i',$Strtotime);
                ?>
                    <tr>
                        <td align="center">
                            <?php 
                                echo "<small >$no</small>";
                            ?>
                        </td>
                        <td class="text-left" align="left">
                            <?php 
                                echo '<small class="credits"><i class="bi bi-calendar-check"></i> '.$TanggalFormat.'</small>';
                            ?>
                        </td>
                        <td class="text-left" align="left">
                            <?php 
                                echo "<small><i class='bi bi-tag'></i>$kategori</small><br>";
                            ?>
                        </td>
                        <td class="text-left" align="center">
                            <?php 
                                echo "<small>$qty $satuan_barang</small>";
                            ?>
                        </td>
                        <td class="text-right" align="right">
                            <?php 
                                echo "<small>$HargaRp</small><br>";
                            ?>
                        </td>
                        <td class="text-right" align="right">
                            <?php 
                                echo "<small>$JumlahRp</small><br>";
                            ?>
                        </td>
                    </tr>
                <?php $no++; }} ?>
                <tr>
                    <td></td>
                    <td colspan="4" align="left"><b>JUMLAH TOTAL</b></td>
                    <td class="text-right" align="right"><b><?php echo $JumlahTransaksiRp;?></b></td>
                </tr>
            </table>
        </body>
    </html>
<?php } ?>