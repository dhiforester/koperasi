<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    //Tangkap id_akses
    if(empty($_GET['id_transaksi'])){
        echo ' ID Transaksi Tidak Ditemukan';
    }else{
        $id_transaksi=$_GET['id_transaksi'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        if(empty($DataTransaksi['id_transaksi'])){
            echo ' Transaksi Untuk Pendaftaran Tersebut Tidak Ditemukan';
        }else{
            $id_transaksi = $DataTransaksi['id_transaksi'];
            $id_akses= $DataTransaksi['id_akses'];
            $id_anggota= $DataTransaksi['id_anggota'];
            $id_supplier= $DataTransaksi['id_supplier'];
            $tanggal= $DataTransaksi['tanggal'];
            $kategori= $DataTransaksi['kategori'];
            $tagihan= $DataTransaksi['tagihan'];
            $pembayaran= $DataTransaksi['pembayaran'];
            $kembalian= $DataTransaksi['kembalian'];
            $metode= $DataTransaksi['metode'];
            $status= $DataTransaksi['status'];
            $keterangan= $DataTransaksi['keterangan'];
            $pembayaran = "" . number_format($pembayaran,2,',','.');
            $tagihan = "" . number_format($tagihan,2,',','.');
            $kembalian = "" . number_format($kembalian,2,',','.');
            //Mengubah format tanggal
            $strtotime_tanggal=strtotime($tanggal);
            $hari=date('D', $strtotime_tanggal);
            $tanggal_format=date('d F Y', $strtotime_tanggal);
            $TanggalTransaksi=date('d/m/Y', $strtotime_tanggal);
            $JamTransaksi=date('H:i', $strtotime_tanggal);
            $dayList = array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'Sabtu'
            );
            $Namahari=$dayList[$hari];
            //Buka data anggota
            if(!empty($DataTransaksi['id_anggota'])){
                $id_anggota= $DataTransaksi['id_anggota'];
                $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                $DataAnggota = mysqli_fetch_array($QryAnggota);
                $nama_anggota= $DataAnggota['nama'];
            }else{
                $nama_anggota="";
            }
            //Buka Supplier
            if(empty($DataTransaksi['id_supplier'])){
                $nama_supplier="";
            }else{
                $id_supplier= $DataTransaksi['id_supplier'];
                $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                $DataSupplier = mysqli_fetch_array($QrySupplier);
                $nama_supplier= $DataSupplier['nama_supplier'];
            }
            //Buka nama akses
            $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
            $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
            //Buka PPN dan PPH
            $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
            $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
            if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
                $ppn_persen=0;
                $ppn_rp=0;
            }else{
                $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                $ppn_rp=$dataTransaksiPpn['ppn_rp'];
            }
            $PpnPphRp="" . number_format($ppn_rp,0,',','.');
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'"));
?>
    <html>
        <head>
            <title>Invoice</title>
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
                    padding: 6px;
                    border-collapse: collapse;
                    font-size:10pt;
                }
                .tabel_garis_bawah {
                    border-bottom: 1px solid #666;
                }
                table.TableForm tr td{
                    padding: 3px;
                }
            </style>
        </head>
        <body>
            <table width="100%">
                <tr>
                    <td align="right">
                        <?php echo "<b>$title_page</b>"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <?php echo "<small>$alamat_bisnis</small>"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="">
                        <?php echo "<small>Kontak: $telepon_bisnis</small>"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tabel_garis_bawah">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <?php echo "<small>$Namahari, $tanggal_format</small>"; ?>
                    </td>
                </tr>
            </table>
            <br>
            <table class="TableForm">
                <tr>
                    <td><small><b>ID Transaksi</b></small></td>
                    <td><small><b>:</b></small></td>
                    <td><small><?php echo "$id_transaksi.$kategori"; ?></small></td>
                </tr>
                <tr>
                    <td><small><b>Tanggal</b></small></td>
                    <td><small><b>:</b></small></td>
                    <td><small><?php echo "$TanggalTransaksi $JamTransaksi"; ?></small></td>
                </tr>
                <tr>
                    <td><small><b>User/Petugas</b></small></td>
                    <td><small><b>:</b></small></td>
                    <td><small><?php echo "$NamaAksesTransaksi"; ?></small></td>
                </tr>
                <?php
                    if(!empty($nama_anggota)){
                        echo '<tr>';
                        echo '  <td><small><b>Anggota</b></small></td>';
                        echo '  <td><small><b>:</b></small></td>';
                        echo '  <td><small>'.$nama_anggota.'</small></td>';
                        echo '</tr>';
                    }
                    if(!empty($nama_supplier)){
                        echo '<tr>';
                        echo '  <td><small><b>Supplier</b></small></td>';
                        echo '  <td><small><b>:</b></small></td>';
                        echo '  <td><small>'.$nama_supplier.'</small></td>';
                        echo '</tr>';
                    }
                    if(!empty($keterangan)){
                        echo '<tr>';
                        echo '  <td><small><b>Keterangan</b></small></td>';
                        echo '  <td><small><b>:</b></small></td>';
                        echo '  <td><small>'.$keterangan.'</small></td>';
                        echo '</tr>';
                    }
                    if(!empty($status)){
                        echo '<tr>';
                        echo '  <td><small><b>Status</b></small></td>';
                        echo '  <td><small><b>:</b></small></td>';
                        echo '  <td><small>'.$status.'</small></td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <br>
            <table class="data" width="100%">
                <tr>
                    <td align="center"><b>No</b></td>
                    <td align="center"><b>Keterangan</b></td>
                    <td align="center"><b>Harga </b></td>
                    <td align="center"><b>Qty</b></td>
                    <td align="center"><b>Jumlah</b></td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="7">';
                        echo '      <span class="text-danger">Tidak Ada Data Yang Ditampilkan</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        $JumlahRincianTotal=0;
                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_transaksi_rincian= $data['id_transaksi_rincian'];
                            $id_barang= $data['id_barang'];
                            $id_barang_harga= $data['id_barang_harga'];
                            $id_barang_satuan= $data['id_barang_satuan'];
                            $kategori_rincian= $data['kategori_rincian'];
                            $nama_barang= $data['nama_barang'];
                            $harga= $data['harga'];
                            $qty= $data['qty'];
                            $satuan= $data['satuan'];
                            $jumlah= $data['jumlah'];
                            //FormatRupiahJumlah
                            $JumlahRp="" . number_format($jumlah,0,',','.');
                            $HargaRp="" . number_format($harga,0,',','.');
                            $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                    ?>
                        <tr>
                            <td align="center">
                                <?php echo "$no";?>
                            </td>
                            <td align="left">
                                <?php echo "$nama_barang";?>
                            </td>
                            <td align="right">
                                <?php echo "$HargaRp";?>
                            </td>
                            <td align="right">
                                <?php echo "$qty $satuan";?>
                            </td>
                            <td align="right"><?php echo "$JumlahRp";?></td>
                        </tr>
                    <?php 
                        $no++; }} 
                        if(empty($jml_data)){
                            $JumlahTotalRp="0";
                        }else{
                            $JumlahTotalRp="" . number_format($JumlahRincianTotal,2,',','.');
                        }
                    ?>
                    <tr>
                        <td colspan="4">
                            <b>SUBTOTAL</b>
                        </td>
                        <td align="right">
                            <?php 
                                echo "<b>$JumlahTotalRp</b>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <b>PPN/PPH (<?php echo "$ppn_persen%";?>)</b>
                        </td>
                        <td align="right">
                            <?php 
                                echo "<b>$PpnPphRp</b>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <b>TOTAL</b>
                        </td>
                        <td align="right">
                            <?php 
                                echo "<b>$JumlahTotalRp</b>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <b>PEMBAYARAN/UANG</b>
                        </td>
                        <td align="right">
                            <?php 
                                echo "<b>$pembayaran</b>";
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <b>KEMBALIAN</b>
                        </td>
                        <td align="right">
                            <?php 
                                echo "<b>$kembalian</b>";
                            ?>
                        </td>
                    </tr>
            </table>
            <br>
        </body>
    </html>
<?php 
        }
    }
?>