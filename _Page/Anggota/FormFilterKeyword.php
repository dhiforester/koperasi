<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordBy'])){
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }else{
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="tanggal_masuk"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo '<input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            if($KeywordBy=="nip"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="ex: 1107.RSES.025">';
            }else{
                if($KeywordBy=="nama"){
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="ex: Solihul Hadi">';
                }else{
                    if($KeywordBy=="email"){
                        echo '<label for="FilterKeyword">Kata Kunci</label>';
                        echo '<input type="email" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="ex: email@domain.com">';
                    }else{
                        if($KeywordBy=="kontak"){
                            echo '<label for="FilterKeyword">Kata Kunci</label>';
                            echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="+62">';
                        }else{
                            if($KeywordBy=="status"){
                                echo '<label for="FilterKeyword">Kata Kunci</label>';
                                echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                                echo '  <option value="">Pilih</option>';
                                $query = mysqli_query($Conn, "SELECT DISTINCT status FROM anggota ORDER BY status ASC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $status= $data['status'];
                                    echo '  <option value="'.$status.'">'.$status.'</option>';
                                }
                                echo '</select>';
                            }else{
                                echo '<label for="FilterKeyword">Kata Kunci</label>';
                                echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                            }
                        }
                    }
                }
            }
        }
    }
?>