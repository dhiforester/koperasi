<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="email_supplier"){
            echo '<label for="keyword">Kata Kunci</label>';
            echo ' <input type="email" name="keyword" id="keyword" class="form-control" placeholder="email@domain.com">';
        }else{
            if($KeywordBy=="kontak_supplier"){
                echo '<label for="keyword">Kata Kunci</label>';
                echo ' <input type="text" name="keyword" id="keyword" class="form-control" placeholder="email@domain.com">';
            }else{
                echo '<label for="keyword">Kata Kunci</label>';
                echo ' <input type="email" name="keyword" id="keyword" class="form-control">';
            }
        }
    }else{
        echo '<label for="keyword">Kata Kunci</label>';
        echo ' <input type="email" name="keyword" id="keyword" class="form-control">';
    }
?>