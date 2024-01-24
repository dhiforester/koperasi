<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['keyword_by'])){
        echo '<input type="text" name="KeywordAktivitasUmum" id="KeywordAktivitasUmum" class="form-control">';
        echo '<small>Keyword</small>';
    }else{
        $keyword_by=$_POST['keyword_by'];
        if($keyword_by=="datetime_log"){
            echo '<input type="date" name="KeywordAktivitasUmum" id="KeywordAktivitasUmum" class="form-control">';
            echo '<small>Keyword</small>';
        }else{
            if($keyword_by=="deskripsi_log"){
                echo '<input type="text" name="KeywordAktivitasUmum" id="KeywordAktivitasUmum" class="form-control">';
                echo '<small>Keyword</small>';
            }else{
                if($keyword_by=="kategori_log"){
                    echo '<select name="KeywordAktivitasUmum" id="KeywordAktivitasUmum" class="form-control">';
                    echo '  <option value="">Pilih</option>';
                    $query = mysqli_query($Conn, "SELECT DISTINCT kategori_log FROM log ORDER BY kategori_log ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $kategori_log= $data['kategori_log'];
                        echo '  <option value="'.$kategori_log.'">'.$kategori_log.'</option>';
                    }
                    echo '</select>';
                    echo '<small>Keyword</small>';
                }else{
                    if($keyword_by=="id_akses"){
                        echo '<select name="KeywordAktivitasUmum" id="KeywordAktivitasUmum" class="form-control">';
                        echo '  <option value="">Pilih</option>';
                        $query = mysqli_query($Conn, "SELECT DISTINCT id_akses FROM log ORDER BY id_akses ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_akses= $data['id_akses'];
                            $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                            $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                            $nama_akses= $DataDetailAkses['nama_akses'];
                            //Buka akses
                            echo '  <option value="'.$id_akses.'">'.$nama_akses.'</option>';
                        }
                        echo '</select>';
                        echo '<small>Keyword</small>';
                    }else{
                        echo '<input type="text" name="KeywordAktivitasUmum" id="KeywordAktivitasUmum" class="form-control">';
                        echo '<small>Keyword</small>';
                    }
                }
            }
        }
    }
?>