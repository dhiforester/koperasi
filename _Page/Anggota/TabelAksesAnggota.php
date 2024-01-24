<?php
    //koneksi dan session
    date_default_timezone_set("Asia/Jakarta");
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Keyword_by
    if(!empty($_POST['StatusAksesAnggota'])){
        $keyword_by="status";
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['StatusAksesAnggota'])){
        $keyword=$_POST['StatusAksesAnggota'];
    }else{
        if(!empty($_POST['KeywordAksesAnggota'])){
            $keyword=$_POST['KeywordAksesAnggota'];
        }else{
            $keyword="";
        }
    }
    //batas
    if(!empty($_POST['BatasAksesAnggota'])){
        $batas=$_POST['BatasAksesAnggota'];
    }else{
        $batas="10";
    }
    //ShortBy
    if(!empty($_POST['ShortByAksesAnggota'])){
        $ShortBy=$_POST['ShortByAksesAnggota'];
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
    if(!empty($_POST['OrderByAksesAnggota'])){
        $OrderBy=$_POST['OrderByAksesAnggota'];
    }else{
        $OrderBy="id_akses_anggota";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE tanggal like '%$keyword%' OR nama_anggota like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR status like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE $keyword_by like '%$keyword%'"));
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
            url     : "_Page/Anggota/TabelAksesAnggota.php",
            method  : "POST",
            data 	:  { page: valueNext, BatasAksesAnggota: batas, KeywordAksesAnggota: keyword, KeywordByAksesAnggota: keyword_by, OrderByAksesAnggota: OrderBy, ShortByAksesAnggota: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelAksesAnggota').html(data);

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
            url     : "_Page/Anggota/TabelAksesAnggota.php",
            method  : "POST",
            data 	:  { page: ValuePrev, BatasAksesAnggota: batas, KeywordAksesAnggota: keyword, KeywordByAksesAnggota: keyword_by, OrderByAksesAnggota: OrderBy, ShortByAksesAnggota: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelAksesAnggota').html(data);
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
                url     : "_Page/Anggota/TabelAksesAnggota.php",
                method  : "POST",
                data 	:  { page: PageNumber, BatasAksesAnggota: batas, KeywordAksesAnggota: keyword, KeywordByAksesAnggota: keyword_by, OrderByAksesAnggota: OrderBy, ShortByAksesAnggota: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelAksesAnggota').html(data);
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
                                <b>Nama Akses</b>
                            </th>
                            <th class="text-center">
                                <b>Kontak & Email</b>
                            </th>
                            <th class="text-center">
                                <b>Status</b>
                            </th>
                            <th class="text-center">
                                <b>Anggota</b>
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
                                echo '  <td colspan="5">';
                                echo '      <span class="text-danger">Belum Ada Permintaan Akses Anggota</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM akses_anggota ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE tanggal like '%$keyword%' OR nama_anggota like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM akses_anggota ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM akses_anggota WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_akses_anggota= $data['id_akses_anggota'];
                                    //Inisiasi id_anggota
                                    if(empty($data['id_anggota'])){
                                        $LabelAnggota='<span class="text-danger"><i class="bi bi-x"></i> Tidak Terhubung</span>';
                                        $nama='<span class="text-danger"><i class="bi bi-x"></i> Tidak Terhubung</span>';
                                        $email_anggota='<span class="text-danger"><i class="bi bi-x"></i> Tidak Terhubung</span>';
                                    }else{
                                        $id_anggota= $data['id_anggota'];
                                        //Cek apakah id_anggota ada pada data anggota
                                        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                                        $DataAnggota = mysqli_fetch_array($QryAnggota);
                                        $nama= $DataAnggota['nama'];
                                        if(!empty($DataAnggota['email'])){
                                            $email_anggota= $DataAnggota['email'];
                                        }else{
                                            $email_anggota='<span class="text-danger">Tidak Ada Email</span>';
                                        }
                                        if(empty($DataAnggota['status'])){
                                            $LabelAnggota='<span class="text-warning"><i class="bi bi-info-circle"></i> ID Null</span>';
                                        }else{
                                            $status_anggota= $DataAnggota['status'];
                                            $LabelAnggota='<span class="text-success"><i class="bi bi-info-circle"></i> ID Valid ('.$status_anggota.')</span>';
                                        }
                                    }
                                    $tanggal= $data['tanggal'];
                                    $strtotime=strtotime($tanggal);
                                    $tanggal=date('d/m/Y H:i',$strtotime);
                                    $nama_anggota= $data['nama_anggota'];
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
                                    $status= $data['status'];
                                    if($status=="Active"){
                                        $LabelStatus='<span class="badge bg-success">Active</span>';
                                    }else{
                                        if($status=="Requested"){
                                            $LabelStatus='<span class="badge bg-warning">Requested</span>';
                                        }else{
                                            if($status=="Pendding"){
                                                $LabelStatus='<span class="badge bg-danger">Pending</span>';
                                            }else{
                                                $LabelStatus='<span class="badge bg-danger">'.$status.'</span>';
                                            }
                                        }
                                    }
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo '<small>';
                                        echo "$no";
                                        echo '</small>';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<small class="credit">';
                                        echo "<b>$nama_anggota</b><br>";
                                        echo "<small>$tanggal</small>";
                                        echo '</small>';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<small class="credit">';
                                        echo "  <b>$kontak</b><br>";
                                        echo "  <small>$email</small>";
                                        echo '</small>';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalStatusAksesAnggota" data-id="<?php echo "$id_akses_anggota,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Update Status Permintaan Akses Anggota">
                                            <?php 
                                                echo "<b>$LabelStatus</b><br>";
                                                echo "<small>$LabelAnggota</small>";
                                            ?>
                                        </a> 
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<small class="credit">';
                                        echo "  <b>$nama</b><br>";
                                        echo "  <small>$email_anggota</small>";
                                        echo '</small>';
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeletePermintaanAksesAnggota" data-id="<?php echo "$id_akses_anggota,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Permintaan Akses Anggota">
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