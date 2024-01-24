<?php
    include "_Config/SettingEmail.php";
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesSettingEmail">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label class="form-label">URL Service</i></label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_service" id="url_service" class="form-control" required value="<?php echo "$url_service"; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label class="form-label">URL Provider SMTP</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_provider" id="url_provider" class="form-control" required value="<?php echo "$url_provider"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Email Account</label>
                                <div class="input-group input-group-outline">
                                    <input type="email" name="email_gateway" id="email_gateway" class="form-control" required value="<?php echo "$email_gateway"; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Password Email</i></label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="password_gateway" id="password_gateway" class="form-control" required value="<?php echo "$password_gateway"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Name of the sender (Shipper's Label)</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" required value="<?php echo "$nama_pengirim"; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Port SMTP</i></label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="port_gateway" id="port_gateway" class="form-control" required value="<?php echo "$port_gateway"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Implement email validation</label>
                                <div class="input-group input-group-outline">
                                    <select name="validasi_email" id="validasi_email" class="form-control">
                                        <option <?php if($validasi_email=="Yes"){echo "selected";} ?> value="Yes">Yes</option>
                                        <option <?php if($validasi_email=="No"){echo "selected";} ?> value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Redirect URL after email validation</i></label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="redirect_validasi" id="redirect_validasi" class="form-control" value="<?php echo "$redirect_validasi"; ?>">
                                </div>
                                <small class="credit">Service will send parameter (?Code=200 or ?Code=201)</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 pt-3">
                                <label class="form-label">Messages Sent With Validation URL</label>
                                <textarea name="pesan_validasi_email" id="pesan_validasi_email" class="form-control" cols="30" rows="3"><?php echo "$pesan_validasi_email"; ?></textarea>
                            </div>
                            <small class="credit">Message Body + Validation URL</small>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 text-right" id="NotifikasiSimpanSettingEmail">
                                <small class="text-dark">Make sure the setting form is filled in correctly.</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="bi bi-save"></i> Save
                        </button>
                        <button type="button" class="btn btn-md btn-info" data-bs-toggle="modal" data-bs-target="#ModalTestSendEmail">
                            <i class="bi bi-send"></i> Test Send Email
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>