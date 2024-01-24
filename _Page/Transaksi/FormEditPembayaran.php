<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('Asia/Jakarta');
    //Menangkap id_pembayaran
    if(empty($_POST['id_pembayaran'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12">';
        echo '      ID Transaksi Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pembayaran=$_POST['id_pembayaran'];
        //Buka data pembayaran
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE id_pembayaran='$id_pembayaran'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        $id_transaksi = $DataPembayaran['id_transaksi'];
        $id_akses = $DataPembayaran['id_akses'];
        $id_anggota = $DataPembayaran['id_anggota'];
        $id_supplier = $DataPembayaran['id_supplier'];
        $kategori = $DataPembayaran['kategori'];
        $tanggal = $DataPembayaran['tanggal'];
        $metode = $DataPembayaran['metode'];
        $jumlah = $DataPembayaran['jumlah'];
        $keterangan = $DataPembayaran['keterangan'];
        //Format rupiah
        $TagihanRp = "" . number_format($jumlah,0,',','.');
        $strtotime=strtotime($tanggal);
        $tanggal=date('Y-m-d',$strtotime);
        $jam=date('H:i',$strtotime);
        //Buka data petugas
        if(!empty($DataPembayaran['id_akses'])){
            $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $DataAkses = mysqli_fetch_array($QryAkses);
            if(empty($DataAkses['nama_akses'])){
                $NamaAkses="None";
            }else{
                $NamaAkses= $DataAkses['nama_akses'];
            }
        }else{
            $NamaAkses="None";
        }
        //Buka data asnggota
        if(!empty($DataPembayaran['id_anggota'])){
            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
            $DataAnggota = mysqli_fetch_array($QryAnggota);
            if(empty($DataAnggota['nama'])){
                $NamaAnggota="None";
            }else{
                $NamaAnggota= $DataAnggota['nama'];
            }
        }else{
            $NamaAnggota="None";
        }
        //Buka Supplier
        if(!empty($DataPembayaran['id_supplier'])){
            $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
            $DataSupplier = mysqli_fetch_array($QrySupplier);
            $NamaSupplier= $DataSupplier['nama_supplier'];
        }else{
            $NamaSupplier="None";
        }
?>
    <input type="hidden" name="id_pembayaran" value="<?php echo "$id_pembayaran"; ?>">
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control"  value="<?php echo "$tanggal"; ?>">
        </div>
        <div class="col-md-6 mb-2">
            <label for="jam">Jam</label>
            <input type="time" name="jam" id="jam" class="form-control"  value="<?php echo "$jam"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="metode">Metode Pembayaran</label>
            <select name="metode" id="metode" class="form-control">
                <option <?php if($metode==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($metode=="Cash"){echo "selected";} ?> value="Cash">Cash</option>
                <option <?php if($metode=="Transfer"){echo "selected";} ?> value="Transfer">Transfer</option>
                <option <?php if($metode=="Online"){echo "selected";} ?> value="Online">Online</option>
            </select>
        </div>
        <div class="col-md-6 mb-2">
            <label for="jumlah">Jumlah (Rp)</label>
            <input type="text" name="jumlah" id="jumlah" class="form-control format_uang" value="<?php echo $TagihanRp;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control"><?php echo $keterangan;?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditPembayaran">
            <span class="text-primary">Pastikan Data Pembayaran Sudah Benar</span>
        </div>
    </div>
<?php } ?>