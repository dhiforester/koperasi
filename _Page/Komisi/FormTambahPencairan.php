<?php
    //Koneksi
    include "../../_Config/Connection.php";
    if(empty($_POST['id_dokter'])){
        echo '<span class="text-danger">ID Dokter Tidaa Boleh Kosong!</span>';
    }else{
        $id_dokter=$_POST['id_dokter'];
        //Buka data dokter
        $QryDokter = mysqli_query($Conn,"SELECT * FROM dokter WHERE id_dokter='$id_dokter'")or die(mysqli_error($Conn));
        $DataDokter = mysqli_fetch_array($QryDokter);
        $id_dokter= $DataDokter['id_dokter'];
        $id_akses= $DataDokter['id_akses'];
        $id_mitra= $DataDokter['id_mitra'];
        $nama_dokter= $DataDokter['nama_dokter'];
        //Menghitung Komisi
        //Menghitung Volume
        $TotalBagiHasil=0;
        $QryKunjungan = mysqli_query($Conn, "SELECT * FROM pasien_kunjungan WHERE id_dokter='$id_dokter' AND id_mitra='$id_mitra' ORDER BY id_kunjungan ASC");
        while ($DataKunjungan = mysqli_fetch_array($QryKunjungan)) {
            $id_kunjungan= $DataKunjungan['id_kunjungan'];
            $nama_pasien= $DataKunjungan['nama_pasien'];
            $datetime_kunjungan= $DataKunjungan['datetime_kunjungan'];
            //Buka Data Transaksi
            $NomorTransaksi = 1;
            $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE id_kunjungan='$id_kunjungan' ORDER BY id_kunjungan ASC");
            while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                $id_transaksi= $DataTransaksi['id_transaksi'];
                //Buka rincian transaksi
                $QryRincian = mysqli_query($Conn, "SELECT * FROM transaksi_rincian WHERE id_transaksi='$id_transaksi' AND id_mitra_tindakan!='' ORDER BY id_transaksi_rincian ASC");
                while ($DataRincian = mysqli_fetch_array($QryRincian)) {
                    $id_transaksi_rincian= $DataRincian['id_transaksi_rincian'];
                    $id_mitra_tindakan= $DataRincian['id_mitra_tindakan'];
                    $nama_tindakan= $DataRincian['nama_tindakan'];
                    $jumlah= $DataRincian['jumlah'];
                    $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
                    $JumlahKomisi =0;
                    //Membuka jumlah komisi
                    $QryTindakan=mysqli_query($Conn,"SELECT * FROM mitra_tindakan WHERE id_mitra_tindakan='$id_mitra_tindakan'")or die(mysqli_error($Conn));
                    $DataTindakan=mysqli_fetch_array($QryTindakan);
                    if(!empty($DataTindakan['id_mitra_tindakan'])){
                        $id_mitra_tindakan_detail= $DataTindakan['id_mitra_tindakan'];
                        $jasa_dokter_detail=$DataTindakan['jasa_dokter'];
                        $TotalBagiHasil=$jasa_dokter_detail+$TotalBagiHasil;
                        $JumlahBagiHasilRp="Rp " . number_format($jasa_dokter_detail,0,',','.');
                    }else{
                        $id_mitra_tindakan_detail="";
                        $jasa_dokter_detail=0;
                        $TotalBagiHasil=$jasa_dokter_detail+$TotalBagiHasil;
                        $JumlahBagiHasilRp="Rp " . number_format($jasa_dokter_detail,0,',','.');
                    }
                }
            }
        }
        //Menghitung Pembayaran
        $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='Valid'"));
        $JumlahPencairan = $Sum['jumlah'];
        $SisaPencairan=$TotalBagiHasil-$JumlahPencairan;
        $JumlahKomisiRp = "Rp " . number_format($SisaPencairan,0,',','.');
?>
    <script>
        //Proses Tambah Pencairan
        $('#ProsesTambahPencairan').submit(function(){
            $('#NotifikasiTambajPencairan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
            var form = $('#ProsesTambahPencairan')[0];
            var data = new FormData(form);
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Komisi/ProsesTambahPencairan.php',
                data 	    :  data,
                cache       : false,
                processData : false,
                contentType : false,
                enctype     : 'multipart/form-data',
                beforeSend: function(){
                    $('#SavePencairan').html("Loading...");
                },
                success     : function(data){
                    $('#NotifikasiTambajPencairan').html(data);
                    var NotifikasiTambajPencairanBerhasil=$('#NotifikasiTambajPencairanBerhasil').html();
                    $('#SavePencairan').html("<i class='bi bi-save'></i> Simpan");
                    if(NotifikasiTambajPencairanBerhasil=="Success"){
                        $('#ModalTambahPencairan').modal('hide');
                        $('#TabelDetailKomisi').html("Loading...");
                        $.ajax({
                            type 	    : 'POST',
                            url 	    : '_Page/Komisi/TabelDetailKomisi.php',
                            data 	    :  {id_dokter: GetIdPersonnel},
                            success     : function(data){
                                $('#TabelDetailKomisi').html(data);
                                swal("Good Job!", "Tambah Pencairan Berhasil!", "success");
                            }
                        });
                    }
                }
            });
        });
    </script>
    <input type="hidden" name="id_dokter" id="id_dokter" value="<?php echo "$id_dokter"; ?>">
    <div class="row">
        <div class="col-md-12 mt-3">
            <b>Saldo Komisi :</b>
            <?php echo $JumlahKomisiRp;?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" readonly name="nama_dokter" id="nama_dokter" class="form-control" value="<?php echo "$nama_dokter"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <div class="col-md-6 mt-3">
            <label for="jumlah">Jumlah</label>
            <input type="number" max="<?php echo "$SisaPencairan";?>" name="jumlah" id="jumlah" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                <option value="">Pilih</option>
                <option value="Cash">Cash</option>
                <option value="Transfer">Transfer</option>
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Pilih</option>
                <option value="Pending">Pending</option>
                <option value="Valid">Valid</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiTambajPencairan">
            <small class="text-primary">Pastikan Data Pencairan Sudah Sesuai</small>
        </div>
    </div>
<?php } ?>