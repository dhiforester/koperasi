<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    $updatetime=date('Y-m-d H:i:s');
    //Inisiasi Variable
    if(!empty($_POST['id_transaksi'])){
        $id_transaksi=$_POST['id_transaksi'];
    }else{
        $id_transaksi=0;
    }
    if(!empty($_POST['id_akses'])){
        $id_akses=$_POST['id_akses'];
    }else{
        $id_akses=0;
    }
    if(!empty($_POST['subtotal'])){
        $subtotal=$_POST['subtotal'];
    }else{
        $subtotal=0;
    }
    if(!empty($_POST['ppn_persen'])){
        $ppn_persen=$_POST['ppn_persen'];
    }else{
        $ppn_persen=0;
    }
    if(!empty($_POST['ppn_rp'])){
        $ppn_rp=$_POST['ppn_rp'];
    }else{
        $ppn_rp=0;
    }
    if(!empty($_POST['SettingPpn'])){
        $SettingPpn=$_POST['SettingPpn'];
    }else{
        $SettingPpn="No";
    }
    $subtotal= str_replace(".", "", $subtotal);
    $ppn_rp= str_replace(".", "", $ppn_rp);
    $ppn_persen= str_replace(".", "", $ppn_persen);
    if(empty($_POST['id_transaksi'])){
        //cek sudah ada atau belum
        $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
        if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
            //Simpan data
            $EntryData="INSERT INTO transaksi_ppn (
                id_transaksi,
                id_akses,
                ppn_persen,
                ppn_rp
            ) VALUES (
                '$id_transaksi',
                '$SessionIdAkses',
                '$ppn_persen',
                '$ppn_rp'
            )";
            $InputData=mysqli_query($Conn, $EntryData);
            if($InputData){
                //Cek apakah sudah ada settingan
                $QrySettingPpn = mysqli_query($Conn,"SELECT * FROM transaksi_setting WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
                $DataSettingPpn = mysqli_fetch_array($QrySettingPpn);
                if(empty($DataSettingPpn['id_transaksi_setting'])){
                    $EntryData="INSERT INTO id_transaksi_setting (
                        id_akses,
                        ppn,
                        ppn_set_persen
                    ) VALUES (
                        '$SessionIdAkses',
                        '$SettingPpn',
                        '$ppn_persen'
                    )";
                    $InputData=mysqli_query($Conn, $EntryData);
                    if($InputData){
                        echo '<small class="text-success" id="NotifikasiTambahPpnBerhasil">Success</small>';
                    }else{
                        echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data setting PPN!</span>';
                    }
                }else{
                    $Update = mysqli_query($Conn,"UPDATE transaksi_setting SET 
                        ppn='$SettingPpn',
                        ppn_set_persen='$ppn_persen'
                    WHERE id_akses='$SessionIdAkses'") or die(mysqli_error($Conn)); 
                    if($Update){
                        echo '<small class="text-success" id="NotifikasiTambahPpnBerhasil">Success</small>';
                    }else{
                        echo '<span class="text-danger">Terjadi kesalahan pada saat update data setting PPN!</span>';
                    }
                }
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data!</span>';
            }
        }else{
            $id_transaksi=$_POST['id_transaksi'];
            $Update = mysqli_query($Conn,"UPDATE transaksi_ppn SET 
                ppn_persen='$ppn_persen',
                ppn_rp='$ppn_rp'
            WHERE id_transaksi='$id_transaksi' AND id_akses='$SessionIdAkses'") or die(mysqli_error($Conn)); 
            if($Update){
                //Cek apakah sudah ada settingan
                $QrySettingPpn = mysqli_query($Conn,"SELECT * FROM transaksi_setting WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
                $DataSettingPpn = mysqli_fetch_array($QrySettingPpn);
                if(empty($DataSettingPpn['id_transaksi_setting'])){
                    $EntryData="INSERT INTO transaksi_setting (
                        id_akses,
                        ppn,
                        ppn_set_persen
                    ) VALUES (
                        '$SessionIdAkses',
                        '$SettingPpn',
                        '$ppn_persen'
                    )";
                    $InputData=mysqli_query($Conn, $EntryData);
                    if($InputData){
                        echo '<small class="text-success" id="NotifikasiTambahPpnBerhasil">Success</small>';
                    }else{
                        echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data setting PPN!</span>';
                    }
                }else{
                    $Update = mysqli_query($Conn,"UPDATE transaksi_setting SET 
                        ppn='$SettingPpn',
                        ppn_set_persen='$ppn_persen'
                    WHERE id_akses='$SessionIdAkses'") or die(mysqli_error($Conn)); 
                    if($Update){
                        echo '<small class="text-success" id="NotifikasiTambahPpnBerhasil">Success</small>';
                    }else{
                        echo '<span class="text-danger">Terjadi kesalahan pada saat update data setting PPN!</span>';
                    }
                }
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat update data!</span>';
            }
        }
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //cek sudah ada atau belum
        $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
        if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
            $EntryData="INSERT INTO transaksi_ppn (
                id_transaksi,
                id_akses,
                ppn_persen,
                ppn_rp
            ) VALUES (
                '$id_transaksi',
                '$SessionIdAkses',
                '$ppn_persen',
                '$ppn_rp'
            )";
            $InputData=mysqli_query($Conn, $EntryData);
            if($InputData){
                //Hitung rincian transaksi
                $JumlahRincianTotal=0;
                $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
                while ($data = mysqli_fetch_array($query)) {
                    $jumlah= $data['jumlah'];
                    $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                }
                $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
                if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
                    $ppn_persen=0;
                }else{
                    $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                }
                $ppn_rp=$JumlahRincianTotal*($ppn_persen/100);
                $JumlahRincianTotal=$ppn_rp+$JumlahRincianTotal;
                //Melakukan update transaksi
                $Update2 = mysqli_query($Conn,"UPDATE transaksi SET 
                    tagihan='$JumlahRincianTotal'
                WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                if($Update2){
                    echo '<small class="text-success" id="NotifikasiTambahPpnBerhasil">Success</small>';
                }else{
                    echo '<span class="text-danger">Terjadi kesalahan pada saat update data Transaksi!</span>';
                }
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data setting PPN!</span>';
            }
        }else{
            $id_transaksi_ppn=$dataTransaksiPpn['id_transaksi_ppn'];
            $Update = mysqli_query($Conn,"UPDATE transaksi_ppn SET 
                ppn_persen='$ppn_persen',
                ppn_rp='$ppn_rp'
            WHERE id_transaksi_ppn='$id_transaksi_ppn'") or die(mysqli_error($Conn)); 
            if($Update){
                //Hitung rincian transaksi
                $JumlahRincianTotal=0;
                $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
                while ($data = mysqli_fetch_array($query)) {
                    $jumlah= $data['jumlah'];
                    $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                }
                $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
                if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
                    $ppn_persen=0;
                }else{
                    $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                }
                $ppn_rp=$JumlahRincianTotal*($ppn_persen/100);
                $JumlahRincianTotal=$ppn_rp+$JumlahRincianTotal;
                //Melakukan update transaksi
                $Update2 = mysqli_query($Conn,"UPDATE transaksi SET 
                    tagihan='$JumlahRincianTotal'
                WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                if($Update2){
                    echo '<small class="text-success" id="NotifikasiTambahPpnBerhasil">Success</small>';
                }else{
                    echo '<span class="text-danger">Terjadi kesalahan pada saat update data Transaksi!</span>';
                }
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat update data setting PPN!</span>';
            }
        }
    }
    
?>