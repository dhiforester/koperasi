$('#ProsesLogin').submit(function(){
    var ProsesLogin = $('#ProsesLogin').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#TombolLogin').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Login/ProsesLogin.php',
        data 	    :  ProsesLogin,
        success     : function(data){
            $('#TombolLogin').html(data);
            var NotifikasiProsesLoginBerhasil=$('#NotifikasiProsesLoginBerhasil').html();
            if(NotifikasiProsesLoginBerhasil=="Success"){
                window.location.href = "index.php";
            }else{
                var ErrorCode=$('#ErrorCode').html();
                $('#TombolLogin').html("Login");
                if(ErrorCode==1){
                    $('#NotifikasiLogin').html('<span class="text-danger">Email Cannot Be Empty</span>');
                }
                if(ErrorCode==2){
                    $('#NotifikasiLogin').html('<span class="text-danger">Password Cannot Be Empty</span>');
                }
                if(ErrorCode==3){
                    $('#NotifikasiLogin').html('<span class="text-danger">Wrong Email or Password</span>');
                }
                if(ErrorCode==4){
                    $('#NotifikasiLogin').html('<span class="text-danger">Mode Akses Tidak Boleh Kosong</span>');
                }
                if(ErrorCode==5){
                    $('#NotifikasiLogin').html('<span class="text-danger">Email dan password yang anda masukan salah</span>');
                }
            }
        }
    });
});