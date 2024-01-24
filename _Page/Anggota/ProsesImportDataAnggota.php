<?php
    //Koneksi
    // ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    require "../../vendor/excel_reader/php-excel-reader/excel_reader2.php";
    require "../../vendor/excel_reader/SpreadsheetReader.php";
    //Validasi file
    if(empty(explode(".",$_FILES['file_anggota']['name']))){
        echo '<span class="text-danger">File belum dipilih</span>';
    }else{
        $ekstensi = explode(".",$_FILES['file_anggota']['name']);
        $file_extension = end($ekstensi);
        if($file_extension != 'xls' && $file_extension != 'xlsx'){
            echo '<span class="text-danger">File yang diperbolehkan hanya file Excel</span>';
        }else{
            $uploadFilePath = 'uploads/'.basename($_FILES['file_anggota']['name']);
            move_uploaded_file($_FILES['file_anggota']['tmp_name'], $uploadFilePath);
            $Reader = new SpreadsheetReader($uploadFilePath);
            $totalSheet = count($Reader->sheets());
            echo '<table class="table table-responsive table-bordered">';
            for ($i=0; $i<=$totalSheet; $i++){
                $i=$i+1;
                $Reader->ChangeSheet($i);
                $no=0;
                $no2=1;
                foreach ($Reader as $Row){
                    $id_anggota=isset($Row[0]) ? $Row[0] : '';
                    $tanggal_masuk=isset($Row[1]) ? $Row[1] : '';
                    $nip=isset($Row[2]) ? $Row[2] : '';
                    $nama=isset($Row[3]) ? $Row[3] : '';
                    $email=isset($Row[4]) ? $Row[4] : '';
                    $kontak=isset($Row[5]) ? $Row[5] : '';
                    $status=isset($Row[6]) ? $Row[6] : '';
                    if($id_anggota=="ID Anggota"){
                        echo '
                        <tr>
                        <td align="center">NO</td>
                        <td align="center">'.$id_anggota.'</td>
                        <td align="center">'.$tanggal_masuk.'</td>
                        <td align="center">'.$nip.'</td>
                        <td align="center">'.$nama.'</td>
                        <td align="center">'.$email.'</td>
                        <td align="center">'.$kontak.'</td>
                        <td align="center">'.$status.'</td>
                        <td align="center">Log</td>
                        </tr>';
                    }else{
                        if($status!=="Active"&&$status!=="Resign"&&$status!=="Non-Active"){
                            $ValidasiStatus="Tidak Valid";
                        }else{
                            $ValidasiStatus="";
                        }
                        //Validasi id_anggota
                        $ValidasiAnggota=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE id_anggota='$id_anggota'"));
                        //Validasi nomor kontak hanya boleh angka
                        if($ValidasiStatus!==""){
                            echo '
                                <tr>
                                <td>'.$no2.'</td>
                                <td>'.$id_anggota.'</td>
                                <td>'.$tanggal_masuk.'</td>
                                <td>'.$nip.'</td>
                                <td>'.$nama.'</td>
                                <td>'.$email.'</td>
                                <td>'.$kontak.'</td>
                                <td>'.$status.'</td>
                                <td class="text-danger">Status Anggota Hanya Boleh Active atau Resign atau Non-Active!</td>
                                </tr>';
                        }else{
                            //Tanggal masuk tidak boleh kosong
                            if(empty($tanggal_masuk)){
                                echo '
                                <tr>
                                <td>'.$no2.'</td>
                                <td>'.$id_anggota.'</td>
                                <td>'.$tanggal_masuk.'</td>
                                <td>'.$nip.'</td>
                                <td>'.$nama.'</td>
                                <td>'.$email.'</td>
                                <td>'.$kontak.'</td>
                                <td>'.$status.'</td>
                                <td class="text-danger">Tanggal masuk tidak boleh kosong!</td>
                                </tr>';
                            }else{
                                if(empty($nama)){
                                    echo '
                                    <tr>
                                    <td>'.$no2.'</td>
                                    <td>'.$id_anggota.'</td>
                                    <td>'.$tanggal_masuk.'</td>
                                    <td>'.$nip.'</td>
                                    <td>'.$nama.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$kontak.'</td>
                                    <td>'.$status.'</td>
                                    <td class="text-danger">Nama anggota tidak boleh kosong!</td>
                                    </tr>';
                                }else{
                                    if(empty($status)){
                                        echo '
                                        <tr>
                                        <td>'.$no2.'</td>
                                        <td>'.$id_anggota.'</td>
                                        <td>'.$tanggal_masuk.'</td>
                                        <td>'.$nip.'</td>
                                        <td>'.$nama.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$kontak.'</td>
                                        <td>'.$status.'</td>
                                        <td class="text-danger">Status tidak boleh kosong!</td>
                                        </tr>';
                                    }else{
                                        if(empty($id_anggota)){
                                            echo '
                                            <tr>
                                            <td>'.$no2.'</td>
                                            <td>'.$id_anggota.'</td>
                                            <td>'.$tanggal_masuk.'</td>
                                            <td>'.$nip.'</td>
                                            <td>'.$nama.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.$kontak.'</td>
                                            <td>'.$status.'</td>
                                            <td class="text-danger">ID Anggota tidak boleh kosong!</td>
                                            </tr>';
                                        }else{
                                            if(!preg_match("/^[0-9]*$/", $kontak)){
                                            echo '
                                            <tr>
                                            <td>'.$no2.'</td>
                                            <td>'.$id_anggota.'</td>
                                            <td>'.$tanggal_masuk.'</td>
                                            <td>'.$nip.'</td>
                                            <td>'.$nama.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.$kontak.'</td>
                                            <td>'.$status.'</td>
                                            <td class="text-danger">ontak Hanya Boleh Angka!</td>
                                            </tr>';
                                            }else{ 
                                                if(!preg_match("/^[0-9]*$/", $id_anggota)){
                                                    echo '
                                                    <tr>
                                                    <td>'.$no2.'</td>
                                                    <td>'.$id_anggota.'</td>
                                                    <td>'.$tanggal_masuk.'</td>
                                                    <td>'.$nip.'</td>
                                                    <td>'.$nama.'</td>
                                                    <td>'.$email.'</td>
                                                    <td>'.$kontak.'</td>
                                                    <td>'.$status.'</td>
                                                    <td class="text-danger">ID Anggota tidak boleh kosong!</td>
                                                    </tr>';
                                                }else{
                                                    //Format Tanggal
                                                    // $strtotime=strtotime($tanggal_masuk);
                                                    // $tanggal_masuk=date('Y-m-d',$tanggal_masuk);
                                                    if(empty($ValidasiAnggota)){
                                                        //Apabila id_anggota tidak ditemukan atau kosong berarti baru
                                                        $EntryAnggota="INSERT INTO anggota (
                                                            id_anggota,
                                                            tanggal_masuk,
                                                            nip,
                                                            nama,
                                                            email,
                                                            kontak,
                                                            status
                                                        ) VALUES (
                                                            '$id_anggota',
                                                            '$tanggal_masuk',
                                                            '$nip',
                                                            '$nama',
                                                            '$email',
                                                            '$kontak',
                                                            '$status'
                                                        )";
                                                        $InputAnggota=mysqli_query($Conn, $EntryAnggota);
                                                        if($InputAnggota){
                                                            echo '
                                                            <tr>
                                                            <td>'.$no2.'</td>
                                                            <td>'.$id_anggota.'</td>
                                                            <td>'.$tanggal_masuk.'</td>
                                                            <td>'.$nip.'</td>
                                                            <td>'.$nama.'</td>
                                                            <td>'.$email.'</td>
                                                            <td>'.$kontak.'</td>
                                                            <td>'.$status.'</td>
                                                            <td class="text-success">Import Anggota Baru Berhasil!</td>
                                                            </tr>';
                                                        }else{
                                                            echo '
                                                            <tr>
                                                            <td>'.$no2.'</td>
                                                            <td>'.$id_anggota.'</td>
                                                            <td>'.$tanggal_masuk.'</td>
                                                            <td>'.$nip.'</td>
                                                            <td>'.$nama.'</td>
                                                            <td>'.$email.'</td>
                                                            <td>'.$kontak.'</td>
                                                            <td>'.$status.'</td>
                                                            <td class="text-danger">Import Anggota Baru Gagal!</td>
                                                            </tr>';
                                                        }
                                                    }else{
                                                        $UpdateAnggota = mysqli_query($Conn,"UPDATE anggota SET 
                                                            tanggal_masuk='$tanggal_masuk',
                                                            nip='$nip',
                                                            nama='$nama',
                                                            email='$email',
                                                            kontak='$kontak',
                                                            status='$status'
                                                        WHERE id_anggota='$id_anggota'") or die(mysqli_error($Conn)); 
                                                        if($UpdateAnggota){
                                                            echo '
                                                            <tr>
                                                            <td>'.$no2.'</td>
                                                            <td>'.$id_anggota.'</td>
                                                            <td>'.$tanggal_masuk.'</td>
                                                            <td>'.$nip.'</td>
                                                            <td>'.$nama.'</td>
                                                            <td>'.$email.'</td>
                                                            <td>'.$kontak.'</td>
                                                            <td>'.$status.'</td>
                                                            <td class="text-success">Udate Anggota Baru Berhasil!</td>
                                                            </tr>';
                                                        }else{
                                                            echo '
                                                            <tr>
                                                            <td>'.$no2.'</td>
                                                            <td>'.$id_anggota.'</td>
                                                            <td>'.$tanggal_masuk.'</td>
                                                            <td>'.$nip.'</td>
                                                            <td>'.$nama.'</td>
                                                            <td>'.$email.'</td>
                                                            <td>'.$kontak.'</td>
                                                            <td>'.$status.'</td>
                                                            <td class="text-success">Udate Anggota Baru Gagal!</td>
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