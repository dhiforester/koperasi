<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi id_shu_session tidak boleh kosong
    if(empty($_POST['id_shu_session'])){
        echo '<small class="text-danger">ID Bagi Hasil Tidak Boleh Kosong!</small>';
    }else{
         //Validasi status tidak boleh kosong
        if(empty($_POST['status'])){
            echo '<small class="text-danger">Status Bagi Hasil Tidak Boleh Kosong!</small>';
        }else{
            //Validasi sesi_shu tidak boleh kosong
            if(empty($_POST['sesi_shu'])){
                echo '<small class="text-danger">Nama Sesi Tidak Boleh Kosong!</small>';
            }else{
                //Validasi periode_hitung1 tidak boleh kosong
                if(empty($_POST['periode_hitung1'])){
                    echo '<small class="text-danger">Periode Hitung Awal Tidak Boleh Kosong!</small>';
                }else{
                    //Validasi periode_hitung2 tidak boleh kosong
                    if(empty($_POST['periode_hitung2'])){
                        echo '<small class="text-danger">Periode Hitung Akhir Tidak Boleh Kosong!</small>';
                    }else{
                        //Validasi alokasi_nyata tidak boleh kosong
                        if(empty($_POST['alokasi_nyata'])){
                            echo '<small class="text-danger">Nilai Alokasi Bagi Hasil Tidak Boleh Kosong!</small>';
                        }else{
                            if(empty($_POST['persen_usaha'])){
                                $persen_usaha=0;
                            }else{
                                $persen_usaha=$_POST['persen_usaha'];
                            }
                            if(empty($_POST['persen_modal'])){
                                $persen_modal=0;
                            }else{
                                $persen_modal=$_POST['persen_modal'];
                            }
                            if(empty($_POST['persen_pinjaman'])){
                                $persen_pinjaman=0;
                            }else{
                                $persen_pinjaman=$_POST['persen_pinjaman'];
                            }
                            $id_shu_session=$_POST['id_shu_session'];
                            $sesi_shu=$_POST['sesi_shu'];
                            $periode_hitung1=$_POST['periode_hitung1'];
                            $periode_hitung2=$_POST['periode_hitung2'];
                            $alokasi_nyata=$_POST['alokasi_nyata'];
                            $status=$_POST['status'];
                            if(empty($_POST['HitungUlang'])){
                                $HitungUlang="No";
                            }else{
                                $HitungUlang=$_POST['HitungUlang'];
                            }
                            $alokasi_nyata= str_replace(".", "", $alokasi_nyata);
                            if(!preg_match("/^[0-9]*$/", $alokasi_nyata)){
                                echo '<small class="text-danger">Jumlah Alokasi Hanya Boleh Angka!</small>'; 
                            }else{
                                $JumlahKarakterNamaSessi=strlen($_POST['sesi_shu']);
                                if($JumlahKarakterNamaSessi>25){
                                    echo '<small class="text-danger">Nama Sesi Terlalu Panjang! (Maksimal 25 karakter)</small>';
                                }else{
                                    //Menghitung SIMPANAN TOTAL
                                    $SumTotalSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE tanggal<='$periode_hitung2' AND kategori!='Penarikan'"));
                                    $SimpananTotalBruto = $SumTotalSimpanan['jumlah'];
                                    //Hitung Total Penarikan Anggota TOTAL
                                    $SumTotalPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE tanggal<='$periode_hitung2' AND kategori='Penarikan'"));
                                    $JumlahTotalPenarikan = $SumTotalPenarikan['jumlah'];
                                    //Simpanan Netto TOTAL
                                    $SimpananTotalNetto=$SimpananTotalBruto-$JumlahTotalPenarikan;
                                    //Jumlah Jasa Modal Anggota TOTAL
                                    $SumJasaPinjamanAnggotaTotal= mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE tanggal>='$periode_hitung1' AND tanggal<='$periode_hitung2' AND kategori_angsuran='Jasa'"));
                                    if(!empty($SumJasaPinjamanAnggotaTotal['jumlah'])){
                                        $JumlahJasaPinjamanAnggotaTotal = $SumJasaPinjamanAnggotaTotal['jumlah'];
                                    }else{
                                        $JumlahJasaPinjamanAnggotaTotal =0;
                                    }
                                    //Jumlah Pembelanjaan Anggota TOTAL
                                    $SumBelanjaAnggotaTotal = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE tanggal>='$periode_hitung1' AND tanggal<='$periode_hitung2' AND kategori='Penjualan'"));
                                    if(!empty($SumBelanjaAnggotaTotal['tagihan'])){
                                        $JumlahBelanjaAnggotaTotal = $SumBelanjaAnggotaTotal['tagihan'];
                                    }else{
                                        $JumlahBelanjaAnggotaTotal =0;
                                    }
                                    if($HitungUlang=="Ya"){
                                        //Jumlah Anggota
                                        $JumlahAnggota = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                                        //Arraykan data anggota
                                        $JumlahAnggotaProses=0;
                                        $GetSimpananAnggota=0;
                                        $GetPinjamanAnggota=0;
                                        $GetPenjualanAnggota=0;
                                        $QryAnggota = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'");
                                        while ($DataAnggota = mysqli_fetch_array($QryAnggota)) {
                                            $id_shu_rincian= $DataAnggota['id_shu_rincian'];
                                            $id_anggota= $DataAnggota['id_anggota'];
                                            //Hitung Total Simpanan Anggota
                                            $SumSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE id_anggota='$id_anggota' AND tanggal<='$periode_hitung2' AND kategori!='Penarikan'"));
                                            $SimpananBruto = $SumSimpanan['jumlah'];
                                            //Hitung Total Penarikan Anggota
                                            $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE id_anggota='$id_anggota' AND tanggal<='$periode_hitung2' AND kategori='Penarikan'"));
                                            $JumlahPenarikan = $SumPenarikan['jumlah'];
                                            //Simpanan Netto
                                            $SimpananNetto=$SimpananBruto-$JumlahPenarikan;
                                            //Jasa Simpanan
                                            $JasaSimpananAnggota=($SimpananNetto/$SimpananTotalNetto)*($persen_modal/100)*$alokasi_nyata;
                                            //Jumlah Jasa Pinjaman Anggota
                                            $SumJasaPinjamanAnggota= mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_anggota='$id_anggota' AND tanggal>='$periode_hitung1' AND tanggal<='$periode_hitung2' AND kategori_angsuran='Jasa'"));
                                            if(!empty($SumJasaPinjamanAnggota['jumlah'])){
                                                $JumlahJasaPinjamanAnggota = $SumJasaPinjamanAnggota['jumlah'];
                                            }else{
                                                $JumlahJasaPinjamanAnggota =0;
                                            }
                                            $JasaPinjamanAnggota=($JumlahJasaPinjamanAnggota/$JumlahJasaPinjamanAnggotaTotal)*($persen_pinjaman/100)*$alokasi_nyata;
                                            //Jumlah Pembelanjaan
                                            $SumBelanjaAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE id_anggota='$id_anggota' AND tanggal>='$periode_hitung1' AND tanggal<='$periode_hitung2' AND kategori='Penjualan'"));
                                            if(!empty($SumBelanjaAnggota['tagihan'])){
                                                $JumlahBelanjaAnggota = $SumBelanjaAnggota['tagihan'];
                                            }else{
                                                $JumlahBelanjaAnggota =0;
                                            }
                                            $JasaPenjualanAnggota=($JumlahBelanjaAnggota/$JumlahBelanjaAnggotaTotal)*($persen_usaha/100)*$alokasi_nyata;
                                            //Hitung Jumlah SHU
                                            $shu=$JasaSimpananAnggota+$JasaPinjamanAnggota+$JasaPenjualanAnggota;
                                            $UpdateRincian = mysqli_query($Conn,"UPDATE shu_rincian SET 
                                                simpanan='$SimpananNetto',
                                                pinjaman='$JumlahJasaPinjamanAnggota',
                                                penjualan='$JumlahBelanjaAnggota',
                                                jasa_simpanan='$JasaSimpananAnggota',
                                                jasa_pinjaman='$JasaPinjamanAnggota',
                                                jasa_penjualan='$JasaPenjualanAnggota',
                                                shu='$shu'
                                            WHERE id_shu_rincian='$id_shu_rincian'") or die(mysqli_error($Conn)); 
                                            if($UpdateRincian){
                                                $JumlahAnggotaProses2=1;
                                                $GetSimpananAnggota=$GetSimpananAnggota+$JasaSimpananAnggota;
                                                $GetPinjamanAnggota=$GetPinjamanAnggota+$JasaPinjamanAnggota;
                                                $GetPenjualanAnggota=$GetPenjualanAnggota+$JasaPenjualanAnggota;
                                            }else{
                                                $JumlahAnggotaProses2=0;
                                                $GetSimpananAnggota=$GetSimpananAnggota+0;
                                                $GetPinjamanAnggota=$GetPinjamanAnggota+0;
                                                $GetPenjualanAnggota=$GetPenjualanAnggota+0;
                                            }
                                            $JumlahAnggotaProses=$JumlahAnggotaProses+$JumlahAnggotaProses2;
                                        }
                                        if($JumlahAnggotaProses==$JumlahAnggota){
                                            $UpdateSessi = mysqli_query($Conn,"UPDATE shu_session SET 
                                                sesi_shu='$sesi_shu',
                                                periode_hitung1='$periode_hitung1',
                                                periode_hitung2='$periode_hitung2',
                                                modal_anggota='$SimpananTotalNetto',
                                                penjualan='$JumlahBelanjaAnggotaTotal',
                                                pinjaman='$JumlahJasaPinjamanAnggotaTotal',
                                                jasa_modal_anggota='$GetSimpananAnggota',
                                                laba_penjualan='$GetPenjualanAnggota',
                                                jasa_pinjaman='$GetPinjamanAnggota',
                                                persen_usaha='$persen_usaha',
                                                persen_modal='$persen_modal',
                                                persen_pinjaman='$persen_pinjaman',
                                                alokasi_hitung='$alokasi_nyata',
                                                alokasi_nyata='$alokasi_nyata',
                                                status='$status'
                                            WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn)); 
                                            if($UpdateSessi){
                                                $KategoriLog="Bagi Hasil";
                                                $KeteranganLog="Update Sesi Bagi Hasil Berhasil";
                                                include "../../_Config/InputLog.php";
                                                $_SESSION ["NotifikasiSwal"]="Update Bagi Hasil Berhasil";
                                                echo '<small class="text-success" id="NotifikasiEditBagiHasilBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat memperbaharui data sesi</small>';
                                            }
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat memperbaharui data rincian sesi</small>';
                                        }
                                    }else{
                                        $UpdateSessi = mysqli_query($Conn,"UPDATE shu_session SET 
                                            sesi_shu='$sesi_shu',
                                            periode_hitung1='$periode_hitung1',
                                            periode_hitung2='$periode_hitung2',
                                            persen_usaha='$persen_usaha',
                                            persen_modal='$persen_modal',
                                            persen_pinjaman='$persen_pinjaman',
                                            alokasi_hitung='$alokasi_nyata',
                                            alokasi_nyata='$alokasi_nyata',
                                            status='$status'
                                        WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn)); 
                                        if($UpdateSessi){
                                            $KategoriLog="Bagi Hasil";
                                            $KeteranganLog="Update Sesi Bagi Hasil Berhasil";
                                            include "../../_Config/InputLog.php";
                                            $_SESSION ["NotifikasiSwal"]="Update Bagi Hasil Berhasil";
                                            echo '<small class="text-success" id="NotifikasiEditBagiHasilBerhasil">Success</small>';
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat memperbaharui data sesi</small>';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>