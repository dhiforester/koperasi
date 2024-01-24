<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordBySimpanan'])){
        echo '<input type="text" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
        echo '<small>Kata Kunci</small>';
    }else{
        $KeywordBySimpanan=$_POST['KeywordBySimpanan'];
        if($KeywordBySimpanan=="tanggal"){
            echo '<input type="date" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
            echo '<small>Kata Kunci</small>';
        }else{
            if($KeywordBySimpanan=="kategori"){
                echo '<select name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
                echo '  <option value="">Pilih</option>';
                $query = mysqli_query($Conn, "SELECT DISTINCT kategori FROM simpanan ORDER BY kategori ASC");
                while ($data = mysqli_fetch_array($query)) {
                    $kategori= $data['kategori'];
                    echo '  <option value="'.$kategori.'">'.$kategori.'</option>';
                }
                echo '</select>';
                echo '<small>Kata Kunci</small>';
            }else{
                echo '<input type="text" name="KeywordSimpanan" id="KeywordSimpanan" class="form-control">';
                echo '<small>Kata Kunci</small>';
            }
        }
    }
?>