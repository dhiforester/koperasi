<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_shu_rincian'])){
        echo '<span class="text-danger">ID Rincian Tidak Boleh Kosong</span>';
    }else{
        $id_shu_rincian=$_POST['id_shu_rincian'];
        //Buka Detail Rincian
        $QryDetail = mysqli_query($Conn,"SELECT * FROM shu_rincian WHERE id_shu_rincian='$id_shu_rincian'")or die(mysqli_error($Conn));
        $DataDetail = mysqli_fetch_array($QryDetail);
        $id_shu_session= $DataDetail['id_shu_session'];
        //Proses hapus Jurnal
        $HapusRincian= mysqli_query($Conn, "DELETE FROM shu_rincian WHERE id_shu_rincian='$id_shu_rincian'") or die(mysqli_error($Conn));
        if($HapusRincian) {
            //Menghitung Simpanan rincian
            $SumSimpananAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(simpanan) AS simpanan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
            $JumlahSimpananAnggota = $SumSimpananAnggota['simpanan'];
            //Hitung Jasa simpanan
            $SumJasaSimpananAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_simpanan) AS jasa_simpanan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
            $JumlahJasaSimpanan = $SumJasaSimpananAnggota['jasa_simpanan'];
            //Menghitung Pinjaman rincian
            $SumPinjamanAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(pinjaman) AS pinjaman FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
            $JumlahPinjamanAnggota = $SumPinjamanAnggota['pinjaman'];
            //Hitung Jasa Pinjaman
            $SumJasaPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_pinjaman) AS jasa_pinjaman FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
            $JumlahJasaPinjaman = $SumJasaPinjaman['jasa_pinjaman'];
            //Menghitung Penjualan
            $SumPenjualanAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(penjualan) AS penjualan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
            $JumlahPenjualanAnggota = $SumPenjualanAnggota['penjualan'];
            //Hitung Jasa Penjualan
            $SumJasaPenjualan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_penjualan) AS jasa_penjualan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
            $JumlahJasaPenjualan = $SumJasaPenjualan['jasa_penjualan'];
            //Update Ke Sessi
            $UpdateBagiHasil = mysqli_query($Conn,"UPDATE shu_session SET 
                modal_anggota='$JumlahSimpananAnggota',
                penjualan='$JumlahPenjualanAnggota',
                pinjaman='$JumlahPinjamanAnggota',
                jasa_modal_anggota='$JumlahJasaSimpanan',
                laba_penjualan='$JumlahJasaPenjualan',
                jasa_pinjaman='$JumlahJasaPinjaman'
            WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn)); 
            if($UpdateBagiHasil){
                echo '<span class="text-success" id="NotifikasiHapusRincianBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada proses update sesi bagi hasil</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Expired Date Gagal</span>';
        }
    }
?>