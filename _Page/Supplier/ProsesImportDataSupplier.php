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
                    $id_supplier=isset($Row[0]) ? $Row[0] : '';
                    $nama_supplier=isset($Row[1]) ? $Row[1] : '';
                    $alamat_supplier=isset($Row[2]) ? $Row[2] : '';
                    $email=isset($Row[3]) ? $Row[3] : '';
                    $kontak=isset($Row[4]) ? $Row[4] : '';
                    if($id_supplier=="ID Supplier"){
                        echo '
                        <tr>
                        <td align="center">NO</td>
                        <td align="center">'.$id_supplier.'</td>
                        <td align="center">'.$nama_supplier.'</td>
                        <td align="center">'.$kontak.'</td>
                        <td align="center">'.$email.'</td>
                        <td align="center">'.$alamat_supplier.'</td>
                        <td align="center">Log</td>
                        </tr>';
                    }else{
                        //Validasi id_supplier
                        $ValidasiSupplier=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier WHERE id_supplier='$id_supplier'"));
                        //Validasi nomor kontak hanya boleh angka
                        if($nama_supplier==""){
                            echo '
                                <tr>
                                <td>'.$no2.'</td>
                                <td align="center">'.$id_supplier.'</td>
                                <td align="center">'.$nama_supplier.'</td>
                                <td align="center">'.$kontak.'</td>
                                <td align="center">'.$email.'</td>
                                <td align="center">'.$alamat_supplier.'</td>
                                <td class="text-danger">Nama Supplier Tidak Boleh Kosong!</td>
                                </tr>';
                        }else{
                            if(!preg_match("/^[0-9]*$/", $kontak)){
                                echo '
                                <tr>
                                <td>'.$no2.'</td>
                                <td align="center">'.$id_supplier.'</td>
                                <td align="center">'.$nama_supplier.'</td>
                                <td align="center">'.$kontak.'</td>
                                <td align="center">'.$email.'</td>
                                <td align="center">'.$alamat_supplier.'</td>
                                <td class="text-danger">Kontak Hanya Boleh Angka!</td>
                                </tr>';
                            }else{ 
                                if(!preg_match("/^[0-9]*$/", $id_supplier)){
                                    echo '
                                    <tr>
                                    <td>'.$no2.'</td>
                                    <td align="center">'.$id_supplier.'</td>
                                    <td align="center">'.$nama_supplier.'</td>
                                    <td align="center">'.$kontak.'</td>
                                    <td align="center">'.$email.'</td>
                                    <td align="center">'.$alamat_supplier.'</td>
                                    <td class="text-danger">ID supplier tidak boleh kosong!</td>
                                    </tr>';
                                }else{
                                    if(empty($ValidasiSupplier)){
                                        //Apabila tidak ditemukan atau kosong berarti baru
                                        $EntrySupplier="INSERT INTO supplier (
                                            id_supplier,
                                            nama_supplier,
                                            alamat_supplier,
                                            email_supplier,
                                            kontak_supplier
                                        ) VALUES (
                                            '$id_supplier',
                                            '$nama_supplier',
                                            '$alamat_supplier',
                                            '$email',
                                            '$kontak'
                                        )";
                                        $InputSupplier=mysqli_query($Conn, $EntrySupplier);
                                        if($InputSupplier){
                                            echo '
                                            <tr>
                                            <td>'.$no2.'</td>
                                            <td align="center">'.$id_supplier.'</td>
                                            <td align="center">'.$nama_supplier.'</td>
                                            <td align="center">'.$kontak.'</td>
                                            <td align="center">'.$email.'</td>
                                            <td align="center">'.$alamat_supplier.'</td>
                                            <td class="text-success">Import Supplier Baru Berhasil!</td>
                                            </tr>';
                                        }else{
                                            echo '
                                            <tr>
                                            <td>'.$no2.'</td>
                                            <td align="center">'.$id_supplier.'</td>
                                            <td align="center">'.$nama_supplier.'</td>
                                            <td align="center">'.$kontak.'</td>
                                            <td align="center">'.$email.'</td>
                                            <td align="center">'.$alamat_supplier.'</td>
                                            <td class="text-danger">Import Supplier Baru Gagal!</td>
                                            </tr>';
                                        }
                                    }else{
                                        $UpdateSupplier = mysqli_query($Conn,"UPDATE supplier SET 
                                            nama_supplier='$nama_supplier',
                                            email_supplier='$email',
                                            kontak_supplier='$kontak',
                                            alamat_supplier='$alamat_supplier'
                                        WHERE id_supplier='$id_supplier'") or die(mysqli_error($Conn)); 
                                        if($UpdateSupplier){
                                            echo '
                                            <tr>
                                            <td>'.$no2.'</td>
                                            <td align="center">'.$id_supplier.'</td>
                                            <td align="center">'.$nama_supplier.'</td>
                                            <td align="center">'.$kontak.'</td>
                                            <td align="center">'.$email.'</td>
                                            <td align="center">'.$alamat_supplier.'</td>
                                            <td class="text-success">Udate Supplier Baru Berhasil!</td>
                                            </tr>';
                                        }else{
                                            echo '
                                            <tr>
                                            <td>'.$no2.'</td>
                                            <td align="center">'.$id_supplier.'</td>
                                            <td align="center">'.$nama_supplier.'</td>
                                            <td align="center">'.$kontak.'</td>
                                            <td align="center">'.$email.'</td>
                                            <td align="center">'.$alamat_supplier.'</td>
                                            <td class="text-success">Udate Supplier Baru Gagal!</td>
                                            </tr>';
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