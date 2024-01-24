<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['keyword_by'])){
        echo '<label for="keyword">Kata Kunci</label>';
        echo '<input type="text" name="keyword" id="keyword" class="form-control">';
    }else{
        $keyword_by=$_POST['keyword_by'];
        if($keyword_by=="id_transaksi"){
            echo '<label for="keyword">Kata Kunci</label>';
            echo '<input type="number" name="keyword" id="keyword" class="form-control">';
        }else{
            if($keyword_by=="id_akses"){
                echo '<label for="keyword">Kata Kunci</label>';
                echo '<select name="keyword" id="keyword" class="form-control">';
                $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY nama_akses ASC");
                while ($data = mysqli_fetch_array($query)) {
                    $id_akses= $data['id_akses'];
                    $nama_akses= $data['nama_akses'];
                    echo '<option value="'.$id_akses.'">'.$nama_akses.'</option>';
                }
                echo '</select>';
            }else{
                if($keyword_by=="id_anggota"){
                    echo '<label for="keyword">Kata Kunci</label>';
                    echo '<select name="keyword" id="keyword" class="form-control">';
                    $query = mysqli_query($Conn, "SELECT*FROM anggota ORDER BY nama ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_anggota= $data['id_anggota'];
                        $nama_akses= $data['nama'];
                        echo '<option value="'.$id_anggota.'">'.$nama_akses.'</option>';
                    }
                    echo '</select>';
                }else{
                    if($keyword_by=="id_supplier"){
                        echo '<label for="keyword">Kata Kunci</label>';
                        echo '<select name="keyword" id="keyword" class="form-control">';
                        $query = mysqli_query($Conn, "SELECT*FROM supplier ORDER BY nama_supplier ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_supplier= $data['id_supplier'];
                            $nama_supplier= $data['nama_supplier'];
                            echo '<option value="'.$id_supplier.'">'.$nama_supplier.'</option>';
                        }
                        echo '</select>';
                    }else{
                        if($keyword_by=="tanggal"){
                            echo '<label for="keyword">Kata Kunci</label>';
                            echo '<input type="date" name="keyword" id="keyword" class="form-control">';
                        }else{
                            if($keyword_by=="kategori"){
                                echo '<label for="keyword">Kata Kunci</label>';
                                echo '<select name="keyword" id="keyword" class="form-control">';
                                $query = mysqli_query($Conn, "SELECT DISTINCT kategori FROM transaksi ORDER BY kategori ASC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $kategori= $data['kategori'];
                                    echo '<option value="'.$kategori.'">'.$kategori.'</option>';
                                }
                                echo '</select>';
                            }else{
                                if($keyword_by=="status"){
                                    echo '<label for="keyword">Kata Kunci</label>';
                                    echo '<select name="keyword" id="keyword" class="form-control">';
                                    $query = mysqli_query($Conn, "SELECT DISTINCT status FROM transaksi ORDER BY status ASC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $status= $data['status'];
                                        echo '<option value="'.$status.'">'.$status.'</option>';
                                    }
                                    echo '</select>';
                                }else{
                                    echo '<label for="keyword">Kata Kunci</label>';
                                    echo '<input type="text" name="keyword" id="keyword" class="form-control">';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>