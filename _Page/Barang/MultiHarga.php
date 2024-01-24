<?php
    $JmlKategori = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga"));
    $jmlKolom=$JmlKategori+4;
?>
<div class="card mt-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10 mt-2">
                <b class="card-title">
                    <i class="bi bi-tag"></i> Multi Harga
                </b>
            </div>
            <dv class="col-md-2 mt-2">
                <!-- <a href="javascript:void(0);" class="btn btn-sm btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahKategoriHarga" data-id="<?php echo "$id_barang"; ?>">
                    <i class="bi bi-plus"></i> Tambah Harga
                </a> -->
            </dv>
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
                                <b>Satuan</b>
                            </th>
                            <th class="text-center">
                                <b>Konversi</b>
                            </th>
                            <th class="text-center">
                                <b>Harga Beli</b>
                            </th>
                            <?php
                                //Buka Kategori Harga
                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                    $KategoriHarga= $DataKategori['kategori_harga'];
                                    echo '<th class="text-center">';
                                    echo '  <b>'.$KategoriHarga.'</b>';
                                    echo '</th>';
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center text-xs">
                                <?php 
                                    echo "<small >1</small>";
                                ?>
                            </td>
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
                            <td class="text-left" align="right">
                                <?php 
                                    echo "<b title='Hanya bisa diubah pada data barang'>$harga_beli_rp</b>";
                                ?>
                            </td>
                            <?php
                                //Buka Kategori Harga
                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                    $KategoriHarga= $DataKategori['kategori_harga'];
                                    //Cari harga berdasarkan kategori_harga & id_barang_satuan 0
                                    $QryHargaBarang = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$KategoriHarga' AND id_barang_satuan='0'")or die(mysqli_error($Conn));
                                    $DataBarangSatuan = mysqli_fetch_array($QryHargaBarang);
                                    if(empty($DataBarangSatuan['harga'])){
                                        $HargaBarangKategori=0;
                                    }else{
                                        $HargaBarangKategori= $DataBarangSatuan['harga'];
                                    }
                                    $HargaBarangKategoriRp = "Rp " . number_format($HargaBarangKategori,0,',','.');
                                    echo '<td class="text-left" align="right">';
                                    echo '  <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalEditKategoriHarga" data-id="'.$id_barang.','.$KategoriHarga.',0">';
                                    echo '      <i class="bi bi-pencil-square"></i> '.$HargaBarangKategoriRp.'';
                                    echo '  </a>';
                                    echo '</td>';
                                }
                            ?>
                        </tr>
                        <?php
                            //Menghitung jumlah data barang_satuan
                            $JumlahSatuanBarang=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_satuan WHERE id_barang='$id_barang'"));
                            if(empty($JumlahSatuanBarang)){
                                echo '<tr>';
                                echo '  <td class="text-center" colspan="'.$jmlKolom.'">';
                                echo '      Tidak Ada Satuan Barang Lainnya';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no=2;
                                $QrySatauan=mysqli_query($Conn, "SELECT*FROM barang_satuan WHERE id_barang='$id_barang' ORDER BY id_barang_satuan ASC");
                                while ($DataSatuan = mysqli_fetch_array($QrySatauan)) {
                                    $id_barang_satuan=$DataSatuan['id_barang_satuan'];
                                    $kode_barang=$DataSatuan['kode_barang'];
                                    $satuan_multi=$DataSatuan['satuan_multi'];
                                    $konversi_multi=$DataSatuan['konversi_multi'];
                                    //Mencari harga barang berdasarkan id_barang_satuan dan kategori_harga 0
                                    $QryHargaBarang = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='' AND id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
                                    $DataBarangSatuan = mysqli_fetch_array($QryHargaBarang);
                                    if(empty($DataBarangSatuan['harga'])){
                                        $HargaBarangKategori=0;
                                    }else{
                                        $HargaBarangKategori= $DataBarangSatuan['harga'];
                                    }
                                    $HargaBarangKategoriRp = "Rp " . number_format($HargaBarangKategori,0,',','.');
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo "<small >$no</small>";
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
                                <td class="text-right" align="right">
                                    <?php 
                                        echo '  <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalEditKategoriHarga" data-id="'.$id_barang.',0,'.$id_barang_satuan.'">';
                                        echo "      <i class='bi bi-pencil-square'></i> $HargaBarangKategoriRp";
                                        echo '  </a>';
                                    ?>
                                </td>
                                <?php
                                //Buka Kategori Harga
                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                    $KategoriHarga= $DataKategori['kategori_harga'];
                                    //Cari harga berdasarkan kategori_harga & id_barang_satuan
                                    $QryHargaBarang = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$KategoriHarga' AND id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
                                    $DataBarangSatuan = mysqli_fetch_array($QryHargaBarang);
                                    if(empty($DataBarangSatuan['harga'])){
                                        $HargaBarangKategori=0;
                                    }else{
                                        $HargaBarangKategori= $DataBarangSatuan['harga'];
                                    }
                                    $HargaBarangKategoriRp = "Rp " . number_format($HargaBarangKategori,0,',','.');
                                    echo '<td class="text-left" align="right">';
                                    echo '  <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalEditKategoriHarga" data-id="'.$id_barang.','.$KategoriHarga.','.$id_barang_satuan.'">';
                                    echo '      <i class="bi bi-pencil-square"></i> '.$HargaBarangKategoriRp.'';
                                    echo '  </a>';
                                    echo '</td>';
                                }
                            ?>
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