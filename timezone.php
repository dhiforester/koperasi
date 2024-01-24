<?php
    //Time zone
    date_default_timezone_set('UTC');
    //Waktu sekarang
    $now=date('d F Y H:i:s');
    echo "Sekarang adalah tanggal $now (UTC)<br>";
    //Jadikan strtotime
    $now_str=strtotime($now);
    echo "STRTOTIME: $now_str <br>";
    echo "Sedangkan berdasarkan lokal<br>";
    date_default_timezone_set('Asia/Jakarta');
    //Ubah STRTOTIME to DATETIME
    $now_datetime_lokal=date('d F Y H:i:s',$now_str);
    $now_str_lokal=strtotime($now_datetime_lokal);
    echo "Sekarang adalah tanggal $now_datetime_lokal (Jakarta)<br>";
    echo "STRTOTIME: $now_str_lokal (Jakarta)<br>";
?>