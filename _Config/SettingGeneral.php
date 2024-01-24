<?php
    $QrySettingGeneral = mysqli_query($Conn,"SELECT * FROM setting_general WHERE id_setting_general='1'")or die(mysqli_error($Conn));
    $DataSettingGeneral = mysqli_fetch_array($QrySettingGeneral);
    $id_setting_general= $DataSettingGeneral['id_setting_general'];
    $title_page= $DataSettingGeneral['title_page'];
    $kata_kunci= $DataSettingGeneral['kata_kunci'];
    $deskripsi= $DataSettingGeneral['deskripsi'];
    $alamat_bisnis= $DataSettingGeneral['alamat_bisnis'];
    $email_bisnis= $DataSettingGeneral['email_bisnis'];
    $telepon_bisnis= $DataSettingGeneral['telepon_bisnis'];
    $favicon= $DataSettingGeneral['favicon'];
    $logo= $DataSettingGeneral['logo'];
    $base_url= $DataSettingGeneral['base_url'];
?>