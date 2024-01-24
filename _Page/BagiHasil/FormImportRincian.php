<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_shu_session
    if(empty($_POST['id_shu_session'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Sesi Bagi Hasil Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
?>
    <div class="modal-body">
        <div class="row">
            <div class="col col-md-4 mb-3">
                <label for="id_shu_session">ID Sessi</label>
                <input type="text" readonly name="id_shu_session" id="id_shu_session" class="form-control" value="<?php echo "$id_shu_session"; ?>">
            </div>
            <div class="col col-md-8 mb-3">
                <label for="file_import">File Rincian</label>
                <input type="file" name="file_import" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 mb-3 table table-responsive" style="height: 300px; overflow-y: scroll;">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th align="center"><b>No</b></th>
                            <th align="center"><b>Anggota</b></th>
                            <th align="center"><b>Kategori</b></th>
                            <th align="center"><b>Keterangan</b></th>
                        </tr>
                    </thead>
                    <tbody id="NotifikasiImportRincian">
                        <tr>
                            <td colspan="4" class="text-center">
                                <span>Belum Ada Proses</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>