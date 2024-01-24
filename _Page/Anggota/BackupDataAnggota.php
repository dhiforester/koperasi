<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=anggota.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota"));
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
                    <b>ID Anggota</b>
                </td>
                <td align="center">
                    <b>Tanggal Daftar</b>
                </td>
                <td align="center">
                    <b>NIP</b>
                </td>
                <td align="center">
                    <b>Nama Anggota</b>
                </td>
                <td align="center">
                    <b>Email</b>
                </td>
                <td align="center">
                    <b>Kontak</b>
                </td>
                <td align="center">
                    <b>Status</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="7">';
                    echo '      <span class="text-danger">Belum Memiliki Data Anggota</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    $query = mysqli_query($Conn, "SELECT*FROM anggota");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_anggota= $data['id_anggota'];
                        $tanggal_masuk= $data['tanggal_masuk'];
                        $nip= $data['nip'];
                        $nama= $data['nama'];
                        $email= $data['email'];
                        $kontak= $data['kontak'];
                        $image= $data['image'];
                        $status= $data['status'];
                        $strtotime=strtotime($tanggal_masuk);
                        $TanggalMasuk=date('d/m/Y',$strtotime);
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$id_anggota" ?>
                    </td>
                    <td align="left">
                        <?php echo "$tanggal_masuk" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nip" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama" ?>
                    </td>
                    <td align="left">
                        <?php echo "$email" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kontak" ?>
                    </td>
                    <td align="left">
                        <?php echo "$status" ?>
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