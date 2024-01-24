<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_pembayaran
    if(empty($_POST['id_pembayaran'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          Access ID Data Undefined.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_pembayaran=$_POST['id_pembayaran'];
        //Buka data askes
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE id_pembayaran='$id_pembayaran'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        $id_pembayaran=$DataPembayaran['id_pembayaran'];
        $id_transaksi=$DataPembayaran['id_transaksi'];
        $id_akses=$DataPembayaran['id_akses'];
        $id_anggota=$DataPembayaran['id_anggota'];
        $id_supplier=$DataPembayaran['id_supplier'];
        $tanggal=$DataPembayaran['tanggal'];
        $metode=$DataPembayaran['metode'];
        $jumlah=$DataPembayaran['jumlah'];
        $keterangan=$DataPembayaran['keterangan'];
        $kategori=$DataPembayaran['kategori'];
        //Format Rupiah
        $jumlah = "Rp " . number_format($jumlah,0,',','.');
        //Buka data petugas
        if(!empty($id_akses)){
            $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $DataAkses = mysqli_fetch_array($QryAkses);
            if(empty($DataAkses['nama_akses'])){
                $NamaAkses="Akses None";
            }else{
                $NamaAkses= $DataAkses['nama_akses'];
            }
        }else{
            $NamaAkses="None";
        }
        //Buka data asnggota
        if(!empty($id_anggota)){
            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
            $DataAnggota = mysqli_fetch_array($QryAnggota);
            if(empty($DataAnggota['nama'])){
                $NamaAnggota="Anggota None";
            }else{
                $NamaAnggota= $DataAnggota['nama'];
            }
        }else{
            $NamaAnggota="None";
        }
        //Buka Supplier
        if(!empty($id_supplier)){
            $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
            $DataSupplier = mysqli_fetch_array($QrySupplier);
            if(!empty($DataSupplier['nama_supplier'])){
                $NamaSupplier= $DataSupplier['nama_supplier'];
            }else{
                $NamaSupplier="Supplier None";
            }
        }else{
            $NamaSupplier="None";
        }
?>
    <div class="row mt-2">
        <div class="col-md-12" style="height: 350px; overflow-y: scroll;">
            <div class="table table-responsive">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>
                                <small><dt>ID Transaksi</dt></small>
                            </td>
                            <td>
                                <small><?php echo "$id_transaksi.$kategori"; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Tanggal</dt></small>
                            </td>
                            <td>
                                <small><?php echo $tanggal; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>User/Petugas</dt></small>
                            </td>
                            <td>
                                <small><?php echo $NamaAkses; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Anggota</dt></small>
                            </td>
                            <td>
                                <small><?php echo $NamaAnggota; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Supplier</dt></small>
                            </td>
                            <td>
                                <small><?php echo $NamaSupplier; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Metode</dt></small>
                            </td>
                            <td>
                                <small><?php echo $metode; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Keterangan</dt></small>
                            </td>
                            <td>
                                <small><?php echo $keterangan; ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <small><dt>Jumlah</dt></small>
                            </td>
                            <td>
                                <small><?php echo $jumlah; ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>