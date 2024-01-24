<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang'])){
        echo ' <div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger mb-3">';
        echo '          ID Barang Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
        echo ' </div>';
        echo ' <div class="modal-footer bg-info">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '              <i class="bi bi-x-circle"></i> Tutup';
        echo '          </button>';
        echo '      </div>';
        echo '  </div>';
        echo ' </div>';
    }else{
        $id_barang=$_POST['id_barang'];
        //Buka data barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $id_barang= $DataBarang['id_barang'];
        $kode_barang= $DataBarang['kode_barang'];
        $nama_barang= $DataBarang['nama_barang'];
        $kategori_barang= $DataBarang['kategori_barang'];
        $satuan_barang= $DataBarang['satuan_barang'];
        $konversi= $DataBarang['konversi'];
        $harga_beli= $DataBarang['harga_beli'];
        $harga_beli_rp = "Rp " . number_format($harga_beli,0,',','.');
        $stok_barang= $DataBarang['stok_barang'];
?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12 table table-responsive" style="height: 300px; overflow-y: scroll;">
            <table class="table table-hover">
                <tr>
                    <td><b>ID Barang</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$id_barang"; ?></td>
                </tr>
                <tr>
                    <td><b>Kode</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$kode_barang"; ?></td>
                </tr>
                <tr>
                    <td><b>Nama/Merek</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$nama_barang"; ?></td>
                </tr>
                <tr>
                    <td><b>Kategori</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$kategori_barang"; ?></td>
                </tr>
                <tr>
                    <td><b>Satuan</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$satuan_barang"; ?></td>
                </tr>
                <tr>
                    <td><b>Stok</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$stok_barang"; ?></td>
                </tr>
                <tr>
                    <td><b>Konversi</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$konversi/$satuan_barang"; ?></td>
                </tr>
                <tr>
                    <td><b>Harga Beli</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$harga_beli_rp"; ?></td>
                </tr>
                <?php
                    $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                        $kategori_harga= $DataKategori['kategori_harga'];
                        //Buka Barang Harga
                        $QryHarga = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$kategori_harga'")or die(mysqli_error($Conn));
                        $DataHarga = mysqli_fetch_array($QryHarga);
                        $harga= $DataHarga['harga'];
                        $HargaRp = "Rp " . number_format($harga,0,',','.');
                ?>
                    <tr>
                        <td><b><?php echo "$kategori_harga"; ?></b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$HargaRp"; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <a href="index.php?Page=Barang&Sub=DetailBarang&id=<?php echo $id_barang;?>" class="btn btn-sm btn-success btn-rounded">
        <i class="bi bi-three-dots-vertical"></i> Selengkapnya
    </a>
    <button type="button" class="btn btn-sm btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>
<?php } ?>