$('#MenampilkanTabelStockOpename').html("Loading...");
$('#MenampilkanTabelStockOpename').load("_Page/StockOpename/TabelStockOpename.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelStockOpename').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/TabelStockOpename.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelStockOpename').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelStockOpename').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/TabelStockOpename.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelStockOpename').html(data);
        }
    });
});
$('#keyword_by').change(function(){
    var KeywordBy = $('#keyword_by').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#ProsesFilterStockOpename').submit(function(){
    var ProsesFilterStockOpename = $('#ProsesFilterStockOpename').serialize();
    $('#MenampilkanTabelStockOpename').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/TabelStockOpename.php',
        data 	    :  ProsesFilterStockOpename,
        success     : function(data){
            $('#MenampilkanTabelStockOpename').html(data);
            $('#ModalFilterStockOpename').modal('hide');
        }
    });
});
//Modal Tambah Stock Opename
$('#ModalTambahStockOpename').on('show.bs.modal', function (e) {
    $('#FormTambahStockOpename').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormTambahStockOpename.php',
        success     : function(data){
            $('#FormTambahStockOpename').html(data);
            $('#ProsesTambahStockOpename').submit(function(){
                var ProsesTambahStockOpename = $('#ProsesTambahStockOpename').serialize();
                $('#NotifikasiTambahSesiStockOpename').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/StockOpename/ProsesTambahStockOpename.php',
                    data 	    :  ProsesTambahStockOpename,
                    success     : function(data){
                        $('#NotifikasiTambahSesiStockOpename').html(data);
                        var NotifikasiTambahSesiStockOpenameBerhasil=$('#NotifikasiTambahSesiStockOpenameBerhasil').html();
                        if(NotifikasiTambahSesiStockOpenameBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Stock Opename
$('#ModalEditStockOpename').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_stok_opename = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditStockOpename').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormEditStockOpename.php',
        data        : {id_stok_opename: id_stok_opename},
        success     : function(data){
            $('#FormEditStockOpename').html(data);
            //Proses Edit Stock Opename
            $('#ProsesEditStockOpename').submit(function(){
                $('#NotifikasiEditStockOpename').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditStockOpename')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/StockOpename/ProsesEditStockOpename.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditStockOpename').html(data);
                        var NotifikasiEditStockOpenameBerhasil=$('#NotifikasiEditStockOpenameBerhasil').html();
                        if(NotifikasiEditStockOpenameBerhasil=="Success"){
                            $('#ModalEditStockOpename').modal('toggle');
                            $('#MenampilkanTabelStockOpename').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/StockOpename/TabelStockOpename.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelStockOpename').html(data);
                                    swal("Good Job!", "Edit Stock Opename Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Delete Stock Opename
$('#ModalDeleteStockOpename').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_stok_opename = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteStockOpename').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormDeleteStockOpename.php',
        data        : {id_stok_opename: id_stok_opename},
        success     : function(data){
            $('#FormDeleteStockOpename').html(data);
            //Proses Hapus Stock Opename
            $('#KonfirmasiHapusStockOpename').click(function(){
                $('#NotifikasiHapusStockOpename').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/StockOpename/ProsesDeleteStockOpename.php',
                    data        : {id_stok_opename: id_stok_opename},
                    success     : function(data){
                        $('#NotifikasiHapusStockOpename').html(data);
                        var NotifikasiHapusStockOpenameBerhasil=$('#NotifikasiHapusStockOpenameBerhasil').html();
                        if(NotifikasiHapusStockOpenameBerhasil=="Success"){
                            $('#ModalDeleteStockOpename').modal('toggle');
                            $('#MenampilkanTabelStockOpename').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/StockOpename/TabelStockOpename.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelStockOpename').html(data);
                                    swal("Good Job!", "Hapus Stock Opename Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Detail Stock Opename
$('#ModalDetailStockOpename').on('show.bs.modal', function (e) {
    var id_stok_opename = $(e.relatedTarget).data('id');
    $('#FormDetailStockOpename').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormDetailStockOpename.php',
        data        : {id_stok_opename: id_stok_opename},
        success     : function(data){
            $('#FormDetailStockOpename').html(data);
        }
    });
});
//Uraian SO
var ProsesBatasUraian = $('#ProsesBatasUraian').serialize();
$('#MenampilkanTabelStockOpenameBarang').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/StockOpename/TabelStockOpenameBarang.php',
    data 	    :  ProsesBatasUraian,
    success     : function(data){
        $('#MenampilkanTabelStockOpenameBarang').html(data);
    }
});
$('#ProsesBatasUraian').submit(function(){
    var ProsesBatasUraian = $('#ProsesBatasUraian').serialize();
    $('#MenampilkanTabelStockOpenameBarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/TabelStockOpenameBarang.php',
        data 	    :  ProsesBatasUraian,
        success     : function(data){
            $('#MenampilkanTabelStockOpenameBarang').html(data);
        }
    });
});
$('#BatasUraian').change(function(){
    var ProsesBatasUraian = $('#ProsesBatasUraian').serialize();
    $('#MenampilkanTabelStockOpenameBarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/TabelStockOpenameBarang.php',
        data 	    :  ProsesBatasUraian,
        success     : function(data){
            $('#MenampilkanTabelStockOpenameBarang').html(data);
        }
    });
});
//Modal Pilih Barang
$('#ModalPilihBarang').on('show.bs.modal', function (e) {
    var id_stok_opename = $(e.relatedTarget).data('id');
    $('#FormPilihBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormPilihBarang.php',
        data        : {id_stok_opename: id_stok_opename},
        success     : function(data){
            $('#FormPilihBarang').html(data);
        }
    });
});
//Modal Tambah Stock Opename Barang
$('#ModalTambahStockOpenameBarang').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_barang = pecah[0];
    var id_stok_opename = pecah[1];
    $('#FormTambahStockOpenameBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormTambahStockOpenameBarang.php',
        data        : {id_stok_opename: id_stok_opename, id_barang: id_barang},
        success     : function(data){
            $('#FormTambahStockOpenameBarang').html(data);
            $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
            $('#ProsesTambahStockOpenameBarang').submit(function(){
                var ProsesTambahStockOpenameBarang = $('#ProsesTambahStockOpenameBarang').serialize();
                $('#NotifikasiTambahSesiStockOpenameBarang').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/StockOpename/ProsesTambahStockOpenameBarang.php',
                    data 	    :  ProsesTambahStockOpenameBarang,
                    success     : function(data){
                        $('#NotifikasiTambahSesiStockOpenameBarang').html(data);
                        var NotifikasiTambahSesiStockOpenameBarangBerhasil=$('#NotifikasiTambahSesiStockOpenameBarangBerhasil').html();
                        if(NotifikasiTambahSesiStockOpenameBarangBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Stock Opename Barang
$('#ModalEditStockOpenameBarang').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_stok_opename_barang = pecah[0];
    var id_stok_opename = pecah[1];
    var keyword = pecah[2];
    var batas = pecah[3];
    var ShortBy = pecah[4];
    var OrderBy = pecah[5];
    var page = pecah[6];
    $('#FormEditStockOpenameBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormEditStockOpenameBarang.php',
        data        : {id_stok_opename_barang: id_stok_opename_barang, id_stok_opename: id_stok_opename},
        success     : function(data){
            $('#FormEditStockOpenameBarang').html(data);
            //Proses Edit Stock Opename Barang
            $('#ProsesEditStockOpenameBarang').submit(function(){
                $('#NotifikasiEditStockOpenameBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditStockOpenameBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/StockOpename/ProsesEditStockOpenameBarang.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditStockOpenameBarang').html(data);
                        var NotifikasiEditStockOpenameBarangBerhasil=$('#NotifikasiEditStockOpenameBarangBerhasil').html();
                        if(NotifikasiEditStockOpenameBarangBerhasil=="Success"){
                            $('#ModalEditStockOpenameBarang').modal('toggle');
                            $('#MenampilkanTabelStockOpenameBarang').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/StockOpename/TabelStockOpenameBarang.php',
                                data 	    :  {id_stok_opename: id_stok_opename, KeywordStockOpenameBarang: keyword, BatasUraian: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page},
                                success     : function(data){
                                    $('#MenampilkanTabelStockOpenameBarang').html(data);
                                    swal("Good Job!", "Edit Stock Opename Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Delete Stock Opename Barang
$('#ModalDeleteStockOpenameBarang').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_stok_opename_barang = pecah[0];
    var id_stok_opename = pecah[1];
    var keyword = pecah[2];
    var batas = pecah[3];
    var ShortBy = pecah[4];
    var OrderBy = pecah[5];
    var page = pecah[6];
    $('#FormDeleteStockOpenameBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormDeleteStockOpenameBarang.php',
        data        : {id_stok_opename_barang: id_stok_opename_barang},
        success     : function(data){
            $('#FormDeleteStockOpenameBarang').html(data);
            //Proses Hapus Stock Opename
            $('#KonfirmasiHapusStockOpenameBarang').click(function(){
                $('#NotifikasiHapusStockOpenameBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/StockOpename/ProsesDeleteStockOpenameBarang.php',
                    data        : {id_stok_opename_barang: id_stok_opename_barang},
                    success     : function(data){
                        $('#NotifikasiHapusStockOpenameBarang').html(data);
                        var NotifikasiHapusStockOpenameBarangBerhasasil=$('#NotifikasiHapusStockOpenameBarangBerhasasil').html();
                        if(NotifikasiHapusStockOpenameBarangBerhasasil=="Success"){
                            $('#ModalDeleteStockOpenameBarang').modal('toggle');
                            $('#MenampilkanTabelStockOpenameBarang').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/StockOpename/TabelStockOpenameBarang.php',
                                data 	    :  {id_stok_opename: id_stok_opename, KeywordStockOpenameBarang: keyword, BatasUraian: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page},
                                success     : function(data){
                                    $('#MenampilkanTabelStockOpenameBarang').html(data);
                                    swal("Good Job!", "Hapus Stock Opename Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Detal Stock Opename Barang
$('#ModalDetailStockOpenameBarang').on('show.bs.modal', function (e) {
    var id_stok_opename_barang = $(e.relatedTarget).data('id');
    $('#FormDetailStockOpenameBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormDetailStockOpenameBarang.php',
        data        : {id_stok_opename_barang: id_stok_opename_barang},
        success     : function(data){
            $('#FormDetailStockOpenameBarang').html(data);
        }
    });
});
//Modal Import Stock Opename
$('#ModalImportStockOpename').on('show.bs.modal', function (e) {
    var id_stok_opename = $(e.relatedTarget).data('id');
    $('#FormImportStockOpename').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormImportStockOpename.php',
        data        : {id_stok_opename: id_stok_opename},
        success     : function(data){
            $('#FormImportStockOpename').html(data);
            //Proses Import Stock Opename
            $('#ProsesImportStockOpename').submit(function(){
                $('#NotifikasiImportStockOpename').html('<tr><td colspan="6" class="text-center text-danger">Loading...</td></tr>');
                var form = $('#ProsesImportStockOpename')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/StockOpename/ProsesImportStockOpename.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiImportStockOpename').html(data);
                    }
                });
            });
        }
    });
});
//Modal Export Stock Opename
$('#ModalExportStockOpename').on('show.bs.modal', function (e) {
    var id_stok_opename = $(e.relatedTarget).data('id');
    $('#FormExportStockOpename').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/StockOpename/FormExportStockOpename.php',
        data        : {id_stok_opename: id_stok_opename},
        success     : function(data){
            $('#FormExportStockOpename').html(data);
        }
    });
});