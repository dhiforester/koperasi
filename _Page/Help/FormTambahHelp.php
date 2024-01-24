<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title">
                                <i class="bi bi-clipboard-plus"></i> Add Help Documentation
                            </h4>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?Page=Help&Sub=HelpData" class="btn btn-md btn-dark btn-rounded btn-block">
                                <i class="bi bi-arrow-left-short"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" list="ListCategori" class="form-control">
                            <datalist id="ListCategori">
                                <?php
                                    //Tampilkan list categori help
                                    $QryKategori = mysqli_query($Conn, "SELECT DISTINCT category FROM help ORDER BY category ASC");
                                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                        $category=$DataKategori['category'];
                                        echo '<option value="'.$category.'">';
                                    }
                                ?>
                            </datalist>
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="title">Help Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiTambahHelp">
                            <span class="text-dark">Make sure that the form is filled out correctly</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-md btn-rounded btn-primary" id="ClickSimpanHelp">
                        <i class="bi bi-save"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>