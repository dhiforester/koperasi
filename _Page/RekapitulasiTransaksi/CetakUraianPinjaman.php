<?php 
    // header("Content-type: application/vnd-ms-excel");
    // header("Content-Disposition: attachment; filename=pinjaman.xls");
    //koneksi dan error
    include "../../_Config/Connection.php";
    if(empty($_POST['status'])){
        $StatusPinjaman="";
    }else{
        $StatusPinjaman=$_POST['status'];
    }
    if(empty($_POST['periode'])){
        $periode="";
    }else{
        $periode=$_POST['periode'];
    }
    if(empty($StatusPinjaman)){
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE tanggal_pinjaman like '%$periode%'"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE tanggal_pinjaman like '%$periode%' AND status='$StatusPinjaman'"));
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
                        <b>Tanggal</b>
                    </td>
                    <td align="center">
                        <b>Petugas</b>
                    </td>
                    <td align="center">
                        <b>Anggota</b>
                    </td>
                    <td align="center">
                        <b>Pinjaman</b>
                    </td>
                    <td align="center">
                        <b>Angsuran</b>
                    </td>
                    <td align="center">
                        <b>Sisa</b>
                    </td>
                    <td align="center">
                        <b>Status</b>
                    </td>
                </tr>
                <?php
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="8">';
                        echo '      <span class="text-danger">Belum Memiliki Data Pinjaman</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        //KONDISI PENGATURAN MASING FILTER
                        if(empty($StatusPinjaman)){
                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman WHERE tanggal_pinjaman like '%$periode%'");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman WHERE tanggal_pinjaman like '%$periode%' AND status='$StatusPinjaman'");
                        }
                        while ($data = mysqli_fetch_array($query)) {
                        $id_pinjaman= $data['id_pinjaman'];
                        $id_anggota= $data['id_anggota'];
                        $id_akses= $data['id_akses'];
                        $tanggal_pinjaman= $data['tanggal_pinjaman'];
                        $tanggal_input= $data['tanggal_input'];
                        $nama= $data['nama'];
                        $jumlah_pinjaman1= $data['jumlah_pinjaman'];
                        $persen_jasa= $data['persen_jasa'];
                        $estimasi_jasa= $data['estimasi_jasa'];
                        $nilai_angsuran= $data['nilai_angsuran'];
                        $periode_angsuran= $data['periode_angsuran'];
                        $token= $data['token'];
                        $status= $data['status'];
                        $strotime1=strtotime($tanggal_pinjaman);
                        $tanggal_pinjaman=date('d/m/Y',$strotime1);
                        $strotime2=strtotime($tanggal_input);
                        $tanggal_input=date('d/m/Y',$strotime2);
                        $jumlah_pinjaman = "" . number_format($jumlah_pinjaman1,0,',','.');
                        $nilai_angsuran = "" . number_format($nilai_angsuran,0,',','.');
                        $estimasi_jasa = "" . number_format($estimasi_jasa,0,',','.');
                        if($status=="Pending"){
                            $LabelStatus='<span class="badge bg-inf">Pending</span>';
                        }else{
                            if($status=="Active"){
                                $LabelStatus='<span class="badge bg-primary">Active</span>';
                            }else{
                                if($status=="Lunas"){
                                    $LabelStatus='<span class="badge bg-sccess">Active</span>';
                                }else{
                                    if($status=="Macet"){
                                        $LabelStatus='<span class="badge bg-danger">Macet</span>';
                                    }else{
                                        $LabelStatus='<span class="badge bg-dark">'.$status.'</span>';
                                    }
                                }
                            }
                        }
                        //Buka Anggota
                        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                        $DataAnggota = mysqli_fetch_array($QryAnggota);
                        if(!empty($DataAnggota['email'])){
                            $email= $DataAnggota['email'];
                        }else{
                            $email="No Email";
                        }
                        //Buka data akses
                        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                        if(empty($DataDetailAkses['nama_akses'])){
                            $nama_akses='<span class="text-danger">None</span>';
                        }else{
                            $nama_akses= $DataDetailAkses['nama_akses'];
                        }
                        //Cek Jurnal
                        $CekJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman='$id_pinjaman'"));
                        if(!empty($CekJurnal)){
                            $LabelJurnal='<span class="text-success" title="Tersedia Jurnal"><i class="bi bi-check-circle"></i> Jurnal</span>';
                        }else{
                            $LabelJurnal='<span class="text-dark" title="Tidak Tersedia Jurnal"><i class="bi bi-x"></i> None</span>';
                        }
                        //Jumlah Angsuran
                        $JumlahAngsuranBerjalan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Pokok'"));
                        //Jumlah Total Angsuran
                        if(!empty($JumlahAngsuranBerjalan)){
                            $SumAngsuran = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Pokok'"));
                            $JumlahAngsuran1 = $SumAngsuran['jumlah'];
                            $JumlahAngsuran = "" . number_format($JumlahAngsuran1,0,',','.');
                            $SumAngsuranJasa = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Jasa'"));
                            $JumlahAngsuranJasa = $SumAngsuranJasa['jumlah'];
                            $JumlahAngsuranJasa = "" . number_format($JumlahAngsuranJasa,0,',','.');
                            //Sisa Angsuran
                            $JumlahSisaAngsuran1=$jumlah_pinjaman1-$JumlahAngsuran1;
                            $JumlahSisaAngsuran = "" . number_format($JumlahSisaAngsuran1,0,',','.');
                        }else{
                            $JumlahAngsuran1 =0;
                            $JumlahAngsuran = "" . number_format($JumlahAngsuran1,0,',','.');
                            $JumlahAngsuranJasa =0;
                            $JumlahAngsuranJasa = "" . number_format($JumlahAngsuranJasa,0,',','.');
                            $JumlahSisaAngsuran1=$jumlah_pinjaman1;
                            $JumlahSisaAngsuran = "" . number_format($JumlahSisaAngsuran1,0,',','.');
                        }
                ?>
                    <tr>
                        <td align="center">
                            <?php echo "$no" ?>
                        </td>
                        <td align="left">
                            <?php echo "$tanggal_pinjaman" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama_akses" ?>
                        </td>
                        <td align="left">
                            <?php echo "$nama" ?>
                        </td>
                        <td align="right">
                            <?php echo "$jumlah_pinjaman1" ?>
                        </td>
                        <td align="right">
                            <?php echo "$JumlahAngsuran1" ?>
                        </td>
                        <td align="right">
                            <?php echo "$JumlahSisaAngsuran1" ?>
                        </td>
                        <td align="right">
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
