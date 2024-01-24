<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_jurnal'])){
        echo '<span class="text-danger">ID Jurnal Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['tanggal'])){
            echo '<span class="text-danger">Tanggal Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['id_shu_session'])){
                echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['id_perkiraan'])){
                    echo '<span class="text-danger">ID Perkiraan Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['d_k'])){
                        echo '<span class="text-danger">Debet Kredit Tidak Boleh Kosong!</span>';
                    }else{
                        if(empty($_POST['nilai'])){
                            echo '<span class="text-danger">Nilai Saldo Jurnal Tidak Boleh Kosong!</span>';
                        }else{
                            $id_jurnal=$_POST['id_jurnal'];
                            $tanggal=$_POST['tanggal'];
                            $id_shu_session=$_POST['id_shu_session'];
                            $id_perkiraan=$_POST['id_perkiraan'];
                            $d_k=$_POST['d_k'];
                            $nilai=$_POST['nilai'];
                            //Buka data akun perkiraan
                            $Qry = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'")or die(mysqli_error($Conn));
                            $Data = mysqli_fetch_array($Qry);
                            $kode = $Data['kode'];
                            $nama = $Data['nama'];
                            $nilai= str_replace(".", "", $nilai);
                            if(!preg_match("/^[0-9]*$/", $nilai)){
                                echo '<small class="text-danger">Nilai Hanya Boleh Angka!</small>'; 
                            }else{
                                $UpdateJurnal = mysqli_query($Conn,"UPDATE jurnal SET 
                                    id_shu_session='$id_shu_session',
                                    id_perkiraan='$id_perkiraan',
                                    tanggal='$tanggal',
                                    kode_perkiraan='$kode',
                                    nama_perkiraan='$nama',
                                    d_k='$d_k',
                                    nilai='$nilai'
                                WHERE id_jurnal='$id_jurnal'") or die(mysqli_error($Conn)); 
                                if($UpdateJurnal){
                                    echo '<small class="text-success" id="NotifikasiEditJurnalBerhasil">Success</small>';
                                }else{
                                    echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data jurnal!</span>';
                                }
                            }
                        }
                    }
                }
            }
        }   
    }   
?>