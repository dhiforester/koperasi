<script>
    //Proses Simpan Akses Anggota
    $('#ProsesTambahAksesAnggota').submit(function(){
        $('#NotifikasiTambahAksesAnggota').html('Loading...');
        var form = $('#ProsesTambahAksesAnggota')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Anggota/ProsesTambahAksesAnggota.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#NotifikasiTambahAksesAnggota').html(data);
                var NotifikasiTambahAksesAnggotaBerhasil=$('#NotifikasiTambahAksesAnggotaBerhasil').html();
                if(NotifikasiTambahAksesAnggotaBerhasil=="Success"){
                    $('#MenampilkanTabelAksesAnggota').html("Loading...");
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Anggota/TabelAksesAnggota.php',
                        success     : function(data){
                            $('#MenampilkanTabelAksesAnggota').html(data);
                            $('#FormTambahAksesAnggota').html("");
                            $('#ModalTambahAksesAnggota').modal('hide');
                            swal("Good Job!", "Tambah Akses Anggota Berhasil!", "success");
                        }
                    });
                }
            }
        });
    });
</script>
<div class="row">
    <div class="col-md-6 mt-3">
        <label for="nama_akses">Nama Lengkap</label>
        <input type="text" name="nama_akses" id="nama_akses" class="form-control">
    </div>
    <div class="col-md-6 mt-3">
        <label for="kontak_akses">Nomor Kontak</label>
        <input type="text" name="kontak_akses" id="kontak_akses" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <label for="email_akses">Email</label>
        <input type="email" name="email_akses" id="email_akses" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
        <label for="password1">Password</label>
        <input type="password" name="password1" id="password1" class="form-control">
        <small class="credit">Password hanya boleh terdiri dari 6-20 karakter angka dan huruf</small>
    </div>
    <div class="col-md-6 mt-3">
        <label for="password2">Ulangi Password</label>
        <input type="password" name="password2" id="password2" class="form-control">
        <small class="credit">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword" name="TampilkanPassword">
                <label class="form-check-label" for="TampilkanPassword">
                    Tampilkan Password
                </label>
            </div>
        </small>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3" id="NotifikasiTambahAksesAnggota">
        <small class="text-primary">Pastkan data yang anda input sudah benar</small>
    </div>
</div>