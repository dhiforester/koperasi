var ProsesBukuBesar = $('#ProsesBukuBesar').serialize();
$('#ProsesBukuBesar').submit(function(){
    var ProsesBukuBesar = $('#ProsesBukuBesar').serialize();
    $('#MenampilkanTabelBukuBesar').html('Loading..');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BukuBesar/TabelBukuBesar.php',
        data 	    :  ProsesBukuBesar,
        success     : function(data){
            $('#MenampilkanTabelBukuBesar').html(data);
        }
    });
});
$('#ModalDetailTransaksi').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormDetailTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BukuBesar/FormDetailTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormDetailTransaksi').html(data);
        }
    });
});