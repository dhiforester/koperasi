<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    //keyword
    if(empty($_POST['GetIdPinjaman'])){
        echo 'ID Pinjaman Tidak Boleh Kosong';
    }else{
        $id_pinjaman=$_POST['GetIdPinjaman'];
        $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
        $DataPinjaman = mysqli_fetch_array($QryPinjaman);
        $jumlah_pinjaman= $DataPinjaman['jumlah_pinjaman'];
        //keyword
        if(!empty($_POST['KeywordAngsuran'])){
            $keyword=$_POST['KeywordAngsuran'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['BatasAngsuran'])){
            $batas=$_POST['BatasAngsuran'];
        }else{
            $batas="10";
        }
        $ShortBy="DESC";
        //OrderBy
        if(!empty($_POST['OrderBy'])){
            $OrderBy=$_POST['OrderBy'];
        }else{
            $OrderBy="tanggal";
        }
        //Atur Page
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
            $posisi = ( $page - 1 ) * $batas;
        }else{
            $page="1";
            $posisi = 0;
        }
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE (id_pinjaman='$id_pinjaman') AND (tanggal like '%$keyword%' OR kategori_angsuran like '%$keyword%' OR jumlah like '%$keyword%')"));
        }
        //Jumlah Total Angsuran
        if(!empty($jml_data)){
            $SumTotalAngsuran = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman'"));
            $JumlahTotalAngsuran1 = $SumTotalAngsuran['jumlah'];
            $SumAngsuran = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Pokok'"));
            $JumlahAngsuran1 = $SumAngsuran['jumlah'];
            $JumlahAngsuran = "" . number_format($JumlahAngsuran1,0,',','.');
            $SumAngsuranJasa = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Jasa'"));
            $JumlahAngsuranJasa = $SumAngsuranJasa['jumlah'];
            $JumlahAngsuranJasa = "" . number_format($JumlahAngsuranJasa,0,',','.');
            //Sisa Angsuran
            $JumlahSisaAngsuran1=$jumlah_pinjaman-$JumlahAngsuran1;
            $JumlahSisaAngsuran = "" . number_format($JumlahSisaAngsuran1,0,',','.');
            $JumlahTotalAngsuran = "" . number_format($JumlahTotalAngsuran1,0,',','.');
        }else{
            $JumlahTotalAngsuran1 =0;
            $JumlahAngsuran1 =0;
            $JumlahAngsuran = "" . number_format($JumlahAngsuran1,0,',','.');
            $JumlahAngsuranJasa =0;
            $JumlahAngsuranJasa = "" . number_format($JumlahAngsuranJasa,0,',','.');
            $JumlahSisaAngsuran1=$jumlah_pinjaman;
            $JumlahTotalAngsuran = "" . number_format($JumlahTotalAngsuran1,0,',','.');
        }
?>

<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Tanggal</b>
                            </th>
                            <th class="text-center">
                                <b>Kategori</b>
                            </th>
                            <th class="text-center">
                                <b>Petugas/User</b>
                            </th>
                            <th class="text-center">
                                <b>Jumlah</b>
                            </th>
                            <th class="text-center">
                                <b>Jurnal</b>
                            </th>
                            <th class="text-center">
                                <b>Opsi</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="7">';
                                echo '      <span class="text-danger">Belum Memiliki Data Angsuran</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1;
                                //KONDISI PENGATURAN MASING FILTER
                                $query = mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' ORDER BY $OrderBy $ShortBy");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_pinjaman_angsuran= $data['id_pinjaman_angsuran'];
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
                                    //Cek Jurnal
                                    $CekJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'"));
                                    //Label kategori angsuran
                                    if($kategori_angsuran=="Pokok"){
                                        $LabelKategoriAngsuran='<span class="badge badge-primary"><i class="bi bi-tag"></i> Pokok</span>';
                                    }else{
                                        if($kategori_angsuran=="Jasa"){
                                            $LabelKategoriAngsuran='<span class="badge badge-warning"><i class="bi bi-tag"></i> Jasa</span>';
                                        }else{
                                            if($kategori_angsuran=="Denda"){
                                                $LabelKategoriAngsuran='<span class="badge badge-danger"><i class="bi bi-tag"></i> Denda</span>';
                                            }else{
                                                $LabelKategoriAngsuran='<span class="badge badge-dark"><i class="bi bi-tag"></i> None</span>';
                                            }
                                        }
                                    }
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<i class="bi bi-calendar"></i> '.$tanggal.'';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo ''.$LabelKategoriAngsuran.'';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<i class="bi bi-person-circle"></i> '.$nama_akses.'';
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo ''.$jumlah.'';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <?php 
                                            if(!empty($CekJurnal)){
                                                echo '<span class="text-success">Tersedia</span>';
                                            }else{
                                                echo '<span class="text-danger">None</span>';
                                            }
                                        ?>
                                    </small>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditPinjaman" data-id="<?php echo "$id_pinjaman_angsuran,$id_pinjaman"; ?>" title="Edit Data angsuran">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>   -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusAngsuran" data-id="<?php echo "$id_pinjaman_angsuran,$id_pinjaman"; ?>" title="Hapus Data angsuran">
                                            <i class="bi bi-x"></i>
                                        </button>  
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $no++; }}
                            ?>
                            <tr>
                                <td></td>
                                <td colspan="3" align="left"><b>JUMLAH ANGSURAN</b></td>
                                <td align="right"><b><?php echo "$JumlahTotalAngsuran"; ?></b></td>
                                <td align="right"><b></b></td>
                                <td align="right"><b></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3" align="left"><b>JUMLAH JASA</b></td>
                                <td align="right"><b><?php echo "$JumlahAngsuranJasa"; ?></b></td>
                                <td align="right"><b></b></td>
                                <td align="right"><b></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3" align="left"><b>JUMLAH ANGSURAN POKOK</b></td>
                                <td align="right"><b><?php echo "$JumlahAngsuran"; ?></b></td>
                                <td align="right"><b></b></td>
                                <td align="right"><b></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3" align="left"><b>SISA POKOK</b></td>
                                <td align="right"><b><?php echo "$JumlahSisaAngsuran"; ?></b></td>
                                <td align="right"><b></b></td>
                                <td align="right"><b></b></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-center">
    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#ModalHapusSemuaAngsuran" data-id="<?php echo "$id_pinjaman"; ?>" title="Hapus Semua Angsuran Pinjaman">
        <i class="bi bi-trash"></i> Hapus Angsuran
    </button>
</div>
<?php } ?>