<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Referensi
    if(!empty($_POST['Referensi'])){
        $Referensi=$_POST['Referensi'];
    }else{
        $Referensi="Transaksi";
    }
    //KeywordTransaksi
    if(!empty($_POST['KeywordTransaksi'])){
        $keyword=$_POST['KeywordTransaksi'];
    }else{
        $keyword="";
    }
    //BatasTransaksi
    if(!empty($_POST['BatasTransaksi'])){
        $batas=$_POST['BatasTransaksi'];
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
    if(!empty($_POST['Referensi'])){
        if($Referensi=="Transaksi"){
            $OrderBy="id_transaksi";
        }else{
            if($Referensi=="Simpanan"){
                $OrderBy="id_simpanan";
            }else{
                if($Referensi=="Pinjaman"){
                    $OrderBy="id_pinjaman";
                }else{
                    if($Referensi=="Angsuran"){
                        $OrderBy="id_pinjaman_angsuran";
                    }else{
                        if($Referensi=="Bagi Hasil"){
                            $OrderBy="id_shu_session";
                        }else{
                            $OrderBy="id_transaksi";
                        }
                    }
                }
            }
        }
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
    if(empty($keyword)){
        if($Referensi=="Transaksi"){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
        }else{
            if($Referensi=="Simpanan"){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan"));
            }else{
                if($Referensi=="Pinjaman"){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman"));
                }else{
                    if($Referensi=="Angsuran"){
                        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran"));
                    }else{
                        if($Referensi=="Bagi Hasil"){
                            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session"));
                        }else{
                            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
                        }
                    }
                }
            }
        }
    }else{
        if($Referensi=="Transaksi"){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%'"));
        }else{
            if($Referensi=="Simpanan"){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM simpanan WHERE nama like '%$keyword%' OR tanggal like '%$keyword%' OR kategori like '%$keyword%' OR keterangan like '%$keyword%' OR jumlah like '%$keyword%'"));
            }else{
                if($Referensi=="Pinjaman"){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE tanggal_pinjaman like '%$keyword%' OR tanggal_input like '%$keyword%' OR nama like '%$keyword%' OR jumlah_pinjaman like '%$keyword%' OR nilai_angsuran like '%$keyword%' OR periode_angsuran like '%$keyword%' OR status like '%$keyword%'"));
                }else{
                    if($Referensi=="Angsuran"){
                        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE tanggal like '%$keyword%' OR kategori_angsuran like '%$keyword%' OR jumlah like '%$keyword%'"));
                    }else{
                        if($Referensi=="Bagi Hasil"){
                            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_session WHERE sesi_shu like '%$keyword%' OR periode_hitung1 like '%$keyword%' OR periode_hitung2 like '%$keyword%' OR jasa_modal like '%$keyword%' OR jasa_usaha like '%$keyword%' OR status like '%$keyword%'"));
                        }else{
                            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%'"));
                        }
                    }
                }
            }
        }
        
    }
?>
<script>
    //ketika klik next
    $('#NextPageTransaksi').click(function() {
        var valueNext=$('#NextPageTransaksi').val();
        var Referensi="<?php echo "$Referensi"; ?>";
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Jurnal/TabelTransaksi.php',
            method  : "POST",
            data 	:  { page: valueNext, BatasTransaksi: batas, KeywordTransaksi: keyword, OrderBy: OrderBy, ShortBy: ShortBy, Referensi: Referensi },
            success: function (data) {
                $('#FormPilihTransaksi').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPageTransaksi').click(function() {
        var ValuePrev = $('#PrevPageTransaksi').val();
        var Referensi="<?php echo "$Referensi"; ?>";
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : '_Page/Jurnal/TabelTransaksi.php',
            method  : "POST",
            data 	:  { page: ValuePrev, BatasTransaksi: batas, KeywordTransaksi: keyword, OrderBy: OrderBy, ShortBy: ShortBy, Referensi: Referensi },
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
            var Referensi="<?php echo "$Referensi"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : '_Page/Jurnal/TabelTransaksi.php',
                method  : "POST",
                data 	:  { page: PageNumber, BatasTransaksi: batas, KeywordTransaksi: keyword, OrderBy: OrderBy, ShortBy: ShortBy, Referensi: Referensi },
                success: function (data) {
                    $('#FormPilihTransaksi').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row mb-3">
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
                            <b>Keterangan</b>
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
                            echo '      Data Belum Ada/Tidak Ditemukan';
                            echo '  </td>';
                            echo '</tr>';
                        }else{
                            $no = 1+$posisi;
                            if(empty($keyword)){
                                if($Referensi=="Transaksi"){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    if($Referensi=="Simpanan"){
                                        $query = mysqli_query($Conn, "SELECT*FROM simpanan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        if($Referensi=="Pinjaman"){
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            if($Referensi=="Angsuran"){
                                                $query = mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                            }else{
                                                if($Referensi=="Bagi Hasil"){
                                                    $query = mysqli_query($Conn, "SELECT*FROM shu_session ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }
                                            }
                                        }
                                    }
                                }
                            }else{
                                if($Referensi=="Transaksi"){
                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    if($Referensi=="Simpanan"){
                                        $query = mysqli_query($Conn, "SELECT*FROM simpanan WHERE nama like '%$keyword%' OR tanggal like '%$keyword%' OR kategori like '%$keyword%' OR keterangan like '%$keyword%' OR jumlah like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        if($Referensi=="Pinjaman"){
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman WHERE tanggal_pinjaman like '%$keyword%' OR tanggal_input like '%$keyword%' OR nama like '%$keyword%' OR jumlah_pinjaman like '%$keyword%' OR nilai_angsuran like '%$keyword%' OR periode_angsuran like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            if($Referensi=="Angsuran"){
                                                $query = mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE tanggal like '%$keyword%' OR kategori_angsuran like '%$keyword%' OR jumlah like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                            }else{
                                                if($Referensi=="Bagi Hasil"){
                                                    $query = mysqli_query($Conn, "SELECT*FROM shu_session WHERE sesi_shu like '%$keyword%' OR periode_hitung1 like '%$keyword%' OR periode_hitung2 like '%$keyword%' OR jasa_modal like '%$keyword%' OR jasa_usaha like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }else{
                                                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR kategori like '%$keyword%' OR metode like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                                }
                                            }
                                        }
                                    }
                                }
                                
                            }
                            while ($data = mysqli_fetch_array($query)) {
                                if($Referensi=="Transaksi"){
                                    $IdReferensi= $data['id_transaksi'];
                                    $Tanggal= $data['tanggal'];
                                    $Keterangan= $data['kategori'];
                                    $Nominal= $data['tagihan'];
                                    $Nominal = "Rp " . number_format($Nominal,0,',','.');
                                }else{
                                    if($Referensi=="Simpanan"){
                                        $IdReferensi= $data['id_simpanan'];
                                        $Tanggal= $data['tanggal'];
                                        $kategori= $data['kategori'];
                                        $nama= $data['nama'];
                                        $Keterangan= "$kategori <b>$nama</b>";
                                        $Nominal= $data['jumlah'];
                                        $Nominal = "Rp " . number_format($Nominal,0,',','.');
                                    }else{
                                        if($Referensi=="Pinjaman"){
                                            $IdReferensi= $data['id_pinjaman'];
                                            $Tanggal= $data['tanggal_pinjaman'];
                                            $Keterangan= $data['nama'];
                                            $Nominal= $data['jumlah_pinjaman'];
                                            $Nominal = "Rp " . number_format($Nominal,0,',','.');
                                        }else{
                                            if($Referensi=="Angsuran"){
                                                $IdReferensi= $data['id_pinjaman_angsuran'];
                                                $Tanggal= $data['tanggal'];
                                                $Keterangan= $data['kategori_angsuran'];
                                                $Nominal= $data['jumlah'];
                                                $Nominal = "Rp " . number_format($Nominal,0,',','.');
                                            }else{
                                                if($Referensi=="Bagi Hasil"){
                                                    $IdReferensi= $data['id_shu_session'];
                                                    $Tanggal= $data['periode_hitung1'];
                                                    $Keterangan= $data['status'];
                                                    $Nominal= $data['alokasi_nyata'];
                                                    $Nominal = "Rp " . number_format($Nominal,0,',','.');
                                                }else{
                                                    $IdReferensi= $data['id_transaksi'];
                                                    $Tanggal= $data['tanggal'];
                                                    $Keterangan= $data['kategori'];
                                                    $Nominal= $data['tagihan'];
                                                    $Nominal = "Rp " . number_format($Nominal,0,',','.');
                                                }
                                            }
                                        }
                                    }
                                }
                        ?>
                    <tr>
                        <td class="text-center text-xs">
                            <small><?php echo "$no";?></small>
                        </td>
                        <td class="text-left" align="left">
                            <small><?php echo "$Tanggal";?></small>
                        </td>
                        <td class="text-left" align="left">
                            <small><?php echo "$Keterangan";?></small>
                        </td>
                        <td class="text-riht" align="riht">
                            <small><?php echo "$Nominal";?></small>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-info btn-sm btn-floating" data-bs-toggle="modal" data-bs-target="#ModalTambahJurnal" data-id="<?php echo "$IdReferensi,$Referensi"; ?>">
                                <i class="bi bi-check"></i>
                            </button>  
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