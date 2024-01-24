$('#MenampilkanTabelBarangExpired').html("Loading...");
var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelBarangExpired').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/BarangExpired/TabelBarangExpired.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelBarangExpired').html(data);
    }
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBarangExpired').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/TabelBarangExpired.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBarangExpired').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBarangExpired').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/TabelBarangExpired.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBarangExpired').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#ProsesFilterBarangExpired').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelBarangExpired').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/TabelBarangExpired.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelBarangExpired').html(data);
            $('#ModalFilterBarangExpired').modal('hide');
        }
    });
});
//Pilih Barang
$('#ModalPilihBarang').on('show.bs.modal', function (e) {
    $('#FormPilihBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/FormPilihBarang.php',
        success     : function(data){
            $('#FormPilihBarang').html(data);
            $('#ProsesBatasPilihBarang').submit(function(){
                var ProsesBatasPilihBarang = $('#ProsesBatasPilihBarang').serialize();
                $('#FormPilihBarang').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BarangExpired/FormPilihBarang.php',
                    data 	    :  ProsesBatasPilihBarang,
                    success     : function(data){
                        $('#FormPilihBarang').html(data);
                    }
                });
            });
        }
    });
});
//Modal Tambah Barang Expired
$('#ModalTambahBarangExpired').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormTambahBarangExpired').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/FormTambahBarangExpired.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormTambahBarangExpired').html(data);
            //Proses Tambah Akses
            $('#ProsesTambahBarangExpired').submit(function(){
                $('#NotifikasiTambahExpiredDate').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahBarangExpired')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BarangExpired/ProsesTambahBarangExpired.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahExpiredDate').html(data);
                        var NotifikasiTambahExpiredDateBerhasil=$('#NotifikasiTambahExpiredDateBerhasil').html();
                        if(NotifikasiTambahExpiredDateBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Barang Expired
$('#ModalEditBarangExpired').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_barang_bacth = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditBarangExpired').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/FormEditBarangExpired.php',
        data        : {id_barang_bacth: id_barang_bacth},
        success     : function(data){
            $('#FormEditBarangExpired').html(data);
            //Proses Barang Expired
            $('#ProsesEditBarangExpired').submit(function(){
                $('#NotifikasiEditExpiredDate').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditBarangExpired')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BarangExpired/ProsesEditBarangExpired.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditExpiredDate').html(data);
                        var NotifikasiEditExpiredDateBerhasil=$('#NotifikasiEditExpiredDateBerhasil').html();
                        if(NotifikasiEditExpiredDateBerhasil=="Success"){
                            $('#MenampilkanTabelBarangExpired').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BarangExpired/TabelBarangExpired.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelBarangExpired').html(data);
                                    $('#ModalEditBarangExpired').modal('hide');
                                    swal("Good Job!", "Edit Batch & Expired Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Barang Expired
$('#ModalDeleteBarangExpired').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_barang_bacth = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteBarangExpired').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/FormDeleteBarangExpired.php',
        data        : {id_barang_bacth: id_barang_bacth},
        success     : function(data){
            $('#FormDeleteBarangExpired').html(data);
            //Konfirmasi Hapus akses
            $('#KonfirmasiHapusBarangExpired').click(function(){
                $('#NotifikasiHapusExpiredDate').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/BarangExpired/ProsesHapusExpiredDate.php',
                    data        : {id_barang_bacth: id_barang_bacth},
                    success     : function(data){
                        $('#NotifikasiHapusExpiredDate').html(data);
                        var NotifikasiHapusExpiredDateBerhasil=$('#NotifikasiHapusExpiredDateBerhasil').html();
                        if(NotifikasiHapusExpiredDateBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/BarangExpired/TabelBarangExpired.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelBarangExpired').html(data);
                                    $('#ModalDeleteBarangExpired').modal('hide');
                                    swal("Good Job!", "Hapus Batch & Expired Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Proses Import Data batch
$('#ProsesImportDataBatch').submit(function(){
    $('#NotifikasiLogProsesImport').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesImportDataBatch')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/BarangExpired/ProsesImportDataBatch.php',
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