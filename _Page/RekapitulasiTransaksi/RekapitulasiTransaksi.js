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
var ProsesTampilkanGrapikTransaksi = $('#ProsesTampilkanGrapikTransaksi').serialize();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/RekapitulasiTransaksi/ProsesTampilkanGrapikTransaksi.php',
    data 	    :  ProsesTampilkanGrapikTransaksi,
    enctype     : 'multipart/form-data',
    success     : function(data){
        var NamaData2="Transaksi";
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
            document.querySelector("#GrafikRekapitulasiTransaksi"),
            options
        );
        var UrlData = '_Page/RekapitulasiTransaksi/GrafikTransaksi.json';
        
        $.getJSON(UrlData, function(response) {
            chart.updateSeries([{
                name: NamaData2,
                data: response
            }])
        });
        chart.render();
    }
});

//Menampilkan grafik simpanan
var ProsesMenampilkanGrafikSimpanan = $('#ProsesMenampilkanGrafikSimpanan').serialize();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/RekapitulasiTransaksi/ProsesMenampilkanGrafikSimpanan.php',
    data 	    :  ProsesMenampilkanGrafikSimpanan,
    enctype     : 'multipart/form-data',
    success     : function(data){
        var NamaData3="Simpanan Anggota";
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
            document.querySelector("#GrafikRekapitulasiSimpanan"),
            options
        );
        var UrlData = '_Page/RekapitulasiTransaksi/GrafikSimpanan.json';
        
        $.getJSON(UrlData, function(response) {
            chart.updateSeries([{
                name: NamaData3,
                data: response
            }])
        });
        chart.render();
    }
});
//Menampilkan grafik Pinjaman
var ProsesMenampilkanGrafikPinjaman = $('#ProsesMenampilkanGrafikPinjaman').serialize();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/RekapitulasiTransaksi/ProsesMenampilkanGrafikPinjaman.php',
    data 	    :  ProsesMenampilkanGrafikPinjaman,
    enctype     : 'multipart/form-data',
    success     : function(data){
        var NamaData3=$('#GrafikShow').val();
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
            document.querySelector("#GrafikRekapitulasiPinjaman"),
            options
        );
        var UrlData = '_Page/RekapitulasiTransaksi/GrafikPinjaman.json';
        
        $.getJSON(UrlData, function(response) {
            chart.updateSeries([{
                name: NamaData3,
                data: response
            }])
        });
        chart.render();
    }
});