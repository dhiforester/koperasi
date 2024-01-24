<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_shu_session
    if(empty($_POST['id_shu_session'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Bagi Hasil Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
        //Buka data askes
        $QryDetail = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
        $DataDetail = mysqli_fetch_array($QryDetail);
        $sesi_shu= $DataDetail['sesi_shu'];
        $periode_hitung1= $DataDetail['periode_hitung1'];
        $periode_hitung2= $DataDetail['periode_hitung2'];
        $modal_anggota= $DataDetail['modal_anggota'];
        $penjualan= $DataDetail['penjualan'];
        $pinjaman= $DataDetail['pinjaman'];
        $jasa_modal_anggota= $DataDetail['jasa_modal_anggota'];
        $laba_penjualan= $DataDetail['laba_penjualan'];
        $jasa_pinjaman= $DataDetail['jasa_pinjaman'];
        $persen_usaha= $DataDetail['persen_usaha'];
        $persen_modal= $DataDetail['persen_modal'];
        $persen_pinjaman= $DataDetail['persen_pinjaman'];
        $alokasi_hitung= $DataDetail['alokasi_hitung'];
        $alokasi_nyata= $DataDetail['alokasi_nyata'];
        $status= $DataDetail['status'];
?>
    <input type="hidden" name="id_shu_session" id="id_shu_session" value="<?php echo "$id_shu_session"; ?>">
    <div class="row">
        <div class="col-md-12 mb-2">
            <label for="sesi_shu">Nama Sesi</label>
            <input type="text" name="sesi_shu" id="sesi_shu" class="form-control" placeholder="Contoh: SHU Tahun 2022" value="<?php echo "$sesi_shu"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="periode_hitung1">Periode Awal</label>
            <input type="date" name="periode_hitung1" id="periode_hitung1" class="form-control" value="<?php echo "$periode_hitung1"; ?>">
        </div>
        <div class="col-md-6 mb-2">
            <label for="periode_hitung2">Periode Akhir</label>
            <input type="date" name="periode_hitung2" id="periode_hitung2" class="form-control" value="<?php echo "$periode_hitung2"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-2">
            <label for="persen_usaha">% Usaha</label>
            <input type="number" min="0" max="100" name="persen_usaha" id="persen_usaha" class="form-control" value="<?php echo "$persen_usaha"; ?>">
        </div>
        <div class="col-md-4 mb-2">
            <label for="persen_modal">% Modal</label>
            <input type="number" min="0" max="100" name="persen_modal" id="persen_modal" class="form-control" value="<?php echo "$persen_modal"; ?>">
        </div>
        <div class="col-md-4 mb-2">
            <label for="persen_pinjaman">% Pinjaman</label>
            <input type="number" min="0" max="100" name="persen_pinjaman" id="persen_pinjaman" class="form-control" value="<?php echo "$persen_pinjaman"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="alokasi_nyata">Alokasi Hasil</label>
            <input type="text" name="alokasi_nyata" id="alokasi_nyata" class="form-control format_uang" value="<?php echo "$alokasi_nyata"; ?>">
        </div>
        <div class="col-md-6 mb-2">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status=="Realiasi"){echo "selected";} ?> value="Realiasi">Realiasi</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2">
            <small class="credit">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Ya" id="HitungUlang" name="HitungUlang">
                    <label class="form-check-label" for="HitungUlang">
                        Hitung Ulang Rincian
                    </label>
                </div>
            </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2" id="NotifikasiHitungUlang">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2" id="NotifikasiEditBagiHasil">
            <small class="text-primary">Pastkan data yang anda input sudah benar</small>
        </div>
    </div>
<?php } ?>