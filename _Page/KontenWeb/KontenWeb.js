$('#MenampilkanTabelKontenUmum').html("Loading...");
$('#MenampilkanTabelKontenUmum').load("_Page/KontenWeb/TabelApiKey.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelKontenUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelApiKey.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelKontenUmum').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelKontenUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelApiKey.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelKontenUmum').html(data);
        }
    });
});
$('#ProsesFilterKontenUmum').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelKontenUmum').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelApiKey.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelKontenUmum').html(data);
            $('#ModalFilterKontenUmum').modal('hide');
        }
    });
});
//Modal Atur Konten Umum
$('#ModalAturKontenUmum').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_setting_api_key = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormAturKontenUmum').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormAturKontenUmum.php',
        data        : {id_setting_api_key: id_setting_api_key},
        success     : function(data){
            $('#FormAturKontenUmum').html(data);
            //Proses Atur Konten Umum
            $('#ProsesAturKontenUmum').submit(function(){
                $('#NotifikasiAturKontenUmum').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesAturKontenUmum')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesAturKontenUmum.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiAturKontenUmum').html(data);
                        var NotifikasiAturKontenUmumBerhasil=$('#NotifikasiAturKontenUmumBerhasil').html();
                        if(NotifikasiAturKontenUmumBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelApiKey.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelKontenUmum').html(data);
                                    $('#ModalAturKontenUmum').modal('hide');
                                    swal("Good Job!", "Atur Konten Umum Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
    //Modal Atur Konten Umum
    $('#ModalHapusKontenUmum').on('show.bs.modal', function (e) {
        $('#FormHapusKontenUmum').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/KontenWeb/FormHapusKontenUmum.php',
            data        : {id_setting_api_key: id_setting_api_key},
            success     : function(data){
                $('#FormHapusKontenUmum').html(data);
                //Proses Atur Konten Umum
                $('#KonfirmasiHapusKontenUmum').click(function(){
                    $('#NotifikasiHapusKontenUmum').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/KontenWeb/ProsesHapusKontenUmum.php',
                        data        : {id_setting_api_key: id_setting_api_key},
                        success     : function(data){
                            $('#NotifikasiHapusKontenUmum').html(data);
                            var NotifikasiHapusKontenUmumBerhasil=$('#NotifikasiHapusKontenUmumBerhasil').html();
                            if(NotifikasiHapusKontenUmumBerhasil=="Success"){
                                $.ajax({
                                    type 	    : 'POST',
                                    url 	    : '_Page/KontenWeb/TabelApiKey.php',
                                    data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                    success     : function(data){
                                        $('#MenampilkanTabelKontenUmum').html(data);
                                        $('#ModalHapusKontenUmum').modal('hide');
                                        swal("Good Job!", "Hapus Konten Umum Berhasil!", "success");
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
//Modal Atur Konten Umum
$('#ModalDetailKonten').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_setting_api_key = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDetailKonten').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormDetailKonten.php',
        data        : {id_setting_api_key: id_setting_api_key},
        success     : function(data){
            $('#FormDetailKonten').html(data);
        }
    });
});

//Page Posting
$('#MenampilkanTabelPagePosting').html("Loading...");
var ProsesBatasPagePosting = $('#ProsesBatasPagePosting').serialize();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/KontenWeb/TabelPagePosting.php',
    data 	    :  ProsesBatasPagePosting,
    success     : function(data){
        $('#MenampilkanTabelPagePosting').html(data);
    }
});
    
$('#BatasPagePosting').change(function(){
    var ProsesBatasPagePosting = $('#ProsesBatasPagePosting').serialize();
    $('#MenampilkanTabelPagePosting').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelPagePosting.php',
        data 	    :  ProsesBatasPagePosting,
        success     : function(data){
            $('#MenampilkanTabelPagePosting').html(data);
        }
    });
});
$('#ProsesBatasPagePosting').submit(function(){
    var ProsesBatasPagePosting = $('#ProsesBatasPagePosting').serialize();
    $('#MenampilkanTabelPagePosting').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelPagePosting.php',
        data 	    :  ProsesBatasPagePosting,
        success     : function(data){
            $('#MenampilkanTabelPagePosting').html(data);
        }
    });
});
$('#ProsesFilterPagePosting').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelPagePosting').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelPagePosting.php',
        data 	    :  {BatasPagePosting: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, KeywordPagePosting: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelPagePosting').html(data);
            $('#ProsesFilterPagePosting').modal('hide');
        }
    });
});

