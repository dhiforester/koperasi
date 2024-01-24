$('#ProsesResetPassword').submit(function(){
    var ProsesResetPassword = $('#ProsesResetPassword').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiResetPassword').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/ResetPassword/ProsesResetPassword.php',
        data 	    :  ProsesResetPassword,
        success     : function(data){
            $('#NotifikasiResetPassword').html(data);
            var NotifikasiResetPasswordBerhasil=$('#NotifikasiResetPasswordBerhasil').html();
            if(NotifikasiResetPasswordBerhasil=="Success"){
                window.location.href = "LupaPassword.php?Page=KirimKodeBerhasil";
            }
        }
    });
});
//Kondisi saat tampilkan password
$('.form-check-input').click(function(){
    if($(this).is(':checked')){
        $('#PasswordBaru1').attr('type','text');
        $('#PasswordBaru2').attr('type','text');
    }else{
        $('#PasswordBaru1').attr('type','password');
        $('#PasswordBaru2').attr('type','password');
    }
});
$('#ProsesUbahPassword').submit(function(){
    var ProsesUbahPassword = $('#ProsesUbahPassword').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiUbahPassword').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/ResetPassword/ProsesUbahPassword.php',
        data 	    :  ProsesUbahPassword,
        success     : function(data){
            $('#NotifikasiUbahPassword').html(data);
            var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
            if(NotifikasiUbahPasswordBerhasil=="Success"){
                window.location.href = "LupaPassword.php?Page=Berhasil";
            }
        }
    });
});