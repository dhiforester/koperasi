<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi_rincian'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi_rincian=$_POST['id_transaksi_rincian'];
        $HapusRincian = mysqli_query($Conn, "DELETE FROM transaksi_rincian WHERE id_transaksi_rincian='$id_transaksi_rincian'") or die(mysqli_error($Conn));
        if($HapusRincian){
            //Mode edit transaksi
            if(!empty($_POST['GetIdTransaksi'])){
                $id_transaksi=$_POST['GetIdTransaksi'];
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
                    $ppn_rp=0;
                    $ValidasiPpn="Valid";
                }else{
                    $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                    $ppn_rp_lama=$dataTransaksiPpn['ppn_rp'];
                    //Menghitung PPN RP baru
                    $ppn_rp=$JumlahRincianTotal*($ppn_persen/100);
                    //Melakukan update ke transaksi_ppn
                    $UpdatePpn = mysqli_query($Conn,"UPDATE transaksi_ppn SET 
                        ppn_rp='$ppn_rp'
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                    if($UpdatePpn){
                        $ValidasiPpn="Valid";
                    }else{
                        $ValidasiPpn="Terjadi kesalahan pada saat update PPN";
                    }
                }
                $JumlahTotalDanPpn=$JumlahRincianTotal+$ppn_rp;
                if($ValidasiPpn=="Valid"){
                    //Melakukan update transaksi
                    $Update = mysqli_query($Conn,"UPDATE transaksi SET 
                        tagihan='$JumlahTotalDanPpn'
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                    if($Update){
                        $_SESSION ["NotifikasiSwal"]="Hapus Rincian Berhasil";
                        echo '<span class="text-success" id="NotifikasiHapusRincianBerhasil">Success</span>';
                    }else{
                        echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data Transaksi</span>';
                    }
                }else{
                    echo '<span class="text-danger">'.$ValidasiPpn.'</span>';
                }
            }else{
                $id_transaksi=0;
                $JumlahRincianTotal=0;
                $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'");
                while ($data = mysqli_fetch_array($query)) {
                    $jumlah= $data['jumlah'];
                    $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                }
                $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
                if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
                    $ppn_persen=0;
                }else{
                    $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                }
                $ppn_rp=$JumlahRincianTotal*($ppn_persen/100);
                //Melakukan update transaksi
                $Update = mysqli_query($Conn,"UPDATE transaksi_ppn SET 
                    ppn_rp='$ppn_rp'
                WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                if($Update){
                    $_SESSION ["NotifikasiSwal"]="Hapus Rincian Berhasil";
                    echo '<span class="text-success" id="NotifikasiHapusRincianBerhasil">Success</span>';
                }else{
                    echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data Transaksi</span>';
                }
            }
        }else{
            echo '<span class="text-danger">Hapus Rincian Transaksi Gagal</span>';
        }
    }
?>