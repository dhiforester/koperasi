<?php
    $tahun=date('Y');
    if(empty($_POST['periode'])){
        echo '<div class="col-md-6 mt-3">';
        echo '  <label for="periode1">Periode Awal</label>';
        echo '  <input type="date" name="periode1" id="periode1" class="form-control">';
        echo '</div>';
        echo '<div class="col-md-6 mt-3">';
        echo '  <label for="periode2">Periode Akhir</label>';
        echo '  <input type="date" name="periode2" id="periode2" class="form-control">';
        echo '</div>';
    }else{
        $periode=$_POST['periode'];
        if($periode=="Periode"){
            echo '<div class="col-md-6 mt-3">';
            echo '  <label for="periode1">Periode Awal</label>';
            echo '  <input type="date" name="periode1" id="periode1" class="form-control">';
            echo '</div>';
            echo '<div class="col-md-6 mt-3">';
            echo '  <label for="periode2">Periode Akhir</label>';
            echo '  <input type="date" name="periode2" id="periode2" class="form-control">';
            echo '</div>';
        }else{
            if($periode=="Harian"){
                echo '<div class="col-md-12 mt-3">';
                echo '  <label for="periode_hari">Pilih Tanggal</label>';
                echo '  <input type="date" name="periode_hari" id="periode_hari" class="form-control">';
                echo '</div>';
            }else{
                if($periode=="Bulanan"){
                    echo '<div class="col-md-6 mt-3">';
                    echo '  <label for="tahun">Tahun</label>';
                    echo '  <input type="number" name="tahun" id="tahun" class="form-control" value="'.$tahun.'">';
                    echo '</div>';
                    echo '<div class="col-md-6 mt-3">';
                    echo '  <label for="bulan">Bulan</label>';
                    echo '  <select name="bulan" id="bulan" class="form-control">';
                    echo '      <option value="01">Januari</option>';
                    echo '      <option value="02">Februari</option>';
                    echo '      <option value="03">Maret</option>';
                    echo '      <option value="04">April</option>';
                    echo '      <option value="05">Mei</option>';
                    echo '      <option value="06">Juni</option>';
                    echo '      <option value="07">Juli</option>';
                    echo '      <option value="08">Agustus</option>';
                    echo '      <option value="09">September</option>';
                    echo '      <option value="10">Oktober</option>';
                    echo '      <option value="11">November</option>';
                    echo '      <option value="12">Desember</option>';
                    echo '  </select>';
                    echo '</div>';
                }else{
                    if($periode=="Tahunan"){
                        echo '<div class="col-md-12 mt-3">';
                        echo '  <label for="tahun">Tahun</label>';
                        echo '  <input type="number" name="tahun" id="tahun" class="form-control" value="'.$tahun.'">';
                        echo '</div>';
                    }else{
                        
                    }
                }
            }
        }
    }

?>