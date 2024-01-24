<?php
    //KONEKSI KE DATABASE
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Validasi Variebl yang ditangkap
    if(empty($_POST['kode'])){
        echo '<span class="text-danger">Kode Perkiraan Tidak Boleh Kosong.</span>';
    }else{
        if(empty($_POST['nama_perkiraan1'])){
            echo '<span class="text-danger">Nama Perkiraan Tidak Boleh Kosong.</span>';
        }else{
            if(empty($_POST['level_perkiraan'])){
                echo '<span class="text-danger">Level Perkiraan Tidak Boleh Kosong.</span>';
            }else{
                if(empty($_POST['saldo_normal'])){
                    echo '<span class="text-danger">Saldo Normal Akun Perkiraan Tidak Boleh Kosong.</span>';
                }else{
                    if(empty($_POST['id_perkiraan'])){
                        $id_induk="";
                    }else{
                        $id_induk=$_POST['id_perkiraan'];
                    }
                    if(empty($_POST['status'])){
                        $status="";
                    }else{
                        $status=$_POST['status'];
                    }
                    $kode=$_POST['kode'];
                    $rank=$_POST['rank'];
                    $nama_perkiraan1=$_POST['nama_perkiraan1'];
                    $level_perkiraan=$_POST['level_perkiraan'];
                    $saldo_normal=$_POST['saldo_normal'];
                    //MEMERIKSA APAKAH ADA KODE YANG SAMA
                    $query_cek = mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE kode='$kode'") or die(mysqli_error($Conn));
                    $data_cek = mysqli_fetch_array($query_cek);
                    if(!empty($data_cek['id_perkiraan'])){
                        $Temuan=$data_cek['id_perkiraan'];
                    }else{
                        $Temuan="";
                    }
                    //Apabila akun belum ada, atau duplikat
                    if(!empty($Temuan)){
                        echo '<span class="text-danger">Kode yang anda gunakan sudah ada.</span>';
                    }else{
                        //Lakukan Input data baru ke akun_perkiraan
                        $InputDataPerkiraan="INSERT INTO akun_perkiraan (
                            kode,
                            rank,
                            nama,
                            level,
                            saldo_normal,
                            status
                        ) VALUES (
                            '$kode',
                            '$rank',
                            '$nama_perkiraan1',
                            '$level_perkiraan',
                            '$saldo_normal',
                            '$status'
                        )";
                        $HasilInputDataPerkiraan=mysqli_query($Conn, $InputDataPerkiraan);
                        //Apabila proses input berhasil lanjutkan
                        if($HasilInputDataPerkiraan){
                            //Apabila data perkiraan adalah level 1
                            if($level_perkiraan=='1'){
                                //Langsung langsung update untuk kd nya
                                $UpdateKdPerkiraan = mysqli_query($Conn, "UPDATE akun_perkiraan SET kd1='$kode' WHERE kode='$kode'") or die(mysqli_error($Conn)); 
                                //Apabila proses update berhasil
                                if($UpdateKdPerkiraan){
                                    echo '<span class="text-success" id="NotifikasiTambahAkunPerkiraanBerhasil">Success</span>';
                                //Apabila proses update gagal
                                }else{
                                    echo '<span class="text-danger">Terjadi kegagalan ketika melakukan update data KD</span>';
                                }
                            //Apabila bukan level 1 maka perlu dilakukan proses lanjutan
                            }else{
                                //1.Lakukan perulangan berdasarkan level
                                for ( $i="1"; $i<="$level_perkiraan"; $i++ ){
                                    //2. susun kolom kd menjadi variabel
                                    $string="kd";
                                    $string_kode="$string$i";
                                    //2.1 Apabila selama perulangan jumlah perulangan sudah mencapai level
                                    if($i==$level_perkiraan){
                                        //2.2 Maka kode induk sama dengan kode yang ditangkap dari form
                                        $kode_induk="$kode";
                                    }else{
                                        //2.3 Sebaliknya maka kode induk harus dicari dulu berdasarkan database data induk
                                        $qry_kode_induk = mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_induk'")or die(mysqli_error($Conn));
                                        $data_kode_induk = mysqli_fetch_array($qry_kode_induk);
                                        $kode_induk = $data_kode_induk[$string_kode];
                                    }
                                    //SEMENTARA LAKUKAN PENGECEKAN KOLOM TERSEBUT ADA ATAU TIDAK
                                    //3.Buka keberadaan Kolom Dari MYSQL
                                    $nama_kolom="kd$i";
                                    $qry_kolom = mysqli_query($Conn, "SHOW COLUMNS FROM akun_perkiraan WHERE Field='$nama_kolom'")or die(mysqli_error($Conn));
                                    $dt_kolom = mysqli_fetch_array($qry_kolom);
                                    $Field = $dt_kolom['Field'];
                                    //APABILA KOLOMNYA SUDAH ADA LANGSUNG INPUT EDIT SAJA
                                    if(!empty($Field)){
                                        $UpdateKolom = mysqli_query($Conn, "UPDATE akun_perkiraan SET $nama_kolom='$kode_induk' WHERE kode='$kode'") or die(mysqli_error($Conn)); 
                                        if(!$UpdateKolom){
                                            echo '<span class="text-success" id="NotifikasiTambahAkunPerkiraanBerhasil">Success</span>';
                                        }else{
                                            echo '<span class="text-success" id="NotifikasiTambahAkunPerkiraanBerhasil">Success</span>';
                                        }
                                    }else{
                                        //APABILA BELUM ADA BUAT DULU KOLOMNYA
                                        $buat_kolom = mysqli_query($Conn, "ALTER TABLE akun_perkiraan ADD $nama_kolom VARCHAR(50) NULL") or die(mysqli_error($Conn)); 
                                        if(!$buat_kolom){
                                            echo '<span class="text-danger">Terjadi kesalahan pada saat membuat kolom KD</span>';
                                        }else{
                                            //APABILA SUDAH BUAT KOLOM UPDATE KE KOLOM TERSEBUT
                                            $UpdateKeKolomBaru = mysqli_query($Conn, "UPDATE akun_perkiraan SET $nama_kolom='$kode_induk'WHERE kode='$kode'") or die(mysqli_error($Conn)); 
                                            if(!$UpdateKeKolomBaru){
                                                echo '<span class="text-danger">Update kolom KD gaga;</span>';
                                            }else{
                                                echo '<span class="text-success" id="NotifikasiTambahAkunPerkiraanBerhasil">Success</span>';
                                            }
                                        }
                                    }
                                }
                            }
                        //Apabila proses input gagal maka beri notifikasi
                        }else{
                            echo '<span class="text-danger">Tambah Akun Gagal</span>';
                        }
                    }
                }
            }
        }
    }
?>

