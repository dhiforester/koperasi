<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['id_barang_bacth'])){
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
                        $id_barang_bacth=$_POST['id_barang_bacth'];
                        //Buka id_barang
                        $QryBatch= mysqli_query($Conn,"SELECT * FROM barang_bacth WHERE id_barang_bacth='$id_barang_bacth'")or die(mysqli_error($Conn));
                        $DataBatch= mysqli_fetch_array($QryBatch);
                        $id_barang= $DataBatch['id_barang'];
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
                        if(empty($_POST['status'])){
                            $status="";
                        }else{
                            $status=$_POST['status'];
                        }
                        
                        $expired_date=$_POST['expired_date'];
                        $reminder_date=$_POST['reminder_date'];
                        $qty_batch=$_POST['qty_batch'];
                        $no_batch=$_POST['no_batch'];
                        //Simpan data
                        $UpdateExpiredDate = mysqli_query($Conn,"UPDATE barang_bacth SET 
                            id_barang_satuan='$id_barang_satuan',
                            satuan='$satuan_barang',
                            expired_date='$expired_date',
                            reminder_date='$reminder_date',
                            qty_batch='$qty_batch',
                            no_batch='$no_batch',
                            status='$status'
                        WHERE id_barang_bacth='$id_barang_bacth'") or die(mysqli_error($Conn)); 
                        if($UpdateExpiredDate){
                            echo '<small class="text-success" id="NotifikasiEditExpiredDateBerhasil">Success</small>';
                        }else{
                            echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data expired date!</span>';
                        }
                    }
                }
            }
        }
    }
?>