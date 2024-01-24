<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_kelas
    if(empty($_POST['id_perkiraan'])){
        echo '<div class="modal-body p-0">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3 text-danger text-center">';
        echo '          Mohon Maaf!! ID Akun Perkiraan Tidak Dapat didefinisikan.<br>';
        echo '          Hubungi admin aplikasi untuk permasalahn berikut ini.<br>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <button type="button" class="btn btn-sm btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '      <i class="bi bi-x-circle"></i> Tutup';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_perkiraan=$_POST['id_perkiraan'];
        //Buka Data Akun Perkiraan
        $Qry = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        $kode = $Data['kode'];
        $rank = $Data['rank'];
        $nama = $Data['nama'];
        $level = $Data['level'];
        $saldo_normal = $Data['saldo_normal'];
        $status = $Data['status'];
        //WARNA TEXT
        if($saldo_normal=='Kredit'){
            $LabelSaldo="<b class='text-danger'>$saldo_normal</b>";
        }else{
            $LabelSaldo="<b class='text-info'>$saldo_normal</b>";
        }
        //Label Status
        if($status==''){
            $LabelStatus="<b class=''>None</b>";
        }else{
            if($status=='Closed'){
                $LabelStatus="<b class='text-success'><i class='ti-lock'></i> Closed</b>";
            }else{
                $LabelStatus="<b class='text-info'><i class='ti-unlock'></i> Open</b>";
            }
        }
        //Jumlah Anak Akun
        $jml_anak_akun = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE kd$level='$kode' AND level>'$level'"));
?>
    <div class="modal-body">
        <!-- <div class="row">
            <div class="col-md-12 mb-3">
                <div id="NotifikasiEditKelas">
                    <span class="text-primary">
                        Berikut ini adalah detail data akun keuangan. Silahkan gunakan tombol pada bagian footer untuk mengelola data tersebut.
                    </span>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12 mb-3 table-responsive">
                <table class="table table-hover">
                    <tr>
                        <td class=""><strong>Kode Akun</strong></td>
                        <td><b>:</b></td>
                        <td><?php echo "$kode";?></td>
                    </tr>
                    <tr>
                        <td class=""><b>Nama Akun</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$nama";?></td>
                    </tr>
                    <tr>
                        <td class=""><b>Level</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$level";?></td>
                    </tr>
                    <tr>
                        <td class=""><b>Saldo Normal</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$LabelSaldo";?></td>
                    </tr>
                    <tr>
                        <td class=""><b>Status</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$LabelStatus";?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php if($status!=="Closed"){ ?>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="btn-group w-100">
                    <button type="button" class="btn btn-sm btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahAkunPerkiraan" data-id="<?php echo "$id_perkiraan";?>" title="Tambah Anak Akun">
                        <i class="bi bi-plus"></i> Tambah
                    </button>
                    <button type="button" class="btn btn-sm btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalEditAkunPerkiraan" data-id="<?php echo "$id_perkiraan";?>" title="Edit/Ubah Akun">
                        <i class="bi bi-pencil-square"></i> Edit
                    </button>
                    <button type="button" class="btn btn-sm btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalDeleteAkunPerkiraan" data-id="<?php echo "$id_perkiraan";?>" title="Hapus Data Akun">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
        <?php }if(!empty($jml_anak_akun)){ ?>
            <div class="row">
                <div class="col-md-12 mb-3 table-responsive" style="height: 250px; overflow-y: scroll;">
                    <?php
                        if(empty($jml_anak_akun)){
                            echo "Tidak ada Sub-Akun untuk data ini.";
                        }else{
                            echo '<table class="table table-hover">';
                            echo '  <thead>';
                            echo '      <tr>';
                            echo '          <th><b class="sub-title">No</b></th>';
                            echo '          <th><b class="sub-title">Kode</b></th>';
                            echo '          <th class="sub-title">Akun Perkiraan</th>';
                            echo '          <th class="sub-title">Level</th>';
                            echo '          <th class="sub-title">Saldo Normal</th>';
                            echo '          <th class="sub-title">Status</th>';
                            echo '      </tr>';
                            echo '  </thead>';
                            echo '  <tbody>';
                            $no = 1;
                            //KONDISI PENGATURAN MASING FILTER
                            $query = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level='$kode' AND level>'$level' ORDER BY kode ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                $id_perkiraan_data = $data['id_perkiraan'];
                                $kode_perkiraan = $data['kode'];
                                $nama_perkiraan = $data['nama'];
                                $level_perkiraan= $data['level'];
                                $saldo_normal= $data['saldo_normal'];
                                $status_data= $data['status'];
                                //Label Status
                                if($status_data==''){
                                    $LabelStatusData="<b class=''>None</b>";
                                }else{
                                    if($status_data=='Closed'){
                                        $LabelStatusData="<b class='text-success'><i class='ti-lock'></i> Closed</b>";
                                    }else{
                                        $LabelStatusData="<b class='text-info'><i class='ti-unlock'></i> Open</b>";
                                    }
                                }
                                echo '      <tr>';
                                echo '          <td>'.$no.'</td>';
                                echo '          <td>'.$kode_perkiraan.'</td>';
                                echo '          <td>'.$nama_perkiraan.'</td>';
                                echo '          <td>'.$level_perkiraan.'</td>';
                                echo '          <td>'.$saldo_normal.'</td>';
                                echo '          <td>'.$LabelStatusData.'</td>';
                                echo '      </tr>';
                                $no++;
                            }
                            echo '  </tbody>';
                            echo '</table>';
                        }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="modal-footer bg-info">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div>
                    <button type="button" class="btn btn-sm btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>