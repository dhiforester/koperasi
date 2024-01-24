<?php
    //Koneksi
    // ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
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
                    $id_simpanan=isset($Row[0]) ? $Row[0] : '';
                    $id_anggota=isset($Row[1]) ? $Row[1] : '';
                    $nama=isset($Row[2]) ? $Row[2] : '';
                    $tanggal=isset($Row[3]) ? $Row[3] : '';
                    $kategori=isset($Row[4]) ? $Row[4] : '';
                    $keterangan=isset($Row[5]) ? $Row[5] : '';
                    $jumlah=isset($Row[6]) ? $Row[6] : '';
                    if($id_simpanan=="ID Simpanan"){
                        echo '
                        <tr>
                        <td align="center">'.$id_simpanan.'</td>
                        <td align="center">'.$id_anggota.'</td>
                        <td align="center">'.$nama.'</td>
                        <td align="center">'.$tanggal.'</td>
                        <td align="center">'.$kategori.'</td>
                        <td align="center">'.$keterangan.'</td>
                        <td align="center">'.$jumlah.'</td>
                        <td align="center">Log</td>
                        </tr>';
                    }else{
                        if($kategori!=="Simpanan Pokok"&&$kategori!=="Simpanan Wajib"&&$kategori!=="Simpanan Sukarela"&&$kategori!=="Penarikan"){
                            $ValidasiKategori="Tidak Valid";
                        }else{
                            $ValidasiKategori="";
                        }
                        //Validasi id_simpanan
                        $ValidasiSimpanan=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_simpanan='$id_simpanan'"));
                        //Validasi id_anggota
                        $ValidasiAnggota=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE id_anggota='$id_anggota'"));
                        //Validasi nomor kontak hanya boleh angka
                        if($ValidasiKategori!==""){
                            echo '
                                <tr>
                                <td align="center">'.$id_simpanan.'</td>
                                <td align="center">'.$id_anggota.'</td>
                                <td align="center">'.$nama.'</td>
                                <td align="center">'.$tanggal.'</td>
                                <td align="center">'.$kategori.'</td>
                                <td align="center">'.$keterangan.'</td>
                                <td align="center">'.$jumlah.'</td>
                                <td class="text-danger">Kategori Tidak Valid!</td>
                                </tr>';
                        }else{
                            //Tanggal masuk tidak boleh kosong
                            if(empty($id_anggota)){
                                echo '
                                <tr>
                                <td align="center">'.$id_simpanan.'</td>
                                <td align="center">'.$id_anggota.'</td>
                                <td align="center">'.$nama.'</td>
                                <td align="center">'.$tanggal.'</td>
                                <td align="center">'.$kategori.'</td>
                                <td align="center">'.$keterangan.'</td>
                                <td align="center">'.$jumlah.'</td>
                                <td class="text-danger">Id Anggota tidak boleh kosong!</td>
                                </tr>';
                            }else{
                                if(empty($nama)){
                                    echo '
                                    <tr>
                                    <td align="center">'.$id_simpanan.'</td>
                                    <td align="center">'.$id_anggota.'</td>
                                    <td align="center">'.$nama.'</td>
                                    <td align="center">'.$tanggal.'</td>
                                    <td align="center">'.$kategori.'</td>
                                    <td align="center">'.$keterangan.'</td>
                                    <td align="center">'.$jumlah.'</td>
                                    <td class="text-danger">Nama anggota tidak boleh kosong!</td>
                                    </tr>';
                                }else{
                                    if(empty($tanggal)){
                                        echo '
                                        <tr>
                                        <td align="center">'.$id_simpanan.'</td>
                                        <td align="center">'.$id_anggota.'</td>
                                        <td align="center">'.$nama.'</td>
                                        <td align="center">'.$tanggal.'</td>
                                        <td align="center">'.$kategori.'</td>
                                        <td align="center">'.$keterangan.'</td>
                                        <td align="center">'.$jumlah.'</td>
                                        <td class="text-danger">Tanggal tidak boleh kosong!</td>
                                        </tr>';
                                    }else{
                                        if(empty($kategori)){
                                            echo '
                                            <tr>
                                            <td align="center">'.$id_simpanan.'</td>
                                            <td align="center">'.$id_anggota.'</td>
                                            <td align="center">'.$nama.'</td>
                                            <td align="center">'.$tanggal.'</td>
                                            <td align="center">'.$kategori.'</td>
                                            <td align="center">'.$keterangan.'</td>
                                            <td align="center">'.$jumlah.'</td>
                                            <td class="text-danger">Kategori tidak boleh kosong!</td>
                                            </tr>';
                                        }else{
                                            if(!preg_match("/^[0-9]*$/", $jumlah)){
                                                echo '
                                                <tr>
                                                <td align="center">'.$id_simpanan.'</td>
                                                <td align="center">'.$id_anggota.'</td>
                                                <td align="center">'.$nama.'</td>
                                                <td align="center">'.$tanggal.'</td>
                                                <td align="center">'.$kategori.'</td>
                                                <td align="center">'.$keterangan.'</td>
                                                <td align="center">'.$jumlah.'</td>
                                                <td class="text-danger">Jumlah Hanya Boleh Angka!</td>
                                                </tr>';
                                            }else{ 
                                                if(empty($ValidasiAnggota)){
                                                    echo '
                                                    <tr>
                                                    <td align="center">'.$id_simpanan.'</td>
                                                    <td align="center">'.$id_anggota.'</td>
                                                    <td align="center">'.$nama.'</td>
                                                    <td align="center">'.$tanggal.'</td>
                                                    <td align="center">'.$kategori.'</td>
                                                    <td align="center">'.$keterangan.'</td>
                                                    <td align="center">'.$jumlah.'</td>
                                                    <td class="text-danger">ID Anggota tidak Valid!</td>
                                                    </tr>';
                                                }else{
                                                    if(empty($ValidasiSimpanan)){
                                                        //Apabila id_anggota tidak ditemukan atau kosong berarti baru
                                                        $EntriSimpanan="INSERT INTO simpanan (
                                                            id_simpanan,
                                                            id_anggota,
                                                            id_akses,
                                                            nama,
                                                            tanggal,
                                                            kategori,
                                                            keterangan,
                                                            jumlah
                                                        ) VALUES (
                                                            '$id_simpanan',
                                                            '$id_anggota',
                                                            '$SessionIdAkses',
                                                            '$nama',
                                                            '$tanggal',
                                                            '$kategori',
                                                            '$keterangan',
                                                            '$jumlah'
                                                        )";
                                                        $InputSimpanan=mysqli_query($Conn, $EntriSimpanan);
                                                        if($InputSimpanan){
                                                            echo '
                                                            <tr>
                                                            <td align="center">'.$id_simpanan.'</td>
                                                            <td align="center">'.$id_anggota.'</td>
                                                            <td align="center">'.$nama.'</td>
                                                            <td align="center">'.$tanggal.'</td>
                                                            <td align="center">'.$kategori.'</td>
                                                            <td align="center">'.$keterangan.'</td>
                                                            <td align="center">'.$jumlah.'</td>
                                                            <td class="text-success">Import Simpanan Baru Berhasil!</td>
                                                            </tr>';
                                                        }else{
                                                            echo '
                                                            <tr>
                                                            <td align="center">'.$id_simpanan.'</td>
                                                            <td align="center">'.$id_anggota.'</td>
                                                            <td align="center">'.$nama.'</td>
                                                            <td align="center">'.$tanggal.'</td>
                                                            <td align="center">'.$kategori.'</td>
                                                            <td align="center">'.$keterangan.'</td>
                                                            <td align="center">'.$jumlah.'</td>
                                                            <td class="text-danger">Import Simpanan Baru Gagal!</td>
                                                            </tr>';
                                                        }
                                                    }else{
                                                        $UpdateSimpanan = mysqli_query($Conn,"UPDATE simpanan SET 
                                                            id_anggota='$id_anggota',
                                                            nama='$nama',
                                                            tanggal='$tanggal',
                                                            kategori='$kategori',
                                                            keterangan='$keterangan',
                                                            jumlah='$jumlah'
                                                        WHERE id_simpanan='$id_simpanan'") or die(mysqli_error($Conn)); 
                                                        if($UpdateSimpanan){
                                                            echo '
                                                            <tr>
                                                            <td align="center">'.$id_simpanan.'</td>
                                                            <td align="center">'.$id_anggota.'</td>
                                                            <td align="center">'.$nama.'</td>
                                                            <td align="center">'.$tanggal.'</td>
                                                            <td align="center">'.$kategori.'</td>
                                                            <td align="center">'.$keterangan.'</td>
                                                            <td align="center">'.$jumlah.'</td>
                                                            <td class="text-success">Udate Simpanan Berhasil!</td>
                                                            </tr>';
                                                        }else{
                                                            echo '
                                                            <tr>
                                                            <td align="center">'.$id_simpanan.'</td>
                                                            <td align="center">'.$id_anggota.'</td>
                                                            <td align="center">'.$nama.'</td>
                                                            <td align="center">'.$tanggal.'</td>
                                                            <td align="center">'.$kategori.'</td>
                                                            <td align="center">'.$keterangan.'</td>
                                                            <td align="center">'.$jumlah.'</td>
                                                            <td class="text-success">Udate Simpanan Gagal!</td>
                                                            </tr>';
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