tinymce.init({
    selector: '#isi_posting',
    plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen charmap | ' +
    'forecolor backcolor emoticons | help',
    menu: {
        favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'assets/css/tinymce.css',
    images_upload_url: '_Page/PostAcceptor/PostAcceptor.php',
    images_upload_credentials: true,
    images_reuse_filename: true,
    image_title: true,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
        URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
        images_upload_url: 'postAcceptor.php',
        here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
        */

        input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
            /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
            */
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
        };

        input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    height : "480"
});

//Proses Tambah Posting
$('#ClickSimpanPagePosting').click(function(){
    $('#NotifikasiTambahPagePosting').html('Loading..');
    // var id_setting_api_key=$('#id_setting_api_key').val();
    // var judul_posting=$('#judul_posting').val();
    // var kategori_posting=$('#kategori_posting').val();
    // var tag_posting=$('#tag_posting').val();
    // var image_posting=$('#image_posting').val();
    // var status_posting=$('#status_posting').val();
    // var datetime_posting=$('#datetime_posting').val();
    var form = $('#ProsesTambahPosting')[0];
    var data = new FormData(form);
    $.ajax({
        type        : 'POST',
        url         : "_Page/KontenWeb/ProsesTambahPosting.php",
        data        : data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success: function(data) {
            $('#NotifikasiTambahPagePosting').html(data);
            var NotifikasiTambahPagePostingBerhasil=$('#NotifikasiTambahPagePostingBerhasil').html();
            var get_id_konten_posting=$('#get_id_konten_posting').val();
            if(NotifikasiTambahPagePostingBerhasil=="Success"){
                // swal("Good Job!", "Edit Access Success!", "success");
                var isi_posting = tinymce.get("isi_posting").getContent();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesTambahPosting2.php',
                    data 	    :  {id_konten_posting: get_id_konten_posting, isi_posting: isi_posting},
                    success     : function(data){
                        $('#NotifikasiTambahPagePosting2').html(data);
                        var NotifikasiTambahPagePostingBerhasil2=$('#NotifikasiTambahPagePostingBerhasil2').html();
                        if(NotifikasiTambahPagePostingBerhasil2=="Success"){
                            window.location.href = "index.php?Page=KontenWeb&Sub=PagePosting";
                        }
                    }
                });
            }
        }
    });
});
//Modal Hapus Page Posting
$('#ModalHapusPagePosting').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_konten_posting = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormHapusPagePosting').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormHapusPagePosting.php',
        data        : {id_konten_posting: id_konten_posting},
        success     : function(data){
            $('#FormHapusPagePosting').html(data);
            $('#KonfirmasiHapusPagePosting').click(function(){
                $('#NotifikasiHapusPagePosting').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesHapusPosting.php',
                    data        : {id_konten_posting: id_konten_posting},
                    success     : function(data){
                        $('#NotifikasiHapusPagePosting').html(data);
                        var NotifikasiHapusPagePostingBerhasil=$('#NotifikasiHapusPagePostingBerhasil').html();
                        if(NotifikasiHapusPagePostingBerhasil=="Success"){
                            $('#MenampilkanTabelPagePosting').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelPagePosting.php',
                                data 	    :  {BatasPagePosting: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: keyword_by, KeywordPagePosting: keyword},
                                success     : function(data){
                                    $('#MenampilkanTabelPagePosting').html(data);
                                    $('#ModalHapusPagePosting').modal('hide');
                                }
                            });
                        }
                    }
                });
            });
            
        }
    });
});
var GetEditPagePosting=$('#GetEditPagePosting').html();
tinymce.init({
    selector: '#isi_posting_edit',
    setup: function (editor) {
        editor.on('init', function (e) {
            editor.setContent(GetEditPagePosting);
        });
    },
    plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'table emoticons template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen charmap | ' +
    'forecolor backcolor emoticons | help',
    menu: {
        favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'assets/css/tinymce.css',
    images_upload_url: '_Page/PostAcceptor/PostAcceptor.php',
    images_upload_credentials: true,
    images_reuse_filename: true,
    image_title: true,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
        URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
        images_upload_url: 'postAcceptor.php',
        here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
        */
        input.onchange = function () {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function () {
            /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
            */
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
        };
        input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    height : "480"
});
//Proses Edit Posting
$('#ClickEditPagePosting').click(function(){
    $('#NotifikasiEditPosting').html('Loading..');
    var id_konten_posting_edit=$('#id_konten_posting_edit').val();
    var form = $('#ProsesEditPagePosting')[0];
    var data = new FormData(form);
    $.ajax({
        type        : 'POST',
        url         : "_Page/KontenWeb/ProsesEditPagePosting.php",
        data        : data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success: function(data) {
            $('#NotifikasiEditPosting').html(data);
            var NotifikasiEditPostingBerhasil=$('#NotifikasiEditPostingBerhasil').html();
            if(NotifikasiEditPostingBerhasil=="Success"){
                // swal("Good Job!", "Edit Access Success!", "success");
                $('#NotifikasiEditPagePosting2').html("Loading...");
                var isi_posting_edit= tinymce.get("isi_posting_edit").getContent();
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesEditPagePosting2.php',
                    data 	    :  {id_konten_posting_edit: id_konten_posting_edit, isi_posting_edit: isi_posting_edit},
                    success     : function(data){
                        $('#NotifikasiEditPagePosting2').html(data);
                        var NotifikasiEditPostingBerhasil2=$('#NotifikasiEditPostingBerhasil2').html();
                        if(NotifikasiEditPostingBerhasil2=="Success"){
                            window.location.href = "index.php?Page=KontenWeb&Sub=PagePosting";
                        }
                    }
                });
            }
        }
    });
});

