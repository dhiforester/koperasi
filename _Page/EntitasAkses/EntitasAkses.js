$('#MenampilkanTabelEntitasAkses').html("Loading...");
$('#MenampilkanTabelEntitasAkses').load("_Page/EntitasAkses/TabelEntitasAkses.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelEntitasAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/TabelEntitasAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelEntitasAkses').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelEntitasAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/TabelEntitasAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelEntitasAkses').html(data);
        }
    });
});
$('#ProsesFilterEntitasAkses').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelEntitasAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/TabelEntitasAkses.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelEntitasAkses').html(data);
            $('#ModalFilterApiKey').modal('hide');
        }
    });
});
//Kondisi ketika acc1 checkd
$("#checkall").click(function(){
    $('.checkall').not(this).prop('checked', this.checked);
});
//Proses Tambah entitas baru
$('#ProsesBuatEntitasBaru').submit(function(){
    $('#NotifikasiBuatEntitas').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesBuatEntitasBaru')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/ProsesBuatEntitasBaru.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiBuatEntitas').html(data);
            var NotifikasiBuatEntitasBerhasil=$('#NotifikasiBuatEntitasBerhasil').html();
            if(NotifikasiBuatEntitasBerhasil=="Success"){
                window.location.replace("index.php?Page=EntitasAkses");
                // location.reload('index.php??Page=EntitasAkses');
            }
        }
    });
});
//Proses edit entitas
$('#ProsesEditEntitas').submit(function(){
    $('#NotifikasiEditEntitas').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditEntitas')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/ProsesEditEntitas.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditEntitas').html(data);
            var NotifikasiEditEntitasBerhasil=$('#NotifikasiEditEntitasBerhasil').html();
            if(NotifikasiEditEntitasBerhasil=="Success"){
                swal("Good Job!", "Edit Entitas Akses Berhasil!", "success");
            }
        }
    });
});
//Edit Entitas
$('#ModalEditEntitas').on('show.bs.modal', function (e) {
    var akses = $(e.relatedTarget).data('id');
    $('#FormEditEntitas').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/FormEditEntitas.php',
        data        : {akses: akses},
        success     : function(data){
            $('#FormEditEntitas').html(data);
        }
    });
});
//Edit ApiKey
$('#ModalDetailEntitas').on('show.bs.modal', function (e) {
    var akses = $(e.relatedTarget).data('id');
    $('#FormDetailEntitasAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/FormDetailEntitasAkses.php',
        data        : {akses: akses},
        success     : function(data){
            $('#FormDetailEntitasAkses').html(data);
        }
    });
});
//Hapus Entitas
$('#ModalDeleteEntitas').on('show.bs.modal', function (e) {
    var akses = $(e.relatedTarget).data('id');
    $('#FormDeleteEntitas').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/EntitasAkses/FormDeleteEntitas.php',
        data        : {akses: akses},
        success     : function(data){
            $('#FormDeleteEntitas').html(data);
            //Konfirmasi Hapus Entitas
            $('#KonfirmasiHapusEntitas').click(function(){
                $('#NotifikasiHapusEntitas').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/EntitasAkses/ProsesHapusEntitas.php',
                    data        : {akses: akses},
                    success     : function(data){
                        $('#NotifikasiHapusEntitas').html(data);
                        var NotifikasiHapusEntitasBerhasil=$('#NotifikasiHapusEntitasBerhasil').html();
                        if(NotifikasiHapusEntitasBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/EntitasAkses/TabelEntitasAkses.php',
                                success     : function(data){
                                    $('#MenampilkanTabelEntitasAkses').html(data);
                                    $('#ModalDeleteEntitas').modal('hide');
                                    swal("Good Job!", "Menghapus Entitas Akses Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});