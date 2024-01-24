<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['kode_barang'])){
            echo '<span class="text-danger">Kode Barang Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['nama_barang'])){
                echo '<span class="text-danger">Nama barang Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['kategori_barang'])){
                    echo '<span class="text-danger">Kategori Barang Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['satuan_barang'])){
                        echo '<span class="text-danger">Satuan Tidak Boleh Kosong!</span>';
                    }else{
                        if(empty($_POST['konversi'])){
                            echo '<span class="text-danger">Konversi Satuan Tidak Boleh Kosong!</span>';
                        }else{
                            $id_barang=$_POST['id_barang'];
                            $kode_barang=$_POST['kode_barang'];
                            $nama_barang=$_POST['nama_barang'];
                            $kategori_barang=$_POST['kategori_barang'];
                            $satuan_barang=$_POST['satuan_barang'];
                            $konversi=$_POST['konversi'];
                            if(empty($_POST['stok_barang'])){
                                $stok_barang=0;
                            }else{
                                $stok_barang=$_POST['stok_barang'];
                            }
                            if(empty($_POST['harga_beli'])){
                                $harga_beli=0;
                            }else{
                                $harga_beli=$_POST['harga_beli'];
                            }
                            //Simpan data
                            $UpdateBarang = mysqli_query($Conn,"UPDATE barang SET 
                                kode_barang='$kode_barang',
                                nama_barang='$nama_barang',
                                kategori_barang='$kategori_barang',
                                satuan_barang='$satuan_barang',
                                konversi='$konversi',
                                harga_beli='$harga_beli',
                                stok_barang='$stok_barang'
                            WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                            if($UpdateBarang){
                                $JmlKategori = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga"));
                                if(!empty($JmlKategori)){
                                    $no=1;
                                    $QryKategoriHarga = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                    while ($DataKategoriHarga = mysqli_fetch_array($QryKategoriHarga)) {
                                        $kategori_harga= $DataKategoriHarga['kategori_harga'];
                                        if(!empty($_POST["Harga$no"])){
                                            $harga_jual=$_POST["Harga$no"];
                                        }else{
                                            $harga_jual=0;
                                        }
                                        $UpdateHargaBarang = mysqli_query($Conn,"UPDATE barang_harga SET 
                                            harga='$harga_jual'
                                        WHERE id_barang='$id_barang' AND kategori_harga='$kategori_harga'") or die(mysqli_error($Conn)); 
                                        $no++;
                                    }
                                }
                                echo '<small class="text-success" id="NotifikasiEditBarangBerhasil">Success</small>';
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