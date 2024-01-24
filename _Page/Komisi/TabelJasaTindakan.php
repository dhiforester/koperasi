<?php
    //Koneksi
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    if(empty($_POST['id_dokter'])){
        echo '<span>ID Personnel Tidak Boleh Kosong</span>';
    }else{
        $id_dokter=$_POST['id_dokter'];
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
            $OrderBy="id_kunjungan";
        }
        //Atur Page
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
            $posisi = ( $page - 1 ) * $batas;
        }else{
            $page="1";
            $posisi = 0;
        }
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pasien_kunjungan WHERE id_dokter='$id_dokter'"));
?>
    <script>
        var GetIdPersonnel = $('#GetIdPersonnel').html();
        //ketika klik next
        $('#NextPage2').click(function() {
            var valueNext=$('#NextPage2').val();
            var batas="<?php echo "$batas"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Komisi/TabelJasaTindakan.php",
                method  : "POST",
                data 	:  { page: valueNext, batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, id_dokter: GetIdPersonnel },
                success: function (data) {
                    $('#MenampilkanRiwayatJasaTindakan').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPage2').click(function() {
            var ValuePrev = $('#PrevPage2').val();
            var batas="<?php echo "$batas"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Komisi/TabelJasaTindakan.php",
                method  : "POST",
                data 	:  { page: ValuePrev, batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, id_dokter: GetIdPersonnel },
                success : function (data) {
                    $('#MenampilkanRiwayatJasaTindakan').html(data);
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
            $('#PageNumber2<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumber2<?php echo $i;?>').val();
                var batas="<?php echo "$batas"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Komisi/TabelJasaTindakan.php",
                    method  : "POST",
                    data 	:  { page: PageNumber, batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, id_dokter: GetIdPersonnel },
                    success: function (data) {
                        $('#MenampilkanRiwayatJasaTindakan').html(data);
                    }
                })
            });
        <?php } ?>
    </script>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
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
                                    <b>Pasien</b>
                                </th>
                                <th class="text-center">
                                    <b>Tindakan</b>
                                </th>
                                <th class="text-center">
                                    <b>Volume</b>
                                </th>
                                <th class="text-center">
                                    <b>Komisi</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(empty($jml_data)){
                                    echo '<tr>';
                                    echo '  <td colspan="6" class="text-center">';
                                    echo '      <span class="text-danger">Tidak Ada Riwayat Tindakan Medis</span>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1+$posisi;
                                    $QryKunjungan = mysqli_query($Conn, "SELECT * FROM pasien_kunjungan WHERE id_dokter='$id_dokter' ORDER BY id_kunjungan ASC LIMIT $posisi, $batas");
                                    while ($DataKunjungan = mysqli_fetch_array($QryKunjungan)) {
                                        $id_kunjungan= $DataKunjungan['id_kunjungan'];
                                        $nama_pasien= $DataKunjungan['nama_pasien'];
                                        $datetime_kunjungan= $DataKunjungan['datetime_kunjungan'];
                                        //Buka Data Transaksi
                                        $NomorTransaksi = 1;
                                        $QryTransaksi = mysqli_query($Conn, "SELECT * FROM transaksi WHERE id_kunjungan='$id_kunjungan' ORDER BY id_kunjungan ASC");
                                        while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                            $id_transaksi= $DataTransaksi['id_transaksi'];
                                            //Buka rincian transaksi
                                            $QryRincian = mysqli_query($Conn, "SELECT * FROM transaksi_rincian WHERE id_transaksi='$id_transaksi' AND id_mitra_tindakan!='' ORDER BY id_transaksi_rincian ASC");
                                            while ($DataRincian = mysqli_fetch_array($QryRincian)) {
                                                $NomorRincian=$NomorRincian+1;
                                                $id_transaksi_rincian= $DataRincian['id_transaksi_rincian'];
                                                $id_mitra_tindakan= $DataRincian['id_mitra_tindakan'];
                                                if(!empty($DataRincian['id_mitra_tindakan'])){
                                                    $nama_tindakan= $DataRincian['nama_tindakan'];
                                                }else{
                                                    $nama_tindakan= $DataRincian['nama_barang'];
                                                }
                                                $jumlah= $DataRincian['jumlah'];
                                                $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
                                                $JumlahKomisi =0;
                                                //Membuka jumlah komisi
                                                $QryTindakan=mysqli_query($Conn,"SELECT * FROM mitra_tindakan WHERE id_mitra_tindakan='$id_mitra_tindakan'")or die(mysqli_error($Conn));
                                                $DataTindakan=mysqli_fetch_array($QryTindakan);
                                                $id_mitra_tindakan_detail= $DataTindakan['id_mitra_tindakan'];
                                                $jasa_dokter_detail=$DataTindakan['jasa_dokter'];
                                                $TotalBagiHasil=$jasa_dokter_detail+$TotalBagiHasil;
                                                $JumlahBagiHasilRp="Rp " . number_format($jasa_dokter_detail,0,',','.');
                                ?>
                                    <tr>
                                        <td class="text-center text-xs">
                                            <?php echo "$no" ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$datetime_kunjungan</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$nama_pasien</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$nama_tindakan</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$JumlahRp</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$JumlahBagiHasilRp</small>";
                                            ?>
                                        </td>
                                    </tr>
                                <?php $no++; }}}} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
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
                    <button class="btn btn-sm btn-outline-info" id="PrevPage2" value="<?php echo $prev;?>">
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
                                echo '<button class="btn btn-sm btn-info" id="PageNumber2'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                            }else{
                                echo '<button class="btn btn-sm btn-outline-info" id="PageNumber2'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                            }
                        }
                    ?>
                    <button class="btn btn-sm btn-outline-info" id="NextPage2" value="<?php echo $next;?>">
                        <span aria-hidden="true">»</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>