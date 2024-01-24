<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="kode_barang"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo ' <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            if($KeywordBy=="nama_barang"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo ' <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
            }else{
                if($KeywordBy=="satuan"){
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                    $query = mysqli_query($Conn, "SELECT DISTINCT satuan FROM barang_bacth ORDER BY satuan ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $satuan= $data['satuan'];
                        echo '  <option value="'.$satuan.'">'.$satuan.'</option>';
                    }
                    echo '</select>';
                }else{
                    if($KeywordBy=="no_batch"){
                        echo '<label for="FilterKeyword">Kata Kunci</label>';
                        echo ' <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                    }else{
                        if($KeywordBy=="expired_date"){
                            echo '<label for="FilterKeyword">Kata Kunci</label>';
                            echo ' <input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                        }else{
                            if($KeywordBy=="status"){
                                echo '<label for="FilterKeyword">Kata Kunci</label>';
                                echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                                $query = mysqli_query($Conn, "SELECT DISTINCT status FROM barang_bacth ORDER BY status ASC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $status= $data['status'];
                                    echo '  <option value="'.$status.'">'.$status.'</option>';
                                }
                                echo '</select>';
                            }else{
                                if($KeywordBy=="reminder_date"){
                                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                                    echo ' <input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
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