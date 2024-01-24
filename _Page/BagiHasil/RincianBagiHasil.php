<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_shu_session'])){
        echo '<div class="row">';
        echo '  <div class="col col-md-12">';
        echo '      <div class="card">';
        echo '          <div class="card-body">';
        echo '              ID Sessi Tidak Boleh Kosong';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];

?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas2">
                        <input type="hidden" name="id_shu_session" value="<?php echo "$id_shu_session"; ?>">
                        <div class="row">
                            <div class="col-md-1 mt-3">
                                <select name="BatasRincian" id="BatasRincian" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="text" name="KeywordRincian" id="KeywordRincian" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Mulai Pencarian">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <button type="button" class="btn btn-md btn-success btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalExportRincian" data-id="<?php echo "$id_shu_session"; ?>" title="Export Data">
                                    <i class="bi bi-download"></i> Export
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <button type="button" class="btn btn-md btn-warning btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPetunjukImport" data-id="<?php echo "$id_shu_session"; ?>" title="Import Data">
                                    <i class="bi bi-server"></i> Database
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPilihAnggota" data-id="<?php echo "$id_shu_session"; ?>" title="Tambah Rincian">
                                    <i class="bi bi-plus"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelRincianBagiHasil"></div>
            </div>
        </div>
    </div>
<?php } ?>