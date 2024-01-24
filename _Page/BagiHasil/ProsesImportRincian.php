<?php
    //Koneksi
    // ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    require "../../vendor/excel_reader/php-excel-reader/excel_reader2.php";
    require "../../vendor/excel_reader/SpreadsheetReader.php";
    //Validasi file
    if(empty(explode(".",$_FILES['file_import']['name']))){
        echo '<tr><td colspan="4" class="text-center"><span class="text-danger">File belum dipilih</span></td></tr>';
    }else{
        if(empty($_POST['id_shu_session'])){
            echo '<tr><td colspan="4" class="text-center"><span class="text-danger">File belum dipilih</span></td></tr>';
        }else{
            $id_shu_session=$_POST['id_shu_session'];
            $ekstensi = explode(".",$_FILES['file_import']['name']);
            $file_extension = end($ekstensi);
            if($file_extension != 'xls' && $file_extension != 'xlsx'){
                echo '<tr><td colspan="4" class="text-center"><span class="text-danger">File yang diperbolehkan hanya file Excel</span></td></tr>';
            }else{
                $uploadFilePath = 'uploads/'.basename($_FILES['file_import']['name']);
                move_uploaded_file($_FILES['file_import']['tmp_name'], $uploadFilePath);
                $Reader = new SpreadsheetReader($uploadFilePath);
                $totalSheet = count($Reader->sheets());
                for ($i=0; $i<=$totalSheet; $i++){
                    $i=$i+1;
                    $Reader->ChangeSheet($i);
                    $no=0;
                    $no2=1;
                    foreach ($Reader as $Row){
                        $id_sessi=isset($Row[0]) ? $Row[0] : '';
                        $id_anggota=isset($Row[1]) ? $Row[1] : '';
                        $nama_anggota=isset($Row[2]) ? $Row[2] : '';
                        $simpanan=isset($Row[3]) ? $Row[3] : '';
                        $pinjaman=isset($Row[4]) ? $Row[4] : '';
                        $penjualan=isset($Row[5]) ? $Row[5] : '';
                        $jasa_simpanan=isset($Row[6]) ? $Row[6] : '';
                        $jasa_pinjaman=isset($Row[7]) ? $Row[7] : '';
                        $jasa_penjualan=isset($Row[8]) ? $Row[8] : '';
                        $shu=isset($Row[9]) ? $Row[9] : '';
                        if($id_sessi=="ID Sessi"){
                            echo '<tr><td colspan="4" class="text-center"><span class="text-success">Header File Sudah Benar!</span></td></tr>';
                        }else{
                            if(empty($id_anggota)){
                                $kategori="None";
                                $ValidasiProses="ID Anggota Tidak Boleh Kosong!";
                            }else{
                                if(empty($nama_anggota)){
                                    $kategori="None";
                                    $ValidasiProses="Nama Anggota Tidak Boleh Kosong!";
                                }else{
                                    //Validasi id_anggota
                                    $CekDataAnggota = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_anggota='$id_anggota' AND id_shu_session='$id_shu_session'"));
                                    if(!empty($CekDataAnggota)){
                                        $kategori="Update";
                                        $UpdateRincian = mysqli_query($Conn,"UPDATE shu_rincian SET 
                                            simpanan='$simpanan',
                                            pinjaman='$pinjaman',
                                            penjualan='$penjualan',
                                            jasa_simpanan='$jasa_simpanan',
                                            jasa_pinjaman='$jasa_pinjaman',
                                            jasa_penjualan='$jasa_penjualan',
                                            shu='$shu'
                                        WHERE id_anggota='$id_anggota' AND id_shu_session='$id_shu_session'") or die(mysqli_error($Conn)); 
                                        if($UpdateRincian){
                                            $ValidasiProses="Success";
                                        }else{
                                            $ValidasiProses="Update Error!";
                                        }
                                    }else{
                                        $kategori="Insert";
                                        //Insert Ke rincian
                                        $EntryData="INSERT INTO shu_rincian (
                                            id_shu_session,
                                            id_anggota,
                                            nama_anggota,
                                            simpanan,
                                            pinjaman,
                                            penjualan,
                                            jasa_simpanan,
                                            jasa_pinjaman,
                                            jasa_penjualan,
                                            shu
                                        ) VALUES (
                                            '$id_shu_session',
                                            '$id_anggota',
                                            '$nama_anggota',
                                            '$simpanan',
                                            '$pinjaman',
                                            '$penjualan',
                                            '$jasa_simpanan',
                                            '$jasa_pinjaman',
                                            '$jasa_penjualan',
                                            '$shu'
                                        )";
                                        $InputData=mysqli_query($Conn, $EntryData);
                                        if($InputData){
                                            $ValidasiProses="Success";
                                        }else{
                                            $ValidasiProses="Insert Error!";
                                        }
                                    }
                                }
                            }
                            echo '
                            <tr>
                            <td>'.$no2.'</td>
                            <td>'.$nama_anggota.'</td>
                            <td>'.$kategori.'</td>
                            <td>'.$ValidasiProses.'</td>
                            </tr>';   
                            $no2++;     
                        }
                    } 
                    //Menghitung Simpanan rincian
                    $SumSimpananAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(simpanan) AS simpanan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                    $JumlahSimpananAnggota = $SumSimpananAnggota['simpanan'];
                    //Hitung Jasa simpanan
                    $SumJasaSimpananAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_simpanan) AS jasa_simpanan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                    $JumlahJasaSimpanan = $SumJasaSimpananAnggota['jasa_simpanan'];
                    //Menghitung Pinjaman rincian
                    $SumPinjamanAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(pinjaman) AS pinjaman FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                    $JumlahPinjamanAnggota = $SumPinjamanAnggota['pinjaman'];
                    //Hitung Jasa Pinjaman
                    $SumJasaPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_pinjaman) AS jasa_pinjaman FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                    $JumlahJasaPinjaman = $SumJasaPinjaman['jasa_pinjaman'];
                    //Menghitung Penjualan
                    $SumPenjualanAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(penjualan) AS penjualan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                    $JumlahPenjualanAnggota = $SumPenjualanAnggota['penjualan'];
                    //Hitung Jasa Penjualan
                    $SumJasaPenjualan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_penjualan) AS jasa_penjualan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                    $JumlahJasaPenjualan = $SumJasaPenjualan['jasa_penjualan'];
                    //Update Ke Sessi
                    $UpdateBagiHasil = mysqli_query($Conn,"UPDATE shu_session SET 
                        modal_anggota='$JumlahSimpananAnggota',
                        penjualan='$JumlahPenjualanAnggota',
                        pinjaman='$JumlahPinjamanAnggota',
                        jasa_modal_anggota='$JumlahJasaSimpanan',
                        laba_penjualan='$JumlahJasaPenjualan',
                        jasa_pinjaman='$JumlahJasaPinjaman'
                    WHERE id_shu_session='$id_shu_session'") or die(mysqli_error($Conn)); 
                    if($UpdateBagiHasil){
                        echo '<tr><td colspan="4" class="text-center"><span class="text-success">Update Sessi Berhasil</span></td></tr>';
                        echo '<tr><td colspan="4" class="text-center"><a href="">Reload Halaman</a></td></tr>';
                    }else{
                        echo '<tr><td colspan="4" class="text-center"><span class="text-danger">Update Sessi Gagal!</span></td></tr>';
                    }  
                }
                echo '</table>';
            }
        }
    }
?>