$('#MenampilkanPersonnelMitra').html("Loading...");
var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanPersonnelMitra').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Komisi/TabelDokter.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanPersonnelMitra').html(data);
    }
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanPersonnelMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/TabelDokter.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanPersonnelMitra').html(data);
        }
    });
});
$('#id_mitra').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanPersonnelMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/TabelDokter.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanPersonnelMitra').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanPersonnelMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/TabelDokter.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanPersonnelMitra').html(data);
        }
    });
});
//Tabel Detail Komisi
var GetIdPersonnel = $('#GetIdPersonnel').html();
$('#TabelDetailKomisi').html("Loading...");
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Komisi/TabelDetailKomisi.php',
    data 	    :  {id_dokter: GetIdPersonnel},
    success     : function(data){
        $('#TabelDetailKomisi').html(data);
    }
});
$('#MenampilkanRiwayatJasaTindakan').html("Loading...");
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Komisi/TabelJasaTindakan.php',
    data 	    :  {id_dokter: GetIdPersonnel},
    success     : function(data){
        $('#MenampilkanRiwayatJasaTindakan').html(data);
    }
});

//Ketika Modal Cetak Tampil
$('#ModalCetakKomisi').on('show.bs.modal', function (e) {
    var id_dokter= $(e.relatedTarget).data('id');
    $('#FormCetakKomisi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/FormCetakKomisi.php',
        data        : {id_dokter: id_dokter},
        success     : function(data){
            $('#FormCetakKomisi').html(data);
            //Ketika form cetak periode berubah
            $('#periode').change(function(){
                var periode = $('#periode').val();
                $('#FormTanggalCetak').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Komisi/FormTanggalCetak.php',
                    data 	    :  {periode: periode},
                    success     : function(data){
                        $('#FormTanggalCetak').html(data);
                    }
                });
            });
        }
    });
});
//Ketika Modal Cetak Riwayat Tindakan Medis
$('#ModalCetakRiwayatJasaTindakan').on('show.bs.modal', function (e) {
    var id_dokter= $(e.relatedTarget).data('id');
    $('#FormCetakRiwayatJasaTindakan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/FormCetakRiwayatJasaTindakan.php',
        data        : {id_dokter: id_dokter},
        success     : function(data){
            $('#FormCetakRiwayatJasaTindakan').html(data);
        }
    });
});
//Ketika menampilkan modal pencairan
$('#ModalTambahPencairan').on('show.bs.modal', function (e) {
    var id_dokter= $(e.relatedTarget).data('id');
    $('#FormTambahPencairan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/FormTambahPencairan.php',
        data        : {id_dokter: id_dokter},
        success     : function(data){
            $('#FormTambahPencairan').html(data);
        }
    });
});
//Modal Edit Pencairan
$('#ModalEditPencairan').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi_pencairan = pecah[0];
    var page = pecah[1];
    $('#FormEditPencairan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/FormEditPencairan.php',
        data        : {id_transaksi_pencairan: id_transaksi_pencairan},
        success     : function(data){
            $('#FormEditPencairan').html(data);
            //Proses Tambah Akses
            $('#ProsesEditPencairan').submit(function(){
                $('#NotifikasiEditPencairan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditPencairan')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Komisi/ProsesEditPencairan.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditPencairan').html(data);
                        var NotifikasiEditPencairanBerhasil=$('#NotifikasiEditPencairanBerhasil').html();
                        if(NotifikasiEditPencairanBerhasil=="Success"){
                            $('#ModalEditPencairan').modal('hide');
                            $('#TabelDetailKomisi').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Komisi/TabelDetailKomisi.php',
                                data 	    :  {id_dokter: GetIdPersonnel},
                                success     : function(data){
                                    $('#TabelDetailKomisi').html(data);
                                    swal("Good Job!", "Tambah Pencairan Berhasil!", "success");
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
$('#ModalHapusPencairan').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_transaksi_pencairan = pecah[0];
    var page = pecah[1];
    $('#FormDeletePencairan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Komisi/FormDeletePencairan.php',
        data        : {id_transaksi_pencairan: id_transaksi_pencairan},
        success     : function(data){
            $('#FormDeletePencairan').html(data);
            //Konfirmasi Hapus Pencairan
            $('#KonfirmasiHapusPencairan').click(function(){
                $('#NotifikasiHapusPencairan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Komisi/ProsesHapusPencairan.php',
                    data        : {id_transaksi_pencairan: id_transaksi_pencairan},
                    success     : function(data){
                        $('#NotifikasiHapusPencairan').html(data);
                        var NotifikasiHapusPencairanBerhasil=$('#NotifikasiHapusPencairanBerhasil').html();
                        if(NotifikasiHapusPencairanBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Komisi/TabelDetailKomisi.php',
                                data 	    :  {id_dokter: GetIdPersonnel, page: page},
                                success     : function(data){
                                    $('#TabelDetailKomisi').html(data);
                                    $('#ModalHapusPencairan').modal('hide');
                                    swal("Good Job!", "Hapus Pencairan Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});