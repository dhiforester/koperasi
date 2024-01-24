<?php
    //Koneksi
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    $updatetime=date('Y-m-d H:i:s');
    if(empty($_POST['id_transaksi_pencairan'])){
        echo '<span class="text-danger">ID Pencairan Tidak Boleh Kosong</span>';
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
                        $id_transaksi_pencairan=$_POST['id_transaksi_pencairan'];
                        $tanggal=$_POST['tanggal'];
                        $jumlah=$_POST['jumlah'];
                        $status=$_POST['status'];
                        $metode_pembayaran=$_POST['metode_pembayaran'];
                        if(empty($_POST['keterangan'])){
                            $keterangan="";
                        }else{
                            $keterangan=$_POST['keterangan'];
                        }
                        //Simpan data
                        $UpdateAkses = mysqli_query($Conn,"UPDATE transaksi_pencairan SET 
                            tanggal='$tanggal',
                            metode_pembayaran='$metode_pembayaran',
                            jumlah='$jumlah',
                            status='$status',
                            keterangan='$keterangan',
                            updatetime='$updatetime'
                        WHERE id_transaksi_pencairan='$id_transaksi_pencairan'") or die(mysqli_error($Conn)); 
                        if($UpdateAkses){
                            echo '<small class="text-success" id="NotifikasiEditPencairanBerhasil">Success</small>';
                        }else{
                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                        }
                    }
                }
            }
        }
    }
?>