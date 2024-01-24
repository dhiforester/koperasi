<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    include '../../vendor/autoload.php';
    //Tangkap id_akses
    if(empty($_GET['id_kunjungan'])){
        echo ' ID pendaftaran Tidak Ditemukan';
    }else{
        $id_kunjungan=$_GET['id_kunjungan'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        if(empty($DataTransaksi['id_transaksi'])){
            echo ' Transaksi Untuk Pendaftaran Tersebut Tidak Ditemukan';
        }else{
            $id_transaksi = $DataTransaksi['id_transaksi'];
            $id_akses= $DataTransaksi['id_akses'];
            $id_mitra= $DataTransaksi['id_mitra'];
            $id_pasien= $DataTransaksi['id_pasien'];
            $id_kunjungan= $DataTransaksi['id_kunjungan'];
            $tanggal= $DataTransaksi['tanggal'];
            $kategori= $DataTransaksi['kategori'];
            $tagihan= $DataTransaksi['tagihan'];
            $pembayaran= $DataTransaksi['pembayaran'];
            $metode= $DataTransaksi['metode'];
            $status= $DataTransaksi['status'];
            $pembayaran = "Rp " . number_format($pembayaran,2,',','.');
            $tagihan = "Rp " . number_format($tagihan,2,',','.');
            //Mengubah format tanggal
            $strtotime_tanggal=strtotime($tanggal);
            $hari=date('D', $strtotime_tanggal);
            $tanggal_format=date('d F y', $strtotime_tanggal);
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
            //Buka data mitra
            $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
            $DataMitra = mysqli_fetch_array($QryMitra);
            $nama_mitra= $DataMitra['nama_mitra'];
            $kontak_mitra= $DataMitra['kontak_mitra'];
            $propinsi_mitra= $DataMitra['propinsi_mitra'];
            $kabupaten_mitra= $DataMitra['kabupaten_mitra'];
            $kecamatan_mitra= $DataMitra['kecamatan_mitra'];
            $desa_mitra= $DataMitra['desa_mitra'];
            $alamat_mitra= $DataMitra['alamat_mitra'];
            $email_mitra= $DataMitra['email_mitra'];
            if(!empty($DataTransaksi['id_pasien'])){
                $QryPasien = mysqli_query($Conn,"SELECT * FROM pasien WHERE id_pasien='$id_pasien'")or die(mysqli_error($Conn));
                $DataPasien = mysqli_fetch_array($QryPasien);
                $nama_pasien= $DataPasien['nama_pasien'];
                 //buka data kunjungan
                $penanggungjawab= $DataPasien['penanggungjawab'];
            }else{
                $nama_pasien="<small><i></i>None</small>";
                $penanggungjawab="<small><i></i>None</small>";
            }
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'"));
            $mpdf = new \Mpdf\Mpdf();
            $nama_dokumen= "Invoice-$id_transaksi";
            // $mpdf=new mPDF('utf-8', array($panjang_x,$lebar_y)); 
            $html='<style>@page *{margin-top: 0px;}</style>'; 
            //Beginning Buffer to save PHP variables and HTML tags
            ob_start();
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
                    padding: 10px;
                    border-collapse: collapse;
                }
                .tabel_garis_bawah {
                    border-bottom: 1px solid #666;
                }
                table.TableForm tr td{
                    padding: 10px;
                }
            </style>
        </head>
        <body>
            <table width="95%">
                <tr>
                    <td align="right">
                        <?php echo "<b>$nama_mitra</b>"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <?php echo "<small>$alamat_mitra Ds.$desa_mitra Kec.$kecamatan_mitra Kab.$kabupaten_mitra $propinsi_mitra</small>"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right" class="">
                        <?php echo "<small>Kontak: $kontak_mitra</small>"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="center" class="tabel_garis_bawah">
                        <?php echo "<b>INVOICE</b><br>"; ?>
                        <?php echo "No.$id_transaksi"; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <?php echo "$Namahari, $tanggal_format"; ?>
                    </td>
                </tr>
            </table>
            <br>
            <table class="TableForm">
                <tr>
                    <td><b>Customer</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><b>Nama Pasien</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$nama_pasien"; ?></td>
                </tr>
                <tr>
                    <td><b>Orang Tua</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$penanggungjawab"; ?></td>
                </tr>
                <tr>
                    <td><b>Metode Pembayaran</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$metode"; ?></td>
                </tr>
            </table>
            <br>
            <table class="data" width="95%">
                <tr>
                    <td align="center"><b>No</b></td>
                    <td align="center"><b>Metode khitan</b></td>
                    <td align="center"><b>Harga </b></td>
                    <td align="center"><b>Diskon</b></td>
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
                            $id_mitra= $data['id_mitra'];
                            $id_mitra_tindakan=$data['id_mitra_tindakan'];
                            $nama_barang= $data['nama_barang'];
                            $nama_tindakan= $data['nama_tindakan'];
                            $harga= $data['harga'];
                            $qty= $data['qty'];
                            $jumlah= $data['jumlah'];
                            if(empty($data['nama_barang'])){
                                $NamaRincian= $data['nama_tindakan'];
                                $Kategori="Tindakan";
                            }else{
                                $NamaRincian= $data['nama_barang'];
                                $Kategori="Obat/Alkes";
                            }
                            //FormatRupiahJumlah
                            $JumlahRp="Rp " . number_format($jumlah,0,',','.');
                            $HargaRp="Rp " . number_format($harga,0,',','.');
                            $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                    ?>
                        <tr>
                            <td align="center">
                                <?php echo "$no";?>
                            </td>
                            <td align="left">
                                <?php echo "$NamaRincian";?>
                            </td>
                            <td align="right">
                                <?php echo "$HargaRp x $qty";?>
                            </td>
                            <td align="right">Rp 0</td>
                            <td align="right"><?php echo "$JumlahRp";?></td>
                        </tr>
                    <?php 
                        $no++; }} 
                        if(empty($jml_data)){
                            $JumlahTotalRp="Rp 0";
                        }else{
                            $JumlahTotalRp="Rp " . number_format($JumlahRincianTotal,2,',','.');
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
                            <b>DISKON</b>
                        </td>
                        <td align="right">Rp 0</td>
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
            </table>
            <br>
            <table class="TableForm" width="95%">
                <tr>
                    <td align="center"><i>Terimakasih telah memilih <?php echo "<b>$nama_mitra</b>"; ?></i></td>
                </tr>
            </table>
        </body>
    </html>
<?php 
        }
    }
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;
?>