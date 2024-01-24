<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //KeywordBySupplier
    if(!empty($_POST['KeywordBySupplier'])){
        $keyword_by=$_POST['KeywordBySupplier'];
    }else{
        $keyword_by="";
    }
    //KeywordSupplier
    if(!empty($_POST['KeywordSupplier'])){
        $keyword=$_POST['KeywordSupplier'];
    }else{
        $keyword="";
    }
    //JumlahDataSupplier
    if(!empty($_POST['JumlahDataSupplier'])){
        $batas=$_POST['JumlahDataSupplier'];
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
        $OrderBy="id_supplier";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier WHERE nama_supplier like '%$keyword%' OR alamat_supplier like '%$keyword%' OR email_supplier like '%$keyword%' OR kontak_supplier like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPageSupplier').click(function() {
        var valueNext=$('#NextPageSupplier').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Pembayaran/FormPilihSupplier.php',
            method  : "POST",
            data 	:  { page: valueNext, JumlahDataSupplier: batas, KeywordSupplier: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#FormPilihSupplier').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPageSupplier').click(function() {
        var ValuePrev = $('#PrevPageSupplier').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Pembayaran/FormPilihSupplier.php',
            method  : "POST",
            data 	:  { page: ValuePrev, JumlahDataSupplier: batas, KeywordSupplier: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#FormPilihSupplier').html(data);
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
        $('#PageNumberSupplier<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumberSupplier<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : '_Page/Pembayaran/FormPilihSupplier.php',
                method  : "POST",
                data 	:  { page: PageNumber, JumlahDataSupplier: batas, KeywordSupplier: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#FormPilihSupplier').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row mb-3">
    <div class="col-md-12 text-center" style="height: 350px; overflow-y: scroll;">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-items-center mb-0">
                <thead class="">
                    <tr>
                        <th class="text-center">
                            <b>No</b>
                        </th>
                        <th class="text-center">
                            <b>Supplier</b>
                        </th>
                        <th class="text-center">
                            <b>Alamat</b>
                        </th>
                        <th class="text-center">
                            <b>Volume</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(empty($jml_data)){
                            echo '<tr>';
                            echo '  <td colspan="4" class="text-center">';
                            echo '      <span class="text-danger">Belum Ada Data Supplier</span>';
                            echo '  </td>';
                            echo '</tr>';
                        }else{
                            $no = 1+$posisi;
                            //KONDISI PENGATURAN MASING FILTER
                            if(empty($keyword_by)){
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM supplier ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM supplier WHERE nama_supplier like '%$keyword%' OR alamat_supplier like '%$keyword%' OR email_supplier like '%$keyword%' OR kontak_supplier like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                            }else{
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM supplier ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM supplier WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                            }
                            while ($data = mysqli_fetch_array($query)) {
                                $id_supplier= $data['id_supplier'];
                                $nama_supplier= $data['nama_supplier'];
                                if(empty($data['alamat_supplier'])){
                                    $alamat_supplier='<span class="text-danger">Tidak Ada</span>';
                                }else{
                                    $alamat_supplier= $data['alamat_supplier'];
                                }
                                if(empty($data['email_supplier'])){
                                    $email_supplier='<span class="text-danger">Tidak Ada</span>';
                                }else{
                                    $email_supplier= $data['email_supplier'];
                                }
                                if(empty($data['kontak_supplier'])){
                                    $kontak_supplier='<span class="text-danger">Tidak Ada</span>';
                                }else{
                                    $kontak_supplier= $data['kontak_supplier'];
                                }
                                //Hitung volume transaksi
                                $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE id_supplier='$id_supplier'"));
                                $jumlah_transaksi = $Sum['tagihan'];
                                $VolumeTransaksi = "Rp " . number_format($jumlah_transaksi,0,',','.');
                                $JumlahItem = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT id_barang, nama_barang FROM transaksi_rincian WHERE id_supplier='$id_supplier'"));

                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo "<small class='credit'>$no</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <i class="bi bi-truck"></i>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalKonfirmasiSupplier" data-id="<?php echo "$id_supplier,$keyword_by,$keyword,$batas,$page"; ?>">
                                        <?php 
                                            echo "<b>$nama_supplier</b>";
                                        ?>
                                    </a><br>
                                    <?php 
                                        echo "<small class='credit'><i class='bi bi-telephone'></i> $kontak_supplier</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small class='credit'><i class='bi bi-envelope'></i> $email_supplier</small><br>";
                                        echo "<small class='credit'><i class='bi bi-map'></i> $alamat_supplier</small><br>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small class='credit'><i class='bi bi-coin'></i> $VolumeTransaksi</small><br>";
                                        echo "<small class='credit'><i class='bi bi-box'></i> $JumlahItem Item</small>";
                                    ?>
                                </td>
                            </tr>
                        <?php $no++; }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-left">
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
            <button class="btn btn-sm btn-outline-info" id="PrevPageSupplier" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberSupplier'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberSupplier'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPageSupplier" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>