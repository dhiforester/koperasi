$('#MenampilkanTabelTransaksi').html("Loading...");
$('#MenampilkanTabelTransaksi').load("_Page/Transaksi/TabelTransaksi.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
        }
    });
});
$('#ProsesFilterTransaksi').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
            $('#ModalFilterTransaksi').modal('hide');
        }
    });
});
$('#keyword_by').change(function(){
    var keyword_by = $('#keyword_by').val();
    $('#FormFilterKeyword').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormFilterKeyword.php',
        data 	    :  {keyword_by: keyword_by},
        success     : function(data){
            $('#FormFilterKeyword').html(data);
        }
    });
});
//TAMBAH TRANSAKSI
var GetIdMitra = $('#GetIdMitra').val();
//Menampilkan jumlah transaksi
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/HitungJumlahRincian2.php',
    data 	    :  {id_mitra: GetIdMitra},
    success     : function(data){
        $('#jumlah_transaksi').val(data);
    }
});
$('#MenampilkanTabelRincian').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TabelRincian.php',
    data 	    :  {id_mitra: GetIdMitra},
    success     : function(data){
        $('#MenampilkanTabelRincian').html(data);
    }
});

//Tambah Jumlah Dari Rincian
$('#ClickTambahDariRincian').click(function(){
    var GetIdMitra = $('#GetIdMitra').val();
    $('#jumlah_transaksi').val("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/HitungJumlahRincian2.php',
        data 	    :  {id_mitra: GetIdMitra},
        success     : function(data){
            $('#jumlah_transaksi').val(data);
        }
    });
});
//Tambah Jumlah Dari Rincian2
$('#ClickTambahDariRincianEdit').click(function(){
    var GetIdTransaksiEdit = $('#GetIdTransaksiEdit').val();
    $('#jumlah_transaksi_edit').val("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/HitungJumlahRincian3.php',
        data 	    :  {id_transaksi: GetIdTransaksiEdit},
        success     : function(data){
            $('#jumlah_transaksi_edit').val(data);
        }
    });
});
//Samakan dengan tagihan
$('#ClickSamakanDenganJumlahTagihan').click(function(){
    var GetIdTransaksiEdit = $('#GetIdTransaksiEdit').val();
    $('#pembayaran').val("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/HitungJumlahRincian3.php',
        data 	    :  {id_transaksi: GetIdTransaksiEdit},
        success     : function(data){
            $('#pembayaran').val(data);
        }
    });
});
//Click Pembayaran Edit
$('#ClickPembayaranEdit').click(function(){
    var jumlah_transaksi_edit = $('#jumlah_transaksi_edit').val();
    $('#pembayaran_edit').val("Loading...");
    $('#pembayaran_edit').val(jumlah_transaksi_edit);
    $('#kembalian_edit').val("0");
});
//Sesuaikan Pembayaran
$('#ClickSesuaikanPembayaran').click(function(){
    var jumlah_transaksi = $('#jumlah_transaksi').val();
    $('#status').html('<option value="">Loading..</option>');
    $('#status').html('<option value="Lunas">Lunas</option>');
    $('#pembayaran').val("Loading...");
    $('#pembayaran').val(jumlah_transaksi);
    $('#kembalian').val("0");
});
//ReloadAnggota
$('#ReloadAnggota').click(function(){
    $('#GetIdAnggota').html("<option value=''>Pilih</option>>");
});
//ReloadSupplier
$('#ReloadSupplier').click(function(){
    $('#GetIdSupplier').html("<option value=''>Pilih</option>>");
});
//Menghitung kembalian (edit)
$('#jumlah_transaksi_edit').keyup(function(){
    var jumlah_transaksi_edit = $('#jumlah_transaksi_edit').val();
    var pembayaran_edit = $('#pembayaran_edit').val();
    $('#kembalian_edit').val("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/HitungKembalianEdit.php',
        data 	    :  {jumlah_transaksi_edit: jumlah_transaksi_edit, pembayaran_edit: pembayaran_edit},
        success     : function(data){
            $('#kembalian_edit').val(data);
        }
    });
});
$('#pembayaran_edit').keyup(function(){
    var jumlah_transaksi_edit = $('#jumlah_transaksi_edit').val();
    var pembayaran_edit = $('#pembayaran_edit').val();
    $('#kembalian_edit').val("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/HitungKembalianEdit.php',
        data 	    :  {jumlah_transaksi_edit: jumlah_transaksi_edit, pembayaran_edit: pembayaran_edit},
        success     : function(data){
            $('#kembalian_edit').val(data);
        }
    });
});
//Modal Cari Anggota
$('#ModalCariAnggota').on('show.bs.modal', function (e) {
    var PencarianAnggota = $('#PencarianAnggota').val();
    var JumlahDataAnggota = $('#JumlahDataAnggota').val();
    $('#MenampilkanTabelAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelAnggota.php',
        data        : {PencarianAnggota: PencarianAnggota, JumlahDataAnggota: JumlahDataAnggota},
        success     : function(data){
            $('#MenampilkanTabelAnggota').html(data);
        }
    });
    //Ketika ProsesCariAnggota di click
    $('#ProsesCariAnggota').submit(function(){
        var ProsesCariAnggota = $('#ProsesCariAnggota').serialize();
        $('#MenampilkanTabelAnggota').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelAnggota.php',
            data        : ProsesCariAnggota,
            success     : function(data){
                $('#MenampilkanTabelAnggota').html(data);
            }
        });
    });
    //Ketika JumlahDataAnggota pasien di ubah
    $('#JumlahDataAnggota').change(function(){
        var ProsesCariAnggota = $('#ProsesCariAnggota').serialize();
        $('#MenampilkanTabelAnggota').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelAnggota.php',
            data        : ProsesCariAnggota,
            success     : function(data){
                $('#MenampilkanTabelAnggota').html(data);
            }
        });
    });
});
//Modal Cari Supplier
$('#ModalCariSupplier').on('show.bs.modal', function (e) {
    var PencarianSupplier = $('#PencarianSupplier').val();
    var JumlahDataSupplier = $('#JumlahDataSupplier').val();
    $('#MenampilkanTabelSupplier').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelSupplier.php',
        data        : {PencarianSupplier: PencarianSupplier, JumlahDataSupplier: JumlahDataSupplier},
        success     : function(data){
            $('#MenampilkanTabelSupplier').html(data);
        }
    });
    //Ketika Proses Cari Supplier di click
    $('#ProsesCariSupplier').submit(function(){
        var ProsesCariSupplier = $('#ProsesCariSupplier').serialize();
        $('#MenampilkanTabelSupplier').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelSupplier.php',
            data        : ProsesCariSupplier,
            success     : function(data){
                $('#MenampilkanTabelSupplier').html(data);
            }
        });
    });
    //Ketika JumlahDataSupplier pasien di ubah
    $('#JumlahDataSupplier').change(function(){
        var ProsesCariSupplier = $('#ProsesCariSupplier').serialize();
        $('#MenampilkanTabelSupplier').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelSupplier.php',
            data        : ProsesCariSupplier,
            success     : function(data){
                $('#MenampilkanTabelSupplier').html(data);
            }
        });
    });
});
//Modal Pilih Anggota
$('#ModalPilihAnggota').on('show.bs.modal', function (e) {
    var id_anggota = $(e.relatedTarget).data('id');
    $('#MenampilkanKonfirmasiAnggota').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/MenampilkanKonfirmasiAnggota.php',
        data        : {id_anggota: id_anggota},
        success     : function(data){
            $('#MenampilkanKonfirmasiAnggota').html(data);
            //Ketika data anggota di konfirmasi
            $('#KonfirmasiPilihAnggota').click(function(){
                //Tempelkan pada form
                $('#GetIdAnggota').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/PutIdAnggota.php',
                    data        : {id_anggota: id_anggota},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#GetIdAnggota').html(data);
                    }
                });
                $('#ModalPilihAnggota').modal('hide');
            });
        }
    });
});
//Modal Pilih Supplier
$('#ModalPilihSupplier').on('show.bs.modal', function (e) {
    var id_supplier = $(e.relatedTarget).data('id');
    $('#MenampilkanKonfirmasiSupplier').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/MenampilkanKonfirmasiSupplier.php',
        data        : {id_supplier: id_supplier},
        success     : function(data){
            $('#MenampilkanKonfirmasiSupplier').html(data);
            //Ketika data Supplier di konfirmasi
            $('#KonfirmasiPilihSupplier').click(function(){
                //Tempelkan pada form
                $('#GetIdSupplier').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/PutIdSupplier.php',
                    data        : {id_supplier: id_supplier},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#GetIdSupplier').html(data);
                    }
                });
                $('#ModalPilihSupplier').modal('hide');
            });
        }
    });
});
//Tambah Rincian
$('#ModalTambahRincian').on('show.bs.modal', function (e) {
    var GetIdTransaksi = $(e.relatedTarget).data('id');
    var PencarianRincian = $('#PencarianRincian').val();
    var KategoriPencarian = $('#KategoriPencarian').val();
    var JumlahData = $('#JumlahData').val();
    var GetIdMitra = $('#GetIdMitra').val();
    $('#MenampilkanTabelBarangTindakan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelBarangTindakan.php',
        data        : {PencarianRincian: PencarianRincian, KategoriPencarian: KategoriPencarian, JumlahData: JumlahData, id_mitra: GetIdMitra, id_transaksi: GetIdTransaksi},
        success     : function(data){
            $('#MenampilkanTabelBarangTindakan').html(data);
            //Ketika Kategori Pencarian Berubah
            $('#KategoriPencarian').change(function(){
                var PencarianRincian = $('#PencarianRincian').val();
                var KategoriPencarian = $('#KategoriPencarian').val();
                var JumlahData = $('#JumlahData').val();
                $('#MenampilkanTabelBarangTindakan').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/TabelBarangTindakan.php',
                    data        : {PencarianRincian: PencarianRincian, KategoriPencarian: KategoriPencarian, JumlahData: JumlahData, id_mitra: GetIdMitra},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#MenampilkanTabelBarangTindakan').html(data);
                    }
                });
            });
            //Jumlah Data Berubah
            $('#JumlahData').change(function(){
                var PencarianRincian = $('#PencarianRincian').val();
                var KategoriPencarian = $('#KategoriPencarian').val();
                var JumlahData = $('#JumlahData').val();
                $('#MenampilkanTabelBarangTindakan').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/TabelBarangTindakan.php',
                    data        : {PencarianRincian: PencarianRincian, KategoriPencarian: KategoriPencarian, JumlahData: JumlahData, id_mitra: GetIdMitra},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#MenampilkanTabelBarangTindakan').html(data);
                    }
                });
            });
            //ClickPencarian di submit
            $('#ClickPencarian').submit(function(){
                var PencarianRincian = $('#PencarianRincian').val();
                var KategoriPencarian = $('#KategoriPencarian').val();
                var JumlahData = $('#JumlahData').val();
                $('#MenampilkanTabelBarangTindakan').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/TabelBarangTindakan.php',
                    data        : {PencarianRincian: PencarianRincian, KategoriPencarian: KategoriPencarian, JumlahData: JumlahData, id_mitra: GetIdMitra},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#MenampilkanTabelBarangTindakan').html(data);
                    }
                });
            });
        }
    });
});
//Tambah Rincian Lainnya
$('#ModalTambahRincianLainnya').on('show.bs.modal', function (e) {
    var GetIdTransaksi = $(e.relatedTarget).data('id');
    $('#FormTambahRincianLainnya').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahRincianLainnya.php',
        data        : {id_transaksi: GetIdTransaksi},
        success     : function(data){
            $('#FormTambahRincianLainnya').html(data);
            $('#qty_rincian2').keyup(function(){
                var qty_rincian = $('#qty_rincian2').val();
                var harga_rincian = $('#harga_rincian2').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian2').val(jumlah_rincian);
            });
            $('#harga_rincian2').keyup(function(){
                var qty_rincian = $('#qty_rincian2').val();
                var harga_rincian = $('#harga_rincian2').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian2').val(jumlah_rincian);
            });
            //Proses Tambah Rincian Transaksi
            $('#ProsesTambahRincianLainnya').submit(function(){
                $('#NotifikasiTambahRincianLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahRincianLainnya')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesTambahRincianLainnya.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahRincianLainnya').html(data);
                        var NotifikasiTambahRincianLainnyaBerhasil=$('#NotifikasiTambahRincianLainnyaBerhasil').html();
                        if(NotifikasiTambahRincianLainnyaBerhasil=="Success"){
                            var UrlBack=$('#UrlBack').val();
                            text = UrlBack.replace('amp;', "");
                            text = UrlBack.replace('amp;', "");
                            window.location.href = UrlBack;
                        }
                    }
                });
            });
        }
    });
});
$('#ModalTambahRincianBarang').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    var KategoriTransaksi=$('#kategori').val();
    var GetIdTransaksi=$('#GetIdTransaksi').html();
    $('#FormTambahRincianBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahRincianBarang.php',
        data        : { id_barang: id_barang, KategoriTransaksi: KategoriTransaksi, GetIdTransaksi: GetIdTransaksi },
        success     : function(data){
            $('#FormTambahRincianBarang').html(data);
            //Ketika Qty di Keyup
            $('#qty_rincian').keyup(function(){
                var qty_rincian = $('#qty_rincian').val();
                var harga_rincian = $('#harga_rincian').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian').val(jumlah_rincian);
            });
            $('#rincian_satuan_barang').change(function(){
                var GetIdBarang = $('#GetIdBarang').val();
                var rincian_satuan_barang = $('#rincian_satuan_barang').val();
                var GetKategoriHarga = $('#GetKategoriHarga').val();
                var qty_rincian = $('#qty_rincian').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesCariHargaBarang.php',
                    data 	    :  {id_barang: GetIdBarang, rincian_satuan_barang: rincian_satuan_barang, kategori_harga: GetKategoriHarga, qty_rincian: qty_rincian},
                    success     : function(data){
                        $('#harga_rincian').val(data);
                        $('#jumlah_rincian').val('Loading...');
                        var qty_rincian2 = $('#qty_rincian').val();
                        $.ajax({
                            type 	    : 'POST',
                            url 	    : '_Page/Transaksi/HitungJumlahRincian.php',
                            data 	    :  {harga_rincian2: data, qty_rincian2: qty_rincian2, qty_rincian: qty_rincian},
                            success     : function(data){
                                $('#jumlah_rincian').val(data);
                            }
                        });
                    }
                });
            });
            $('#GetKategoriHarga').change(function(){
                var GetIdBarang = $('#GetIdBarang').val();
                var rincian_satuan_barang = $('#rincian_satuan_barang').val();
                var GetKategoriHarga = $('#GetKategoriHarga').val();
                var qty_rincian = $('#qty_rincian').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesCariHargaBarang.php',
                    data 	    :  {id_barang: GetIdBarang, rincian_satuan_barang: rincian_satuan_barang, kategori_harga: GetKategoriHarga, qty_rincian: qty_rincian},
                    success     : function(data){
                        $('#harga_rincian').val(data);
                        $('#jumlah_rincian').val('Loading...');
                        var qty_rincian2 = $('#qty_rincian').val();
                        $.ajax({
                            type 	    : 'POST',
                            url 	    : '_Page/Transaksi/HitungJumlahRincian.php',
                            data 	    :  {harga_rincian2: data, qty_rincian2: qty_rincian2, qty_rincian: qty_rincian},
                            success     : function(data){
                                $('#jumlah_rincian').val(data);
                            }
                        });
                    }
                });
            });
            $('#harga_rincian').keyup(function(){
                var qty_rincian = $('#qty_rincian').val();
                var harga_rincian = $('#harga_rincian').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian').val(jumlah_rincian);
            });
            //Proses Tambah Rincian Transaksi
            $('#ProsesTambahRincianBarang').submit(function(){
                $('#NotifikasiTambahRincianBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahRincianBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesTambahRincianBarang.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahRincianBarang').html(data);
                        var NotifikasiTambahRincianBarangBerhasil=$('#NotifikasiTambahRincianBarangBerhasil').html();
                        if(NotifikasiTambahRincianBarangBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Tambah PPN/PPH
$('#ModalTambahPpn').on('show.bs.modal', function (e) {
    $('#FormTambahPpn').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahPpn.php',
        success     : function(data){
            $('#FormTambahPpn').html(data);
            //ketika PPn di ketik
            $('#GetPpnPersen').keyup(function(){
                var GetPpnPersen = $('#GetPpnPersen').val();
                var GetSubtotal = $('#GetSubtotal').val();
                var GetPpnRp = $('#GetPpnRp').val();
                var GetPpnRp=GetSubtotal*(GetPpnPersen/100);
                var GetPpnRp=Math.round(GetPpnRp);
                $('#GetPpnRp').val(GetPpnRp);
            });
            $('#GetPpnRp').keyup(function(){
                var GetSubtotal = $('#GetSubtotal').val();
                var GetPpnRp = $('#GetPpnRp').val();
                var GetPpnPersen=(GetPpnRp/GetSubtotal)*100;
                var GetPpnPersen=Math.round(GetPpnPersen);
                $('#GetPpnPersen').val(GetPpnPersen);
            });
            //Proses Tambah PPN
            $('#ProsesTambahPpn').submit(function(){
                $('#NotifikasiTambahPpn').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahPpn')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesTambahPpn.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahPpn').html(data);
                        var NotifikasiTambahPpnBerhasil=$('#NotifikasiTambahPpnBerhasil').html();
                        if(NotifikasiTambahPpnBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
$('#ModalTambahPpnEdit').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormTambahPpnEdit').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahPpnEdit.php',
        data 	    :  {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormTambahPpnEdit').html(data);
            $( '.format_uang' ).mask('000.000.000', {reverse: true});
            //ketika PPn Persen di ketik
            $('#GetPpnPersenEdit').keyup(function(){
                var GetPpnPersen = $('#GetPpnPersenEdit').val();
                var GetSubtotal = $('#GetSubtotalEdit').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/HitungPpnRp.php',
                    data 	    :  {GetPpnPersen: GetPpnPersen, GetSubtotal: GetSubtotal},
                    success     : function(data){
                        $('#GetPpnRpEdit').val(data);
                    }
                });
            });
            //ketika PPn rupiah di ketik
            $('#GetPpnRpEdit').keyup(function(){
                var GetPpnRp = $('#GetPpnRpEdit').val();
                var GetSubtotal = $('#GetSubtotalEdit').val();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/HitungPpnPersen.php',
                    data 	    :  {GetPpnRp: GetPpnRp, GetSubtotal: GetSubtotal},
                    success     : function(data){
                        $('#GetPpnPersenEdit').val(data);
                    }
                });
            });
            //Proses Tambah PPN
            $('#ProsesTambahPpnEdit').submit(function(){
                $('#NotifikasiTambahPpnEdit').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahPpnEdit')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesTambahPpn.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahPpnEdit').html(data);
                        var NotifikasiTambahPpnBerhasil=$('#NotifikasiTambahPpnBerhasil').html();
                        if(NotifikasiTambahPpnBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Edit Rincian Barang
$('#ModalEditRincianBarang').on('show.bs.modal', function (e) {
    var id_transaksi_rincian = $(e.relatedTarget).data('id');
    var GetIdTransaksi = $('#GetIdTransaksi2').val();
    $('#FormEditRincianBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormEditRincianBarang.php',
        data        : {id_transaksi_rincian: id_transaksi_rincian, GetIdTransaksi: GetIdTransaksi},
        success     : function(data){
            $('#FormEditRincianBarang').html(data);
            //Ketika Qty di Keyup
            $('#qty_rincian_edit').keyup(function(){
                var qty_rincian = $('#qty_rincian_edit').val();
                var harga_rincian = $('#harga_rincian_edit').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian_edit').val(jumlah_rincian);
            });
            $('#harga_rincian_edit').keyup(function(){
                var qty_rincian = $('#qty_rincian_edit').val();
                var harga_rincian = $('#harga_rincian_edit').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian_edit').val(jumlah_rincian);
            });
            //Proses Edit Rincian Transaksi
            $('#ProsesEditRincianBarang').submit(function(){
                $('#NotifikasiEditRincianBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditRincianBarang')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesEditRincianBarang.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditRincianBarang').html(data);
                        var NotifikasiEditRincianBarangBerhasil=$('#NotifikasiEditRincianBarangBerhasil').html();
                        if(NotifikasiEditRincianBarangBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});

//Modal Edit Rincian Lainnya
$('#ModalEditRincianLainnya').on('show.bs.modal', function (e) {
    var id_transaksi_rincian = $(e.relatedTarget).data('id');
    var GetIdTransaksi = $('#GetIdTransaksi2').val();
    $('#FormEditRincianLainnya').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormEditRincianLainnya.php',
        data        : {id_transaksi_rincian: id_transaksi_rincian, GetIdTransaksi: GetIdTransaksi},
        success     : function(data){
            $('#FormEditRincianLainnya').html(data);
            //Ketika Qty di Keyup
            $('#qty_rincian4').keyup(function(){
                var qty_rincian = $('#qty_rincian4').val();
                var harga_rincian = $('#harga_rincian4').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian4').val(jumlah_rincian);
            });
            $('#harga_rincian4').keyup(function(){
                var qty_rincian = $('#qty_rincian4').val();
                var harga_rincian = $('#harga_rincian4').val();
                var jumlah_rincian=qty_rincian*harga_rincian;
                $('#jumlah_rincian4').val(jumlah_rincian);
            });
            //Proses Edit Rincian lainnya
            $('#ProsesEditRincianLainnya').submit(function(){
                $('#NotifikasiEditRincianLainnya').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditRincianLainnya')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesEditRincianLainnya.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditRincianLainnya').html(data);
                        var NotifikasiEditRincianLainnyaBerhasil=$('#NotifikasiEditRincianLainnyaBerhasil').html();
                        if(NotifikasiEditRincianLainnyaBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
$('#ModalDeleteTransaksiRincian').on('show.bs.modal', function (e) {
    var id_transaksi_rincian = $(e.relatedTarget).data('id');
    var GetIdTransaksi = $('#GetIdTransaksi2').val();
    $('#FormDeleteRincian').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDeleteRincian.php',
        data        : {id_transaksi_rincian: id_transaksi_rincian, GetIdTransaksi: GetIdTransaksi},
        success     : function(data){
            $('#FormDeleteRincian').html(data);
            //Konfirmasi Hapus Rincian Transaksi
            $('#KonfirmasiHapusRincian').click(function(){
                $('#NotifikasiHapusRincian').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusRincianTindakan.php',
                    data        : {id_transaksi_rincian: id_transaksi_rincian, GetIdTransaksi: GetIdTransaksi},
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiHapusRincian').html(data);
                        var NotifikasiHapusRincianBerhasil=$('#NotifikasiHapusRincianBerhasil').html();
                        if(NotifikasiHapusRincianBerhasil=="Success"){
                            if(GetIdTransaksi==""){
                                $('#ModalDeleteTransaksiRincian').modal('toggle');
                                $('#MenampilkanTabelRincian').html("Loading...");
                                $.ajax({
                                    type 	    : 'POST',
                                    url 	    : '_Page/Transaksi/TabelRincian.php',
                                    data 	    :  {id_mitra: GetIdMitra2},
                                    success     : function(data){
                                        $('#MenampilkanTabelRincian').html(data);
                                        $.ajax({
                                            type 	    : 'POST',
                                            url 	    : '_Page/Transaksi/HitungJumlahRincian2.php',
                                            data 	    :  {id_mitra: GetIdMitra2},
                                            success     : function(data){
                                                $('#jumlah_transaksi').val(data);
                                            }
                                        });
                                        swal("Good Job!", "Hapus Rincian Tindakan Berhasil!", "success");
                                    }
                                });
                            }else{
                                location.reload();
                            }
                            
                        }
                    }
                });
            });
        }
    });
});
$('#pembayaran').keyup(function(){
    $('#status').html('<option value="">Loading..</option>');
    var pembayaran=$('#pembayaran').val();
    var pembayaran2=pembayaran.replace(/[.]/gi, '');
    var jumlah_transaksi=$('#jumlah_transaksi').val();
    var jumlah_transaksi2=jumlah_transaksi.replace(/[.]/gi, '');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/PertimbangkanStatus.php',
        data 	    :  {pembayaran: pembayaran2, jumlah_transaksi: jumlah_transaksi2},
        success     : function(data){
            $('#status').html(data);
        }
    });
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/HitungKembalian.php',
        data 	    :  {pembayaran: pembayaran2, jumlah_transaksi: jumlah_transaksi2},
        success     : function(data){
            $('#kembalian').val(data);
        }
    });
});
$('#jumlah_transaksi').keyup(function(){
    $('#status').html('<option value="">Loading..</option>');
    var pembayaran=$('#pembayaran').val();
    var pembayaran2=pembayaran.replace(/[.]/gi, '');
    var jumlah_transaksi=$('#jumlah_transaksi').val();
    var jumlah_transaksi2=jumlah_transaksi.replace(/[.]/gi, '');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/PertimbangkanStatus.php',
        data 	    :  {pembayaran: pembayaran2, jumlah_transaksi: jumlah_transaksi2},
        success     : function(data){
            $('#status').html(data);
        }
    });
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/HitungKembalian.php',
        data 	    :  {pembayaran: pembayaran2, jumlah_transaksi: jumlah_transaksi2},
        success     : function(data){
            $('#kembalian').val(data);
        }
    });
});

//Proses Tambah Transaksi
$('#ProsesTambahTransaksi').submit(function(){
    $('#NotifikasiTambahTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahTransaksi')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesTambahTransaksi.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahTransaksi').html(data);
            var NotifikasiTambahTransaksiBerhasil=$('#NotifikasiTambahTransaksiBerhasil').html();
            if(NotifikasiTambahTransaksiBerhasil=="Success"){
                window.location.href = "index.php?Page=Transaksi";
            }
        }
    });
});
//Proses Edit Transaksi
$('#ProsesEditTransaksi').submit(function(){
    $('#NotifikasiEditTransaksi').html('<div class="alert alert-info text-center" role="alert"><div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div></div>');
    var form = $('#ProsesEditTransaksi')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesEditTransaksi.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditTransaksi').html(data);
            var NotifikasiEditTransaksiBerhasil=$('#NotifikasiEditTransaksiBerhasil').html();
            if(NotifikasiEditTransaksiBerhasil=="Success"){
                var UrlBack=$('#UrlBack').val();
                text = UrlBack.replace('amp;', "");
                text = UrlBack.replace('amp;', "");
                window.location.href = UrlBack;
            }
        }
    });
});

