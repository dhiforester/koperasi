<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="alert alert-info" role="alert">
                <b>Keterangan :</b> 
                Silahkan pilih salah satu data mitra sesuai masing-masing kategori <i>Tamplate</i>.
            </div> -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesMemulaiCron">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <small><b>URL : </b>_Page/CronJob/CronJob.php</small>
                            </div>
                            <div class="col-md-4 mt-3">
                                <small>
                                    <b>Status :</b> 
                                    <span id="StatusProses">
                                        <i class="text-success">Ready..</i>
                                    </span>
                                </small>
                            </div>
                            <div class="col-md-2 mt-3" id="TombolStart">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    Start <i class="bi bi-play"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="MenampilkanProses">
                            <div class="alert alert-primary" role="alert">
                                Belum ada proses yang dimulai
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>