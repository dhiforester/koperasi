<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //ID Supplier tidak boleh kosong
    if(empty($_POST['GetIdSupplier'])){
        echo '<div class="card">';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 text-center text-danger">';
        echo '              <b>ID Supplier Tidak Boleh Kosong</b>';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $GetIdSupplier=$_POST['GetIdSupplier'];
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
            $batas="0";
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
            $keyword_by=$_POST['OrderBy'];
        }else{
            $OrderBy="id_transaksi";
            $keyword_by="";
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%')"));
            }
        }
        //Menghitung Jumlah Total
        $SumJumlahTotal = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE id_supplier='$GetIdSupplier'"));
        $jumlah_transaksi = $SumJumlahTotal['tagihan'];
        $jumlah_transaksi_rp = "Rp " . number_format($jumlah_transaksi,0,',','.');
?>
    <script>
        $('#BatasRiwayat2').change(function(){
            var ProsesBatasRriwayatTransaksi = $('#ProsesBatasRriwayatTransaksi').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RiwayatTransaksi.php',
                data 	    :  ProsesBatasRriwayatTransaksi,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        $('#OrderBy2').change(function(){
            var ProsesBatasRriwayatTransaksi = $('#ProsesBatasRriwayatTransaksi').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RiwayatTransaksi.php',
                data 	    :  ProsesBatasRriwayatTransaksi,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        $('#ShortBy2').change(function(){
            var ProsesBatasRriwayatTransaksi = $('#ProsesBatasRriwayatTransaksi').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RiwayatTransaksi.php',
                data 	    :  ProsesBatasRriwayatTransaksi,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        $('#ProsesBatasRriwayatTransaksi').submit(function(){
            var ProsesBatasRriwayatTransaksi = $('#ProsesBatasRriwayatTransaksi').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RiwayatTransaksi.php',
                data 	    :  ProsesBatasRriwayatTransaksi,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        //Modal Excel Riwayat Transaksi
        $('#ModalExcelRiwayatTransaksi').on('show.bs.modal', function (e) {
            var ProsesBatasRriwayatTransaksi = $('#ProsesBatasRriwayatTransaksi').serialize();
            $('#FormExcelRiwayatTransaksi').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/FormExcelRiwayatTransaksi.php',
                data 	    :  ProsesBatasRriwayatTransaksi,
                success     : function(data){
                    $('#FormExcelRiwayatTransaksi').html(data);
                }
            });
        });
        //ketika klik next
        $('#NextPage').click(function() {
            var valueNext=$('#NextPage').val();
            var GetIdSupplier="<?php echo "$GetIdSupplier"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Supplier/RiwayatTransaksi.php",
                method  : "POST",
                data 	:  { GetIdSupplier: GetIdSupplier, page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#HalamanDetailSupplier').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPage').click(function() {
            var ValuePrev = $('#PrevPage').val();
            var GetIdSupplier="<?php echo "$GetIdSupplier"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Supplier/RiwayatTransaksi.php",
                method  : "POST",
                data 	:  { GetIdSupplier: GetIdSupplier, page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success : function (data) {
                    $('#HalamanDetailSupplier').html(data);
                }
            })
        });
        <?php 
            if(!empty($_POST['batas'])){
                $JmlHalaman =ceil($jml_data/$batas); 
            }else{
                $JmlHalaman =0; 
            }
            $a=1;
            $b=$JmlHalaman;
            for ( $i =$a; $i<=$b; $i++ ){
        ?>
            //ketika klik page number
            $('#PageNumber<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumber<?php echo $i;?>').val();
                var GetIdSupplier="<?php echo "$GetIdSupplier"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var keyword_by="<?php echo "$keyword_by"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Supplier/RiwayatTransaksi.php",
                    method  : "POST",
                    data 	:  { GetIdSupplier: GetIdSupplier, page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                    success: function (data) {
                        $('#HalamanDetailSupplier').html(data);
                    }
                })
            });
        <?php } ?>
    </script>
    <div class="card">
        <div class="card-header">
            <form action="javascript:void(0);" id="ProsesBatasRriwayatTransaksi">
                <input type="hidden" name="GetIdSupplier" value="<?php echo "$GetIdSupplier"; ?>">
                <div class="row">
                    <div class="col-md-1 mt-3">
                        <select name="batas" id="BatasRiwayat2" class="form-control">
                            <option <?php if($batas==""){echo "selected";} ?> value="">All</option>
                            <option <?php if($batas=="5"){echo "selected";} ?> value="5">5</option>
                            <option <?php if($batas=="10"){echo "selected";} ?> value="10">10</option>
                            <option <?php if($batas=="25"){echo "selected";} ?> value="25">25</option>
                            <option <?php if($batas=="50"){echo "selected";} ?> value="50">50</option>
                            <option <?php if($batas=="100"){echo "selected";} ?> value="100">100</option>
                            <option <?php if($batas=="250"){echo "selected";} ?> value="250">250</option>
                            <option <?php if($batas=="500"){echo "selected";} ?> value="500">500</option>
                        </select>
                        <small>Data</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <select name="OrderBy" id="OrderBy2" class="form-control">
                            <option value="">Pilih</option>
                            <option <?php if($OrderBy=="kategori"){echo "selected";} ?>  value="kategori">Kategori</option>
                            <option <?php if($OrderBy=="tanggal"){echo "selected";} ?> value="tanggal">Tanggal</option>
                            <option <?php if($OrderBy=="metode"){echo "selected";} ?> value="metode">Metode</option>
                            <option <?php if($OrderBy=="status"){echo "selected";} ?> value="status">Status</option>
                            <option <?php if($OrderBy=="tagihan"){echo "selected";} ?> value="tagihan">Tagihan</option>
                        </select>
                        <small>Pencarian</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <select name="ShortBy" id="ShortBy2" class="form-control">
                            <option value="">Pilih</option>
                            <option <?php if($ShortBy=="ASC"){echo "selected";} ?>  value="ASC">A to Z</option>
                            <option <?php if($ShortBy=="DESC"){echo "selected";} ?> value="DESC">Z to A</option>
                        </select>
                        <small>Ururtan</small>
                    </div>
                    <div class="col-md-3 mt-3">
                        <input type="text" name="keyword" id="keyword" class="form-control" value="<?php echo "$keyword"; ?>">
                        <small>Kata Kunci</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button type="submit" class="btn btn-md btn-info btn-block btn-rounded">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button type="button" class="btn btn-md btn-success btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalExcelRiwayatTransaksi">
                            <i class="bi bi-table"></i> Excel
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
                                        <b>Metode</b>
                                    </th>
                                    <th class="text-center">
                                        <b>Status</b>
                                    </th>
                                    <th class="text-center">
                                        <b>Jumlah</b>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(empty($jml_data)){
                                        echo '<tr>';
                                        echo '  <td colspan="6" class="text-center">';
                                        echo '      Belum Ada Transaksi';
                                        echo '  </td>';
                                        echo '</tr>';
                                    }else{
                                        $no = 1+$posisi;
                                        //KONDISI PENGATURAN MASING FILTER
                                        if($batas=="0"){
                                            if(empty($keyword_by)){
                                                if(empty($keyword)){
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%') ORDER BY $OrderBy $ShortBy");
                                                }
                                            }else{
                                                if(empty($keyword)){
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy");
                                                }
                                            }
                                        }else{
                                            if(empty($keyword_by)){
                                                if(empty($keyword)){
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND (tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }
                                            }else{
                                                if(empty($keyword)){
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }
                                            }
                                        }
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_transaksi= $data['id_transaksi'];
                                            $id_akses= $data['id_akses'];
                                            $id_anggota= $data['id_anggota'];
                                            $id_supplier= $data['id_supplier'];
                                            $tanggal= $data['tanggal'];
                                            $kategori= $data['kategori'];
                                            if(!empty($data['tagihan'])){
                                                $tagihan= $data['tagihan'];
                                            }else{
                                                $tagihan="0";
                                            }
                                            $pembayaran= $data['pembayaran'];
                                            $metode= $data['metode'];
                                            $status= $data['status'];
                                            $pembayaran = "Rp " . number_format($pembayaran,0,',','.');
                                            $tagihan = "Rp " . number_format($tagihan,0,',','.');
                                            //Buka data anggota
                                            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                                            $DataAnggota = mysqli_fetch_array($QryAnggota);
                                            $nama= $DataAnggota['nama'];
                                            //Buka Supplier
                                            if(empty($id_supplier)){
                                                $nama_supplier="";
                                            }else{
                                                $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                                                $DataSupplier = mysqli_fetch_array($QrySupplier);
                                                $nama_supplier= $DataSupplier['nama_supplier'];
                                            }

                                    ?>
                                        <tr>
                                            <td class="text-center text-xs">
                                                <?php echo "$no";?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php echo "$tanggal";?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php echo "$kategori";?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php echo "$metode";?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php echo "$status";?>
                                            </td>
                                            <td class="text-right" align="right">
                                                <?php echo "$tagihan";?>
                                            </td>
                                        </tr>
                                    <?php
                                                $no++; }
                                            }
                                    ?>
                                <tr>
                                    <td></td>
                                    <td colspan="4" align="left"><b>JUMLAH TOTAL TRANSAKSI</b></td>
                                    <td align="right"><b><?php echo $jumlah_transaksi_rp; ?></b></td>
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
                    if(!empty($_POST['batas'])){
                        $JmlHalaman = ceil($jml_data/$batas); 
                        $JmlHalaman_real = ceil($jml_data/$batas); 
                    }else{
                        $JmlHalaman =0; 
                        $JmlHalaman_real =0; 
                    }
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
<?php } ?>