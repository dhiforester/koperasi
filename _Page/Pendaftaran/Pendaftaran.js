//Proses Tambah Akses
$('#ProsesPendaftaran').submit(function(){
    $('#NotifikasiPendaftaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesPendaftaran')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pendaftaran/ProsesPendaftaran.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiPendaftaran').html(data);
            var NotifikasiPendaftaranBerhasil=$('#NotifikasiPendaftaranBerhasil').html();
            if(NotifikasiPendaftaranBerhasil=="Success"){
                window.location.href = "Login.php?Notifikasi=Berhasil";
            }
        }
    });
});
//Proses Kirim Ulang Kode Verifikasi
$('#ProsesUlangiVerifikasiEmail').submit(function(){
    $('#NotifikasiUlangiVerifikasiEmail').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUlangiVerifikasiEmail')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pendaftaran/ProsesUlangiVerifikasiEmail.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUlangiVerifikasiEmail').html(data);
            var NotifikasiUlangiVerifikasiEmailBerhasil=$('#NotifikasiUlangiVerifikasiEmailBerhasil').html();
            if(NotifikasiUlangiVerifikasiEmailBerhasil=="Success"){
                window.location.href = "Login.php?Notifikasi=KirimUlangValidasiEmailBerhasil";
            }
        }
    });
});