<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Waktu
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $updatetime=date('Y-m-d H:i:s');
    //Variabel nama_form_medrek
    if(empty($_POST['nama_form_medrek'])){
        echo '<span class="text-danger">Nama Form Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['deskripsi_form_medrek'])){
            echo '<span class="text-danger">Deskripsi Form Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['form_medrek'])){
                echo '<span class="text-danger">Tamplate Form Tidak Boleh Kosong!</span>';
            }else{
                $nama_form_medrek=$_POST['nama_form_medrek'];
                $deskripsi_form_medrek=$_POST['deskripsi_form_medrek'];
                $form_medrek=$_POST['form_medrek'];
                //Proses simpan data
                $entry="INSERT INTO form_medrek (
                    nama_form_medrek,
                    deskripsi_form_medrek,
                    form_medrek,
                    updatetime
                ) VALUES (
                    '$nama_form_medrek',
                    '$deskripsi_form_medrek',
                    '$form_medrek',
                    '$updatetime'
                )";
                $Input=mysqli_query($Conn, $entry);
                if($Input){
                    $id_mitra=$SessionIdMitra;
                    $KategoriLog="Input Form Setting";
                    $KeteranganLog="Input Form Setting Berhasil";
                    include "../../_Config/InputLog.php";
                    $_SESSION ["NotifikasiSwal"]="Simpan Form Setting Berhasil";
                    echo '<small class="text-success" id="NotifikasiTambahSettingFormBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data!</small>';
                }
            }
        }
    }
    
?>