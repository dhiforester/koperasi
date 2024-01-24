<?php
    //Koneksi
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    $updatetime=date('Y-m-d H:i:s');
    if(empty($_POST['id_dokter'])){
        echo '<span class="text-danger">Dokter Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['tanggal'])){
            echo '<span class="text-danger">Tanggal Pencairan Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['jumlah'])){
                echo '<span class="text-danger">Jumlah Pencairan Tidak Boleh Kosong</span>';
            }else{
                if(empty($_POST['status'])){
                    echo '<span class="text-danger">Status Pencairan Tidak Boleh Kosong</span>';
                }else{
                    if(empty($_POST['metode_pembayaran'])){
                        echo '<span class="text-danger">Metode Pencairan Tidak Boleh Kosong</span>';
                    }else{
                        $id_dokter=$_POST['id_dokter'];
                        $tanggal=$_POST['tanggal'];
                        $jumlah=$_POST['jumlah'];
                        $status=$_POST['status'];
                        $metode_pembayaran=$_POST['metode_pembayaran'];
                        if(empty($_POST['keterangan'])){
                            $keterangan="";
                        }else{
                            $keterangan=$_POST['keterangan'];
                        }
                        //Duplikasi Data
                        $QryPencairan = mysqli_query($Conn,"SELECT * FROM transaksi_pencairan WHERE tanggal='$tanggal' AND jumlah='$jumlah' AND status='$status'")or die(mysqli_error($Conn));
                        $DataPencairan = mysqli_fetch_array($QryPencairan);
                        if(!empty($DataPencairan['updatetime'])){
                            echo '<span class="text-danger">Data Sudah Ada</span>';
                        }else{
                            //Buka data mitra
                            $QryDokter = mysqli_query($Conn,"SELECT * FROM dokter WHERE id_dokter='$id_dokter'")or die(mysqli_error($Conn));
                            $DataDokter = mysqli_fetch_array($QryDokter);
                            $id_mitra= $DataDokter['id_mitra'];
                            $nama_dokter= $DataDokter['nama_dokter'];
                            //Buka data mitra
                            $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                            $DataMitra = mysqli_fetch_array($QryMitra);
                            $nama_mitra= $DataMitra['nama_mitra'];
                            //Simpan data
                            $entry="INSERT INTO transaksi_pencairan (
                                id_mitra,
                                id_dokter,
                                nama_mitra,
                                nama_dokter,
                                tanggal,
                                metode_pembayaran,
                                jumlah,
                                status,
                                keterangan,
                                updatetime
                            ) VALUES (
                                '$id_mitra',
                                '$id_dokter',
                                '$nama_mitra',
                                '$nama_dokter',
                                '$tanggal',
                                '$metode_pembayaran',
                                '$jumlah',
                                '$status',
                                '$keterangan',
                                '$updatetime'
                            )";
                            $Input=mysqli_query($Conn, $entry);
                            if($Input){
                                echo '<small class="text-success" id="NotifikasiTambajPencairanBerhasil">Success</small>';
                            }else{
                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                            }
                        }
                    }
                }
            }
        }
    }
?>