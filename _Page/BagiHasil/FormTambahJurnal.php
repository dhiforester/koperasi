<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    $tanggal=date('Y-m-d');
    if(empty($_POST['id_shu_session'])){
        $id_shu_session="";
    }else{
        $id_shu_session=$_POST['id_shu_session'];
    }
    
?>
<script>
    //Proses Tambah Jurnal Bagi Hasil
    $('#ProsesTambahJurnal').submit(function(){
        var id_shu_session="<?php echo "$id_shu_session"; ?>";
        $('#NotifikasiTambahJurnal').html('Loading...');
        var form = $('#ProsesTambahJurnal')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/BagiHasil/ProsesTambahJurnal.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#NotifikasiTambahJurnal').html(data);
                var NotifikasiTambahJurnalBerhasil=$('#NotifikasiTambahJurnalBerhasil').html();
                if(NotifikasiTambahJurnalBerhasil=="Success"){
                    $('#HalamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/BagiHasil/JurnalBagiHasil.php',
                        data 	    :  {id_shu_session: id_shu_session},
                        enctype     : 'multipart/form-data',
                        success     : function(data){
                            $('#HalamanLainnya').html(data);
                            $('#FormTambahJurnal').html("");
                            $('#ModalTambahJurnalBagiHasil').modal('hide');
                            swal("Berhasil!", "Tambah Jurnal Bagi Hasil Berhasil!", "success");
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
        <input type="text" required class="form-control format_uang" name="nilai">
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
            Isi data jurnal dengan benar. Periksa kembali ID Bagi Hasil dan parameter lainnya sebelum disimpan.
        </small>
    </div>
</div>