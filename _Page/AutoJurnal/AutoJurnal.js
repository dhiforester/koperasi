//Proses Tambah Anggota
$('#ProsesAutoJurnal').submit(function(){
    $('#NotifikasiSimpanAutoJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesAutoJurnal')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/AutoJurnal/ProsesAutoJurnal.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiSimpanAutoJurnal').html(data);
            var NotifikasiSimpanAutoJurnalBerhasil=$('#NotifikasiSimpanAutoJurnalBerhasil').html();
            if(NotifikasiSimpanAutoJurnalBerhasil=="Success"){
                location.reload();
            }
        }
    });
});