<?php
    //KONEKSI KE DATABASE
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Tangkap Variabel
    if(empty($_POST['id_perkiraan'])){
        echo '<i class="text-danger">Mohon Maaf!! ID Akun Perkiraan Keuangan Tidak Dapat Ditangkap.</i>';
    }else{
        if(empty($_POST['kode'])){
            echo '<i class="text-danger">Kode Perkiraan Tidak Boleh Kosong.</i>';
        }else{
            if(empty($_POST['nama_perkiraan1'])){
                echo '<i class="text-danger">Nama Perkiraan Tidak Boleh Kosong.</i>';
            }else{
                if(empty($_POST['level_perkiraan'])){
                    echo '<i class="text-danger">Level Perkiraan Tidak Boleh Kosong.</i>';
                }else{
                    if(empty($_POST['saldo_normal'])){
                        echo '<i class="text-danger">Saldo Normal Akun Perkiraan Tidak Boleh Kosong.</i>';
                    }else{
                        $id_perkiraan=$_POST['id_perkiraan'];
                        $kode=$_POST['kode'];
                        $nama=$_POST['nama_perkiraan1'];
                        $level=$_POST['level_perkiraan'];
                        $saldo_normal=$_POST['saldo_normal'];
                        if(empty($_POST['status'])){
                            $status="";
                        }else{
                            $status=$_POST['status'];
                        }
                        //Buka kd data
                        $QryPerkiraan = mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'") or die(mysqli_error($Conn));
                        $DataPerkiraan = mysqli_fetch_array($QryPerkiraan);
                        $kd1=$DataPerkiraan['kd1'];
                        //Proses Update
                        $UpdateKdPerkiraan = mysqli_query($Conn, "UPDATE akun_perkiraan SET 
                            nama='$nama',
                            saldo_normal='$saldo_normal',
                            status='$status'
                        WHERE id_perkiraan='$id_perkiraan'") or die(mysqli_error($Conn)); 
                        //Apabila proses update berhasil maka lakukan update saldo normal untuk anak akunnya level 1
                        if($UpdateKdPerkiraan){
                            //Simpan-pinjam debet
                            $CekAutiJurnalSimpanPinjamDebet=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM auto_jurnal WHERE debet_id='$id_perkiraan'"));
                            //Simpan-pinjam kredit
                            $CekAutiJurnalSimpanPinjamKredit=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM auto_jurnal WHERE kredit_id='$id_perkiraan'"));
                            //Inisiasi labal Pembelian
                            if(!empty($CekAutiJurnalSimpanPinjamDebet)){
                                $UpdateAutoJurnal1 = mysqli_query($Conn, "UPDATE auto_jurnal SET 
                                    debet_name='$nama'
                                WHERE debet_id='$id_perkiraan'") or die(mysqli_error($Conn)); 
                            }
                            if(!empty($CekAutiJurnalSimpanPinjamKredit)){
                                $UpdateAutoJurnal2 = mysqli_query($Conn, "UPDATE auto_jurnal SET 
                                    kredit_name='$nama'
                                WHERE kredit_id='$id_perkiraan'") or die(mysqli_error($Conn)); 
                            }
                            if($level=="1"){
                                $UpdateSaldoNormal = mysqli_query($Conn, "UPDATE akun_perkiraan SET 
                                    saldo_normal='$saldo_normal'
                                WHERE kd1='$kd1'") or die(mysqli_error($Conn)); 
                                if($UpdateSaldoNormal){
                                    echo '<i class="text-success" id="NotifikasiEditAkunPerkiraanBerhasil">Success</i>';
                                }else{
                                    echo '<i class="text-danger">Edit Akun Gagal</i>';
                                }
                            }else{
                                echo '<i class="text-success" id="NotifikasiEditAkunPerkiraanBerhasil">Success</i>';
                            }
                        //Apabila proses update gagal
                        }else{
                            echo '<i class="text-danger">Edit Akun Gagal</i>';
                        }
                    }
                }
            }
        }
    }
?>

