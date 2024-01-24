<?php 
    //koneksi
    include "../../_Config/Connection.php";
    if(empty($_POST['id_anggota'])){
        echo 'ID Anggota Tidak Boleh Kosong!!';
    }else{
        if(empty($_POST['periode1'])){
            echo 'Periode Awal Tidak Boleh Kosong!!';
        }else{
            if(empty($_POST['periode2'])){
                echo 'Periode Akhir Tidak Boleh Kosong!!';
            }else{
                if(empty($_POST['format'])){
                    echo 'Format Tidak Boleh Kosong!!';
                }else{
                    $id_anggota=$_POST['id_anggota'];
                    $periode1=$_POST['periode1'];
                    $periode2=$_POST['periode2'];
                    $format=$_POST['format'];
                    //Buka data Anggota
                    $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                    $DataAnggota = mysqli_fetch_array($QryAnggota);
                    $nama= $DataAnggota['nama'];
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_anggota='$id_anggota' AND tanggal>='$periode1' AND tanggal<='$periode2'"));
                    if($format=="EXCEL"){
                        header("Content-type: application/vnd-ms-excel");
                        header("Content-Disposition: attachment; filename=rincian $nama.xls");
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
                    <b>ID Transaksi</b>
                </td>
                <td align="center">
                    <b>User/Akses</b>
                </td>
                <td align="center">
                    <b>Anggota</b>
                </td>
                <td align="center">
                    <b>Tanggal</b>
                </td>
                <td align="center">
                    <b>Kategori</b>
                </td>
                <td align="center">
                    <b>Uraian</b>
                </td>
                <td align="center">
                    <b>Harga</b>
                </td>
                <td align="center">
                    <b>QTY</b>
                </td>
                <td align="center">
                    <b>Satuan</b>
                </td>
                <td align="center">
                    <b>Jumlah</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="11">';
                    echo '      <span class="text-danger">Belum Memiliki Data Rincian</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    $JumlahRincian=0;
                    //KONDISI PENGATURAN MASING FILTER
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_anggota='$id_anggota' AND tanggal>='$periode1' AND tanggal<='$periode2'");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_transaksi_rincian= $data['id_transaksi_rincian'];
                        $id_transaksi= $data['id_transaksi'];
                        $id_akses= $data['id_akses'];
                        $tanggal= $data['tanggal'];
                        $strtotime=strtotime($tanggal);
                        $tanggal=date('d/m/Y',$strtotime);
                        $kategori_rincian= $data['kategori_rincian'];
                        $nama_barang= $data['nama_barang'];
                        $harga= $data['harga'];
                        $qty= $data['qty'];
                        $satuan= $data['satuan'];
                        $jumlah= $data['jumlah'];
                        $JumlahRincian=$JumlahRincian+$jumlah;
                        //Buka data anggota
                        if(!empty($data['id_anggota'])){
                            $id_anggota= $data['id_anggota'];
                            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                            $DataAnggota = mysqli_fetch_array($QryAnggota);
                            $nama_anggota= $DataAnggota['nama'];
                        }else{
                            $nama_anggota="None";
                        }
                        $IdTransaksi = sprintf("%07d", $id_transaksi);
                        //Buka data akses
                        $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                        $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
                        $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
            ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
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
                            <?php echo "$tanggal" ?>
                        </td>
                        <td align="left">
                            <?php echo "$kategori_rincian" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama_barang" ?>
                        </td>
                        <td align="right">
                            <?php echo "$harga" ?>
                        </td>
                        <td align="right">
                            <?php echo "$qty" ?>
                        </td>
                        <td align="right">
                            <?php echo "$satuan" ?>
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
                <td></td>
                <td align="left" colspan="9">
                    <b>JUMLAH RINCIAN</b>
                </td>
                <td align="right">
                    <?php echo "<b>$JumlahRincian</b>" ?>
                </td>
            </tr>
        </table>
    </body>
</html>
<?php
                }
            }
        }
    }
?>