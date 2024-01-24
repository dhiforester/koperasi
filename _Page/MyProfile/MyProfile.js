//Edit Akses 
$('#ProsesEditAkses123').submit(function(){
    $('#NotifikasiEditProfile').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditAkses123')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/MyProfile/ProsesEditAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditProfile').html(data);
            var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
            if(NotifikasiEditAksesBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Edit Akses  Anggota
$('#ProsesEditAksesAnggota').submit(function(){
    $('#NotifikasiEditProfileAnggota').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditAksesAnggota')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/MyProfile/ProsesEditAksesAnggota.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditProfileAnggota').html(data);
            var NotifikasiEditProfileAnggotaBerhasil=$('#NotifikasiEditProfileAnggotaBerhasil').html();
            if(NotifikasiEditProfileAnggotaBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Edit Password 
$('#ProsesEditPassword').submit(function(){
    $('#NotifikasiEditPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditPassword')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/MyProfile/ProsesEditPassword.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditPassword').html(data);
            var NotifikasiEditPasswordBerhasil=$('#NotifikasiEditPasswordBerhasil').html();
            if(NotifikasiEditPasswordBerhasil=="Success"){
                window.location.href = "index.php?Page=MyProfile";
            }
        }
    });
});
//Edit Password Anggota
$('#ProsesEditPasswordAnggota').submit(function(){
    $('#NotifikasiEditPasswordAnggota').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditPasswordAnggota')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/MyProfile/ProsesEditPasswordAnggota.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditPasswordAnggota').html(data);
            var NotifikasiEditPasswordAnggotaBerhasil=$('#NotifikasiEditPasswordAnggotaBerhasil').html();
            if(NotifikasiEditPasswordAnggotaBerhasil=="Success"){
                window.location.href = "index.php?Page=MyProfile";
            }
        }
    });
});
//Kondisi saat tampilkan password
$('#TampilkanPassword2').click(function(){
    if($(this).is(':checked')){
        $('#old_password').attr('type','text');
        $('#password1').attr('type','text');
        $('#password2').attr('type','text');
    }else{
        $('#old_password').attr('type','password');
        $('#password1').attr('type','password');
        $('#password2').attr('type','password');
    }
});