<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordByPembelian'])){
        echo '<input type="text" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
        echo '<small>Kata Kunci</small>';
    }else{
        $KeywordByPembelian=$_POST['KeywordByPembelian'];
        if($KeywordByPembelian=="tanggal"){
            echo '<input type="date" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
            echo '<small>Kata Kunci</small>';
        }else{
            if($KeywordByPembelian=="status"){
                echo '<select name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                echo '  <option value="">Pilih</option>';
                $query = mysqli_query($Conn, "SELECT DISTINCT status FROM transaksi ORDER BY status ASC");
                while ($data = mysqli_fetch_array($query)) {
                    $status= $data['status'];
                    echo '  <option value="'.$status.'">'.$status.'</option>';
                }
                echo '</select>';
                echo '<small>Kata Kunci</small>';
            }else{
                echo '<input type="text" name="KeywordPembelian" id="KeywordPembelian" class="form-control">';
                echo '<small>Kata Kunci</small>';
            }
        }
    }
?>