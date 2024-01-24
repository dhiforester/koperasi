$('#MenampilkanTabelAkses').html("Loading...");
$('#MenampilkanTabelAkses').load("_Page/Akses/TabelAkses.php");
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
$('#ProsesFilterAkses').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
            $('#ModalFilterAkses').modal('hide');
        }
    });
});
//Tambah Akses
$('#ModalTambahAkses').on('show.bs.modal', function (e) {
    $('#FormTambahAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormTambahAkses.php',
        success     : function(data){
            $('#FormTambahAkses').html(data);
            //Kondisi saat tampilkan password
            $('.form-check-input').click(function(){
                if($(this).is(':checked')){
                    $('#password1').attr('type','text');
                    $('#password2').attr('type','text');
                }else{
                    $('#password1').attr('type','password');
                    $('#password2').attr('type','password');
                }
            });
            //Kondisi id_mitra dipilih
            $('#id_mitra').change(function(){
                var id_mitra = $('#id_mitra').val();
                if(id_mitra==""){
                    $('#akses').html('<option value="Admin">Admin</option><option value="">More Access Groups</option>');
                }else{
                    $("#grup_akses").val("");
                    $("#grup_akses").prop("disabled", true);
                    $('#akses').load('_Page/Akses/PilihAksesMitra.php');
                }
            });
            //Kondisi ketika akses dipilih
            $('#akses').change(function(){
                var akses = $('#akses').val();
                if(akses==""){
                    $("#grup_akses").prop("disabled", false);
                }else{
                    $("#grup_akses").prop("disabled", true);
                }
            });
            //Proses Tambah Akses
            $('#ProsesTambahAkses').submit(function(){
                $('#NotifikasiTambahAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahAkses')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesTambahAkses.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahAkses').html(data);
                        var NotifikasiTambahAksesBerhasil=$('#NotifikasiTambahAksesBerhasil').html();
                        if(NotifikasiTambahAksesBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Detail Akses
$('#ModalDetailAkses').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    $('#FormDetailAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormDetailAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormDetailAkses').html(data);
        }
    });
});
//Edit Akses
$('#ModalEditAkses').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormEditAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormEditAkses').html(data);
            //Proses Edit Akses
            $('#ProsesEditAkses').submit(function(){
                $('#NotifikasiEditAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditAkses')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesEditAkses.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditAkses').html(data);
                        var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
                        if(NotifikasiEditAksesBerhasil=="Success"){
                            $('#MenampilkanTabelAkses').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalEditAkses').modal('hide');
                                    swal("Good Job!", "Edit Access Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Ubah Password
$('#ModalUbahPassword').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormUbahPassword').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormUbahPassword.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormUbahPassword').html(data);
            //Kondisi saat tampilkan password
            $('#TampilkanPassword2').click(function(){
                if($(this).is(':checked')){
                    $('#password1_edit').attr('type','text');
                    $('#password2_edit').attr('type','text');
                }else{
                    $('#password1_edit').attr('type','password');
                    $('#password2_edit').attr('type','password');
                }
            });
            //Proses Tambah Akses
            $('#ProsesUbahPassword').submit(function(){
                $('#NotifikasiUbahPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesUbahPassword')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesUbahPassword.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiUbahPassword').html(data);
                        var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
                        if(NotifikasiUbahPasswordBerhasil=="Success"){
                            $('#MenampilkanTabelAkses').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalUbahPassword').modal('hide');
                                    swal("Good Job!", "UbahPassword Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Akses
$('#ModalDeleteAkses').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormDeleteAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormDeleteAkses').html(data);
            //Konfirmasi Hapus akses
            $('#KonfirmasiHapusAkses').click(function(){
                $('#NotifikasiHapusAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesHapusAkses.php',
                    data        : {id_akses: id_akses},
                    success     : function(data){
                        $('#NotifikasiHapusAkses').html(data);
                        var NotifikasiHapusAksesBerhasil=$('#NotifikasiHapusAksesBerhasil').html();
                        if(NotifikasiHapusAksesBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalDeleteAkses').modal('hide');
                                    swal("Good Job!", "Delete Access Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});

//Modal Ubah Password
$('#ModalUbahPassword2').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#FormUbahPassword2').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormUbahPassword.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormUbahPassword2').html(data);
            //Kondisi saat tampilkan password
            $('#TampilkanPassword2').click(function(){
                if($(this).is(':checked')){
                    $('#password1_edit').attr('type','text');
                    $('#password2_edit').attr('type','text');
                }else{
                    $('#password1_edit').attr('type','password');
                    $('#password2_edit').attr('type','password');
                }
            });
            //Proses Edit Password
            $('#ProsesUbahPassword2').submit(function(){
                $('#NotifikasiUbahPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesUbahPassword2')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesUbahPassword.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiUbahPassword').html(data);
                        var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
                        if(NotifikasiUbahPasswordBerhasil=="Success"){
                            $('#ModalUbahPassword2').modal('hide');
                            swal("Good Job!", "Ubah Password Berhasil!", "success");
                        }
                    }
                });
            });
        }
    });
});
//Edit Akses 2
$('#ModalEditAkses2').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#FormEditAkses2').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormEditAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormEditAkses2').html(data);
            //Proses Edit Akses
            $('#ProsesEditAkses2').submit(function(){
                $('#NotifikasiEditAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditAkses2')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesEditAkses.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditAkses').html(data);
                        var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
                        if(NotifikasiEditAksesBerhasil=="Success"){
                            $('#ModalEditAkses2').modal('hide');
                            swal("Good Job!", "Edit Access Success!", "success");
                        }
                    }
                });
            });
        }
    });
});
//Kondisi Dashboard Akses Dipilih
$("#DashboardAkses").click(function(){
    var id_akses = $("#GetIdAkses").html();
    $('#HalamanDetailAkses').html('Loading..');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/DashboardAkses.php',
        data 	    :  {id_akses: id_akses},
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#HalamanDetailAkses').html(data);
            $('#DashboardAkses').addClass('bg-info text-light');
            $('#IjinAkses').removeClass('bg-info text-light');
            $('#LogAktivitas').removeClass('bg-info text-light');
        }
    });
});
$('#IjinAkses').click(function(){
    var GetIdAkses=$('#GetIdAkses').html();
    $('#HalamanDetailAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/AturIjinAkses.php',
        data 	    :  {id_akses: GetIdAkses},
        success     : function(data){
            $('#HalamanDetailAkses').html(data);
            $('#DashboardAkses').removeClass('bg-info text-light');
            $('#IjinAkses').addClass('bg-info text-light');
            $('#LogAktivitas').removeClass('bg-info text-light');
        }
    });
});
$('#LogAktivitas').click(function(){
    var GetIdAkses=$('#GetIdAkses').html();
    $('#HalamanDetailAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/LogAktivitas.php',
        data 	    :  {id_akses: GetIdAkses},
        success     : function(data){
            $('#HalamanDetailAkses').html(data);
            $('#TampilkanLogAkses').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Akses/TabelLogAtivtas.php',
                data 	    :  {id_akses: GetIdAkses},
                success     : function(data){
                    $('#TampilkanLogAkses').html(data);
                    $('#DashboardAkses').removeClass('bg-info text-light');
                    $('#IjinAkses').removeClass('bg-info text-light');
                    $('#LogAktivitas').addClass('bg-info text-light');
                }
            });
            $('#BatasLog').change(function(){
                var ProsesBatasLog = $('#ProsesBatasLog').serialize();
                $('#TampilkanLogAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelLogAtivtas.php',
                    data 	    :  ProsesBatasLog,
                    success     : function(data){
                        $('#TampilkanLogAkses').html(data);
                    }
                });
            });
            $('#ProsesBatasLog').submit(function(){
                var ProsesBatasLog = $('#ProsesBatasLog').serialize();
                $('#TampilkanLogAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelLogAtivtas.php',
                    data 	    :  ProsesBatasLog,
                    success     : function(data){
                        $('#TampilkanLogAkses').html(data);
                    }
                });
            });
            $('#OrderByLog').change(function(){
                var ProsesBatasLog = $('#ProsesBatasLog').serialize();
                $('#TampilkanLogAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelLogAtivtas.php',
                    data 	    :  ProsesBatasLog,
                    success     : function(data){
                        $('#TampilkanLogAkses').html(data);
                    }
                });
            });
            $('#ShortByLog').change(function(){
                var ProsesBatasLog = $('#ProsesBatasLog').serialize();
                $('#TampilkanLogAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelLogAtivtas.php',
                    data 	    :  ProsesBatasLog,
                    success     : function(data){
                        $('#TampilkanLogAkses').html(data);
                    }
                });
            });
            $('#KeywordByLog').change(function(){
                var KeywordByLog = $('#KeywordByLog').val();
                $('#FormKeywordLog').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/FormKeywordLog.php',
                    data 	    :  {KeywordByLog: KeywordByLog},
                    success     : function(data){
                        $('#FormKeywordLog').html(data);
                    }
                });
            });
        }
    });
});
//Modal Kembalikan Standar
$('#ModalKembalikanStandar').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#FormKembalikanStandar').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormKembalikanStandar.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormKembalikanStandar').html(data);
            //Proses Edit Akses
            $('#KonfirmasiIjinAksesStandar').click(function(){
                $('#NotifikasiIjinAksesStandar').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesKembalikanIjinAkses.php',
                    data        : {id_akses: id_akses},
                    success     : function(data){
                        $('#NotifikasiIjinAksesStandar').html(data);
                        var NotifikasiIjinAksesStandarBerhasil=$('#NotifikasiIjinAksesStandarBerhasil').html();
                        if(NotifikasiIjinAksesStandarBerhasil=="Success"){
                            $('#HalamanDetailAkses').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/AturIjinAkses.php',
                                data 	    :  {id_akses: id_akses},
                                success     : function(data){
                                    $('#HalamanDetailAkses').html(data);
                                    $('#ModalKembalikanStandar').modal('hide');
                                    swal("Good Job!", "Ubah Akses Standar Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});