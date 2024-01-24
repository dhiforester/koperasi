<?php 
    //koneksi
    include "../../_Config/Connection.php";
    if(empty($_POST['id_anggota'])){
        echo 'ID Anggota Tidak Boleh Kosong!!';
    }else{
        $id_anggota=$_POST['id_anggota'];
        $format=$_POST['format'];
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $nama= $DataAnggota['nama'];
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$id_anggota'"));
        if($format=="EXCEL"){
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=Simpanan $nama.xls");
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
                    <b>Nama</b>
                </td>
                <td align="center">
                    <b>Tanggal</b>
                </td>
                <td align="center">
                    <b>User/Akses</b>
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
                    //KONDISI PENGATURAN MASING FILTER
                    $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$id_anggota' ORDER BY id_simpanan ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_simpanan= $data['id_simpanan'];
                        $id_akses= $data['id_akses'];
                        $id_anggota= $data['id_anggota'];
                        $kategori= $data['kategori'];
                        $keterangan= $data['keterangan'];
                        $nama= $data['nama'];
                        $jumlah= $data['jumlah'];
                        $tanggal= $data['tanggal'];
                        $strotime=strtotime($tanggal);
                        $tanggal=date('d/m/Y',$strotime);
                        $jumlah = "" . number_format($jumlah,0,',','.');
                        //Buka Akses
                        $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                        $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
                        $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
            ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama" ?>
                        </td>
                        <td align="left">
                            <?php echo "$tanggal" ?>
                        </td>
                        <td align="left">
                            <?php echo "$NamaAksesTransaksi" ?>
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
                //Jumlah Simpanan
                $SumSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE id_anggota='$id_anggota' AND kategori!='Penarikan'"));
                $JumlahSimpanan1 = $SumSimpanan['jumlah'];
                $JumlahSimpanan = "" . number_format($JumlahSimpanan1,0,',','.');
                //Jumlah Penarikan
                $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE id_anggota='$id_anggota' AND kategori='Penarikan'"));
                $JumlahPenarikan1 = $SumPenarikan['jumlah'];
                $JumlahPenarikan = "" . number_format($JumlahPenarikan1,0,',','.');
                //Simpanan Netto
                $SimpananNetto1=$JumlahSimpanan1-$JumlahPenarikan1;
                $SimpananNetto = "" . number_format($SimpananNetto1,0,',','.');
            ?>
            <tr>
                <td></td>
                <td align="left" colspan="5">
                    <b>JUMLAH SIMPANAN</b>
                </td>
                <td align="right">
                    <?php echo "<b>$JumlahSimpanan</b>" ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="left" colspan="5">
                    <b>JUMLAH PENARIAKAN</b>
                </td>
                <td align="right">
                    <?php echo "<b>$JumlahPenarikan</b>" ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="left" colspan="5">
                    <b>SIMPANAN NETTO</b>
                </td>
                <td align="right">
                    <?php echo "<b>$SimpananNetto</b>" ?>
                </td>
            </tr>
        </table>
    </body>
</html>
<?php
    }
?>