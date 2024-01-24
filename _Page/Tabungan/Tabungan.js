$('#MenampilkanTabelTabungan').html("Loading...");
$('#MenampilkanTabelTabungan').load("_Page/Tabungan/TabelTabungan.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTabungan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/TabelTabungan.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTabungan').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTabungan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/TabelTabungan.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTabungan').html(data);
        }
    });
});
$('#ProsesFilterTabungan').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelTabungan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/TabelTabungan.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelTabungan').html(data);
            $('#ModalFilterTabungan').modal('hide');
        }
    });
});
//Tambah Tabungan
$('#ModalTambahTabungan').on('show.bs.modal', function (e) {
    $('#DataListAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormTambahTabungan.php',
        success     : function(data){
            $('#DataListAnggota').html(data);
        }
    });
});
$('#ProsesCariAnggota').submit(function(){
    var ProsesCariAnggota = $('#ProsesCariAnggota').serialize();
    $('#DataListAnggota').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormTambahTabungan.php',
        data 	    :  ProsesCariAnggota,
        success     : function(data){
            $('#DataListAnggota').html(data);
        }
    });
});
var GetIdAnggota = $('#id_anggota').val();
$('#MenampilkanTabelSimpananAnggota').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Tabungan/TabelTabunganAnggota.php',
    data 	    :  {id_anggota: GetIdAnggota},
    success     : function(data){
        $('#MenampilkanTabelSimpananAnggota').html(data);
    }
});
//Modal Pilih Anggota
$('#ModalPilihAnggota').on('show.bs.modal', function (e) {
    var id_anggota = $(e.relatedTarget).data('id');
    $('#FormPilihAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormPilihAnggota.php',
        data        : {id_anggota: id_anggota},
        success     : function(data){
            $('#FormPilihAnggota').html(data);
        }
    });
});
//Proses Tambah Tabungan
$('#ProsesTambahTabungan').submit(function(){
    $('#NotifikasiTambahTabungan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahTabungan')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/ProsesTambahTabungan.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahTabungan').html(data);
            var NotifikasiTambahTabunganBerhasil=$('#NotifikasiTambahTabunganBerhasil').html();
            if(NotifikasiTambahTabunganBerhasil=="Success"){
                $('#MenampilkanTabelSimpananAnggota').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/TabelTabunganAnggota.php',
                    data 	    :  {id_anggota: GetIdAnggota},
                    success     : function(data){
                        $('#MenampilkanTabelSimpananAnggota').html(data);
                        $('#ProsesTambahTabungan').trigger("reset");
                        swal("Good Job!", "Tambah Simpanan Anggota Berhasil!", "success");
                    }
                });
            }
        }
    });
});
//Edit Tabungan
$('#ModalEditTabungan').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_tabungan = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditTabungan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormEditTabungan.php',
        data        : {id_tabungan: id_tabungan},
        success     : function(data){
            $('#FormEditTabungan').html(data);
            //Proses Tambah Tabungan
            $('#ProsesEditTabungan').submit(function(){
                $('#NotifikasiEditTabungan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditTabungan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/ProsesEditTabungan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditTabungan').html(data);
                        var NotifikasiEditTabunganBerhasil=$('#NotifikasiEditTabunganBerhasil').html();
                        if(NotifikasiEditTabunganBerhasil=="Success"){
                            $('#MenampilkanTabelTabungan').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Tabungan/TabelTabungan.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelTabungan').html(data);
                                    $('#ModalEditTabungan').modal('hide');
                                    swal("Good Job!", "Edit Regional Data Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Tabungan
$('#ModalDeleteTabungan').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_tabungan = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteTabungan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormDeleteTabungan.php',
        data        : {id_tabungan: id_tabungan},
        success     : function(data){
            $('#FormDeleteTabungan').html(data);
            //Konfirmasi Hapus Tabungan
            $('#KonfirmasiHapusTabungan').click(function(){
                $('#NotifikasiHapusTabungan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/ProsesHapusTabungan.php',
                    data        : {id_tabungan: id_tabungan},
                    success     : function(data){
                        $('#NotifikasiHapusTabungan').html(data);
                        var NotifikasiHapusTabunganBerhasil=$('#NotifikasiHapusTabunganBerhasil').html();
                        if(NotifikasiHapusTabunganBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Tabungan/TabelTabungan.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelTabungan').html(data);
                                    $('#ModalDeleteTabungan').modal('hide');
                                    swal("Good Job!", "Delete Regional Data Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Edit Simpanan Anggota
$('#ModalEditSimpananAnggota').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_simpanan = pecah[0];
    var id_anggota = pecah[1];
    $('#FormEditSimpanan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormEditTabungan.php',
        data        : {id_tabungan: id_simpanan},
        success     : function(data){
            $('#FormEditSimpanan').html(data);
            //Proses Edit Tabungan
            $('#ProsesEditSimpananAnggota').submit(function(){
                $('#NotifikasiEditTabungan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditSimpananAnggota')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/ProsesEditTabungan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditTabungan').html(data);
                        var NotifikasiEditTabunganBerhasil=$('#NotifikasiEditTabunganBerhasil').html();
                        if(NotifikasiEditTabunganBerhasil=="Success"){
                            $('#MenampilkanTabelSimpananAnggota').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Tabungan/TabelTabunganAnggota.php',
                                data 	    :  {id_anggota: id_anggota},
                                success     : function(data){
                                    $('#MenampilkanTabelSimpananAnggota').html(data);
                                    $('#ModalEditSimpananAnggota').modal('hide');
                                    $('#ProsesEditSimpananAnggota').trigger("reset");
                                    swal("Good Job!", "Edit Simpanan Anggota Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Simpanan Anggota
$('#ModalDeleteSimpananAnggota').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_simpanan = pecah[0];
    var id_anggota = pecah[1];
    $('#FormDeleteSimpananAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormDeleteTabungan.php',
        data        : {id_tabungan: id_simpanan},
        success     : function(data){
            $('#FormDeleteSimpananAnggota').html(data);
            //Konfirmasi Hapus Simpanan Anggota
            $('#KonfirmasiHapusSimpananAnggota').click(function(){
                $('#NotifikasiHapusTabungan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/ProsesHapusTabungan.php',
                    data        : {id_tabungan: id_simpanan},
                    success     : function(data){
                        $('#NotifikasiHapusTabungan').html(data);
                        var NotifikasiHapusTabunganBerhasil=$('#NotifikasiHapusTabunganBerhasil').html();
                        if(NotifikasiHapusTabunganBerhasil=="Success"){
                            $('#MenampilkanTabelSimpananAnggota').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Tabungan/TabelTabunganAnggota.php',
                                data 	    :  {id_anggota: id_anggota},
                                success     : function(data){
                                    $('#MenampilkanTabelSimpananAnggota').html(data);
                                    $('#ModalDeleteSimpananAnggota').modal('hide');
                                    $('#ProsesEditSimpananAnggota').trigger("reset");
                                    swal("Good Job!", "Edit Simpanan Anggota Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Detail Tabungan
$('#ModalDetailTabungan').on('show.bs.modal', function (e) {
    var id_tabungan = $(e.relatedTarget).data('id');
    $('#FormDetailTabungan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormDetailTabungan.php',
        data        : {id_tabungan: id_tabungan},
        success     : function(data){
            $('#FormDetailTabungan').html(data);
        }
    });
});
//Proses Import Data Tabungan
$('#ProsesImportTabungan').submit(function(){
    $('#NotifikasiLogProsesImport').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesImportTabungan')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/ProsesImportTabungan.php',
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
//Proses Import Data Tabungan
$('#KeywordBy').change(function(){
    var KeywordBy=$('#KeywordBy').val();
    $('#FormKataKunci').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormKataKunci.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormKataKunci').html(data);
        }
    });
});
//Export Simpanan Anggota
$('#ModalExportSimpanan').on('show.bs.modal', function (e) {
    var id_anggota = $(e.relatedTarget).data('id');
    $('#FormExportSimpanan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Anggota/FormExportSimpanan.php',
        data        : {id_anggota: id_anggota},
        success     : function(data){
            $('#FormExportSimpanan').html(data);
        }
    });
});
//Menampilkan Modal Tambah Jurnal Simpanan
$('#ModalTambahJurnalSimpanan').on('show.bs.modal', function (e) {
    var id_simpanan = $(e.relatedTarget).data('id');
    $('#FormTambahJurnalSimpanan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormTambahJurnalSimpanan.php',
        data        : {id_simpanan: id_simpanan},
        success     : function(data){
            $('#FormTambahJurnalSimpanan').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Tambah Jurnal
            $('#ProsesTambahJurnalSimpanan').submit(function(){
                $('#NotifikasiTambahJurnalSimpanan').html('Loading...');
                var form = $('#ProsesTambahJurnalSimpanan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/ProsesTambahJurnalSimpanan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahJurnalSimpanan').html(data);
                        var NotifikasiTambahJurnalSimpananBerhasil=$('#NotifikasiTambahJurnalSimpananBerhasil').html();
                        if(NotifikasiTambahJurnalSimpananBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Menampilkan Modal Edit Jurnal Simpanan
$('#ModalEditJurnalSimpanan').on('show.bs.modal', function (e) {
    var id_jurnal = $(e.relatedTarget).data('id');
    $('#FormEditJurnalSimpanan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Tabungan/FormEditJurnalSimpanan.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormEditJurnalSimpanan').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            //Proses Edit Jurnal
            $('#ProsesEditJurnalSimpanan').submit(function(){
                $('#NotifikasiEditJurnalSimpanan').html('Loading...');
                var form = $('#ProsesEditJurnalSimpanan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/ProsesEditJurnalSimpanan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditJurnalSimpanan').html(data);
                        var NotifikasiEditJurnalSimpananBerhasil=$('#NotifikasiEditJurnalSimpananBerhasil').html();
                        if(NotifikasiEditJurnalSimpananBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus Jurnal Simpanan Anggota
$('#ModalDeleteJurnalSimpanan').on('show.bs.modal', function (e) {
    var id_jurnal = $(e.relatedTarget).data('id');
    $('#FormDeleteJurnalSimpananAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/FormhapusJurnal.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormDeleteJurnalSimpananAnggota').html(data);
            //Konfirmasi Hapus Jurnal Simpanan Anggota
            $('#KonfirmasiHapusJurnalSimpananAnggota').click(function(){
                $('#NotifikasiHapusJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Tabungan/ProsesHapusJurnal.php',
                    data        : {id_jurnal: id_jurnal},
                    success     : function(data){
                        $('#NotifikasiHapusJurnal').html(data);
                        var NotifikasiHapusJurnalBerhasil=$('#NotifikasiHapusJurnalBerhasil').html();
                        if(NotifikasiHapusJurnalBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});