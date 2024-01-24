<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordBy'])){
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }else{
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="nama_akses"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            if($KeywordBy=="kontak_akses"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="+62">';
            }else{
                if($KeywordBy=="email_akses"){
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo '<input type="email" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="email@domain.com">';
                }else{
                    if($KeywordBy=="akses"){
                        echo '<label for="FilterKeyword">Kata Kunci</label>';
                        echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                        echo '  <option value="">Pilih</option>';
                        $query = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses ORDER BY akses ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $akses= $data['akses'];
                            echo '  <option value="'.$akses.'">'.$akses.'</option>';
                        }
                        echo '</select>';
                    }else{
                        if($KeywordBy=="status"){
                            echo '<label for="FilterKeyword">Kata Kunci</label>';
                            echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                            echo '  <option value="">Pilih</option>';
                            $query = mysqli_query($Conn, "SELECT DISTINCT status FROM akses ORDER BY status ASC");
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
?>