<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['GetIdTransaksiEdit'])){
        echo '<div class="alert alert-danger" role="alert">';
        echo '  ID Transaksi Tidak Boleh Kosong!';
        echo '</div>';
    }else{
        if(empty($_POST['jam'])){
            echo '<div class="alert alert-danger" role="alert">';
            echo '  Jam Tidak Boleh Kosong!';
            echo '</div>';
        }else{
            if(empty($_POST['tanggal'])){
                echo '<div class="alert alert-danger" role="alert">';
                echo '  Tanggal Tidak Boleh Kosong!';
                echo '</div>';
            }else{
                if(empty($_POST['kategori'])){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '  Kategori Transaksi Tidak Boleh Kosong!';
                    echo '</div>';
                }else{
                    if(empty($_POST['metode'])){
                        echo '<div class="alert alert-danger" role="alert">';
                        echo '  Metode Pembayaran Tidak Boleh Kosong!';
                        echo '</div>';
                    }else{
                        if(empty($_POST['status'])){
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '  Status Transaksi Tidak Boleh Kosong!';
                            echo '</div>';
                        }else{
                            $id_transaksi=$_POST['GetIdTransaksiEdit'];
                            $jam=$_POST['jam'];
                            $tanggal=$_POST['tanggal'];
                            $tanggal="$tanggal $jam";
                            $kategori=$_POST['kategori'];
                            $metode=$_POST['metode'];
                            $status=$_POST['status'];
                            if(empty($_POST['id_anggota'])){
                                $id_anggota=0;
                            }else{
                                $id_anggota=$_POST['id_anggota'];
                            }
                            if(empty($_POST['id_supplier'])){
                                $id_supplier=0;
                            }else{
                                $id_supplier=$_POST['id_supplier'];
                            }
                            if(empty($_POST['tagihan'])){
                                $tagihan="0";
                            }else{
                                $tagihan=$_POST['tagihan'];
                            }
                            if(empty($_POST['pembayaran'])){
                                $pembayaran="0";
                            }else{
                                $pembayaran=$_POST['pembayaran'];
                            }
                            if(empty($_POST['kembalian'])){
                                $kembalian="0";
                            }else{
                                $kembalian=$_POST['kembalian'];
                            }
                            if(empty($_POST['keterangan'])){
                                $keterangan="";
                            }else{
                                $keterangan=$_POST['keterangan'];
                            }
                            $tagihan= str_replace(".", "", $tagihan);
                            $pembayaran= str_replace(".", "", $pembayaran);
                            $kembalian= str_replace(".", "", $kembalian);
                            if(!preg_match("/^[0-9]*$/", $tagihan)){
                                echo '<div class="alert alert-danger" role="alert">';
                                echo '  Jumlah Tagihan Hanya Boleh Angka';
                                echo '</div>';
                            }else{
                                if(!preg_match("/^[0-9]*$/", $pembayaran)){
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo '  Jumlah Pembayaran Hanya Boleh Angka';
                                    echo '</div>'; 
                                }else{
                                    if(!preg_match("/^[0-9]*$/", $kembalian)){
                                        echo '<div class="alert alert-danger" role="alert">';
                                        echo '  Jumlah Kembalian Hanya Boleh Angka';
                                        echo '</div>'; 
                                    }else{
                                        //Update Transaksi
                                        $UpdateTransaksi = mysqli_query($Conn,"UPDATE transaksi SET 
                                            id_anggota='$id_anggota',
                                            id_supplier='$id_supplier',
                                            tanggal='$tanggal',
                                            kategori='$kategori',
                                            tagihan='$tagihan',
                                            pembayaran='$pembayaran',
                                            kembalian='$kembalian',
                                            metode='$metode',
                                            keterangan='$keterangan',
                                            status='$status'
                                        WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
                                        if($UpdateTransaksi){
                                            $KategoriLog="Transaksi";
                                            $KeteranganLog="Edit Transaksi  $id_transaksi Berhasil";
                                            include "../../_Config/InputLog.php";
                                            $_SESSION ["NotifikasiSwal"]="Edit Transaksi Berhasil";
                                            echo '<input type="hidden" id="UrlBack" value="index.php?Page=Transaksi&Sub=DetailTransaksi&id='.$id_transaksi.'">';
                                            echo '<small class="text-success" id="NotifikasiEditTransaksiBerhasil">Success</small>';
                                        }else{
                                            echo '<div class="alert alert-danger" role="alert">';
                                            echo '  Terjadi Kesalahan Pada Saat Melakukan Update Transaksi';
                                            echo '</div>'; 
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