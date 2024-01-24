$('#MenampilkanTabelSupplier').html("Loading...");
$('#MenampilkanTabelSupplier').load("_Page/Supplier/TabelSupplier.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelSupplier').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/TabelSupplier.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelSupplier').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelSupplier').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/TabelSupplier.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelSupplier').html(data);
        }
    });
});
$('#keyword_by').change(function(){
    var KeywordBy = $('#keyword_by').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#ProsesFilterSupplier').submit(function(){
    var ProsesFilterSupplier = $('#ProsesFilterSupplier').serialize();
    $('#MenampilkanTabelSupplier').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/TabelSupplier.php',
        data 	    :  ProsesFilterSupplier,
        success     : function(data){
            $('#MenampilkanTabelSupplier').html(data);
            $('#ModalFilterSupplier').modal('hide');
        }
    });
});
//Tambah Supplier
$('#ModalTambahSupplier').on('show.bs.modal', function (e) {
    $('#FormTambahSupplier').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/FormTambahSupplier.php',
        success     : function(data){
            $('#FormTambahSupplier').html(data);
            //Proses Tambah Supplier
            $('#ProsesTambahSupplier').submit(function(){
                $('#NotifikasiTambahSupplier').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahSupplier')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Supplier/ProsesTambahSupplier.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahSupplier').html(data);
                        var NotifikasiTambahSupplierBerhasil=$('#NotifikasiTambahSupplierBerhasil').html();
                        if(NotifikasiTambahSupplierBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Detail Supplier
$('#ModalDetailSupplier').on('show.bs.modal', function (e) {
    var id_supplier= $(e.relatedTarget).data('id');
    $('#FormDetailSupplier').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/FormDetailSupplier.php',
        data        : {id_supplier: id_supplier},
        success     : function(data){
            $('#FormDetailSupplier').html(data);
        }
    });
});
$('#RincianBarang').click(function(){
    $('#HalamanDetailSupplier').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var GetIdSupplier =$('#GetIdSupplier').html();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/RincianBarang.php',
        data 	    :  {GetIdSupplier: GetIdSupplier},
        success     : function(data){
            $('#HalamanDetailSupplier').html(data);
        }
    });
});
$('#RiwayatTransaksi').click(function(){
    $('#HalamanDetailSupplier').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var GetIdSupplier =$('#GetIdSupplier').html();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/RiwayatTransaksi.php',
        data 	    :  {GetIdSupplier: GetIdSupplier},
        success     : function(data){
            $('#HalamanDetailSupplier').html(data);
        }
    });
});
//Edit Supplier
$('#ModalEditSupplier').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_supplier = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditSupplier').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/FormEditSupplier.php',
        data        : {id_supplier: id_supplier},
        success     : function(data){
            $('#FormEditSupplier').html(data);
            //Proses Edit Supplier
            $('#ProsesEditSupplier').submit(function(){
                $('#NotifikasiEditSupplier').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditSupplier')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Supplier/ProsesEditSupplier.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditSupplier').html(data);
                        var NotifikasiEditSupplierBerhasil=$('#NotifikasiEditSupplierBerhasil').html();
                        if(NotifikasiEditSupplierBerhasil=="Success"){
                            $('#ModalEditSupplier').modal('toggle');
                            $('#MenampilkanTabelSupplier').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Supplier/TabelSupplier.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelSupplier').html(data);
                                    swal("Good Job!", "Edit Supplier Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});

//Hapus Supplier
$('#ModalDeleteSupplier').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_supplier = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteSupplier').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/FormDeleteSupplier.php',
        data        : {id_supplier: id_supplier},
        success     : function(data){
            $('#FormDeleteSupplier').html(data);
            //Konfirmasi Hapus Supplier
            $('#KonfirmasiHapusSupplier').click(function(){
                $('#NotifikasiHapusSupplier').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Supplier/ProsesHapusSupplier.php',
                    data        : {id_supplier: id_supplier},
                    success     : function(data){
                        $('#NotifikasiHapusSupplier').html(data);
                        var NotifikasiHapusSupplierBerhasil=$('#NotifikasiHapusSupplierBerhasil').html();
                        if(NotifikasiHapusSupplierBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Supplier/TabelSupplier.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelSupplier').html(data);
                                    $('#ModalDeleteSupplier').modal('hide');
                                    swal("Good Job!", "Hapus Supplier Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Proses Import Data Anggota
$('#ProsesImportDataSupplier').submit(function(){
    $('#NotifikasiLogProsesImport').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesImportDataSupplier')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Supplier/ProsesImportDataSupplier.php',
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