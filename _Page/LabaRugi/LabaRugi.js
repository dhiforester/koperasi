$('#ProsesLaporanLabaRugi').submit(function(){
    var ProsesLaporanLabaRugi = $('#ProsesLaporanLabaRugi').serialize();
    $('#MenampilkanTabelLabaRugi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/LabaRugi/TabelLabaRugi.php',
        data 	    :  ProsesLaporanLabaRugi,
        success     : function(data){
            $('#MenampilkanTabelLabaRugi').html(data);
        }
    });
});