$('#MenampilkanTabelHelp').html("Loading...");
$('#MenampilkanTabelHelp').load("_Page/Help/TabelHelp.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelHelp').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Help/TabelHelp.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelHelp').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelHelp').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Help/TabelHelp.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelHelp').html(data);
        }
    });
});
$('#kategori').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelHelp').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Help/TabelHelp.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelHelp').html(data);
        }
    });
});
tinymce.init({
    selector: '#description',
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
var description=$("#GetHelDescription").html();
tinymce.init({
    selector: '#description_edit',
    setup: function (editor) {
        editor.on('init', function (e) {
            editor.setContent(description);
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
//Proses Simpan Help Documentation
$('#ClickSimpanHelp').click(function(){
    $('#NotifikasiTambahHelp').html('Loading..');
    var category=$('#category').val();
    var title=$('#title').val();
    var description = tinymce.get("description").getContent();
    $.ajax({
        type    : 'POST',
        url     : "_Page/Help/ProsesTambahHelp.php",
        data    : {category: category, title: title, description: description},
        success: function(data) {
            $('#NotifikasiTambahHelp').html(data);
            var NotifikasiTambahHelpBerhasil=$('#NotifikasiTambahHelpBerhasil').html();
            if(NotifikasiTambahHelpBerhasil=="Success"){
                window.location.href = "index.php?Page=Help&Sub=HelpData";
            }
        }
    });
});
//Proses Simpan Help Documentation editor
$('#ClickSimpanEditHelp').click(function(){
    $('#NotifikasiEditHelp').html('Loading..');
    var id_help=$('#id_help').val();
    var title=$('#title').val();
    var category=$('#category').val();
    var description_edit = tinymce.get("description_edit").getContent();
    $.ajax({
        type    : 'POST',
        url     : "_Page/Help/ProsesEditHelp.php",
        data    : {id_help: id_help, title: title, category: category, description_edit: description_edit},
        success: function(data) {
            $('#NotifikasiEditHelp').html(data);
            var NotifikasiEditHelpBerhasil=$('#NotifikasiEditHelpBerhasil').html();
            if(NotifikasiEditHelpBerhasil=="Success"){
                window.location.href = "index.php?Page=Help&Sub=HelpData";
            }
        }
    });
});
//Hapus Help
$('#ModalDeleteHelp').on('show.bs.modal', function (e) {
    var id_help = $(e.relatedTarget).data('id');
    $('#FormDeleteHelp').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Help/FormDeleteHelp.php',
        data        : {id_help: id_help},
        success     : function(data){
            $('#FormDeleteHelp').html(data);
            //Konfirmasi Hapus Help
            $('#KonfirmasiHapusHelp').click(function(){
                $('#NotifikasiHapusHelp').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Help/ProsesHapusHelp.php',
                    data        : {id_help: id_help},
                    success     : function(data){
                        $('#NotifikasiHapusHelp').html(data);
                        var NotifikasiHapusHelpBerhasil=$('#NotifikasiHapusHelpBerhasil').html();
                        if(NotifikasiHapusHelpBerhasil=="Success"){
                            window.location.href = "index.php?Page=Help&Sub=HelpData";
                        }
                    }
                });
            });
        }
    });
});
//Modal Config Help Access
$('#ModalAksesHelp').on('show.bs.modal', function (e) {
    var id_help = $(e.relatedTarget).data('id');
    $('#FormAksesHelp').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Help/FormAksesHelp.php',
        data        : {id_help: id_help},
        success     : function(data){
            $('#FormAksesHelp').html(data);
            $('#ProsesSimpanAksesHelp').submit(function(){
                var ProsesSimpanAksesHelp = $('#ProsesSimpanAksesHelp').serialize();
                $('#NotifikasiSimpanAksesHelp').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Help/ProsesSimpanAksesHelp.php',
                    data 	    :  ProsesSimpanAksesHelp,
                    success     : function(data){
                        $('#NotifikasiSimpanAksesHelp').html(data);
                        var NotifikasiSimpanAksesHelpBerhasil=$('#NotifikasiSimpanAksesHelpBerhasil').html();
                        if(NotifikasiSimpanAksesHelpBerhasil=="Success"){
                            window.location.href = "index.php?Page=Help&Sub=HelpData";
                        }
                    }
                });
            });
        }
    });
});
//Detail Help
$('#ModalDetailHelp').on('show.bs.modal', function (e) {
    var id_help = $(e.relatedTarget).data('id');
    $('#FormDetailHelp').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Help/FormDetailHelp.php',
        data        : {id_help: id_help},
        success     : function(data){
            $('#FormDetailHelp').html(data);
        }
    });
});
//menampilkan Help List
var KeywordHelp=$('#KeywordHelp').val();
var kategori_help=$('#kategori_help').val();
$('#HelpList').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Help/HelpList.php',
    data 	    :  {keyword: KeywordHelp, kategori_help: kategori_help},
    success     : function(data){
        $('#HelpList').html(data);
    }
});
//Proses Pencarian help
$('#ProsesPencarianHelp').submit(function(){
    var KeywordHelp=$('#KeywordHelp').val();
    var kategori_help=$('#kategori_help').val();
    $('#HelpList').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Help/HelpList.php',
        data 	    :  {keyword: KeywordHelp, kategori_help: kategori_help},
        success     : function(data){
            $('#HelpList').html(data);
        }
    });
});