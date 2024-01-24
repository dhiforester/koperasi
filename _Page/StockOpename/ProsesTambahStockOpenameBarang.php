<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_stok_opename'])){
            echo '<span class="text-danger">ID Stock Opename Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['nama_barang'])){
                echo '<span class="text-danger">Nama Barang Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['satuan'])){
                    echo '<span class="text-danger">Satuan Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['stok_awal'])){
                        $stok_awal=0;
                    }else{
                        $stok_awal=$_POST['stok_awal'];
                    }
                    if(empty($_POST['harga'])){
                        $harga=0;
                    }else{
                        $harga=$_POST['harga'];
                    }
                    if(empty($_POST['stok_akhir'])){
                        $stok_akhir=0;
                    }else{
                        $stok_akhir=$_POST['stok_akhir'];
                    }
                    if(empty($_POST['harga_baru'])){
                        $harga_baru=0;
                    }else{
                        $harga_baru=$_POST['harga_baru'];
                    }
                    $id_barang=$_POST['id_barang'];
                    $id_stok_opename=$_POST['id_stok_opename'];
                    $nama_barang=$_POST['nama_barang'];
                    $satuan=$_POST['satuan'];
                    $stok_akhir= str_replace(".", "", $stok_akhir);
                    $harga_baru= str_replace(".", "", $harga_baru);
                    //Validasi Nominal
                    if(!preg_match("/^[0-9]*$/", $stok_akhir)){
                        echo '<span class="text-danger">Stock Hanya Boleh Angka!</span>';
                    }else{
                        if(!preg_match("/^[0-9]*$/", $harga_baru)){
                            echo '<span class="text-danger">Harga Hanya Boleh Angka!</span>';
                        }else{
                            //Validasi data duplikat
                            $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_barang='$id_barang' AND id_stok_opename='$id_stok_opename'"));
                            if(!empty($ValidasiDuplikat)){
                                echo '<small class="text-danger">Data Tersebut sudah ada</small>';
                            }else{
                                $Jumlah=$stok_akhir*$harga_baru;
                                $stok_gap=$stok_akhir-$stok_awal;
                                //Simpan data
                                $entry="INSERT INTO stok_opename_barang (
                                    id_stok_opename,
                                    id_barang,
                                    nama_barang,
                                    satuan,
                                    stok_awal,
                                    stok_akhir,
                                    stok_gap,
                                    harga,
                                    jumlah
                                ) VALUES (
                                    '$id_stok_opename',
                                    '$id_barang',
                                    '$nama_barang',
                                    '$satuan',
                                    '$stok_awal',
                                    '$stok_akhir',
                                    '$stok_gap',
                                    '$harga_baru',
                                    '$Jumlah'
                                )";
                                $Input=mysqli_query($Conn, $entry);
                                if($Input){
                                    //Update data barang
                                    $UpdateBarang = mysqli_query($Conn,"UPDATE barang SET 
                                        harga_beli='$harga_baru',
                                        stok_barang='$stok_akhir'
                                    WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                                    if($UpdateBarang){
                                        $KategoriLog="Stock Opename";
                                        $KeteranganLog="Edit Stock Opename Barang";
                                        include "../../_Config/InputLog.php";
                                        $_SESSION ["NotifikasiSwal"]="Tambah Stock Opename Berhasil";
                                        echo '<small class="text-success" id="NotifikasiTambahSesiStockOpenameBarangBerhasil">Success</small>';
                                    }else{
                                        echo '<small class="text-danger">Terjadi kesalahan pada saat melakukan update barang</small>';
                                    }
                                }else{
                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data stock opename</small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>