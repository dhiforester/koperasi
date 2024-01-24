<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //id_barang tidak boleh kosong
    if(empty($_POST['id_barang'])){
        echo '<div class="card-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger">';
        echo '          ID Barang Tidak Boleh Kosong!';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_barang=$_POST['id_barang'];
        //periode1
        if(!empty($_POST['periode1'])){
            $periode1=$_POST['periode1'];
        }else{
            $periode1="";
        }
        //periode2
        if(!empty($_POST['periode2'])){
            $periode2=$_POST['periode2'];
        }else{
            $periode2="";
        }
        //batas
        if(!empty($_POST['batas'])){
            $batas=$_POST['batas'];
        }else{
            $batas="10";
        }
        //ShortBy
        $ShortBy="DESC";
        //OrderBy
        $OrderBy="updatetime";
        //Atur Page
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
            $posisi = ( $page - 1 ) * $batas;
        }else{
            $page="1";
            $posisi = 0;
        }
        if(empty($periode1)||empty($periode2)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang' AND updatetime>='$periode1' AND updatetime<='$periode2'"));
        }
        $SumJumlahTotal = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_rincian WHERE id_barang='$id_barang'"));
        $jumlah_transaksi = $SumJumlahTotal['jumlah'];
        $JumlahTransaksiRp = "" . number_format($jumlah_transaksi,0,',','.');
?>
    <script>
        //ketika klik next
        $('#NextPage').click(function() {
            var valueNext=$('#NextPage').val();
            var id_barang="<?php echo "$id_barang"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var periode1="<?php echo "$periode1"; ?>";
            var periode2="<?php echo "$periode2"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Barang/TabelRiwayatTransaksi.php",
                method  : "POST",
                data 	:  { page: valueNext, id_barang: id_barang, batas: batas, periode1: periode1, periode2: periode2, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#TampilkanRiwayatTransaksi').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPage').click(function() {
            var ValuePrev = $('#PrevPage').val();
            var id_barang="<?php echo "$id_barang"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var periode1="<?php echo "$periode1"; ?>";
            var periode2="<?php echo "$periode2"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Barang/TabelRiwayatTransaksi.php",
                method  : "POST",
                data 	:  { page: ValuePrev, id_barang: id_barang, batas: batas, periode1: periode1, periode2: periode2, OrderBy: OrderBy, ShortBy: ShortBy },
                success : function (data) {
                    $('#TampilkanRiwayatTransaksi').html(data);
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
                var id_barang="<?php echo "$id_barang"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var periode1="<?php echo "$periode1"; ?>";
                var periode2="<?php echo "$periode2"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Barang/TabelRiwayatTransaksi.php",
                    method  : "POST",
                    data 	:  { page: PageNumber, id_barang: id_barang, batas: batas, periode1: periode1, periode2: periode2, OrderBy: OrderBy, ShortBy: ShortBy },
                    success: function (data) {
                        $('#TampilkanRiwayatTransaksi').html(data);
                    }
                })
            });
        <?php } ?>
        $('#batas').change(function(){
            var ProsesCariRiwayatTransaksi = $('#ProsesCariRiwayatTransaksi').serialize();
            $('#TampilkanRiwayatTransaksi').html('Loading...');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Barang/TabelRiwayatTransaksi.php',
                data 	    :  ProsesCariRiwayatTransaksi,
                success     : function(data){
                    $('#TampilkanRiwayatTransaksi').html(data);
                }
            });
        });
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
                                    <b>QTY</b>
                                </th>
                                <th class="text-center">
                                    <b>Harga</b>
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
                                    echo '  <td colspan="6">';
                                    echo '      <span class="text-danger">Tidak Ada Riwayat Transaksi</span>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1+$posisi;
                                    //KONDISI PENGATURAN MASING FILTER
                                    if(empty($periode1)||empty($periode2)){
                                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang' AND updatetime>='$periode1' AND updatetime<='$periode2' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_transaksi_rincian= $data['id_transaksi_rincian'];
                                        $id_transaksi= $data['id_transaksi'];
                                        $nama_barang= $data['nama_barang'];
                                        $harga= $data['harga'];
                                        $qty= $data['qty'];
                                        $jumlah= $data['jumlah'];
                                        $updatetime= $data['updatetime'];
                                        $HargaRp = "" . number_format($harga,0,',','.');
                                        $JumlahRp = "" . number_format($jumlah,0,',','.');
                                        //Buka Data Transaksi
                                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                        $id_transaksi = $DataTransaksi['id_transaksi'];
                                        $kategori= $DataTransaksi['kategori'];
                                        //Buka data barang
                                        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                        $DataBarang = mysqli_fetch_array($QryBarang);
                                        $satuan_barang= $DataBarang['satuan_barang'];
                                        //Format Tanggal
                                        $Strtotime=strtotime($updatetime);
                                        $TanggalFormat=date('d/m/Y H:i',$Strtotime);
                                ?>
                                    <tr>
                                        <td class="text-center text-xs">
                                            <?php 
                                                echo "<small >$no</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo '<small class="credits"><i class="bi bi-calendar-check"></i> '.$TanggalFormat.'</small>';
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small><i class='bi bi-tag'></i>$kategori</small><br>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="center">
                                            <?php 
                                                echo "<small>$qty $satuan_barang</small>";
                                            ?>
                                        </td>
                                        <td class="text-right" align="right">
                                            <?php 
                                                echo "<small>$HargaRp</small><br>";
                                            ?>
                                        </td>
                                        <td class="text-right" align="right">
                                            <?php 
                                                echo "<small>$JumlahRp</small><br>";
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++; }} ?>
                                <tr>
                                    <td></td>
                                    <td colspan="4" align="left"><b>JUMLAH TOTAL</b></td>
                                    <td class="text-right" align="right"><b><?php echo $JumlahTransaksiRp;?></b></td>
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