<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    //kategori
    if(!empty($_POST['kategori'])){
        $kategori=$_POST['kategori'];
    }else{
        $kategori="";
    }
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="10";
    }
    //ShortBy
    if(!empty($_POST['ShortBy'])){
        $ShortBy=$_POST['ShortBy'];
        if($ShortBy=="ASC"){
            $NextShort="DESC";
        }else{
            $NextShort="ASC";
        }
    }else{
        $ShortBy="DESC";
        $NextShort="ASC";
    }
    //OrderBy
    if(!empty($_POST['OrderBy'])){
        $OrderBy=$_POST['OrderBy'];
    }else{
        $OrderBy="id_dokumentasi_api";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($_POST['kategori'])){
        if(empty($keyword_by)){
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE updatetime_api like '%$keyword%' OR judul_api like '%$keyword%' OR kategori_api like '%$keyword%' OR metode_api like '%$keyword%' OR url_api like '%$keyword%' OR request_api like '%$keyword%' OR response_api like '%$keyword%'"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE $keyword_by like '%$keyword%'"));
            }
        }
    }else{
        if(empty($keyword_by)){
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE kategori_api='$kategori'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE (kategori_api='$kategori') AND (updatetime_api like '%$keyword%' OR judul_api like '%$keyword%' OR kategori_api like '%$keyword%' OR metode_api like '%$keyword%' OR url_api like '%$keyword%' OR request_api like '%$keyword%' OR response_api like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE kategori_api='$kategori'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE (kategori_api='$kategori') AND ($keyword_by like '%$keyword%')"));
            }
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/ApiDoc/TabelApiDoc.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelApiDoc').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/ApiDoc/TabelApiDoc.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelApiDoc').html(data);
            }
        })
    });
    <?php 
        $JmlHalaman =ceil($jml_data/$batas); 
        $a=1;
        $b=$JmlHalaman;
        for ( $i =$a; $i<=$b; $i++ ){
    ?>
        //ketika klik page number
        $('#PageNumber<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumber<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/ApiDoc/TabelApiDoc.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelApiDoc').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Title/Description</b>
                            </th>
                            <th class="text-center">
                                <b>Method</b>
                            </th>
                            <th class="text-center">
                                <b>Date Time</b>
                            </th>
                            <th class="text-center">
                                <b>Option</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="5" class="text-center">';
                                echo '      <span class="text-danger">No Data</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                if(empty($_POST['kategori'])){
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE updatetime_api like '%$keyword%' OR judul_api like '%$keyword%' OR kategori_api like '%$keyword%' OR metode_api like '%$keyword%' OR url_api like '%$keyword%' OR request_api like '%$keyword%' OR response_api like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }
                                }else{
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE  kategori_api='$kategori' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE (updatetime_api like '%$keyword%' OR judul_api like '%$keyword%' OR kategori_api like '%$keyword%' OR metode_api like '%$keyword%' OR url_api like '%$keyword%' OR request_api like '%$keyword%' OR response_api like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE kategori_api='$kategori' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM dokumentasi_api WHERE (kategori_api='$kategori') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_dokumentasi_api=$data['id_dokumentasi_api'];
                                    $updatetime_api=$data['updatetime_api'];
                                    $kategori_api=$data['kategori_api'];
                                    $judul_api=$data['judul_api'];
                                    $metode_api= $data['metode_api'];
                                    $url_api= $data['url_api'];
                                    $request_api= $data['request_api'];
                                    $response_api= $data['response_api'];
                                    //Ubah waktu ke format lokal
                                    date_default_timezone_set('Asia/Jakarta');
                                    //Ubah STRTOTIME to DATETIME
                                    $updatetime_api=date('d/m/y H:i',$updatetime_api);
                                ?>
                                    <tr>
                                        <td class="text-xs" align="right">
                                            <?php echo "$no.$no2" ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <b><?php echo "<a href='index.php?Page=ApiDoc&Sub=ApiDocViewer&id=$id_dokumentasi_api'>$judul_api</a>";?></b>
                                            <br>
                                            <small><?php echo "$kategori_api";?></small><br>
                                            <small class="credit">
                                                <?php echo "$url_api";?>
                                            </small>
                                            <br>
                                        </td>
                                        <td class="text-left text-xs">
                                            <?php echo "<small>$metode_api</small>" ?>
                                        </td>
                                        <td class="text-left text-xs">
                                            <?php echo "<small>$updatetime_api</small>" ?>
                                        </td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <a href="index.php?Page=ApiDoc&Sub=ApiDocEditor&id=<?php echo $id_dokumentasi_api;?>" class="btn btn-success btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>  
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteDocApi" data-id="<?php echo "$id_dokumentasi_api"; ?>">
                                                    <i class="bi bi-x"></i>
                                                </button>   
                                            </div>
                                            
                                        </td>
                                    </tr>
                            <?php
                                        $no++;
                                    }
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-center">
    <div class="btn-group shadow-0" role="group" aria-label="Basic example">
        <?php
            //Mengatur Halaman
            $JmlHalaman = ceil($jml_data/$batas); 
            $JmlHalaman_real = ceil($jml_data/$batas); 
            $prev=$page-1;
            $next=$page+1;
            if($next>$JmlHalaman){
                $next=$page;
            }else{
                $next=$page+1;
            }
            if($prev<"1"){
                $prev="1";
            }else{
                $prev=$page-1;
            }
        ?>
        <button class="btn btn-sm btn-outline-info" id="PrevPage" value="<?php echo $prev;?>">
            <span aria-hidden="true">«</span>
        </button>
        <?php 
            //Navigasi nomor
            if($JmlHalaman>3){
                if($page>=2){
                    $a=$page-1;
                    $b=$page+1;
                    if($JmlHalaman<=$b){
                        $a=$page-1;
                        $b=$JmlHalaman;
                    }
                }else{
                    $a=1;
                    $b=$page+1;
                    if($JmlHalaman<=$b){
                        $a=1;
                        $b=$JmlHalaman;
                    }
                }
            }else{
                $a=1;
                $b=$JmlHalaman;
            }
            for ( $i =$a; $i<=$b; $i++ ){
                if($page=="$i"){
                    echo '<button class="btn btn-sm btn-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                }else{
                    echo '<button class="btn btn-sm btn-outline-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                }
            }
        ?>
        <button class="btn btn-sm btn-outline-info" id="NextPage" value="<?php echo $next;?>">
            <span aria-hidden="true">»</span>
        </button>
    </div>
</div>