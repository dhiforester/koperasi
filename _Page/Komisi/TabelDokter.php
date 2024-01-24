<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //id_mitra
    if(!empty($_POST['id_mitra'])){
        $id_mitra=$_POST['id_mitra'];
    }else{
        $id_mitra="";
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
        $OrderBy="id_dokter";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($id_mitra)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokter"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokter WHERE nama_dokter like '%$keyword%' OR kategori_dokter like '%$keyword%' OR kontak_dokter like '%$keyword%' OR email_dokter like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokter WHERE id_mitra='$id_mitra'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM dokter WHERE (id_mitra='$id_mitra') AND (nama_dokter like '%$keyword%' OR kategori_dokter like '%$keyword%' OR kontak_dokter like '%$keyword%' OR email_dokter like '%$keyword%')"));
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
            url     : "_Page/Komisi/TabelDokter.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanPersonnelMitra').html(data);

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
            url     : "_Page/Komisi/TabelDokter.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanPersonnelMitra').html(data);
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
                url     : "_Page/Komisi/TabelDokter.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanPersonnelMitra').html(data);
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
                                <b>Nama Personnel</b>
                            </th>
                            <th class="text-center">
                                <b>Kategori & Mitra</b>
                            </th>
                            <th class="text-center">
                                <b>Volume</b>
                            </th>
                            <th class="text-center">
                                <b>Pembayaran</b>
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
                                echo '  <td colspan="6">';
                                echo '      <span class="text-danger">No Data</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($id_mitra)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM dokter ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM dokter WHERE nama_dokter like '%$keyword%' OR kategori_dokter like '%$keyword%' OR kontak_dokter like '%$keyword%' OR email_dokter like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($id_mitra)){
                                        $query = mysqli_query($Conn, "SELECT*FROM dokter WHERE id_mitra='$id_mitra' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM dokter WHERE (id_mitra='$id_mitra') AND (nama_dokter like '%$keyword%' OR kategori_dokter like '%$keyword%' OR kontak_dokter like '%$keyword%' OR email_dokter like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_dokter= $data['id_dokter'];
                                    $id_mitra= $data['id_mitra'];
                                    $id_akses= $data['id_akses'];
                                    $nama_dokter= $data['nama_dokter'];
                                    $kategori_dokter= $data['kategori_dokter'];
                                    $kontak_dokter= $data['kontak_dokter'];
                                    $email_dokter= $data['email_dokter'];
                                    $deskripsi_dokter= $data['deskripsi_dokter'];
                                    $image_dokter= $data['image_dokter'];
                                    $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                                    $DataMitra = mysqli_fetch_array($QryMitra);
                                    $nama_mitra= $DataMitra['nama_mitra'];
                                    //Menghitung Volume
                                    $TotalBagiHasil=0;
                                    $QryKunjungan = mysqli_query($Conn, "SELECT * FROM pasien_kunjungan WHERE id_dokter='$id_dokter' AND id_mitra='$id_mitra' ORDER BY id_kunjungan ASC");
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
                                                $nama_tindakan= $DataRincian['nama_tindakan'];
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
                                            }
                                        }
                                    }
                                    $JumlahKomisiRp = "Rp " . number_format($TotalBagiHasil,0,',','.');
                                    //Menghitung Pembayaran
                                    $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi_pencairan WHERE id_dokter='$id_dokter' AND status='Valid'"));
                                    $JumlahPencairan = $Sum['jumlah'];
                                    $JumlahPencairanrp = "Rp " . number_format($JumlahPencairan,0,',','.');

                            ?>
                                <tr>
                                    <td class="text-center text-xs">
                                        <?php echo "$no" ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<b>$nama_dokter</b><br>";
                                            echo "<small class='credit'>$email_dokter</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<b>$nama_mitra</b><br>";
                                            echo "<small class='credit'>$kategori_dokter</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<small class='credit'>$JumlahKomisiRp</small>";
                                        ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <?php 
                                            echo "<small class='credit'>$JumlahPencairanrp</small>";
                                        ?>
                                    </td>
                                    <td align="center">
                                        <a href="index.php?Page=Komisi&Sub=DetailKomisi&id_dokter=<?php echo "$id_dokter"; ?>" class="btn btn-info btn-sm">
                                            <i class="bi bi-info"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php $no++; }} ?>
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