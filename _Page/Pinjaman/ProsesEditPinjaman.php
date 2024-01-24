<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Menangkap data wilayah
    if(empty($_POST['id_pinjaman'])){
        echo "<span class='text-danger'>ID Pinjaman Tidak Boleh Kosong!!</span>";
    }else{
        if(empty($_POST['tanggal_pinjaman'])){
            echo "<span class='text-danger'>Tanggal Pinjaman Tidak Boleh Kosong!!</span>";
        }else{
            if(empty($_POST['jumlah_pinjaman'])){
                echo "<span class='text-danger'>Jumlah Pinjaman Tidak Boleh Kosong!!</span>";
            }else{
                if(empty($_POST['nilai_angsuran'])){
                    echo "<span class='text-danger'>Nilai Angsuran Tidak Boleh Kosong!!</span>";
                }else{
                    if(empty($_POST['periode_angsuran'])){
                        echo "<span class='text-danger'>Periode Angsuran Tidak Boleh Kosong!!</span>";
                    }else{
                        if(empty($_POST['status'])){
                            echo "<span class='text-danger'>Status Pinjaman Tidak Boleh Kosong!!</span>";
                        }else{
                            if(empty($_POST['persen_jasa'])){
                                $persen_jasa=0;
                            }else{
                                $persen_jasa=$_POST['persen_jasa'];
                            }
                            if(empty($_POST['estimasi_jasa'])){
                                $estimasi_jasa=0;
                            }else{
                                $estimasi_jasa=$_POST['estimasi_jasa'];
                            }
                            $id_pinjaman=$_POST['id_pinjaman'];
                            $tanggal_pinjaman=$_POST['tanggal_pinjaman'];
                            $jumlah_pinjaman=$_POST['jumlah_pinjaman'];
                            $nilai_angsuran=$_POST['nilai_angsuran'];
                            $periode_angsuran=$_POST['periode_angsuran'];
                            $status=$_POST['status'];
                            $jumlah_pinjaman= str_replace(".", "", $jumlah_pinjaman);
                            $nilai_angsuran= str_replace(".", "", $nilai_angsuran);
                            $periode_angsuran= str_replace(".", "", $periode_angsuran);
                            $persen_jasa= str_replace(".", "", $persen_jasa);
                            $estimasi_jasa= str_replace(".", "", $estimasi_jasa);
                            if(!preg_match("/^[0-9]*$/", $jumlah_pinjaman)){
                                echo '<tr><td colspan="7">Jumlah Pinjaman Hanya Boleh Angka</td></tr>'; 
                            }else{
                                if(!preg_match("/^[0-9]*$/", $nilai_angsuran)){
                                    echo '<tr><td colspan="7">Nilai Angsuran Hanya Boleh Angka</td></tr>'; 
                                }else{
                                    if(!preg_match("/^[0-9]*$/", $periode_angsuran)){
                                        echo '<tr><td colspan="7">Periode Angsuran Hanya Boleh Angka</td></tr>'; 
                                    }else{
                                        if(!preg_match("/^[0-9]*$/", $persen_jasa)){
                                            echo '<tr><td colspan="7">Periode Jasa Hanya Boleh Angka</td></tr>'; 
                                        }else{
                                            if(!preg_match("/^[0-9]*$/", $estimasi_jasa)){
                                                echo '<tr><td colspan="7">Estimasi Jasa Hanya Boleh Angka</td></tr>'; 
                                            }else{
                                                $UpdatePinjaman = mysqli_query($Conn,"UPDATE pinjaman SET 
                                                    tanggal_pinjaman='$tanggal_pinjaman',
                                                    jumlah_pinjaman='$jumlah_pinjaman',
                                                    persen_jasa='$persen_jasa',
                                                    estimasi_jasa='$estimasi_jasa',
                                                    nilai_angsuran='$nilai_angsuran',
                                                    periode_angsuran='$periode_angsuran',
                                                    status='$status'
                                                WHERE id_pinjaman='$id_pinjaman'") or die(mysqli_error($Conn)); 
                                                if($UpdatePinjaman){
                                                    $KategoriLog="Pinjaman";
                                                    $KeteranganLog="Edit Pinjaman Berhasil";
                                                    include "../../_Config/InputLog.php";
                                                    echo '<small class="text-success" id="NotifikasiEditPinjamanBerhasil">Success</small>';
                                                }else{
                                                    echo '<span class="text-danger">Terjadi kesalahan pada saat update data Pinjaman!</span>';
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
?>