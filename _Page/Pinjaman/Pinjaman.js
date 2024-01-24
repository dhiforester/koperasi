$('#MenampilkanTabelPinjaman').html("Loading...");
$('#MenampilkanTabelPinjaman').load("_Page/Pinjaman/TabelPinjaman.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPinjaman').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/TabelPinjaman.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPinjaman').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPinjaman').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/TabelPinjaman.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPinjaman').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#ProsesFilterPinjaman').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelPinjaman').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/TabelPinjaman.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelPinjaman').html(data);
            $('#ModalFilterPinjaman').modal('hide');
        }
    });
});
//Tambah Pinjaman
$('#ModalTambahPinjaman').on('show.bs.modal', function (e) {
    $('#FormTambahPinjaman').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormTambahPinjaman.php',
        success     : function(data){
            $('#FormTambahPinjaman').html(data);
        }
    });
});
//Modal Pilih Anggota
$('#ModalPilihAnggota').on('show.bs.modal', function (e) {
    var id_anggota = $(e.relatedTarget).data('id');
    $('#FormPilihAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormPilihAnggota.php',
        data        : {id_anggota: id_anggota},
        success     : function(data){
            $('#FormPilihAnggota').html(data);
        }
    });
});
$('#HitungSimulasi').click(function(){
    var form = $('#ProsesTambahPinjaman')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/SimulasiPinjaman.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#SimulasiPinjaman').html(data);
        }
    });
});

