<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['metode'])){
        echo '<option value="">Pilih</option>';
        echo '<option value="Cash">Cash</option>';
        echo '<option value="Transfer">Transfer</option>';
        echo '<option value="Online">Online</option>';
    }else{
        $metode=$_POST['metode'];
?>
    <option <?php if($metode==""){echo "selected";} ?> value="">Pilih</option>
    <option <?php if($metode=="Cash"){echo "selected";} ?> value="Cash">Cash</option>
    <option <?php if($metode=="Transfer"){echo "selected";} ?> value="Transfer">Transfer</option>
    <option <?php if($metode=="Online"){echo "selected";} ?> value="Online">Online</option>
<?php } ?>