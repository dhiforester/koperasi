<?php
    //Koneksi
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    require "../../vendor/excel_reader/php-excel-reader/excel_reader2.php";
    require "../../vendor/excel_reader/SpreadsheetReader.php";
    $JmlKategori = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga"));
    $KolomStok=6+$JmlKategori+1;
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
                    $id_barang=isset($Row[0]) ? $Row[0] : '';
                    $kode_barang=isset($Row[1]) ? $Row[1] : '';
                    $nama_barang=isset($Row[2]) ? $Row[2] : '';
                    $kategori=isset($Row[3]) ? $Row[3] : '';
                    $satuan=isset($Row[4]) ? $Row[4] : '';
                    $konversi=isset($Row[5]) ? $Row[5] : '';
                    $harga=isset($Row[6]) ? $Row[6] : '';
                    $stok=isset($Row[$KolomStok]) ? $Row[$KolomStok] : '';
                    if($id_barang=="ID Barang"){
                        echo '<tr>';
                        echo '  <td align="center">NO</td>';
                        echo '  <td align="center">'.$id_barang.'</td>';
                        echo '  <td align="center">'.$kode_barang.'</td>';
                        echo '  <td align="center">'.$nama_barang.'</td>';
                        echo '  <td align="center">'.$kategori.'</td>';
                        echo '  <td align="center">'.$satuan.'</td>';
                        echo '  <td align="center">'.$konversi.'</td>';
                        echo '  <td align="center">'.$harga.'</td>';
                        if(!empty($JmlKategori)){
                            $Col=1;
                            $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                            while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                $ColData=6+$Col;
                                $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                echo '<td align="center">';
                                echo '  '.$harga_multi.'';
                                echo '</td>';
                                $Col++;
                            }
                        }
                        echo '  <td align="center">'.$stok.'</td>';
                        echo '  <td align="center">Log</td>';
                        echo '</tr>';
                    }else{
                        //Validasi id_barang
                        $ValidasiBarang=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE id_barang='$id_barang'"));
                        //Validasi nomor kontak hanya boleh angka
                        if(empty($kode_barang)){
                            echo '<tr>';
                            echo '  <td>'.$no2.'</td>';
                            echo '  <td>'.$id_barang.'</td>';
                            echo '  <td>'.$kode_barang.'</td>';
                            echo '  <td>'.$nama_barang.'</td>';
                            echo '  <td>'.$kategori.'</td>';
                            echo '  <td>'.$satuan.'</td>';
                            echo '  <td>'.$konversi.'</td>';
                            echo '  <td>'.$harga.'</td>';
                            if(!empty($JmlKategori)){
                                $Col=1;
                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                    $ColData=6+$Col;
                                    $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                    echo '<td align="left">';
                                    echo '  '.$harga_multi.'';
                                    echo '</td>';
                                    $Col++;
                                }
                            }
                            echo '  <td>'.$stok.'</td>';
                            echo '  <td class="text-danger">Kode Barang Tidak Boleh Kosong</td>';
                            echo '</tr>';
                        }else{
                            //Tanggal masuk tidak boleh kosong
                            if(empty($nama_barang)){
                                echo '<tr>';
                                echo '  <td>'.$no2.'</td>';
                                echo '  <td>'.$id_barang.'</td>';
                                echo '  <td>'.$kode_barang.'</td>';
                                echo '  <td>'.$nama_barang.'</td>';
                                echo '  <td>'.$kategori.'</td>';
                                echo '  <td>'.$satuan.'</td>';
                                echo '  <td>'.$konversi.'</td>';
                                echo '  <td>'.$harga.'</td>';
                                if(!empty($JmlKategori)){
                                    $Col=1;
                                    $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                        $ColData=6+$Col;
                                        $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                        echo '<td align="left">';
                                        echo '  '.$harga_multi.'';
                                        echo '</td>';
                                        $Col++;
                                    }
                                }
                                echo '  <td>'.$stok.'</td>';
                                echo '  <td class="text-danger">Nama Barang Tidak Boleh Kosong</td>';
                                echo '</tr>';
                            }else{
                                if(empty($kategori)){
                                    echo '<tr>';
                                    echo '  <td>'.$no2.'</td>';
                                    echo '  <td>'.$id_barang.'</td>';
                                    echo '  <td>'.$kode_barang.'</td>';
                                    echo '  <td>'.$nama_barang.'</td>';
                                    echo '  <td>'.$kategori.'</td>';
                                    echo '  <td>'.$satuan.'</td>';
                                    echo '  <td>'.$konversi.'</td>';
                                    echo '  <td>'.$harga.'</td>';
                                    if(!empty($JmlKategori)){
                                        $Col=1;
                                        $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                        while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                            $ColData=6+$Col;
                                            $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                            echo '<td align="left">';
                                            echo '  '.$harga_multi.'';
                                            echo '</td>';
                                            $Col++;
                                        }
                                    }
                                    echo '  <td>'.$stok.'</td>';
                                    echo '  <td class="text-danger">Kategori Barang Tidak Boleh Kosong</td>';
                                    echo '</tr>';
                                }else{
                                    if(empty($satuan)){
                                        echo '<tr>';
                                        echo '  <td>'.$no2.'</td>';
                                        echo '  <td>'.$id_barang.'</td>';
                                        echo '  <td>'.$kode_barang.'</td>';
                                        echo '  <td>'.$nama_barang.'</td>';
                                        echo '  <td>'.$kategori.'</td>';
                                        echo '  <td>'.$satuan.'</td>';
                                        echo '  <td>'.$konversi.'</td>';
                                        echo '  <td>'.$harga.'</td>';
                                        if(!empty($JmlKategori)){
                                            $Col=1;
                                            $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                            while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                $ColData=6+$Col;
                                                $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                echo '<td align="left">';
                                                echo '  '.$harga_multi.'';
                                                echo '</td>';
                                                $Col++;
                                            }
                                        }
                                        echo '  <td>'.$stok.'</td>';
                                        echo '  <td class="text-danger">Satuan Barang Tidak Boleh Kosong</td>';
                                        echo '</tr>';
                                    }else{
                                        if(!preg_match("/^[0-9]*$/", $id_barang)){
                                            echo '<tr>';
                                            echo '  <td>'.$no2.'</td>';
                                            echo '  <td>'.$id_barang.'</td>';
                                            echo '  <td>'.$kode_barang.'</td>';
                                            echo '  <td>'.$nama_barang.'</td>';
                                            echo '  <td>'.$kategori.'</td>';
                                            echo '  <td>'.$satuan.'</td>';
                                            echo '  <td>'.$konversi.'</td>';
                                            echo '  <td>'.$harga.'</td>';
                                            if(!empty($JmlKategori)){
                                                $Col=1;
                                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                    $ColData=6+$Col;
                                                    $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                    echo '<td align="left">';
                                                    echo '  '.$harga_multi.'';
                                                    echo '</td>';
                                                    $Col++;
                                                }
                                            }
                                            echo '  <td>'.$stok.'</td>';
                                            echo '  <td class="text-danger">ID Barang Hanya Boleh Angka</td>';
                                            echo '</tr>';
                                        }else{
                                            if(!preg_match("/^[0-9]*$/", $kode_barang)){
                                                echo '<tr>';
                                                echo '  <td>'.$no2.'</td>';
                                                echo '  <td>'.$id_barang.'</td>';
                                                echo '  <td>'.$kode_barang.'</td>';
                                                echo '  <td>'.$nama_barang.'</td>';
                                                echo '  <td>'.$kategori.'</td>';
                                                echo '  <td>'.$satuan.'</td>';
                                                echo '  <td>'.$konversi.'</td>';
                                                echo '  <td>'.$harga.'</td>';
                                                if(!empty($JmlKategori)){
                                                    $Col=1;
                                                    $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                        $ColData=6+$Col;
                                                        $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                        echo '<td align="left">';
                                                        echo '  '.$harga_multi.'';
                                                        echo '</td>';
                                                        $Col++;
                                                    }
                                                }
                                                echo '  <td>'.$stok.'</td>';
                                                echo '  <td class="text-danger">Kode Barang Hanya Boleh Angka</td>';
                                                echo '</tr>';
                                            }else{ 
                                                if(!preg_match("/^[0-9]*$/", $kode_barang)){
                                                    echo '<tr>';
                                                    echo '  <td>'.$no2.'</td>';
                                                    echo '  <td>'.$id_barang.'</td>';
                                                    echo '  <td>'.$kode_barang.'</td>';
                                                    echo '  <td>'.$nama_barang.'</td>';
                                                    echo '  <td>'.$kategori.'</td>';
                                                    echo '  <td>'.$satuan.'</td>';
                                                    echo '  <td>'.$konversi.'</td>';
                                                    echo '  <td>'.$harga.'</td>';
                                                    if(!empty($JmlKategori)){
                                                        $Col=1;
                                                        $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                                        while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                            $ColData=6+$Col;
                                                            $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                            echo '<td align="left">';
                                                            echo '  '.$harga_multi.'';
                                                            echo '</td>';
                                                            $Col++;
                                                        }
                                                    }
                                                    echo '  <td>'.$stok.'</td>';
                                                    echo '  <td class="text-danger">Kode Barang Hanya Boleh Angka</td>';
                                                    echo '</tr>';
                                                }else{
                                                    if(empty($ValidasiBarang)){
                                                        //Simpan data
                                                        $entry="INSERT INTO barang (
                                                            id_barang,
                                                            kode_barang,
                                                            nama_barang,
                                                            kategori_barang,
                                                            satuan_barang,
                                                            konversi,
                                                            harga_beli,
                                                            stok_barang
                                                        ) VALUES (
                                                            '$id_barang',
                                                            '$kode_barang',
                                                            '$nama_barang',
                                                            '$kategori',
                                                            '$satuan',
                                                            '$konversi',
                                                            '$harga',
                                                            '$stok'
                                                        )";
                                                        $Input=mysqli_query($Conn, $entry);
                                                        if($Input){
                                                            echo '<tr>';
                                                            echo '  <td>'.$no2.'</td>';
                                                            echo '  <td>'.$id_barang.'</td>';
                                                            echo '  <td>'.$kode_barang.'</td>';
                                                            echo '  <td>'.$nama_barang.'</td>';
                                                            echo '  <td>'.$kategori.'</td>';
                                                            echo '  <td>'.$satuan.'</td>';
                                                            echo '  <td>'.$konversi.'</td>';
                                                            echo '  <td>'.$harga.'</td>';
                                                            if(!empty($JmlKategori)){
                                                                $Col=1;
                                                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                                    $KategoriHarga= $DataKategori['kategori_harga'];
                                                                    $ColData=6+$Col;
                                                                    $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                                    $ValidasiDuplikatHarga=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$KategoriHarga'"));
                                                                    if(empty($ValidasiDuplikatHarga)){
                                                                        //Simpan Harga
                                                                        $EntriHargaBarang="INSERT INTO barang_harga (
                                                                            id_barang,
                                                                            id_barang_satuan,
                                                                            kategori_harga,
                                                                            harga
                                                                        ) VALUES (
                                                                            '$id_barang',
                                                                            '0',
                                                                            '$KategoriHarga',
                                                                            '$harga_multi'
                                                                        )";
                                                                        $InputHargaBarang=mysqli_query($Conn, $EntriHargaBarang);
                                                                    }else{
                                                                        $UpdateHargaBarang = mysqli_query($Conn,"UPDATE barang_harga SET 
                                                                            harga='$harga_multi'
                                                                        WHERE id_barang='$id_barang' AND kategori_harga='$KategoriHarga'") or die(mysqli_error($Conn)); 
                                                                    }
                                                                    echo '<td align="left">';
                                                                    echo '  '.$harga_multi.'';
                                                                    echo '</td>';
                                                                    $Col++;
                                                                }
                                                            }
                                                            echo '  <td>'.$stok.'</td>';
                                                            echo '  <td class="text-success">Import Berhasil</td>';
                                                            echo '</tr>';
                                                        }else{
                                                            echo '<tr>';
                                                            echo '  <td>'.$no2.'</td>';
                                                            echo '  <td>'.$id_barang.'</td>';
                                                            echo '  <td>'.$kode_barang.'</td>';
                                                            echo '  <td>'.$nama_barang.'</td>';
                                                            echo '  <td>'.$kategori.'</td>';
                                                            echo '  <td>'.$satuan.'</td>';
                                                            echo '  <td>'.$konversi.'</td>';
                                                            echo '  <td>'.$harga.'</td>';
                                                            if(!empty($JmlKategori)){
                                                                $Col=1;
                                                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                                    $ColData=6+$Col;
                                                                    $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                                    echo '<td align="left">';
                                                                    echo '  '.$harga_multi.'';
                                                                    echo '</td>';
                                                                    $Col++;
                                                                }
                                                            }
                                                            echo '  <td>'.$stok.'</td>';
                                                            echo '  <td class="text-danger">Import Gagal</td>';
                                                            echo '</tr>';
                                                        }
                                                    }else{
                                                        $UpdateBarang = mysqli_query($Conn,"UPDATE barang SET 
                                                            kode_barang='$kode_barang',
                                                            nama_barang='$nama_barang',
                                                            kategori_barang='$kategori',
                                                            satuan_barang='$satuan',
                                                            konversi='$konversi',
                                                            harga_beli='$harga',
                                                            stok_barang='$stok'
                                                        WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                                                        if($UpdateBarang){
                                                            echo '<tr>';
                                                            echo '  <td>'.$no2.'</td>';
                                                            echo '  <td>'.$id_barang.'</td>';
                                                            echo '  <td>'.$kode_barang.'</td>';
                                                            echo '  <td>'.$nama_barang.'</td>';
                                                            echo '  <td>'.$kategori.'</td>';
                                                            echo '  <td>'.$satuan.'</td>';
                                                            echo '  <td>'.$konversi.'</td>';
                                                            echo '  <td>'.$harga.'</td>';
                                                            if(!empty($JmlKategori)){
                                                                $Col=1;
                                                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                                    $KategoriHarga= $DataKategori['kategori_harga'];
                                                                    $ColData=6+$Col;
                                                                    $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                                    $ValidasiDuplikatHarga=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_harga WHERE id_barang='$id_barang' AND kategori_harga='$KategoriHarga'"));
                                                                    if(empty($ValidasiDuplikatHarga)){
                                                                        //Simpan Harga
                                                                        $EntriHargaBarang="INSERT INTO barang_harga (
                                                                            id_barang,
                                                                            id_barang_satuan,
                                                                            kategori_harga,
                                                                            harga
                                                                        ) VALUES (
                                                                            '$id_barang',
                                                                            '0',
                                                                            '$KategoriHarga',
                                                                            '$harga_multi'
                                                                        )";
                                                                        $InputHargaBarang=mysqli_query($Conn, $EntriHargaBarang);
                                                                    }else{
                                                                        $UpdateHargaBarang = mysqli_query($Conn,"UPDATE barang_harga SET 
                                                                            harga='$harga_multi'
                                                                        WHERE id_barang='$id_barang' AND kategori_harga='$KategoriHarga'") or die(mysqli_error($Conn)); 
                                                                    }
                                                                    echo '<td align="left">';
                                                                    echo '  '.$harga_multi.'';
                                                                    echo '</td>';
                                                                    $Col++;
                                                                }
                                                            }
                                                            echo '  <td>'.$stok.'</td>';
                                                            echo '  <td class="text-success">Update Berhasil</td>';
                                                            echo '</tr>';
                                                        }else{
                                                            echo '<tr>';
                                                            echo '  <td>'.$no2.'</td>';
                                                            echo '  <td>'.$id_barang.'</td>';
                                                            echo '  <td>'.$kode_barang.'</td>';
                                                            echo '  <td>'.$nama_barang.'</td>';
                                                            echo '  <td>'.$kategori.'</td>';
                                                            echo '  <td>'.$satuan.'</td>';
                                                            echo '  <td>'.$konversi.'</td>';
                                                            echo '  <td>'.$harga.'</td>';
                                                            if(!empty($JmlKategori)){
                                                                $Col=1;
                                                                $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                                                while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                                    $ColData=6+$Col;
                                                                    $harga_multi=isset($Row[$ColData]) ? $Row[$ColData] : '';
                                                                    echo '<td align="left">';
                                                                    echo '  '.$harga_multi.'';
                                                                    echo '</td>';
                                                                    $Col++;
                                                                }
                                                            }
                                                            echo '  <td>'.$stok.'</td>';
                                                            echo '  <td class="text-danger">Update gagal</td>';
                                                            echo '</tr>';
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }  
                            }    
                        } 
                        $no++;   
                        $no2++;   
                    }
                }   
            }
            echo '</table>';
        }
    }
?>