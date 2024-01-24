<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="periode_hitung1"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo ' <input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            if($KeywordBy=="periode_hitung2"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo ' <input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
            }else{
                if($KeywordBy=="modal_anggota"){
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo ' <input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                }else{
                    if($KeywordBy=="penjualan"){
                        echo '<label for="FilterKeyword">Kata Kunci</label>';
                        echo ' <input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                    }else{
                        if($KeywordBy=="persen_usaha"){
                            echo '<label for="FilterKeyword">Kata Kunci</label>';
                            echo ' <input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                        }else{
                            if($KeywordBy=="persen_modal"){
                                echo '<label for="FilterKeyword">Kata Kunci</label>';
                                echo ' <input type="number" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                            }else{
                                if($KeywordBy=="status"){
                                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                                    echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                                    $query = mysqli_query($Conn, "SELECT DISTINCT status FROM shu_session ORDER BY status ASC");
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
        }
    }else{
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo ' <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }
?>