<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
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
        $OrderBy="id_shu_session";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session WHERE like '%$keyword%' OR periode_hitung1 like '%$keyword%' OR periode_hitung2 like '%$keyword%' OR jasa_modal like '%$keyword%' OR jasa_usaha like '%$keyword%' OR status like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session WHERE $keyword_by like '%$keyword%'"));
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
            url     : "_Page/BagiHasil/TabelBagiHasil.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelBagiHasil').html(data);

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
            url     : "_Page/BagiHasil/TabelBagiHasil.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelBagiHasil').html(data);
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
                url     : "_Page/BagiHasil/TabelBagiHasil.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelBagiHasil').html(data);
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
                                <b>Info Sesi</b>
                            </th>
                            <th class="text-center">
                                <b>Bagi Hasil</b>
                            </th>
                            <th class="text-center">
                                <b>Simpanan</b>
                            </th>
                            <th class="text-center">
                                <b>Pinjaman</b>
                            </th>
                            <th class="text-center">
                                <b>Penjualan</b>
                            </th>
                            
                            <th class="text-center">
                                <b>Status</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="7">';
                                echo '      <span class="text-danger">Belum Aada Sesi Bagi Hasil</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM shu_session ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM shu_session WHERE sesi_shu like '%$keyword%' OR periode_hitung1 like '%$keyword%' OR periode_hitung2 like '%$keyword%' OR jasa_modal like '%$keyword%' OR jasa_usaha like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM shu_session ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM shu_session WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_shu_session= $data['id_shu_session'];
                                    $sesi_shu= $data['sesi_shu'];
                                    $periode_hitung1= $data['periode_hitung1'];
                                    $periode_hitung2= $data['periode_hitung2'];
                                    $modal_anggota= $data['modal_anggota'];
                                    $penjualan= $data['penjualan'];
                                    $pinjaman= $data['pinjaman'];
                                    $jasa_modal_anggota= $data['jasa_modal_anggota'];
                                    $laba_penjualan= $data['laba_penjualan'];
                                    $jasa_pinjaman= $data['jasa_pinjaman'];
                                    $persen_usaha= $data['persen_usaha'];
                                    $persen_modal= $data['persen_modal'];
                                    $persen_pinjaman= $data['persen_pinjaman'];
                                    $alokasi_hitung= $data['alokasi_hitung'];
                                    $alokasi_nyata= $data['alokasi_nyata'];
                                    $status= $data['status'];
                                    $modal_anggota = "" . number_format($modal_anggota,0,',','.');
                                    $penjualan = "" . number_format($penjualan,0,',','.');
                                    $pinjaman_rp = "" . number_format($pinjaman,0,',','.');
                                    $jasa_modal_anggota_rp = "" . number_format($jasa_modal_anggota,0,',','.');
                                    $laba_penjualan_rp = "" . number_format($laba_penjualan,0,',','.');
                                    $jasa_pinjaman_rp = "" . number_format($jasa_pinjaman,0,',','.');
                                    $persen_usaha_rp = "" . number_format($persen_usaha,0,',','.');
                                    $persen_usaha_rp = "" . number_format($persen_usaha,0,',','.');
                                    $alokasi_hitung_rp = "" . number_format($alokasi_hitung,0,',','.');
                                    $alokasi_nyata_rp = "" . number_format($alokasi_nyata,0,',','.');
                                    $strtotime1=strtotime($periode_hitung1);
                                    $strtotime2=strtotime($periode_hitung2);
                                    $periode_hitung1=date('d/m/Y',$strtotime1);
                                    $periode_hitung2=date('d/m/Y',$strtotime2);
                                    //Cek Status Jurnal
                                    $JumlahJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_shu_session='$id_shu_session'"));
                                    //Jumlah Anggota
                                    $JumlahRincian = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                                    $JumlahRincian = "" . number_format($JumlahRincian,0,',','.');
                                    //Label Jurnal Ada/Tidak Ada
                                    if(empty($JumlahJurnal)){
                                        $LabelJurnal='<span class="text-dark"> <i class="bi bi-x"></i> No Jurnal</span>';
                                    }else{
                                        $LabelJurnal='<span class="text-sucess"> <i class="bi bi-check-circle"></i> Jurnal</span>';
                                    }
                                    //Label Status
                                    if($status=="Pending"){
                                        $LabelStatus='<span class="badge badge-warning"> <i class="bi bi-three-dots"></i> Pending</span>';
                                    }else{
                                        $LabelStatus='<span class="badge badge-succes"> <i class="bi bi-check-circle"></i> '.$status.'</span>';
                                    }
                                    $SumAlokasiNyata = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(shu) AS shu FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
                                    $alokasi_nyata2 = $SumAlokasiNyata['shu'];
                                    $alokasi_nyata2 = "" . number_format($alokasi_nyata2,0,',','.');
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left" align="left">
                                    <b>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailBagiHasil" data-id="<?php echo "$id_shu_session"; ?>" title="Detail Data Sesi">
                                            <?php echo "$sesi_shu";?>
                                        </a>
                                    </b>
                                    <br>
                                    <small class="credit" title="Periode Perhitungan">
                                        <?php 
                                            echo "<i class='bi bi-calendar'></i> $periode_hitung1 - $periode_hitung2";
                                        ?>
                                    </small><br>
                                    <small class="credit" title="Jumlah Rincian">
                                        <?php 
                                            echo "<i class='bi bi-person-circle'></i> $JumlahRincian Record";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <?php 
                                            echo "<b title='Alokasi Hasil Usaha'><i class='bi bi-cash-coin'></i> $alokasi_hitung_rp</b><br>";
                                            echo "<span title='Perhitungan Jumlah Bagi Hasil'><i class='bi bi-cash-coin'></i> $alokasi_nyata2</span>";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <?php 
                                            echo "<b title='Jumlah Simpanan/Modal Anggota sampai dengan $periode_hitung2'>";
                                            echo "  <i class='bi bi-bank'></i> $modal_anggota";
                                            echo "</b><br>";
                                            echo "<span title='Jasa Simpanan/Modal Anggota sampai dengan $periode_hitung2'>";
                                            echo "  <i class='bi bi-wallet'></i> $jasa_modal_anggota_rp";
                                            echo "</span><br>";
                                            echo "<span title='Ketentuan Pesentase Jasa Modal'><i class='bi bi-check'></i> Modal ($persen_modal%) </span>";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <?php 
                                            echo "<b title='Jumlah Pinjaman Anggota sampai dengan $periode_hitung2'>";
                                            echo "  <i class='bi bi-coin'></i> $pinjaman_rp";
                                            echo "</b>";
                                            echo "<br>";
                                            echo "<span title='Jasa Pinjaman sampai dengan $periode_hitung2'>";
                                            echo "  <i class='bi bi-wallet'></i> $jasa_pinjaman_rp";
                                            echo "</span><br>";
                                            echo "<span title='Ketentuan Pesentase Jasa Pinjaman'><i class='bi bi-check'></i> Pinjaman ($persen_pinjaman%) </span><br>";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-left" align="left">
                                    <small class="credit">
                                        <?php 
                                            echo "<b title='Jumlah Penjualan Anggota Periode $periode_hitung1 - $periode_hitung2'>";
                                            echo "  <i class='bi bi-cart-check'></i> $penjualan";
                                            echo "</b><br>";
                                            echo "<span title='Laba penjualan periode $periode_hitung1 - $periode_hitung2'>";
                                            echo "  <i class='bi bi-wallet'></i> $laba_penjualan_rp";
                                            echo "</span><br>";
                                            echo "<span title='Ketentuan Pesentase Jasa Usaha'><i class='bi bi-check'></i> Usaha ($persen_usaha%) </span>";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-center" align="center">
                                    <small class="credit">
                                        <?php 
                                            echo "$LabelStatus<br>";
                                            echo "$LabelJurnal";
                                        ?>
                                    </small>
                                    <br>
                                </td>
                            </tr>
                            <?php
                                        $no++; 
                                    }
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