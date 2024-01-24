<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=supplier.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier"));
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
                    <b>ID Supplier</b>
                </td>
                <td align="center">
                    <b>Nama Supplier</b>
                </td>
                <td align="center">
                    <b>alamat</b>
                </td>
                <td align="center">
                    <b>Email</b>
                </td>
                <td align="center">
                    <b>Kontak</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="4">';
                    echo '      <span class="text-danger">Belum Memiliki Data Supplier</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    $query = mysqli_query($Conn, "SELECT*FROM supplier");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_supplier= $data['id_supplier'];
                        $nama_supplier= $data['nama_supplier'];
                        if(empty($data['alamat_supplier'])){
                            $alamat_supplier='<span class="text-danger">Tidak Ada</span>';
                        }else{
                            $alamat_supplier= $data['alamat_supplier'];
                        }
                        if(empty($data['email_supplier'])){
                            $email_supplier='<span class="text-danger">Tidak Ada</span>';
                        }else{
                            $email_supplier= $data['email_supplier'];
                        }
                        if(empty($data['kontak_supplier'])){
                            $kontak_supplier='<span class="text-danger">Tidak Ada</span>';
                        }else{
                            $kontak_supplier= $data['kontak_supplier'];
                        }
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$id_supplier" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_supplier" ?>
                    </td>
                    <td align="left">
                        <?php echo "$alamat_supplier" ?>
                    </td>
                    <td align="left">
                        <?php echo "$email_supplier" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kontak_supplier" ?>
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