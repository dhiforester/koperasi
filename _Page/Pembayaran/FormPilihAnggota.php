<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //KeywordByAnggota
    if(!empty($_POST['KeywordByAnggota'])){
        $keyword_by=$_POST['KeywordByAnggota'];
    }else{
        $keyword_by="";
    }
    //KeywordAnggota
    if(!empty($_POST['KeywordAnggota'])){
        $keyword=$_POST['KeywordAnggota'];
    }else{
        $keyword="";
    }
    //JumlahDataAnggota
    if(!empty($_POST['JumlahDataAnggota'])){
        $batas=$_POST['JumlahDataAnggota'];
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
    $('#NextPageAnggota').click(function() {
        var valueNext=$('#NextPageAnggota').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Pembayaran/FormPilihAnggota.php',
            method  : "POST",
            data 	:  { page: valueNext, JumlahDataAnggota: batas, KeywordAnggota: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#FormPilihAnggota').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPageAnggota').click(function() {
        var ValuePrev = $('#PrevPageAnggota').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Pembayaran/FormPilihAnggota.php',
            method  : "POST",
            data 	:  { page: ValuePrev, JumlahDataAnggota: batas, KeywordAnggota: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#FormPilihAnggota').html(data);
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
        $('#PageNumberAnggota<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumberAnggota<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : '_Page/Pembayaran/FormPilihAnggota.php',
                method  : "POST",
                data 	:  { page: PageNumber, JumlahDataAnggota: batas, KeywordAnggota: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#FormPilihAnggota').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row mb-3">
    <div class="col-md-12 text-center" style="height: 350px; overflow-y: scroll;">
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(empty($jml_data)){
                            echo '<tr>';
                            echo '  <td colspan="5" class="text-center">';
                            echo '      Belum Ada Anggota';
                            echo '  </td>';
                            echo '</tr>';
                        }else{
                            $no = 1+$posisi;
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
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalKonfirmasiAnggota" data-id="<?php echo "$id_anggota,$keyword_by,$keyword,$batas,$page"; ?>">
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
                    </tr>
                    <?php
                                $no++; }
                            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-left">
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
            <button class="btn btn-sm btn-outline-info" id="PrevPageAnggota" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberAnggota'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberAnggota'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPageAnggota" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>