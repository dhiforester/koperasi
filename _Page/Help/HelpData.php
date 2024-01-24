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
                                        $query = mysqli_query($Conn, "SELECT DISTINCT category FROM help");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $category=$data['category'];
                                            echo '<option value="'.$category.'">'.$category.'</option>';
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
                            <div class="col-md-2 mt-3">
                                <a href="index.php?Page=Help&Sub=TambahHelp" class="btn btn-md btn-primary btn-block btn-rounded">
                                    <i class="bi bi-save"></i> Creat New
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelHelp">
                            
                </div>
            </div>
        </div>
    </div>
</section>