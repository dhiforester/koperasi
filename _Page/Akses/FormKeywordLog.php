<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordByLog'])){
        echo '<input type="text" name="KeywordLog" id="KeywordLog" class="form-control">';
        echo '<small>Kata Kunci</small>';
    }else{
        $KeywordByLog=$_POST['KeywordByLog'];
        if($KeywordByLog=="datetime_log"){
            echo '<input type="date" name="KeywordLog" id="KeywordLog" class="form-control">';
            echo '<small>Tangal</small>';
        }else{
            if($KeywordByLog=="deskripsi_log"){
                echo '<input type="text" name="KeywordLog" id="KeywordLog" class="form-control">';
                echo '<small>Kata Kunci</small>';
            }else{
                if($KeywordByLog=="kategori_log"){
                    echo '<select name="KeywordLog" id="KeywordLog" class="form-control">';
                    echo '  <option value="">Pilih</option>';
                    $query = mysqli_query($Conn, "SELECT DISTINCT kategori_log FROM log ORDER BY kategori_log ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $kategori_log= $data['kategori_log'];
                        echo '  <option value="'.$kategori_log.'">'.$kategori_log.'</option>';
                    }
                    echo '</select>';
                    echo '<small>Kategori</small>';
                }else{
                    echo '<input type="text" name="KeywordLog" id="KeywordLog" class="form-control">';
                    echo '<small>Kata Kunci</small>';
                }
            }
        }
    }
?>