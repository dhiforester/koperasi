<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_supplier'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Supplier Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_supplier=$_POST['id_supplier'];
        //Buka data supplier
        $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
        $DataSupplier = mysqli_fetch_array($QrySupplier);
        $id_supplier= $DataSupplier['id_supplier'];
        $nama_supplier= $DataSupplier['nama_supplier'];
        if(empty($DataSupplier['alamat_supplier'])){
            $alamat_supplier='<span class="text-danger">Tidak Ada</span>';
        }else{
            $alamat_supplier= $DataSupplier['alamat_supplier'];
        }
        if(empty($DataSupplier['email_supplier'])){
            $email_supplier='<span class="text-danger">Tidak Ada</span>';
        }else{
            $email_supplier= $DataSupplier['email_supplier'];
        }
        if(empty($DataSupplier['kontak_supplier'])){
            $kontak_supplier='<span class="text-danger">Tidak Ada</span>';
        }else{
            $kontak_supplier= $DataSupplier['kontak_supplier'];
        }
        $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE id_supplier='$id_supplier'"));
        $jumlah_transaksi = $Sum['tagihan'];
        $VolumeTransaksi = "Rp " . number_format($jumlah_transaksi,0,',','.');
        $JumlahItem = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT id_barang, nama_barang FROM transaksi_rincian WHERE id_supplier='$id_supplier'"));
?>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12 table table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td><b>ID Supplier</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$id_supplier"; ?></td>
                        </tr>
                        <tr>
                            <td><b>Supplier</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$nama_supplier"; ?></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$email_supplier"; ?></td>
                        </tr>
                        <tr>
                            <td><b>Kontak</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$kontak_supplier"; ?></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$alamat_supplier"; ?></td>
                        </tr>
                        <tr>
                            <td><b>Transaksi</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$VolumeTransaksi"; ?></td>
                        </tr>
                        <tr>
                            <td><b>Item</b></td>
                            <td><b>:</b></td>
                            <td><?php echo "$JumlahItem"; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-info">
        <a href="index.php?Page=Supplier&Sub=DetailSupplier&id=<?php echo "$id_supplier"; ?>" class="btn btn-success btn-rounded">
            <i class="bi bi-three-dots"></i> Selengkapnya
        </a>
        <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Tutup
        </button>
    </div>
<?php } ?>