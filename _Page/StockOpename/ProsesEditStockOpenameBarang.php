<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['id_stok_opename_barang'])){
        echo '<span class="text-danger">ID Sock Opename Barang Tidak Boleh Kosong!</span>';
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
                    if(empty($_POST['harga'])){
                        $harga=0;
                    }else{
                        $harga=$_POST['harga'];
                    }
                    $id_stok_opename_barang=$_POST['id_stok_opename_barang'];
                    $id_stok_opename=$_POST['id_stok_opename'];
                    $nama_barang=$_POST['nama_barang'];
                    $satuan=$_POST['satuan'];
                    $stok_akhir= str_replace(".", "", $stok_akhir);
                    $harga= str_replace(".", "", $harga);
                    //Validasi Nominal
                    if(!preg_match("/^[0-9]*$/", $stok_akhir)){
                        echo '<span class="text-danger">Stock Hanya Boleh Angka!</span>';
                    }else{
                        if(!preg_match("/^[0-9]*$/", $harga)){
                            echo '<span class="text-danger">Harga Hanya Boleh Angka!</span>';
                        }else{
                            $Jumlah=$stok_akhir*$harga;
                            $stok_gap=$stok_akhir-$stok_awal;
                            //Update data barang
                            $UpdateBarang = mysqli_query($Conn,"UPDATE stok_opename_barang SET 
                                stok_awal='$stok_awal',
                                stok_akhir='$stok_akhir',
                                stok_gap='$stok_gap',
                                harga='$harga'
                            WHERE id_stok_opename_barang='$id_stok_opename_barang'") or die(mysqli_error($Conn)); 
                            if($UpdateBarang){
                                $KategoriLog="Stock Opename";
                                $KeteranganLog="Edit Stock Opename Barang";
                                include "../../_Config/InputLog.php";
                                $_SESSION ["NotifikasiSwal"]="Tambah Stock Opename Berhasil";
                                echo '<small class="text-success" id="NotifikasiEditStockOpenameBarangBerhasil">Success</small>';
                            }else{
                                echo '<small class="text-danger">Terjadi kesalahan pada saat melakukan update barang</small>';
                            }
                        }
                    }
                }
            }
        }
    }
?>