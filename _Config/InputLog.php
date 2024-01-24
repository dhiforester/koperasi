<?php
    //Zona Waktu
    date_default_timezone_set("Asia/Jakarta");
    $LogTime=date('Y-m-d H:i:s');
    $EntryLog="INSERT INTO log (
        id_akses,
        datetime_log,
        kategori_log,
        deskripsi_log
    ) VALUES (
        '$SessionIdAkses',
        '$LogTime',
        '$KategoriLog',
        '$KeteranganLog'
    )";
    $InputLog=mysqli_query($Conn, $EntryLog);
?>