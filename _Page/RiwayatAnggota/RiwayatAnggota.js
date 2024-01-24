var ProsesBatasPembelian = $('#ProsesBatasPembelian').serialize();
$('#MenampilkanRiwayatPembelian').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/RiwayatAnggota/DataPembelian.php',
    data 	    :  ProsesBatasPembelian,
    success     : function(data){
        $('#MenampilkanRiwayatPembelian').html(data);
    }
});
$('#ProsesBatasPembelian').submit(function(){
    var ProsesBatasPembelian = $('#ProsesBatasPembelian').serialize();
    $('#MenampilkanRiwayatPembelian').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/RiwayatAnggota/DataPembelian.php',
        data 	    :  ProsesBatasPembelian,
        success     : function(data){
            $('#MenampilkanRiwayatPembelian').html(data);
        }
    });
});
$('#KeywordByPembelian').change(function(){
    var KeywordByPembelian = $('#KeywordByPembelian').val();
    $('#FormKeywordPembelian').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/RiwayatAnggota/FormKeywordPembelian.php',
        data 	    :  {KeywordByPembelian: KeywordByPembelian},
        success     : function(data){
            $('#FormKeywordPembelian').html(data);
        }
    });
});
//Simpanan
var ProsesBatasSimpanan = $('#ProsesBatasSimpanan').serialize();
$('#MenampilkanRiwayatSimpanan').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/RiwayatAnggota/DataSimpanan.php',
    data 	    :  ProsesBatasSimpanan,
    success     : function(data){
        $('#MenampilkanRiwayatSimpanan').html(data);
    }
});
$('#ProsesBatasSimpanan').submit(function(){
    var ProsesBatasSimpanan = $('#ProsesBatasSimpanan').serialize();
    $('#MenampilkanRiwayatSimpanan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/RiwayatAnggota/DataSimpanan.php',
        data 	    :  ProsesBatasSimpanan,
        success     : function(data){
            $('#MenampilkanRiwayatSimpanan').html(data);
        }
    });
});
$('#KeywordBySimpanan').change(function(){
    var KeywordBySimpanan = $('#KeywordBySimpanan').val();
    $('#FormKeywordSimpanan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/RiwayatAnggota/FormKeywordSimpanan.php',
        data 	    :  {KeywordBySimpanan: KeywordBySimpanan},
        success     : function(data){
            $('#FormKeywordSimpanan').html(data);
        }
    });
});
//Pinjaman
var ProsesBatasPinjaman = $('#ProsesBatasPinjaman').serialize();
$('#MenampilkanRiwayatPinjaman').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/RiwayatAnggota/DataPinjaman.php',
    data 	    :  ProsesBatasPinjaman,
    success     : function(data){
        $('#MenampilkanRiwayatPinjaman').html(data);
    }
});
$('#ProsesBatasPinjaman').submit(function(){
    var ProsesBatasPinjaman = $('#ProsesBatasPinjaman').serialize();
    $('#MenampilkanRiwayatPinjaman').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/RiwayatAnggota/DataPinjaman.php',
        data 	    :  ProsesBatasPinjaman,
        success     : function(data){
            $('#MenampilkanRiwayatPinjaman').html(data);
        }
    });
});
$('#KeywordByPinjaman').change(function(){
    var KeywordByPinjaman = $('#KeywordByPinjaman').val();
    $('#FormKeywordPinjaman').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/RiwayatAnggota/FormKeywordPinjaman.php',
        data 	    :  {KeywordByPinjaman: KeywordByPinjaman},
        success     : function(data){
            $('#FormKeywordPinjaman').html(data);
        }
    });
});