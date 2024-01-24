<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    $updatetime=date('Y-m-d H:i:s');
    if(empty($_POST['nama_barang'])){
        echo '<span class="text-danger">Uraian Rincian Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['qty'])){
            echo '<span class="text-danger">Qty Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['satuan'])){
                echo '<span class="text-danger">Satuan Tidak Boleh Kosong!</span>';
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
                            $nama_barang=$_POST['nama_barang'];
                            $satuan=$_POST['satuan'];
                            $qty_rincian=$_POST['qty'];
                            $harga=$_POST['harga'];
                            $jumlah_rincian=$_POST['jumlah'];
                            //id_transaksi
                            if(empty($_POST['id_transaksi'])){
                                $id_transaksi="0";
                                $id_supplier="0";
                                $id_anggota=0;
                            }else{
                                $id_transaksi=$_POST['id_transaksi'];
                                if(empty($_POST['id_supplier'])){
                                    $id_supplier="0";
                                }else{
                                    $id_supplier=$_POST['id_supplier'];
                                }
                                if(empty($_POST['id_anggota'])){
                                    $id_anggota="0";
                                }else{
                                    $id_anggota=$_POST['id_anggota'];
                                }
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
                                    id_anggota,
                                    id_supplier,
                                    tanggal,
                                    kategori_rincian,
                                    nama_barang,
                                    harga,
                                    qty,
                                    satuan,
                                    jumlah,
                                    updatetime
                                ) VALUES (
                                    '$id_transaksi',
                                    '$SessionIdAkses',
                                    '0',
                                    '0',
                                    '0',
                                    '$id_anggota',
                                    '$id_supplier',
                                    '$updatetime',
                                    'Lainnya',
                                    '$nama_barang',
                                    '$harga',
                                    '$qty_rincian',
                                    '$satuan',
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
                                        $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                        $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
                                        if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
                                            $ppn_persen=0;
                                        }else{
                                            $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                                        }
                                        $ppn_rp=$JumlahRincianTotal*($ppn_persen/100);
                                        $JumlahRincianTotal=$ppn_rp+$JumlahRincianTotal;
                                        //Melakukan update transaksi
                                        $Update = mysqli_query($Conn,"UPDATE transaksi SET 
                                            tagihan='$JumlahRincianTotal'
                                        WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                                        if($Update){
                                            $_SESSION ["NotifikasiSwal"]="Tambah Rincian Berhasil";
                                            echo '<input type="hidden" name="UrlBack" id="UrlBack" value="index.php?Page=Transaksi&Sub=DetailTransaksi&id='.$id_transaksi .'">';
                                            echo '<small class="text-success" id="NotifikasiTambahRincianLainnyaBerhasil">Success</small>';
                                        }else{
                                            echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data Transaksi</span>';
                                        }
                                    }else{
                                        $_SESSION ["NotifikasiSwal"]="Tambah Rincian Berhasil";
                                        echo '<input type="hidden" name="UrlBack" id="UrlBack" value="index.php?Page=Transaksi&Sub=TambahTransaksi">';
                                        echo '<small class="text-success" id="NotifikasiTambahRincianLainnyaBerhasil">Success</small>';
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