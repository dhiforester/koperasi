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
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Transaksi/TabelTransaksi.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelTransaksi').html(data);

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
            url     : "_Page/Transaksi/TabelTransaksi.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelTransaksi').html(data);
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
                url     : "_Page/Transaksi/TabelTransaksi.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelTransaksi').html(data);
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
                                <b>Transaksi</b>
                            </th>
                            <th class="text-center">
                                <b title="User/Petugas, Supplier, Anggota">Person</b>
                            </th>
                            <th class="text-center">
                                <b>Jumlah</b>
                            </th>
                            <th class="text-center">
                                <b>Pembayaran</b>
                            </th>
                            <th class="text-center">
                                <b>Status</b>
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
                                echo '  <td colspan="7" class="text-center">';
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
                                    $kembalian= $data['kembalian'];
                                    $metode= $data['metode'];
                                    $status= $data['status'];
                                    $pembayaran = "" . number_format($pembayaran,0,',','.');
                                    $tagihan = "" . number_format($tagihan,0,',','.');
                                    $kembalian = "" . number_format($kembalian,0,',','.');
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
                                    //Menghitung jumlah pembayaran
                                    $SumPembayaran = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi'"));
                                    $JumlahPembayaran = $SumPembayaran['jumlah'];
                                    $JumlahPembayaran = "" . number_format($JumlahPembayaran,0,',','.');
                                    //Menghitung Jumlah Data Pembayaran
                                    $JumlahDataPembayaran = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi'"));
                            ?>
                        <tr>
                            <td class="text-center text-xs">
                                <small><?php echo "$no";?></small>
                            </td>
                            <td class="text-left" align="left">
                                <small>
                                    <?php 
                                        echo '<i class="bi bi-calendar"></i> '.$TanggalTransaksi.'<br>';
                                        echo '<i class="bi bi-clock"></i> '.$JamTrasaksi.'';
                                    ?>
                                </small>
                            </td>
                            <td class="text-left" align="left">
                                <small>
                                    <?php 
                                        echo '<i class="bi bi-cart"></i> '.$kategori.'<br>';
                                        echo '<i><i class="bi bi-qr-code"></i> '.$IdTransaksi.'</i>';
                                    ?>
                                </small>
                            </td>
                            <td class="text-left" align="left">
                                <small class="credit">
                                    <?php 
                                        if(!empty($nama_supplier)){
                                            echo "<span class='text-dark' title='Supplier'><i class='bi bi-truck'></i> $nama_supplier</span><br>";
                                        }else{
                                            echo "<span class='text-dark' title='Supplier'><i class='bi bi-truck'></i> None</span><br>";
                                        }
                                        if(!empty($nama_anggota)){
                                            echo "<span class='text-dark' title='Anggota'><i class='bi bi-person'></i> $nama_anggota</span><br>";
                                        }else{
                                            echo "<span class='text-dark' title='Anggota'><i class='bi bi-person'></i> None</span><br>";
                                        }
                                        echo "<span title='Petugas/Kasir'><i class='bi bi-person-circle'></i> $NamaAksesTransaksi</span>";
                                    ?>
                                </small>
                            </td>
                            <td class="text-right" align="right">
                                <small title="Jumlah Tagihan"><i class="bi bi-cart-check"></i> <?php echo "$tagihan";?></small><br>
                                <small title="Jumlah Uang"><i class="bi bi-coin"></i> <?php echo "$pembayaran";?></small><br>
                                <small title="Kembalian"><i class="bi bi-currency-exchange"></i> <?php echo "($kembalian)";?></small><br>
                            </td>
                            <td class="text-right" align="right">
                                <small title="Jumlah Pembayaran"><?php echo "$JumlahPembayaran";?></small><br>
                                <small title="Jumlah Data Pembayaran"><?php echo "($JumlahDataPembayaran Data)";?></small><br>
                            </td>
                            <td class="text-left" align="left">
                                <small>
                                    <?php 
                                        echo '<i class="bi bi-tag"></i> '.$status.'<br>';
                                        echo "<span title='Exensi Jurnal'>$AdaJurnal</span>";
                                    ?>
                                </small>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <a href="javascript:void(0);"  class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDetailTransaksi" data-id="<?php echo "$id_transaksi,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>">
                                        <i class="bi bi-info-circle"></i>
                                    </a>  
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteTransaksi" data-id="<?php echo "$id_transaksi,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>">
                                        <i class="bi bi-x"></i>
                                    </button>  
                                </div>
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