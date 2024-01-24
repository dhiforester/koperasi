<?php
    include "_Config/SettingPayment.php";
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesSettingPayment">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 pt-3">
                                <label class="form-label">Aktifkan Payment Gateway?</label>
                                <div class="input-group input-group-outline">
                                    <select name="aktif_payment_gateway" id="aktif_payment_gateway" class="form-control">
                                        <option <?php if($aktif_payment_gateway==""){echo "selected";} ?> value="">-Pilih-</option>
                                        <option <?php if($aktif_payment_gateway=="Ya"){echo "selected";} ?> value="Ya">Aktif</option>
                                        <option <?php if($aktif_payment_gateway=="Tidak"){echo "selected";} ?> value="Tidak">Tidak Aktif</option>
                                    </select>
                                </div>
                                <small class="text-dark">
                                    Apabila anda mengaktifkan pengaturan ini maka 
                                    pelanggan web akan bisa memilih pembayaran transfer bank/e-money
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label class="form-label">URL API Payment</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="api_payment_url" id="api_payment_url" class="form-control" required value="<?php echo "$api_payment_url"; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label class="form-label">ID Merchant</i></label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="id_marchant" id="id_marchant" class="form-control" required value="<?php echo "$id_marchant"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Client Key</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="client_key" id="client_key" class="form-control" required value="<?php echo "$client_key"; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Server Key</i></label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="server_key" id="server_key" class="form-control" required value="<?php echo "$server_key"; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Snap URL</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="snap_url" id="snap_url" class="form-control" required value="<?php echo "$snap_url"; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <label class="form-label">Is Production?</label>
                                <div class="input-group input-group-outline">
                                    <select name="production" id="production"  class="form-control">
                                        <option <?php if($production=="false"){echo "selected";} ?> value="false">Bukan</option>
                                        <option <?php if($production=="true"){echo "selected";} ?> value="true">Ya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12 text-right" id="NotifikasiSimpanSettingPayment">
                                <small class="text-dark">Make sure the setting form is filled in correctly.</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="bi bi-save"></i> Save
                        </button>
                        <button type="button" class="btn btn-md btn-info" data-bs-toggle="modal" data-bs-target="#ModalTestSnapToken">
                            Test Snap Token
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>