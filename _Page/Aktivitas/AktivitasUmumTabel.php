<div class="card">
    <div class="card-header">
        <form action="javascript:void(0);" id="ProsesBatasAktivitasUmum">
            <div class="row">
                <div class="col-md-1 mt-3">
                    <select name="BatasAktivitasUmum" id="BatasAktivitasUmum" class="form-control">
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
                <div class="col-md-2 mt-3">
                    <select name="OrderBy" id="OrderBy" class="form-control">
                        <option value="">Pilih</option>
                        <option value="id_akses">Akses</option>
                        <option value="datetime_log">Tanggal</option>
                        <option value="kategori_log">Kategori</option>
                        <option value="deskripsi_log">Deskripsi</option>
                    </select>
                    <small for="OrderBy">Order By</small>
                </div>
                <div class="col-md-2 mt-3">
                    <select name="ShortBy" id="ShortBy" class="form-control">
                        <option value="ASC">A To Z</option>
                        <option value="DESC">Z To A</option>
                    </select>
                    <small for="ShortBy">Short By</small>
                </div>
                <div class="col-md-2 mt-3">
                    <select name="keyword_by" id="keyword_by" class="form-control">
                        <option value="">Pilih</option>
                        <option value="id_akses">Akses</option>
                        <option value="datetime_log">Tanggal</option>
                        <option value="kategori_log">Kategori</option>
                        <option value="deskripsi_log">Deskripsi</option>
                    </select>
                    <small for="keyword_by">Keyword By</small>
                </div>
                <div class="col-md-3 mt-3" id="FormKeywordAktivitasUmum">
                    <input type="text" name="KeywordAktivitasUmum" id="KeywordAktivitasUmum" class="form-control">
                    <small>Keyword</small>
                </div>
                <div class="col-md-2 mt-3">
                    <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div id="MenampilkanTabelAktivitasUmum">

    </div>
</div>