<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_shu_session'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12">';
        echo '      <div class="card">';
        echo '          <div class="card-body">';
        echo '              ID Sessi Tidak Boleh Kosong';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_shu_session='$id_shu_session'"));
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10 mt-3">
                            <b class="card-title">
                                <i class="bi bi-bookmark"></i> Jurnal Bagi Hasil
                            </b>
                        </div>
                        <div class="col-md-2 mt-3">
                            <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahJurnalBagiHasil" data-id="<?php echo "$id_shu_session"; ?>" title="Tambah Jurnal">
                                <i class="bi bi-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <b>No</b>
                                        </th>
                                        <th class="text-center">
                                            <b>Tanggal</b>
                                        </th>
                                        <th class="text-center">
                                            <b>Kode Akun</b>
                                        </th>
                                        <th class="text-center">
                                            <b>Akun Perkiraan</b>
                                        </th>
                                        <th class="text-center">
                                            <b>Debet</b>
                                        </th>
                                        <th class="text-center">
                                            <b>Kredit</b>
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
                                            echo '  <td colspan="7" class="text-center text-danger">';
                                            echo '      Belum Ada Data jurnal';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }else{
                                            $no=1;
                                            $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_shu_session='$id_shu_session' ORDER BY id_jurnal ASC");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id_jurnal = $data['id_jurnal'];
                                                $tanggal = $data['tanggal'];
                                                $tanggal=strtotime($tanggal);
                                                $tanggal=date('d/m/y', $tanggal);
                                                $kode_perkiraan = $data['kode_perkiraan'];
                                                $nama_perkiraan = $data['nama_perkiraan'];
                                                $d_k= $data['d_k'];
                                                $nilai= $data['nilai'];
                                                //Format rupiah
                                                $NominalRp = "Rp " . number_format($nilai,0,',','.');
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo "$no"; ?></td>
                                            <td class="text-left"><?php echo "$tanggal"; ?></td>
                                            <td class="text-left"><?php echo "$kode_perkiraan"; ?></td>
                                            <td class="text-left"><?php echo "$nama_perkiraan"; ?></td>
                                            <td align="right">
                                                <?php 
                                                    if($d_k=="Debet"){
                                                        echo "$NominalRp";
                                                    }else{
                                                        echo "-";
                                                    }
                                                ?>
                                            </td>
                                            <td align="right">
                                                <?php 
                                                    if($d_k=="Kredit"){
                                                        echo "$NominalRp";
                                                    }else{
                                                        echo "-";
                                                    }
                                                ?>
                                            </td>
                                            <td align="center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditJurnal" data-id="<?php echo "$id_jurnal,$id_shu_session"; ?>" title="Edit Data Jurnal">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>  
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusJurnal" data-id="<?php echo "$id_jurnal,$id_shu_session"; ?>" title="Hapus Data Jurnal">
                                                        <i class="bi bi-x"></i>
                                                    </button>  
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                                $no++;
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-block" data-bs-toggle="modal" data-bs-target="#ModalHapusSemuaJurnal" data-id="<?php echo "$id_shu_session"; ?>" title="Hapus Semua Jurnal Bagi Hasil">
                                <i class="bi bi-trash"></i> Hapus Jurnal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>