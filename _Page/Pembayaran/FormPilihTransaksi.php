<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //KeywordByTransaksi
    if(!empty($_POST['KeywordByTransaksi'])){
        $keyword_by=$_POST['KeywordByTransaksi'];
    }else{
        $keyword_by="";
    }
    //KeywordTransaksi
    if(!empty($_POST['KeywordTransaksi'])){
        $keyword=$_POST['KeywordTransaksi'];
    }else{
        $keyword="";
    }
    //JumlahData
    if(!empty($_POST['JumlahData'])){
        $batas=$_POST['JumlahData'];
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
        $OrderBy="id_transaksi";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPageTransaksi').click(function() {
        var valueNext=$('#NextPageTransaksi').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Pembayaran/FormPilihTransaksi.php',
            method  : "POST",
            data 	:  { page: valueNext, JumlahData: batas, KeywordTransaksi: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#FormPilihTransaksi').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPageTransaksi').click(function() {
        var ValuePrev = $('#PrevPageTransaksi').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Pembayaran/FormPilihTransaksi.php',
            method  : "POST",
            data 	:  { page: ValuePrev, JumlahData: batas, KeywordTransaksi: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#FormPilihTransaksi').html(data);
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
        $('#PageNumberTransaksi<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumberTransaksi<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : '_Page/Pembayaran/FormPilihTransaksi.php',
                method  : "POST",
                data 	:  { page: PageNumber, JumlahData: batas, KeywordTransaksi: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#FormPilihTransaksi').html(data);
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
                            <b>Transaksi</b>
                        </th>
                        <th class="text-center">
                            <b>Pembayaran</b>
                        </th>
                        <th class="text-center">
                            <b>Tagihan</b>
                        </th>
                        <th class="text-center">
                            <b>Anggota/Supplier</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(empty($jml_data)){
                            echo '<tr>';
                            echo '  <td colspan="5" class="text-center">';
                            echo '      Belum Ada Transaksi';
                            echo '  </td>';
                            echo '</tr>';
                        }else{
                            $no = 1+$posisi;
                            //KONDISI PENGATURAN MASING FILTER
                            if(empty($keyword_by)){
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                            }else{
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                            }
                            while ($data = mysqli_fetch_array($query)) {
                                $id_transaksi= $data['id_transaksi'];
                                $id_akses= $data['id_akses'];
                                $tanggal= $data['tanggal'];
                                $kategori= $data['kategori'];
                                $tagihan= $data['tagihan'];
                                $pembayaran= $data['pembayaran'];
                                $metode= $data['metode'];
                                $status= $data['status'];
                                $pembayaran = "" . number_format($pembayaran,0,',','.');
                                $tagihan = "" . number_format($tagihan,0,',','.');
                                //Buka data anggota
                                if(!empty($data['id_anggota'])){
                                    $id_anggota= $data['id_anggota'];
                                    $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                                    $DataAnggota = mysqli_fetch_array($QryAnggota);
                                    $nama_anggota= $DataAnggota['nama'];
                                }else{
                                    $nama_anggota="";
                                }
                                //Buka Supplier
                                if(empty($data['id_supplier'])){
                                    $nama_supplier="";
                                }else{
                                    $id_supplier= $data['id_supplier'];
                                    $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                                    $DataSupplier = mysqli_fetch_array($QrySupplier);
                                    $nama_supplier= $DataSupplier['nama_supplier'];
                                }
                                $strtotime=strtotime($tanggal);
                                $TanggalTransaksi=date('d/m/Y', $strtotime);
                                $JamTrasaksi=date('H:i', $strtotime);
                                $IdTransaksi = sprintf("%07d", $id_transaksi);
                                //Buka data akses
                                $QryAksesTransaksi = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                $DataAksesTransaksi = mysqli_fetch_array($QryAksesTransaksi);
                                $NamaAksesTransaksi= $DataAksesTransaksi['nama_akses'];
                                //Buka data jurnal
                                $QryJurnal = mysqli_query($Conn,"SELECT * FROM jurnal WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                $DataJurnal = mysqli_fetch_array($QryJurnal);
                                if(empty($DataJurnal['id_jurnal'])){
                                    $AdaJurnal='<span class="text-danger"><i class="bi bi-x"></i> Jurnal</span>';
                                }else{
                                    $AdaJurnal='<span class="text-success"><i class="bi bi-check"></i> Jurnal</span>';
                                }
                                $id_jurnal= $DataJurnal['id_jurnal'];
                        ?>
                    <tr>
                        <td class="text-center text-xs">
                            <small><?php echo "$no";?></small>
                        </td>
                        <td class="text-left" align="left">
                            <small>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalKonfirmasiTransaksi" data-id="<?php echo "$id_transaksi,$keyword_by,$keyword,$batas,$page"; ?>">
                                    <?php echo "<b>$id_transaksi.$kategori</b>";?>
                                </a>
                            </small><br>
                            <small><?php echo "$TanggalTransaksi $JamTrasaksi";?></small>
                        </td>
                        <td class="text-left" align="left">
                            <small><b><?php echo "$metode";?></b></small><br>
                            <small><?php echo "$pembayaran";?></small><br>
                        </td>
                        <td class="text-left" align="left">
                            <small><?php echo "<b>$status</b>";?></small><br>
                            <small><?php echo "$tagihan";?></small>
                        </td>
                        <td class="text-left" align="left">
                            <small class="credit">
                                <?php 
                                    if(!empty($nama_supplier)){
                                        echo "<span class='text-dark' title='Supplier'><i class='bi bi-truck'></i> $nama_supplier</span><br>";
                                    }else{
                                        if(!empty($nama_anggota)){
                                            echo "<span class='text-dark' title='Anggota'><i class='bi bi-person'></i> $nama_anggota</span><br>";
                                        }else{
                                            echo "<span class='text-danger'>none</span><br>";
                                        }
                                    }
                                    echo "<i class='bi bi-person-circle'></i> $NamaAksesTransaksi";
                                ?>
                            </small>
                        </td>
                    </tr>
                    <?php
                                $no++; }
                            }
                    ?>
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
            <button class="btn btn-sm btn-outline-info" id="PrevPageTransaksi" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberTransaksi'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberTransaksi'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPageTransaksi" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>