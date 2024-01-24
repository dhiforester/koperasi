<script>
    $('#TombolStop').click(function(){
        location.reload(); 
    });
    setTimeout(function(){ 
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/CronJob/Timer.php',
            success     : function(data){
                $('#StatusProses').html(data);
            }
        });
    },1000);  
</script>
<?php
    //Format Waktu
    date_default_timezone_set("Asia/Jakarta");
    //Sekarang
    $date_now=date('Y-m-d');
    $time_now=date('H:i:s');
    echo '<i class="text-info">Running ('.$time_now.')</i>';
?>