<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap KeywordBy
    if(empty($_POST['KeywordByTransaksi'])){
        echo '<input type="text" name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
        echo '<small for="KeywordTransaksi">Pencarian</small>';
    }else{
        $KeywordBy=$_POST['KeywordByTransaksi'];
        if($KeywordBy=="id_transaksi"){
            echo '<select name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
            echo '  <option value="">Pilih</option>';
            $QryPembayaran = mysqli_query($Conn, "SELECT DISTINCT id_transaksi FROM transaksi");
            while ($DataPembayaran = mysqli_fetch_array($QryPembayaran)) {
                $id_transaksi = $DataPembayaran['id_transaksi'];
                //Buka Kategori transaksi
                $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                if(!empty($DataTransaksi['kategori'])){
                    $tanggal=$DataTransaksi['tanggal'];
                    $strtotime=strtotime($tanggal);
                    $tanggal=date('d/m/Y',$strtotime);
                    $kategori=$DataTransaksi['kategori'];
                }else{
                    $tanggal="None";
                    $kategori="None";
                }
            echo '  <option value="'.$id_transaksi.'">'.$id_transaksi.'.'.$kategori.'-'.$tanggal.'</option>';
            }
            echo '</select>';
            echo '<small for="KeywordTransaksi">Pencarian</small>';
        }else{
            if($KeywordBy=="id_akses"){
                echo '<select name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                echo '  <option value="">Pilih</option>';
                $QryPembayaran = mysqli_query($Conn, "SELECT DISTINCT id_akses FROM transaksi");
                while ($DataPembayaran = mysqli_fetch_array($QryPembayaran)) {
                    $id_akses = $DataPembayaran['id_akses'];
                    //Buka Akses
                    $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                    $DataAkses = mysqli_fetch_array($QryAkses);
                    if(!empty($DataAkses['id_akses'])){
                        $nama=$DataAkses['nama_akses'];
                    }else{
                        $nama="None";
                    }
                echo '  <option value="'.$id_akses.'">'.$nama.'</option>';
                }
                echo '</select>';
                echo '<small for="KeywordTransaksi">Pencarian</small>';
            }else{
                if($KeywordBy=="id_anggota"){
                    echo '<select name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                    echo '  <option value="">Pilih</option>';
                    $QryPembayaran = mysqli_query($Conn, "SELECT DISTINCT id_anggota FROM transaksi");
                    while ($DataPembayaran = mysqli_fetch_array($QryPembayaran)) {
                        $id_anggota = $DataPembayaran['id_anggota'];
                        //Buka Anggota
                        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                        $DataAnggota = mysqli_fetch_array($QryAnggota);
                        if(!empty($DataAnggota['id_anggota'])){
                            $nama=$DataAnggota['nama'];
                        }else{
                            $nama="None";
                        }
                    echo '  <option value="'.$id_anggota.'">'.$id_anggota.'.'.$nama.'</option>';
                    }
                    echo '</select>';
                    echo '<small for="KeywordTransaksi">Pencarian</small>';
                }else{
                    if($KeywordBy=="id_supplier"){
                        echo '<select name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                        echo '  <option value="">Pilih</option>';
                        $QryPembayaran = mysqli_query($Conn, "SELECT DISTINCT id_supplier FROM transaksi");
                        while ($DataPembayaran = mysqli_fetch_array($QryPembayaran)) {
                            $id_supplier = $DataPembayaran['id_supplier'];
                            //Buka Supplier
                            $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                            $DataSupplier = mysqli_fetch_array($QrySupplier);
                            if(!empty($DataSupplier['id_supplier'])){
                                $nama=$DataSupplier['nama_supplier'];
                            }else{
                                $nama="None";
                            }
                        echo '  <option value="'.$id_supplier.'">'.$id_supplier.'.'.$nama.'</option>';
                        }
                        echo '</select>';
                        echo '<small for="KeywordTransaksi">Pencarian</small>';
                    }else{
                        if($KeywordBy=="kategori"){
                            echo '<select name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                            echo '  <option value="">Pilih</option>';
                            $QryPembayaran = mysqli_query($Conn, "SELECT DISTINCT kategori FROM transaksi");
                            while ($DataPembayaran = mysqli_fetch_array($QryPembayaran)) {
                                $kategori = $DataPembayaran['kategori'];
                                if(!empty($DataPembayaran['kategori'])){
                                    echo '  <option value="'.$kategori.'">'.$kategori.'</option>';
                                }
                            }
                            echo '</select>';
                            echo '<small for="KeywordTransaksi">Pencarian</small>';
                        }else{
                            if($KeywordBy=="tanggal"){
                                echo '<input type="date" name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                                echo '<small for="KeywordTransaksi">Pencarian</small>';
                            }else{
                                if($KeywordBy=="metode"){
                                    echo '<select name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                                    echo '  <option value="">Pilih</option>';
                                    $QryPembayaran = mysqli_query($Conn, "SELECT DISTINCT metode FROM transaksi");
                                    while ($DataPembayaran = mysqli_fetch_array($QryPembayaran)) {
                                        $metode = $DataPembayaran['metode'];
                                        if(!empty($DataPembayaran['metode'])){
                                            echo '  <option value="'.$metode.'">'.$metode.'</option>';
                                        }
                                    }
                                    echo '</select>';
                                    echo '<small for="KeywordTransaksi">Pencarian</small>';
                                }else{
                                    if($KeywordBy=="keterangan"){
                                        echo '<input type="text" name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                                        echo '<small for="KeywordTransaksi">Pencarian</small>';
                                    }else{
                                        echo '<input type="text" name="KeywordTransaksi" id="KeywordTransaksi" class="form-control">';
                                        echo '<small for="KeywordTransaksi">Pencarian</small>';
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