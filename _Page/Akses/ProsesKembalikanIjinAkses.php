<?php
    //Koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap Variabel
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">ID Akses Tidak Boleh Kosong!</span>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        if(empty($DataDetailAkses['akses'])){
            echo '<span class="text-danger">ID Akses Tidak Ditemukan Pada Database Akses!</span>';
        }else{
            $Akses= $DataDetailAkses['akses'];
            //Cek entitas akses
            $QryEntitas = mysqli_query($Conn,"SELECT * FROM akses_entitas WHERE akses='$Akses'")or die(mysqli_error($Conn));
            $DataEntitas = mysqli_fetch_array($QryEntitas);
            if(empty($DataEntitas['akses'])){
                echo '<span class="text-danger">Entitas Akses Tersebut Tidak Terdaftar!</span>';
            }else{
                //Hapus Akses lama
                $HapusIjinAksesLama = mysqli_query($Conn, "DELETE FROM akses_ijin WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
                if($HapusIjinAksesLama){
                    $query = mysqli_query($Conn, "SELECT*FROM akses_referensi ORDER BY kode_referensi ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $kode_referensi= $data['kode_referensi'];
                        //Cek pada entitas akses
                        $QryEntitas = mysqli_query($Conn,"SELECT * FROM akses_entitas WHERE akses='$Akses' AND kode_akses='$kode_referensi'")or die(mysqli_error($Conn));
                        $DataEntitas = mysqli_fetch_array($QryEntitas);
                        if(!empty($DataEntitas['akses'])){
                            $entry_lagi="INSERT INTO akses_ijin (
                                id_akses,
                                akses,
                                kode_akses
                            ) VALUES (
                                '$id_akses',
                                '$Akses',
                                '$kode_referensi'
                            )";
                            $InputLagi=mysqli_query($Conn, $entry_lagi);
                        }
                    }
                    $KategoriLog="Akses";
                    $KeteranganLog="Kembalikan Standar Ijin Akses Berhasil";
                    include "../../_Config/InputLog.php";
                    echo '<small class="text-success" id="NotifikasiIjinAksesStandarBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menghapus ijin akses lama</small>';
                }
            }
        }
    }
?>