$('#MenampilkanTabelPembayaran').html("Loading...");
$('#MenampilkanTabelPembayaran').load("_Page/Pembayaran/TabelPembayaran.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/TabelPembayaran.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPembayaran').html(data);
        }
    });
});
$('#KeywordBy').change(function(){
    var KeywordBy = $('#KeywordBy').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/TabelPembayaran.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPembayaran').html(data);
        }
    });
});
$('#ProsesFilterPembayaran').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/TabelPembayaran.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelPembayaran').html(data);
            $('#ModalFilterPembayaran').modal('hide');
        }
    });
});
//Tambah Pembayaran
$('#ModalTambahPembayaran').on('show.bs.modal', function (e) {
    $('#FormTambahPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormTambahPembayaran.php',
        success     : function(data){
            $('#FormTambahPembayaran').html(data);
        }
    });
});
//Pilih Transaksi
$('#ModalPilihTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var KeywordByTransaksi = pecah[0];
    var KeywordTransaksi = pecah[1];
    var JumlahData = pecah[2];
    var page = pecah[3];
    $('#FormPilihTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormPilihTransaksi.php',
        data 	    :  {KeywordByTransaksi: KeywordByTransaksi, KeywordTransaksi: KeywordTransaksi, JumlahData: JumlahData, page: page},
        success     : function(data){
            $('#FormPilihTransaksi').html(data);
        }
    });
    $('#JumlahData').change(function(){
        var PencarianTransaksiPembayaran = $('#PencarianTransaksiPembayaran').serialize();
        $('#FormPilihTransaksi').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormPilihTransaksi.php',
            data 	    :  PencarianTransaksiPembayaran,
            success     : function(data){
                $('#FormPilihTransaksi').html(data);
            }
        });
    });
    $('#KeywordByTransaksi').change(function(){
        var KeywordByTransaksi = $('#KeywordByTransaksi').val();
        $('#FormKeywordTransaksi').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormKeywordTransaksi.php',
            data 	    :  {KeywordByTransaksi: KeywordByTransaksi},
            success     : function(data){
                $('#FormKeywordTransaksi').html(data);
            }
        });
    });
    $('#PencarianTransaksiPembayaran').submit(function(){
        var PencarianTransaksiPembayaran = $('#PencarianTransaksiPembayaran').serialize();
        $('#FormPilihTransaksi').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormPilihTransaksi.php',
            data 	    :  PencarianTransaksiPembayaran,
            success     : function(data){
                $('#FormPilihTransaksi').html(data);
            }
        });
    });
});
//Pilih Anggota
$('#ModalPilihAnggota').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var KeywordByAnggota = pecah[0];
    var KeywordAnggota = pecah[1];
    var JumlahDataAnggota = pecah[2];
    var page = pecah[3];
    $('#FormPilihAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormPilihAnggota.php',
        data 	    :  {KeywordByAnggota: KeywordByAnggota, KeywordAnggota: KeywordAnggota, JumlahDataAnggota: JumlahDataAnggota, page: page},
        success     : function(data){
            $('#FormPilihAnggota').html(data);
        }
    });
    $('#JumlahDataAnggota').change(function(){
        var PencarianAnggota = $('#PencarianAnggota').serialize();
        $('#FormPilihAnggota').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormPilihAnggota.php',
            data 	    :  PencarianAnggota,
            success     : function(data){
                $('#FormPilihAnggota').html(data);
            }
        });
    });
    $('#KeywordByAnggota').change(function(){
        var KeywordByAnggota = $('#KeywordByAnggota').val();
        $('#FormKeywordAnggota').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormKeywordAnggota.php',
            data 	    :  {KeywordByAnggota: KeywordByAnggota},
            success     : function(data){
                $('#FormKeywordAnggota').html(data);
            }
        });
    });
    $('#PencarianAnggota').submit(function(){
        var PencarianAnggota = $('#PencarianAnggota').serialize();
        $('#FormPilihAnggota').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormPilihAnggota.php',
            data 	    :  PencarianAnggota,
            success     : function(data){
                $('#FormPilihAnggota').html(data);
            }
        });
    });
});
//Pilih Supplier
$('#ModalPilihSupplier').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var KeywordBySupplier = pecah[0];
    var KeywordSupplier = pecah[1];
    var JumlahDataSupplier = pecah[2];
    var page = pecah[3];
    $('#FormPilihSupplier').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormPilihSupplier.php',
        data 	    :  {KeywordBySupplier: KeywordBySupplier, KeywordSupplier: KeywordSupplier, JumlahDataSupplier: JumlahDataSupplier, page: page},
        success     : function(data){
            $('#FormPilihSupplier').html(data);
        }
    });
    $('#JumlahDataSupplier').change(function(){
        var PencarianSupplier = $('#PencarianSupplier').serialize();
        $('#FormPilihSupplier').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormPilihSupplier.php',
            data 	    :  PencarianSupplier,
            success     : function(data){
                $('#FormPilihSupplier').html(data);
            }
        });
    });
    $('#PencarianSupplier').submit(function(){
        var PencarianSupplier = $('#PencarianSupplier').serialize();
        $('#FormPilihSupplier').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pembayaran/FormPilihSupplier.php',
            data 	    :  PencarianSupplier,
            success     : function(data){
                $('#FormPilihSupplier').html(data);
            }
        });
    });
});
//Modal Konfirmasi Transaksi
$('#ModalKonfirmasiTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    var keyword_by = pecah[1];
    var keyword = pecah[2];
    var batas = pecah[3];
    var page = pecah[4];
    $('#FormKonfirmasiTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormKonfirmasiTransaksi.php',
        data 	    :  {id_transaksi: id_transaksi, keyword_by: keyword_by, keyword: keyword, batas: batas, page: page},
        success     : function(data){
            $('#FormKonfirmasiTransaksi').html(data);
            //Click LanjutkanPilihTransaksi
            $('#LanjutkanPilihTransaksi').click(function(){
                var GetIdTransaksi = $('#GetIdTransaksi').html();
                var GetIdAnggota = $('#GetIdAnggota').html();
                var GetIdSupplier = $('#GetIdSupplier').html();
                var GetTagihan = $('#GetTagihan').html();
                var GetMetode = $('#GetMetode').html();
                var GetKategori = $('#GetKategori').html();
                //Put GetIdTransaksi ke form id_transaksi
                $('#id_transaksi').html('<option>Loading..</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pembayaran/PutIdTransaksi.php',
                    data 	    :  {id_transaksi: GetIdTransaksi},
                    success     : function(data){
                        $('#id_transaksi').html(data);
                    }
                });
                //Put GetIdAnggota ke form id_anggota
                $('#id_anggota').html('<option>Loading..</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pembayaran/PutGetIdAnggota.php',
                    data 	    :  {id_anggota: GetIdAnggota},
                    success     : function(data){
                        $('#id_anggota').html(data);
                    }
                });
                //Put GetIdSupplier ke form id_supplier
                $('#id_supplier').html('<option>Loading..</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pembayaran/PutGetIdSupplier.php',
                    data 	    :  {id_supplier: GetIdSupplier},
                    success     : function(data){
                        $('#id_supplier').html(data);
                    }
                });
                //Put GetMetode ke form metode
                $('#metode').html('<option>Loading..</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pembayaran/PutGetMetode.php',
                    data 	    :  {metode: GetMetode},
                    success     : function(data){
                        $('#metode').html(data);
                    }
                });
                //Put GetTagihan ke form jumlah
                $('#jumlah').val(GetTagihan);
                $('#kategori').val(GetKategori);
                $('#ModalKonfirmasiTransaksi').modal('hide');
            });
        }
    });
});
//Modal Konfirmasi Anggota
$('#ModalKonfirmasiAnggota').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_anggota = pecah[0];
    var keyword_by = pecah[1];
    var keyword = pecah[2];
    var batas = pecah[3];
    var page = pecah[4];
    $('#FormKonfirmasiAnggota').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormKonfirmasiAnggota.php',
        data 	    :  {id_anggota: id_anggota, keyword_by: keyword_by, keyword: keyword, batas: batas, page: page},
        success     : function(data){
            $('#FormKonfirmasiAnggota').html(data);
            //Click LanjutkanPilihAnggota
            $('#LanjutkanPilihAnggota').click(function(){
                var GetIdAnggota = $('#GetIdAnggota2').html();
                //Put GetIdAnggota ke form id_anggota
                $('#id_anggota').html('<option>Loading..</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pembayaran/PutGetIdAnggota.php',
                    data 	    :  {id_anggota: GetIdAnggota},
                    success     : function(data){
                        $('#id_anggota').html(data);
                    }
                });
                $('#ModalKonfirmasiAnggota').modal('hide');
            });
        }
    });
});
//Modal Konfirmasi Supplier
$('#ModalKonfirmasiSupplier').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_supplier = pecah[0];
    var keyword_by = pecah[1];
    var keyword = pecah[2];
    var batas = pecah[3];
    var page = pecah[4];
    $('#FormKonfirmasiSupplier').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormKonfirmasiSupplier.php',
        data 	    :  {id_supplier: id_supplier, keyword_by: keyword_by, keyword: keyword, batas: batas, page: page},
        success     : function(data){
            $('#FormKonfirmasiSupplier').html(data);
            //Click LanjutkanPilihSupplier
            $('#LanjutkanPilihSupplier').click(function(){
                var GetIdSupplier = $('#GetIdSupplier').html();
                //Put GetIdSupplier ke form id_supplier
                $('#id_supplier').html('<option>Loading..</option>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pembayaran/PutGetIdSupplier.php',
                    data 	    :  {id_supplier: GetIdSupplier},
                    success     : function(data){
                        $('#id_supplier').html(data);
                    }
                });
                $('#ModalKonfirmasiSupplier').modal('hide');
            });
        }
    });
});
//Proses simpan pembayaran
$('#ProsesSimpanPembayaran').submit(function(){
    var ProsesSimpanPembayaran = $('#ProsesSimpanPembayaran').serialize();
    $('#NotifikasiSimpanPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/ProsesSimpanPembayaran.php',
        data 	    :  ProsesSimpanPembayaran,
        success     : function(data){
            $('#NotifikasiSimpanPembayaran').html(data);
            var NotifikasiSimpanPembayaranBerhasil=$('#NotifikasiSimpanPembayaranBerhasil').html();
            if(NotifikasiSimpanPembayaranBerhasil=="Success"){
                window.location.href = "index.php?Page=Pembayaran";
            }
        }
    });
});
//Detail Pembayaran
$('#ModalDetailPembayaran').on('show.bs.modal', function (e) {
    var id_pembayaran = $(e.relatedTarget).data('id');
    $('#FormDetailPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormDetailPembayaran.php',
        data        : {id_pembayaran: id_pembayaran},
        success     : function(data){
            $('#FormDetailPembayaran').html(data);
        }
    });
});
//Edit Pembayaran
$('#ModalEditPembayaran').on('show.bs.modal', function (e) {
    var id_pembayaran = $(e.relatedTarget).data('id');
    $('#FormEditPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormEditPembayaran.php',
        data        : {id_pembayaran: id_pembayaran},
        success     : function(data){
            $('#FormEditPembayaran').html(data);
        }
    });
});
//Hapus Pembayaran
$('#ModalDeletePembayaran').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_pembayaran = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeletePembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormDeletePembayaran.php',
        data        : {id_pembayaran: id_pembayaran},
        success     : function(data){
            $('#FormDeletePembayaran').html(data);
            //Konfirmasi Hapus Pembayaran
            $('#KonfirmasiHapusPembayaran').click(function(){
                $('#NotifikasiHapusPembayaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pembayaran/ProsesHapusPembayaran.php',
                    data        : {id_pembayaran: id_pembayaran},
                    success     : function(data){
                        $('#NotifikasiHapusPembayaran').html(data);
                        var NotifikasiHapusPembayaranBerhasil=$('#NotifikasiHapusPembayaranBerhasil').html();
                        if(NotifikasiHapusPembayaranBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Pembayaran/TabelPembayaran.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelPembayaran').html(data);
                                    $('#ModalDeletePembayaran').modal('hide');
                                    swal("Good Job!", "Hapus Pembayaran Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Proses Edit pembayaran
$('#ProsesEditPembayaran').submit(function(){
    var ProsesEditPembayaran = $('#ProsesEditPembayaran').serialize();
    $('#NotifikasiEditPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/ProsesEditPembayaran.php',
        data 	    :  ProsesEditPembayaran,
        success     : function(data){
            $('#NotifikasiEditPembayaran').html(data);
            var NotifikasiEditPembayaranBerhasil=$('#NotifikasiEditPembayaranBerhasil').html();
            if(NotifikasiEditPembayaranBerhasil=="Success"){
                window.location.href = "index.php?Page=Pembayaran";
            }
        }
    });
});
$('#KeywordByExport').change(function(){
    var KeywordBy = $('#KeywordByExport').val();
    $('#FormFilterKeywordExport').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pembayaran/FormFilterKeyword.php',
        data 	    :  {KeywordBy: KeywordBy},
        success     : function(data){
            $('#FormFilterKeywordExport').html(data);
        }
    });
});