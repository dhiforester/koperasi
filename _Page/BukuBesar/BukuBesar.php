<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman laporan buku besar.';
                echo '  Laporan ini menampilkan akumulasi transaksi saldo berdasarkan jurnal pada masing-masing akun.';
                echo '  Untuk menampilkan laporan, pilih akun keuangan dan periode transaksi yang diinginkan.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBukuBesar">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <select name="id_perkiraan" id="id_perkiraan" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                        //Menampilkan Akun Perkiraan
                                        $QryAkun = mysqli_query($Conn, "SELECT*FROM akun_perkiraan ORDER BY nama ASC");
                                        while ($DataAkun = mysqli_fetch_array($QryAkun)) {
                                            $id_perkiraan= $DataAkun['id_perkiraan'];
                                            $nama= $DataAkun['nama'];
                                            echo '<option value="'.$id_perkiraan.'">'.$nama.'</option>';
                                        }
                                    ?>
                                </select>
                                <small>Akun</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="date" name="periode1" id="periode1" class="form-control">
                                <small>Periode Awal</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="date" name="periode2" id="periode2" class="form-control">
                                <small>Periode Akhir</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Taapilkan Data Buku Besar">
                                    <i class="bi bi-search"></i> Tampilkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelBukuBesar">
                    <?php
                        echo '<div class="card-body">';
                        echo '  <div class="row">';
                        echo '      <div class="col-md-12 text-center text-danger">';
                        echo '          <div class="alert alert-danger" role="alert">';
                        echo '              <b>Keterangan :</b><br>';
                        echo '              Pastikan anda mengisi semua keterangan pada form dan silahkan lanjutkan dengan memilih tombol cari<br>';
                        echo '          </div>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '</div>';
                        echo '<div class="card-footer">';
                        echo '  <div class="row">';
                        echo '      <div class="col-md-12 text-center">';
                        echo '      </div>';
                        echo '  </div>';
                        echo '</div>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>