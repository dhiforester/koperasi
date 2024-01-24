<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Barang</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Barang Tidak Ditemukan.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Error ID Null';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_barang=$_GET['id'];
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
        if(empty($_GET['SubPage'])){
            $SubPage="";
        }else{
            $SubPage=$_GET['SubPage'];
        }
?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4 class="card-title">
                        <i class="bi bi-info-circle"></i> Info Barang
                    </h4>
                </div>
                <div class="col-md-2">
                    <a href="index.php?Page=Barang" class="btn btn-md btn-dark btn-rounded btn-block">
                        <i class="bi bi-arrow-left-short"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 table table-responsive">
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
                                if(!empty($DataHarga['harga'])){
                                    $harga= $DataHarga['harga'];
                                    $HargaRp = "Rp " . number_format($harga,0,',','.');
                        ?>
                            <tr>
                                <td><b><?php echo "$kategori_harga"; ?></b></td>
                                <td><b>:</b></td>
                                <td><?php echo "$HargaRp"; ?></td>
                            </tr>
                        <?php 
                                } 
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="icon" href="javascript:void(0);" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots"></i> 
                <?php
                    if($SubPage==""){
                        echo "Opsi";
                    }else{
                        if($SubPage=="MultiSatuan"){
                            echo "Multi Satuan";
                        }else{
                            if($SubPage=="MutiHarga"){
                                echo "Multi Harga";
                            }else{
                                if($SubPage=="BatchExpired"){
                                    echo "Batch & Expired Date";
                                }else{
                                    if($SubPage=="RiwayatTransaksi"){
                                        echo "Riwayat Transaksi";
                                    }else{
                                        echo "Opsi";
                                    }
                                }
                            }
                        }
                    }
                ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="<?php if($SubPage=="MultiSatuan"){echo "bg-info";} ?>">
                    <a class="dropdown-item <?php if($SubPage=="MultiSatuan"){echo "text-white";} ?>" href="index.php?Page=Barang&Sub=DetailBarang&&SubPage=MultiSatuan&id=<?php echo "$id_barang"; ?>">Multi Satuan</a>
                </li>
                <li class="<?php if($SubPage=="MutiHarga"){echo "bg-info";} ?>">
                    <a class="dropdown-item <?php if($SubPage=="MutiHarga"){echo "text-white";} ?>" href="index.php?Page=Barang&Sub=DetailBarang&&SubPage=MutiHarga&id=<?php echo "$id_barang"; ?>">Multi Harga</a>
                </li>
                <li class="<?php if($SubPage=="BatchExpired"){echo "bg-info";} ?>">
                    <a class="dropdown-item <?php if($SubPage=="BatchExpired"){echo "text-white";} ?>" href="index.php?Page=Barang&Sub=DetailBarang&&SubPage=BatchExpired&id=<?php echo "$id_barang"; ?>">Batch & Expired Date</a>
                </li>
                <li class="<?php if($SubPage=="RiwayatTransaksi"){echo "bg-info";} ?>">
                    <a class="dropdown-item <?php if($SubPage=="RiwayatTransaksi"){echo "text-white";} ?>" href="index.php?Page=Barang&Sub=DetailBarang&&SubPage=RiwayatTransaksi&id=<?php echo "$id_barang"; ?>">Riwayat Transaksi</a>
                </li>
            </ul>
        </div>
    </div>
    <?php
        if($SubPage=="MultiSatuan"){
            include "_Page/Barang/MultiSatuan.php";
        }else{
            if($SubPage=="MutiHarga"){
                include "_Page/Barang/MultiHarga.php";
            }else{
                if($SubPage=="BatchExpired"){
                    include "_Page/Barang/BatchExpired.php";
                }else{
                    if($SubPage=="RiwayatTransaksi"){
                        include "_Page/Barang/RiwayatTransaksi.php";
                    }else{
            
                    }
                }
            }
        }
    ?>
<?php } ?>