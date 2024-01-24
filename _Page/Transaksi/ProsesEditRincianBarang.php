<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi_rincian'])){
        echo '<span class="text-danger">ID Rincian Transaksi Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_barang'])){
            echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['nama_barang'])){
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
                            $id_transaksi_rincian=$_POST['id_transaksi_rincian'];
                            $id_barang=$_POST['id_barang'];
                            $nama_barang=$_POST['nama_barang'];
                            $qty_rincian=$_POST['qty'];
                            $harga_rincian=$_POST['harga'];
                            $jumlah_rincian=$_POST['jumlah'];
                            //Simpan data
                            $Update = mysqli_query($Conn,"UPDATE transaksi_rincian SET 
                                harga='$harga_rincian',
                                qty='$qty_rincian',
                                jumlah='$jumlah_rincian'
                            WHERE id_transaksi_rincian='$id_transaksi_rincian'") or die(mysqli_error($Conn)); 
                            if($Update){
                                //Mode edit transaksi
                                if(!empty($_POST['GetIdTransaksi'])){
                                    $id_transaksi=$_POST['GetIdTransaksi'];
                                    //Melakukan update pada ppn
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
                                    //Melakukan update transaksi
                                    $Update = mysqli_query($Conn,"UPDATE transaksi_ppn SET 
                                        ppn_rp='$ppn_rp'
                                    WHERE id_akses='$SessionIdAkses' AND id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                                    if($Update){
                                        $JumlahRincianTotal=$JumlahRincianTotal+$ppn_rp;
                                        //Melakukan update transaksi
                                        $Update = mysqli_query($Conn,"UPDATE transaksi SET 
                                            tagihan='$JumlahRincianTotal'
                                        WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                                        if($Update){
                                            $_SESSION ["NotifikasiSwal"]="Edit Rincian Berhasil";
                                            echo '<small class="text-success" id="NotifikasiEditRincianBarangBerhasil">Success</small>';
                                        }else{
                                            echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data Transaksi</span>';
                                        }
                                    }else{
                                        echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data PPN</span>';
                                    }
                                }else{
                                    $id_transaksi=0;
                                    //Melakukan update pada ppn
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
                                        echo '<small class="text-success" id="NotifikasiEditRincianBarangBerhasil">Success</small>';
                                    }else{
                                        echo '<span class="text-danger">Terjadi kesalahan pada saat mengupdate data PPN</span>';
                                    }
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
?>