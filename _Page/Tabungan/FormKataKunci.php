<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="tanggal"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo '<input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            if($KeywordBy=="nama"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
            }else{
                if($KeywordBy=="kategori"){
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                    echo '  <option value="Simpanan Wajib">Simpanan Wajib</option>';
                    echo '  <option value="Simpanan Pokok">Simpanan Pokok</option>';
                    echo '  <option value="Simpanan Sukarela">Simpanan Sukarela</option>';
                    echo '  <option value="Penarikan">Penarikan</option>';
                    echo '</select>';
                }else{
                    if($KeywordBy=="keterangan"){
                        echo '<label for="FilterKeyword">Kata Kunci</label>';
                        echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                    }else{
                        if($KeywordBy=="jumlah"){
                            echo '<label for="FilterKeyword">Kata Kunci</label>';
                            echo '<input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                        }else{
                            echo '<label for="FilterKeyword">Kata Kunci</label>';
                            echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                        }
                    }
                }
            }
        }
    }else{
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }
?>