<?php
    //koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //id_anggota
    if(empty($_POST['id_anggota'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-danger">';
        echo '      ID Anggota Tidak Boeh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_anggota=$_POST['id_anggota'];
        //Jumlah Simpanan
        $SumSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE id_anggota='$id_anggota' AND kategori!='Penarikan'"));
        $JumlahSimpanan1 = $SumSimpanan['jumlah'];
        $JumlahSimpanan = "" . number_format($JumlahSimpanan1,0,',','.');
        //Jumlah Penarikan
        $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE id_anggota='$id_anggota' AND kategori='Penarikan'"));
        $JumlahPenarikan1 = $SumPenarikan['jumlah'];
        $JumlahPenarikan = "" . number_format($JumlahPenarikan1,0,',','.');
        //Simpanan Netto
        $SimpananNetto1=$JumlahSimpanan1-$JumlahPenarikan1;
        $SimpananNetto = "" . number_format($SimpananNetto1,0,',','.');
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$id_anggota'"));
?>
    <div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <b class="card-title">Riwayat Simpanan Anggota</b>
            </div>
            <div class="col-md-2 mt-3">
                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalExportSimpanan" data-id="<?php echo "$id_anggota"; ?>" title="Export Data Simpanan Anggota">
                    <i class="bi bi-download"></i> Export
                </button>
            </div>
        </div>
    </div>
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
                                    <b>Akses/User</b>
                                </th>
                                <th class="text-center">
                                    <b>Kategori</b>
                                </th>
                                <th class="text-center">
                                    <b>Jurnal</b>
                                </th>
                                <th class="text-center">
                                    <b>Jumlah</b>
                                </th>
                                <th class="text-center">
                                    <b>Option</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(empty($jml_data)){
                                    echo '<tr>';
                                    echo '  <td colspan="6" class="text-center">';
                                    echo '      Tidak Ada Data Simpanan';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1;
                                    $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$id_anggota' ORDER BY id_simpanan ASC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_simpanan= $data['id_simpanan'];
                                        $id_akses= $data['id_akses'];
                                        $id_anggota= $data['id_anggota'];
                                        $kategori= $data['kategori'];
                                        $keterangan= $data['keterangan'];
                                        $nama= $data['nama'];
                                        $jumlah= $data['jumlah'];
                                        $tanggal= $data['tanggal'];
                                        $strotime=strtotime($tanggal);
                                        $tanggal=date('d/m/Y',$strotime);
                                        $jumlah = "" . number_format($jumlah,0,',','.');
                                        $IdSimpanan = sprintf("%07d", $id_simpanan);
                                        //Buka Akses
                                        $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                        $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
                                        $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
                                        //Cek Ada jurnal atau tidak
                                        $CekJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_simpanan='$id_simpanan'"));
                                        if(empty($CekJurnal)){
                                            $LabelJurnal='<span class="badge badge-dark" title="Belum Ada Pada Jurnal"><i class="bi bi-x"></i> Journal</span>';
                                        }else{
                                            $LabelJurnal='<span class="badge badge-success" title="Jurnal Tersedia '.$CekJurnal.' record"><i class="bi bi-check-circle"></i> Journal</span>';
                                        }
                            ?>
                                <tr>
                                    <td class="text-center text-xs">
                                        <?php echo "$no" ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small>
                                            <?php 
                                                echo '<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailTabungan" data-id="'.$id_simpanan.'" title="Lihat Detail Simpanan">';
                                                echo '  <b><i class="bi bi-qr-code"></i> '.$IdSimpanan.'</b>';
                                                echo '</a>';
                                                echo '<br>';
                                                echo '<small><i class="bi bi-calendar-check"></i> '.$tanggal.'</small>';
                                            ?>
                                        </small><br>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small>
                                            <?php 
                                                echo '<i class="bi bi-person-circle"></i> '.$nama.'';
                                            ?>
                                        </small>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small>
                                            <?php
                                                echo '<b><i class="bi bi-tag"></i> '.$kategori.'</b><br>';
                                                echo '<i class="bi bi-info-circle"></i> '.$keterangan.'';
                                            ?>
                                        </small>
                                    </td>
                                    <td class="text-center" align="center">
                                        <?php echo "$LabelJurnal";?>
                                    </td>
                                    <td class="text-right" align="right">
                                        <small>
                                            <?php 
                                                echo "$jumlah";
                                            ?>
                                        </small>
                                    </td>
                                    <td align="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditSimpananAnggota" data-id="<?php echo "$id_simpanan,$id_anggota"; ?>" title="Edit Data Simpanan">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>  
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteSimpananAnggota" data-id="<?php echo "$id_simpanan,$id_anggota"; ?>" title="Hapus Data Simpanan">
                                                <i class="bi bi-x"></i>
                                            </button>   
                                        </div>
                                        
                                    </td>
                                </tr>
                            <?php
                                        $no++; }
                                    }
                            ?>
                            <?php
                                $QryKategori = mysqli_query($Conn, "SELECT DISTINCT kategori FROM simpanan");
                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                    $kategori= $DataKategori['kategori'];
                                    //Jumlah Simpanan Kategori
                                    $SumSimpananKategori = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori='$kategori' AND id_anggota='$id_anggota'"));
                                    $JumlahSimpananKategori = $SumSimpananKategori['jumlah'];
                                    $JumlahSimpananKategori = "" . number_format($JumlahSimpananKategori,0,',','.');
                                    echo '<tr>';
                                    echo '  <td></td>';
                                    echo '  <td colspan="4" align="left">'.$kategori.'</td>';
                                    echo '  <td align="right">'.$JumlahSimpananKategori.'</td>';
                                    echo '  <td></td>';
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                                <td></td>
                                <td colspan="4" align="left">
                                    <b>JUMLAH SIMPANAN</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$JumlahSimpanan</b>"; ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="4" align="left">
                                    <b>JUMLAH PENARIKAN</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$JumlahPenarikan</b>"; ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="text-success">
                                <td></td>
                                <td colspan="4" align="left">
                                    <b>SIMPANAN NETTO</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$SimpananNetto</b>"; ?>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-left">
        <i>Jumlah Data <?php echo "$jml_data Record";?></i>
    </div>
<?php } ?>