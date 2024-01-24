<?php 
    if(empty($_POST['id_pinjaman'])){
        echo "ID Pinjaman Tidak Boleh Kosong!";
    }else{
        $id_pinjaman=$_POST['id_pinjaman'];
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=angsuran_pinjaman.xls");
        //koneksi dan error
        include "../../_Config/Connection.php";
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman'"));
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
                        <b>Anggota</b>
                    </td>
                    <td align="center">
                        <b>Tanggal</b>
                    </td>
                    <td align="center">
                        <b>Kategori</b>
                    </td>
                    <td align="center">
                        <b>Jumlah</b>
                    </td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="6">';
                        echo '      <span class="text-danger">Belum Memiliki Data Angsuran</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        $query = mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman'");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_pinjaman_angsuran= $data['id_pinjaman_angsuran'];
                            $id_anggota= $data['id_anggota'];
                            $id_akses= $data['id_akses'];
                            $tanggal= $data['tanggal'];
                            $kategori_angsuran= $data['kategori_angsuran'];
                            $jumlah= $data['jumlah'];
                            $strotime1=strtotime($tanggal);
                            $tanggal=date('d/m/Y',$strotime1);
                            $jumlah = "" . number_format($jumlah,0,',','.');
                            //Buka data akses
                            $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                            $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                            $nama_akses= $DataDetailAkses['nama_akses'];
                            //Buka Data Anggota
                            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                            $DataAnggota = mysqli_fetch_array($QryAnggota);
                            $id_anggota= $DataAnggota['id_anggota'];
                            $tanggal_masuk= $DataAnggota['tanggal_masuk'];
                            $NamaAnggota= $DataAnggota['nama'];
                        ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
                        <td align="left">
                            <?php echo "$id_pinjaman" ?>
                        </td>
                        <td align="left">
                            <?php echo "$NamaAnggota" ?>
                        </td>
                        <td align="left">
                            <?php echo "$tanggal" ?>
                        </td>
                        <td align="left">
                            <?php echo "$kategori_angsuran" ?>
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
            </table>
        </body>
    </html>
<?php } ?>