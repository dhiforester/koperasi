<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Keyword_by
    if(empty($_POST['id_stok_opename'])){
        echo '<b>ID Stock Opename Tidak Boleh Kosong!</b>';
    }else{
        $id_stok_opename=$_POST['id_stok_opename'];
        //keyword
        if(!empty($_POST['KeywordStockOpenameBarang'])){
            $keyword=$_POST['KeywordStockOpenameBarang'];
        }else{
            $keyword="";
        }
        //BatasUraian
        if(!empty($_POST['BatasUraian'])){
            $batas=$_POST['BatasUraian'];
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
            $OrderBy="id_stok_opename_barang";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE (id_stok_opename='$id_stok_opename') AND (nama_barang like '%$keyword%' OR satuan like '%$keyword%')"));
        }
?>
    <script>
        //ketika klik next
        $('#NextPage').click(function() {
            var valueNext=$('#NextPage').val();
            var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/StockOpename/TabelStockOpenameBarang.php",
                method  : "POST",
                data 	:  { page: valueNext, id_stok_opename: id_stok_opename, BatasUraian: batas, KeywordStockOpenameBarang: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelStockOpenameBarang').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPage').click(function() {
            var ValuePrev = $('#PrevPage').val();
            var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/StockOpename/TabelStockOpenameBarang.php",
                method  : "POST",
                data 	:  { page: ValuePrev, id_stok_opename: id_stok_opename, BatasUraian: batas, KeywordStockOpenameBarang: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
                success : function (data) {
                    $('#MenampilkanTabelStockOpenameBarang').html(data);
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
                var id_stok_opename="<?php echo "$id_stok_opename"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var keyword_by="<?php echo "$keyword_by"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/StockOpename/TabelStockOpenameBarang.php",
                    method  : "POST",
                    data 	:  { page: PageNumber, id_stok_opename: id_stok_opename, BatasUraian: batas, KeywordStockOpenameBarang: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
                    success: function (data) {
                        $('#MenampilkanTabelStockOpenameBarang').html(data);
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
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <b>No</b>
                                </th>
                                <th class="text-center">
                                    <b>Barang</b>
                                </th>
                                <th class="text-center">
                                    <b>Harga</b>
                                </th>
                                <th class="text-center">
                                    <b>Stok Awal</b>
                                </th>
                                <th class="text-center">
                                    <b>Stok Akhir</b>
                                </th>
                                <th class="text-center">
                                    <b>Selisih</b>
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
                                    echo '  <td colspan="9">';
                                    echo '      <span class="text-danger">Tidak Ada Data Stock Opename Barang</span>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1+$posisi;
                                    //KONDISI PENGATURAN MASING FILTER
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE (id_stok_opename='$id_stok_opename') AND (nama_barang like '%$keyword%' OR satuan like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_stok_opename_barang= $data['id_stok_opename_barang'];
                                        $id_barang= $data['id_barang'];
                                        $nama_barang= $data['nama_barang'];
                                        $satuan= $data['satuan'];
                                        $stok_awal= $data['stok_awal'];
                                        $stok_akhir= $data['stok_akhir'];
                                        $stok_gap= $data['stok_gap'];
                                        $harga= $data['harga'];
                                        $jumlah= $data['jumlah'];
                                        
                                        $HargaRp = "Rp " . number_format($harga,0,',','.');
                                        $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
                                        //Jumlah Stok Awal
                                        $StokAwalRp=$stok_awal*$harga;
                                        $StokAwalRp = "Rp " . number_format($StokAwalRp,0,',','.');
                                        //Jumlah Stok Akhir
                                        $StokAkhirRp=$stok_akhir*$harga;
                                        $StokAkhirRp = "Rp " . number_format($StokAkhirRp,0,',','.');
                                        //Jumlah Stok GAP
                                        $StokGapRp=$stok_gap*$harga;
                                        $StokGapRp = "Rp " . number_format($StokGapRp,0,',','.');

                                ?>
                                    <tr>
                                        <td class="text-center text-xs">
                                            <?php 
                                                echo "<small >$no</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <small>
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailStockOpenameBarang" data-id="<?php echo "$id_stok_opename_barang"; ?>" title="Lihat Detail Stock Opename">
                                                    <?php 
                                                        echo "$nama_barang</b>";
                                                    ?>
                                                </a><br>
                                                <?php 
                                                    echo "<small>Satuan: $satuan</small>";
                                                ?>
                                            </small>
                                        </td>
                                        <td class="text-right" align="right">
                                            <small>
                                                <?php 
                                                    echo "$HargaRp";
                                                ?>
                                            </small>
                                        </td>
                                        <td class="text-right" align="right">
                                            <small>
                                                <?php 
                                                    echo "<b>$stok_awal $satuan</b><br>";
                                                    echo "<small>$StokAwalRp</small>";
                                                ?>
                                            </small>
                                        </td>
                                        <td class="text-right" align="right">
                                            <small>
                                                <?php 
                                                    echo "<b>$stok_akhir $satuan</b><br>";
                                                    echo "<small>$StokAkhirRp</small>";
                                                ?>
                                            </small>
                                        </td>
                                        <td class="text-right" align="right">
                                            <small>
                                                <?php 
                                                    echo "<b>$stok_gap $satuan</b><br>";
                                                    echo "<small>$StokGapRp</small>";
                                                ?>
                                            </small>
                                        </td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditStockOpenameBarang" data-id="<?php echo "$id_stok_opename_barang,$id_stok_opename,$keyword,$batas,$ShortBy,$OrderBy,$page"; ?>" title="Edit Data Stock Opename">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>  
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteStockOpenameBarang" data-id="<?php echo "$id_stok_opename_barang,$id_stok_opename,$keyword,$batas,$ShortBy,$OrderBy,$page"; ?>" title="Hapus Data Stock Opename">
                                                    <i class="bi bi-x"></i>
                                                </button>  
                                            </div>
                                        </td>
                                    </tr>
                                <?php $no++; }} ?>
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