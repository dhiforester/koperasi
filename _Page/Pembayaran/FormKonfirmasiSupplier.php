<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_supplier'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12 text-center text-danger">';
        echo '      ID Supplier Tidak Boleh Kosong';
        echo '  </div>';
        echo '</div>';
    }else{
        //keyword_by
        if(!empty($_POST['keyword_by'])){
            $keyword_by=$_POST['keyword_by'];
        }else{
            $keyword_by="";
        }
        //keyword
        if(!empty($_POST['keyword'])){
            $keyword=$_POST['keyword'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['batas'])){
            $batas=$_POST['batas'];
        }else{
            $batas="10";
        }
        //batas
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
        }else{
            $page="";
        }
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
    <div class="row mb-2">
        <div class="col-md-12" style="height: 350px; overflow-y: scroll;">
            <div class="table table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td><b>ID Supplier</b></td>
                            <td><b>:</b></td>
                            <td id="GetIdSupplier"><?php echo "$id_supplier"; ?></td>
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
    <div class="row">
        <div class="col-md-6 mb-2">
            <button type="button" class="btn btn-block btn-outline-primary" data-bs-toggle="modal" data-bs-target="#ModalPilihSupplier" data-id="<?php echo "$keyword_by,$keyword,$batas,$page"; ?>" title="Kembali Pilih Supplier">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </button>
        </div>
        <div class="col-md-6 mb-2">
            <button type="button" class="btn btn-block btn-primary" id="LanjutkanPilihSupplier" title="Lanjutkan Pilih Supplier">
                Lanjutkan <i class="bi bi-arrow-right-circle"></i>
            </button>
        </div>
    </div>
<?php } ?>