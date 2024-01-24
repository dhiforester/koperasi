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
        $SumRincian = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_rincian WHERE id_anggota='$id_anggota'"));
        $JumlahRincian = $SumRincian['jumlah'];
        $JumlahRincian = "" . number_format($JumlahRincian,0,',','.');
        //KeywordByRincian
        if(!empty($_POST['KeywordByRincian'])){
            $keyword_by=$_POST['KeywordByRincian'];
        }else{
            $keyword_by="";
        }
        //KeywordRincian
        if(!empty($_POST['KeywordRincian'])){
            $keyword=$_POST['KeywordRincian'];
        }else{
            $keyword="";
        }
        //BatasRincian
        if(!empty($_POST['BatasRincian'])){
            $batas=$_POST['BatasRincian'];
        }else{
            $batas="10";
        }
        //ShortByRincian
        if(!empty($_POST['ShortByRincian'])){
            $ShortBy=$_POST['ShortByRincian'];
            if($ShortBy=="ASC"){
                $NextShort="DESC";
            }else{
                $NextShort="ASC";
            }
        }else{
            $ShortBy="DESC";
            $NextShort="ASC";
        }
        //OrderByRincian
        if(!empty($_POST['OrderByRincian'])){
            $OrderBy=$_POST['OrderByRincian'];
        }else{
            $OrderBy="id_transaksi_rincian";
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_anggota='$id_anggota'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_anggota='$id_anggota') AND (tanggal like '%$keyword%' OR kategori_rincian like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_anggota='$id_anggota'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%')"));
            }
        }
?>
    <script>
        //ketika klik next
        $('#NextPageRincian').click(function() {
            var valueNext=$('#NextPageRincian').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelRincianAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: valueNext, BatasRincian: batas, KeywordRincian: keyword, KeywordByRincian: keyword_by, OrderByRincian: OrderBy, ShortByRincian: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelRincian').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPageRincian').click(function() {
            var PrevPageRincian=$('#PrevPageRincian').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelRincianAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: PrevPageRincian, BatasRincian: batas, KeywordRincian: keyword, KeywordByRincian: keyword_by, OrderByRincian: OrderBy, ShortByRincian: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelRincian').html(data);

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
            $('#PageNumberRincian<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumberRincian<?php echo $i;?>').val();
                var id_anggota="<?php echo "$id_anggota"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var keyword_by="<?php echo "$keyword_by"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Anggota/TabelRincianAnggota.php",
                    method  : "POST",
                    data 	:  { id_anggota: id_anggota, page: PageNumber, BatasRincian: batas, KeywordRincian: keyword, KeywordByRincian: keyword_by, OrderByRincian: OrderBy, ShortByRincian: ShortBy },
                    success: function (data) {
                        $('#MenampilkanTabelRincian').html(data);
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
                                    <b>Kategori</b>
                                </th>
                                <th class="text-center">
                                    <b>Uraian</b>
                                </th>
                                <th class="text-center">
                                    <b>Harga</b>
                                </th>
                                <th class="text-center">
                                    <b>Qty</b>
                                </th>
                                <th class="text-center">
                                    <b>Jumlah</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(empty($jml_data)){
                                    echo '<tr>';
                                    echo '  <td colspan="7" class="text-center">';
                                    echo '      Tidak Ada Rincian Transaksi';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1+$posisi;
                                    //KONDISI PENGATURAN MASING FILTER
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_anggota='$id_anggota') AND (tanggal like '%$keyword%' OR kategori_rincian like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_transaksi_rincian= $data['id_transaksi_rincian'];
                                        $id_transaksi= $data['id_transaksi'];
                                        $id_akses= $data['id_akses'];
                                        $tanggal= $data['tanggal'];
                                        $strtotime=strtotime($tanggal);
                                        $tanggal=date('d/m/Y',$tanggal);
                                        $kategori_rincian= $data['kategori_rincian'];
                                        $nama_barang= $data['nama_barang'];
                                        $harga= $data['harga'];
                                        $qty= $data['qty'];
                                        $satuan= $data['satuan'];
                                        $jumlah= $data['jumlah'];
                                        $harga = "" . number_format($harga,0,',','.');
                                        $jumlah = "" . number_format($jumlah,0,',','.');
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <small><?php echo "$no";?></small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <a href="javascript:void(0);"  class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDetailTransaksi" data-id="<?php echo "$id_transaksi"; ?>">
                                            <?php 
                                                echo '<i class="bi bi-calendar"></i> '.$tanggal.'';
                                            ?>
                                        </a>  
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-tag"></i> '.$kategori_rincian.'';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-box"></i> '.$nama_barang.'';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-right" align="right">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-coin"></i> '.$harga.'';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php 
                                            echo ''.$qty.' '.$satuan.'';
                                        ?>
                                    </small>
                                </td>
                                <td class="text-right" align="right">
                                    <small>
                                        <?php 
                                            echo '<i class="bi bi-cart-check"></i> '.$jumlah.'';
                                        ?>
                                    </small>
                                </td>
                            </tr>
                            <?php
                                        $no++; }
                                    }
                            ?>
                            <tr>
                                <td></td>
                                <td colspan="5" align="left">
                                    <b>JUMLAH RINCIAN</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$JumlahRincian</b>"; ?>
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
            <button class="btn btn-sm btn-outline-info" id="PrevPageRincian" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberRincian'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberRincian'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPageRincian" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
<?php } ?>