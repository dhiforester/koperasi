$('#ProsesLaporanNeracaSaldo').submit(function(){
    var ProsesLaporanNeracaSaldo = $('#ProsesLaporanNeracaSaldo').serialize();
    $('#MenampilkanTabelNeracaSaldo').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/NeracaSaldo/TabelNeracaSaldo.php',
        data 	    :  ProsesLaporanNeracaSaldo,
        success     : function(data){
            $('#MenampilkanTabelNeracaSaldo').html(data);
        }
    });
});

//Tambah Akun Perkiraan
$('#ModalTambahAkunPerkiraan').on('show.bs.modal', function (e) {
    var id_perkiraan = $(e.relatedTarget).data('id');
    $('#FormTambahAkunPerkiraan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/AkunPerkiraan/FormTambahAkunPerkiraan.php',
        data        : {id_perkiraan: id_perkiraan},
        success     : function(data){
            $('#FormTambahAkunPerkiraan').html(data);
            //Proses Tambah Akun perkiraan
            $('#ProsesTambahAkunPerkiraan').submit(function(){
                $('#NotifikasiTambahAkunPerkiraan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahAkunPerkiraan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/AkunPerkiraan/ProsesTambahAkunPerkiraan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahAkunPerkiraan').html(data);
                        var NotifikasiTambahAkunPerkiraanBerhasil=$('#NotifikasiTambahAkunPerkiraanBerhasil').html();
                        if(NotifikasiTambahAkunPerkiraanBerhasil=="Success"){
                            $('#ModalTambahAkunPerkiraan').modal('toggle');
                            var batas=$('#batas').val();
                            var keyword=$('#keyword').val();
                            var GetPage=$('#GetPage').val();
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/AkunPerkiraan/TabelAkunPerkiraan.php',
                                data 	    :  {keyword: keyword, batas: batas, page: GetPage},
                                success     : function(data){
                                    $('#MenampilkanTabelAkunPerkiraan').html(data);
                                    $('#ModalDeleteAkunPerkiraan').modal('hide');
                                    swal("Good Job!", "Tambah Akun Perkiraan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Detail Akun Perkiraan
$('#ModalDetailAkunPerkiraan').on('show.bs.modal', function (e) {
    var id_perkiraan = $(e.relatedTarget).data('id');
    $('#FormDetailAkunPerkiraan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/AkunPerkiraan/FormDetailAkunPerkiraan.php',
        data        : {id_perkiraan: id_perkiraan},
        success     : function(data){
            $('#FormDetailAkunPerkiraan').html(data);
        }
    });
});
//Edit Akun Perkiraan
$('#ModalEditAkunPerkiraan').on('show.bs.modal', function (e) {
    var id_perkiraan = $(e.relatedTarget).data('id');
    $('#FormEditAkunPerkiraan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/AkunPerkiraan/FormEditAkunPerkiraan.php',
        data        : {id_perkiraan: id_perkiraan},
        success     : function(data){
            $('#FormEditAkunPerkiraan').html(data);
            //Proses Edit Akun perkiraan
            $('#ProsesEditAkunPerkiraan').submit(function(){
                $('#NotifikasiEditAkunPerkiraan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditAkunPerkiraan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/AkunPerkiraan/ProsesEditAkunPerkiraan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditAkunPerkiraan').html(data);
                        var NotifikasiEditAkunPerkiraanBerhasil=$('#NotifikasiEditAkunPerkiraanBerhasil').html();
                        if(NotifikasiEditAkunPerkiraanBerhasil=="Success"){
                            $('#ModalEditAkunPerkiraan').modal('toggle');
                            var batas=$('#batas').val();
                            var keyword=$('#keyword').val();
                            var GetPage=$('#GetPage').val();
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/AkunPerkiraan/TabelAkunPerkiraan.php',
                                data 	    :  {keyword: keyword, batas: batas, page: GetPage},
                                success     : function(data){
                                    $('#MenampilkanTabelAkunPerkiraan').html(data);
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
//Hapus Akun Perkiraan
$('#ModalDeleteAkunPerkiraan').on('show.bs.modal', function (e) {
    var id_perkiraan = $(e.relatedTarget).data('id');
    $('#FormDeleteAkunPerkiraan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/AkunPerkiraan/FormDeleteAkunPerkiraan.php',
        data        : {id_perkiraan: id_perkiraan},
        success     : function(data){
            $('#FormDeleteAkunPerkiraan').html(data);
            //Konfirmasi Hapus AkunPerkiraan
            $('#KonfirmasiHapusAkunPerkiraan').click(function(){
                $('#NotifikasiHapusAkunPerkiraan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/AkunPerkiraan/ProsesHapusAkunPerkiraan.php',
                    data        : {id_perkiraan: id_perkiraan},
                    success     : function(data){
                        $('#NotifikasiHapusAkunPerkiraan').html(data);
                        var NotifikasiHapusAkunPerkiraanBerhasil=$('#NotifikasiHapusAkunPerkiraanBerhasil').html();
                        if(NotifikasiHapusAkunPerkiraanBerhasil=="Success"){
                            var batas=$('#batas').val();
                            var keyword=$('#keyword').val();
                            var GetPage=$('#GetPage').val();
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/AkunPerkiraan/TabelAkunPerkiraan.php',
                                data 	    :  {keyword: keyword, batas: batas, page: GetPage},
                                success     : function(data){
                                    $('#MenampilkanTabelAkunPerkiraan').html(data);
                                    $('#ModalDeleteAkunPerkiraan').modal('hide');
                                    swal("Good Job!", "Hapus Akun Perkiraan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});