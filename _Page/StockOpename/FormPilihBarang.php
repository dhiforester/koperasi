<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    if(empty($_POST['id_stok_opename'])){
        echo "ID Stock Opename Tidak Boleh Kosong!";
    }else{
        $id_stok_opename=$_POST['id_stok_opename'];
        //keyword
        if(!empty($_POST['KeywordBarang'])){
            $keyword=$_POST['KeywordBarang'];
        }else{
            $keyword="";
        }
        //Jumlah Data
        if(!empty($_POST['BatasBarang'])){
            $batas=$_POST['BatasBarang'];
        }else{
            $batas="10";
        }
        //ShortBy
        if(!empty($_POST['ShortBy'])){
            $ShortBy=$_POST['ShortBy'];
            if($ShortBy=="DESC"){
                $NextShort="ASC";
            }else{
                $NextShort="DESC";
            }
        }else{
            $ShortBy="ASC";
            $NextShort="DESC";
        }
        //OrderBy
        if(!empty($_POST['OrderBy'])){
            $OrderBy=$_POST['OrderBy'];
        }else{
            $OrderBy="nama_barang";
        }
        //Atur Page
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
            $posisi = ( $page - 1 ) * $batas;
        }else{
            $page="1";
            $posisi = 0;
        }
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR kategori_barang like '%$keyword%'"));
        }
?>
    <script>
        //ketika klik next
        $('#NextPageBarang').click(function() {
            var valueNext=$('#NextPageBarang').val();
            var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/StockOpename/FormPilihBarang.php",
                method  : "POST",
                data 	:  { page: valueNext, BatasBarang: batas, KeywordBarang: keyword, id_stok_opename: id_stok_opename, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#FormPilihBarang').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPageBarang').click(function() {
            var ValuePrev = $('#PrevPageBarang').val();
            var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/StockOpename/FormPilihBarang.php",
                method  : "POST",
                data 	:  { page: ValuePrev, BatasBarang: batas, KeywordBarang: keyword, id_stok_opename: id_stok_opename, OrderBy: OrderBy, ShortBy: ShortBy },
                success : function (data) {
                    $('#FormPilihBarang').html(data);
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
            $('#PageNumberBarang<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumberBarang<?php echo $i;?>').val();
                var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/StockOpename/FormPilihBarang.php",
                    method  : "POST",
                    data 	:  { page: PageNumber, BatasBarang: batas, KeywordBarang: keyword, id_stok_opename: id_stok_opename, OrderBy: OrderBy, ShortBy: ShortBy },
                    success: function (data) {
                        $('#FormPilihBarang').html(data);
                    }
                })
            });
        <?php } ?>
        $('#PencarianBarang').submit(function() {
            var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
            var BatasBarang=$('#BatasBarang').val();
            var KeywordBarang=$('#KeywordBarang').val();
            $.ajax({
                url     : "_Page/StockOpename/FormPilihBarang.php",
                method  : "POST",
                data 	:  { id_stok_opename: id_stok_opename, BatasBarang: BatasBarang, KeywordBarang: KeywordBarang },
                success : function (data) {
                    $('#FormPilihBarang').html(data);
                }
            })
        });
        $('#BatasBarang').change(function() {
            var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
            var BatasBarang=$('#BatasBarang').val();
            var KeywordBarang=$('#KeywordBarang').val();
            $.ajax({
                url     : "_Page/StockOpename/FormPilihBarang.php",
                method  : "POST",
                data 	:  { id_stok_opename: id_stok_opename, BatasBarang: BatasBarang, KeywordBarang: KeywordBarang },
                success : function (data) {
                    $('#FormPilihBarang').html(data);
                }
            })
        });
    </script>
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <div class="table-responsive" style="height: 300px; overflow-y: scroll;">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Barang</b>
                            </th>
                            <th class="text-center">
                                <b>opsi</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="3">';
                                echo '      <span class="text-danger">Tidak Ada Data Yang Ditampilkan</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM barang ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM barang WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR kategori_barang like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_barang= $data['id_barang'];
                                    $Kode= $data['kode_barang'];
                                    $NamaRincian= $data['nama_barang'];
                                    $Kategori= $data['kategori_barang'];
                                    //Cek apakah data sudah ada
                                    $CekSudahAda = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename' AND id_barang='$id_barang'"));
                            ?>
                                <tr>
                                    <td class="text-center text-xs">
                                        <?php 
                                            echo "<small >$no</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small>
                                            <?php 
                                                echo "<b><i class='bi bi-box'></i> $NamaRincian</b><br>";
                                                echo "<mall><i class='bi bi-qr-code'></i> $Kode</mall><br>";
                                                echo "<mall><i class='bi bi-tag'></i> $Kategori</mall>";
                                            ?>
                                        </small>
                                        
                                    </td>
                                    <td align="center">
                                        <?php if(!empty($CekSudahAda)){ ?>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-info">
                                                <i class="bi bi-plus-lg"></i>
                                            </a> 
                                        <?php }else{ ?>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahStockOpenameBarang" data-id="<?php echo "$id_barang,$id_stok_opename"; ?>">
                                                <i class="bi bi-plus-lg"></i>
                                            </a> 
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $no++; }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12 text-center">
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
                <button class="btn btn-sm btn-outline-info" id="PrevPageBarang" value="<?php echo $prev;?>">
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
                            echo '<button class="btn btn-sm btn-info" id="PageNumberBarang'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }else{
                            echo '<button class="btn btn-sm btn-outline-info" id="PageNumberBarang'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }
                    }
                ?>
                <button class="btn btn-sm btn-outline-info" id="NextPageBarang" value="<?php echo $next;?>">
                    <span aria-hidden="true">»</span>
                </button>
            </div>
        </div>
    </div>
<?php } ?>