<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['KeywordPagePosting'])){
        $keyword=$_POST['KeywordPagePosting'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['BatasPagePosting'])){
        $batas=$_POST['BatasPagePosting'];
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
        $OrderBy="id_konten_posting";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM konten_posting"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM konten_posting WHERE judul_posting like '%$keyword%' OR kategori_posting like '%$keyword%' OR isi_posting like '%$keyword%' OR datetime_posting like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM konten_posting"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM konten_posting WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/KontenWeb/TabelPagePosting.php",
            method  : "POST",
            data 	:  { page: valueNext, BatasPagePosting: batas, KeywordPagePosting: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelPagePosting').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/KontenWeb/TabelPagePosting.php",
            method  : "POST",
            data 	:  { page: ValuePrev, BatasPagePosting: batas, KeywordPagePosting: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelPagePosting').html(data);
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
            var batas=$('#batas').val();
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/KontenWeb/TabelPagePosting.php",
                method  : "POST",
                data 	:  { page: PageNumber, BatasPagePosting: batas, KeywordPagePosting: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPagePosting').html(data);
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
                                <b>Tanggal</b>
                            </th>
                            <th class="text-center">
                                <b>Judul</b>
                            </th>
                            <th class="text-center">
                                <b>Kategori</b>
                            </th>
                            <th class="text-center">
                                <b>Status</b>
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
                                echo '  <td colspan="6">';
                                echo '      <span class="text-danger">No Data</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM konten_posting ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM konten_posting WHERE judul_posting like '%$keyword%' OR kategori_posting like '%$keyword%' OR isi_posting like '%$keyword%' OR datetime_posting like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM konten_posting ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM konten_posting WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_konten_posting= $data['id_konten_posting'];
                                    $id_setting_api_key= $data['id_setting_api_key'];
                                    $judul_posting= $data['judul_posting'];
                                    $tag_posting= $data['tag_posting'];
                                    $kategori_posting= $data['kategori_posting'];
                                    $isi_posting= $data['isi_posting'];
                                    $status_posting= $data['status_posting'];
                                    $image_posting= $data['image_posting'];
                                    $datetime_posting= $data['datetime_posting'];
                                    //Ubah datetime ke strtotime
                                    $datetime_posting_strtotime=strtotime($datetime_posting);
                                    $datetime_posting=date('d/m/y', $datetime_posting_strtotime);
                                    //Label Status
                                    if($status_posting=="Publish"){
                                        $LabelStatus='<span class="badge badge-success">Publish</span>';
                                    }else{
                                        $LabelStatus='<span class="badge badge-danger">Draft</span>';
                                    }
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left text-xs">
                                    <?php echo "$datetime_posting" ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<b><a href='index.php?Page=KontenWeb&Sub=DetailPagePosting&id=$id_konten_posting'>$judul_posting</a></b><br>";
                                        echo "<i><i class='bi bi-tag'></i> $tag_posting</i>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small class='credit'>$kategori_posting</small><br>";
                                    ?>
                                </td>
                                <td class="text-center" align="center">
                                    <?php 
                                        echo $LabelStatus;
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a href="index.php?Page=KontenWeb&Sub=EditPagePosting&id=<?php echo "$id_konten_posting"; ?>" class="btn btn-primary btn-sm" title="Edit Posting">
                                            <i class="bi bi-pencil-square"></i>
                                        </a> 
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusPagePosting" data-id="<?php echo "$id_konten_posting,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Posting">
                                            <i class="bi bi-trash"></i>
                                        </button> 
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $no++; }}
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