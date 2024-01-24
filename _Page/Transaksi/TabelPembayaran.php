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
?>
    <div class="table table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th><b>No</b></th>
                    <th><b>Tanggal</b></th>
                    <th><b>Supplier</b></th>
                    <th><b>Anggota</b></th>
                    <th><b>Petugas</b></th>
                    <th><b>Jumlah</b></th>
                    <th><b>Opsi</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi'"));
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="8" class="text-center">';
                        echo '      <span class="text-danger">Tidak Ada Data Pembayaran Untuk Transaksi Ini</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        $JumlahPembayaran=0;
                        //KONDISI PENGATURAN MASING FILTER
                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi' ORDER BY id_pembayaran ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_pembayaran = $data['id_pembayaran'];
                            $id_akses = $data['id_akses'];
                            $id_anggota = $data['id_anggota'];
                            $id_supplier = $data['id_supplier'];
                            $kategori = $data['kategori'];
                            $tanggal = $data['tanggal'];
                            $metode = $data['metode'];
                            $jumlah = $data['jumlah'];
                            //Format rupiah
                            $TagihanRp = "Rp " . number_format($jumlah,0,',','.');
                            $strtotime=strtotime($tanggal);
                            $tanggal=date('d/m/Y H:i',$strtotime);
                            //Buka data petugas
                            if(!empty($data['id_akses'])){
                                $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                $DataAkses = mysqli_fetch_array($QryAkses);
                                if(empty($DataAkses['nama_akses'])){
                                    $NamaAkses="None";
                                }else{
                                    $NamaAkses= $DataAkses['nama_akses'];
                                }
                            }else{
                                $NamaAkses="None";
                            }
                            //Buka data asnggota
                            if(!empty($data['id_anggota'])){
                                $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                                $DataAnggota = mysqli_fetch_array($QryAnggota);
                                if(empty($DataAnggota['nama'])){
                                    $NamaAnggota="None";
                                }else{
                                    $NamaAnggota= $DataAnggota['nama'];
                                }
                            }else{
                                $NamaAnggota="None";
                            }
                            //Buka Supplier
                            if(!empty($data['id_supplier'])){
                                $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                                $DataSupplier = mysqli_fetch_array($QrySupplier);
                                $NamaSupplier= $DataSupplier['nama_supplier'];
                            }else{
                                $NamaSupplier="None";
                            }
                            $JumlahPembayaran=$JumlahPembayaran+$jumlah;
                    ?>
                        <tr tabindex="0" class="table-light">
                            <td class="text-center" align="center"><?php echo "<small>$no</small>";?></td>    
                            <td class="text-left" align="left">
                                <?php 
                                    echo '<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailPembayaran" data-id="'.$id_pembayaran.'" title="Detail Pembayaran">';
                                    echo "  <b><i class='bi bi-calendar-check'></i> $tanggal</b><br>";
                                    echo '</a>';
                                    echo "<small><i class='bi bi-tag'></i> $kategori</small>";
                                ?>
                            </td>
                            
                            <td class="text-left" align="left">
                                <?php 
                                    echo "<small><i class='bi bi-truck'></i> $NamaSupplier</small>";
                                ?>
                            </td>
                            <td class="text-left" align="left">
                                <?php 
                                    echo "<small><i class='bi bi-people'></i> $NamaAnggota</small>";
                                ?>
                            </td>
                            <td class="text-left" align="left">
                                <?php 
                                    echo "<small><i class='bi bi-person-circle'></i> $NamaAkses</small>";
                                ?>
                            </td>
                            <td class="text-left" align="right">
                                <?php 
                                    echo "<b>$TagihanRp</b><br>";
                                    echo "<small>$metode</small>";
                                ?>
                            </td>
                            <td class="text-center" align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-success" title="Edit Pembayaran"  data-bs-toggle="modal" data-bs-target="#ModalEditPembayaran" data-id="<?php echo "$id_pembayaran"; ?>">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" title="Hapus Pembayaran"  data-bs-toggle="modal" data-bs-target="#ModalHapusPembayaran" data-id="<?php echo "$id_pembayaran"; ?>">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php
                            $no++; 
                        } 
                        $JumlahPembayaran = "Rp " . number_format($JumlahPembayaran,0,',','.');
                    ?>
                        <tr>
                            <td></td>
                            <td colspan="4"><b>JUMLAH PEMBAYARAN</b></td>
                            <td class="text-left" align="right"><b><?php echo "$JumlahPembayaran"; ?></b></td>
                            <td></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>