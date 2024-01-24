<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Menangkap data wilayah
    if(empty($_POST['id_anggota'])){
        echo "<span class='text-danger'>ID Anggota Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['nama'])){
            echo "<span class='text-danger'>Nama Anggota Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['tanggal'])){
                echo "<span class='text-danger'>Tanggal Simpanan Tidak Boleh Kosong!!</span>";
            }else{
                if(empty($_POST['kategori'])){
                    echo "<span class='text-danger'>Kategori Simpanan Tidak Boleh Kosong!!</span>";
                }else{
                    if(empty($_POST['jumlah'])){
                        echo "<span class='text-danger'>Jumlah Simpanan Tidak Boleh Kosong!!</span>";
                    }else{
                        $id_anggota=$_POST['id_anggota'];
                        $nama=$_POST['nama'];
                        $tanggal=$_POST['tanggal'];
                        $kategori=$_POST['kategori'];
                        $jumlah=$_POST['jumlah'];
                        if(empty($_POST['keterangan'])){
                            $keterangan="";
                        }else{
                            $keterangan=$_POST['keterangan'];
                        }
                        $jumlah= str_replace(".", "", $jumlah);
                        if(!preg_match("/^[0-9]*$/", $jumlah)){
                            echo "Jumlah Nominal Hanya Boleh Angka";   
                        }else{
                            //Validasi Duplikasi Data
                            $ValidasiDataDuplikat= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$id_anggota' AND tanggal='$tanggal' AND kategori='$kategori' AND jumlah='$jumlah'"));
                            if(!empty($ValidasiDataDuplikat)){
                                echo "<div class='text-danger'>Data Tersebut Sudah Ada!!</div>";
                            }else{
                                $QrySimpanan=mysqli_query($Conn, "SELECT max(id_simpanan) as id_simpanan FROM simpanan")or die(mysqli_error($Conn));
                                while($HasilNilai=mysqli_fetch_array($QrySimpanan)){
                                    $id_simpanan_max=$HasilNilai['id_simpanan'];
                                }
                                $id_simpanan=$id_simpanan_max+1;
                                //Melakukan input data
                                $entry="INSERT INTO simpanan (
                                    id_simpanan,
                                    id_anggota,
                                    id_akses,
                                    nama,
                                    tanggal,
                                    kategori,
                                    keterangan,
                                    jumlah
                                ) VALUES (
                                    '$id_simpanan',
                                    '$id_anggota',
                                    '$SessionIdAkses',
                                    '$nama',
                                    '$tanggal',
                                    '$kategori',
                                    '$keterangan',
                                    '$jumlah'
                                )";
                                $Input=mysqli_query($Conn, $entry);
                                if($Input){
                                    //Buka Auto Jurnal
                                    if($kategori!=="Penarikan"){
                                        $QryAutoJurnal = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Simpanan'")or die(mysqli_error($Conn));
                                    }else{
                                        $QryAutoJurnal = mysqli_query($Conn,"SELECT * FROM auto_jurnal WHERE kategori_transaksi='Penarikan'")or die(mysqli_error($Conn));
                                    }
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
                                            '$id_simpanan',
                                            '0',
                                            '0',
                                            '$kredit_id',
                                            '$tanggal',
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
                                                '$id_simpanan',
                                                '0',
                                                '0',
                                                '$debet_id',
                                                '$tanggal',
                                                '$KodeDebet',
                                                '$debet_name',
                                                'Debet',
                                                '$jumlah'
                                            )";
                                            $InputDataDebet=mysqli_query($Conn, $EntryDataDebet);
                                            if($InputDataDebet){
                                                $KategoriLog="Tabungan";
                                                $KeteranganLog="Tambah Data $kategori";
                                                include "../../_Config/InputLog.php";
                                                echo '<div class="text-success" id="NotifikasiTambahTabunganBerhasil">Success</div>';
                                            }else{
                                                echo "<div class='text-danger'>Terjadi kesalahan pada saat menyimpan data jurnal Debet!!</div>";
                                            }
                                        }else{
                                            echo "<div class='text-danger'>Terjadi kesalahan pada saat menyimpan data jurnal Kredit!!</div>";
                                        }
                                    }else{
                                        $KategoriLog="Tabungan";
                                        $KeteranganLog="Tambah Data $kategori";
                                        include "../../_Config/InputLog.php";
                                        echo '<div class="text-success" id="NotifikasiTambahTabunganBerhasil">Success</div>';
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