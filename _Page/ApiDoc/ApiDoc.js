$('#MenampilkanTabelApiDoc').html("Loading...");
$('#MenampilkanTabelApiDoc').load("_Page/ApiDoc/TabelApiDoc.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelApiDoc').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/ApiDoc/TabelApiDoc.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelApiDoc').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelApiDoc').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/ApiDoc/TabelApiDoc.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelApiDoc').html(data);
        }
    });
});
$('#kategori').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelApiDoc').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/ApiDoc/TabelApiDoc.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelApiDoc').html(data);
        }
    });
});
tinymce.init({
    selector: '#request_api',
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
tinymce.init({
    selector: '#response_api',
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

//Kondisi pada saat halaman edit dibuka
var GetRequestApiDoc=$("#GetRequestApiDoc").html();
var GetResponseApiDoc=$("#GetResponseApiDoc").html();
tinymce.init({
    selector: '#get_request_api',
    setup: function (editor) {
        editor.on('init', function (e) {
            editor.setContent(GetRequestApiDoc);
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
tinymce.init({
    selector: '#get_response_api',
    setup: function (editor) {
        editor.on('init', function (e) {
            editor.setContent(GetResponseApiDoc);
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
//Proses Simpan konten Dokumentasi
$('#ClickSimpanDokumentasiApi').click(function(){
    $('#NotifikasiTambahApiDokumentasi').html('Loading..');
    var kategori_api=$('#kategori_api').val();
    var judul_api=$('#judul_api').val();
    var metode_api=$('#metode_api').val();
    var url_api=$('#url_api').val();
    var request_api = tinymce.get("request_api").getContent();
    var response_api = tinymce.get("response_api").getContent();
    $.ajax({
        type    : 'POST',
        url     : "_Page/ApiDoc/ProsesTambahApiDoc.php",
        data    : {kategori_api: kategori_api, judul_api: judul_api, metode_api: metode_api, url_api: url_api, request_api: request_api, response_api: response_api},
        success: function(data) {
            $('#NotifikasiTambahApiDokumentasi').html(data);
            var NotifikasiTambahApiDokumentasiBerhasil=$('#NotifikasiTambahApiDokumentasiBerhasil').html();
            if(NotifikasiTambahApiDokumentasiBerhasil=="Success"){
                window.location.href = "index.php?Page=ApiDoc";
            }
        }
    });
});
//Proses Simpan konten Dokumentasi editor
$('#ClickSimpanEditDokumentasiApi').click(function(){
    $('#NotifikasiEditApiDokumentasi').html('Loading..');
    var id_dokumentasi_api=$('#id_dokumentasi_api').val();
    var kategori_api=$('#kategori_api').val();
    var judul_api=$('#judul_api').val();
    var metode_api=$('#metode_api').val();
    var url_api=$('#url_api').val();
    var request_api = tinymce.get("get_request_api").getContent();
    var response_api = tinymce.get("get_response_api").getContent();
    $.ajax({
        type    : 'POST',
        url     : "_Page/ApiDoc/ProsesEditApiDoc.php",
        data    : {id_dokumentasi_api: id_dokumentasi_api, kategori_api: kategori_api, judul_api: judul_api, metode_api: metode_api, url_api: url_api, request_api: request_api, response_api: response_api},
        success: function(data) {
            $('#NotifikasiEditApiDokumentasi').html(data);
            var NotifikasiEditApiDokumentasiBerhasil=$('#NotifikasiEditApiDokumentasiBerhasil').html();
            if(NotifikasiEditApiDokumentasiBerhasil=="Success"){
                window.location.href = "index.php?Page=ApiDoc";
            }
        }
    });
});
//Hapus ApiDoc
$('#ModalDeleteDocApi').on('show.bs.modal', function (e) {
    var id_dokumentasi_api = $(e.relatedTarget).data('id');
    $('#FormDeleteDocApi').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/ApiDoc/FormDeleteApiDoc.php',
        data        : {id_dokumentasi_api: id_dokumentasi_api},
        success     : function(data){
            $('#FormDeleteDocApi').html(data);
            //Konfirmasi Hapus ApiDoc
            $('#KonfirmasiHapusDocApi').click(function(){
                $('#NotifikasiHapusApiDoc').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/ApiDoc/ProsesHapusApiDoc.php',
                    data        : {id_dokumentasi_api: id_dokumentasi_api},
                    success     : function(data){
                        $('#NotifikasiHapusApiDoc').html(data);
                        var NotifikasiHapusApiDocBerhasil=$('#NotifikasiHapusApiDocBerhasil').html();
                        if(NotifikasiHapusApiDocBerhasil=="Success"){
                            window.location.href = "index.php?Page=ApiDoc";
                        }
                    }
                });
            });
        }
    });
});