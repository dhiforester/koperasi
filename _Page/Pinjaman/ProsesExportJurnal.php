<?php 
    if(empty($_POST['id_pinjaman'])){
        echo "ID Pinjaman Tidak Boleh Kosong!";
    }else{
        $id_pinjaman=$_POST['id_pinjaman'];
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=jurnal_pinjaman.xls");
        //koneksi dan error
        include "../../_Config/Connection.php";
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman='$id_pinjaman'"));
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
                        <b>No</b>
                    </td>
                    <td align="center">
                        <b>ID Pinjaman</b>
                    </td>
                    <td align="center">
                        <b>ID Angsuran</b>
                    </td>
                    <td align="center">
                        <b>Tanggal</b>
                    </td>
                    <td align="center">
                        <b>Kode Perkiraan</b>
                    </td>
                    <td align="center">
                        <b>Perkiraan</b>
                    </td>
                    <td align="center">
                        <b>Debet/Kredit</b>
                    </td>
                    <td align="center">
                        <b>Nominal</b>
                    </td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="8">';
                        echo '      <span class="text-danger">Belum Memiliki Data Jurnal</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman='$id_pinjaman'");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_jurnal= $data['id_jurnal'];
                            $id_pinjaman= $data['id_pinjaman'];
                            $id_pinjaman_angsuran= $data['id_pinjaman_angsuran'];
                            $id_perkiraan = $data['id_perkiraan'];
                            $tanggal = $data['tanggal'];
                            $tanggal=strtotime($tanggal);
                            $tanggal=date('d/m/y', $tanggal);
                            $kode_perkiraan = $data['kode_perkiraan'];
                            $nama_perkiraan = $data['nama_perkiraan'];
                            $d_k= $data['d_k'];
                            $nilai= $data['nilai'];
                            //Format rupiah
                            $NominalRp = "" . number_format($nilai,0,',','.');
                        ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
                        <td align="left">
                            <?php echo "$id_pinjaman" ?>
                        </td>
                        <td align="left">
                            <?php echo "$id_pinjaman_angsuran" ?>
                        </td>
                        <td align="left">
                            <?php echo "$tanggal" ?>
                        </td>
                        <td align="left">
                            <?php echo "$kode_perkiraan" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama_perkiraan" ?>
                        </td>
                        <td align="left">
                            <?php echo "$d_k" ?>
                        </td>
                        <td align="right">
                            <?php echo "$NominalRp" ?>
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
<?php } ?>