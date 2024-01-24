//Proses Tambah Akses
$('#ProsesSettingGeneral').submit(function(){
    $('#NotifikasiSimpanSettingGeneral').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesSettingGeneral')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingGeneral/ProsesSettingGeneral.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiSimpanSettingGeneral').html(data);
            var NotifikasiSimpanSettingGeneralBerhasil=$('#NotifikasiSimpanSettingGeneralBerhasil').html();
            if(NotifikasiSimpanSettingGeneralBerhasil=="Success"){
                window.location.href = "index.php?Page=SettingGeneral";
            }
        }
    });
});