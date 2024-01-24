<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Keyword_by
    if(!empty($_POST['KeywordByPembelian'])){
        $keyword_by=$_POST['KeywordByPembelian'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['KeywordPembelian'])){
        $keyword=$_POST['KeywordPembelian'];
    }else{
        $keyword="";
    }
    //BatasPembelian
    if(!empty($_POST['BatasPembelian'])){
        $batas=$_POST['BatasPembelian'];
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
        $OrderBy="id_transaksi";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$SessionIdAnggota' AND kategori='Penjualan'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$SessionIdAnggota' AND kategori='Penjualan') AND (tanggal like '%$keyword%' OR status like '%$keyword%')"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$SessionIdAnggota' AND kategori='Penjualan'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$SessionIdAnggota' AND kategori='Penjualan') AND ($keyword_by like '%$keyword%')"));
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
            url     : '_Page/RiwayatAnggota/DataPembelian.php',
            method  : "POST",
            data 	:  { page: valueNext, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanRiwayatPembelian').html(data);

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
            url     : '_Page/RiwayatAnggota/DataPembelian.php',
            method  : "POST",
            data 	:  { page: ValuePrev, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanRiwayatPembelian').html(data);
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
                url     : '_Page/RiwayatAnggota/DataPembelian.php',
                method  : "POST",
                data 	:  { page: PageNumber, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanRiwayatPembelian').html(data);
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
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$SessionIdAnggota' AND kategori='Penjualan' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$SessionIdAnggota' AND kategori='Penjualan') AND (tanggal like '%$keyword%' OR status like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }else{
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$SessionIdAnggota' AND kategori='Penjualan' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$SessionIdAnggota' AND kategori='Penjualan') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }
            while ($data = mysqli_fetch_array($query)) {
                $id_transaksi= $data['id_transaksi'];
                $id_akses= $data['id_akses'];
                $tanggal= $data['tanggal'];
                $kategori= $data['kategori'];
                $tagihan= $data['tagihan'];
                $pembayaran= $data['pembayaran'];
                $kembalian= $data['kembalian'];
                $metode= $data['metode'];
                $status= $data['status'];
                $pembayaran = "" . number_format($pembayaran,0,',','.');
                $tagihan = "Rp " . number_format($tagihan,0,',','.');
                $kembalian = "" . number_format($kembalian,0,',','.');
                $strtotime=strtotime($tanggal);
                $tanggal=date('d/m/Y H:i',$strtotime);
?>
    <div class="col col-md-3">
        <div class="card">
            <div class="card-body">
                <b><?php echo "<i class='bi bi-cart-check'></i> ID.$id_transaksi";?></b><br>
                <span><?php echo "<i class='bi bi-coin'></i> $tagihan";?></span><br>
                <small><?php echo "<i class='bi bi-calendar-check'></i> $tanggal";?></small><br>
                <small><?php echo "<i class='bi bi-tag'></i> $status";?></small>
            </div>
            <div class="card-footer">
                <a href="index.php?Page=RiwayatAnggota&Sub=DetailPembelian&id=<?php echo $id_transaksi;?>">
                    Lihat Transaksi
                </a>
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