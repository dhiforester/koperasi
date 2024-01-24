<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['tanggal'])){
        echo '<span class="text-danger">Tanggal Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_perkiraan'])){
            echo '<span class="text-danger">ID Perkiraan Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['d_k'])){
                echo '<span class="text-danger">Debet Kredit Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['nilai'])){
                    echo '<span class="text-danger">Nilai Saldo Jurnal Tidak Boleh Kosong!</span>';
                }else{
                    $tanggal=$_POST['tanggal'];
                    $id_perkiraan=$_POST['id_perkiraan'];
                    $d_k=$_POST['d_k'];
                    $nilai=$_POST['nilai'];
                    if(empty($_POST['id_transaksi'])){
                        $id_transaksi=0;
                    }else{
                        $id_transaksi=$_POST['id_transaksi'];
                    }
                    if(empty($_POST['id_simpanan'])){
                        $id_simpanan=0;
                    }else{
                        $id_simpanan=$_POST['id_simpanan'];
                    }
                    if(empty($_POST['id_pinjaman'])){
                        $id_pinjaman=0;
                    }else{
                        $id_pinjaman=$_POST['id_pinjaman'];
                    }
                    if(empty($_POST['id_pinjaman_angsuran'])){
                        $id_pinjaman_angsuran=0;
                    }else{
                        $id_pinjaman_angsuran=$_POST['id_pinjaman_angsuran'];
                    }
                    if(empty($_POST['id_shu_session'])){
                        $id_shu_session=0;
                    }else{
                        $id_shu_session=$_POST['id_shu_session'];
                    }
                    //Validasi Duplikat
                    $ValidasiDuplikat = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_transaksi='$id_transaksi' AND id_simpanan='$id_simpanan' AND id_pinjaman='$id_pinjaman' AND id_pinjaman_angsuran='$id_pinjaman_angsuran' AND id_shu_session='$id_shu_session' AND id_perkiraan='$id_perkiraan' AND nilai='$nilai'"));
                    if(empty($ValidasiDuplikat)){
                        //Buka data akun perkiraan
                        $Qry = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'")or die(mysqli_error($Conn));
                        $Data = mysqli_fetch_array($Qry);
                        $kode = $Data['kode'];
                        $nama = $Data['nama'];
                        //Buka transaksi
                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                        //Simpan data
                        $EntryData="INSERT INTO jurnal (
                            id_transaksi,
                            id_simpanan,
                            id_pinjaman,
                            id_pinjaman_angsuran,
                            id_shu_session,
                            id_perkiraan,
                            tanggal,
                            kode_perkiraan,
                            nama_perkiraan,
                            d_k,
                            nilai
                        ) VALUES (
                            '$id_transaksi',
                            '$id_simpanan',
                            '$id_pinjaman',
                            '$id_pinjaman_angsuran',
                            '$id_shu_session',
                            '$id_perkiraan',
                            '$tanggal',
                            '$kode',
                            '$nama',
                            '$d_k',
                            '$nilai'
                        )";
                        $InputData=mysqli_query($Conn, $EntryData);
                        if($InputData){
                            echo '<small class="text-success" id="NotifikasiTambahJurnalBerhasil">Success</small>';
                        }else{
                            echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data transaksi!</span>';
                        }
                    }else{
                        echo '<span class="text-danger">Data Tidak Boleh Duplikat!</span>';
                    }
                }
            }
        }
    }
?>