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
        $SumTransaksi = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE id_anggota='$id_anggota'"));
        $JumlahTransaksi = $SumTransaksi['tagihan'];
        $JumlahTransaksi = "" . number_format($JumlahTransaksi,0,',','.');
        //KeywordByPembelian
        if(!empty($_POST['KeywordByPembelian'])){
            $keyword_by=$_POST['KeywordByPembelian'];
        }else{
            $keyword_by="";
        }
        //KeywordPembelian
        if(!empty($_POST['KeywordPembelian'])){
            $keyword=$_POST['KeywordPembelian'];
        }else{
            $keyword="";
        }
        //BatasPembelian
        if(!empty($_POST['BatasPembelian'])){
            $batas=$_POST['BatasPembelian'];
        }else{
            $batas="10";
        }
        //ShortByPembelian
        if(!empty($_POST['ShortByPembelian'])){
            $ShortBy=$_POST['ShortByPembelian'];
            if($ShortBy=="ASC"){
                $NextShort="DESC";
            }else{
                $NextShort="ASC";
            }
        }else{
            $ShortBy="DESC";
            $NextShort="ASC";
        }
        //OrderByPembelian
        if(!empty($_POST['OrderByPembelian'])){
            $OrderBy=$_POST['OrderByPembelian'];
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$id_anggota'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$id_anggota') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$id_anggota'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%')"));
            }
        }
?>
    <script>
        //ketika klik next
        $('#NextPagePembelian').click(function() {
            var valueNext=$('#NextPagePembelian').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPembelianAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: valueNext, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderByPembelian: OrderBy, ShortByPembelian: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPembelian').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPagePembelian').click(function() {
            var PrevPagePembelian=$('#PrevPagePembelian').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPembelianAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: PrevPagePembelian, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderByPembelian: OrderBy, ShortByPembelian: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPembelian').html(data);
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
            $('#PageNumberPembelian<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumberPembelian<?php echo $i;?>').val();
                var id_anggota="<?php echo "$id_anggota"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var keyword_by="<?php echo "$keyword_by"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Anggota/TabelPembelianAnggota.php",
                    method  : "POST",
                    data 	:  { id_anggota: id_anggota, page: PageNumber, BatasPembelian: batas, KeywordPembelian: keyword, KeywordByPembelian: keyword_by, OrderByPembelian: OrderBy, ShortByPembelian: ShortBy },
                    success: function (data) {
                        $('#MenampilkanTabelPembelian').html(data);
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
                                    <b title="">Keterangan</b>
                                </th>
                                <th class="text-center">
                                    <b>Jumlah</b>
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
                                    echo '  <td colspan="8" class="text-center">';
                                    echo '      Belum Ada Transaksi';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1+$posisi;
                                    //KONDISI PENGATURAN MASING FILTER
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$id_anggota') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
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
                                        if(empty($data['keterangan'])){
                                            $keterangan="-";
                                        }else{
                                            $keterangan= $data['keterangan'];
                                        }
                                        
                                        $pembayaran = "" . number_format($pembayaran,0,',','.');
                                        $tagihan = "" . number_format($tagihan,0,',','.');
                                        $kembalian = "" . number_format($kembalian,0,',','.');
                                        //Buka data anggota
                                        if(!empty($data['id_anggota'])){
                                            $IdAnggota= $data['id_anggota'];
                                            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$IdAnggota'")or die(mysqli_error($Conn));
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
                                            echo "<span title='Petugas/Kasir'><i class='bi bi-person-circle'></i> $NamaAksesTransaksi</span>";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small>
                                        <?php
                                            echo '<i class="bi bi-tag"></i> '.$status.'<br>';
                                            echo "$keterangan";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-right" align="right">
                                    <small title="Jumlah Tagihan"><i class="bi bi-cart-check"></i> <?php echo "$tagihan";?></small>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <a href="javascript:void(0);"  class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDetailTransaksi" data-id="<?php echo "$id_transaksi"; ?>">
                                            <i class="bi bi-info-circle"></i>
                                        </a>  
                                    </div>
                                </td>
                            </tr>
                            <?php
                                        $no++; }
                                    }
                            ?>
                            <tr>
                                <td></td>
                                <td colspan="3" align="left">
                                    <b>JUMLAH TRANSAKSI</b>
                                </td>
                                <td align="right">
                                    <?php echo "<b>$JumlahTransaksi</b>"; ?>
                                </td>
                                <td></td>
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
            <button class="btn btn-sm btn-outline-info" id="PrevPagePembelian" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberPembelian'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberPembelian'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPagePembelian" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
<?php } ?>