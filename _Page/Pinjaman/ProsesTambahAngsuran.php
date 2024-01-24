<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $datetime1=date('Y-m-d H:i:s');
    $datetime=strtotime($datetime1);
    //Menangkap data wilayah
    if(empty($_POST['id_anggota'])){
        echo "<span class='text-danger'>ID Anggota Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['id_pinjaman'])){
            echo "<span class='text-danger'>ID Pinjaman Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['tanggal'])){
                echo "<span class='text-danger'>Tanggal Input Tidak Boleh Kosong!!</span>";
            }else{
                if(empty($_POST['kategori_angsuran'])){
                    echo "<span class='text-danger'>Kategori Angsuran Tidak Boleh Kosong!!</span>";
                }else{
                    if(empty($_POST['jumlah'])){
                        echo "<span class='text-danger'>Jumlah Angsuran Tidak Boleh Kosong!!</span>";
                    }else{
                        $id_anggota=$_POST['id_anggota'];
                        $id_pinjaman=$_POST['id_pinjaman'];
                        $tanggal=$_POST['tanggal'];
                        $kategori_angsuran=$_POST['kategori_angsuran'];
                        $jumlah=$_POST['jumlah'];
                        $jumlah= str_replace(".", "", $jumlah);
                        if(!preg_match("/^[0-9]*$/", $jumlah)){
                            echo "Jumlah Hanya Boleh Angka";   
                        }else{
                            //Validasi Duplikasi Data
                            $ValidasiDataDuplikat= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE datetime='$datetime'"));
                            if(!empty($ValidasiDataDuplikat)){
                                echo "<div class='text-danger'>Data Tersebut Sudah Ada!!</div>";
                            }else{
                                $QryPinjamanAngsuran=mysqli_query($Conn, "SELECT max(id_pinjaman_angsuran) as id_pinjaman_angsuran FROM pinjaman_angsuran")or die(mysqli_error($Conn));
                                while($HasilNilai=mysqli_fetch_array($QryPinjamanAngsuran)){
                                    $id_pinjaman_angsuran_max=$HasilNilai['id_pinjaman_angsuran'];
                                }
                                $id_pinjaman_angsuran=$id_pinjaman_angsuran_max+1;
                                //Melakukan input data
                                $entry="INSERT INTO pinjaman_angsuran (
                                    id_pinjaman_angsuran,
                                    id_pinjaman,
                                    id_anggota,
                                    id_akses,
                                    tanggal,
                                    kategori_angsuran,
                                    jumlah,
                                    datetime
                                ) VALUES (
                                    '$id_pinjaman_angsuran',
                                    '$id_pinjaman',
                                    '$id_anggota',
                                    '$SessionIdAkses',
                                    '$tanggal',
                                    '$kategori_angsuran',
                                    '$jumlah',
                                    '$datetime'
                                )";
                                $Input=mysqli_query($Conn, $entry);
                                if($Input){
                                    if($kategori_angsuran=="Pokok"){
                                        //Buka Auto Jurnal
                                        $QryAutoJurnal = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Angsuran'")or die(mysqli_error($Conn));
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
                                                '$id_pinjaman_angsuran',
                                                '$kredit_id',
                                                '$datetime1',
                                                '$KodeKredit',
                                                '$kredit_name',
                                                'Kredit',
                                                '$jumlah'
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
                                                    '$id_pinjaman_angsuran',
                                                    '$debet_id',
                                                    '$datetime1',
                                                    '$KodeDebet',
                                                    '$debet_name',
                                                    'Debet',
                                                    '$jumlah'
                                                )";
                                                $InputDataDebet=mysqli_query($Conn, $EntryDataDebet);
                                                if($InputDataDebet){
                                                    $KategoriLog="Angsuran";
                                                    $KeteranganLog="Tambah Angsuran Berhasil";
                                                    include "../../_Config/InputLog.php";
                                                    echo '<div class="text-success" id="NotifikasiTambahAngsuranBerhasil">Success</div>';
                                                }else{
                                                    echo "<div class='text-danger'>Terjadi kesalahan pada saat menyimpan data jurnal Debet!!</div>";
                                                }
                                            }else{
                                                echo "<div class='text-danger'>Terjadi kesalahan pada saat menyimpan data jurnal Kredit!!</div>";
                                            }
                                        }else{
                                            $KategoriLog="Angsuran";
                                            $KeteranganLog="Tambah Angsuran Berhasil";
                                            include "../../_Config/InputLog.php";
                                            echo '<div class="text-success" id="NotifikasiTambahAngsuranBerhasil">Success</div>';
                                        }
                                    }else{
                                        $KategoriLog="Angsuran";
                                        $KeteranganLog="Tambah Angsuran Berhasil";
                                        include "../../_Config/InputLog.php";
                                        echo '<div class="text-success" id="NotifikasiTambahAngsuranBerhasil">Success</div>';
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
?>