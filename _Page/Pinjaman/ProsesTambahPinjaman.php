<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Menangkap data wilayah
    if(empty($_POST['id_anggota'])){
        echo "<span class='text-danger'>ID Anggota Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['nama'])){
            echo "<span class='text-danger'>Nama Anggota Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['tanggal_pinjaman'])){
                echo "<span class='text-danger'>Tanggal Pinjaman Tidak Boleh Kosong!!</span>";
            }else{
                if(empty($_POST['tanggal_input'])){
                    echo "<span class='text-danger'>Tanggal Input Tidak Boleh Kosong!!</span>";
                }else{
                    if(empty($_POST['jumlah_pinjaman'])){
                        echo "<span class='text-danger'>Jumlah Pinjaman Tidak Boleh Kosong!!</span>";
                    }else{
                        if(empty($_POST['nilai_angsuran'])){
                            echo "<span class='text-danger'>Nilai Angsuran Tidak Boleh Kosong!!</span>";
                        }else{
                            if(empty($_POST['periode_angsuran'])){
                                echo "<span class='text-danger'>Periode Angsuran Tidak Boleh Kosong!!</span>";
                            }else{
                                $id_anggota=$_POST['id_anggota'];
                                $nama=$_POST['nama'];
                                $tanggal_pinjaman=$_POST['tanggal_pinjaman'];
                                $tanggal_input=date('Y-m-d H:i');
                                $jumlah_pinjaman=$_POST['jumlah_pinjaman'];
                                $nilai_angsuran=$_POST['nilai_angsuran'];
                                $periode_angsuran=$_POST['periode_angsuran'];
                                if(empty($_POST['persen_jasa'])){
                                    $persen_jasa="0";
                                }else{
                                    $persen_jasa=$_POST['persen_jasa'];
                                }
                                if(empty($_POST['estimasi_jasa'])){
                                    $estimasi_jasa="0";
                                }else{
                                    $estimasi_jasa=$_POST['estimasi_jasa'];
                                }
                                $jumlah_pinjaman= str_replace(".", "", $jumlah_pinjaman);
                                $nilai_angsuran= str_replace(".", "", $nilai_angsuran);
                                $periode_angsuran= str_replace(".", "", $periode_angsuran);
                                $persen_jasa= str_replace(".", "", $persen_jasa);
                                $estimasi_jasa= str_replace(".", "", $estimasi_jasa);
                                if(!preg_match("/^[0-9]*$/", $jumlah_pinjaman)){
                                    echo '<tr><td colspan="7">Jumlah Pinjaman Hanya Boleh Angka</td></tr>'; 
                                }else{
                                    if(!preg_match("/^[0-9]*$/", $nilai_angsuran)){
                                        echo '<tr><td colspan="7">Nilai Angsuran Hanya Boleh Angka</td></tr>'; 
                                    }else{
                                        if(!preg_match("/^[0-9]*$/", $periode_angsuran)){
                                            echo '<tr><td colspan="7">Periode Angsuran Hanya Boleh Angka</td></tr>'; 
                                        }else{
                                            if(!preg_match("/^[0-9]*$/", $persen_jasa)){
                                                echo '<tr><td colspan="7">Periode Jasa Hanya Boleh Angka</td></tr>'; 
                                            }else{
                                                if(!preg_match("/^[0-9]*$/", $estimasi_jasa)){
                                                    echo '<tr><td colspan="7">Estimasi Jasa Hanya Boleh Angka</td></tr>'; 
                                                }else{
                                                    //Validasi Duplikasi Data
                                                    $ValidasiDataDuplikat= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE id_anggota='$id_anggota' AND tanggal_pinjaman='$tanggal_pinjaman' AND jumlah_pinjaman='$jumlah_pinjaman' AND nilai_angsuran='$nilai_angsuran'"));
                                                    if(!empty($ValidasiDataDuplikat)){
                                                        echo "<div class='text-danger'>Data Tersebut Sudah Ada!!</div>";
                                                    }else{
                                                        $QryPinjaman=mysqli_query($Conn, "SELECT max(id_pinjaman) as id_pinjaman FROM pinjaman")or die(mysqli_error($Conn));
                                                        while($HasilNilai=mysqli_fetch_array($QryPinjaman)){
                                                            $id_pinjaman_max=$HasilNilai['id_pinjaman'];
                                                        }
                                                        $id_pinjaman=$id_pinjaman_max+1;
                                                        $status="Active";
                                                        $token=date('Y-m-d H:i:s');
                                                        $token=strtotime($token);
                                                        //Melakukan input data
                                                        $entry="INSERT INTO pinjaman (
                                                            id_pinjaman,
                                                            id_anggota,
                                                            id_akses,
                                                            tanggal_pinjaman,
                                                            tanggal_input,
                                                            nama,
                                                            jumlah_pinjaman,
                                                            persen_jasa,
                                                            estimasi_jasa,
                                                            nilai_angsuran,
                                                            periode_angsuran,
                                                            token,
                                                            status
                                                        ) VALUES (
                                                            '$id_pinjaman',
                                                            '$id_anggota',
                                                            '$SessionIdAkses',
                                                            '$tanggal_pinjaman',
                                                            '$tanggal_input',
                                                            '$nama',
                                                            '$jumlah_pinjaman',
                                                            '$persen_jasa',
                                                            '$estimasi_jasa',
                                                            '$nilai_angsuran',
                                                            '$periode_angsuran',
                                                            '$token',
                                                            '$status'
                                                        )";
                                                        $Input=mysqli_query($Conn, $entry);
                                                        if($Input){
                                                            //Buka Auto Jurnal
                                                            $QryAutoJurnal = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Pinjaman'")or die(mysqli_error($Conn));
                                                            $DataAutoJurnal = mysqli_fetch_array($QryAutoJurnal);
                                                            if(!empty($DataAutoJurnal['id_auto_jurnal'])){
                                                                $id_auto_jurnal= $DataAutoJurnal['id_auto_jurnal'];
                                                                $debet_id= $DataAutoJurnal['debet_id'];
                                                                $debet_name= $DataAutoJurnal['debet_name'];
                                                                $kredit_id= $DataAutoJurnal['kredit_id'];
                                                                $kredit_name= $DataAutoJurnal['kredit_name'];
                                                                //Buka Akun Debet
                                                                $QryAkunDebet = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$debet_id'")or die(mysqli_error($Conn));
                                                                $DataAkunDebet = mysqli_fetch_array($QryAkunDebet);
                                                                $KodeDebet = $DataAkunDebet['kode'];
                                                                //Buka Akun Kredit
                                                                $QryAkunKredit = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$kredit_id'")or die(mysqli_error($Conn));
                                                                $DataAkunKredit = mysqli_fetch_array($QryAkunKredit);
                                                                $KodeKredit = $DataAkunKredit['kode'];
                                                                //Simpan Ke Jurnal Kredit
                                                                $EntryDataKredit="INSERT INTO jurnal (
                                                                    id_transaksi,
                                                                    id_simpanan,
                                                                    id_pinjaman,
                                                                    id_pinjaman_angsuran,
                                                                    id_perkiraan,
                                                                    tanggal,
                                                                    kode_perkiraan,
                                                                    nama_perkiraan,
                                                                    d_k,
                                                                    nilai
                                                                ) VALUES (
                                                                    '0',
                                                                    '0',
                                                                    '$id_pinjaman',
                                                                    '0',
                                                                    '$kredit_id',
                                                                    '$tanggal_pinjaman',
                                                                    '$KodeKredit',
                                                                    '$kredit_name',
                                                                    'Kredit',
                                                                    '$jumlah_pinjaman'
                                                                )";
                                                                $InputDataKredit=mysqli_query($Conn, $EntryDataKredit);
                                                                if($InputDataKredit){
                                                                    //Simpan Ke Jurnal Debet
                                                                    $EntryDataDebet="INSERT INTO jurnal (
                                                                        id_transaksi,
                                                                        id_simpanan,
                                                                        id_pinjaman,
                                                                        id_pinjaman_angsuran,
                                                                        id_perkiraan,
                                                                        tanggal,
                                                                        kode_perkiraan,
                                                                        nama_perkiraan,
                                                                        d_k,
                                                                        nilai
                                                                    ) VALUES (
                                                                        '0',
                                                                        '0',
                                                                        '$id_pinjaman',
                                                                        '0',
                                                                        '$debet_id',
                                                                        '$tanggal_pinjaman',
                                                                        '$KodeDebet',
                                                                        '$debet_name',
                                                                        'Debet',
                                                                        '$jumlah_pinjaman'
                                                                    )";
                                                                    $InputDataDebet=mysqli_query($Conn, $EntryDataDebet);
                                                                    if($InputDataDebet){
                                                                        $KategoriLog="Pinjaman";
                                                                        $KeteranganLog="Tambah Pinjaman Berhasil    ";
                                                                        include "../../_Config/InputLog.php";
                                                                        $_SESSION ["NotifikasiSwal"]="Tambah Pinjaman Berhasil";
                                                                        echo '<div class="text-success" id="NotifikasiTambahPinjamanBerhasil">Success</div>';
                                                                    }else{
                                                                        echo "<div class='text-danger'>Terjadi kesalahan pada saat menyimpan data jurnal Debet!!</div>";
                                                                    }
                                                                }else{
                                                                    echo "<div class='text-danger'>Terjadi kesalahan pada saat menyimpan data jurnal Kredit!!</div>";
                                                                }
                                                            }else{
                                                                $KategoriLog="Pinjaman";
                                                                $KeteranganLog="Tambah Pinjaman Berhasil    ";
                                                                include "../../_Config/InputLog.php";
                                                                $_SESSION ["NotifikasiSwal"]="Tambah Pinjaman Berhasil";
                                                                echo '<div class="text-success" id="NotifikasiTambahPinjamanBerhasil">Success</div>';
                                                            }
                                                        }else{
                                                            echo "<div class='text-danger'>Terjadi kesalahan pada saat menyimpan data!!</div>";
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
                }
            }
        }
    }
?>