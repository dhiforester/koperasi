$('#MenampilkanTabelAktivitasUmum').html("Loading...");
$('#MenampilkanTabelAktivitasUmum').load("_Page/Aktivitas/TabelAktivitasUmum.php");
$('#BatasAktivitasUmum').change(function(){
    var ProsesBatasAktivitasUmum = $('#ProsesBatasAktivitasUmum').serialize();
    $('#MenampilkanTabelAktivitasUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasUmum.php',
        data 	    :  ProsesBatasAktivitasUmum,
        success     : function(data){
            $('#MenampilkanTabelAktivitasUmum').html(data);
        }
    });
});
$('#OrderBy').change(function(){
    var ProsesBatasAktivitasUmum = $('#ProsesBatasAktivitasUmum').serialize();
    $('#MenampilkanTabelAktivitasUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasUmum.php',
        data 	    :  ProsesBatasAktivitasUmum,
        success     : function(data){
            $('#MenampilkanTabelAktivitasUmum').html(data);
        }
    });
});
$('#ShortBy').change(function(){
    var ProsesBatasAktivitasUmum = $('#ProsesBatasAktivitasUmum').serialize();
    $('#MenampilkanTabelAktivitasUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasUmum.php',
        data 	    :  ProsesBatasAktivitasUmum,
        success     : function(data){
            $('#MenampilkanTabelAktivitasUmum').html(data);
        }
    });
});
$('#keyword_by').change(function(){
    var keyword_by = $('#keyword_by').val();
    $('#FormKeywordAktivitasUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/FormKeywordAktivitasUmum.php',
        data 	    :  {keyword_by: keyword_by},
        success     : function(data){
            $('#FormKeywordAktivitasUmum').html(data);
        }
    });
});
$('#ProsesBatasAktivitasUmum').submit(function(){
    var ProsesBatasAktivitasUmum = $('#ProsesBatasAktivitasUmum').serialize();
    $('#MenampilkanTabelAktivitasUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasUmum.php',
        data 	    :  ProsesBatasAktivitasUmum,
        success     : function(data){
            $('#MenampilkanTabelAktivitasUmum').html(data);
        }
    });
});
$('#mode_waktu').change(function(){
    var mode_waktu = $('#mode_waktu').val();
    $('#form_bulan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/FormBulan.php',
        data 	    :  {mode_waktu: mode_waktu},
        success     : function(data){
            $('#form_bulan').html(data);
        }
    });
});
$('#ProsesRekapAktivitasUmum').submit(function(){
    var ProsesRekapAktivitasUmum=$('#ProsesRekapAktivitasUmum').serialize();
    $('#MenampilkanRekapAktivitasUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelRekapAktivitasUmum.php',
        data 	    :  ProsesRekapAktivitasUmum,
        success     : function(data){
            $('#MenampilkanRekapAktivitasUmum').html(data);
        }
    });
});
$('#MenampilkanTabelAktivitasEmail').html("Loading...");
$('#MenampilkanTabelAktivitasEmail').load("_Page/Aktivitas/TabelAktivitasEmail.php");
$('#BatasAktivitasEmail').change(function(){
    var BatasAktivitasEmail = $('#BatasAktivitasEmail').serialize();
    $('#MenampilkanTabelAktivitasEmail').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasEmail.php',
        data 	    :  BatasAktivitasEmail,
        success     : function(data){
            $('#MenampilkanTabelAktivitasEmail').html(data);
        }
    });
});
$('#ProsesBatasAktivitasEmail').submit(function(){
    var ProsesBatasAktivitasEmail = $('#ProsesBatasAktivitasEmail').serialize();
    $('#MenampilkanTabelAktivitasEmail').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasEmail.php',
        data 	    :  ProsesBatasAktivitasEmail,
        success     : function(data){
            $('#MenampilkanTabelAktivitasEmail').html(data);
        }
    });
});
$('#ModalFilterAktivitasEmail').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelAktivitasEmail').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasEmail.php',
        data 	    :  {BatasAktivitasEmail: batas, OrderBy: OrderBy, ShortBy: ShortBy, keyword_by: KeywordBy, KeywordAktivitasEmail: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelAktivitasEmail').html(data);
            $('#ModalFilterAkses').modal('hide');
        }
    });
});

$('#MenampilkanTabelAktivitasApis').html("Loading...");
$('#MenampilkanTabelAktivitasApis').load("_Page/Aktivitas/TabelAktivitasApis.php");
$('#BatasAktivitasApis').change(function(){
    var BatasAktivitasApis = $('#BatasAktivitasApis').serialize();
    $('#MenampilkanTabelAktivitasApis').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasApis.php',
        data 	    :  BatasAktivitasApis,
        success     : function(data){
            $('#MenampilkanTabelAktivitasApis').html(data);
        }
    });
});
$('#ProsesBatasAktivitasApis').submit(function(){
    var ProsesBatasAktivitasApis = $('#ProsesBatasAktivitasApis').serialize();
    $('#MenampilkanTabelAktivitasApis').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasApis.php',
        data 	    :  ProsesBatasAktivitasApis,
        success     : function(data){
            $('#MenampilkanTabelAktivitasApis').html(data);
        }
    });
});
$('#ProsesFilterAktivitasApis').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelAktivitasApis').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/TabelAktivitasApis.php',
        data 	    :  {BatasAktivitasApis: batas, OrderBy: OrderBy, ShortBy: ShortBy, keyword_by: KeywordBy, KeywordAktivitasApis: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelAktivitasApis').html(data);
            $('#ModalFilterAkses').modal('hide');
        }
    });
});
$('#DataSet').change(function(){
    var DataSet = $('#DataSet').val();
    $('#DataValue').html('<option>Loading...</option>>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Aktivitas/DataValue.php',
        data 	    :  {DataSet: DataSet},
        success     : function(data){
            $('#DataValue').html(data);
        }
    });
});

var ProsesTampilkanGrafikAktivitas = $('#ProsesTampilkanGrafikAktivitas').serialize();
var NamaData2="Log Aktivitas";
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Aktivitas/ProsesTampilkanGrafikAktivitas.php',
    data 	    :  ProsesTampilkanGrafikAktivitas,
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
            document.querySelector("#MenampilkanGrafikAktivitas"),
            options
        );
        var UrlData = '_Page/Aktivitas/GrafikAktivitas.json';
        
        $.getJSON(UrlData, function(response) {
            chart.updateSeries([{
                name: NamaData2,
                data: response
            }])
        });
        chart.render();
    }
});