<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi'])){
        echo '0';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        $JumlahRincianTotal=0;
        $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
        while ($data = mysqli_fetch_array($query)) {
            $id_transaksi_rincian= $data['id_transaksi_rincian'];
            $id_barang= $data['id_barang'];
            $id_barang_harga= $data['id_barang_harga'];
            $id_barang_satuan= $data['id_barang_satuan'];
            $nama_barang= $data['nama_barang'];
            $harga= $data['harga'];
            $qty= $data['qty'];
            $jumlah= $data['jumlah'];
            $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
        }
        $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
        if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
            $ppn_rp=0;
        }else{
            $ppn_rp=$dataTransaksiPpn['ppn_rp'];
        }
        $JumlahTotalDanPpn=$JumlahRincianTotal+$ppn_rp;
        $JumlahRincianTotalRp="" . number_format($JumlahTotalDanPpn,0,',','.');
        echo "$JumlahRincianTotalRp";
    }
?>