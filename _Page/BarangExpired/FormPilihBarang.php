<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //keyword
    if(!empty($_POST['keyword_pilih_barang'])){
        $keyword=$_POST['keyword_pilih_barang'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas_pilih_barang'])){
        $batas=$_POST['batas_pilih_barang'];
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
        $OrderBy="id_barang";
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
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR kategori_barang like '%$keyword%' OR satuan_barang like '%$keyword%'"));
    }
?>
<script>
    //ketika klik next
    $('#NextPagePilihBarang').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/BarangExpired/FormPilihBarang.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#FormPilihBarang').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPagePilihBarang').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/BarangExpired/FormPilihBarang.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
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
        $('#PageNumberPilihBarang<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumber<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/BarangExpired/FormPilihBarang.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#FormPilihBarang').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row mb-3">
    <div class="col-md-12 text-center">
        <div class="table-responsive">
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
                            <b>Kategori</b>
                        </th>
                        <th class="text-center">
                            <b>Option</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(empty($jml_data)){
                            echo '<tr>';
                            echo '  <td colspan="4">';
                            echo '      <span class="text-danger">No Data</span>';
                            echo '  </td>';
                            echo '</tr>';
                        }else{
                            $no = 1+$posisi;
                            //KONDISI PENGATURAN MASING FILTER
                            if(empty($keyword)){
                                $query = mysqli_query($Conn, "SELECT*FROM barang ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                            }else{
                                $query = mysqli_query($Conn, "SELECT*FROM barang WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR kategori_barang like '%$keyword%' OR satuan_barang like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                            }
                            while ($data = mysqli_fetch_array($query)) {
                                $id_barang= $data['id_barang'];
                                $kode_barang= $data['kode_barang'];
                                $nama_barang= $data['nama_barang'];
                                $kategori_barang= $data['kategori_barang'];
                                $satuan_barang= $data['satuan_barang'];
                                $konversi= $data['konversi'];
                                $harga_beli= $data['harga_beli'];
                                $harga_beli_rp = "Rp " . number_format($harga_beli,0,',','.');
                                $stok_barang= $data['stok_barang'];
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo "<small >$no</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small><b>$nama_barang</b></small><br>";
                                        echo "<small>$kode_barang</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small><b>$kategori_barang</b></small><br>";
                                        echo "<small>$satuan_barang</small>";
                                    ?>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambahBarangExpired" data-id="<?php echo "$id_barang"; ?>">
                                        <i class="bi bi-check"></i>
                                    </button>  
                                </td>
                            </tr>
                        <?php $no++; }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div> 
<div class="row">
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
            <button class="btn btn-sm btn-outline-info" id="PrevPagePilihBarang" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberPilihBarang'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberPilihBarang'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPagePilihBarang" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>