<div class="card mt-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10 mb-2">
                <b class="card-title">
                    <i class="bi bi-tag"></i> Multi Satuan
                </b>
            </div>
            <div class="col-md-2 mb-2">
                <a href="javascript:void(0);" class="btn btn-sm btn-success mt-2 mb-2 w-100" data-bs-toggle="modal" data-bs-target="#ModalTambahSatuan" data-id="<?php echo "$id_barang"; ?>">
                    <i class="bi bi-plus"></i> Tambah Satuan
                </a>
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
                                <b>Kode</b>
                            </th>
                            <th class="text-center">
                                <b>Satuan</b>
                            </th>
                            <th class="text-center">
                                <b>Konversi</b>
                            </th>
                            <th class="text-center">
                                <b>Stok</b>
                            </th>
                            <th class="text-center">
                                <b>Option</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center text-xs"><small >1</small></td>
                            <td align="left"><small><?php echo "$kode_barang"; ?></small></td>
                            <td class="text-left" align="left">
                                <?php 
                                    echo "<small>$satuan_barang</small>";
                                ?>
                            </td>
                            <td class="text-left" align="left">
                                <?php 
                                    echo "<small>$konversi</small>";
                                ?>
                            </td>
                            <td class="text-left" align="left">
                                <?php 
                                    echo "<small>$stok_barang $satuan_barang</small>";
                                ?>
                            </td>
                            <td align="center">Satuan Utama</td>
                        </tr>
                        <?php
                            //Menghitung jumlah data barang_satuan
                            $JumlahSatuanBarang=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_satuan WHERE id_barang='$id_barang'"));
                            if(empty($JumlahSatuanBarang)){
                                echo '<tr>';
                                echo '  <td class="text-center" colspan="6">';
                                echo '      Belum ada data satuan barang';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no=2;
                                $QrySatauan=mysqli_query($Conn, "SELECT*FROM barang_satuan WHERE id_barang='$id_barang' ORDER BY id_barang_satuan ASC");
                                while ($DataSatuan = mysqli_fetch_array($QrySatauan)) {
                                    $id_barang_satuan=$DataSatuan['id_barang_satuan'];
                                    $id_barang=$DataSatuan['id_barang'];
                                    $kode_barang=$DataSatuan['kode_barang'];
                                    $satuan_multi=$DataSatuan['satuan_multi'];
                                    $konversi_multi=$DataSatuan['konversi_multi'];
                                    $stok_multi=$DataSatuan['stok_multi'];
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo "<small >$no</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small >$kode_barang</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$satuan_multi</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$konversi_multi</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$stok_multi $satuan_multi</small>";
                                    ?>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-success btn-sm btn-floating" data-bs-toggle="modal" data-bs-target="#ModalEditSatuan" data-id="<?php echo "$id_barang_satuan"; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>  
                                    <button type="button" class="btn btn-danger btn-sm btn-floating" data-bs-toggle="modal" data-bs-target="#ModalDeleteSatuan" data-id="<?php echo "$id_barang_satuan"; ?>">
                                        <i class="bi bi-x"></i>
                                    </button>  
                                </td>
                            </tr>
                        <?php $no++;}} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <small class="credit">
            
        </small>
    </div>
</div>