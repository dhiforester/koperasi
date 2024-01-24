<?php
    //Simpan jurnal pembelian (D)
    //Buka kode perkiraan
    $Qry = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$trans_account1'")or die(mysqli_error($Conn));
    $Data = mysqli_fetch_array($Qry);
    $kode = $Data['kode'];
    $nama = $Data['nama'];
    $d_k="Debet";
    $EntryData1="INSERT INTO jurnal (
        id_transaksi,
        id_perkiraan,
        tanggal,
        kode_perkiraan,
        nama_perkiraan,
        d_k,
        nilai
    ) VALUES (
        '$id_transaksi',
        '$trans_account1',
        '$tanggal',
        '$kode',
        '$nama',
        '$d_k',
        '$JumlahTagihan'
    )";
    $InputData1=mysqli_query($Conn, $EntryData1);
    if($InputData1){
        //Simpan jurnal kas (K)
        //Buka kode perkiraan
        $Qry = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$cash_account1'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        $kode = $Data['kode'];
        $nama = $Data['nama'];
        $d_k="Kredit";
        $EntryData2="INSERT INTO jurnal (
            id_transaksi,
            id_perkiraan,
            tanggal,
            kode_perkiraan,
            nama_perkiraan,
            d_k,
            nilai
        ) VALUES (
            '$id_transaksi',
            '$cash_account1',
            '$tanggal',
            '$kode',
            '$nama',
            '$d_k',
            '$JumlahTagihan'
        )";
        $InputData2=mysqli_query($Conn, $EntryData2);
        if($InputData2){
            $ValidasiAutoJurnal="Valid";
        }else{
            $ValidasiAutoJurnal="Terjadi kesalahan pada saat menyimpan data jurnal kas";
        }
    }else{
        $ValidasiAutoJurnal="Terjadi kesalahan pada saat menyimpan data jurnal pembelian";
    }
?>