<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_help'])){
        echo "<span>ID Data bantuan Tidak Boleh Kosong</span>";
    }else{
        $id_help=$_POST['id_help'];
        //Buka data dokumentasi_api
        $QryHelp = mysqli_query($Conn,"SELECT * FROM help WHERE id_help='$id_help'")or die(mysqli_error($Conn));
        $DataHelp = mysqli_fetch_array($QryHelp);
        $title=$DataHelp['title'];
        $category=$DataHelp['category'];
        $description=$DataHelp['description'];
        $datetime=$DataHelp['datetime'];
        //Zona waktu
        date_default_timezone_set("Asia/Jakarta");
        $datetime=date('d F Y', $datetime);
?>
    <div class="row">
        <div class="col-md-12">
            <b class="card-title">
                <?php echo "$title"; ?>
            </b><br>
            <small><?php echo "<i>Category: $category</i>";?></small><br>
            <small><?php echo "<i>Last Update: $datetime</i>";?></small><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php echo $description;?>
        </div>
    </div>
<?php } ?>