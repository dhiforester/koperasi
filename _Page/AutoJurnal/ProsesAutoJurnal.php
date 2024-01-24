<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Validasi debet_id_simpanan tidak boleh kosong
    if(empty($_POST['debet_id_simpanan'])){
        echo '<small class="text-danger">Debet Simpanan Tidak Boleh Kosong</small>';
    }else{
        //Validasi kredit_id_simpanan tidak boleh kosong
        if(empty($_POST['kredit_id_simpanan'])){
            echo '<small class="text-danger">Kredit Simpanan Tidak Boleh Kosong</small>';
        }else{
            //Validasi debet_id_penarikan tidak boleh kosong
            if(empty($_POST['debet_id_penarikan'])){
                echo '<small class="text-danger">Debet Penarikan Tidak Boleh Kosong</small>';
            }else{
                //Validasi kredit_id_penarikan tidak boleh kosong
                if(empty($_POST['kredit_id_penarikan'])){
                    echo '<small class="text-danger">Kredit Penarikan Tidak Boleh Kosong</small>';
                }else{
                    //Validasi debet_id_pinjaman tidak boleh kosong
                    if(empty($_POST['debet_id_pinjaman'])){
                        echo '<small class="text-danger">Debet Pinjaman Tidak Boleh Kosong</small>';
                    }else{
                        //Validasi kredit_id_pinjaman tidak boleh kosong
                        if(empty($_POST['kredit_id_pinjaman'])){
                            echo '<small class="text-danger">Kredit Pinjaman Tidak Boleh Kosong</small>';
                        }else{
                            //Validasi debet_id_angsuran tidak boleh kosong
                            if(empty($_POST['debet_id_angsuran'])){
                                echo '<small class="text-danger">Debet Angsuran Tidak Boleh Kosong</small>';
                            }else{
                                //Validasi kredit_id_angsuran tidak boleh kosong
                                if(empty($_POST['kredit_id_angsuran'])){
                                    echo '<small class="text-danger">Kredit Angsuran Tidak Boleh Kosong</small>';
                                }else{
                                    //Buat Variabel
                                    $debet_id_simpanan=$_POST['debet_id_simpanan'];
                                    $kredit_id_simpanan=$_POST['kredit_id_simpanan'];
                                    $debet_id_penarikan=$_POST['debet_id_penarikan'];
                                    $kredit_id_penarikan=$_POST['kredit_id_penarikan'];
                                    $debet_id_pinjaman=$_POST['debet_id_pinjaman'];
                                    $kredit_id_pinjaman=$_POST['kredit_id_pinjaman'];
                                    $debet_id_angsuran=$_POST['debet_id_angsuran'];
                                    $kredit_id_angsuran=$_POST['kredit_id_angsuran'];
                                    //Apakah data Auto Jurnal Simpanan Ada
                                    $ValidasiSimpanan=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM auto_jurnal WHERE kategori_transaksi='Simpanan'"));
                                    $ValidasiPenarikan=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM auto_jurnal WHERE kategori_transaksi='Penarikan'"));
                                    $ValidasiPinjaman=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM auto_jurnal WHERE kategori_transaksi='Pinjaman'"));
                                    $ValidasiAngsuran=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM auto_jurnal WHERE kategori_transaksi='Angsuran'"));
                                    //Buka Data Akun Simpanan Debet
                                    $QrySimpanan1 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$debet_id_simpanan'")or die(mysqli_error($Conn));
                                    $DataSimpanan1 = mysqli_fetch_array($QrySimpanan1);
                                    if(empty($DataSimpanan1['nama'])){
                                        $AkunSimpanan1 ="";
                                    }else{
                                        $AkunSimpanan1 = $DataSimpanan1['nama'];
                                    }
                                    //Buka Data Akun Simpanan Kredit
                                    $QrySimpanan2 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$kredit_id_simpanan'")or die(mysqli_error($Conn));
                                    $DataSimpanan2 = mysqli_fetch_array($QrySimpanan2);
                                    $AkunSimpanan2 = $DataSimpanan2['nama'];
                                    //Buka Data Akun Penariakan Debet
                                    $QryPenarikan1 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$debet_id_penarikan'")or die(mysqli_error($Conn));
                                    $DataPenarikan1 = mysqli_fetch_array($QryPenarikan1);
                                    $AkunPenarikan1= $DataPenarikan1['nama'];
                                    //Buka Data Akun Penariakan Kredit
                                    $QryPenarikan2 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$kredit_id_penarikan'")or die(mysqli_error($Conn));
                                    $DataPenarikan2 = mysqli_fetch_array($QryPenarikan2);
                                    $AkunPenarikan2= $DataPenarikan2['nama'];
                                    //Buka Data Akun Pinjaman Debet
                                    $QryPinjaman1 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$debet_id_pinjaman'")or die(mysqli_error($Conn));
                                    $DataPinjaman1 = mysqli_fetch_array($QryPinjaman1);
                                    $AkunPinjaman1= $DataPinjaman1['nama'];
                                    //Buka Data Akun Pinjaman Kredit
                                    $QryPinjaman2 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$kredit_id_pinjaman'")or die(mysqli_error($Conn));
                                    $DataPinjaman2 = mysqli_fetch_array($QryPinjaman2);
                                    $AkunPinjaman2= $DataPinjaman2['nama'];
                                    //Buka Data Akun Angsuran Debet
                                    $QryAngsuran1 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$debet_id_angsuran'")or die(mysqli_error($Conn));
                                    $DataAngsuran1 = mysqli_fetch_array($QryAngsuran1);
                                    $AkunAngsuran1= $DataAngsuran1['nama'];
                                    //Buka Data Akun Angsuran Kredit
                                    $QryAngsuran2 = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$kredit_id_angsuran'")or die(mysqli_error($Conn));
                                    $DataAngsuran2 = mysqli_fetch_array($QryAngsuran2);
                                    $AkunAngsuran2= $DataAngsuran2['nama'];
                                    if(empty($ValidasiSimpanan)){
                                        $EntruAutoJurnalSimpanan="INSERT INTO auto_jurnal (
                                            kategori_transaksi,
                                            debet_id,
                                            debet_name,
                                            kredit_id,
                                            kredit_name
                                        ) VALUES (
                                            'Simpanan',
                                            '$debet_id_simpanan',
                                            '$AkunSimpanan1',
                                            '$kredit_id_simpanan',
                                            '$AkunSimpanan2'
                                        )";
                                        $InputSimpanan=mysqli_query($Conn, $EntruAutoJurnalSimpanan);
                                        if($InputSimpanan){
                                            $EntruAutoJurnalPenarikan="INSERT INTO auto_jurnal (
                                                kategori_transaksi,
                                                debet_id,
                                                debet_name,
                                                kredit_id,
                                                kredit_name
                                            ) VALUES (
                                                'Penarikan',
                                                '$debet_id_penarikan',
                                                '$AkunPenarikan1',
                                                '$kredit_id_penarikan',
                                                '$AkunPenarikan2'
                                            )";
                                            $InputPenarikan=mysqli_query($Conn, $EntruAutoJurnalPenarikan);
                                            if($InputPenarikan){
                                                $EntruAutoJurnalPinjaman="INSERT INTO auto_jurnal (
                                                    kategori_transaksi,
                                                    debet_id,
                                                    debet_name,
                                                    kredit_id,
                                                    kredit_name
                                                ) VALUES (
                                                    'Pinjaman',
                                                    '$debet_id_pinjaman',
                                                    '$AkunPinjaman1',
                                                    '$kredit_id_pinjaman',
                                                    '$AkunPinjaman2'
                                                )";
                                                $InputPinjaman=mysqli_query($Conn, $EntruAutoJurnalPinjaman);
                                                if($InputPinjaman){
                                                    $EntruAutoJurnalAngsuran="INSERT INTO auto_jurnal (
                                                        kategori_transaksi,
                                                        debet_id,
                                                        debet_name,
                                                        kredit_id,
                                                        kredit_name
                                                    ) VALUES (
                                                        'Angsuran',
                                                        '$debet_id_angsuran',
                                                        '$AkunAngsuran1',
                                                        '$kredit_id_angsuran',
                                                        '$AkunAngsuran2'
                                                    )";
                                                    $InputAngsuran=mysqli_query($Conn, $EntruAutoJurnalAngsuran);
                                                    if($InputPinjaman){
                                                        $KategoriLog="Auto Jurnal";
                                                        $KeteranganLog="Tambah Auto Jurnal";
                                                        include "../../_Config/InputLog.php";
                                                        $_SESSION ["NotifikasiSwal"]="Tambah Auto Jurnal Berhasil";
                                                        echo '<small class="text-success" id="NotifikasiSimpanAutoJurnalBerhasil">Success</small>';
                                                    }else{
                                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal angsuran</small>';
                                                    }
                                                }else{
                                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal pinjaman</small>';
                                                }
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal penarikan</small>';
                                            }
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal simpanan</small>';
                                        }
                                    }else{
                                        $UpdateSimpanan = mysqli_query($Conn,"UPDATE auto_jurnal SET 
                                            debet_id='$debet_id_simpanan',
                                            debet_name='$AkunSimpanan1',
                                            kredit_id='$kredit_id_simpanan',
                                            kredit_name='$AkunSimpanan2'
                                        WHERE kategori_transaksi='Simpanan'") or die(mysqli_error($Conn)); 
                                        if($UpdateSimpanan){
                                            $UpdatePenarikan = mysqli_query($Conn,"UPDATE auto_jurnal SET 
                                                debet_id='$debet_id_penarikan',
                                                debet_name='$AkunPenarikan1',
                                                kredit_id='$kredit_id_penarikan',
                                                kredit_name='$AkunPenarikan2'
                                            WHERE kategori_transaksi='Penarikan'") or die(mysqli_error($Conn)); 
                                            if($UpdatePenarikan){
                                                $UpdatePinjaman = mysqli_query($Conn,"UPDATE auto_jurnal SET 
                                                    debet_id='$debet_id_pinjaman',
                                                    debet_name='$AkunPinjaman1',
                                                    kredit_id='$kredit_id_pinjaman',
                                                    kredit_name='$AkunPinjaman2 '
                                                WHERE kategori_transaksi='Pinjaman'") or die(mysqli_error($Conn)); 
                                                if($UpdatePinjaman){
                                                    $UpdateAngsuran = mysqli_query($Conn,"UPDATE auto_jurnal SET 
                                                        debet_id='$debet_id_angsuran',
                                                        debet_name='$AkunAngsuran1',
                                                        kredit_id='$kredit_id_angsuran',
                                                        kredit_name='$AkunAngsuran2'
                                                    WHERE kategori_transaksi='Angsuran'") or die(mysqli_error($Conn)); 
                                                    if($UpdateAngsuran){
                                                        $KategoriLog="Auto Jurnal";
                                                        $KeteranganLog="Update Auto Jurnal";
                                                        include "../../_Config/InputLog.php";
                                                        $_SESSION ["NotifikasiSwal"]="Update Auto Jurnal Berhasil";
                                                        echo '<small class="text-success" id="NotifikasiSimpanAutoJurnalBerhasil">Success</small>';
                                                    }else{
                                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal angsuran</small>';
                                                    }
                                                }else{
                                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal pinjaman</small>';
                                                }
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal penarikan</small>';
                                            }
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data auto jurnal simpanan</small>';
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