<?php
    //koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Dataset
    if(empty($_POST['Dataset'])){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '  Anda harus memilih dataset terlebih dulu!.';
        echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }else{
        if(empty($_POST['mode_waktu'])){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '  Mode waktu tidak boleh kosong!.';
            echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }else{
            if(empty($_POST['Tahun'])){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo '  Informasi waktu <b>Tahun</b> tidak boleh kosong!.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            }else{
                $Dataset=$_POST['Dataset'];
                $mode_waktu=$_POST['mode_waktu'];
                $Tahun=$_POST['Tahun'];
                if(!empty($_POST['Bulan'])){
                    $Bulan=$_POST['Bulan'];
                }else{
                    $Bulan="";
                }
                //Inisiasi informasi waktu
                if($mode_waktu=="Tahunan"){
                    $InformasiWaktu=$Tahun;
                }else{
                    $InformasiWaktu="$Tahun-$Bulan";
                }
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE datetime_log like '%$InformasiWaktu%'"));
?>
                <div class="card-body">
                    <div class="row mt-0">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <small><b>Jumlah Data :</b> <?php echo "$jml_data"; ?></small>
                                <table class="table table-hover table-bordered align-items-center mb-0">
                                    <thead class="">
                                        <tr>
                                            <th class="text-center">
                                                <b>No</b>
                                            </th>
                                            <th class="text-center">
                                                <b>Dataset</b>
                                            </th>
                                            <th class="text-center">
                                                <b>Frekuensi</b>
                                            </th>
                                            <th class="text-center">
                                                <b>Persentase</b>
                                            </th>
                                            <th class="text-center">
                                                <b>Opsi</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $Jumlah=0;
                                            if(empty($jml_data)){
                                                echo '<tr>';
                                                echo '  <td colspan="5" class="text-center text-danger">';
                                                echo '      Data Log Tidak Ditemukan';
                                                echo '  </td>';
                                                echo '</tr>';
                                            }else{
                                                $no = 1;
                                                $JumlahPersentase=0;
                                                //MENAMPILKAN DATA DISTINCT BERDASARKAN FILTER
                                                $query = mysqli_query($Conn, "SELECT DISTINCT $Dataset FROM log WHERE datetime_log like '%$InformasiWaktu%' ORDER BY $Dataset ASC");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $ListDataset= $data[$Dataset];
                                                    if($Dataset=="id_akses"){
                                                        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$ListDataset'")or die(mysqli_error($Conn));
                                                        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                                                        $InformasiDataset= $DataDetailAkses['nama_akses'];
                                                    }else{
                                                        $InformasiDataset=$ListDataset;
                                                    }
                                                    //Menghitung jumlah masing-masing dataset
                                                    $JumlahDataset = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE ($Dataset='$ListDataset') AND (datetime_log like '%$InformasiWaktu%')"));
                                                    $Persentase=($JumlahDataset/$jml_data)*100;
                                                    $Persentase=round($Persentase,2);
                                                    $Jumlah=$Jumlah+$JumlahDataset;
                                                    $JumlahPersentase=$JumlahPersentase+$Persentase;
                                            ?>
                                        <tr>
                                            <td class="text-center text-xs">
                                                <small><?php echo "$no" ?></small>
                                            </td>
                                            <td class="text-left" align="left">
                                                <small><?php echo "$InformasiDataset" ?></small>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php 
                                                    echo "<small>$JumlahDataset Record</small>";
                                                ?>
                                            </td>
                                            <td class="text-center" align="center">
                                                <?php 
                                                    echo "<small>$Persentase%</small>";
                                                ?>
                                            </td>
                                            <td class="text-left" align="center">
                                                <a href="_Page/Aktivitas/ProsesDownloadAktivitas.php?dataset=<?php echo $Dataset;?>&listdataset=<?php echo "$ListDataset";?>&periode=<?php echo "$mode_waktu";?>&Tahun=<?php echo "$Tahun";?>&Bulan=<?php echo "$Bulan";?>" target="_blank" class="btn btn-sm btn-success">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++; }}
                                        ?>
                                        <tr>
                                            <td class="text-center text-xs"></td>
                                            <td class="text-left" align="left">
                                                <b>JUMLAH</b>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php 
                                                    echo "<small>$JumlahDataset Record</small>";
                                                ?>
                                            </td>
                                            <td class="text-center" align="center">
                                                <?php 
                                                    echo "<small>$JumlahPersentase%</small>";
                                                ?>
                                            </td>
                                            <td class="text-left" align="center"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
            }
        }
    }
?>