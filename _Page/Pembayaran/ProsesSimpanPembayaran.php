<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    //Tangkap Data
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
                        //Duplikat Data
                        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi' AND id_anggota='$id_anggota'AND id_supplier='$id_supplier' AND jumlah='$jumlah' AND tanggal='$tanggal' AND metode='$metode' AND kategori='$kategori' AND keterangan='$keterangan'")or die(mysqli_error($Conn));
                        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
                        if(!empty($DataPembayaran['id_pembayaran'])){
                            echo '<span class="text-danger">Data Tersebut Sudah Ada</span>';
                        }else{
                            //Simpan pembayaran
                            $EntryDataPembayaran="INSERT INTO transaksi_pembayaran (
                                id_transaksi,
                                id_akses,
                                id_anggota,
                                id_supplier,
                                kategori,
                                tanggal,
                                metode,
                                jumlah,
                                keterangan
                            ) VALUES (
                                '$id_transaksi',
                                '$SessionIdAkses',
                                '$id_anggota',
                                '$id_supplier',
                                '$kategori',
                                '$tanggal',
                                '$metode',
                                '$jumlah',
                                '$keterangan'
                            )";
                            $InputDataPembayaran=mysqli_query($Conn, $EntryDataPembayaran);
                            if($InputDataPembayaran){
                                $KategoriLog="Pembayaran";
                                $KeteranganLog="Input Pembayaran Berhasil";
                                include "../../_Config/InputLog.php";
                                $_SESSION ["NotifikasiSwal"]="Simpan Pembayaran Berhasil";
                                echo '<span class="text-success" id="NotifikasiSimpanPembayaranBerhasil">Success</span>';
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