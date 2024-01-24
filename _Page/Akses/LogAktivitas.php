<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //GetIdAkses
    if(empty($_POST['id_akses'])){
        echo '<div class="card">';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12">';
        echo '              ID Akses Tidak Boleh Kosong';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $GetIdAkses=$_POST['id_akses'];
?>
    <div class="card">
        <div class="card-header">
            <form action="javascript:void(0);" id="ProsesBatasLog">
                <input type="hidden" name="id_akses" value="<?php echo "$GetIdAkses"; ?>">
                <div class="row">
                    <div class="col-md-1 mt-3">
                        <select name="BatasLog" id="BatasLog" class="form-control">
                            <option value="5">5</option>
                            <option selected value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="250">250</option>
                            <option value="500">500</option>
                        </select>
                        <small>Batas</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <select name="OrderByLog" id="OrderByLog" class="form-control">
                            <option value="">Pilih</option>
                            <option value="datetime_log">Tanggal</option>
                            <option value="kategori_log">Kategori</option>
                            <option value="deskripsi_log">Deskripsi</option>
                        </select>
                        <small>Mode</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <select name="ShortByLog" id="ShortByLog" class="form-control">
                            <option value="ASC">A To Z</option>
                            <option value="DESC">Z To A</option>
                        </select>
                        <small>Urutan</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <select name="KeywordByLog" id="KeywordByLog" class="form-control">
                            <option value="">Pilih</option>
                            <option value="datetime_log">Tanggal</option>
                            <option value="kategori_log">Kategori</option>
                            <option value="deskripsi_log">Deskripsi</option>
                        </select>
                        <small>Pencarian</small>
                    </div>
                    <div class="col-md-3 mt-3" id="FormKeywordLog">
                        <input type="text" name="KeywordLog" id="KeywordLog" class="form-control">
                        <small>Kata Kunci</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Mulai Mencari">
                            <i class="bi bi-search"></i> Tampilkan
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div id="TampilkanLogAkses"></div>
    </div>
<?php } ?>