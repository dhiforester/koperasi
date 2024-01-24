<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesBatas">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <h4>Form Tamplate Medrek</h4>
                            </div>
                            <div class="col-md-2 mb-3">
                                <a href="index.php?Page=SettingForm" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_form_medrek">Nama Form</label>
                                <input type="text" name="nama_form_medrek" id="nama_form_medrek" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="deskripsi_form_medrek">Keterangan Form</label>
                                <input type="text" name="deskripsi_form_medrek" id="deskripsi_form_medrek" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="form_medrek">Tamplate Form</label>
                                <textarea name="form_medrek" id="form_medrek" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="NotifikasiTambahSettingForm">
                                <span class="text-primary">Pastikan Tamplate Yang Anda Buat Sudah Sesuai</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary" id="ClickSimpanFormSetting">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>