<?php
    //Koneksi
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    require "../../vendor/excel_reader/php-excel-reader/excel_reader2.php";
    require "../../vendor/excel_reader/SpreadsheetReader.php";
    if(empty($_POST['id_stok_opename'])){
        echo '<tr><td colspan="6" class="text-center text-danger">ID Stock Opename Tidak Boleh Kosong!</td></tr>';
    }else{
        //Validasi file
        if(empty(explode(".",$_FILES['file']['name']))){
            echo '<tr><td colspan="6" class="text-center text-danger">Fie Belum Dipilih!</td></tr>';
        }else{
            $id_stok_opename=$_POST['id_stok_opename'];
            $ekstensi = explode(".",$_FILES['file']['name']);
            $file_extension = end($ekstensi);
            if($file_extension != 'xls' && $file_extension != 'xlsx'){
                echo '<tr><td colspan="6" class="text-center text-danger">File Tidak Cocok Dengan Ketentuan!</td></tr>';
            }else{
                $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
                $Reader = new SpreadsheetReader($uploadFilePath);
                $totalSheet = count($Reader->sheets());
                for ($i=0; $i<=$totalSheet; $i++){
                    $i=$i+1;
                    $Reader->ChangeSheet($i);
                    foreach ($Reader as $Row){
                        $no=isset($Row[0]) ? $Row[0] : '';
                        $id_barang=isset($Row[1]) ? $Row[1] : '';
                        $nama_barang=isset($Row[2]) ? $Row[2] : '';
                        $satuan=isset($Row[3]) ? $Row[3] : '';
                        $harga=isset($Row[4]) ? $Row[4] : '';
                        $stok_awal=isset($Row[5]) ? $Row[5] : '';
                        $stok_akhir=isset($Row[6]) ? $Row[6] : '';
                        $selisih=isset($Row[7]) ? $Row[7] : '';
                        //Menghitung Jumlah
                        $jumlah=$stok_akhir*$harga;
                        if($no=="No"){
                            echo '<tr><td colspan="6" class="text-center text-danger">Header Table!</td></tr>';
                        }else{
                            //Validasi id_barang
                            $ValidasiBarang=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE id_barang='$id_barang'"));
                            //Validasi nomor kontak hanya boleh angka
                            if(empty($ValidasiBarang)){
                                $StatusValidasi="<small class='text-danger'><small>ID Barang Tidak Valid</small></small>";
                            }else{
                                //Validasi harga
                                if(!preg_match("/^[0-9]*$/", $harga)){
                                    $StatusValidasi="<small class='text-danger'><small>Harga Hanya Boleh Angka</small></small>";
                                }else{
                                    //Validasi stok_awal
                                    if(!preg_match("/^[0-9]*$/", $stok_awal)){
                                        $StatusValidasi="<small class='text-danger'><small>Stok Awal Hanya Boleh Angka</small></small>";
                                    }else{
                                        //Validasi stok_awal
                                        if(!preg_match("/^[0-9]*$/", $stok_akhir)){
                                            $StatusValidasi="<small class='text-danger'><small>Stok Akhir Hanya Boleh Angka</small></small>";
                                        }else{
                                            $selisih=$stok_akhir-$stok_awal;
                                            //Validasi apakah dta sudah ada
                                            $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_barang='$id_barang' AND id_stok_opename='$id_stok_opename'"));
                                            if(empty($ValidasiDuplikat)){
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
                                                    '$selisih',
                                                    '$harga',
                                                    '$jumlah'
                                                )";
                                                $Input=mysqli_query($Conn, $entry);
                                                if($Input){
                                                    //Update data barang
                                                    $UpdateBarang = mysqli_query($Conn,"UPDATE barang SET 
                                                        harga_beli='$harga',
                                                        stok_barang='$stok_akhir'
                                                    WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                                                    if($UpdateBarang){
                                                        $StatusValidasi="<small class='text-primary'><small>Entry Berhasil</small></small>";
                                                    }else{
                                                        $StatusValidasi="<small class='text-danger'><small>Update Barang Gagal</small></small>";
                                                    }
                                                }else{
                                                    $StatusValidasi="<small class='text-danger'><small>Entry Gagal</small></small>";
                                                }
                                            }else{
                                                $UpdateBarang = mysqli_query($Conn,"UPDATE stok_opename_barang SET 
                                                    stok_awal='$stok_awal',
                                                    stok_akhir='$stok_akhir',
                                                    stok_gap='$selisih',
                                                    harga='$harga'
                                                WHERE id_stok_opename_barang='$id_stok_opename_barang'") or die(mysqli_error($Conn)); 
                                                if($UpdateBarang){
                                                    $StatusValidasi="<small class='text-success'><small>Update Berhasil</small></small>";
                                                }else{
                                                    $StatusValidasi="<small class='text-danger'><small>Update Gagal</small></small>";
                                                }
                                            }
                                        }
                                    }
                                }
                            } 
                            echo '<tr>';
                            echo '  <td class="text-center">'.$no.'</td>';
                            echo '  <td>';
                            echo '      <small><b>'.$nama_barang.'</b></small><br>';
                            echo '      <small><small>'.$satuan.'</small></small><br>';
                            echo '      <small><small>'.$harga.'</small></small>';
                            echo '  </td>';
                            echo '  <td>';
                            echo '      <small><b>'.$stok_awal.'</b></small><br>';
                            echo '      <small><small>'.$stok_akhir.'</small></small>';
                            echo '  </td>';
                            echo '  <td>';
                            echo '      <small><small>'.$selisih.'</small></small>';
                            echo '  </td>';
                            echo '  <td>';
                            echo '      <small><small>'.$jumlah.'</small></small>';
                            echo '  </td>';
                            echo '  <td>';
                            echo '      <small><small>'.$StatusValidasi.'</small></small>';
                            echo '  </td>';
                            echo '</tr>';
                        }
                    }   
                }
            }
        }
    }
?>