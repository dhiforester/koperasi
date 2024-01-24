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
        $OrderBy="id_anggota";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE tanggal_masuk like '%$keyword%' OR nip like '%$keyword%' OR nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR status like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE $keyword_by like '%$keyword%'"));
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
            url     : "_Page/Anggota/TabelAnggota.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelAnggota').html(data);

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
            url     : "_Page/Anggota/TabelAnggota.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelAnggota').html(data);
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
                url     : "_Page/Anggota/TabelAnggota.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelAnggota').html(data);
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
                                <b>Nama Anggota</b>
                            </th>
                            <th class="text-center">
                                <b>Kontak & Email</b>
                            </th>
                            <th class="text-center">
                                <b>Tanggal Daftar</b>
                            </th>
                            <th class="text-center">
                                <b>Status</b>
                            </th>
                            <th class="text-center">
                                <b>Opsi</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="6">';
                                echo '      <span class="text-danger">Belum Memiliki Data Anggota</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM anggota ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM anggota WHERE tanggal_masuk like '%$keyword%' OR nip like '%$keyword%' OR nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM anggota ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM anggota WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_anggota= $data['id_anggota'];
                                    $tanggal_masuk= $data['tanggal_masuk'];
                                    if(empty($data['nip'])){
                                        $nip='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $nip= $data['nip'];
                                    }
                                    
                                    $nama= $data['nama'];
                                    if(empty($data['email'])){
                                        $email='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $email= $data['email'];
                                    }
                                    if(empty($data['kontak'])){
                                        $kontak='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $kontak= $data['kontak'];
                                    }
                                    $image= $data['image'];
                                    $status= $data['status'];
                                    $strtotime=strtotime($tanggal_masuk);
                                    $TanggalMasuk=date('d/m/Y',$strtotime);
                                    if($status=="Active"){
                                        $LabelStatus='<span class="badge bg-success">Active</span>';
                                    }else{
                                        $LabelStatus='<span class="badge bg-danger">'.$status.'</span>';
                                    }
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left" align="left">
                                    <b>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailAnggota" data-id="<?php echo "$id_anggota"; ?>" title="Detail Data Anggota">
                                            <?php echo "$nama";?>
                                        </a>
                                    </b>
                                    <br>
                                    <small class="credit">
                                        <?php 
                                            echo "<i class='bi bi-person-badge'></i> $nip";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <?php 
                                            echo "<i class='bi bi-phone'></i> $kontak <br>";
                                            echo "<i class='bi bi-envelope'></i> $email";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <?php 
                                            echo "<i class='bi bi-calendar'></i> $TanggalMasuk";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-center" align="center">
                                    <small class="credit">
                                        <?php 
                                            echo "<b>$LabelStatus</b>";
                                        ?>
                                    </small>
                                    <br>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditAnggota" data-id="<?php echo "$id_anggota,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Edit Data Anggota">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>  
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteAnggota" data-id="<?php echo "$id_anggota,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Data Anggota">
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