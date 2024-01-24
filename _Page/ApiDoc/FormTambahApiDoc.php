<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title">
                                <i class="bi bi-clipboard-plus"></i> Add API Documentation Form
                            </h4>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?Page=ApiDoc" class="btn btn-md btn-dark btn-rounded btn-block">
                                <i class="bi bi-arrow-left-short"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="kategori_api">Category</label>
                            <input type="text" name="kategori_api" id="kategori_api" class="form-control">
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="judul_api">Documentation Title</label>
                            <input type="text" name="judul_api" id="judul_api" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="metode_api">Method</label>
                            <select name="metode_api" id="metode_api" class="form-control">
                                <option value="POST">POST</option>
                                <option value="GET">GET</option>
                            </select>
                        </div>
                        <div class="col-md-9 mb-3">
                            <label for="url_api">URL</label>
                            <input type="text" name="url_api" id="url_api" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="request_api">Request</label>
                            <textarea name="request_api" id="request_api" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="response_api">Response</label>
                            <textarea name="response_api" id="response_api" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiTambahApiDokumentasi">
                            <span class="text-dark">Make sure that the form is filled out correctly</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-md btn-rounded btn-primary" id="ClickSimpanDokumentasiApi">
                        <i class="bi bi-save"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>