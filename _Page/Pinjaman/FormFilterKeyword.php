<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="tanggal_pinjaman"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo ' <input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            if($KeywordBy=="tanggal_input"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo ' <input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
            }else{
                if($KeywordBy=="jumlah_pinjaman"){
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo ' <input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                }else{
                    if($KeywordBy=="nilai_angsuran"){
                        echo '<label for="FilterKeyword">Kata Kunci</label>';
                        echo ' <input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                    }else{
                        if($KeywordBy=="periode_angsuran"){
                            echo '<label for="FilterKeyword">Kata Kunci</label>';
                            echo ' <input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                        }else{
                            if($KeywordBy=="status"){
                                echo '<label for="FilterKeyword">Kata Kunci</label>';
                                echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                                $query = mysqli_query($Conn, "SELECT DISTINCT status FROM pinjaman ORDER BY status ASC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $status= $data['status'];
                                    echo '  <option value="'.$status.'">'.$status.'</option>';
                                }
                                echo '</select>';
                            }else{
                                echo '<label for="FilterKeyword">Kata Kunci</label>';
                                echo ' <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                            }
                        }
                    }
                }
            }
        }
    }else{
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo ' <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }
?>