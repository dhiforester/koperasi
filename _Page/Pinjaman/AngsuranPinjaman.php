<section class="section dashboard">
    <?php
        if(empty($_POST['GetIdPinjaman'])){
            echo '<div class="row">';
            echo '  <div class="col-md-12">';
            echo '      <div class="alert alert-danger" role="alert">';
            echo '          ID Pinjaman Tidak Boleh Kosong!';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $GetIdPinjaman=$_POST['GetIdPinjaman'];
    ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form action="javascript:void(0);" id="ProsesBatasAngsuran">
                            <div class="row">
                                <div class="col-md-8 mt-3">
                                    <b class="card-title"><i class="bi bi-coin"></i> Angsuran Pinjaman</b>
                                </div>
                                <div class="col-md-2 text-center mt-3">
                                    <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalExportAngsuran" data-id="<?php echo "$GetIdPinjaman"; ?>" title="Export Data Angsuran">
                                        <i class="bi bi-download"></i> Export
                                    </button>
                                </div>
                                <div class="col-md-2 text-center mt-3">
                                    <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahAngsuran" data-id="<?php echo "$GetIdPinjaman"; ?>" title="Tambah Angsuran">
                                        <i class="bi bi-plus-lg"></i> Tambah
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="MenampilkanTabelAngsuran">

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
