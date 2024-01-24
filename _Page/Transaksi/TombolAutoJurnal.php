<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Cek apakah ada data Auto Jurnal
    $AutoJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM setting_autojurnal WHERE id_akses='$SessionIdAkses'"));
?>
<a href="javascript:void(0);" class="btn btn-md btn-info btn-rounded btn-block position-relative" data-bs-toggle="modal" data-bs-target="#ModalSettingAutoJurnal">
    <i class="bi bi-gear"></i> Auto Jurnal
    <?php if(empty($AutoJurnal)){ ?>
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
        </span>
    <?php }else{ ?>
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
        </span>
    <?php } ?>
</a>