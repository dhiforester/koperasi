<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['KeywordByRincian'])){
        echo '<input type="text" name="KeywordRincian" id="KeywordRincian" class="form-control">';
        echo '<small for="KeywordRincian">Kata Kunci</small>';
    }else{
        $KeywordBy=$_POST['KeywordByRincian'];
        if($KeywordBy=="nama_barang"){
            echo '<input type="text" name="KeywordRincian" id="KeywordRincian" class="form-control">';
            echo '<small for="KeywordRincian">Kata Kunci</small>';
        }else{
            if($KeywordBy=="tanggal"){
                echo '<input type="date" name="KeywordRincian" id="KeywordRincian" class="form-control">';
                echo '<small for="KeywordRincian">Kata Kunci</small>';
            }else{
                if($KeywordBy=="kategori_rincian"){
                    echo '<select name="KeywordRincian" id="KeywordRincian" class="form-control">';
                    echo '  <option value="">Pilih</option>';
                    $query = mysqli_query($Conn, "SELECT DISTINCT kategori_rincian FROM transaksi_rincian ORDER BY kategori_rincian ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $kategori_rincian= $data['kategori_rincian'];
                        echo '  <option value="'.$kategori_rincian.'">'.$kategori_rincian.'</option>';
                    }
                    echo '</select>';
                    echo '<small for="FilterKeyword">Kata Kunci</small>';
                }else{
                    if($KeywordBy=="satuan"){
                        echo '<select name="KeywordRincian" id="KeywordRincian" class="form-control">';
                        echo '  <option value="">Pilih</option>';
                        $query = mysqli_query($Conn, "SELECT DISTINCT satuan FROM transaksi_rincian ORDER BY satuan ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $satuan= $data['satuan'];
                            echo '  <option value="'.$satuan.'">'.$satuan.'</option>';
                        }
                        echo '</select>';
                        echo '<small for="FilterKeyword">Kata Kunci</small>';
                    }else{
                        echo '<label for="KeywordRincian">Kata Kunci</label>';
                        echo '<input type="text" name="KeywordRincian" id="KeywordRincian" class="form-control">';
                    }
                }
            }
        }
    }
?>