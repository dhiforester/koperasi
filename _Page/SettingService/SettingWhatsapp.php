<?php
    include "_Config/SettingWhatsapp.php";
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesSettingWhatsapp">
                <div class="card">
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">API Key WA Paralel</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="api_key" id="api_key" class="form-control" required value="<?php echo "$api_key_Whatsapp"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Add Client</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_add_client" id="url_add_client" class="form-control" required value="<?php echo "$url_add_client"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Status Client</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_status_client" id="url_status_client" class="form-control" required value="<?php echo "$url_status_client"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Status All Client</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_status_all_client" id="url_status_all_client" class="form-control" required value="<?php echo "$url_status_all_client"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Logout Client</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_logout_client" id="url_logout_client" class="form-control" required value="<?php echo "$url_logout_client"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Remove Client</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_remove_client" id="url_remove_client" class="form-control" required value="<?php echo "$url_remove_client"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Send Message</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_send_message" id="url_send_message" class="form-control" required value="<?php echo "$url_send_message"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Add Auto Reply</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_add_auto_reply" id="url_add_auto_reply" class="form-control" required value="<?php echo "$url_add_auto_reply"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL All List Auto Reply</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_all_auto_reply" id="url_all_auto_reply" class="form-control" required value="<?php echo "$url_all_auto_reply"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Detail Auto Reply</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_detail_auto_reply" id="url_detail_auto_reply" class="form-control" required value="<?php echo "$url_detail_auto_reply"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Hapus Auto Reply</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_hapus_auto_reply" id="url_hapus_auto_reply" class="form-control" required value="<?php echo "$url_hapus_auto_reply"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Edit Auto Reply</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_edit_auto_reply" id="url_edit_auto_reply" class="form-control" required value="<?php echo "$url_edit_auto_reply"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Count Chatbox</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_count_chatbox" id="url_count_chatbox" class="form-control" required value="<?php echo "$url_count_chatbox"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Chatbox Distinct</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_chatbox_distinct" id="url_chatbox_distinct" class="form-control" required value="<?php echo "$url_chatbox_distinct"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Chatbox You Me</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_chatbox_youme" id="url_chatbox_youme" class="form-control" required value="<?php echo "$url_chatbox_youme"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Chatbox Count You Me</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_chatbox_count_youme" id="url_chatbox_count_youme" class="form-control" required value="<?php echo "$url_chatbox_count_youme"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Chatbox Delete You Me</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_chatbox_delete_youme" id="url_chatbox_delete_youme" class="form-control" required value="<?php echo "$url_chatbox_delete_youme"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Tambah Akun Waparalel</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_tambah_akun_wa" id="url_tambah_akun_wa" class="form-control" required value="<?php echo "$url_tambah_akun_wa"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-3">
                                <label class="form-label">URL Hapus Akun Waparalel</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group input-group-outline">
                                    <input type="text" name="url_hapus_akun_wa" id="url_hapus_akun_wa" class="form-control" required value="<?php echo "$url_hapus_akun_wa"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9 text-right" id="NotifikasiSimpanSettingWhatsapp">
                                <small class="text-dark">Make sure the setting form is filled in correctly.</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="bi bi-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>