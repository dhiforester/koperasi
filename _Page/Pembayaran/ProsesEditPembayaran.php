<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    //Tangkap Data
    if(empty($_POST['id_pembayaran'])){
        echo '<span class="text-danger">ID Pembayaran Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_transaksi'])){
            echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['metode'])){
                echo '<span class="text-danger">Metode Pembayaran Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['kategori'])){
                    echo '<span class="text-danger">Kategori Transaksi Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['tanggal'])){
                        echo '<span class="text-danger">Tanggal Tidak Boleh Kosong!</span>';
                    }else{
                        if(empty($_POST['jam'])){
                            echo '<span class="text-danger">Jam Tidak Boleh Kosong!</span>';
                        }else{
                            $id_pembayaran=$_POST['id_pembayaran'];
                            $id_transaksi=$_POST['id_transaksi'];
                            $metode=$_POST['metode'];
                            $kategori=$_POST['kategori'];
                            $tanggal=$_POST['tanggal'];
                            $jam=$_POST['jam'];
                            $tanggal="$tanggal $jam";
                            if(empty($_POST['id_anggota'])){
                                $id_anggota=0;
                            }else{
                                $id_anggota=$_POST['id_anggota'];
                            }
                            if(empty($_POST['id_supplier'])){
                                $id_supplier=0;
                            }else{
                                $id_supplier=$_POST['id_supplier'];
                            }
                            if(empty($_POST['jumlah'])){
                                $jumlah=0;
                            }else{
                                $jumlah=$_POST['jumlah'];
                            }
                            if(empty($_POST['keterangan'])){
                                $keterangan="";
                            }else{
                                $keterangan=$_POST['keterangan'];
                            }
                            $jumlah= str_replace(".", "", $jumlah);
                            //Update Pembayaran
                            $UpdatePembayaran = mysqli_query($Conn,"UPDATE transaksi_pembayaran SET 
                                id_transaksi='$id_transaksi',
                                id_anggota='$id_anggota',
                                id_supplier='$id_supplier',
                                kategori='$kategori',
                                tanggal='$tanggal',
                                metode='$metode',
                                jumlah='$jumlah',
                                keterangan='$keterangan'
                            WHERE id_pembayaran='$id_pembayaran'") or die(mysqli_error($Conn)); 
                            if($UpdatePembayaran){
                                $KategoriLog="Pembayaran";
                                $KeteranganLog="Edit Pembayaran Berhasil";
                                include "../../_Config/InputLog.php";
                                $_SESSION ["NotifikasiSwal"]="Simpan Pembayaran Berhasil";
                                echo '<span class="text-success" id="NotifikasiEditPembayaranBerhasil">Success</span>';
                            }else{
                                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data pembayaran</span>';
                            }
                        }
                    }
                }
            }
        }
    }
?>