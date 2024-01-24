<?php 
    // header("Content-type: application/vnd-ms-excel");
    // header("Content-Disposition: attachment; filename=anggota.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    if(!empty($_GET['dataset'])){
        $dataset=$_GET['dataset'];
    }else{
        $dataset="";
    }
    if(!empty($_GET['listdataset'])){
        $listdataset=$_GET['listdataset'];
    }else{
        $listdataset="";
    }
    if(!empty($_GET['periode'])){
        $periode=$_GET['periode'];
    }else{
        $periode="";
    }
    if(!empty($_GET['Tahun'])){
        $Tahun=$_GET['Tahun'];
    }else{
        $Tahun="";
    }
    if(!empty($_GET['Bulan'])){
        $Bulan=$_GET['Bulan'];
    }else{
        $Bulan="";
    }
    if($periode=="Tahunan"){
        $keyword="$Tahun";
    }else{
        $keyword="$Tahun-$Bulan";
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
        </style>
    </head>
    <body>
        <table class="data" width="100%" cellspacing="0">
            <tr>
                <td align="center">
                    <b>No</b>
                </td>
                <td align="center">
                    <b>Akses</b>
                </td>
                <td align="center">
                    <b>Tanggal</b>
                </td>
                <td align="center">
                    <b>Kategori</b>
                </td>
                <td align="center">
                    <b>Deskripsi</b>
                </td>
            </tr>
            <?php
                $no = 1;
                $query = mysqli_query($Conn, "SELECT*FROM log WHERE $dataset='$listdataset' AND datetime_log like '%$keyword%'");
                while ($data = mysqli_fetch_array($query)) {
                    $id_log= $data['id_log'];
                    $id_akses= $data['id_akses'];
                    
                    $datetime_log= $data['datetime_log'];
                    $kategori_log= $data['kategori_log'];
                    $deskripsi_log= $data['deskripsi_log'];
                    //Buka data akses
                    $QryAkses=mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                    $DataAkses=mysqli_fetch_array($QryAkses);
                    $nama_akses=$DataAkses['nama_akses'];
                    //Mengubah format tanggal
                    $datetime_log=strtotime($datetime_log);
                    $datetime_log=date('d/m/Y H:i', $datetime_log);
            ?>
                <tr>
                    <td align="center">
                        <?php echo "$no" ?>
                    </td>
                    <td align="left">
                        <?php echo "$nama_akses" ?>
                    </td>
                    <td align="left">
                        <?php echo "$datetime_log" ?>
                    </td>
                    <td align="left">
                        <?php echo "$kategori_log" ?>
                    </td>
                    <td align="left">
                        <?php echo "$deskripsi_log" ?>
                    </td>
                </tr>
                <?php
                            $no++; 
                        }
                ?>
        </table>
    </body>
</html>