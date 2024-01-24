<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_stok_opename'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Stock Opename Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_stok_opename=$_POST['id_stok_opename'];
        //Buka data Stock Opename
        $QryStockOpename = mysqli_query($Conn,"SELECT * FROM stok_opename WHERE id_stok_opename='$id_stok_opename'")or die(mysqli_error($Conn));
        $DataStockOpename = mysqli_fetch_array($QryStockOpename);
        $id_akses= $DataStockOpename['id_akses'];
        $tanggal= $DataStockOpename['tanggal'];
        $status= $DataStockOpename['status'];
        //Buka nama akses
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $nama_akses= $DataDetailAkses['nama_akses'];
        //Format Tanggal
        $strtotime=strtotime($tanggal);
        $TanggalFormat=date('d/m/Y',$strtotime);
        //Inisiasi Status
        if($status=="Selesai"){
            $LabelStatus='<span class="badge badge-primary">Selesai</span>';
        }else{
            if($status=="Pending"){
                $LabelStatus='<span class="badge badge-warning">Pending</span>';
            }else{
                $LabelStatus='<span class="badge badge-dark">None</span>';
            }
        }
        //Hitung jumlah item
        $JumlahItem = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename'"));
        //Menghitung jumlah asset
        $SumJumlahAsset = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename'"));
        $JumlahAsset = $SumJumlahAsset['jumlah'];
        $JumlahAssetRp = "Rp " . number_format($JumlahAsset,0,',','.');
?>
    <div class="row">
        <div class="col-md-12 mb-3 table table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td><b>ID Stock Opename</b></td>
                        <td><?php echo "$id_stok_opename"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td><?php echo "$TanggalFormat"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Petugas</b></td>
                        <td><?php echo "$nama_akses"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Status</b></td>
                        <td><?php echo "$LabelStatus"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah Item</b></td>
                        <td><?php echo "$JumlahItem"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Asset Item</b></td>
                        <td><?php echo "$JumlahAssetRp"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="index.php?Page=StockOpename&Sub=DetailStockOpename&id=<?php echo "$id_stok_opename"; ?>" class="btn btn-md btn-block btn-primary">
                Detail Selengkapnya
            </a>
        </div>
    </div>
<?php } ?>