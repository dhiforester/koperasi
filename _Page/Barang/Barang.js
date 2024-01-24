$('#MenampilkanTabelBarang').html("Loading...");
$('#MenampilkanTabelBarang').load("_Page/Barang/TabelBarang.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelBarang.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBarang').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelBarang.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBarang').html(data);
        }
    });
});
$('#keyword_by').change(function(){
    var KeywordBy = $('#keyword_by').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#ProsesFilterBarang').submit(function(){
    var ProsesFilterBarang = $('#ProsesFilterBarang').serialize();
    $('#MenampilkanTabelBarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelBarang.php',
        data 	    :  ProsesFilterBarang,
        success     : function(data){
            $('#MenampilkanTabelBarang').html(data);
            $('#ModalFilterBarang').modal('hide');
        }
    });
});
//Detail Barang
$('#ModalDetailBarang').on('show.bs.modal', function (e) {
    var id_barang= $(e.relatedTarget).data('id');
    $('#FormDetailBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormDetailBarang.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormDetailBarang').html(data);
        }
    });
});
//Modal Barang Harga
$('#ModalBarangHarga').on('show.bs.modal', function (e) {
    $('#TampilkanListKategori').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TampilkanListKategori.php',
        success     : function(data){
            $('#TampilkanListKategori').html(data);
        }
    });
});
//Proses Tambah Kategori Harga Barang
$('#ProsesTambahKategoriHargaBarang').submit(function(){
    $('#NotifikasiTambahKategoriHargaBarang').html('Loading...');
    var form = $('#ProsesTambahKategoriHargaBarang')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesTambahKategoriHargaBarang.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahKategoriHargaBarang').html(data);
            var NotifikasiTambahKategoriHargaBarangBerhasil=$('#NotifikasiTambahKategoriHargaBarangBerhasil').html();
            if(NotifikasiTambahKategoriHargaBarangBerhasil=="Success"){
                $('#TampilkanListKategori').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TampilkanListKategori.php',
                    success     : function(data){
                        $('#TampilkanListKategori').html(data);
                        $('#NotifikasiTambahKategoriHargaBarang').html('Kategori');
                        $('#kategori').val('');
                    }
                });
            }
        }
    });
});
//Tambah Barang
$('#ModalTambahBarang').on('show.bs.modal', function (e) {
    $('#FormTambahBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormTambahBarang.php',
        success     : function(data){
            $('#FormTambahBarang').html(data);
            //menambahkan field
            $('#ButtonTambahKategoriHarga').click(function(){
                var form = $('#ProsesTambahBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ListKategoriHarga.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#ListKategoriHarga').html(data);
                    }
                });
            });
            $('#HapusKategoriHarga').click(function(){
                var form = $('#ProsesTambahBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ListKategoriHargaHapus.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#ListKategoriHarga').html(data);
                    }
                });
            });
            //Proses Tambah Barang
            $('#ProsesTambahBarang').submit(function(){
                $('#NotifikasiTambahBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesTambahBarang.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahBarang').html(data);
                        var NotifikasiTambahBarangBerhasil=$('#NotifikasiTambahBarangBerhasil').html();
                        if(NotifikasiTambahBarangBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Detail Barang
$('#ModalDetailBarang').on('show.bs.modal', function (e) {
    var id_barang= $(e.relatedTarget).data('id');
    $('#FormDetailBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormDetailBarang.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormDetailBarang').html(data);
        }
    });
});
//Edit Barang
$('#ModalEditBarang').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_barang = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormEditBarang.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormEditBarang').html(data);
            //menambahkan field
            $('#ButtonTambahKategoriHargaEdit').click(function(){
                var form = $('#ProsesEditBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ListKategoriHarga.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#ListKategoriHargaEdit').html(data);
                    }
                });
            });
            $('#HapusKategoriHargaEdit').click(function(){
                var form = $('#ProsesEditBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ListKategoriHargaHapus.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#ListKategoriHargaEdit').html(data);
                    }
                });
            });
            //Proses Edit Barang
            $('#ProsesEditBarang').submit(function(){
                $('#NotifikasiEditBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesEditBarang.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditBarang').html(data);
                        var NotifikasiEditBarangBerhasil=$('#NotifikasiEditBarangBerhasil').html();
                        if(NotifikasiEditBarangBerhasil=="Success"){
                            $('#ModalEditBarang').modal('toggle');
                            $('#MenampilkanTabelBarang').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Barang/TabelBarang.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelBarang').html(data);
                                    swal("Good Job!", "Edit Barang Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Edit Barang
$('#ModalEditBarang2').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormEditBarang2').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormEditBarang.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormEditBarang2').html(data);
            //menambahkan field
            $('#ButtonTambahKategoriHargaEdit').click(function(){
                var form = $('#ProsesEditBarang2')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ListKategoriHarga.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#ListKategoriHargaEdit').html(data);
                    }
                });
            });
            $('#HapusKategoriHargaEdit').click(function(){
                var form = $('#ProsesEditBarang2')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ListKategoriHargaHapus.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#ListKategoriHargaEdit').html(data);
                    }
                });
            });
            //Proses Edit Barang
            $('#ProsesEditBarang2').submit(function(){
                $('#NotifikasiEditBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditBarang2')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesEditBarang.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditBarang').html(data);
                        var NotifikasiEditBarangBerhasil=$('#NotifikasiEditBarangBerhasil').html();
                        if(NotifikasiEditBarangBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus Barang
$('#ModalDeleteBarang').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_barang = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormDeleteBarang.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormDeleteBarang').html(data);
            //Konfirmasi Hapus Barang
            $('#KonfirmasiHapusBarang').click(function(){
                $('#NotifikasiHapusBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesHapusBarang.php',
                    data        : {id_barang: id_barang},
                    success     : function(data){
                        $('#NotifikasiHapusBarang').html(data);
                        var NotifikasiHapusBarangBerhasil=$('#NotifikasiHapusBarangBerhasil').html();
                        if(NotifikasiHapusBarangBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Barang/TabelBarang.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelBarang').html(data);
                                    $('#ModalDeleteBarang').modal('hide');
                                    swal("Good Job!", "Hapus Barang Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});

//Tambah satuan
$('#ModalTambahSatuan').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormTambahSatuan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormTambahSatuan.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormTambahSatuan').html(data);
            $('#konversi_satuan_multi').keyup(function(){
                var konversi_satuan_multi=$('#konversi_satuan_multi').val();
                var id_barang=$('#id_barang').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/HitungStokSatuanMulti.php',
                    data 	    :  {id_barang: id_barang, konversi: konversi_satuan_multi},
                    success     : function(data){
                        $('#stok_multi').val(data);
                    }
                });
            });
            //Proses Tambah Satuan
            $('#ProsesTambahSatuan').submit(function(){
                $('#NotifikasiTambahSatuan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahSatuan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesTambahSatuan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahSatuan').html(data);
                        var NotifikasiTambahSatuanBerhasil=$('#NotifikasiTambahSatuanBerhasil').html();
                        if(NotifikasiTambahSatuanBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Edit satuan
$('#ModalEditSatuan').on('show.bs.modal', function (e) {
    var id_barang_satuan = $(e.relatedTarget).data('id');
    $('#FormEditSatuan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormEditSatuan.php',
        data        : {id_barang_satuan: id_barang_satuan},
        success     : function(data){
            $('#FormEditSatuan').html(data);
            $('#konversi_satuan_multi').keyup(function(){
                var konversi_satuan_multi=$('#konversi_satuan_multi').val();
                var id_barang=$('#id_barang').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/HitungStokSatuanMulti.php',
                    data 	    :  {id_barang: id_barang, konversi: konversi_satuan_multi},
                    success     : function(data){
                        $('#stok_multi_edit').val(data);
                    }
                });
            });
            //Proses Edit Satuan
            $('#ProsesEditSatuan').submit(function(){
                $('#NotifikasiEditSatuan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditSatuan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesEditSatuan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditSatuan').html(data);
                        var NotifikasiEditSatuanBerhasil=$('#NotifikasiEditSatuanBerhasil').html();
                        if(NotifikasiEditSatuanBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus Satuan Barang
$('#ModalDeleteSatuan').on('show.bs.modal', function (e) {
    var id_barang_satuan = $(e.relatedTarget).data('id');
    $('#FormHapusSatuan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormHapusSatuan.php',
        data        : {id_barang_satuan: id_barang_satuan},
        success     : function(data){
            $('#FormHapusSatuan').html(data);
            //Konfirmasi Hapus Barang
            $('#KonfirmasiHapusSatuan').click(function(){
                $('#NotifikasiHapusSatuan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesHapusSatuan.php',
                    data        : {id_barang_satuan: id_barang_satuan},
                    success     : function(data){
                        $('#NotifikasiHapusSatuan').html(data);
                        var NotifikasiHapusSatuanBerhasil=$('#NotifikasiHapusSatuanBerhasil').html();
                        if(NotifikasiHapusSatuanBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Tambah Kategori Harga
$('#ModalTambahKategoriHarga').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormTambahKategoriHarga').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormTambahKategoriHarga.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormTambahKategoriHarga').html(data);
            //Ketika satuan dipilih
            $('#id_barang_satuan_detail').change(function(){
                var id_barang_satuan=$('#id_barang_satuan_detail').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/HitungHargaMultiSatuan.php',
                    data 	    :  {id_barang_satuan: id_barang_satuan, id_barang: id_barang},
                    success     : function(data){
                        $('#harga_multi').val(data);
                    }
                });
            });
            //Proses Tambah kategori harga
            $('#ProsesTambahKategoriHarga').submit(function(){
                $('#NotifikasiTambahKategoriHarga').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahKategoriHarga')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesTambahKategoriHarga.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahKategoriHarga').html(data);
                        var NotifikasiTambahKategoriHargaBerhasil=$('#NotifikasiTambahKategoriHargaBerhasil').html();
                        if(NotifikasiTambahKategoriHargaBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Edit Kategori Harga
$('#ModalEditKategoriHarga').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_barang = pecah[0];
    var kategori_harga = pecah[1];
    var id_barang_satuan = pecah[2];
    $('#FormEditKategoriHarga').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormEditKategoriHarga.php',
        data        : {id_barang: id_barang, kategori_harga: kategori_harga, id_barang_satuan: id_barang_satuan},
        success     : function(data){
            $('#FormEditKategoriHarga').html(data);
            //Ketika satuan dipilih
            $('#id_barang_satuan_detail2').change(function(){
                var id_barang_satuan=$('#id_barang_satuan_detail2').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/HitungHargaMultiSatuan.php',
                    data 	    :  {id_barang_satuan: id_barang_satuan},
                    success     : function(data){
                        $('#harga_multi2').val(data);
                    }
                });
            });
            //Proses Edit kategori harga
            $('#ProsesEditKategoriHarga').submit(function(){
                $('#NotifikasiEditKategoriHarga').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditKategoriHarga')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesEditKategoriHarga.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditKategoriHarga').html(data);
                        var NotifikasiEditKategoriHargaBerhasil=$('#NotifikasiEditKategoriHargaBerhasil').html();
                        if(NotifikasiEditKategoriHargaBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus Satuan Barang
$('#ModalDeleteKategoriHarga').on('show.bs.modal', function (e) {
    var id_barang_harga = $(e.relatedTarget).data('id');
    $('#FormHapusKategoriHarga').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormHapusKategoriHarga.php',
        data        : {id_barang_harga: id_barang_harga},
        success     : function(data){
            $('#FormHapusKategoriHarga').html(data);
            //Konfirmasi Hapus Barang
            $('#KonfirmasiHapusKaegoriHarga').click(function(){
                $('#NotifikasiHapusKategoriHarga').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesHapusKategoriHarga.php',
                    data        : {id_barang_harga: id_barang_harga},
                    success     : function(data){
                        $('#NotifikasiHapusKategoriHarga').html(data);
                        var NotifikasiHapusKategoriHargaBerhasil=$('#NotifikasiHapusKategoriHargaBerhasil').html();
                        if(NotifikasiHapusKategoriHargaBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});

//Tambah Batch & Expired
$('#ModalTambahExpiredDate').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormTambahExpiredDate').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormTambahExpiredDate.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormTambahExpiredDate').html(data);
            //Proses Tambah kategori harga
            $('#ProsesTambahExpiredDate').submit(function(){
                $('#NotifikasiTambahExpiredDate').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahExpiredDate')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesTambahExpiredDate.php',
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
//Edit Expired Date
$('#ModalEditExpiredDate').on('show.bs.modal', function (e) {
    var id_barang_bacth = $(e.relatedTarget).data('id');
    $('#FormEditExpiredDate').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormEditExpiredDate.php',
        data        : {id_barang_bacth: id_barang_bacth},
        success     : function(data){
            $('#FormEditExpiredDate').html(data);
            //Proses Edit kategori harga
            $('#ProsesEditExpiredDate').submit(function(){
                $('#NotifikasiEditExpiredDate').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditExpiredDate')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesEditExpiredDate.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditExpiredDate').html(data);
                        var NotifikasiEditExpiredDateBerhasil=$('#NotifikasiEditExpiredDateBerhasil').html();
                        if(NotifikasiEditExpiredDateBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus Satuan Barang
$('#ModalDeleteExpiredDate').on('show.bs.modal', function (e) {
    var id_barang_bacth = $(e.relatedTarget).data('id');
    $('#FormHapusExpiredDate').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormHapusExpiredDate.php',
        data        : {id_barang_bacth: id_barang_bacth},
        success     : function(data){
            $('#FormHapusExpiredDate').html(data);
            //Konfirmasi Hapus Barang
            $('#KonfirmasiHapusExpiredDate').click(function(){
                $('#NotifikasiHapusExpiredDate').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesHapusExpiredDate.php',
                    data        : {id_barang_bacth: id_barang_bacth},
                    success     : function(data){
                        $('#NotifikasiHapusExpiredDate').html(data);
                        var NotifikasiHapusExpiredDateBerhasil=$('#NotifikasiHapusExpiredDateBerhasil').html();
                        if(NotifikasiHapusExpiredDateBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Proses Import Data Barang
$('#ProsesImportDataBarang').submit(function(){
    $('#NotifikasiLogProsesImport').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesImportDataBarang')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesImportDataBarang.php',
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
var ProsesCariRiwayatTransaksi = $('#ProsesCariRiwayatTransaksi').serialize();
$('#TampilkanRiwayatTransaksi').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Barang/TabelRiwayatTransaksi.php',
    data 	    :  ProsesCariRiwayatTransaksi,
    success     : function(data){
        $('#TampilkanRiwayatTransaksi').html(data);
    }
});
$('#ProsesCariRiwayatTransaksi').submit(function(){
    var ProsesCariRiwayatTransaksi = $('#ProsesCariRiwayatTransaksi').serialize();
    $('#TampilkanRiwayatTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelRiwayatTransaksi.php',
        data 	    :  ProsesCariRiwayatTransaksi,
        success     : function(data){
            $('#TampilkanRiwayatTransaksi').html(data);
        }
    });
});
//Hapus Satuan Barang
$('#ModalExportRiwayatTransaksi').on('show.bs.modal', function (e) {
    var ProsesCariRiwayatTransaksi = $('#ProsesCariRiwayatTransaksi').serialize();
    $('#FormExportRiwayatTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormExportRiwayatTransaksi.php',
        data 	    :  ProsesCariRiwayatTransaksi,
        success     : function(data){
            $('#FormExportRiwayatTransaksi').html(data);
        }
    });
});