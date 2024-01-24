<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    //id_transaksi (untuk mode edit transaksi)
    if(!empty($_POST['id_transaksi'])){
        $id_transaksi=$_POST['id_transaksi'];
    }else{
        $id_transaksi="0";
    }
    //keyword
    if(!empty($_POST['PencarianRincian'])){
        $keyword=$_POST['PencarianRincian'];
    }else{
        $keyword="";
    }
    //Jumlah Data
    if(!empty($_POST['JumlahData'])){
        $batas=$_POST['JumlahData'];
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
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var KategoriPencarian="<?php echo "$KategoriPencarian"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Transaksi/TabelBarangTindakan.php",
            method  : "POST",
            data 	:  { page: valueNext, JumlahData: batas, keyword: keyword, KategoriPencarian: KategoriPencarian, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelBarangTindakan').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var KategoriPencarian="<?php echo "$KategoriPencarian"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Transaksi/TabelBarangTindakan.php",
            method  : "POST",
            data 	:  { page: ValuePrev, JumlahData: batas, keyword: keyword, KategoriPencarian: KategoriPencarian, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelBarangTindakan').html(data);
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
            var KategoriPencarian="<?php echo "$KategoriPencarian"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Transaksi/TabelBarangTindakan.php",
                method  : "POST",
                data 	:  { page: PageNumber, JumlahData: batas, keyword: keyword, KategoriPencarian: KategoriPencarian, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelBarangTindakan').html(data);
                }
            })
        });
    <?php } ?>
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
                            <b>Kode</b>
                        </th>
                        <th class="text-center">
                            <b>Rincian</b>
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
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo "<small >$no</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$Kode</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$NamaRincian</small>";
                                    ?>
                                </td>
                                <td align="center">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ModalTambahRincianBarang" data-id="<?php echo "$id_barang"; ?>">
                                        <i class="bi bi-plus-lg"></i> Tambahkan
                                    </a>  
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
</div>