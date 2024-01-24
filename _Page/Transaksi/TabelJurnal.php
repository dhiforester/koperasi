<?php
    include "../../_Config/Connection.php";
    //Tangkap id_akses
    if(empty($_POST['id_transaksi'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Transaksi Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_transaksi = $DataTransaksi['id_transaksi'];
        $id_akses= $DataTransaksi['id_akses'];
        $tanggal= $DataTransaksi['tanggal'];
        $kategori= $DataTransaksi['kategori'];
        $tagihan= $DataTransaksi['tagihan'];
        $pembayaran= $DataTransaksi['pembayaran'];
        $metode= $DataTransaksi['metode'];
        $status= $DataTransaksi['status'];
        $pembayaran = "Rp " . number_format($pembayaran,2,',','.');
        $tagihan = "Rp " . number_format($tagihan,2,',','.');
?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 mb-3">
                    <b class="card-title">Jurnal Transaksi</b>
                </div>
                <div class="col-md-3 mb-3">
                    <button type="button" class="btn btn-sm btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahJurnal" data-id="<?php echo "$id_transaksi";?>">
                        <i class="bi bi-plus"></i> Tambah Jurnal
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th><b>No</b></th>
                                    <th><b>Tanggal</b></th>
                                    <th><b>ID Trans</b></th>
                                    <th><b>Akun Perkiraan</b></th>
                                    <th><b>Debet</b></th>
                                    <th><b>Kredit</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_transaksi='$id_transaksi'"));
                                    if(empty($jml_data)){
                                        echo '<tr>';
                                        echo '  <td colspan="7" class="text-center">';
                                        echo '      <span class="text-danger">No Data</span>';
                                        echo '  </td>';
                                        echo '</tr>';
                                        $JumlahDebet=0;
                                        $JumlahKredit=0;
                                    }else{
                                        $no = 1;
                                        $JumlahDebet=0;
                                        $JumlahKredit=0;
                                        //KONDISI PENGATURAN MASING FILTER
                                        $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_transaksi='$id_transaksi' ORDER BY id_jurnal ASC");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_jurnal = $data['id_jurnal'];
                                            $id_transaksi = $data['id_transaksi'];
                                            $id_perkiraan = $data['id_perkiraan'];
                                            $tanggal = $data['tanggal'];
                                            $tanggal=strtotime($tanggal);
                                            $tanggal=date('d/m/y', $tanggal);
                                            if(empty($id_transaksi)){
                                                $LabelTransaksi="<span class='text-danger'>None</span>";
                                            }else{
                                                //buka Transaksi
                                                $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                                $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                                $KategoriTransaksi= $DataTransaksi['kategori'];
                                                $LabelTransaksi="<span class='text-success'>$id_transaksi-$KategoriTransaksi</span>";
                                            }
                                            $kode_perkiraan = $data['kode_perkiraan'];
                                            $nama_perkiraan = $data['nama_perkiraan'];
                                            $d_k= $data['d_k'];
                                            $nilai= $data['nilai'];
                                            //Format rupiah
                                            $NominalRp = "Rp " . number_format($nilai,0,',','.');

                                    ?>
                                        <tr tabindex="0" class="table-light" data-bs-toggle="modal" data-bs-target="#ModalDetailJurnal" data-id="<?php echo "$id_jurnal";?>" onmousemove="this.style.cursor='pointer'">
                                            <td class="text-center" align="center"><?php echo "<small>$no</small>";?></td>    
                                            <td class="text-left" align="left"><?php echo "<small>$tanggal</small>";?></td>
                                            <td class="text-left" align="left"><?php echo "<small>$LabelTransaksi</small>";?></td>
                                            <td class="text-left" align="left"><?php echo "<small>$kode_perkiraan $nama_perkiraan</small>";?></td>
                                            <td class="text-right" align="right">
                                                <?php 
                                                    if($d_k=="Debet"){
                                                        $JumlahDebet=$JumlahDebet+$nilai;
                                                        $JumlahKredit=$JumlahKredit+0;
                                                        echo "<small>$NominalRp</small>";
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-right" align="right">
                                                <?php 
                                                    if($d_k=="Kredit"){
                                                        $JumlahDebet=$JumlahDebet+0;
                                                        $JumlahKredit=$JumlahKredit+$nilai;
                                                        echo "<small>$NominalRp</small>";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    $no++; } }
                                    $JumlahDebetRp = "Rp " . number_format($JumlahDebet,0,',','.');
                                    $JumlahKreditRp = "Rp " . number_format($JumlahKredit,0,',','.');
                                ?>
                                <tr>
                                    <td colspan="4">JUMLAH/SALDO</td>
                                    <td class="text-right" align="right">
                                        <small>
                                            <?php echo "$JumlahDebetRp"; ?>
                                        </small>
                                    </td>
                                    <td class="text-right" align="right">
                                        <small>
                                            <?php echo "$JumlahKreditRp"; ?>
                                        </small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-md-3">
                <button type="button" class="btn btn-sm btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#ModalHapusSemuaJurnal" data-id="<?php echo "$id_transaksi";?>">
                    <i class="bi bi-x"></i> Hapus Jurnal
                </button>
            </div>
        </div>
    </div>
<?php } ?>