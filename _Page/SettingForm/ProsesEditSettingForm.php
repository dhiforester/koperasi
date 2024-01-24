<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Waktu
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $updatetime=date('Y-m-d H:i:s');
    //Variabel id_form_medrek
    if(empty($_POST['id_form_medrek'])){
        echo '<span class="text-danger">ID Form Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['nama_form_medrek'])){
            echo '<span class="text-danger">Nama Form Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['deskripsi_form_medrek'])){
                echo '<span class="text-danger">Deskripsi Form Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['form_medrek'])){
                    echo '<span class="text-danger">Tamplate Form Tidak Boleh Kosong!</span>';
                }else{
                    $id_form_medrek=$_POST['id_form_medrek'];
                    $nama_form_medrek=$_POST['nama_form_medrek'];
                    $deskripsi_form_medrek=$_POST['deskripsi_form_medrek'];
                    $form_medrek=$_POST['form_medrek'];
                    //Simpan data
                    $UpdateSettingForm = mysqli_query($Conn,"UPDATE form_medrek SET 
                        nama_form_medrek='$nama_form_medrek',
                        deskripsi_form_medrek='$deskripsi_form_medrek',
                        form_medrek='$form_medrek',
                        updatetime='$updatetime'
                    WHERE id_form_medrek='$id_form_medrek'") or die(mysqli_error($Conn)); 
                    if($UpdateSettingForm){
                        $id_mitra=$SessionIdMitra;
                        $KategoriLog="Update Form Setting";
                        $KeteranganLog="Update Form Setting Berhasil";
                        include "../../_Config/InputLog.php";
                        $_SESSION ["NotifikasiSwal"]="Simpan Form Setting Berhasil";
                        echo '<small class="text-success" id="NotifikasiEditSettingFormBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data!</small>';
                    }
                }
            }
        }
    }
?>