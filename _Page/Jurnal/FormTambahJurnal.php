<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    $tanggal=date('Y-m-d');
    if(empty($_POST['GetId'])){
        $GetId=0;
    }else{
        $GetId=$_POST['GetId'];
    }
    if(empty($_POST['Referensi'])){
        $Referensi="Transaksi";
    }else{
        $Referensi=$_POST['Referensi'];
    }
    if($Referensi=="Transaksi"){
        $id_transaksi=$GetId;
        $id_simpanan=0;
        $id_pinjaman=0;
        $id_pinjaman_angsuran=0;
        $id_shu_session=0;
    }else{
        if($Referensi=="Simpanan"){
            $id_transaksi=0;
            $id_simpanan=$GetId;
            $id_pinjaman=0;
            $id_pinjaman_angsuran=0;
            $id_shu_session=0;
        }else{
            if($Referensi=="Pinjaman"){
                $id_transaksi=0;
                $id_simpanan=0;
                $id_pinjaman=$GetId;
                $id_pinjaman_angsuran=0;
                $id_shu_session=0;
            }else{
                if($Referensi=="Angsuran"){
                    $id_transaksi=0;
                    $id_simpanan=0;
                    $id_pinjaman=0;
                    $id_pinjaman_angsuran=$GetId;
                    $id_shu_session=0;
                }else{
                    if($Referensi=="Bagi Hasil"){
                        $id_transaksi=0;
                        $id_simpanan=0;
                        $id_pinjaman=0;
                        $id_pinjaman_angsuran=0;
                        $id_shu_session=$GetId;
                    }else{
                        $id_transaksi=$GetId;
                        $id_simpanan=0;
                        $id_pinjaman=0;
                        $id_pinjaman_angsuran=0;
                        $id_shu_session=0;
                    }
                }
            }
        }
    }
?>
<script>
    //Proses Tambah Akun perkiraan
    $('#ProsesTambahJurnal').submit(function(){
        $('#NotifikasiTambahJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
        var form = $('#ProsesTambahJurnal')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Jurnal/ProsesTambahJurnal.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#NotifikasiTambahJurnal').html(data);
                var NotifikasiTambahJurnalBerhasil=$('#NotifikasiTambahJurnalBerhasil').html();
                if(NotifikasiTambahJurnalBerhasil=="Success"){
                    $('#ModalTambahJurnal').modal('toggle');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Jurnal/TabelJurnal.php',
                        success     : function(data){
                            $('#MenampilkanTabelJurnal').html(data);
                            swal("Good Job!", "Tambah Jurnal Berhasil!", "success");
                        }
                    });
                }
            }
        });
    });
</script>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo "$tanggal"; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">ID Transaksi</label>
        <input type="text" readonly name="id_transaksi" id="id_transaksi" class="form-control" value="<?php echo $id_transaksi; ?>">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="">ID Simpanan</label>
        <input type="text" readonly name="id_simpanan" id="id_simpanan" class="form-control" value="<?php echo $id_simpanan; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">ID Pinjaman</label>
        <input type="text" readonly name="id_pinjaman" id="id_pinjaman" class="form-control" value="<?php echo $id_pinjaman; ?>">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="">ID Angsuran</label>
        <input type="text" readonly name="id_pinjaman_angsuran" id="id_pinjaman_angsuran" class="form-control" value="<?php echo $id_pinjaman_angsuran; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">ID Bagi Hasil</label>
        <input type="text" readonly name="id_shu_session" id="id_shu_session" class="form-control" value="<?php echo $id_shu_session; ?>">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label>Akun Perkiraan</label>
        <select name="id_perkiraan" id="id_perkiraan" class="form-control" required>
            <?php
                echo '<option value="">Pilih</option>';
                $QryAkun= mysqli_query($Conn, "SELECT*FROM akun_perkiraan ORDER BY nama");
                while ($DataAkun=mysqli_fetch_array($QryAkun)) {
                    $id_perkiraan = $DataAkun['id_perkiraan'];
                    $kode= $DataAkun['kode'];
                    $nama_perkiraan = $DataAkun['nama'];
                    $level= $DataAkun['level'];
                    $saldo_normal= $DataAkun['saldo_normal'];
                    //Cek apakah di levelnya ada lagi?
                    $LevelTerbawah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level='$kode'"));
                    if($LevelTerbawah=="1"){
                        echo '<option value="'.$id_perkiraan.'">'.$nama_perkiraan.' ('.$saldo_normal.')</option>';
                    }
                }
            ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label>Nilai (Rp)</label>
        <input type="number" min="0" required class="form-control" name="nilai">
    </div>
    <div class="col-md-6 mb-3">
        <label>Debet/Kredit</label>
        <select name="d_k" id="d_k" class="form-control" required>
            <option value="">Pilih</option>
            <option value="Debet">Debet</option>
            <option value="Kredit">Kredit</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3" id="NotifikasiTambahJurnal">
        <small class="text-info">
            Isi data jurnal dengan benar. Periksa kembali kode transaksi dan parameter lainnya sebelum disimpan.
        </small>
    </div>
</div>