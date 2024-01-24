<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=simpanan.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan"));
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
                    <b>ID Simpanan</b>
                </td>
                <td align="center">
                    <b>ID Anggota</b>
                </td>
                <td align="center">
                    <b>Nama Anggota</b>
                </td>
                <td align="center">
                    <b>Tanggal</b>
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
                    $query = mysqli_query($Conn, "SELECT*FROM simpanan");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_simpanan= $data['id_simpanan'];
                        $id_anggota= $data['id_anggota'];
                        $kategori= $data['kategori'];
                        $keterangan= $data['keterangan'];
                        $nama= $data['nama'];
                        $jumlah= $data['jumlah'];
                        $tanggal= $data['tanggal'];
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$id_simpanan" ?>
                    </td>
                    <td align="left">
                        <?php echo "$id_anggota" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama" ?>
                    </td>
                    <td align="left">
                        <?php echo "$tanggal" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kategori" ?>
                    </td>
                    <td align="left">
                        <?php echo "$keterangan" ?>
                    </td>
                    <td align="left">
                        <?php echo "$jumlah" ?>
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