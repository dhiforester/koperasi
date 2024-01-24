<?php
    //koneksi
    include "../../_Config/Connection.php";
    //Tangkap periode1
    if(empty($_POST['periode1'])){
        echo '<div class="card-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '          <div class="alert alert-danger" role="alert">';
        echo '              Periode Awal Tidak Boleh Kosong';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
       //Tangkap periode2
        if(empty($_POST['periode2'])){
            echo '<div class="card-body">';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center">';
            echo '          <div class="alert alert-danger" role="alert">';
            echo '              Periode Akhir Tidak Boleh Kosong';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            //Tangkap akun_pemasukan
            if(empty($_POST['akun_pemasukan'])){
                echo '<div class="card-body">';
                echo '  <div class="row">';
                echo '      <div class="col-md-12 text-center">';
                echo '          <div class="alert alert-danger" role="alert">';
                echo '              Akun Pemasukan Tidak Boleh Kosong';
                echo '          </div>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }else{
                //Tangkap akun_pengeluaran
                if(empty($_POST['akun_pengeluaran'])){
                    echo '<div class="card-body">';
                    echo '  <div class="row">';
                    echo '      <div class="col-md-12 text-center">';
                    echo '          <div class="alert alert-danger" role="alert">';
                    echo '              Akun Pengeluaran Tidak Boleh Kosong';
                    echo '          </div>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                }else{
                    $periode2=$_POST['periode2'];
                    $periode1=$_POST['periode1'];
                    $akun_pemasukan=$_POST['akun_pemasukan'];
                    $akun_pengeluaran=$_POST['akun_pengeluaran'];
                    $akun_pengeluaran=$_POST['akun_pengeluaran'];
?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><b>No</b></th>
                                                <th class="text-center"><b>Tanggal</b></th>
                                                <th class="text-center"><b>Kode Akun</b></th>
                                                <th class="text-center"><b>Transaksi</b></th>
                                                <th class="text-center"><b>Jumlah</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>A.</b></td>
                                                <td colspan="4"><b>Transaksi Pemasukan</b></td>
                                            </tr>
                                            <?php
                                                //Data pemasukan
                                                $NoPemasukan = 1;
                                                $JumlahPemasukan=0;
                                                //KONDISI PENGATURAN MASING FILTER
                                                $QryJurnal = mysqli_query($Conn, "SELECT*FROM jurnal WHERE (kode_perkiraan like '%$akun_pemasukan%') AND (tanggal>='$periode1') AND (tanggal<='$periode2' OR tanggal<='0') ORDER BY id_jurnal DESC");
                                                while ($DataJurnal = mysqli_fetch_array($QryJurnal)) {
                                                    $id_jurnal= $DataJurnal['id_jurnal'];
                                                    $id_perkiraan= $DataJurnal['id_perkiraan'];
                                                    $tanggal= $DataJurnal['tanggal'];
                                                    $kode_perkiraan= $DataJurnal['kode_perkiraan'];
                                                    $nama_perkiraan= $DataJurnal['nama_perkiraan'];
                                                    $d_k= $DataJurnal['d_k'];
                                                    $nilai= $DataJurnal['nilai'];
                                                    $NominalRp = "Rp " . number_format($nilai,0,',','.');
                                                    $JumlahPemasukan=$JumlahPemasukan+$nilai;
                                                    if(empty($DataJurnal['id_transaksi'])){
                                                        if(empty($DataJurnal['id_simpanan'])){
                                                            if(empty($DataJurnal['id_pinjaman_angsuran'])){
                                                                if(empty($DataJurnal['id_pinjaman'])){
                                                                    if(empty($DataJurnal['id_shu_session'])){
                                                                        $LabelTransaksi="<span class='text-danger'>None</span>";
                                                                    }else{
                                                                        $id_shu_session = $DataJurnal['id_shu_session'];
                                                                        //buka SHU
                                                                        $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                                                        $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                                                        $sesi_shu= $DatabagiHasil['sesi_shu'];
                                                                        $LabelTransaksi="<span class='text-success'>Bagi Hasil $sesi_shu ID.$id_shu_session</span>";
                                                                    }
                                                                }else{
                                                                    $id_pinjaman = $DataJurnal['id_pinjaman'];
                                                                    //buka pinjaman
                                                                    $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                                                    $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                                                    $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                                                    $LabelTransaksi="<span class='text-success'>Pinjaman $tanggal_pinjaman ID.$id_pinjaman</span>";
                                                                }
                                                            }else{
                                                                $id_pinjaman_angsuran = $DataJurnal['id_pinjaman_angsuran'];
                                                                //buka Angsuran
                                                                $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                                                                $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                                                $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                                                $LabelTransaksi="<span class='text-success'>Angsuran $KategoriTransaksi ID.$id_pinjaman_angsuran</span>";
                                                            }
                                                        }else{
                                                            $id_simpanan = $DataJurnal['id_simpanan'];
                                                            //buka Simpanan
                                                            $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                                                            $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                                                            $KategoriTransaksi= $DataSimpanan['kategori'];
                                                            $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                                                        }
                                                    }else{
                                                        $id_transaksi = $DataJurnal['id_transaksi'];
                                                        //buka Transaksi
                                                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                                        $KategoriTransaksi= $DataTransaksi['kategori'];
                                                        $LabelTransaksi="<span class='text-success'>Tansaksi $KategoriTransaksi ID.$id_transaksi</span>";
                                                    }
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">A.'.$NoPemasukan.'</td>';
                                                    echo '  <td class="text-left">'.$tanggal.'</td>';
                                                    echo '  <td class="text-left">'.$kode_perkiraan.' '.$nama_perkiraan.'</td>';
                                                    echo '  <td class="text-left">'.$LabelTransaksi.'</td>';
                                                    echo '  <td class="text-right">'.$NominalRp.'</td>';
                                                    echo '</tr>';
                                                    $NoPemasukan++;
                                                }
                                            ?>
                                            <tr>
                                                <td><b>B.</b></td>
                                                <td colspan="4"><b>Transaksi Pengeluaran</b></td>
                                            </tr>
                                            <?php
                                                //Data Pengeluaran
                                                $NoPengeluaran = 1;
                                                $JumlahPengeluaran=0;
                                                //KONDISI PENGATURAN MASING FILTER
                                                $QryJurnal = mysqli_query($Conn, "SELECT*FROM jurnal WHERE (kode_perkiraan like '%$akun_pengeluaran%') AND (tanggal>='$periode1') AND (tanggal<='$periode2') ORDER BY id_jurnal DESC");
                                                while ($DataJurnal = mysqli_fetch_array($QryJurnal)) {
                                                    $id_jurnal= $DataJurnal['id_jurnal'];
                                                    $id_perkiraan= $DataJurnal['id_perkiraan'];
                                                    $tanggal= $DataJurnal['tanggal'];
                                                    $kode_perkiraan= $DataJurnal['kode_perkiraan'];
                                                    $nama_perkiraan= $DataJurnal['nama_perkiraan'];
                                                    $d_k= $DataJurnal['d_k'];
                                                    $nilai= $DataJurnal['nilai'];
                                                    $NominalRp = "Rp " . number_format($nilai,0,',','.');
                                                    if(empty($DataJurnal['id_transaksi'])){
                                                        if(empty($DataJurnal['id_simpanan'])){
                                                            if(empty($DataJurnal['id_pinjaman_angsuran'])){
                                                                if(empty($DataJurnal['id_pinjaman'])){
                                                                    if(empty($DataJurnal['id_shu_session'])){
                                                                        $LabelTransaksi="<span class='text-danger'>None</span>";
                                                                    }else{
                                                                        $id_shu_session = $DataJurnal['id_shu_session'];
                                                                        //buka SHU
                                                                        $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                                                        $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                                                        $sesi_shu= $DatabagiHasil['sesi_shu'];
                                                                        $LabelTransaksi="<span class='text-success'>Bagi Hasil $sesi_shu ID.$id_shu_session</span>";
                                                                    }
                                                                }else{
                                                                    $id_pinjaman = $DataJurnal['id_pinjaman'];
                                                                    //buka pinjaman
                                                                    $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                                                    $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                                                    $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                                                    $LabelTransaksi="<span class='text-success'>Pinjaman $tanggal_pinjaman ID.$id_pinjaman</span>";
                                                                }
                                                            }else{
                                                                $id_pinjaman_angsuran = $DataJurnal['id_pinjaman_angsuran'];
                                                                //buka Angsuran
                                                                $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                                                                $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                                                $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                                                $LabelTransaksi="<span class='text-success'>Angsuran $KategoriTransaksi ID.$id_pinjaman_angsuran</span>";
                                                            }
                                                        }else{
                                                            $id_simpanan = $DataJurnal['id_simpanan'];
                                                            //buka Simpanan
                                                            $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                                                            $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                                                            $KategoriTransaksi= $DataSimpanan['kategori'];
                                                            $LabelTransaksi="<span class='text-success'>$KategoriTransaksi ID.$id_simpanan</span>";
                                                        }
                                                    }else{
                                                        $id_transaksi = $DataJurnal['id_transaksi'];
                                                        //buka Transaksi
                                                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                                        $KategoriTransaksi= $DataTransaksi['kategori'];
                                                        $LabelTransaksi="<span class='text-success'>Tansaksi $KategoriTransaksi ID.$id_transaksi</span>";
                                                    }
                                                    $JumlahPengeluaran=$JumlahPengeluaran+$nilai;
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">A.'.$NoPengeluaran.'</td>';
                                                    echo '  <td class="text-left">'.$tanggal.'</td>';
                                                    echo '  <td class="text-left">'.$LabelTransaksi.'</td>';
                                                    echo '  <td class="text-right">'.$NominalRp.'</td>';
                                                    echo '</tr>';
                                                    $NoPengeluaran++;
                                                }
                                                $JumlahPengeluaranRp = "Rp " . number_format($JumlahPengeluaran,0,',','.');
                                                $JumlahPemasukanRp = "Rp " . number_format($JumlahPemasukan,0,',','.');
                                                $LabaRugi=$JumlahPemasukan-$JumlahPengeluaran;
                                                $LabaRugiRp = "Rp " . number_format($LabaRugi,0,',','.');
                                                echo '<tr>';
                                                echo '  <td class="text-center"></td>';
                                                echo '  <td class="text-left" colspan="3"><b>JUMLAH PEMASUKAN</b></td>';
                                                echo '  <td class="text-right"><b>'.$JumlahPemasukanRp.'</b></td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '  <td class="text-center"></td>';
                                                echo '  <td class="text-left" colspan="3"><b>JUMLAH PENGELUARAN</b></td>';
                                                echo '  <td class="text-right"><b>'.$JumlahPengeluaranRp.'</b></td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '  <td class="text-center"></td>';
                                                echo '  <td class="text-left" colspan="3"><b>LABA/RUGI</b></td>';
                                                echo '  <td class="text-right"><b>'.$LabaRugiRp.'</b></td>';
                                                echo '</tr>';
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="_Page/LabaRugi/CetakLabaRugi.php?periode1=<?php echo "$periode1"; ?>&periode2=<?php echo "$periode2"; ?>&pemasukan=<?php echo "$akun_pemasukan"; ?>&pengeluaran=<?php echo "$akun_pengeluaran"; ?>" class="btn btn-md btn-dark btn-rounded">
                                    <i class="bi bi-printer"></i> Cetak
                                </a>
                            </div>
                        </div>
                    </div>
<?php
                }
            }
        }
    }
?>