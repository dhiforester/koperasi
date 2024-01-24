<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordByPembelian'])){
        echo '<input type="text" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
        echo '<small for="KeywordPembelian">Kata Kunci</small>';
    }else{
        $KeywordBy=$_POST['KeywordByPembelian'];
        if($KeywordBy=="id_transaksi"){
            echo '<input type="text" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
            echo '<small for="KeywordPembelian">Kata Kunci</small>';
        }else{
            if($KeywordBy=="tanggal"){
                echo '<input type="date" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                echo '<small for="KeywordPembelian">Kata Kunci</small>';
            }else{
                if($KeywordBy=="keterangan"){
                    echo '<input type="text" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                    echo '<small for="KeywordPembelian">Kata Kunci</small>';
                }else{
                    if($KeywordBy=="status"){
                        echo '<select name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                        echo '  <option value="">Pilih</option>';
                        $query = mysqli_query($Conn, "SELECT DISTINCT status FROM transaksi ORDER BY status ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $status= $data['status'];
                            echo '  <option value="'.$status.'">'.$status.'</option>';
                        }
                        echo '</select>';
                        echo '<small for="FilterKeyword">Kata Kunci</small>';
                    }else{
                        if($KeywordBy=="kategori"){
                            echo '<select name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                            echo '  <option value="">Pilih</option>';
                            $query = mysqli_query($Conn, "SELECT DISTINCT kategori FROM transaksi ORDER BY kategori ASC");
                            while ($data = mysqli_fetch_array($query)) {
                                $kategori= $data['kategori'];
                                echo '  <option value="'.$kategori.'">'.$kategori.'</option>';
                            }
                            echo '</select>';
                            echo '<small for="FilterKeyword">Kata Kunci</small>';
                        }else{
                            if($KeywordBy=="id_akses"){
                                echo '<select name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                                echo '  <option value="">Pilih</option>';
                                $query = mysqli_query($Conn, "SELECT DISTINCT id_akses FROM transaksi ORDER BY id_akses ASC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_akses= $data['id_akses'];
                                    //Buka data askes
                                    $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                    $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                                    $nama_akses= $DataDetailAkses['nama_akses'];
                                    echo '  <option value="'.$id_akses.'">'.$nama_akses.'</option>';
                                }
                                echo '</select>';
                                echo '<small for="FilterKeyword">Kata Kunci</small>';
                            }else{
                                echo '<label for="KeywordPembelian">Kata Kunci</label>';
                                echo '<input type="text" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                            }
                        }
                    }
                }
            }
        }
    }
?>