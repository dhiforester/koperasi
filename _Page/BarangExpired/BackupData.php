<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=batch_expired.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth"));
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
                    <b>ID Batch</b>
                </td>
                <td align="center">
                    <b>Kode Barang</b>
                </td>
                <td align="center">
                    <b>Nama Barang</b>
                </td>
                <td align="center">
                    <b>Satuan</b>
                </td>
                <td align="center">
                    <b>Qty</b>
                </td>
                <td align="center">
                    <b>No.Batch</b>
                </td>
                <td align="center">
                    <b>Expired</b>
                </td>
                <td align="center">
                    <b>Reminder</b>
                </td>
                <td align="center">
                    <b>Status</b>
                </td>
            </tr>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="9">';
                    echo '      <span class="text-danger">Belum Memiliki Data Expired Date</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no = 1;
                    $query = mysqli_query($Conn, "SELECT*FROM barang_bacth");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_barang_bacth= $data['id_barang_bacth'];
                        $id_barang= $data['id_barang'];
                        $id_barang_satuan= $data['id_barang_satuan'];
                        $kode_barang= $data['kode_barang'];
                        $nama_barang= $data['nama_barang'];
                        $satuan= $data['satuan'];
                        $no_batch= $data['no_batch'];
                        $expired_date= $data['expired_date'];
                        $qty_batch= $data['qty_batch'];
                        $reminder_date= $data['reminder_date'];
                        $status= $data['status'];
                    ?>
                <tr>
                    <td align="center">
                        <?php echo "$id_barang_bacth" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kode_barang" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_barang" ?>
                    </td>
                    <td align="left">
                        <?php echo "$satuan" ?>
                    </td>
                    <td align="left">
                        <?php echo "$qty_batch" ?>
                    </td>
                    <td align="left">
                        <?php echo "$no_batch" ?>
                    </td>
                    <td align="left">
                        <?php echo "$expired_date" ?>
                    </td>
                    <td align="left">
                        <?php echo "$reminder_date" ?>
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