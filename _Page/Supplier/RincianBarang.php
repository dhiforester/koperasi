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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_supplier='$GetIdSupplier'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_supplier='$GetIdSupplier') AND (nama_barang like '%$keyword%' OR harga like '%$keyword%' OR qty like '%$keyword%' OR jumlah like '%$keyword%' OR updatetime like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_supplier='$GetIdSupplier'"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%')"));
            }
        }
        //Menghitung Jumlah Total
        $SumJumlahTotal = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_rincian WHERE id_supplier='$GetIdSupplier'"));
        $jumlah_transaksi = $SumJumlahTotal['jumlah'];
        $jumlah_transaksi_rp = "Rp " . number_format($jumlah_transaksi,0,',','.');
?>
    <script>
        $('#BatasRiwayat3').change(function(){
            var ProsesBatasRincianBarang = $('#ProsesBatasRincianBarang').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RincianBarang.php',
                data 	    :  ProsesBatasRincianBarang,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        $('#OrderBy3').change(function(){
            var ProsesBatasRincianBarang = $('#ProsesBatasRincianBarang').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RincianBarang.php',
                data 	    :  ProsesBatasRincianBarang,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        $('#ShortBy3').change(function(){
            var ProsesBatasRincianBarang = $('#ProsesBatasRincianBarang').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RincianBarang.php',
                data 	    :  ProsesBatasRincianBarang,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        $('#ProsesBatasRincianBarang').submit(function(){
            var ProsesBatasRincianBarang = $('#ProsesBatasRincianBarang').serialize();
            $('#HalamanDetailSupplier').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/RincianBarang.php',
                data 	    :  ProsesBatasRincianBarang,
                success     : function(data){
                    $('#HalamanDetailSupplier').html(data);
                }
            });
        });
        //Modal Excel Riwayat Transaksi
        $('#ModalExcelRiwayatTransaksi').on('show.bs.modal', function (e) {
            var ProsesBatasRincianBarang = $('#ProsesBatasRincianBarang').serialize();
            $('#FormExcelRiwayatTransaksi').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Supplier/FormExcelRiwayatTransaksi.php',
                data 	    :  ProsesBatasRincianBarang,
                success     : function(data){
                    $('#FormExcelRiwayatTransaksi').html(data);
                }
            });
        });
        //ketika klik next
        $('#3NextPage').click(function() {
            var valueNext=$('#3NextPage').val();
            var GetIdSupplier="<?php echo "$GetIdSupplier"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Supplier/RincianBarang.php",
                method  : "POST",
                data 	:  { GetIdSupplier: GetIdSupplier, page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#HalamanDetailSupplier').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#3PrevPage').click(function() {
            var ValuePrev = $('#3PrevPage').val();
            var GetIdSupplier="<?php echo "$GetIdSupplier"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Supplier/RincianBarang.php",
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
            $('#3PageNumber<?php echo $i;?>').click(function() {
                var PageNumber = $('#3PageNumber<?php echo $i;?>').val();
                var GetIdSupplier="<?php echo "$GetIdSupplier"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var keyword_by="<?php echo "$keyword_by"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Supplier/RincianBarang.php",
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
            <form action="javascript:void(0);" id="ProsesBatasRincianBarang">
                <input type="hidden" name="GetIdSupplier" value="<?php echo "$GetIdSupplier"; ?>">
                <div class="row">
                    <div class="col-md-1 mt-3">
                        <select name="batas" id="BatasRiwayat3" class="form-control">
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
                        <select name="OrderBy" id="OrderBy3" class="form-control">
                            <option value="">Pilih</option>
                            <option <?php if($OrderBy=="nama_barang"){echo "selected";} ?>  value="nama_barang">Nama Barang</option>
                            <option <?php if($OrderBy=="harga"){echo "selected";} ?> value="harga">Harga</option>
                            <option <?php if($OrderBy=="qty"){echo "selected";} ?> value="qty">Qty</option>
                            <option <?php if($OrderBy=="jumlah"){echo "selected";} ?> value="jumlah">Jumlah</option>
                        </select>
                        <small>Pencarian</small>
                    </div>
                    <div class="col-md-2 mt-3">
                        <select name="ShortBy" id="ShortBy3" class="form-control">
                            <option value="">Pilih</option>
                            <option <?php if($ShortBy=="ASC"){echo "selected";} ?>  value="ASC">A to Z</option>
                            <option <?php if($ShortBy=="DESC"){echo "selected";} ?> value="DESC">Z to A</option>
                        </select>
                        <small>Ururtan</small>
                    </div>
                    <div class="col-md-3 mt-3">
                        <input type="text" name="keyword" class="form-control" value="<?php echo "$keyword"; ?>">
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
                                        <b>Barang</b>
                                    </th>
                                    <th class="text-center">
                                        <b>Harga</b>
                                    </th>
                                    <th class="text-center">
                                        <b>Qty</b>
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
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_supplier='$GetIdSupplier') AND (nama_barang like '%$keyword%' OR harga like '%$keyword%' OR qty like '%$keyword%' OR jumlah like '%$keyword%') ORDER BY $OrderBy $ShortBy");
                                                }
                                            }else{
                                                if(empty($keyword)){
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy");
                                                }
                                            }
                                        }else{
                                            if(empty($keyword_by)){
                                                if(empty($keyword)){
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_supplier='$GetIdSupplier') AND (nama_barang like '%$keyword%' OR harga like '%$keyword%' OR qty like '%$keyword%' OR jumlah like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }
                                            }else{
                                                if(empty($keyword)){
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_supplier='$GetIdSupplier' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE (id_supplier='$GetIdSupplier') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }
                                            }
                                        }
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_transaksi= $data['id_transaksi'];
                                            $id_transaksi_rincian= $data['id_transaksi_rincian'];
                                            $id_barang= $data['id_barang'];
                                            $nama_barang= $data['nama_barang'];
                                            $harga= $data['harga'];
                                            $qty= $data['qty'];
                                            $jumlah= $data['jumlah'];
                                            $harga_rp = "Rp " . number_format($harga,0,',','.');
                                            $jumlah_rp = "Rp " . number_format($jumlah,0,',','.');
                                            //Apabila id_barang_satuan tidak kosong buka dari database barang_satuan
                                            if(!empty($data['id_barang_satuan'])){
                                                $id_barang_satuan= $data['id_barang_satuan'];
                                                //Buka data barang_satuan
                                                $QrySatuan = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
                                                $DataSatuan = mysqli_fetch_array($QrySatuan);
                                                $satuan= $DataSatuan['satuan_multi'];
                                            }else{
                                                //apabila tidak ada buka data barang
                                                $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                                $DataBarang = mysqli_fetch_array($QryBarang);
                                                $satuan= $DataBarang['satuan_barang'];
                                            }
                                            //Buka data transaksi
                                            $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                            $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                            $tanggal= $DataTransaksi['tanggal'];
                                            $strtoime=strtotime($tanggal);
                                            $tanggal_format=date('d/m/Y',$strtoime);
                                    ?>
                                        <tr>
                                            <td class="text-center text-xs">
                                                <?php echo "$no";?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php echo "$tanggal_format";?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php echo "$nama_barang";?>
                                            </td>
                                            <td class="text-left" align="right">
                                                <?php echo "$harga_rp";?>
                                            </td>
                                            <td class="text-left" align="center">
                                                <?php echo "$qty $satuan";?>
                                            </td>
                                            <td class="text-right" align="right">
                                                <?php echo "$jumlah_rp";?>
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
                <button class="btn btn-sm btn-outline-info" id="3PrevPage" value="<?php echo $prev;?>">
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
                            echo '<button class="btn btn-sm btn-info" id="3PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }else{
                            echo '<button class="btn btn-sm btn-outline-info" id="3PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }
                    }
                ?>
                <button class="btn btn-sm btn-outline-info" id="3NextPage" value="<?php echo $next;?>">
                    <span aria-hidden="true">»</span>
                </button>
            </div>
        </div>
    </div>
<?php } ?>