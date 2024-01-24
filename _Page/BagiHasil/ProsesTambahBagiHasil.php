<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
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
                    $sesi_shu=$_POST['sesi_shu'];
                    $periode_hitung1=$_POST['periode_hitung1'];
                    $periode_hitung2=$_POST['periode_hitung2'];
                    $alokasi_nyata=$_POST['alokasi_nyata'];
                    $alokasi_nyata= str_replace(".", "", $alokasi_nyata);
                    if(!preg_match("/^[0-9]*$/", $alokasi_nyata)){
                        echo '<small class="text-danger">Jumlah Alokasi Hanya Boleh Angka!</small>'; 
                    }else{
                        $JumlahKarakterNamaSessi=strlen($_POST['sesi_shu']);
                        if($JumlahKarakterNamaSessi>25){
                            echo '<small class="text-danger">Nama Sesi Terlalu Panjang! (Maksimal 25 karakter)</small>';
                        }else{
                            $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session WHERE sesi_shu='$sesi_shu' AND periode_hitung1='$periode_hitung1' AND periode_hitung2='$periode_hitung2' AND persen_usaha='$persen_usaha' AND persen_modal='$persen_modal'"));
                            if(!empty($ValidasiDuplikat)){
                                echo '<small class="text-danger">Data Yang Anda Input Sudah Ada!</small>';
                            }else{
                                //Buat id_shu_session
                                $QrySesiShu=mysqli_query($Conn, "SELECT max(id_shu_session) as id_shu_session FROM shu_session")or die(mysqli_error($Conn));
                                while($HasilNilaiShu=mysqli_fetch_array($QrySesiShu)){
                                    $id_shu_session_max=$HasilNilaiShu['id_shu_session'];
                                }
                                $id_shu_session=$id_shu_session_max+1;
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
                                //Jumlah Anggota
                                $JumlahAnggota = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE status='Active'"));
                                //Arraykan data anggota
                                $JumlahAnggotaProses=0;
                                $GetSimpananAnggota=0;
                                $GetPinjamanAnggota=0;
                                $GetPenjualanAnggota=0;
                                $QryAnggota = mysqli_query($Conn, "SELECT*FROM anggota WHERE status='Active'");
                                while ($DataAnggota = mysqli_fetch_array($QryAnggota)) {
                                    $id_anggota= $DataAnggota['id_anggota'];
                                    $nama= $DataAnggota['nama'];
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
                                    //Validasi Duplikat
                                    $ValidasiDuplikatRincian=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session' AND id_anggota='$id_anggota'"));
                                    //Simpan Ke Data Rincian
                                    if(empty($ValidasiDuplikatRincian)){
                                        $EntryshuRincian="INSERT INTO shu_rincian (
                                            id_shu_session,
                                            id_anggota,
                                            nama_anggota,
                                            simpanan,
                                            pinjaman,
                                            penjualan,
                                            jasa_simpanan,
                                            jasa_pinjaman,
                                            jasa_penjualan,
                                            shu
                                        ) VALUES (
                                            '$id_shu_session',
                                            '$id_anggota',
                                            '$nama',
                                            '$SimpananNetto',
                                            '$JumlahJasaPinjamanAnggota',
                                            '$JumlahBelanjaAnggota',
                                            '$JasaSimpananAnggota',
                                            '$JasaPinjamanAnggota',
                                            '$JasaPenjualanAnggota',
                                            '$shu'
                                        )";
                                        $InputRincianShu=mysqli_query($Conn, $EntryshuRincian);
                                        if($InputRincianShu){
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
                                }
                                if($JumlahAnggotaProses==$JumlahAnggota){
                                    //Input Data Session
                                    $EntrySession="INSERT INTO shu_session (
                                        id_shu_session,
                                        sesi_shu,
                                        periode_hitung1,
                                        periode_hitung2,
                                        modal_anggota,
                                        penjualan,
                                        pinjaman,
                                        jasa_modal_anggota,
                                        laba_penjualan,
                                        jasa_pinjaman,
                                        persen_usaha,
                                        persen_modal,
                                        persen_pinjaman,
                                        alokasi_hitung,
                                        alokasi_nyata,
                                        status
                                    ) VALUES (
                                        '$id_shu_session',
                                        '$sesi_shu',
                                        '$periode_hitung1',
                                        '$periode_hitung2',
                                        '$SimpananTotalNetto',
                                        '$JumlahBelanjaAnggotaTotal',
                                        '$JumlahJasaPinjamanAnggotaTotal',
                                        '$GetSimpananAnggota',
                                        '$GetPenjualanAnggota',
                                        '$GetPinjamanAnggota',
                                        '$persen_usaha',
                                        '$persen_modal',
                                        '$persen_pinjaman',
                                        '$alokasi_nyata',
                                        '$alokasi_nyata',
                                        'Pending'
                                    )";
                                    $InputSession=mysqli_query($Conn, $EntrySession);
                                    if($InputSession){
                                        $KategoriLog="Bagi Hasil";
                                        $KeteranganLog="Tambah Sesi Bagi Hasil Berhasil";
                                        include "../../_Config/InputLog.php";
                                        $_SESSION ["NotifikasiSwal"]="Tambah Bagi Hasil Berhasil";
                                        echo '<input type="hidden" name="UrlBack" id="UrlBack" value="index.php?Page=BagiHasil&Sub=DetailBagiHasil&id='.$id_shu_session .'">';
                                        echo '<small class="text-success" id="NotifikasiTambahBagiHasilBerhasil">Success</small>';
                                    }else{
                                        //Hapus data sessi dan rincian
                                        $HapusSessi = mysqli_query($Conn, "DELETE FROM shu_session WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn));
                                        $HapusSessiRincian = mysqli_query($Conn, "DELETE FROM shu_rincian WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn));
                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data sesi</small>';
                                    }
                                }else{
                                    //Hapus data rincian
                                    $HapusSessiRincian = mysqli_query($Conn, "DELETE FROM shu_rincian WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn));
                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data rincian sesi</small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>