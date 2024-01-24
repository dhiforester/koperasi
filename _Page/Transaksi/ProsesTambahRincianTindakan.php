<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    $updatetime=date('Y-m-d H:i:s');
    if(empty($_POST['id_mitra_tindakan'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_mitra'])){
            echo '<span class="text-danger">ID Mitra Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['nama_tindakan'])){
                echo '<span class="text-danger">Nama Barang Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['qty'])){
                    echo '<span class="text-danger">Jumlah Rincian Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['harga'])){
                        echo '<span class="text-danger">Harga Rincian Tidak Boleh Kosong!</span>';
                    }else{
                        if(empty($_POST['jumlah'])){
                            echo '<span class="text-danger">Jumlah Rincian Tidak Boleh Kosong!</span>';
                        }else{
                            $id_mitra_tindakan=$_POST['id_mitra_tindakan'];
                            $id_mitra=$_POST['id_mitra'];
                            $nama_tindakan=$_POST['nama_tindakan'];
                            $qty_rincian=$_POST['qty'];
                            $harga_rincian=$_POST['harga'];
                            $jumlah_rincian=$_POST['jumlah'];
                            //Untuk mode edit
                            if(!empty($_POST['id_transaksi'])){
                                $id_transaksi=$_POST['id_transaksi'];
                            }else{
                                $id_transaksi="0";
                            }
                            //Cek Duplikasi data
                            $QryDuplikasiData = mysqli_query($Conn,"SELECT * FROM transaksi_rincian WHERE updatetime='$updatetime'")or die(mysqli_error($Conn));
                            $DataDuplikasi = mysqli_fetch_array($QryDuplikasiData);
                            if(!empty($DataDuplikasi['id_transaksi_rincian'])){
                                echo '<span class="text-danger">Data Tidak Boleh Duplikat!</span>';
                            }else{
                                //Simpan data
                                $EntryData="INSERT INTO transaksi_rincian (
                                    id_transaksi,
                                    id_akses,
                                    id_barang,
                                    id_barang_harga,
                                    id_barang_satuan,
                                    id_mitra,
                                    id_mitra_tindakan,
                                    nama_barang,
                                    nama_tindakan,
                                    harga,
                                    qty,
                                    jumlah,
                                    updatetime
                                ) VALUES (
                                    '$id_transaksi',
                                    '$SessionIdAkses',
                                    '0',
                                    '0',
                                    '0',
                                    '$id_mitra',
                                    '$id_mitra_tindakan',
                                    '',
                                    '$nama_tindakan',
                                    '$harga_rincian',
                                    '$qty_rincian',
                                    '$jumlah_rincian',
                                    '$updatetime'
                                )";
                                $InputData=mysqli_query($Conn, $EntryData);
                                if($InputData){
                                    if(!empty($id_transaksi)){
                                        //Hitung rincian transaksi
                                        $JumlahRincianTotal=0;
                                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $jumlah= $data['jumlah'];
                                            $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                                        }
                                        //Melakukan update transaksi
                                        $Update = mysqli_query($Conn,"UPDATE transaksi SET 
                                            tagihan='$JumlahRincianTotal'
                                        WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                                        if($Update){
                                            $_SESSION ["NotifikasiSwal"]="Tambah Rincian Berhasil";
                                            echo '<input type="hidden" name="UrlBack" id="UrlBack" value="index.php?Page=Transaksi&Sub=DetailTransaksi&id='.$id_transaksi .'&id_sup='.$id_mitra .'">';
                                            echo '<small class="text-success" id="NotifikasiTambahRincianTindakanBerhasil">Success</small>';
                                        }else{
                                            echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data Transaksi</span>';
                                        }
                                    }else{
                                        $_SESSION ["NotifikasiSwal"]="Tambah Rincian Berhasil";
                                        echo '<input type="hidden" name="UrlBack" id="UrlBack" value="index.php?Page=Transaksi&Sub=TambahTransaksi&id_mitra='.$id_mitra .'&id_sup='.$id_mitra .'">';
                                        echo '<small class="text-success" id="NotifikasiTambahRincianTindakanBerhasil">Success</small>';
                                    }
                                }else{
                                    echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data rincian!</span>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>