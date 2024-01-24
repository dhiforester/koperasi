$('#ProsesMemulaiCron').submit(function(){
    $('#StatusProses').html('<i class="text-info">Running..</i>');
    $('#MenampilkanProses').html('<i class="text-info">Loading</i>');
    $('#TombolStart').html('<button type="button" class="btn btn-md btn-warning btn-block btn-rounded" id="TombolStop">Stop <i class="bi bi-stop"></i></button>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/CronJob/ProsesCronJob.php',
        success     : function(data){
            $('#MenampilkanProses').html(data);
        }
    }); 
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/CronJob/Timer.php',
        success     : function(data){
            $('#StatusProses').html(data);
        }
    });
});
