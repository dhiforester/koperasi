<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="kode_barang"){
            echo '<label for="keyword">Kata Kunci</label>';
            echo ' <input type="text" name="keyword" id="keyword" class="form-control">';
        }else{
            if($KeywordBy=="nama_barang"){
                echo '<label for="keyword">Kata Kunci</label>';
                echo ' <input type="text" name="keyword" id="keyword" class="form-control">';
            }else{
                if($KeywordBy=="kategori_barang"){
                    echo '<label for="keyword">Kata Kunci</label>';
                    echo '<select name="keyword" id="keyword" class="form-control">';
                    $query = mysqli_query($Conn, "SELECT DISTINCT kategori_barang FROM barang ORDER BY kategori_barang ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $kategori_barang= $data['kategori_barang'];
                        echo '  <option value="'.$kategori_barang.'">'.$kategori_barang.'</option>';
                    }
                    echo '</select>';
                }else{
                    if($KeywordBy=="satuan_barang"){
                        echo '<label for="keyword">Kata Kunci</label>';
                        echo '<select name="keyword" id="keyword" class="form-control">';
                        $query = mysqli_query($Conn, "SELECT DISTINCT satuan_barang FROM barang ORDER BY satuan_barang ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $satuan_barang= $data['satuan_barang'];
                            echo '  <option value="'.$satuan_barang.'">'.$satuan_barang.'</option>';
                        }
                        echo '</select>';
                    }else{
                        if($KeywordBy=="harga_beli"){
                            echo '<label for="keyword">Kata Kunci</label>';
                            echo ' <input type="number" name="keyword" id="keyword" class="form-control">';
                        }else{
                            if($KeywordBy=="stok_barang"){
                                echo '<label for="keyword">Kata Kunci</label>';
                                echo ' <input type="number" name="keyword" id="keyword" class="form-control">';
                            }else{
                                echo '<label for="keyword">Kata Kunci</label>';
                                echo ' <input type="text" name="keyword" id="keyword" class="form-control">';
                            }
                        }
                    }
                }
            }
        }
    }else{
        echo '<label for="keyword">Kata Kunci2</label>';
        echo ' <input type="text" name="keyword" id="keyword" class="form-control">';
    }
?>