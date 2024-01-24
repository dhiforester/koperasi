<?php
    //koneksi dan session
    ini_set("display_errors","off");
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
                                    <b>Keterangan</b>
                                </th>
                                <th class="text-center">
                                    <b>Jumlah</b>
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
                                        //Buka Akses
                                        $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                        $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
                                        $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <small><?php echo "$no";?></small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-calendar-check"></i> '.$tanggal.'';
                                        ?>  
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-person-circle"></i> '.$NamaAksesTransaksi.'';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-tag"></i> '.$kategori.'';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php 
                                            echo ''.$keterangan.'';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-right" align="right">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-coin"></i> '.$jumlah.'';
                                        ?>
                                    </small>
                                </td>
                            </tr>
                            <?php
                                        $no++; }
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
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="4" align="left">
                                    <b>JUMLAH PENARIKAN</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$JumlahPenarikan</b>"; ?>
                                </td>
                            </tr>
                            <tr class="text-success">
                                <td></td>
                                <td colspan="4" align="left">
                                    <b>SIMPANAN NETTO</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$SimpananNetto</b>"; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
       
    </div>
<?php } ?>