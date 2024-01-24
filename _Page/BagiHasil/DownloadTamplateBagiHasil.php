<?php 
    //koneksi dan error
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_GET['id_shu_session'])){
        echo "ID Sessi Rincian Tidak Boleh Kosong";
    }else{
        $id_shu_session=$_GET['id_shu_session'];
        //Buka data askes
        $QryDetail = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
        $DataDetail = mysqli_fetch_array($QryDetail);
        if(empty($DataDetail['id_shu_session'])){
            echo "ID Sessi Rincian Tidak Ditemukan";
        }else{
            $sesi_shu= $DataDetail['sesi_shu'];
            $periode_hitung1= $DataDetail['periode_hitung1'];
            $periode_hitung2= $DataDetail['periode_hitung2'];
            $strtotime1=strtotime($periode_hitung1);
            $strtotime2=strtotime($periode_hitung2);
            $periode_hitung1=date('d/m/Y',$strtotime1);
            $periode_hitung2=date('d/m/Y',$strtotime2);
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=TamplateRincianBagiHasil.xls");
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
                        <b>ID Sessi</b>
                    </td>
                    <td align="center">
                        <b>ID Aggota</b>
                    </td>
                    <td align="center">
                        <b>Nama Anggota</b>
                    </td>
                    <td align="center">
                        <b>Simpanan</b>
                    </td>
                    <td align="center">
                        <b>Pinjaman</b>
                    </td>
                    <td align="center">
                        <b>Penjualan</b>
                    </td>
                    <td align="center">
                        <b>Jasa Simpanan</b>
                    </td>
                    <td align="center">
                        <b>Jasa Pinjaman</b>
                    </td>
                    <td align="center">
                        <b>Jasa Penjualan</b>
                    </td>
                    <td align="center">
                        <b>Bagi Hasil</b>
                    </td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="10">';
                        echo '      <span class="text-danger">Belum Memiliki Data Pinjaman</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        //Menampilkan Data
                        $query = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_shu_rincian= $data['id_shu_rincian'];
                            $id_anggota= $data['id_anggota'];
                            $nama_anggota= $data['nama_anggota'];
                            $simpanan= $data['simpanan'];
                            $pinjaman= $data['pinjaman'];
                            $penjualan= $data['penjualan'];
                            $jasa_simpanan= $data['jasa_simpanan'];
                            $jasa_pinjaman= $data['jasa_pinjaman'];
                            $jasa_penjualan= $data['jasa_penjualan'];
                            $shu= $data['shu'];
                ?>
                    <tr>
                        <td align="center">
                            <?php echo "$id_shu_session" ?>
                        </td>
                        <td align="center">
                            <?php echo "$id_anggota" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama_anggota" ?>
                        </td>
                        <td align="right">
                            <?php echo "$simpanan" ?>
                        </td>
                        <td align="right">
                            <?php echo "$pinjaman" ?>
                        </td>
                        <td align="right">
                            <?php echo "$penjualan" ?>
                        </td>
                        <td align="right">
                            <?php echo "$jasa_simpanan" ?>
                        </td>
                        <td align="right">
                            <?php echo "$jasa_pinjaman" ?>
                        </td>
                        <td align="right">
                            <?php echo "$jasa_penjualan" ?>
                        </td>
                        <td align="right">
                            <?php echo "$shu" ?>
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
<?php }} ?>