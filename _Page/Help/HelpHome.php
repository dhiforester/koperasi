<?php
    //Get keyword
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesPencarianHelp">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <input type="text" id="KeywordHelp" name="KeywordHelp" class="form-control" value="<?php echo $keyword;?>">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-6 mt-3">
                                <select name="kategori_help" id="kategori_help" class="form-control">
                                    <?php
                                        include "../../_Config/Connection.php";
                                        echo '<option value="">Semua Kategori</option>';
                                        $QryKategoriHelp = mysqli_query($Conn, "SELECT DISTINCT category FROM help ORDER BY category ASC");
                                        while ($DataKategoriHelp = mysqli_fetch_array($QryKategoriHelp)) {
                                            $CategoryHelp= $DataKategoriHelp['category'];
                                            if(!empty($CategoryHelp)){
                                                echo '<option value="'.$CategoryHelp.'">'.$CategoryHelp.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                                <small>Kategori</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="HelpList">

                </div>
            </div>
        </div>
    </div>
</section>