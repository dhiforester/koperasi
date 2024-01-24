<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap KeywordBy
    if(empty($_POST['KeywordByAnggota'])){
        echo '<input type="text" name="KeywordAnggota" id="KeywordAnggota" class="form-control">';
        echo '<small for="KeywordAnggota">Pencarian</small>';
    }else{
        $KeywordBy=$_POST['KeywordByAnggota'];
        if($KeywordBy=="tanggal_masuk"){
            echo '<input type="date" name="KeywordAnggota" id="KeywordAnggota" class="form-control">';
            echo '<small for="KeywordAnggota">Pencarian</small>';
        }else{
            if($KeywordBy=="status"){
                echo '<select name="KeywordAnggota" id="KeywordAnggota" class="form-control">';
                echo '  <option value="">Pilih</option>';
                $QryAnggota = mysqli_query($Conn, "SELECT DISTINCT status FROM anggota");
                while ($DataAnggota = mysqli_fetch_array($QryAnggota)) {
                    $status = $DataAnggota['status'];
                    echo '  <option value="'.$status.'">'.$status.'</option>';
                }
                echo '</select>';
                echo '<small for="KeywordAnggota">Pencarian</small>';
            }else{
                echo '<input type="text" name="KeywordAnggota" id="KeywordAnggota" class="form-control">';
                echo '<small for="KeywordAnggota">Pencarian</small>';
            }
        }
    }
?>