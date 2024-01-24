<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['mode_waktu'])){
        echo '<input type="text" readonly name="Bulan" id="Bulan" class="form-control">';
        echo '<small>Bulan</small>';
    }else{
        $mode_waktu=$_POST['mode_waktu'];
        if($mode_waktu=="Tahunan"){
            echo '<input type="text" readonly name="Bulan" id="Bulan" class="form-control">';
            echo '<small>Bulan</small>';
        }else{
            if($mode_waktu=="Bulanan"){
?>
                <select name="Bulan" id="Bulan" class="form-control">
                    <option <?php if(date('m')=='01'){echo "selected";} ?> value="01">Januari</option>
                    <option <?php if(date('m')=='02'){echo "selected";} ?> value="02">Februari</option>
                    <option <?php if(date('m')=='03'){echo "selected";} ?> value="03">Maret</option>
                    <option <?php if(date('m')=='04'){echo "selected";} ?> value="04">April</option>
                    <option <?php if(date('m')=='05'){echo "selected";} ?> value="05">Mei</option>
                    <option <?php if(date('m')=='06'){echo "selected";} ?> value="06">Juni</option>
                    <option <?php if(date('m')=='07'){echo "selected";} ?> value="07">Juli</option>
                    <option <?php if(date('m')=='08'){echo "selected";} ?> value="08">Agustus</option>
                    <option <?php if(date('m')=='09'){echo "selected";} ?> value="09">September</option>
                    <option <?php if(date('m')=='10'){echo "selected";} ?> value="10">Oktober</option>
                    <option <?php if(date('m')=='11'){echo "selected";} ?> value="11">November</option>
                    <option <?php if(date('m')=='12'){echo "selected";} ?> value="12">Desember</option>
                </select>
                <small>Bulan</small>
<?php    
            }else{
                echo '<input type="text" readonly name="Bulan" id="Bulan" class="form-control">';
                echo '<small>Bulan</small>';
            }
        }
    }
?>