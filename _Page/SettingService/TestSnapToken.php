<?php
    //koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingPayment.php";
?>
<form action="javascript:void(0);" id="ProsesTestSnapToken">
    <div class="row">
        <div class="col-md-6 pt-3">
            <label class="form-label">Server Key</label>
            <div class="input-group input-group-outline">
                <input type="text" name="ServerKey" id="ServerKey" class="form-control" required value="<?php echo "$server_key"; ?>">
            </div>
        </div>
        <div class="col-md-6 pt-3">
            <label class="form-label">Is Production?</i></label>
            <div class="input-group input-group-outline">
                <input type="text" name="production" id="production" class="form-control" required value="<?php echo "$production"; ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pt-3">
            <label class="form-label">Order ID</label>
            <div class="input-group input-group-outline">
                <input type="text" name="order_id" id="order_id" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 pt-3">
            <label class="form-label">Jumlah Tagihan</i></label>
            <div class="input-group input-group-outline">
                <input type="text" name="gross_amount" id="gross_amount" class="form-control" required value="100000">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pt-3">
            <label class="form-label">First Name</label>
            <div class="input-group input-group-outline">
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 pt-3">
            <label class="form-label">Last Name</i></label>
            <div class="input-group input-group-outline">
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 pt-3">
            <label class="form-label">Email</label>
            <div class="input-group input-group-outline">
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6 pt-3">
            <label class="form-label">No.HP</i></label>
            <div class="input-group input-group-outline">
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pt-3">
            <label class="form-label">Snap Token</label>
            <div class="input-group input-group-outline">
                <input type="text" name="snap_token" id="snap_token" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pt-3 text-info" id="NotifikasiSnapToken">
            Make sure the settings you use are correct.
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pt-3">
            <button type="submit" class="btn btn-md btn-info">
                Run
            </button>
            <button type="button" class="btn btn-md btn-info" id="GenerateSnapButton">
                Snap Button
            </button>
            <button type="reset" class="btn btn-md btn-warning">
                Reset
            </button>
        </div>
    </div>
</form>