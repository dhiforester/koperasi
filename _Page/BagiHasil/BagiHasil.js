$('#MenampilkanTabelBagiHasil').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/BagiHasil/TabelBagiHasil.php',
    success     : function(data){
        $('#MenampilkanTabelBagiHasil').html(data);
    }
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBagiHasil').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/TabelBagiHasil.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBagiHasil').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#ProsesFilterBagiHasil').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelBagiHasil').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/TabelBagiHasil.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelBagiHasil').html(data);
            $('#ModalFilterBagiHasil').modal('hide');
        }
    });
});
//Export Bagi Hasil
$('#ModalExportBagiHasil').on('show.bs.modal', function (e) {
    $('#FormExportBagiHasil').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormExportBagiHasil.php',
        success     : function(data){
            $('#FormExportBagiHasil').html(data);
        }
    });
});
//Tambah BagiHasil
$('#ModalTambahBagiHasil').on('show.bs.modal', function (e) {
    $('#FormTambahBagiHasil').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormTambahBagiHasil.php',
        success     : function(data){
            $('#FormTambahBagiHasil').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Tambah BagiHasil
            $('#ProsesTambahBagiHasil').submit(function(){
                $('#NotifikasiTambahBagiHasil').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahBagiHasil')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesTambahBagiHasil.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahBagiHasil').html(data);
                        var NotifikasiTambahBagiHasilBerhasil=$('#NotifikasiTambahBagiHasilBerhasil').html();
                        if(NotifikasiTambahBagiHasilBerhasil=="Success"){
                            var UrlBack=$('#UrlBack').val();
                            text = UrlBack.replace('amp;', "");
                            text = UrlBack.replace('amp;', "");
                            window.location.href = UrlBack;
                        }
                    }
                });
            });
        }
    });
});
//Edit Bagi Hasil
$('#ModalEditBagiHasil').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormEditBagiHasil').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormEditBagiHasil.php',
        data        : {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormEditBagiHasil').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Kondisi saat tampilkan password
            $('#HitungUlang').click(function(){
                if($(this).is(':checked')){
                    $('#NotifikasiHitungUlang').load("_Page/BagiHasil/NotifikasiHitungUlang.php");
                }else{
                    $('#NotifikasiHitungUlang').html("");
                }
            });
            //Proses Edit Bagi Hasil
            $('#ProsesEditBagiHasil').submit(function(){
                $('#NotifikasiEditBagiHasil').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditBagiHasil')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesEditBagiHasil.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditBagiHasil').html(data);
                        var NotifikasiEditBagiHasilBerhasil=$('#NotifikasiEditBagiHasilBerhasil').html();
                        if(NotifikasiEditBagiHasilBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Form Hapus Bagi Hasil
$('#ModalDeleteBagiHasil').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormDeleteBagiHasil').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormDeleteBagiHasil.php',
        data        : {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormDeleteBagiHasil').html(data);
            //Proses Hapus Bagi Hasil
            $('#KonfirmasiHapusBagiHasil').click(function(){
                $('#NotifikasiHapusBagiHasil').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesHapusBagiHasil.php',
                    data        : {id_shu_session: id_shu_session},
                    success     : function(data){
                        $('#NotifikasiHapusBagiHasil').html(data);
                        var NotifikasiHapusBagiHasilBerhasil=$('#NotifikasiHapusBagiHasilBerhasil').html();
                        if(NotifikasiHapusBagiHasilBerhasil=="Success"){
                            window.location.href = 'index.php?Page=BagiHasil';
                        }
                    }
                });
            });
        }
    });
});
//Detail Bagi Hasil
$('#ModalDetailBagiHasil').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormDetailBagiHasil').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormDetailBagiHasil.php',
        data 	    :  {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormDetailBagiHasil').html(data);
        }
    });
});
var id_shu_session=$('#GetIdSessi').html();
$('#RincianBagiHasil').click(function(){
    $('#HalamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/RincianBagiHasil.php',
        data 	    :  {id_shu_session: id_shu_session},
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#HalamanLainnya').html(data);
            $('#JurnalBagiHasil').removeClass('bg-info text-light');
            $('#RincianBagiHasil').addClass('bg-info text-light');
            //Menampilkan Tabel Rincian Bagi Hasil
            $('#MenampilkanTabelRincianBagiHasil').html('Loading..');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/BagiHasil/TabelRincianBagiHasil.php',
                data 	    :  {id_shu_session: id_shu_session},
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#MenampilkanTabelRincianBagiHasil').html(data);
                }
            });
            //BatasRincian Di Ubah
            $('#BatasRincian').change(function(){
                var ProsesBatas2 = $('#ProsesBatas2').serialize();
                $('#MenampilkanTabelRincianBagiHasil').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/TabelRincianBagiHasil.php',
                    data 	    :  ProsesBatas2,
                    success     : function(data){
                        $('#MenampilkanTabelRincianBagiHasil').html(data);
                    }
                });
            });
            //Pencarian rincian bagi hasil
            $('#ProsesBatas2').submit(function(){
                var ProsesBatas2 = $('#ProsesBatas2').serialize();
                $('#MenampilkanTabelRincianBagiHasil').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/TabelRincianBagiHasil.php',
                    data 	    :  ProsesBatas2,
                    success     : function(data){
                        $('#MenampilkanTabelRincianBagiHasil').html(data);
                    }
                });
            });
        }
    });
});
//Pilih Anggota
$('#ModalPilihAnggota').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormPilihAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormPilihAnggota.php',
        data 	    :  {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormPilihAnggota').html(data);
        }
    });
});
//Export Rincian Bagi Hasil
$('#ModalExportRincian').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormExportRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormExportRincian.php',
        data        : {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormExportRincian').html(data);
        }
    });
});
//Export Rincian Bagi Hasil
$('#ModalPetunjukImport').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormPetunjukImport').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormPetunjukImport.php',
        data        : {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormPetunjukImport').html(data);
        }
    });
});
//Import Rincian
$('#ModalImportRincian').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormImportRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormImportRincian.php',
        data        : {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormImportRincian').html(data);
            //Proses Import Rincian
            $('#ProsesImportRincian').submit(function(){
                $('#NotifikasiImportRincian').html('<tr><td colspan="4" class="text-center">Loading...</td></tr>');
                var form = $('#ProsesImportRincian')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesImportRincian.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiImportRincian').html(data);
                    }
                });
            });
        }
    });
});
//Tambah Rincian Bagi Hasil
$('#ModalTambahRincian').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_anggota = pecah[0];
    var id_shu_session = pecah[1];
    $('#FormTambahRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormTambahRincian.php',
        data        : {id_anggota: id_anggota, id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormTambahRincian').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Tambah Rincian Bagi Hasil
            $('#ProsesTambahRincian').submit(function(){
                $('#NotifikasiTambahRincian').html('Loading...');
                var form = $('#ProsesTambahRincian')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesTambahRincian.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahRincian').html(data);
                        var NotifikasiTambahRincianBerhasil=$('#NotifikasiTambahRincianBerhasil').html();
                        if(NotifikasiTambahRincianBerhasil=="Success"){
                            $('#MenampilkanTabelRincianBagiHasil').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BagiHasil/TabelRincianBagiHasil.php',
                                data 	    :  {id_shu_session: id_shu_session},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelRincianBagiHasil').html(data);
                                    $('#ModalTambahRincian').modal('hide');
                                    swal("Berhasil!", "Tambah Rincian Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Detail Rincian Bagi Hasil
$('#ModalDetailRincian').on('show.bs.modal', function (e) {
    var id_shu_rincian = $(e.relatedTarget).data('id');
    $('#FormDetailRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormDetailRincian.php',
        data        : {id_shu_rincian: id_shu_rincian},
        success     : function(data){
            $('#FormDetailRincian').html(data);
        }
    });
});
//Edit Rincian Bagi Hasil
$('#ModalEditRincian').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_shu_rincian = pecah[0];
    var id_shu_session = pecah[1];
    var keyword = pecah[2];
    var batas = pecah[3];
    var page = pecah[4];
    $('#FormEditRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormEditRincian.php',
        data        : {id_shu_rincian: id_shu_rincian},
        success     : function(data){
            $('#FormEditRincian').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Edit Rincian Bagi Hasil
            $('#ProsesEditRincian').submit(function(){
                $('#NotifikasiEditRincian').html('Loading...');
                var form = $('#ProsesEditRincian')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesEditRincian.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditRincian').html(data);
                        var NotifikasiEditRincianBerhasil=$('#NotifikasiEditRincianBerhasil').html();
                        if(NotifikasiEditRincianBerhasil=="Success"){
                            $('#MenampilkanTabelRincianBagiHasil').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BagiHasil/TabelRincianBagiHasil.php',
                                data 	    :  {id_shu_session: id_shu_session, KeywordRincian:keyword, BatasRincian:batas, PageRincian:page},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelRincianBagiHasil').html(data);
                                    $('#ModalEditRincian').modal('hide');
                                    swal("Berhasil!", "Edit Rincian Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Rincian Bagi Hasil
$('#ModalDeleteRincian').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_shu_rincian = pecah[0];
    var id_shu_session = pecah[1];
    var keyword = pecah[2];
    var batas = pecah[3];
    var page = pecah[4];
    $('#FormDeleteRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormDeleteRincian.php',
        data        : {id_shu_rincian: id_shu_rincian},
        success     : function(data){
            $('#FormDeleteRincian').html(data);
            //Proses Hapus Rincian
            $('#KonfirmasiHapusRincian').click(function(){
                $('#NotifikasiHapusRincian').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesHapusRincian.php',
                    data        : {id_shu_rincian: id_shu_rincian},
                    success     : function(data){
                        $('#NotifikasiHapusRincian').html(data);
                        var NotifikasiHapusRincianBerhasil=$('#NotifikasiHapusRincianBerhasil').html();
                        if(NotifikasiHapusRincianBerhasil=="Success"){
                            $('#MenampilkanTabelRincianBagiHasil').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BagiHasil/TabelRincianBagiHasil.php',
                                data 	    :  {id_shu_session: id_shu_session, KeywordRincian:keyword, BatasRincian:batas, PageRincian:page},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelRincianBagiHasil').html(data);
                                    $('#ModalDeleteRincian').modal('hide');
                                    swal("Berhasil!", "Hapus Rincian Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Rincian Jurnal
$('#JurnalBagiHasil').click(function(){
    $('#HalamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/JurnalBagiHasil.php',
        data 	    :  {id_shu_session: id_shu_session},
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#HalamanLainnya').html(data);
            $('#JurnalBagiHasil').addClass('bg-info text-light');
            $('#RincianBagiHasil').removeClass('bg-info text-light');
        }
    });
});
//Tambah Jurnal Bagi Hasil
$('#ModalTambahJurnalBagiHasil').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormTambahJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormTambahJurnal.php',
        data        : {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormTambahJurnal').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
        }
    });
});
//Hapus Jurnal Bagi Hasil
$('#ModalHapusJurnal').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_jurnal = pecah[0];
    var id_shu_session = pecah[1];
    $('#FormHapusJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormHapusJurnal.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormHapusJurnal').html(data);
            //Proses Hapus Bagi Hasil
            $('#KonfirmasiHapusJurnal').click(function(){
                $('#NotifikasiHapusJurnal').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesHapusJurnal.php',
                    data        : {id_jurnal: id_jurnal},
                    success     : function(data){
                        $('#NotifikasiHapusJurnal').html(data);
                        var NotifikasiHapusJurnalBerhasil=$('#NotifikasiHapusJurnalBerhasil').html();
                        if(NotifikasiHapusJurnalBerhasil=="Success"){
                            $('#HalamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BagiHasil/JurnalBagiHasil.php',
                                data 	    :  {id_shu_session: id_shu_session},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#HalamanLainnya').html(data);
                                    $('#ModalHapusJurnal').modal('hide');
                                    swal("Berhasil!", "Hapus Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Semua Jurnal
$('#ModalHapusSemuaJurnal').on('show.bs.modal', function (e) {
    var id_shu_session = $(e.relatedTarget).data('id');
    $('#FormHapusSemuaJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormHapusSemuaJurnal.php',
        data        : {id_shu_session: id_shu_session},
        success     : function(data){
            $('#FormHapusSemuaJurnal').html(data);
            //Proses Hapus Semua Jurnal
            $('#KonfirmasiHapusSemuaJurnal').click(function(){
                $('#NotifikasiHapusSemuaJurnal').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesHapusSemuaJurnal.php',
                    data        : {id_shu_session: id_shu_session},
                    success     : function(data){
                        $('#NotifikasiHapusSemuaJurnal').html(data);
                        var NotifikasiHapusSemuaJurnalBerhasil=$('#NotifikasiHapusSemuaJurnalBerhasil').html();
                        if(NotifikasiHapusSemuaJurnalBerhasil=="Success"){
                            $('#HalamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BagiHasil/JurnalBagiHasil.php',
                                data 	    :  {id_shu_session: id_shu_session},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#HalamanLainnya').html(data);
                                    $('#ModalHapusSemuaJurnal').modal('hide');
                                    swal("Berhasil!", "Hapus Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Tambah Edit Jurnal
$('#ModalEditJurnal').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_jurnal = pecah[0];
    var id_shu_session = pecah[1];
    $('#FormEditJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BagiHasil/FormEditJurnal.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormEditJurnal').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Tambah Jurnal Bagi Hasil
            $('#ProsesEditJurnal').submit(function(){
                $('#NotifikasiEditJurnal').html('Loading...');
                var form = $('#ProsesEditJurnal')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BagiHasil/ProsesEditJurnal.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditJurnal').html(data);
                        var NotifikasiEditJurnalBerhasil=$('#NotifikasiEditJurnalBerhasil').html();
                        if(NotifikasiEditJurnalBerhasil=="Success"){
                            $('#HalamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BagiHasil/JurnalBagiHasil.php',
                                data 	    :  {id_shu_session: id_shu_session},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#HalamanLainnya').html(data);
                                    $('#FormEditJurnal').html("");
                                    $('#ModalEditJurnal').modal('hide');
                                    swal("Berhasil!", "Edit Jurnal Bagi Hasil Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});