<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_stok_opename_barang'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Stock Opename Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_stok_opename_barang=$_POST['id_stok_opename_barang'];
        //Buka data Stock Opename
        $Qry = mysqli_query($Conn,"SELECT * FROM stok_opename_barang WHERE id_stok_opename_barang='$id_stok_opename_barang'")or die(mysqli_error($Conn));
        $data = mysqli_fetch_array($Qry);
        $id_stok_opename_barang= $data['id_stok_opename_barang'];
        $id_barang= $data['id_barang'];
        $nama_barang= $data['nama_barang'];
        $satuan= $data['satuan'];
        $stok_awal= $data['stok_awal'];
        $stok_akhir= $data['stok_akhir'];
        $stok_gap= $data['stok_gap'];
        $harga= $data['harga'];
        $jumlah= $data['jumlah'];
        
        $HargaRp = "Rp " . number_format($harga,0,',','.');
        $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
        //Jumlah Stok Awal
        $StokAwalRp=$stok_awal*$harga;
        $StokAwalRp = "Rp " . number_format($StokAwalRp,0,',','.');
        //Jumlah Stok Akhir
        $StokAkhirRp=$stok_akhir*$harga;
        $StokAkhirRp = "Rp " . number_format($StokAkhirRp,0,',','.');
        //Jumlah Stok GAP
        $StokGapRp=$stok_gap*$harga;
        $StokGapRp = "Rp " . number_format($StokGapRp,0,',','.');
?>
    <div class="row">
        <div class="col-md-12 mb-3 table table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td><b>ID Stock Opename</b></td>
                        <td><?php echo "$id_stok_opename_barang"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Barang</b></td>
                        <td><?php echo "$nama_barang"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Satuan</b></td>
                        <td><?php echo "$satuan"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Stok Awal</b></td>
                        <td><?php echo "$stok_awal"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Stok Akhir</b></td>
                        <td><?php echo "$stok_akhir"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Selisih</b></td>
                        <td><?php echo "$stok_gap"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Harga</b></td>
                        <td><?php echo "$HargaRp"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah</b></td>
                        <td><?php echo "$JumlahRp"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>