<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    $updatetime=date('Y-m-d H:i:s');
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['nama_barang'])){
            echo '<span class="text-danger">Nama Barang Tidak Boleh Kosong!</span>';
        }else{
            $id_barang=$_POST['id_barang'];
            if(empty($_POST['qty'])){
                echo '<span class="text-danger">Jumlah Rincian Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['rincian_satuan_barang'])){
                    $id_barang_satuan=0;
                    $QrySatuan = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                    $DataSatuan = mysqli_fetch_array($QrySatuan);
                    if(empty($DataSatuan['satuan_barang'])){
                        $satuan="";
                    }else{
                        $satuan=$DataSatuan['satuan_barang'];
                    }
                }else{
                    $id_barang_satuan=$_POST['rincian_satuan_barang'];
                    $QrySatuan = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
                    $DataSatuan = mysqli_fetch_array($QrySatuan);
                    if(empty($DataSatuan['id_barang_satuan'])){
                        $satuan="";
                    }else{
                        $satuan=$DataSatuan['satuan_multi'];
                    }
                }
                if(empty($_POST['harga'])){
                    $harga=0;
                }else{
                    $harga=$_POST['harga'];
                }
                if(empty($_POST['jumlah'])){
                    $jumlah=0;
                }else{
                    $jumlah=$_POST['jumlah'];
                }
                if(empty($_POST['kategori_harga'])){
                    $kategori_harga="";
                }else{
                    $kategori_harga=$_POST['kategori_harga'];
                }
                if(empty($_POST['id_transaksi'])){
                    $id_transaksi="0";
                    $id_supplier="0";
                    $id_anggota=0;
                }else{
                    $id_transaksi=$_POST['id_transaksi'];
                    $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                    $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                    $id_supplier=$DataTransaksi['id_supplier'];
                    $id_anggota=$DataTransaksi['id_anggota'];
                }
                $nama_barang=$_POST['nama_barang'];
                $qty_rincian=$_POST['qty'];
                $jumlah_rincian=$_POST['jumlah'];
                //Mencari id_barang_harga
                $QryHarga = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND id_barang_satuan='$id_barang_satuan' AND kategori_harga='$kategori_harga'")or die(mysqli_error($Conn));
                $DataHarga = mysqli_fetch_array($QryHarga);
                if(empty($DataHarga['id_barang_harga'])){
                    $id_barang_harga=0;
                }else{
                    $id_barang_harga=$DataHarga['id_barang_harga'];
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
                        '$id_barang',
                        '$id_barang_harga',
                        '$id_barang_satuan',
                        '$id_anggota',
                        '$id_supplier',
                        '$updatetime',
                        'Barang',
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
                                //Melakukan update transaksi
                                $Update = mysqli_query($Conn,"UPDATE transaksi_ppn SET 
                                    ppn_rp='$ppn_rp'
                                WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                                if($Update){
                                    $_SESSION ["NotifikasiSwal"]="Tambah Rincian Berhasil";
                                    echo '<input type="hidden" name="UrlBack" id="UrlBack" value="index.php?Page=Transaksi&Sub=DetailTransaksi&id='.$id_transaksi .'">';
                                    echo '<small class="text-success" id="NotifikasiTambahRincianBarangBerhasil">Success</small>';
                                }else{
                                    echo '<span class="text-danger">Terjadi kesalahan pada saat update PPN!</span>';
                                }
                            }else{
                                echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data Transaksi</span>';
                            }
                        }else{
                            //Melakukan Update PPN
                            $JumlahRincianTotal=0;
                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'");
                            while ($data = mysqli_fetch_array($query)) {
                                $jumlah= $data['jumlah'];
                                $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                            }
                            $QryTransaksiPpn = mysqli_query($Conn,"SELECT * FROM transaksi_ppn WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                            $dataTransaksiPpn = mysqli_fetch_array($QryTransaksiPpn);
                            if(empty($dataTransaksiPpn['id_transaksi_ppn'])){
                                $ppn_persen=0;
                            }else{
                                $ppn_persen=$dataTransaksiPpn['ppn_persen'];
                            }
                            $ppn_rp=$JumlahRincianTotal*($ppn_persen/100);
                            //Melakukan update transaksi
                            $Update = mysqli_query($Conn,"UPDATE transaksi_ppn SET 
                                ppn_rp='$ppn_rp'
                            WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                            if($Update){
                                $_SESSION ["NotifikasiSwal"]="Tambah Rincian Berhasil";
                                echo '<input type="hidden" name="UrlBack" id="UrlBack" value="index.php?Page=Transaksi&Sub=TambahTransaksi">';
                                echo '<small class="text-success" id="NotifikasiTambahRincianBarangBerhasil">Success</small>';
                            }else{
                                echo '<span class="text-danger">Terjadi kesalahan pada saat update PPN!</span>';
                            }
                        }
                    }else{
                        echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data rincian!</span>';
                    }
                }
            }
        }
    }
?>