<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    include "../../_Config/SettingEmail.php";
    session_start();
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    $Datetime_generate=date('Y-m-d H:i:s');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi nama tidak boleh kosong
    if(empty($_POST['email'])){
        echo '<small class="text-danger">Email tidak boleh kosong</small>';
    }else{
        //Apakah email tersebut terdata sebagai anggota?
        $email=$_POST['email'];
        //Buka data askes_anggota
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses_anggota WHERE email='$email'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        if(empty($DataDetailAkses['id_akses_anggota'])){
            echo '<small class="text-danger">Email tidak terdaftar pada data akses anggota</small>';
        }else{
            $status=$DataDetailAkses['status'];
            if($status!=="Pending"){
                echo '<small class="text-danger">Email Anda Sudah Valid, Silahkan Hubungi Admin!</small>';
            }else{
                $id_akses_anggota=$DataDetailAkses['id_akses_anggota'];
                $nama_anggota=$DataDetailAkses['nama_anggota'];
                $TokenValidasi=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                //Buka data akses_validasi
                $QryAksesValidasi = mysqli_query($Conn,"SELECT * FROM akses_validasi WHERE id_akses_anggota='$id_akses_anggota'")or die(mysqli_error($Conn));
                $DataAksesValidasi = mysqli_fetch_array($QryAksesValidasi);
                //Apabila token belum ada maka buat ulang
                if(empty($DataAksesValidasi['id_akses_anggota'])){
                    $EntryTokenAkses="INSERT INTO akses_validasi (
                        id_akses_anggota,
                        token,
                        datetime
                    ) VALUES (
                        '$id_akses_anggota',
                        '$TokenValidasi',
                        '$Datetime_generate'
                    )";
                    $GenerateToken=mysqli_query($Conn, $EntryTokenAkses);
                }else{
                    $GenerateToken = mysqli_query($Conn,"UPDATE akses_validasi SET 
                        token='$TokenValidasi',
                        datetime='$Datetime_generate'
                    WHERE id_akses_anggota='$id_akses_anggota'") or die(mysqli_error($Conn));
                }
                if($GenerateToken){
                    //Kirim Email
                    $subjek_email="Validasi Email Pendaftaran $title_page";
                    $isi_email="$pesan_validasi_email <a href=$base_url/ValidasiEmail.php?Token=$TokenValidasi>Klik Disini</a>";
                    $datetime_email=strtotime(date('Y-m-d H:i:s'));
                    $email_tujuan=$email;
                    $nama_tujuan= $nama_anggota;
                    //Mengirim Email
                    include "../../_Config/SendEmail.php";
                    if($GetPesan!=="Email Terkirim"){
                        echo '<small class="text-danger">Terjadi kesalahan pada saat mengirim email validasi</small>';
                    }else{
                        echo '<small class="text-success" id="NotifikasiUlangiVerifikasiEmailBerhasil">Success</small>';
                    }
                }else{
                    echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Melakukan Generate Token Validasi.</small>';
                }
            }
        }
    }
?>