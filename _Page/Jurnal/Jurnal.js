$('#MenampilkanTabelJurnal').html("Loading...");
$('#MenampilkanTabelJurnal').load("_Page/Jurnal/TabelJurnal.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelJurnal').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/TabelJurnal.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelJurnal').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelJurnal').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/TabelJurnal.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelJurnal').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
//Tambah Pilih Transaksi
$('#ModalPilihTransaksi').on('show.bs.modal', function (e) {
    var ProsesBatasPilihTransaksi =$('#ProsesBatasPilihTransaksi').serialize();
    $('#FormPilihTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/TabelTransaksi.php',
        data        : ProsesBatasPilihTransaksi,
        success     : function(data){
            $('#FormPilihTransaksi').html(data);
        }
    });
    $('#ProsesBatasPilihTransaksi').submit(function(){
        var ProsesBatasPilihTransaksi = $('#ProsesBatasPilihTransaksi').serialize();
        $('#FormPilihTransaksi').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Jurnal/TabelTransaksi.php',
            data        : ProsesBatasPilihTransaksi,
            success     : function(data){
                $('#FormPilihTransaksi').html(data);
            }
        });
    });
});
//Tambah Akun Perkiraan
$('#ModalTambahJurnal').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var GetId = pecah[0];
    var Referensi = pecah[1];
    $('#FormTambahJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/FormTambahJurnal.php',
        data        : {GetId: GetId, Referensi: Referensi},
        success     : function(data){
            $('#FormTambahJurnal').html(data);
        }
    });
});
$('#ProsesFilterJurnal').submit(function(){
    var ProsesFilterJurnal = $('#ProsesFilterJurnal').serialize();
    $('#MenampilkanTabelJurnal').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/TabelJurnal.php',
        data        : ProsesFilterJurnal,
        success     : function(data){
            $('#MenampilkanTabelJurnal').html(data);
        }
    });
});
//Detail Akun Perkiraan
$('#ModalDetailJurnal').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_jurnal = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    $('#FormDetailJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/FormDetailJurnal.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormDetailJurnal').html(data);
        }
    });
    //Edit Jurnal
    $('#ModalEditJurnal').on('show.bs.modal', function (e) {
        $('#FormEditJurnal').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Jurnal/FormEditJurnal.php',
            data        : {id_jurnal: id_jurnal},
            success     : function(data){
                $('#FormEditJurnal').html(data);
                //Proses Edit Akun perkiraan
                $('#ProsesEditJurnal').submit(function(){
                    $('#NotifikasiEditJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    var form = $('#ProsesEditJurnal')[0];
                    var data = new FormData(form);
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Jurnal/ProsesEditJurnal.php',
                        data 	    :  data,
                        cache       : false,
                        processData : false,
                        contentType : false,
                        enctype     : 'multipart/form-data',
                        success     : function(data){
                            $('#NotifikasiEditJurnal').html(data);
                            var NotifikasiEditJurnalBerhasil=$('#NotifikasiEditJurnalBerhasil').html();
                            if(NotifikasiEditJurnalBerhasil=="Success"){
                                $('#ModalEditJurnal').modal('toggle');
                                $.ajax({
                                    type 	    : 'POST',
                                    url 	    : '_Page/Jurnal/TabelJurnal.php',
                                    data 	    :  {keyword: keyword, batas: batas, page: page, ShortBy: ShortBy, OrderBy: OrderBy},
                                    success     : function(data){
                                        $('#MenampilkanTabelJurnal').html(data);
                                        swal("Good Job!", "Edit Akun Perkiraan Berhasil!", "success");
                                    }
                                });
                            }
                        }
                    });
                });
            }
        });
    });
    //Hapus Jurnal
    $('#ModalHapusJurnal').on('show.bs.modal', function (e) {
        $('#FormhapusJurnal').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Jurnal/FormhapusJurnal.php',
            data        : {id_jurnal: id_jurnal},
            success     : function(data){
                $('#FormhapusJurnal').html(data);
                //Konfirmasi Hapus Jurnal
                $('#KonfirmasiHapusJurnal').click(function(){
                    $('#NotifikasiHapusJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Jurnal/ProsesHapusJurnal.php',
                        data        : {id_jurnal: id_jurnal},
                        success     : function(data){
                            $('#NotifikasiHapusJurnal').html(data);
                            var NotifikasiHapusJurnalBerhasil=$('#NotifikasiHapusJurnalBerhasil').html();
                            if(NotifikasiHapusJurnalBerhasil=="Success"){
                                $('#ModalHapusJurnal').modal('toggle');
                                $.ajax({
                                    type 	    : 'POST',
                                    url 	    : '_Page/Jurnal/TabelJurnal.php',
                                    data 	    :  {keyword: keyword, batas: batas, page: page, ShortBy: ShortBy, OrderBy: OrderBy},
                                    success     : function(data){
                                        $('#MenampilkanTabelJurnal').html(data);
                                        swal("Good Job!", "Hapus Jurnal Berhasil!", "success");
                                    }
                                });
                            }
                        }
                    });
                });
            }
        });
    });
});