//URL Dinamis
$('#MenampilkanTabelUrlDinamis').html("Loading...");
var ProsesBatasUrlDinamis = $('#ProsesBatasUrlDinamis').serialize();
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/KontenWeb/TabelUrlDinamis.php',
    data 	    :  ProsesBatasUrlDinamis,
    success     : function(data){
        $('#MenampilkanTabelUrlDinamis').html(data);
    }
});
    
$('#BatasUrlDinamis').change(function(){
    var ProsesBatasUrlDinamis = $('#ProsesBatasUrlDinamis').serialize();
    $('#MenampilkanTabelUrlDinamis').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelUrlDinamis.php',
        data 	    :  ProsesBatasUrlDinamis,
        success     : function(data){
            $('#MenampilkanTabelUrlDinamis').html(data);
        }
    });
});
$('#ProsesBatasUrlDinamis').submit(function(){
    var ProsesBatasUrlDinamis = $('#ProsesBatasUrlDinamis').serialize();
    $('#MenampilkanTabelUrlDinamis').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelUrlDinamis.php',
        data 	    :  ProsesBatasUrlDinamis,
        success     : function(data){
            $('#MenampilkanTabelUrlDinamis').html(data);
        }
    });
});
$('#ProsesFilterUrlDinamis').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelUrlDinamis').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelUrlDinamis.php',
        data 	    :  {BatasUrlDinamis: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, KeywordUrlDinamis: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelUrlDinamis').html(data);
            $('#ProsesFilterUrlDinamis').modal('hide');
        }
    });
});
//Tambah Url Dinamis
$('#ModalTambahUrlDinamis').on('show.bs.modal', function (e) {
    $('#FormTambahUrlDinamis').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormTambahUrlDinamis.php',
        success     : function(data){
            $('#FormTambahUrlDinamis').html(data);
            //Proses Tambah Url Dinamis
            $('#ProsesTambahUrlDinamis').submit(function(){
                $('#NotifikasiTambahUrlDinamis').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahUrlDinamis')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesTambahUrlDinamis.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahUrlDinamis').html(data);
                        var NotifikasiTambahUrlDinamisBerhasil=$('#NotifikasiTambahUrlDinamisBerhasil').html();
                        if(NotifikasiTambahUrlDinamisBerhasil=="Success"){
                            $('#ModalTambahUrlDinamis').modal('toggle');
                            $('#MenampilkanTabelUrlDinamis').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelUrlDinamis.php',
                                success     : function(data){
                                    $('#MenampilkanTabelUrlDinamis').html(data);
                                    swal("Good Job!", "Tambah URL Dinamis Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Hapus Url Dinamis
$('#ModalHapusUrlDinamis').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_konten_url = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormHapusUrlDinamis').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormHapusUrlDinamis.php',
        data        : {id_konten_url: id_konten_url},
        success     : function(data){
            $('#FormHapusUrlDinamis').html(data);
            $('#KonfirmasiHapusUrlDinamis').click(function(){
                $('#NotifikasiHapusPUrlDinamis').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesHapusUrlDinamis.php',
                    data        : {id_konten_url: id_konten_url},
                    success     : function(data){
                        $('#NotifikasiHapusPUrlDinamis').html(data);
                        var NotifikasiHapusPUrlDinamisBerhasil=$('#NotifikasiHapusPUrlDinamisBerhasil').html();
                        if(NotifikasiHapusPUrlDinamisBerhasil=="Success"){
                            $('#MenampilkanTabelUrlDinamis').html('Loading...');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelUrlDinamis.php',
                                data 	    :  {BatasUrlDinamis: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: keyword_by, KeywordUrlDinamis: keyword},
                                success     : function(data){
                                    $('#MenampilkanTabelUrlDinamis').html(data);
                                    $('#ModalHapusUrlDinamis').modal('hide');
                                    swal("Good Job!", "Hapus URL Dinamis Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
            
        }
    });
});
//Modal Edit Url Dinamis
$('#ModalEditUrlDinamis').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_konten_url = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditUrlDinamis').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormEditUrlDinamis.php',
        data        : {id_konten_url: id_konten_url},
        success     : function(data){
            $('#FormEditUrlDinamis').html(data);
            //Proses Edit Url Dinamis
            $('#ProsesEditUrlDinamis').submit(function(){
                $('#NotifikasiEditUrlDinamis').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditUrlDinamis')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesEditUrlDinamis.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditUrlDinamis').html(data);
                        var NotifikasiEditUrlDinamisBerhasil=$('#NotifikasiEditUrlDinamisBerhasil').html();
                        if(NotifikasiEditUrlDinamisBerhasil=="Success"){
                            $('#ModalEditUrlDinamis').modal('toggle');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelUrlDinamis.php',
                                data 	    :  {BatasUrlDinamis: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: keyword_by, KeywordUrlDinamis: keyword},
                                success     : function(data){
                                    $('#MenampilkanTabelUrlDinamis').html(data);
                                    swal("Good Job!", "Edit URL Dinamis Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//TESTIMONI
$('#MenampilkanTabelTestimoni').html("Loading...");
$('#MenampilkanTabelTestimoni').load("_Page/KontenWeb/TabelTestimoni.php");
$('#BatasTestimoni').change(function(){
    var ProsesBatasTestimoni = $('#ProsesBatasTestimoni').serialize();
    $('#MenampilkanTabelTestimoni').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelTestimoni.php',
        data 	    :  ProsesBatasTestimoni,
        success     : function(data){
            $('#MenampilkanTabelTestimoni').html(data);
        }
    });
});
$('#ProsesBatasTestimoni').submit(function(){
    var ProsesBatasTestimoni = $('#ProsesBatasTestimoni').serialize();
    $('#MenampilkanTabelTestimoni').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelTestimoni.php',
        data 	    :  ProsesBatasTestimoni,
        success     : function(data){
            $('#MenampilkanTabelTestimoni').html(data);
        }
    });
});
$('#ProsesFilterTestimoni').submit(function(){
    $('#MenampilkanTabelTestimoni').html('Loading..');
    var form = $('#ProsesFilterTestimoni')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/KontenWeb/TabelTestimoni.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#MenampilkanTabelTestimoni').html(data);
                $('#ModalFilterTestimoni').modal('hide');
            }
        });
});
//Modal Tambah Testimoni
$('#ModalTambahTestimoni').on('show.bs.modal', function (e) {
    $('#FormTambahTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormTambahTestimoni.php',
        success     : function(data){
            $('#FormTambahTestimoni').html(data);
            //Proses Tambah Testimoni
            $('#ProsesTambahTestimoni').submit(function(){
                $('#NotifikasiTambahTestimoni').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahTestimoni')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesTambahTestimoni.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahTestimoni').html(data);
                        var NotifikasiTambahTestimoniBerhasil=$('#NotifikasiTambahTestimoniBerhasil').html();
                        if(NotifikasiTambahTestimoniBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Hapus Testimoni
$('#ModalHapusTestimoni').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_testimoni = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var keyword_by = pecah[6];
    $('#FormHapusTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormHapusTestimoni.php',
        data        : {id_testimoni: id_testimoni},
        success     : function(data){
            $('#FormHapusTestimoni').html(data);
            //Proses Edit Url Dinamis
            $('#KonfirmasiHapusTestimoni').click(function(){
                $('#NotifikasiHapusTestimoni').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesHapusTestimoni.php',
                    data 	    :  {id_testimoni: id_testimoni},
                    success     : function(data){
                        $('#NotifikasiHapusTestimoni').html(data);
                        var NotifikasiHapusTestimoniBerhasil=$('#NotifikasiHapusTestimoniBerhasil').html();
                        if(NotifikasiHapusTestimoniBerhasil=="Success"){
                            $('#ModalHapusTestimoni').modal('toggle');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelTestimoni.php',
                                data 	    :  {BatasTestimoni: batas, OrderBy: OrderBy, ShortBy: ShortBy, keyword_by: keyword_by, KeywordTestimoni: keyword, page: page},
                                success     : function(data){
                                    $('#MenampilkanTabelTestimoni').html(data);
                                    swal("Good Job!", "Hapus Testimoni Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Testimoni
$('#ModalEditTestimoni').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_testimoni = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var keyword_by = pecah[6];
    $('#FormEditTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormEditTestimoni.php',
        data        : {id_testimoni: id_testimoni},
        success     : function(data){
            $('#FormEditTestimoni').html(data);
            //Proses Edit Url Dinamis
            $('#ProsesEditTestimoni').submit(function(){
                $('#NotifikasiEditTestimoni').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditTestimoni')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesEditTestimoni.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditTestimoni').html(data);
                        var NotifikasiEditTestimoniBerhasil=$('#NotifikasiEditTestimoniBerhasil').html();
                        if(NotifikasiEditTestimoniBerhasil=="Success"){
                            $('#ModalEditTestimoni').modal('toggle');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelTestimoni.php',
                                data 	    :  {BatasTestimoni: batas, OrderBy: OrderBy, ShortBy: ShortBy, keyword_by: keyword_by, KeywordTestimoni: keyword, page: page},
                                success     : function(data){
                                    $('#MenampilkanTabelTestimoni').html(data);
                                    swal("Good Job!", "Edit Testimoni Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Detail Testimoni
$('#ModalDetailTestimoni').on('show.bs.modal', function (e) {
    var id_testimoni = $(e.relatedTarget).data('id');
    $('#FormDetailTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormDetailTestimoni.php',
        data        : {id_testimoni: id_testimoni},
        success     : function(data){
            $('#FormDetailTestimoni').html(data);
        }
    });
});
//FAQ
$('#MenampilkanTabelFaq').html("Loading...");
$('#MenampilkanTabelFaq').load("_Page/KontenWeb/TabelFaq.php");
$('#BatasFaq').change(function(){
    var ProsesBatasFaq = $('#ProsesBatasFaq').serialize();
    $('#MenampilkanTabelFaq').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelFaq.php',
        data 	    :  ProsesBatasFaq,
        success     : function(data){
            $('#MenampilkanTabelFaq').html(data);
        }
    });
});
$('#ProsesBatasFaq').submit(function(){
    var ProsesBatasFaq = $('#ProsesBatasFaq').serialize();
    $('#MenampilkanTabelFaq').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/TabelFaq.php',
        data 	    :  ProsesBatasFaq,
        success     : function(data){
            $('#MenampilkanTabelFaq').html(data);
        }
    });
});
$('#ProsesFilterFaq').submit(function(){
    $('#MenampilkanTabelFaq').html('Loading..');
    var form = $('#ProsesFilterFaq')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/KontenWeb/TabelFaq.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#MenampilkanTabelFaq').html(data);
                $('#ModalFilterFaq').modal('hide');
            }
        });
});
//Modal Tambah Faq
$('#ModalTambahFaq').on('show.bs.modal', function (e) {
    $('#FormTambahFaq').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormTambahFaq.php',
        success     : function(data){
            $('#FormTambahFaq').html(data);
            //Proses Tambah Faq
            $('#ProsesTambahFaq').submit(function(){
                $('#NotifikasiTambahFaq').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahFaq')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesTambahFaq.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahFaq').html(data);
                        var NotifikasiTambahFaqBerhasil=$('#NotifikasiTambahFaqBerhasil').html();
                        if(NotifikasiTambahFaqBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Hapus Faq
$('#ModalHapusFaq').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_faq = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var keyword_by = pecah[6];
    $('#FormHapusFaq').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormHapusFaq.php',
        data        : {id_faq: id_faq},
        success     : function(data){
            $('#FormHapusFaq').html(data);
            //Proses Edit Url Dinamis
            $('#KonfirmasiHapusFaq').click(function(){
                $('#NotifikasiHapusFaq').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesHapusFaq.php',
                    data 	    :  {id_faq: id_faq},
                    success     : function(data){
                        $('#NotifikasiHapusFaq').html(data);
                        var NotifikasiHapusFaqBerhasil=$('#NotifikasiHapusFaqBerhasil').html();
                        if(NotifikasiHapusFaqBerhasil=="Success"){
                            $('#ModalHapusFaq').modal('toggle');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelFaq.php',
                                data 	    :  {BatasFaq: batas, OrderBy: OrderBy, ShortBy: ShortBy, keyword_by: keyword_by, KeywordFaq: keyword, page: page},
                                success     : function(data){
                                    $('#MenampilkanTabelFaq').html(data);
                                    swal("Good Job!", "Hapus Faq Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Modal Edit Faq
$('#ModalEditFaq').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_faq = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var keyword_by = pecah[6];
    $('#FormEditFaq').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormEditFaq.php',
        data        : {id_faq: id_faq},
        success     : function(data){
            $('#FormEditFaq').html(data);
            //Proses Edit Url Dinamis
            $('#ProsesEditFaq').submit(function(){
                $('#NotifikasiEditFaq').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditFaq')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/KontenWeb/ProsesEditFaq.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditFaq').html(data);
                        var NotifikasiEditFaqBerhasil=$('#NotifikasiEditFaqBerhasil').html();
                        if(NotifikasiEditFaqBerhasil=="Success"){
                            $('#ModalEditFaq').modal('toggle');
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/KontenWeb/TabelFaq.php',
                                data 	    :  {BatasFaq: batas, OrderBy: OrderBy, ShortBy: ShortBy, keyword_by: keyword_by, KeywordFaq: keyword, page: page},
                                success     : function(data){
                                    $('#MenampilkanTabelFaq').html(data);
                                    swal("Good Job!", "Edit Faq Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
$('#ModalDetailFaq').on('show.bs.modal', function (e) {
    var id_faq = $(e.relatedTarget).data('id');
    $('#FormDetailFaq').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/KontenWeb/FormDetailFaq.php',
        data        : {id_faq: id_faq},
        success     : function(data){
            $('#FormDetailFaq').html(data);
        }
    });
});