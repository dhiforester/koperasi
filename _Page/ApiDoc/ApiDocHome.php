<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">Semua</option>
                                    <?php
                                        $query = mysqli_query($Conn, "SELECT DISTINCT kategori_api FROM dokumentasi_api");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $kategori_api=$data['kategori_api'];
                                            echo '<option value="'.$kategori_api.'">'.$kategori_api.'</option>';
                                        }
                                    ?>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input type="text" name="keyword" id="keyword" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-3 mb-3">
                                <a href="index.php?Page=ApiDoc&Sub=TambahApiDoc" class="btn btn-md btn-primary btn-block btn-rounded">
                                    <i class="bi bi-save"></i> Creat New
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelApiDoc"></div>
            </div>
        </div>
    </div>
</section>