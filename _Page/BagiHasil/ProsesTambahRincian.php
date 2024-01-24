<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_shu_session'])){
        echo '<span class="text-danger">ID Rincian Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['id_anggota'])){
            echo '<span class="text-danger">ID Anggota Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['nama_anggota'])){
                echo '<span class="text-danger">Nama Anggota Tidak Boleh Kosong</span>';
            }else{
                if(empty($_POST['simpanan'])){
                    echo '<span class="text-danger">Simpanan Tidak Boleh Kosong</span>';
                }else{
                    if(empty($_POST['jasa_simpanan'])){
                        echo '<span class="text-danger">Jasa Simpanan Tidak Boleh Kosong</span>';
                    }else{
                        if(empty($_POST['pinjaman'])){
                            echo '<span class="text-danger">Pinjaman Tidak Boleh Kosong</span>';
                        }else{
                            if(empty($_POST['jasa_pinjaman'])){
                                echo '<span class="text-danger">Jasa Pinjaman Tidak Boleh Kosong</span>';
                            }else{
                                if(empty($_POST['penjualan'])){
                                    echo '<span class="text-danger">Penjualan Tidak Boleh Kosong</span>';
                                }else{
                                    if(empty($_POST['jasa_penjualan'])){
                                        echo '<span class="text-danger">Jasa Penjualan Tidak Boleh Kosong</span>';
                                    }else{
                                        if(empty($_POST['shu'])){
                                            echo '<span class="text-danger">Bagi Hasil Tidak Boleh Kosong</span>';
                                        }else{
                                            $id_shu_session=$_POST['id_shu_session'];
                                            $id_anggota=$_POST['id_anggota'];
                                            $nama_anggota=$_POST['nama_anggota'];
                                            $simpanan=$_POST['simpanan'];
                                            $jasa_simpanan=$_POST['jasa_simpanan'];
                                            $pinjaman=$_POST['pinjaman'];
                                            $jasa_pinjaman=$_POST['jasa_pinjaman'];
                                            $penjualan=$_POST['penjualan'];
                                            $jasa_penjualan=$_POST['jasa_penjualan'];
                                            $shu=$_POST['shu'];
                                            $simpanan= str_replace(".", "", $simpanan);
                                            $jasa_simpanan= str_replace(".", "", $jasa_simpanan);
                                            $pinjaman= str_replace(".", "", $pinjaman);
                                            $jasa_pinjaman= str_replace(".", "", $jasa_pinjaman);
                                            $penjualan= str_replace(".", "", $penjualan);
                                            $jasa_penjualan= str_replace(".", "", $jasa_penjualan);
                                            $shu= str_replace(".", "", $shu);
                                            if(!preg_match("/^[0-9]*$/", $simpanan)){
                                                echo '<small class="text-danger">Jumlah Simpanan Hanya Boleh Angka!</small>'; 
                                            }else{
                                                if(!preg_match("/^[0-9]*$/", $jasa_simpanan)){
                                                    echo '<small class="text-danger">Jumlah Jasa Simpanan Hanya Boleh Angka!</small>'; 
                                                }else{
                                                    if(!preg_match("/^[0-9]*$/", $pinjaman)){
                                                        echo '<small class="text-danger">Jumlah Pinjaman Hanya Boleh Angka!</small>'; 
                                                    }else{
                                                        if(!preg_match("/^[0-9]*$/", $jasa_pinjaman)){
                                                            echo '<small class="text-danger">Jumlah Jasa Pinjaman Hanya Boleh Angka!</small>'; 
                                                        }else{
                                                            if(!preg_match("/^[0-9]*$/", $penjualan)){
                                                                echo '<small class="text-danger">Jumlah Penjualan Hanya Boleh Angka!</small>'; 
                                                            }else{
                                                                if(!preg_match("/^[0-9]*$/", $jasa_penjualan)){
                                                                    echo '<small class="text-danger">Jumlah Jasa Penjualan Hanya Boleh Angka!</small>'; 
                                                                }else{
                                                                    if(!preg_match("/^[0-9]*$/", $shu)){
                                                                        echo '<small class="text-danger">Jumlah SHU Hanya Boleh Angka!</small>'; 
                                                                    }else{
                                                                        //Validasi Duplikasi Data
                                                                        $CekDataAnggota = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_anggota='$id_anggota' AND id_shu_session='$id_shu_session'"));
                                                                        if(!empty($CekDataAnggota)){
                                                                            echo '<small class="text-danger">Data Tersebut Sudah Ada!</small>'; 
                                                                        }else{
                                                                            //Simpan Data Rincian
                                                                            $EntryData="INSERT INTO shu_rincian (
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
                                                                                '$nama_anggota',
                                                                                '$simpanan',
                                                                                '$pinjaman',
                                                                                '$penjualan',
                                                                                '$jasa_simpanan',
                                                                                '$jasa_pinjaman',
                                                                                '$jasa_penjualan',
                                                                                '$shu'
                                                                            )";
                                                                            $InputData=mysqli_query($Conn, $EntryData);
                                                                            if($InputData){
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
                                                                                    echo '<span class="text-success" id="NotifikasiTambahRincianBerhasil">Success</span>';
                                                                                }else{
                                                                                    echo '<span class="text-danger">Terjadi kesalahan pada proses update sesi bagi hasil</span>';
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
                        }
                    }
                }
            }
        }
    }
?>