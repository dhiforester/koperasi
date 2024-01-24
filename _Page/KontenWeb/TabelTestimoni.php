<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    include "../../_Config/Session.php";
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['KeywordTestimoni'])){
        $keyword=$_POST['KeywordTestimoni'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['BatasTestimoni'])){
        $batas=$_POST['BatasTestimoni'];
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
        $OrderBy="id_testimoni";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni WHERE tanggal like '%$keyword%' OR nama like '%$keyword%' OR email like '%$keyword%' OR testimoni like '%$keyword%' OR status like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var BatasTestimoni="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/KontenWeb/TabelTestimoni.php",
            method  : "POST",
            data 	:  { page: valueNext, BatasTestimoni: BatasTestimoni, KeywordTestimoni: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelTestimoni').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var BatasTestimoni="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/KontenWeb/TabelTestimoni.php",
            method  : "POST",
            data 	:  { page: ValuePrev, BatasTestimoni: BatasTestimoni, KeywordTestimoni: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelTestimoni').html(data);
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
            var BatasTestimoni="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/KontenWeb/TabelTestimoni.php",
                method  : "POST",
                data 	:  { page: PageNumber, BatasTestimoni: BatasTestimoni, KeywordTestimoni: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelTestimoni').html(data);
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
                                <b>Testimoni</b>
                            </th>
                            <th class="text-center">
                                <b>Nama/Email User</b>
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
                                echo '  <td colspan="5">';
                                echo '      <span class="text-danger">Belum Ada Data Testimoni</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM testimoni ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM testimoni WHERE tanggal like '%$keyword%' OR nama like '%$keyword%' OR email like '%$keyword%' OR testimoni like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM testimoni ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM testimoni WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_testimoni= $data['id_testimoni'];
                                    $tanggal= $data['tanggal'];
                                    $nama= $data['nama'];
                                    $email= $data['email'];
                                    $image= $data['image'];
                                    $testimoni= $data['testimoni'];
                                    $status= $data['status'];
                                    $strtotime=strtotime($tanggal);
                                    $tanggal_format=date('d/m/Y H:i',$strtotime);
                                    if($status=="Pending"){
                                        $LabelStatus='<span class="badge badge-danger">Pending</span>';
                                    }else{
                                        if($status=="Draft"){
                                            $LabelStatus='<span class="badge badge-warning">Draft</span>';
                                        }else{
                                            if($status=="Publish"){
                                                $LabelStatus='<span class="badge badge-success">Publish</span>';
                                            }else{
                                                $LabelStatus='<span class="badge badge-dark">None</span>';
                                            }
                                        }
                                    }
                                    if(empty($image_url)){
                                        $image_url='';
                                    }else{
                                        $image_url="$base_url/assets/img/Testimoni/$image";
                                    }
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left text-xs" align="left">
                                    <?php 
                                        echo "<b>$tanggal_format</b><br>";
                                        echo '<small class="credit">';
                                        echo '  <i>'.$testimoni.'</i>';
                                        echo '</small>';
                                    ?>
                                </td>
                                <td class="text-left text-xs" align="left">
                                    <?php 
                                        echo '<small class="credit">';
                                        echo '  <b>'.$nama.'</b><br>';
                                        echo '  URL: '.$email.'';
                                        echo '</small>';
                                    ?>
                                </td>
                                
                                <td class="text-center" align="center">
                                    <?php 
                                        echo "$LabelStatus";
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditTestimoni" data-id="<?php echo "$id_testimoni,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Edit Testimoni">
                                            <i class="bi bi-pencil-square"></i>
                                        </button> 
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusTestimoni" data-id="<?php echo "$id_testimoni,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Testimoni">
                                            <i class="bi bi-x"></i>
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