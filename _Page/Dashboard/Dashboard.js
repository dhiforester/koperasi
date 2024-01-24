var ProsesTampilkanGrapik = $('#ProsesTampilkanGrapik').serialize();
var NamaData2="Transaksi";
$('#NamaTitleData').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Dashboard/NamaTitleData.php',
    data 	    :  ProsesTampilkanGrapik,
    success     : function(data){
        $('#NamaTitleData').html(data);
    }
});

$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Dashboard/ProsesTampilkanGrapik2.php',
    data 	    :  ProsesTampilkanGrapik,
    enctype     : 'multipart/form-data',
    success     : function(data){

        var options = {
            chart: {
                height: 400,
                type: 'bar',
            },
            dataLabels: {
                enabled: false
            },
            series: [],
            // title: {
            //     text: NamaData2,
            // },
            noData: {
                text: 'No Data...'
            }
        }
        
        var chart = new ApexCharts(
            document.querySelector("#reportsChart"),
            options
        );
        var UrlData = '_Page/Dashboard/GrafikTransaksi.json';
        
        $.getJSON(UrlData, function(response) {
            chart.updateSeries([{
                name: NamaData2,
                data: response
            }])
        });
        chart.render();
    }
});
$('#Periode').change(function(){
    var Periode = $('#Periode').val();
    $('#form_bulan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Dashboard/FormBulan.php',
        data 	    :  {Periode: Periode},
        success     : function(data){
            $('#form_bulan').html(data);
        }
    });
});


$('#ProsesTampilkanGrapik').submit(function(){
    var ProsesTampilkanGrapik = $('#ProsesTampilkanGrapik').serialize();
    $('#NamaTitleData').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Dashboard/NamaTitleData.php',
        data 	    :  ProsesTampilkanGrapik,
        success     : function(data){
            $('#NamaTitleData').html(data);
        }
    });
    var NamaData2="Transaksi";
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Dashboard/ProsesTampilkanGrapik2.php',
        data 	    :  ProsesTampilkanGrapik,
        enctype     : 'multipart/form-data',
        success     : function(data){
            var options = {
                chart: {
                    height: 400,
                    type: 'bar',
                },
                dataLabels: {
                    enabled: false
                },
                series: [],
                // title: {
                //     text: NamaData2,
                // },
                noData: {
                    text: 'No Data...'
                }
            }
            
            var chart = new ApexCharts(
                document.querySelector("#reportsChart"),
                options
            );
            var UrlData = '_Page/Dashboard/GrafikTransaksi.json';
            
            $.getJSON(UrlData, function(response) {
                chart.updateSeries([{
                    name: NamaData2,
                    data: response
                }])
            });
            chart.render();
        }
    });
});