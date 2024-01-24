<?php
    //Koneksi
    // ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    require "../../vendor/excel_reader/php-excel-reader/excel_reader2.php";
    require "../../vendor/excel_reader/SpreadsheetReader.php";
    //Validasi file
    if(empty(explode(".",$_FILES['file']['name']))){
        echo '<span class="text-danger">File belum dipilih</span>';
    }else{
        $ekstensi = explode(".",$_FILES['file']['name']);
        $file_extension = end($ekstensi);
        if($file_extension != 'xls' && $file_extension != 'xlsx'){
            echo '<span class="text-danger">File yang diperbolehkan hanya file Excel</span>';
        }else{
            $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
            $Reader = new SpreadsheetReader($uploadFilePath);
            $totalSheet = count($Reader->sheets());
            echo '<table class="table table-responsive table-bordered">';
            for ($i=0; $i<=$totalSheet; $i++){
                $i=$i+1;
                $Reader->ChangeSheet($i);
                $no=0;
                $no2=1;
                foreach ($Reader as $Row){
                    $id_barang_bacth=isset($Row[0]) ? $Row[0] : '';
                    $kode_barang=isset($Row[1]) ? $Row[1] : '';
                    $nama_barang=isset($Row[2]) ? $Row[2] : '';
                    $satuan=isset($Row[3]) ? $Row[3] : '';
                    $qty_batch=isset($Row[4]) ? $Row[4] : '';
                    $no_batch=isset($Row[5]) ? $Row[5] : '';
                    $expired_date=isset($Row[6]) ? $Row[6] : '';
                    $reminder_date=isset($Row[7]) ? $Row[7] : '';
                    $status=isset($Row[8]) ? $Row[8] : '';
                    if($id_barang_bacth=="ID Batch"){
                        echo '
                        <tr>
                        <td align="center">NO</td>
                        <td align="center">'.$id_barang_bacth.'</td>
                        <td align="center">'.$kode_barang.'</td>
                        <td align="center">'.$nama_barang.'</td>
                        <td align="center">'.$satuan.'</td>
                        <td align="center">'.$qty_batch.'</td>
                        <td align="center">'.$no_batch.'</td>
                        <td align="center">'.$expired_date.'</td>
                        <td align="center">'.$reminder_date.'</td>
                        <td align="center">'.$status.'</td>
                        <td align="center">Log</td>
                        </tr>';
                    }else{
                        if($status!=="Terjual"&&$status!=="Terdaftar"&&$status!=="None"){
                            $ValidasiStatus="Tidak Valid";
                        }else{
                            $ValidasiStatus="";
                        }
                        //Validasi id_barang_bacth
                        $ValidasiBatch=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE id_barang_bacth='$id_barang_bacth'"));
                        //Validasi status
                        if($ValidasiStatus!==""){
                            $Notifikasi="Status Hanya Boleh Terdaftar, Terjual Atau None!";
                        }else{
                            if(empty($id_barang_bacth)){
                                $Notifikasi="ID Batch Tidak Boleh Kosong!";
                            }else{
                                if(empty($kode_barang)){
                                    $Notifikasi="Kode Barang Tidak Boleh Kosong!";
                                }else{
                                    if(empty($nama_barang)){
                                        $Notifikasi="Nama Barang Tidak Boleh Kosong!";
                                    }else{
                                        if(empty($satuan)){
                                            $Notifikasi="Satuan Barang Tidak Boleh Kosong!";
                                        }else{
                                            if(empty($satuan)){
                                                $Notifikasi="Satuan Barang Tidak Boleh Kosong!";
                                            }else{
                                                if(empty($qty_batch)){
                                                    $Notifikasi="Qty Barang Tidak Boleh Kosong!";
                                                }else{
                                                    if(empty($no_batch)){
                                                        $Notifikasi="Qty Barang Tidak Boleh Kosong!";
                                                    }else{
                                                        if(!preg_match("/^[0-9]*$/", $id_barang_bacth)){
                                                            $Notifikasi="ID Batch Hanya Boleh Angka!";
                                                        }else{
                                                            if(!preg_match("/^[0-9]*$/", $qty_batch)){
                                                                $Notifikasi="Qty Barang Hanya Boleh Angka!";
                                                            }else{
                                                                //Mencari ID barang
                                                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE nama_barang='$nama_barang' AND kode_barang='$kode_barang'")or die(mysqli_error($Conn));
                                                                $DataBarang = mysqli_fetch_array($QryBarang);
                                                                if(empty($DataBarang['id_barang'])){
                                                                    $Notifikasi="Kode dan Nama Barang Tidak Ditemukan";
                                                                }else{
                                                                    $id_barang= $DataBarang['id_barang'];
                                                                    //Mencari Satuan
                                                                    $QrySatuan = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang='$id_barang' AND satuan_multi='$satuan'")or die(mysqli_error($Conn));
                                                                    $DataSatuan = mysqli_fetch_array($QrySatuan);
                                                                    if(empty($DataSatuan['id_barang_satuan'])){
                                                                        $id_barang_satuan="0";
                                                                    }else{
                                                                        $id_barang_satuan= $DataSatuan['id_barang_satuan'];
                                                                    }
                                                                    if(empty($ValidasiBatch)){
                                                                        $EntryBatch="INSERT INTO barang_bacth (
                                                                            id_barang_bacth,
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
                                                                            '$id_barang_bacth',
                                                                            '$id_barang',
                                                                            '$id_barang_satuan',
                                                                            '$kode_barang',
                                                                            '$nama_barang',
                                                                            '$satuan',
                                                                            '$no_batch',
                                                                            '$expired_date',
                                                                            '$qty_batch',
                                                                            '$reminder_date',
                                                                            '$status'
                                                                        )";
                                                                        $InputBatch=mysqli_query($Conn, $EntryBatch);
                                                                        if($InputBatch){
                                                                            $Notifikasi="<small class='text-success'>Import Berhasil</small>";
                                                                        }else{
                                                                            $Notifikasi="Import Gagal";
                                                                        }
                                                                    }else{
                                                                        $UpdateBatch = mysqli_query($Conn,"UPDATE barang_bacth SET 
                                                                            id_barang='$id_barang',
                                                                            id_barang_satuan='$id_barang_satuan',
                                                                            kode_barang='$kode_barang',
                                                                            nama_barang='$nama_barang',
                                                                            no_batch='$no_batch',
                                                                            expired_date='$expired_date',
                                                                            qty_batch='$qty_batch',
                                                                            reminder_date='$reminder_date',
                                                                            status='$status'
                                                                        WHERE id_barang_bacth='$id_barang_bacth'") or die(mysqli_error($Conn)); 
                                                                        if($UpdateBatch){
                                                                            $Notifikasi="<small class='text-success'>Update Berhasil</small>";
                                                                        }else{
                                                                            $Notifikasi="Update Gagal";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        echo '
                        <tr>
                        <td align="center">'.$no2.'</td>
                        <td align="center">'.$id_barang_bacth.'</td>
                        <td align="center">'.$kode_barang.'</td>
                        <td align="center">'.$nama_barang.'</td>
                        <td align="center">'.$satuan.'</td>
                        <td align="center">'.$qty_batch.'</td>
                        <td align="center">'.$no_batch.'</td>
                        <td align="center">'.$expired_date.'</td>
                        <td align="center">'.$reminder_date.'</td>
                        <td align="center">'.$status.'</td>
                        <td>'.$Notifikasi.'</td>
                        </tr>';
                    }
                    $no++;   
                    $no2++;   
                }   
            }
            echo '</table>';
        }
    }
?>