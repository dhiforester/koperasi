<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="tanggal"){
            echo '<label for="keyword">Kata Kunci</label>';
            echo ' <input type="date" name="keyword" id="keyword" class="form-control">';
        }else{
            if($KeywordBy=="status"){
                echo '<label for="keyword">Kata Kunci</label>';
                echo '<select name="keyword" id="keyword" class="form-control">';
                $query = mysqli_query($Conn, "SELECT DISTINCT status FROM stok_opename ORDER BY status ASC");
                while ($data = mysqli_fetch_array($query)) {
                    $status= $data['status'];
                    echo '  <option value="'.$status.'">'.$status.'</option>';
                }
                echo '</select>';
            }else{
                echo '<label for="keyword">Kata Kunci2</label>';
                echo ' <input type="text" name="keyword" id="keyword" class="form-control">';
            }
        }
    }else{
        echo '<label for="keyword">Kata Kunci2</label>';
        echo ' <input type="text" name="keyword" id="keyword" class="form-control">';
    }
?>