//Detail Transaksi
$('#ModalDetailTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    $('#FormDetailTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDetailTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormDetailTransaksi').html(data);
        }
    });
});
//Hapus Transaksi
$('#ModalDeleteTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var keyword_by = pecah[6];
    $('#FormDeleteTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDeleteTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormDeleteTransaksi').html(data);
            //Ketika Konfirmasi Hapus Transaksi Di Click
            $('#KonfirmasiHapusTransaksi').click(function(){
                $('#NotifikasiHapusTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusTransaksi.php',
                    data        : {id_transaksi: id_transaksi},
                    success     : function(data){
                        $('#NotifikasiHapusTransaksi').html(data);
                        var NotifikasiHapusTransaksiBerhasil=$('#NotifikasiHapusTransaksiBerhasil').html();
                        if(NotifikasiHapusTransaksiBerhasil=="Success"){
                            $('#MenampilkanTabelTransaksi').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelTransaksi.php',
                                data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: keyword_by, keyword: keyword},
                                success     : function(data){
                                    $('#MenampilkanTabelTransaksi').html(data);
                                    swal("Good Job!", "Hapus Transaksi Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Batalkan Transaksi
$('#ModalBatalkanTransaksi').on('show.bs.modal', function (e) {
    var GetIdMitra2 = $('#GetIdMitra').val();
    $('#FormBatalkanTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormBatalkanTransaksi.php',
        success     : function(data){
            $('#FormBatalkanTransaksi').html(data);
            //Ketika Konfirmasi Batalkan Transaksi Di Click
            $('#KonfirmasiBatalkanTransaksi').click(function(){
                $('#NotifikasiBatalkanTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesBatalkanTransaksi.php',
                    data        : {id_mitra: GetIdMitra2},
                    success     : function(data){
                        $('#NotifikasiBatalkanTransaksi').html(data);
                        var NotifikasiBatalkanTransaksiBerhasil=$('#NotifikasiBatalkanTransaksiBerhasil').html();
                        if(NotifikasiBatalkanTransaksiBerhasil=="Success"){
                            $('#ModalBatalkanTransaksi').modal('toggle');
                            $('#MenampilkanTabelRincian').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelRincian.php',
                                data 	    :  {id_mitra: GetIdMitra2},
                                success     : function(data){
                                    $('#MenampilkanTabelRincian').html(data);
                                    $.ajax({
                                        type 	    : 'POST',
                                        url 	    : '_Page/Transaksi/HitungJumlahRincian2.php',
                                        data 	    :  {id_mitra: GetIdMitra2},
                                        success     : function(data){
                                            $('#jumlah_transaksi').val(data);
                                        }
                                    });
                                    swal("Good Job!", "Hapus Rincian Tindakan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
var GetIdTransaksi=$('#GetIdTransaksi').html();
$('#MenampilkanTabelJurnal').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TabelJurnal.php',
    data        : {id_transaksi: GetIdTransaksi},
    success     : function(data){
        $('#MenampilkanTabelJurnal').html(data);
    }
});
$('#MenampilkanTabelPembayaran').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TabelPembayaran.php',
    data        : {id_transaksi: GetIdTransaksi},
    success     : function(data){
        $('#MenampilkanTabelPembayaran').html(data);
    }
});
//Tambah Jurnal
$('#ModalTambahJurnal').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormTambahJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahJurnal.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormTambahJurnal').html(data);
            //Proses Tambah Jurnal
            $('#ProsesTambahJurnal').submit(function(){
                $('#NotifikasiTambahJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahJurnal')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Jurnal/ProsesTambahJurnal.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahJurnal').html(data);
                        var NotifikasiTambahJurnalBerhasil=$('#NotifikasiTambahJurnalBerhasil').html();
                        if(NotifikasiTambahJurnalBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Detail Akun Perkiraan
$('#ModalDetailJurnal').on('show.bs.modal', function (e) {
    var id_jurnal = $(e.relatedTarget).data('id');
    $('#FormDetailJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Jurnal/FormDetailJurnal.php',
        data        : {id_jurnal: id_jurnal},
        success     : function(data){
            $('#FormDetailJurnal').html(data);
        }
    });
    //Edit Jurnal
    $('#ModalEditJurnal').on('show.bs.modal', function (e) {
        $('#FormEditJurnal').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Jurnal/FormEditJurnal.php',
            data        : {id_jurnal: id_jurnal},
            success     : function(data){
                $('#FormEditJurnal').html(data);
                //Proses Edit Akun perkiraan
                $('#ProsesEditJurnal').submit(function(){
                    $('#NotifikasiEditJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    var form = $('#ProsesEditJurnal')[0];
                    var data = new FormData(form);
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Jurnal/ProsesEditJurnal.php',
                        data 	    :  data,
                        cache       : false,
                        processData : false,
                        contentType : false,
                        enctype     : 'multipart/form-data',
                        success     : function(data){
                            $('#NotifikasiEditJurnal').html(data);
                            var NotifikasiEditJurnalBerhasil=$('#NotifikasiEditJurnalBerhasil').html();
                            if(NotifikasiEditJurnalBerhasil=="Success"){
                                $('#ModalEditJurnal').modal('toggle');
                                $.ajax({
                                    type 	    : 'POST',
                                    url 	    : '_Page/Transaksi/TabelJurnal.php',
                                    data        : {id_transaksi: GetIdTransaksi},
                                    success     : function(data){
                                        $('#MenampilkanTabelJurnal').html(data);
                                        swal("Good Job!", "Tambah Jurnal Berhasil!", "success");
                                    }
                                });
                            }
                        }
                    });
                });
            }
        });
    });
    //Hapus Jurnal
    $('#ModalHapusJurnal').on('show.bs.modal', function (e) {
        $('#FormhapusJurnal').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Jurnal/FormhapusJurnal.php',
            data        : {id_jurnal: id_jurnal},
            success     : function(data){
                $('#FormhapusJurnal').html(data);
                //Konfirmasi Hapus Jurnal
                $('#KonfirmasiHapusJurnal').click(function(){
                    $('#NotifikasiHapusJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Jurnal/ProsesHapusJurnal.php',
                        data        : {id_jurnal: id_jurnal},
                        success     : function(data){
                            $('#NotifikasiHapusJurnal').html(data);
                            var NotifikasiHapusJurnalBerhasil=$('#NotifikasiHapusJurnalBerhasil').html();
                            if(NotifikasiHapusJurnalBerhasil=="Success"){
                                $('#ModalHapusJurnal').modal('toggle');
                                $.ajax({
                                    type 	    : 'POST',
                                    url 	    : '_Page/Transaksi/TabelJurnal.php',
                                    data        : {id_transaksi: GetIdTransaksi},
                                    success     : function(data){
                                        $('#MenampilkanTabelJurnal').html(data);
                                        swal("Good Job!", "Hapus Jurnal Berhasil!", "success");
                                    }
                                });
                            }
                        }
                    });
                });
            }
        });
    });
});
//Hapus Jurnal
$('#ModalHapusSemuaJurnal').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormhapusSemuaJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormHapusSemuaJurnal.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormhapusSemuaJurnal').html(data);
            //Konfirmasi Hapus Jurnal
            $('#KonfirmasiHapusSemuaJurnal').click(function(){
                $('#NotifikasiHapussemuaJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusSemuaJurnal.php',
                    data        : {id_transaksi: id_transaksi},
                    success     : function(data){
                        $('#NotifikasiHapussemuaJurnal').html(data);
                        var NotifikasiHapussemuaJurnalBerhasil=$('#NotifikasiHapussemuaJurnalBerhasil').html();
                        if(NotifikasiHapussemuaJurnalBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Edit Transaksi
$('#ModalEditTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormEditTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormEditTransaksi').html(data);
            //Kondisi id_mitra dipilih
            $('#id_mitra_edit').change(function(){
                var id_mitra_edit = $('#id_mitra_edit').val();
                if(id_mitra_edit==""){
                    $('#Transaksi_edit').html('<option value="Admin">Admin</option><option value="">More Access Groups</option>');
                }else{
                    $("#grup_Transaksi_edit").val("");
                    $("#grup_Transaksi_edit").prop("disabled", true);
                    $('#Transaksi_edit').load('_Page/Transaksi/PilihTransaksiMitra.php');
                }
            });
            //Kondisi ketika Transaksi dipilih
            $('#Transaksi_edit').change(function(){
                var Transaksi_edit = $('#Transaksi_edit').val();
                if(Transaksi_edit==""){
                    $("#grup_Transaksi_edit").prop("disabled", false);
                }else{
                    $("#grup_Transaksi_edit").prop("disabled", true);
                }
            });
            //Proses Tambah Transaksi
            $('#ProsesEditTransaksi').submit(function(){
                $('#NotifikasiEditTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditTransaksi')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesEditTransaksi.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditTransaksi').html(data);
                        var NotifikasiEditTransaksiBerhasil=$('#NotifikasiEditTransaksiBerhasil').html();
                        if(NotifikasiEditTransaksiBerhasil=="Success"){
                            $('#MenampilkanTabelTransaksi').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelTransaksi.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelTransaksi').html(data);
                                    $('#ModalEditTransaksi').modal('hide');
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
//Hapus Transaksi
$('#ModalDeleteTransaksi').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteTransaksi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDeleteTransaksi.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormDeleteTransaksi').html(data);
            //Konfirmasi Hapus Transaksi
            $('#KonfirmasiHapusTransaksi').click(function(){
                $('#NotifikasiHapusTransaksi').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusTransaksi.php',
                    data        : {id_transaksi: id_transaksi},
                    success     : function(data){
                        $('#NotifikasiHapusTransaksi').html(data);
                        var NotifikasiHapusTransaksiBerhasil=$('#NotifikasiHapusTransaksiBerhasil').html();
                        if(NotifikasiHapusTransaksiBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TabelTransaksi.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelTransaksi').html(data);
                                    $('#ModalDeleteTransaksi').modal('hide');
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
//Menampilkan Tombol Auto Jurnal
$('#TombolAutoJurnal').html("Loading...");
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TombolAutoJurnal.php',
    success     : function(data){
        $('#TombolAutoJurnal').html(data);
    }
});
//Form Setting Auto Jurnal
$('#ModalSettingAutoJurnal').on('show.bs.modal', function (e) {
    $('#FormSettingAutoJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormSettingAutoJurnal.php',
        success     : function(data){
            $('#FormSettingAutoJurnal').html(data);
            //Proses Setting Auto Jurnal Di Submit
            $('#ProsesSettingAutoJurnal').submit(function(){
                $('#NotifikasiSettingAutoJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesSettingAutoJurnal')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesSettingAutoJurnal.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiSettingAutoJurnal').html(data);
                        var NotifikasiSettingAutoJurnalBerhasil=$('#NotifikasiSettingAutoJurnalBerhasil').html();
                        if(NotifikasiSettingAutoJurnalBerhasil=="Success"){
                            $('#TombolAutoJurnal').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TombolAutoJurnal.php',
                                success     : function(data){
                                    $('#TombolAutoJurnal').html(data);
                                    $('#ModalSettingAutoJurnal').modal('hide');
                                    $('#TombolAutoJurnal').html("Loading...");
                                    $.ajax({
                                        type 	    : 'POST',
                                        url 	    : '_Page/Transaksi/TombolAutoJurnal.php',
                                        success     : function(data){
                                            $('#TombolAutoJurnal').html(data);
                                        }
                                    });
                                    swal("Good Job!", "Setting Auto Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Reset Setting Auto Jurnal
$('#ModalResetSettingAutoJurnal').on('show.bs.modal', function (e) {
    $('#FormResetSettingAutoJurnal').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormResetSettingAutoJurnal.php',
        success     : function(data){
            $('#FormResetSettingAutoJurnal').html(data);
            $('#KonfirmasiResetAutoJurnal').click(function(){
                $('#NotifikasiResetAutoJurnal').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesResetAutoJurnal.php',
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiResetAutoJurnal').html(data);
                        var NotifikasiResetAutoJurnalBerhasil=$('#NotifikasiResetAutoJurnalBerhasil').html();
                        if(NotifikasiResetAutoJurnalBerhasil=="Success"){
                            $('#TombolAutoJurnal').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Transaksi/TombolAutoJurnal.php',
                                success     : function(data){
                                    $('#TombolAutoJurnal').html(data);
                                    $('#ModalResetSettingAutoJurnal').modal('hide');
                                    $('#TombolAutoJurnal').html("Loading...");
                                    $.ajax({
                                        type 	    : 'POST',
                                        url 	    : '_Page/Transaksi/TombolAutoJurnal.php',
                                        success     : function(data){
                                            $('#TombolAutoJurnal').html(data);
                                        }
                                    });
                                    swal("Good Job!", "Reset Setting Auto Jurnal Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
            
        }
    });
});
//Modal Tambah Pembayaran
$('#ModalTambahPembayaran').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormTambahPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormTambahPembayaran.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormTambahPembayaran').html(data);
            $( '.format_uang' ).mask('000.000.000', {reverse: true});
            //Proses tambah pembayaran
            $('#ProsesTambahPembayaran').submit(function(){
                $('#NotifikasiTambahPembayaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahPembayaran')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesTambahPembayaran.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahPembayaran').html(data);
                        var NotifikasiTambahPembayaranBerhasil=$('#NotifikasiTambahPembayaranBerhasil').html();
                        if(NotifikasiTambahPembayaranBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Detail Pembayaran
$('#ModalDetailPembayaran').on('show.bs.modal', function (e) {
    var id_pembayaran = $(e.relatedTarget).data('id');
    $('#FormDetailPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDetailPembayaran.php',
        data        : {id_pembayaran: id_pembayaran},
        success     : function(data){
            $('#FormDetailPembayaran').html(data);
        }
    });
});
//Hapus Pembayaran
$('#ModalHapusPembayaran').on('show.bs.modal', function (e) {
    var id_pembayaran = $(e.relatedTarget).data('id');
    $('#FormDeletePembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormDeletePembayaran.php',
        data        : {id_pembayaran: id_pembayaran},
        success     : function(data){
            $('#FormDeletePembayaran').html(data);
            //Konfirmasi Hapus Pembayaran
            $('#KonfirmasiHapusPembayaran').click(function(){
                $('#NotifikasiHapusPembayaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusPembayaran.php',
                    data        : {id_pembayaran: id_pembayaran},
                    success     : function(data){
                        $('#NotifikasiHapusPembayaran').html(data);
                        var NotifikasiHapusPembayaranBerhasil=$('#NotifikasiHapusPembayaranBerhasil').html();
                        if(NotifikasiHapusPembayaranBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Hapus Semua Pembayaran
$('#ModalHapusSemuaPembayaran').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#FormHapusSemuaPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormHapusSemuaPembayaran.php',
        data        : {id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormHapusSemuaPembayaran').html(data);
            //Konfirmasi Hapus Pembayaran
            $('#KonfirmasiHapusSemuaPembayaran').click(function(){
                $('#NotifikasiHapusSemuaPembayaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesHapusSemuaPembayaran.php',
                    data        : {id_transaksi: id_transaksi},
                    success     : function(data){
                        $('#NotifikasiHapusSemuaPembayaran').html(data);
                        var NotifikasiHapusSemuaPembayaranBerhasil=$('#NotifikasiHapusSemuaPembayaranBerhasil').html();
                        if(NotifikasiHapusSemuaPembayaranBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Pembayaran
$('#ModalEditPembayaran').on('show.bs.modal', function (e) {
    var id_pembayaran = $(e.relatedTarget).data('id');
    $('#FormEditPembayaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/FormEditPembayaran.php',
        data        : {id_pembayaran: id_pembayaran},
        success     : function(data){
            $('#FormEditPembayaran').html(data);
            $( '.format_uang' ).mask('000.000.000', {reverse: true});
            //Proses Edit pembayaran
            $('#ProsesEditPembayaran').submit(function(){
                $('#NotifikasiEditPembayaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditPembayaran')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/ProsesEditPembayaran.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditPembayaran').html(data);
                        var NotifikasiEditPembayaranBerhasil=$('#NotifikasiEditPembayaranBerhasil').html();
                        if(NotifikasiEditPembayaranBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});