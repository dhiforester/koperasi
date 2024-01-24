<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    $datetime_api_key=strtotime($now);
    //Validasi akses tidak boleh kosong
    if(empty($_POST['akses'])){
        echo '<small class="text-danger">Nama Akses Tidak Boleh Kosong</small>';
    }else{
        //Validasi class_label tidak boleh kosong
        if(empty($_POST['class_label'])){
            echo '<small class="text-danger">abel Class Tidak Boleh Kosong</small>';
        }else{
            //Validasi nama akses tidak boleh lebih dari 20 karakter
            $JumlahKarakterTitle=strlen($_POST['akses']);
            if($JumlahKarakterTitle>20){
                echo '<small class="text-danger">Nama Akses Tidak Boleh Lebih Dari 20 Karakter</small>';
            }else{
                $akses=$_POST['akses'];
                $class_label=$_POST['class_label'];
                //Validasi Nama akses sama 
                $ValidasiAkses=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_entitas WHERE akses='$akses' AND class_label='$class_label'"));
                if(!empty($ValidasiAkses)){
                    echo '<small class="text-danger">Data Yang Anda Input Sudah Ada</small>';
                }else{
                    if($akses=="Anggota"){
                        echo '<small class="text-danger">Anda Tidak Bisa Membuat Entitas Akses Anggota, Karena Nama Tersebut Adalah Entitas Standar Pada Sistem</small>';
                    }else{
                        $query = mysqli_query($Conn, "SELECT*FROM akses_referensi ORDER BY kode_referensi ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $kode_referensi= $data['kode_referensi'];
                            if(!empty($_POST[$kode_referensi])){
                                $kode_referensi=$_POST[$kode_referensi];
                                $entry_lagi="INSERT INTO akses_entitas (
                                    akses,
                                    kode_akses,
                                    class_label
                                ) VALUES (
                                    '$akses',
                                    '$kode_referensi',
                                    '$class_label'
                                )";
                                $InputLagi=mysqli_query($Conn, $entry_lagi);
                            }
                        }
                        $KategoriLog="Entitas Akses";
                        $KeteranganLog="Membuat Entitas Akses Baru";
                        include "../../_Config/InputLog.php";
                        $_SESSION ["NotifikasiSwal"]="Tambah Akses Berhasil";
                        echo '<small class="text-success" id="NotifikasiBuatEntitasBerhasil">Success</small>';
                    }
                }
            }
        }
    }
?>