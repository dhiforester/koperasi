<?php
    //koneksi
    include "../../_Config/Connection.php";
    //Tangkap periode1
    if(empty($_POST['periode1'])){
        echo '<div class="card-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger">';
        echo '          Periode Awal Tidak Boleh Kosong';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
       //Tangkap periode2
        if(empty($_POST['periode2'])){
            echo '<div class="card-body">';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center text-danger">';
            echo '          Periode Akhir Tidak Boleh Kosong';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $periode2=$_POST['periode2'];
            $periode1=$_POST['periode1'];
            //Menghitung jumlah data
            $JumlahData = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT kategori FROM transaksi WHERE tanggal>='$periode1' AND tanggal<='$periode2'"));
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
                                                <th class="text-center"><b>Status</b></th>
                                                <th class="text-center"><b>Jumlah</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(empty($JumlahData)){
                                                    echo '<tr>';
                                                    echo '  <td class="text-center" colspan="4">Data Transaksi Tidak Ditemukan</td>';
                                                    echo '</tr>';
                                                }
                                                //Data Kategori Transaksi
                                                $NomorKategori = 1;
                                                $QryKategoriTransaksi = mysqli_query($Conn, "SELECT DISTINCT kategori FROM transaksi WHERE tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY kategori ASC");
                                                while ($DataKategori = mysqli_fetch_array($QryKategoriTransaksi)) {
                                                    $kategori= $DataKategori['kategori'];
                                                    echo '<tr>';
                                                    echo '  <td class="text-left"><b>'.$NomorKategori.'.0</b></td>';
                                                    echo '  <td class="text-left" colspan="3"><b>Transaksi '.$kategori.'</b></td>';
                                                    echo '</tr>';
                                                    $NomorTransaksi = 1;
                                                    $JumlahTransaksi=0;
                                                    $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE kategori='$kategori' AND tanggal>='$periode1' AND tanggal<='$periode2' ORDER BY id_transaksi ASC");
                                                    while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                                        $id_transaksi= $DataTransaksi['id_transaksi'];
                                                        $id_akses= $DataTransaksi['id_akses'];
                                                        $tanggal= $DataTransaksi['tanggal'];
                                                        $tagihan= $DataTransaksi['tagihan'];
                                                        $pembayaran= $DataTransaksi['pembayaran'];
                                                        $metode= $DataTransaksi['metode'];
                                                        $status= $DataTransaksi['status'];
                                                        $JumlahTransaksi=$JumlahTransaksi+$pembayaran;
                                                        $pembayaran = "Rp " . number_format($pembayaran,2,',','.');
                                                        $tagihan = "Rp " . number_format($tagihan,2,',','.');
                                                        echo '<tr>';
                                                        echo '  <td class="text-center">'.$NomorKategori.'.'.$NomorTransaksi.'</td>';
                                                        echo '  <td class="text-left">'.$tanggal.'</td>';
                                                        echo '  <td class="text-left">'.$status.'</td>';
                                                        echo '  <td class="text-left">'.$pembayaran.'</td>';
                                                        echo '</tr>';
                                                        $NomorTransaksi++;
                                                    }
                                                    $JumlahTransaksiRp = "Rp " . number_format($JumlahTransaksi,2,',','.');
                                                    echo '<tr>';
                                                    echo '  <td class="text-left"></td>';
                                                    echo '  <td class="text-left" colspan="2"><b>JUMLAH TOTAL</b></td>';
                                                    echo '  <td class="text-right" algn="right"><b>'.$JumlahTransaksiRp.'</b></td>';
                                                    echo '</tr>';
                                                    $NomorKategori++;
                                                }
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
                                <a href="_Page/RekapitulasiTransaksi/CetakRekapitulasiTransaksi.php?periode1=<?php echo "$periode1"; ?>&periode2=<?php echo "$periode2"; ?>" class="btn btn-md btn-dark btn-rounded">
                                    <i class="bi bi-printer"></i> Cetak
                                </a>
                            </div>
                        </div>
                    </div>
<?php
        }
    }
?>