<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatasAktivitasEmail">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <select name="BatasAktivitasEmail" id="BatasAktivitasEmail" class="form-control">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-6 mt-3">
                                <input type="text" name="KeywordAktivitasEmail" id="KeywordAktivitasEmail" class="form-control">
                                <small>Pencarian</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalFilterAktivitasEmail">
                                    <i class="bi bi-funnel"></i> Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelAktivitasEmail">

                </div>
            </div>
        </div>
    </div>
</section>