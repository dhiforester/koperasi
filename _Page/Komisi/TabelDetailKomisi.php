<?php
    //Koneksi
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    if(empty($_POST['id_dokter'])){
        echo '<span>ID Personnel Tidak Boleh Kosong</span>';
    }else{
        $id_dokter=$_POST['id_dokter'];
        //Menghitung Pembayaran Valid
        $Sum1 = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='Valid'"));
        $JumlahPencairanValid = $Sum1['jumlah'];
        $JumlahPencairanValidRp = "Rp " . number_format($JumlahPencairanValid,0,',','.');
        //Menghitung pembayaran Pending
        $Sum2 = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='Pending'"));
        $JumlahPencairanPending= $Sum2['jumlah'];
        $JumlahPencairanPendingRp = "Rp " . number_format($JumlahPencairanPending,0,',','.');
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
            $OrderBy="id_transaksi_pencairan";
        }
        //Atur Page
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
            $posisi = ( $page - 1 ) * $batas;
        }else{
            $page="1";
            $posisi = 0;
        }
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter'"));
?>
    <script>
        var GetIdPersonnel = $('#GetIdPersonnel').html();
        //ketika klik next
        $('#NextPage').click(function() {
            var valueNext=$('#NextPage').val();
            var batas="<?php echo "$batas"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Komisi/TabelDetailKomisi.php",
                method  : "POST",
                data 	:  { page: valueNext, batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, id_dokter: GetIdPersonnel },
                success: function (data) {
                    $('#TabelDetailKomisi').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPage').click(function() {
            var ValuePrev = $('#PrevPage').val();
            var batas="<?php echo "$batas"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Komisi/TabelDetailKomisi.php",
                method  : "POST",
                data 	:  { page: ValuePrev,batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, id_dokter: GetIdPersonnel },
                success : function (data) {
                    $('#TabelDetailKomisi').html(data);
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
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Komisi/TabelDetailKomisi.php",
                    method  : "POST",
                    data 	:  { page: PageNumber, batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, id_dokter: GetIdPersonnel },
                    success: function (data) {
                        $('#TabelDetailKomisi').html(data);
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
                                    <b>Metode</b>
                                </th>
                                <th class="text-center">
                                    <b>Status</b>
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
                                    echo '  <td colspan="5" class="text-center">';
                                    echo '      <span class="text-danger">Belum Ada Data Pencairan</span>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1;
                                    //KONDISI PENGATURAN
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_pencairan WHERE id_dokter='$id_dokter' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_transaksi_pencairan= $data['id_transaksi_pencairan'];
                                        $id_dokter= $data['id_dokter'];
                                        $id_mitra= $data['id_mitra'];
                                        $tanggal= $data['tanggal'];
                                        $metode_pembayaran= $data['metode_pembayaran'];
                                        $keterangan= $data['keterangan'];
                                        $jumlah= $data['jumlah'];
                                        $status= $data['status'];
                                        $JumlahPencairan = "Rp " . number_format($jumlah,0,',','.');
                                ?>
                                    <tr>
                                        <td class="text-center text-xs">
                                            <?php echo "$no" ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$tanggal</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<b>$metode_pembayaran</b><br>";
                                                echo "<small class='credit'>$keterangan</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$status</small>";
                                            ?>
                                        </td>
                                        <td class="text-left" align="left">
                                            <?php 
                                                echo "<small class='credit'>$JumlahPencairan</small>";
                                            ?>
                                        </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditPencairan" data-id="<?php echo "$id_transaksi_pencairan,$page"; ?>" title="Edit Pencairan">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusPencairan" data-id="<?php echo "$id_transaksi_pencairan,$page"; ?>" title="Hapus Pencairan">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php $no++; }} ?>
                                <tr>
                                    <td colspan="4">JUMLAH PENCAIRAN VALID</td>
                                    <td><?php echo "$JumlahPencairanValidRp";?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4">JUMLAH PENCAIRAN PENDING</td>
                                    <td><?php echo "$JumlahPencairanPendingRp";?></td>
                                    <td></td>
                                </tr>
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
    </div>
<?php } ?>