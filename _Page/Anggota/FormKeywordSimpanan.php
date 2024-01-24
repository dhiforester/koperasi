<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordBySimpanan'])){
        echo '<input type="text" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
        echo '<small for="KeywordSimpanan">Kata Kunci</small>';
    }else{
        $KeywordBy=$_POST['KeywordBySimpanan'];
        if($KeywordBy=="keterangan"){
            echo '<input type="text" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
            echo '<small for="KeywordSimpanan">Kata Kunci</small>';
        }else{
            if($KeywordBy=="tanggal"){
                echo '<input type="date" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
                echo '<small for="KeywordSimpanan">Kata Kunci</small>';
            }else{
                if($KeywordBy=="kategori"){
                    echo '<select name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
                    echo '  <option value="">Pilih</option>';
                    $query = mysqli_query($Conn, "SELECT DISTINCT kategori FROM simpanan ORDER BY kategori ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $kategori= $data['kategori'];
                        echo '  <option value="'.$kategori.'">'.$kategori.'</option>';
                    }
                    echo '</select>';
                    echo '<small for="FilterKeyword">Kata Kunci</small>';
                }else{
                    echo '<input type="text" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
                    echo '<small for="KeywordSimpanan">Kata Kunci</small>';
                }
            }
        }
    }
?>