//Proses Tambah Pinjaman
$('#ProsesTambahPinjaman').submit(function(){
    $('#NotifikasiTambahPinjaman').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahPinjaman')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/ProsesTambahPinjaman.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahPinjaman').html(data);
            var NotifikasiTambahPinjamanBerhasil=$('#NotifikasiTambahPinjamanBerhasil').html();
            if(NotifikasiTambahPinjamanBerhasil=="Success"){
                window.location.replace("index.php?Page=Pinjaman");
            }
        }
    });
});
//Detail Pinjaman
$('#ModalDetailPinjaman').on('show.bs.modal', function (e) {
    var id_pinjaman= $(e.relatedTarget).data('id');
    $('#FormDetailPinjaman').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormDetailPinjaman.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormDetailPinjaman').html(data);
        }
    });
});
//Edit Pinjaman
$('#ModalEditPinjaman').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_pinjaman = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditPinjaman').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormEditPinjaman.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormEditPinjaman').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Edit Pinjaman
            $('#ProsesEditPinjaman').submit(function(){
                $('#NotifikasiEditPinjaman').html('Loading...');
                var form = $('#ProsesEditPinjaman')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesEditPinjaman.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditPinjaman').html(data);
                        var NotifikasiEditPinjamanBerhasil=$('#NotifikasiEditPinjamanBerhasil').html();
                        if(NotifikasiEditPinjamanBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelPinjaman.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelPinjaman').html(data);
                                    $('#ModalEditPinjaman').modal('hide');
                                    swal("Good Job!", "Edit Pinjaman Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});

//Hapus Pinjaman
$('#ModalDeletePinjaman').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_pinjaman = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeletePinjaman').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormDeletePinjaman.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormDeletePinjaman').html(data);
            //Konfirmasi Hapus Pinjaman
            $('#KonfirmasiHapusPinjaman').click(function(){
                $('#NotifikasiHapusPinjaman').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesHapusPinjaman.php',
                    data        : {id_pinjaman: id_pinjaman},
                    success     : function(data){
                        $('#NotifikasiHapusPinjaman').html(data);
                        var NotifikasiHapusPinjamanBerhasil=$('#NotifikasiHapusPinjamanBerhasil').html();
                        if(NotifikasiHapusPinjamanBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelPinjaman.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelPinjaman').html(data);
                                    $('#ModalDeletePinjaman').modal('hide');
                                    swal("Good Job!", "Hapus Pinjaman Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Pinjaman
$('#ModalDeletePinjaman2').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormDeletePinjaman2').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormDeletePinjaman.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormDeletePinjaman2').html(data);
            //Konfirmasi Hapus Pinjaman
            $('#KonfirmasiHapusPinjaman2').click(function(){
                $('#NotifikasiHapusPinjaman').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesHapusPinjaman.php',
                    data        : {id_pinjaman: id_pinjaman},
                    success     : function(data){
                        $('#NotifikasiHapusPinjaman').html(data);
                        var NotifikasiHapusPinjamanBerhasil=$('#NotifikasiHapusPinjamanBerhasil').html();
                        if(NotifikasiHapusPinjamanBerhasil=="Success"){
                            window.location.href = 'index.php?Page=Pinjaman';
                        }
                    }
                });
            });
        }
    });
});
//Edit Pinjaman pada detail
$('#ModalEditPinjaman2').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormEditPinjaman2').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormEditPinjaman.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormEditPinjaman2').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Edit Pinjaman
            $('#ProsesEditPinjaman2').submit(function(){
                $('#NotifikasiEditPinjaman').html('Loading...');
                var form = $('#ProsesEditPinjaman2')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesEditPinjaman.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditPinjaman').html(data);
                        var NotifikasiEditPinjamanBerhasil=$('#NotifikasiEditPinjamanBerhasil').html();
                        if(NotifikasiEditPinjamanBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Proses Import Data Pinjaman
$('#ProsesImportDataPinjaman').submit(function(){
    $('#NotifikasiLogProsesImport').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesImportDataPinjaman')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/ProsesImportDataPinjaman.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiLogProsesImport').html(data);
            swal("Import Selesai!", "Silahakan Cek Kembali Proses Import Melalui Log!", "success");
        }
    });
});
var GetIdPinjaman = $('#GetIdPinjaman').html();
//Ketika Angsuran Dipilih
$('#AngsuranPinjaman').click(function(){
    $('#DetailPinjamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/AngsuranPinjaman.php',
        data 	    :  {GetIdPinjaman: GetIdPinjaman},
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#DetailPinjamanLainnya').html(data);
            $('#AngsuranPinjaman').addClass('bg-info text-light');
            $('#JurnalPinjaman').removeClass('bg-info text-light');
            $('#SimulasiPinjaman').removeClass('bg-info text-light');
            //Menampilkan Tabel Angsuran Berdasarkan GetIdPinjaman
            $('#MenampilkanTabelAngsuran').html('Loading..');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Pinjaman/TabelAngsuran.php',
                data 	    :  {GetIdPinjaman: GetIdPinjaman},
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#MenampilkanTabelAngsuran').html(data);
                }
            });
        }
    });
});
//Menampilkan Form Angsuran
$('#ModalTambahAngsuran').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormTambahAngsuran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormTambahAngsuran.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormTambahAngsuran').html(data);
            $( '.format_uang' ).mask('000.000.000', {reverse: true});
            //Proses Simpan Angsuran
            $('#ProsesTambahAngsuran').submit(function(){
                $('#NotifikasiTambahAngsuran').html('Loading...');
                var form = $('#ProsesTambahAngsuran')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesTambahAngsuran.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahAngsuran').html(data);
                        var NotifikasiTambahAngsuranBerhasil=$('#NotifikasiTambahAngsuranBerhasil').html();
                        if(NotifikasiTambahAngsuranBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelAngsuran.php',
                                data 	    :  {GetIdPinjaman: id_pinjaman},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelAngsuran').html(data);
                                    $('#ModalTambahAngsuran').modal('hide');
                                    swal("Import Selesai!", "Tambah Angsuran Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Form Export Angsuran
$('#ModalExportAngsuran').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormExportAngsuran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormExportAngsuran.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormExportAngsuran').html(data);
        }
    });
});
//Menampilkan Form Hapus Angsuran
$('#ModalHapusAngsuran').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_pinjaman_angsuran = pecah[0];
    var id_pinjaman = pecah[1];
    $('#FormHapusAngsuran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormHapusAngsuran.php',
        data        : {id_pinjaman_angsuran: id_pinjaman_angsuran},
        success     : function(data){
            $('#FormHapusAngsuran').html(data);
            //Proses Simpan Angsuran
            $('#KonfirmasiHapusAngsuran').click(function(){
                $('#NotifikasiHapusAngsuran').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesHapusAngsuran.php',
                    data        : {id_pinjaman_angsuran: id_pinjaman_angsuran},
                    success     : function(data){
                        $('#NotifikasiHapusAngsuran').html(data);
                        var NotifikasiHapusAngsuranBerhasil=$('#NotifikasiHapusAngsuranBerhasil').html();
                        if(NotifikasiHapusAngsuranBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelAngsuran.php',
                                data 	    :  {GetIdPinjaman: id_pinjaman},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelAngsuran').html(data);
                                    $('#ModalHapusAngsuran').modal('hide');
                                    swal("Import Selesai!", "Hapus Angsuran Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Form Hapus Semua Angsuran
$('#ModalHapusSemuaAngsuran').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormHapusSemuaAngsuran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormHapusSemuaAngsuran.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormHapusSemuaAngsuran').html(data);
            //Proses Hapus Semua Angsuran
            $('#KonfirmasiHapusSemuaAngsuran').click(function(){
                $('#NotifikasiHapusSemuaAngsuran').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesHapusSemuaAngsuran.php',
                    data        : {id_pinjaman: id_pinjaman},
                    success     : function(data){
                        $('#NotifikasiHapusSemuaAngsuran').html(data);
                        var NotifikasiHapusSemuaAngsuranBerhasil=$('#NotifikasiHapusSemuaAngsuranBerhasil').html();
                        if(NotifikasiHapusSemuaAngsuranBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelAngsuran.php',
                                data 	    :  {GetIdPinjaman: id_pinjaman},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelAngsuran').html(data);
                                    $('#ModalHapusSemuaAngsuran').modal('hide');
                                    swal("Import Selesai!", "Hapus Angsuran Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Ketika Jurnal Dipilih
$('#JurnalPinjaman').click(function(){
    $('#DetailPinjamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/JurnalPinjaman.php',
        data 	    :  {GetIdPinjaman: GetIdPinjaman},
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#DetailPinjamanLainnya').html(data);
            $('#AngsuranPinjaman').removeClass('bg-info text-light');
            $('#JurnalPinjaman').addClass('bg-info text-light');
            $('#SimulasiPinjaman').removeClass('bg-info text-light');
            //Menampilkan Tabel Angsuran Berdasarkan GetIdPinjaman
            $('#MenampilkanTabelJurnal').html('Loading..');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Pinjaman/TabelJurnal.php',
                data 	    :  {GetIdPinjaman: GetIdPinjaman},
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#MenampilkanTabelJurnal').html(data);
                }
            });
        }
    });
});
//Menampilkan Modal Tambah Jurnal
$('#ModalTambahJurnal').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormTambahJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormTambahJurnal.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormTambahJurnal').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Tambah Jurnal
            $('#ProsesTambahJurnal').submit(function(){
                $('#NotifikasiTambahJurnal').html('Loading...');
                var form = $('#ProsesTambahJurnal')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesTambahJurnal.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahJurnal').html(data);
                        var NotifikasiTambahJurnalBerhasil=$('#NotifikasiTambahJurnalBerhasil').html();
                        if(NotifikasiTambahJurnalBerhasil=="Success"){
                            $('#MenampilkanTabelJurnal').html('Loading..');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelJurnal.php',
                                data 	    :  {GetIdPinjaman: id_pinjaman},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelJurnal').html(data);
                                    $('#ModalTambahJurnal').modal('hide');
                                    swal("Berhasil!", "Tambah Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Modal Edit Jurnal
$('#ModalEditJurnal').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_jurnal = pecah[0];
    var id_pinjaman = pecah[1];
    $('#FormEditJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormEditJurnal.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormEditJurnal').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Edit Jurnal
            $('#ProsesEditJurnal').submit(function(){
                $('#NotifikasiEditJurnal').html('Loading...');
                var form = $('#ProsesEditJurnal')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesEditJurnal.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditJurnal').html(data);
                        var NotifikasiEditJurnalBerhasil=$('#NotifikasiEditJurnalBerhasil').html();
                        if(NotifikasiEditJurnalBerhasil=="Success"){
                            $('#MenampilkanTabelJurnal').html('Loading..');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelJurnal.php',
                                data 	    :  {GetIdPinjaman: id_pinjaman},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelJurnal').html(data);
                                    $('#ModalEditJurnal').modal('hide');
                                    swal("Berhasil!", "Edit Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Form Hapus Jurnal
$('#ModalHapusJurnal').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_jurnal = pecah[0];
    var id_pinjaman = pecah[1];
    $('#FormHapusJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormHapusJurnal.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormHapusJurnal').html(data);
            //Proses Hapus Jurnal
            $('#KonfirmasiHapusJurnal').click(function(){
                $('#NotifikasiHapusJurnal').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesHapusJurnal.php',
                    data        : {id_jurnal: id_jurnal},
                    success     : function(data){
                        $('#NotifikasiHapusJurnal').html(data);
                        var NotifikasiHapusJurnalBerhasil=$('#NotifikasiHapusJurnalBerhasil').html();
                        if(NotifikasiHapusJurnalBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelJurnal.php',
                                data 	    :  {GetIdPinjaman: id_pinjaman},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelJurnal').html(data);
                                    $('#ModalHapusJurnal').modal('hide');
                                    swal("Import Selesai!", "Hapus Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Form Hapus Semua Jurnal Pinjaman
$('#ModalHapusSemuaJurnal').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormHapusSemuaJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormHapusSemuaJurnal.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormHapusSemuaJurnal').html(data);
            //Proses Hapus Jurnal
            $('#KonfirmasiHapusSemuaJurnal').click(function(){
                $('#NotifikasiHapusSemuaJurnal').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pinjaman/ProsesHapusSemuaJurnal.php',
                    data        : {id_pinjaman: id_pinjaman},
                    success     : function(data){
                        $('#NotifikasiHapusSemuaJurnal').html(data);
                        var NotifikasiHapusSemuaJurnalBerhasil=$('#NotifikasiHapusSemuaJurnalBerhasil').html();
                        if(NotifikasiHapusSemuaJurnalBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pinjaman/TabelJurnal.php',
                                data 	    :  {GetIdPinjaman: id_pinjaman},
                                enctype     : 'multipart/form-data',
                                success     : function(data){
                                    $('#MenampilkanTabelJurnal').html(data);
                                    $('#ModalHapusSemuaJurnal').modal('hide');
                                    swal("Import Selesai!", "Hapus Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Form Export Jurnal Pinjaman
$('#ModalExportJurnal').on('show.bs.modal', function (e) {
    var id_pinjaman = $(e.relatedTarget).data('id');
    $('#FormExportJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/FormExportJurnal.php',
        data        : {id_pinjaman: id_pinjaman},
        success     : function(data){
            $('#FormExportJurnal').html(data);
        }
    });
});
//Ketika SimulasiPinjaman Dipilih
$('#SimulasiPinjaman').click(function(){
    $('#DetailPinjamanLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pinjaman/SimulasiPinjaman2.php',
        data 	    :  {GetIdPinjaman: GetIdPinjaman},
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#DetailPinjamanLainnya').html(data);
            $('#AngsuranPinjaman').removeClass('bg-info text-light');
            $('#JurnalPinjaman').removeClass('bg-info text-light');
            $('#SimulasiPinjaman').addClass('bg-info text-light');
        }
    });
});
