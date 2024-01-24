<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //GetIdAkses
    if(empty($_POST['id_akses'])){
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12">';
        echo '              ID Akses Tidak Boleh Kosong';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
    }else{
        $GetIdAkses=$_POST['id_akses'];
        //Keyword_by
        if(!empty($_POST['KeywordByLog'])){
            $keyword_by=$_POST['KeywordByLog'];
        }else{
            $keyword_by="";
        }
        //keyword
        if(!empty($_POST['KeywordLog'])){
            $keyword=$_POST['KeywordLog'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['BatasLog'])){
            $batas=$_POST['BatasLog'];
        }else{
            $batas="10";
        }
        //ShortBy
        if(!empty($_POST['ShortByLog'])){
            $ShortBy=$_POST['ShortByLog'];
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
        if(!empty($_POST['OrderByLog'])){
            $OrderBy=$_POST['OrderByLog'];
        }else{
            $OrderBy="id_log";
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE id_akses='$GetIdAkses'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE (id_akses='$GetIdAkses') AND (id_akses like '%$keyword%' OR id_mitra like '%$keyword%' OR datetime_log like '%$keyword%' OR kategori_log like '%$keyword%' OR deskripsi_log like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE id_akses='$GetIdAkses'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM log WHERE (id_akses='$GetIdAkses') AND ($keyword_by like '%$keyword%')"));
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
            var GetIdAkses="<?php echo "$GetIdAkses"; ?>";
            $.ajax({
                url     : "_Page/Akses/TabelLogAtivtas.php",
                method  : "POST",
                data 	:  { id_akses: GetIdAkses, page: valueNext, BatasLog: batas, KeywordLog: keyword, KeywordByLog: keyword_by, OrderByLog: OrderBy, ShortByLog: ShortBy },
                success: function (data) {
                    $('#TampilkanLogAkses').html(data);

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
            var GetIdAkses="<?php echo "$GetIdAkses"; ?>";
            $.ajax({
                url     : "_Page/Akses/TabelLogAtivtas.php",
                method  : "POST",
                data 	:  { id_akses: GetIdAkses, page: ValuePrev, BatasLog: batas, KeywordLog: keyword, KeywordByLog: keyword_by, OrderByLog: OrderBy, ShortByLog: ShortBy },
                success : function (data) {
                    $('#TampilkanLogAkses').html(data);
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
                var GetIdAkses="<?php echo "$GetIdAkses"; ?>";
                $.ajax({
                    url     : "_Page/Akses/TabelLogAtivtas.php",
                    method  : "POST",
                    data 	:  { id_akses: GetIdAkses, page: PageNumber, BatasLog: batas, KeywordLog: keyword, KeywordByLog: keyword_by, OrderByLog: OrderBy, ShortByLog: ShortBy },
                    success: function (data) {
                        $('#TampilkanLogAkses').html(data);
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
                                        <b>Akses</b>
                                    </th>
                                    <th class="text-center">
                                        <b>Tanggal</b>
                                    </th>
                                    <th class="text-center">
                                        <b>Kategori</b>
                                    </th>
                                    <th class="text-center">
                                        <b>Deskripsi</b>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(empty($jml_data)){
                                        echo '<tr>';
                                        echo '  <td colspan="5" class="text-center text-danger">';
                                        echo '      Tidak Ada Data Log';
                                        echo '  </td>';
                                        echo '</tr>';
                                    }else{
                                        $no = 1+$posisi;
                                        //KONDISI PENGATURAN MASING FILTER
                                        if(empty($keyword_by)){
                                            if(empty($keyword)){
                                                $query = mysqli_query($Conn, "SELECT*FROM log WHERE id_akses='$GetIdAkses' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                            }else{
                                                $query = mysqli_query($Conn, "SELECT*FROM log WHERE (id_akses='$GetIdAkses') AND (id_akses like '%$keyword%' OR id_mitra like '%$keyword%' OR datetime_log like '%$keyword%' OR kategori_log like '%$keyword%' OR deskripsi_log like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                            }
                                        }else{
                                            if(empty($keyword)){
                                                $query = mysqli_query($Conn, "SELECT*FROM log WHERE id_akses='$GetIdAkses' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                            }else{
                                                $query = mysqli_query($Conn, "SELECT*FROM log WHERE (id_akses='$GetIdAkses') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                            }
                                        }
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_log= $data['id_log'];
                                            $id_akses= $data['id_akses'];
                                            $nama_akses= $data['nama_akses'];
                                            $datetime_log= $data['datetime_log'];
                                            $kategori_log= $data['kategori_log'];
                                            $deskripsi_log= $data['deskripsi_log'];
                                            //Buka data akses
                                            $QryAkses=mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                            $DataAkses=mysqli_fetch_array($QryAkses);
                                            $nama_akses=$DataAkses['nama_akses'];
                                            //Mengubah format tanggal
                                            $datetime_log=strtotime($datetime_log);
                                            $datetime_log=date('d/m/y H:i', $datetime_log);
                                    ?>
                                <tr>
                                    <td class="text-center text-xs">
                                        <small><?php echo "$no" ?></small>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small><?php echo "$nama_akses" ?></small>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<small>$datetime_log</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<small>$kategori_log</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<small>$deskripsi_log</small>";
                                        ?>
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
<?php } ?>