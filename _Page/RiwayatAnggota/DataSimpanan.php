<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Keyword_by
    if(!empty($_POST['KeywordBySimpanan'])){
        $keyword_by=$_POST['KeywordBySimpanan'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['KeywordSimpanan'])){
        $keyword=$_POST['KeywordSimpanan'];
    }else{
        $keyword="";
    }
    //BatasSimpanan
    if(!empty($_POST['BatasSimpanan'])){
        $batas=$_POST['BatasSimpanan'];
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
        $OrderBy="id_simpanan";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$SessionIdAnggota'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE (id_anggota='$SessionIdAnggota') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%')"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$SessionIdAnggota'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE (id_anggota='$SessionIdAnggota') AND ($keyword_by like '%$keyword%')"));
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
            url     : '_Page/RiwayatAnggota/DataSimpanan.php',
            method  : "POST",
            data 	:  { page: valueNext, BatasSimpanan: batas, KeywordSimpanan: keyword, KeywordBySimpanan: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanRiwayatSimpanan').html(data);

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
            url     : '_Page/RiwayatAnggota/DataSimpanan.php',
            method  : "POST",
            data 	:  { page: ValuePrev, BatasSimpanan: batas, KeywordSimpanan: keyword, KeywordBySimpanan: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanRiwayatSimpanan').html(data);
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
                url     : '_Page/RiwayatAnggota/DataSimpanan.php',
                method  : "POST",
                data 	:  { page: PageNumber, BatasSimpanan: batas, KeywordSimpanan: keyword, KeywordBySimpanan: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanRiwayatSimpanan').html(data);
                }
            })
        });
    <?php } ?>
</script>

<?php
    if(empty($jml_data)){
        echo '<div class="row">';
        echo '  <div class="col col-md-3">';
        echo '      <div class="card">';
        echo '          <div class="card-body text-danger">';
        echo '              Belum Ada Transaksi!';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        echo '<div class="row">';
            $no = 1+$posisi;
            //KONDISI PENGATURAN MASING FILTER
            if(empty($keyword_by)){
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$SessionIdAnggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE (id_anggota='$SessionIdAnggota') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }else{
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE id_anggota='$SessionIdAnggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE (id_anggota='$SessionIdAnggota') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }
            while ($data = mysqli_fetch_array($query)) {
                $id_simpanan = $data['id_simpanan'];
                $tanggal= $data['tanggal'];
                $kategori= $data['kategori'];
                $keterangan= $data['keterangan'];
                $jumlah= $data['jumlah'];
                $jumlah = "Rp " . number_format($jumlah,0,',','.');
                $strtotime=strtotime($tanggal);
                $tanggal=date('d/m/Y H:i',$strtotime);
?>
    <div class="col col-md-3">
        <div class="card">
            <div class="card-body">
                <b><?php echo "<i class='bi bi-cart-check'></i> ID.$id_simpanan";?></b><br>
                <span><?php echo "<i class='bi bi-coin'></i> $jumlah";?></span><br>
                <small><?php echo "<i class='bi bi-calendar-check'></i> $tanggal";?></small><br>
                <small><?php echo "<i class='bi bi-tag'></i> $kategori";?></small>
            </div>
        </div>
    </div>
<?php
                $no++; 
            }
            echo '</div>';
        }
?>
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