<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
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
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR kategori_barang like '%$keyword%' OR satuan_barang like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE $keyword_by like '%$keyword%'"));
        }
    }
    $JmlKategori = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga"));
    $jmlKolom=$JmlKategori+6;
    $jmlKolomHarga=$JmlKategori+1;
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
            url     : "_Page/Barang/TabelBarang.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelBarang').html(data);

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
            url     : "_Page/Barang/TabelBarang.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelBarang').html(data);
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
                url     : "_Page/Barang/TabelBarang.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelBarang').html(data);
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
                            <th class="text-center" valign="middle" rowspan="2">
                                <b>No</b>
                            </th>
                            <th class="text-center" valign="middle" rowspan="2">
                                <b>Barang</b>
                            </th>
                            <th class="text-center" valign="middle" rowspan="2">
                                <b>Kategori</b>
                            </th>
                            <th class="text-center" valign="middle" rowspan="2">
                                <b>Stok</b>
                            </th>
                            <th class="text-center" valign="middle" colspan="<?php echo $jmlKolomHarga;?>">
                                <b>Harga</b>
                            </th>
                            <th class="text-center" valign="middle" rowspan="2">
                                <b>Option</b>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                <b>Beli</b>
                            </th>
                            <?php
                                if(!empty($jmlKolom)){
                                    $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                        $KategoriHarga= $DataKategori['kategori_harga'];
                                        echo '<th class="text-center">';
                                        echo '  <b>'.$KategoriHarga.'</b>';
                                        echo '</th>';
                                    }
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="'.$jmlKolom.'">';
                                echo '      <span class="text-danger">Tidak Ada Data Barang</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM barang ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM barang WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR kategori_barang like '%$keyword%' OR satuan_barang like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM barang ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM barang WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_barang= $data['id_barang'];
                                    $kode_barang= $data['kode_barang'];
                                    $nama_barang= $data['nama_barang'];
                                    $kategori_barang= $data['kategori_barang'];
                                    $satuan_barang= $data['satuan_barang'];
                                    $konversi= $data['konversi'];
                                    $harga_beli= $data['harga_beli'];
                                    $harga_beli_rp = "" . number_format($harga_beli,0,',','.');
                                    $stok_barang= $data['stok_barang'];
                                    $stok_barang_rp = "" . number_format($stok_barang,0,',','.');
                                    //Menghitung jumlah transaksi
                                    $JumlahTrasaksi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang'"));
                                    if(empty($JumlahTrasaksi)){
                                        $LabelTransaksi='<span class="text-danger">'.$JumlahTrasaksi.'</span>';
                                    }else{
                                        $LabelTransaksi='<span class="text-success">'.$JumlahTrasaksi.'</span>';
                                    }
                            ?>
                                <tr>
                                    <td class="text-center text-xs">
                                        <?php 
                                            echo "<small >$no</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailBarang" data-id="<?php echo "$id_barang,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Lihat Detail Barang Untuk <?php echo "$nama_barang"; ?>">
                                            <?php 
                                                echo "<b><i class='bi bi-box'></i> $nama_barang</b>";
                                            ?>
                                        </a><br>
                                        <?php 
                                            echo '<small class="credits"><i class="bi bi-qr-code"></i> '.$kode_barang.'</small>';
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<small><i class='bi bi-tag'></i>$kategori_barang</small><br>";
                                            echo "<small><i class='bi bi-cart-plus'></i>$LabelTransaksi</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<small>$stok_barang_rp</small><br>";
                                            echo "<small>$satuan_barang</small>";
                                        ?>
                                    </td>
                                    <td class="text-right" align="right">
                                        <?php 
                                            echo "<small>$harga_beli_rp</small><br>";
                                        ?>
                                    </td>
                                    <?php
                                        if(!empty($jmlKolom)){
                                            $QryKategori = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                                            while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                                                $KategoriHarga= $DataKategori['kategori_harga'];
                                                //Buka data multi harga
                                                $QryHargaMulti = mysqli_query($Conn,"SELECT * FROM barang_harga WHERE id_barang='$id_barang' AND id_barang_satuan='0' AND kategori_harga='$KategoriHarga'")or die(mysqli_error($Conn));
                                                $DataHargaMulti= mysqli_fetch_array($QryHargaMulti);
                                                $HargaMulti= $DataHargaMulti['harga'];
                                                $HargaMultiRp= "" . number_format($HargaMulti,0,',','.');
                                                //mencari laba
                                                $Laba=$HargaMulti-$harga_beli;
                                                $Pelaba=($Laba/$harga_beli)*100;
                                                $Pelaba=round($Pelaba);
                                                if($Pelaba==0){
                                                    $LabelLaba='<span class="text-dark">('.$Pelaba.'%)</span>';
                                                }else{
                                                    if($Pelaba<0){
                                                        $LabelLaba='<span class="text-danger">('.$Pelaba.'%)</span>';
                                                    }else{
                                                        $LabelLaba='<span class="text-success">('.$Pelaba.'%)</span>';
                                                    }
                                                }
                                                echo '<td class="text-right" align="right">';
                                                echo '  '.$HargaMultiRp.'<br>';
                                                echo '  '.$LabelLaba.'';
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                    <td align="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditBarang" data-id="<?php echo "$id_barang,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Edit Data Barang">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>  
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteBarang" data-id="<?php echo "$id_barang,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Data Barang">
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