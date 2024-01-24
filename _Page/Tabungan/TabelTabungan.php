<?php
    //koneksi dan session
    ini_set("display_errors","off");
    date_default_timezone_set("Asia/Jakarta");
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE nama like '%$keyword%' OR tanggal like '%$keyword%' OR kategori like '%$keyword%' OR keterangan like '%$keyword%' OR jumlah like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE $keyword_by like '%$keyword%'"));
        }
    }
    //Jumlah Simpanan
    $SumSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori!='Penarikan'"));
    $JumlahSimpanan1 = $SumSimpanan['jumlah'];
    $JumlahSimpanan = "" . number_format($JumlahSimpanan1,0,',','.');
    //Jumlah Penarikan
    $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori='Penarikan'"));
    $JumlahPenarikan1 = $SumPenarikan['jumlah'];
    $JumlahPenarikan = "" . number_format($JumlahPenarikan1,0,',','.');
    //Simpanan Netto
    $SimpananNetto1=$JumlahSimpanan1-$JumlahPenarikan1;
    $SimpananNetto = "" . number_format($SimpananNetto1,0,',','.');
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
        $('#MenampilkanTabelTabungan').html("Loading...");
        $.ajax({
            url     : "_Page/Tabungan/TabelTabungan.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelTabungan').html(data);
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
        $('#MenampilkanTabelTabungan').html("Loading...");
        $.ajax({
            url     : "_Page/Tabungan/TabelTabungan.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelTabungan').html(data);
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
            $('#MenampilkanTabelTabungan').html("Loading...");
            $.ajax({
                url     : "_Page/Tabungan/TabelTabungan.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelTabungan').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>ID Simpanan</b>
                            </th>
                            <th class="text-center">
                                <b>Anggota</b>
                            </th>
                            <th class="text-center">
                                <b>Keterangan</b>
                            </th>
                            <th class="text-center">
                                <b>Jurnal</b>
                            </th>
                            <th class="text-center">
                                <b>Jumlah</b>
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
                                echo '  <td colspan="7">';
                                echo '      <span class="text-danger">Belum Ada Data Simpanan</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM simpanan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE nama like '%$keyword%' OR kategori like '%$keyword%' OR tanggal like '%$keyword%' OR keterangan like '%$keyword%' OR jumlah like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM simpanan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_simpanan= $data['id_simpanan'];
                                    $id_anggota= $data['id_anggota'];
                                    $kategori= $data['kategori'];
                                    $keterangan= $data['keterangan'];
                                    $nama= $data['nama'];
                                    $jumlah= $data['jumlah'];
                                    $tanggal= $data['tanggal'];
                                    $strotime=strtotime($tanggal);
                                    $tanggal=date('d/m/Y',$strotime);
                                    $jumlah = "" . number_format($jumlah,0,',','.');
                                    $IdSimpanan = sprintf("%07d", $id_simpanan);
                                    //Cek Ada jurnal atau tidak
                                    $CekJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_simpanan='$id_simpanan'"));
                                    if(empty($CekJurnal)){
                                        $LabelJurnal='<span class="badge badge-dark" title="Belum Ada Pada Jurnal"><i class="bi bi-x"></i> Journal</span>';
                                    }else{
                                        $LabelJurnal='<span class="badge badge-success" title="Jurnal Tersedia '.$CekJurnal.' record"><i class="bi bi-check-circle"></i> Journal</span>';
                                    }
                        ?>
                        <tr>
                            <td class="text-center text-xs">
                                <?php echo "$no" ?>
                            </td>
                            <td class="text-left" align="left">
                                <small>
                                    <?php 
                                        echo '<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailTabungan" data-id="'.$id_simpanan.'" title="Lihat Detail Simpanan">';
                                        echo '  <b><i class="bi bi-qr-code"></i> '.$IdSimpanan.'</b>';
                                        echo '</a>';
                                        echo '<br>';
                                        echo '<small><i class="bi bi-calendar-check"></i> '.$tanggal.'</small>';
                                    ?>
                                </small><br>
                            </td>
                            <td class="text-left" align="left">
                                <small>
                                    <?php 
                                        echo '<i class="bi bi-person-circle"></i> '.$nama.'';
                                    ?>
                                </small>
                            </td>
                            <td class="text-left" align="left">
                                <small>
                                    <?php
                                        echo '<b><i class="bi bi-tag"></i> '.$kategori.'</b><br>';
                                        echo '<i class="bi bi-info-circle"></i> '.$keterangan.'';
                                    ?>
                                </small>
                            </td>
                            <td class="text-center" align="center">
                                <?php echo "$LabelJurnal";?>
                            </td>
                            <td class="text-right" align="right">
                                <small>
                                    <?php 
                                        echo "$jumlah";
                                    ?>
                                </small>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditTabungan" data-id="<?php echo "$id_simpanan,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Edit Data Simpanan">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>  
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteTabungan" data-id="<?php echo "$id_simpanan,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Data Simpanan">
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
                        <?php
                            $QryKategori = mysqli_query($Conn, "SELECT DISTINCT kategori FROM simpanan");
                            while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                $kategori= $DataKategori['kategori'];
                                //Jumlah Simpanan Kategori
                                $SumSimpananKategori = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE kategori='$kategori'"));
                                $JumlahSimpananKategori = $SumSimpananKategori['jumlah'];
                                $JumlahSimpananKategori = "" . number_format($JumlahSimpananKategori,0,',','.');
                                echo '<tr>';
                                echo '  <td></td>';
                                echo '  <td colspan="4" align="left">'.$kategori.'</td>';
                                echo '  <td align="right">'.$JumlahSimpananKategori.'</td>';
                                echo '  <td></td>';
                                echo '</tr>';
                            }
                        ?>
                        <tr>
                            <td></td>
                            <td colspan="4" align="left">
                                <b>JUMLAH SIMPANAN</b>
                            </td>
                            <td align="right">
                                <?php echo "<b>$JumlahSimpanan</b>"; ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="4" align="left">
                                <b>JUMLAH PENARIKAN</b>
                            </td>
                            <td align="right">
                                <?php echo "<b>$JumlahPenarikan</b>"; ?>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="text-success">
                            <td></td>
                            <td colspan="4" align="left">
                                <b>SIMPANAN NETTO</b>
                            </td>
                            <td align="right">
                                <?php echo "<b>$SimpananNetto</b>"; ?>
                            </td>
                            <td></td>
                        </tr>
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