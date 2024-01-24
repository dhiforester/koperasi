<?php
    ini_set("display_errors","off");
    //Buka data dokter
    if(empty($_GET['id_dokter'])){
        echo '<section class="section dashboard">';
        echo '  <div class="row">';
        echo '      <div class="col-lg-12">';
        echo '          <div class="card">';
        echo '              <div class="card-header">';
        echo '                  <h4>Detail Data Komisi</h4>';
        echo '              </div>';
        echo '              <div class="card-body">';
        echo '                  <div class="row"><div class="col-md-12 text-center">ID Dokter Tidak Boleh Kosong!</div></div>';
        echo '              </div>';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</section>';
    }else{
        $id_dokter=$_GET['id_dokter'];
        //Buka data dokter
        $QryDokter = mysqli_query($Conn,"SELECT * FROM dokter WHERE id_dokter='$id_dokter'")or die(mysqli_error($Conn));
        $DataDokter = mysqli_fetch_array($QryDokter);
        $id_dokter= $DataDokter['id_dokter'];
        $id_akses= $DataDokter['id_akses'];
        $id_mitra= $DataDokter['id_mitra'];
        $nama_dokter= $DataDokter['nama_dokter'];
        $kategori_dokter= $DataDokter['kategori_dokter'];
        $kontak_dokter= $DataDokter['kontak_dokter'];
        $email_dokter= $DataDokter['email_dokter'];
        $deskripsi_dokter= $DataDokter['deskripsi_dokter'];
        $image_dokter= $DataDokter['image_dokter'];
        $datetime= $DataDokter['datetime'];
        //data mitra
        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
        $DataMitra = mysqli_fetch_array($QryMitra);
        if(empty($DataMitra['nama_mitra'])){
            $nama_mitra='<span class="text-danger">None</span>';
        }else{
            $nama_mitra= $DataMitra['nama_mitra'];
        }
        //Menghitung Volume
        $TotalBagiHasil=0;
        $QryKunjungan = mysqli_query($Conn, "SELECT * FROM pasien_kunjungan WHERE id_dokter='$id_dokter' AND id_mitra='$id_mitra' ORDER BY id_kunjungan ASC");
        while ($DataKunjungan = mysqli_fetch_array($QryKunjungan)) {
            $id_kunjungan= $DataKunjungan['id_kunjungan'];
            $nama_pasien= $DataKunjungan['nama_pasien'];
            $datetime_kunjungan= $DataKunjungan['datetime_kunjungan'];
            //Buka Data Transaksi
            $NomorTransaksi = 1;
            $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE id_kunjungan='$id_kunjungan' ORDER BY id_kunjungan ASC");
            while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                $id_transaksi= $DataTransaksi['id_transaksi'];
                //Buka rincian transaksi
                $QryRincian = mysqli_query($Conn, "SELECT * FROM transaksi_rincian WHERE id_transaksi='$id_transaksi' AND id_mitra_tindakan!='' ORDER BY id_transaksi_rincian ASC");
                while ($DataRincian = mysqli_fetch_array($QryRincian)) {
                    $id_transaksi_rincian= $DataRincian['id_transaksi_rincian'];
                    if(!empty($DataRincian['id_mitra_tindakan'])){
                        $id_mitra_tindakan=$DataRincian['id_mitra_tindakan'];
                    }else{
                        $id_mitra_tindakan=0;
                    }
                    $nama_tindakan= $DataRincian['nama_tindakan'];
                    $jumlah= $DataRincian['jumlah'];
                    $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
                    $JumlahKomisi =0;
                    //Membuka jumlah komisi
                    $QryTindakan=mysqli_query($Conn,"SELECT * FROM mitra_tindakan WHERE id_mitra_tindakan='$id_mitra_tindakan'")or die(mysqli_error($Conn));
                    $DataTindakan=mysqli_fetch_array($QryTindakan);
                    if(!empty($DataTindakan['id_mitra_tindakan'])){
                        $id_mitra_tindakan_detail= $DataTindakan['id_mitra_tindakan'];
                        if(!empty($DataTindakan['jasa_dokter'])){
                            $jasa_dokter_detail=$DataTindakan['jasa_dokter'];
                        }else{
                            $jasa_dokter_detail=0;
                        }
                        $TotalBagiHasil=$jasa_dokter_detail+$TotalBagiHasil;
                        $JumlahBagiHasilRp="Rp " . number_format($jasa_dokter_detail,0,',','.');
                    }else{
                        $id_mitra_tindakan_detail="";
                        $jasa_dokter_detail=0;
                        $TotalBagiHasil="";
                        $JumlahBagiHasilRp="";
                    }
                }
            }
        }
        $JumlahKomisiRp = "Rp " . number_format($TotalBagiHasil,0,',','.');
        //Menghitung Pembayaran
        $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='Valid'"));
        $JumlahPencairan = $Sum['jumlah'];
        $JumlahPencairanrp = "Rp " . number_format($JumlahPencairan,0,',','.');

?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <small>
                        <b>Keterangan :</b><br>
                        <ul>
                            <li>
                                Volume komisi adalah jumlah total semua komisi yang diperoleh dari transaksi.
                            </li>
                            <li>
                                Jumlah pencairan adalah jumlah total semua pembayaran komisi.
                            </li>
                            <li>
                                Pencairan bisa dilakukan oleh petugas dengan memilih tombol pencairan.
                            </li>
                            <li>
                                Riwayat jasa tindakan diperoleh dari semua transaksi yang berkaitan dengan mitra dan juru khitan/tenaga medis.
                            </li>
                        </ul>
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Detail Personnel</h4>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=Komisi&Sub=DetailKomisi&id_dokter=<?php echo $id_dokter; ?>" class="btn btn-md btn-warning btn-block btn-rounded">
                                    <i class="bi bi-arrow-repeat"></i> Reload
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=Komisi" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table>
                                    <tr>
                                        <td><b>ID Personnel</b></td>
                                        <td><b>:</b></td>
                                        <td id="GetIdPersonnel"><?php echo "$id_dokter"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Personnel</b></td>
                                        <td><b>:</b></td>
                                        <td><?php echo "$nama_dokter"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Kategori</b></td>
                                        <td><b>:</b></td>
                                        <td><?php echo "$kategori_dokter"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mitra</b></td>
                                        <td><b>:</b></td>
                                        <td><?php echo "$nama_mitra"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Volume Komisi</b></td>
                                        <td><b>:</b></td>
                                        <td><?php echo "$JumlahKomisiRp"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah Pencairan</b></td>
                                        <td><b>:</b></td>
                                        <td><?php echo "$JumlahPencairanrp"; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Riwayat Pencairan Komisi</h4>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahPencairan" data-id="<?php echo "$id_dokter"; ?>">
                                    <i class="bi bi-cash-coin"></i> Pencairan
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalCetakKomisi" data-id="<?php echo "$id_dokter"; ?>">
                                    <i class="bi bi-printer"></i> Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="TabelDetailKomisi">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4>Riwayat Jasa Tindakan</h4>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalCetakRiwayatJasaTindakan" data-id="<?php echo "$id_dokter"; ?>">
                                    <i class="bi bi-printer"></i> Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="MenampilkanRiwayatJasaTindakan">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center text-danger">
                                    Silahkan Isi Periode Terlebih Dulu!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>