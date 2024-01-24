<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        $id_supplier="";
    }else{
        $id_supplier=$_GET['id'];
    }
    if(empty($id_supplier)){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Supplier</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Supplier Tidak Boleh Kosong.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Detail Supplier';
        echo '  </div>';
        echo '</div>';
    }else{
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
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <b class="card-title">
                                <i class="bi bi-info-circle"></i> Detail Supplier
                            </b>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?Page=Supplier" class="btn btn-md btn-dark btn-rounded btn-block">
                                <i class="bi bi-arrow-left-short"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2"> 
                        <div class="col-md-12">
                            <table class="">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="icon" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i> Opsi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="RiwayatTransaksi">Riwayat Transaksi</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="RincianBarang">Rincian Barang</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" id="HalamanDetailSupplier">

            </div>
        </div>
    </div>
<?php } ?>