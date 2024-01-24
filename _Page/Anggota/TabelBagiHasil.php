<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //id_anggota
    if(empty($_POST['id_anggota'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-danger">';
        echo '      ID Anggota Tidak Boeh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_anggota=$_POST['id_anggota'];
        $SumBagiHasil = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(shu) AS shu FROM shu_rincian WHERE id_anggota='$id_anggota'"));
        $JumlahBagiHasil = $SumBagiHasil['shu'];
        $JumlahBagiHasil = "" . number_format($JumlahBagiHasil,0,',','.');
        //KeywordByPembelian
        if(!empty($_POST['KeywordByPembelian'])){
            $keyword_by=$_POST['KeywordByPembelian'];
        }else{
            $keyword_by="";
        }
        //KeywordPembelian
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
        //ShortByPembelian
        if(!empty($_POST['ShortByPembelian'])){
            $ShortBy=$_POST['ShortByPembelian'];
            if($ShortBy=="ASC"){
                $NextShort="DESC";
            }else{
                $NextShort="ASC";
            }
        }else{
            $ShortBy="DESC";
            $NextShort="ASC";
        }
        //OrderByPembelian
        if(!empty($_POST['OrderByPembelian'])){
            $OrderBy=$_POST['OrderByPembelian'];
        }else{
            $OrderBy="id_shu_rincian";
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_anggota='$id_anggota'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE (id_anggota='$id_anggota') AND (nama_anggota like '%$keyword%' OR simpanan like '%$keyword%' OR pinjaman like '%$keyword%' OR penjualan like '%$keyword%' OR jasa_simpanan like '%$keyword%' OR jasa_pinjaman like '%$keyword%' OR jasa_penjualan like '%$keyword%' OR shu like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_anggota='$id_anggota'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%')"));
            }
        }
?>
    <script>
        //ketika klik next
        $('#NextPagePembelian').click(function() {
            var valueNext=$('#NextPagePembelian').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPembelianAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: valueNext, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderByPembelian: OrderBy, ShortByPembelian: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPembelian').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPagePembelian').click(function() {
            var PrevPagePembelian=$('#PrevPagePembelian').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPembelianAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: PrevPagePembelian, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderByPembelian: OrderBy, ShortByPembelian: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPembelian').html(data);
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
            $('#PageNumberPembelian<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumberPembelian<?php echo $i;?>').val();
                var id_anggota="<?php echo "$id_anggota"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var keyword_by="<?php echo "$keyword_by"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Anggota/TabelPembelianAnggota.php",
                    method  : "POST",
                    data 	:  { id_anggota: id_anggota, page: PageNumber, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderByPembelian: OrderBy, ShortByPembelian: ShortBy },
                    success: function (data) {
                        $('#MenampilkanTabelPembelian').html(data);
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
                                    <b>Jasa Simpanan</b>
                                </th>
                                <th class="text-center">
                                    <b>Jasa Pinjaman</b>
                                </th>
                                <th class="text-center">
                                    <b>Jasa Penjualan</b>
                                </th>
                                <th class="text-center">
                                    <b>Bagi Hasil</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(empty($jml_data)){
                                    echo '<tr>';
                                    echo '  <td colspan="6" class="text-center">';
                                    echo '      Belum Ada Transaksi';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1+$posisi;
                                    //KONDISI PENGATURAN MASING FILTER
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE (id_anggota='$id_anggota') AND (nama_anggota like '%$keyword%' OR simpanan like '%$keyword%' OR pinjaman like '%$keyword%' OR penjualan like '%$keyword%' OR jasa_simpanan like '%$keyword%' OR jasa_pinjaman like '%$keyword%' OR jasa_penjualan like '%$keyword%' OR shu like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_shu_session= $data['id_shu_session'];
                                        $id_shu_rincian= $data['id_shu_rincian'];
                                        $id_anggota= $data['id_anggota'];
                                        $nama_anggota= $data['nama_anggota'];
                                        $simpanan= $data['simpanan'];
                                        $pinjaman= $data['pinjaman'];
                                        $penjualan= $data['penjualan'];
                                        $jasa_simpanan= $data['jasa_simpanan'];
                                        $jasa_pinjaman= $data['jasa_pinjaman'];
                                        $jasa_penjualan= $data['jasa_penjualan'];
                                        $shu= $data['shu'];
                                        //Format Rupiah
                                        $simpanan = "" . number_format($simpanan,0,',','.');
                                        $pinjaman = "" . number_format($pinjaman,0,',','.');
                                        $penjualan = "" . number_format($penjualan,0,',','.');
                                        $jasa_simpanan = "" . number_format($jasa_simpanan,0,',','.');
                                        $jasa_pinjaman = "" . number_format($jasa_pinjaman,0,',','.');
                                        $jasa_penjualan = "" . number_format($jasa_penjualan,0,',','.');
                                        $shu = "" . number_format($shu,0,',','.');
                                        //Data Sessi
                                        $QrySessi = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                        $DataSessi = mysqli_fetch_array($QrySessi);
                                        $periode_hitung1= $DataSessi['periode_hitung1'];
                                        $periode_hitung2= $DataSessi['periode_hitung2'];
                                        $strtotime1=strtotime($periode_hitung1);
                                        $strtotime2=strtotime($periode_hitung2);
                                        $periode_hitung1=date('d/m/Y',$strtotime1);
                                        $periode_hitung2=date('d/m/Y',$strtotime2);
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <small><?php echo "$no";?></small>
                                </td>
                                <td class="text-left text-xs">
                                    <small>
                                        <?php 
                                            echo '<small class="credit">';
                                            echo "  $periode_hitung1 - $periode_hitung2";
                                            echo '</small>';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo ''.$jasa_simpanan.'';
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo ''.$jasa_pinjaman.'';
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo ''.$jasa_penjualan.'';
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo ''.$shu.'';
                                    ?>
                                </td>
                            </tr>
                            <?php
                                        $no++; }
                                    }
                            ?>
                            <tr>
                                <td></td>
                                <td colspan="4" align="left">
                                    <b>JUMLAH BAGI HASIL</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$JumlahBagiHasil</b>"; ?>
                                </td>
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
            <button class="btn btn-sm btn-outline-info" id="PrevPagePembelian" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberPembelian'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberPembelian'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPagePembelian" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
<?php } ?>