<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['id_barang_satuan'])){
        echo '<span class="text-danger">ID Satuan Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_barang'])){
            echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['kode_barang'])){
                echo '<span class="text-danger">Kode Barang Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['satuan_multi'])){
                    echo '<span class="text-danger">Satuan Multi Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['konversi'])){
                        echo '<span class="text-danger">Konversi Tidak Boleh Kosong!</span>';
                    }else{
                        if(empty($_POST['stok_multi'])){
                            echo '<span class="text-danger">Stok Multi Tidak Boleh Kosong!</span>';
                        }else{
                            $id_barang_satuan=$_POST['id_barang_satuan'];
                            $id_barang=$_POST['id_barang'];
                            $kode_barang=$_POST['kode_barang'];
                            $satuan_multi=$_POST['satuan_multi'];
                            $konversi=$_POST['konversi'];
                            $stok_multi=$_POST['stok_multi'];
                            //Simpan data
                            $UpdateSatuan = mysqli_query($Conn,"UPDATE barang_satuan SET 
                                kode_barang='$kode_barang',
                                satuan_multi='$satuan_multi',
                                konversi_multi='$konversi',
                                stok_multi='$stok_multi'
                            WHERE id_barang_satuan='$id_barang_satuan'") or die(mysqli_error($Conn)); 
                            if($UpdateSatuan){
                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                $DataBarang = mysqli_fetch_array($QryBarang);
                                $nama_barang= $DataBarang['nama_barang'];
                                $KategoriLog="Barang";
                                $KeteranganLog="Edit multi satuan untuk $nama_barang";
                                include "../../_Config/InputLog.php";
                                $_SESSION ["NotifikasiSwal"]="Edit Satuan Berhasil";
                                echo '<small class="text-success" id="NotifikasiEditSatuanBerhasil">Success</small>';
                            }else{
                                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data satuan!</span>';
                            }
                        }
                    }
                }
            }
        }
    }
?>