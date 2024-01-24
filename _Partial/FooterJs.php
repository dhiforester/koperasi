<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<!-- <script src="assets/vendor/tinymce/tinymce.min.js"></script> -->
<script src="assets/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="assets/jQuery-Mask-Plugin/dist/jquery.mask.min.js"></script>
<script src="node_modules/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '#kembalian' ).mask('000.000.000.000', {reverse: true});
        $( '#pembayaran' ).mask('000.000.000.000', {reverse: true});
        $( '#jumlah_transaksi' ).mask('000.000.000.000', {reverse: true});
        $( '#jumlah_transaksi_edit' ).mask('000.000.000.000', {reverse: true});
        $( '#pembayaran_edit' ).mask('000.000.000.000', {reverse: true});
        $( '#kembalian_edit' ).mask('000.000.000.000', {reverse: true});
        $( '.format_uang' ).mask('000.000.000.000', {reverse: true});
    })
</script>
