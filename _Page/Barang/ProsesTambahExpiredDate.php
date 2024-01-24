<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">ID Barang Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['no_batch'])){
            echo '<span class="text-danger">Nomor Batch Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['expired_date'])){
                echo '<span class="text-danger">Tanggal Expired Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['reminder_date'])){
                    echo '<span class="text-danger">Tanggal Pemberitahuan Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['qty_batch'])){
                        echo '<span class="text-danger">Jumlah Tidak Boleh Kosong!</span>';
                    }else{
                        if(empty($_POST['status'])){
                            echo '<span class="text-danger">Status Tidak Boleh Kosong!</span>';
                        }else{
                            $id_barang=$_POST['id_barang'];
                            if(empty($_POST['id_barang_satuan'])){
                                $id_barang_satuan=0;
                                //Buka satuan barang
                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                $DataBarang = mysqli_fetch_array($QryBarang);
                                $satuan_barang= $DataBarang['satuan_barang'];
                            }else{
                                $id_barang_satuan=$_POST['id_barang_satuan'];
                                //Buka satuan multi
                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
                                $DataBarang = mysqli_fetch_array($QryBarang);
                                $satuan_barang= $DataBarang['satuan_multi'];
                            }
                            if(empty($_POST['satuan'])){
                                $satuan=0;
                            }else{
                                $satuan=$_POST['satuan'];
                            }
                            $expired_date=$_POST['expired_date'];
                            $reminder_date=$_POST['reminder_date'];
                            $qty_batch=$_POST['qty_batch'];
                            $no_batch=$_POST['no_batch'];
                            $status=$_POST['status'];
                            //Validasi duplikasi data
                            $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE no_batch='$no_batch'"));
                            if(!empty($ValidasiDuplikat)){
                                echo '<span class="text-danger">Nomor Batch Yang Anda Gunakan Sudah Ada!</span>';
                            }else{
                                //Buka data barang
                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                $DataBarang = mysqli_fetch_array($QryBarang);
                                $kode_barang= $DataBarang['kode_barang'];
                                $nama_barang= $DataBarang['nama_barang'];
                                //Simpan data
                                $EnterExpiredDate="INSERT INTO barang_bacth (
                                    id_barang,
                                    id_barang_satuan,
                                    kode_barang,
                                    nama_barang,
                                    satuan,
                                    no_batch,
                                    expired_date,
                                    qty_batch,
                                    reminder_date,
                                    status
                                ) VALUES (
                                    '$id_barang',
                                    '$id_barang_satuan',
                                    '$kode_barang',
                                    '$nama_barang',
                                    '$satuan_barang',
                                    '$no_batch',
                                    '$expired_date',
                                    '$qty_batch',
                                    '$reminder_date',
                                    '$status'
                                )";
                                $InputExpiredDate=mysqli_query($Conn, $EnterExpiredDate);
                                if($InputExpiredDate){
                                    $_SESSION ["NotifikasiSwal"]="Tambah Expired Date Berhasil";
                                    echo '<small class="text-success" id="NotifikasiTambahExpiredDateBerhasil">Success</small>';
                                }else{
                                    echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data expired date!</span>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>