<?php
    if(empty($_GET['id'])){
        echo "<span>ID cannot be empty</span>";
    }else{
        $id_help=$_GET['id'];
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
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">
                                    <?php echo "$title"; ?>
                                </h4>
                                <small><?php echo "<i>Category: $category</i>";?></small>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=Help&Sub=HelpHome" class="btn btn-md btn-dark btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-short"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <?php echo $description;?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        Last Update <?php echo $datetime;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>