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
        $OrderBy="id_akses";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE nama_akses like '%$keyword%' OR kontak_akses like '%$keyword%' OR email_akses like '%$keyword%' OR akses like '%$keyword%' OR status like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE $keyword_by like '%$keyword%'"));
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
            url     : "_Page/Akses/TabelAkses.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelAkses').html(data);

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
            url     : "_Page/Akses/TabelAkses.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelAkses').html(data);
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
                url     : "_Page/Akses/TabelAkses.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelAkses').html(data);
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
                                <b>Nama</b>
                            </th>
                            <th class="text-center">
                                <b>Alamat & Kontak</b>
                            </th>
                            <th class="text-center">
                                <b>Akses</b>
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
                                echo '<td colspan="5">Belum Ada Data Akses</td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM akses WHERE nama_akses like '%$keyword%' OR kontak_akses like '%$keyword%' OR email_akses like '%$keyword%' OR akses like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM akses ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM akses WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_akses= $data['id_akses'];
                                    $id_mitra= $data['id_mitra'];
                                    $nama_akses= $data['nama_akses'];
                                    $kontak_akses= $data['kontak_akses'];
                                    $email_akses= $data['email_akses'];
                                    $password= $data['password'];
                                    $akses= $data['akses'];
                                    $status= $data['status'];
                                    $image_akses= $data['image_akses'];
                                    $datetime_update= $data['datetime_update'];
                                    $strtotime=strtotime($datetime_update);
                                    $datetime_update=date('d/m/Y H:i',$strtotime);
                                    $datetime_update=$datetime_update;
                                    //Cek Label pada entitas
                                    $QryEntitas=mysqli_query($Conn,"SELECT * FROM akses_entitas WHERE akses='$akses'")or die(mysqli_error($Conn));
                                    $DataEntitas=mysqli_fetch_array($QryEntitas);
                                    if(empty($DataEntitas['class_label'])){
                                        $LabelAkses='<span class="badge badge-sm bg-dark" title="Akses Tidak Terdaftar Pada Entitas">'.$akses.' (Error!)</span>';
                                    }else{
                                        $class_label=$DataEntitas['class_label'];
                                        $LabelAkses='<span class="badge badge-sm '.$class_label.'">'.$akses.'</span>';
                                    }
                            ?>
                        <tr>
                            <td class="text-center text-xs">
                                <?php echo "$no" ?>
                            </td>
                            <td class="text-left" align="left">
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailAkses" data-id="<?php echo "$id_akses,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Lihat Detail Akses">
                                    <b><i class="bi bi-person-circle"></i> <?php echo "$nama_akses";?></b>
                                </a>
                                <br>
                                <small class="credit" title="Tanggal Update Akses">
                                    <i class="bi bi-calendar-check"></i> <?php echo "$datetime_update";?>
                                </small>
                            </td>
                            <td class="text-left" align="left">
                                <?php 
                                    echo "<b><i class='bi bi-envelope'></i> $email_akses</b><br>";
                                    echo "<small><i class='bi bi-phone'></i> $kontak_akses</small>";
                                ?>
                            </td>
                            <td class="text-left" align="left">
                                <?php
                                    echo ''.$LabelAkses.'';
                                ?>

                                <?php
                                    echo '<br>';
                                    if($status=="Active"){
                                        echo '<small class="text-success">Active</small>';
                                    }else{
                                        if($status=="Pending"){
                                            echo '<small class="text-warning">Pending</small>';
                                        }else{
                                            echo '<small class="text-dark">'.$status.'</small>';
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword" data-id="<?php echo "$id_akses,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Ubah Password">
                                        <i class="bi bi-key"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditAkses" data-id="<?php echo "$id_akses,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Edit Akses">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>  
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteAkses" data-id="<?php echo "$id_akses,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Akses">
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