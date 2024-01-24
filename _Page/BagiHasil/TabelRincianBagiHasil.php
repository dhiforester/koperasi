<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //id_shu_session
    if(empty($_POST['id_shu_session'])){
        echo '<div class="card-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12">';
        echo '          ID Sessi Bagi Hasil Tidak Boleh Kosong';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
        //keyword
        if(!empty($_POST['KeywordRincian'])){
            $keyword=$_POST['KeywordRincian'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['BatasRincian'])){
            $batas=$_POST['BatasRincian'];
        }else{
            $batas="10";
        }
        //ShortBy
        $ShortBy="ASC";
        //OrderBy
        $OrderBy="nama_anggota";
        //Atur Page
        if(!empty($_POST['PageRincian'])){
            $page=$_POST['PageRincian'];
            $posisi = ( $page - 1 ) * $batas;
        }else{
            $page="1";
            $posisi = 0;
        }
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE (id_shu_session='$id_shu_session') AND (nama_anggota like '%$keyword%' OR simpanan like '%$keyword%' OR pinjaman like '%$keyword%' OR penjualan like '%$keyword%' OR jasa_simpanan like '%$keyword%' OR jasa_pinjaman like '%$keyword%' OR jasa_penjualan like '%$keyword%' OR shu like '%$keyword%')"));
        }
        $SumModalAnggota = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(simpanan) AS simpanan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $modal_anggota2 = $SumModalAnggota['simpanan'];
        $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(pinjaman) AS pinjaman FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $jumlah_pinjaman2 = $SumPinjaman['pinjaman'];
        $SumPenjualan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(penjualan) AS penjualan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $jumlah_penjualan2 = $SumPenjualan['penjualan'];
        $SumJasaSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_simpanan) AS jasa_simpanan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $jasa_modal_anggota2 = $SumJasaSimpanan['jasa_simpanan'];
        $SumJasaPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_pinjaman) AS jasa_pinjaman FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $jasa_pinjaman2 = $SumJasaPinjaman['jasa_pinjaman'];
        $SumJasaPenjualan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jasa_penjualan) AS jasa_penjualan FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $laba_penjualan2 = $SumJasaPenjualan['jasa_penjualan'];
        $SumAlokasiNyata = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(shu) AS shu FROM shu_rincian WHERE id_shu_session='$id_shu_session'"));
        $alokasi_nyata2 = $SumAlokasiNyata['shu'];
        $modal_anggota2 = "Rp " . number_format($modal_anggota2,0,',','.');
        $jumlah_penjualan2 = "Rp " . number_format($jumlah_penjualan2,0,',','.');
        $jumlah_pinjaman2 = "Rp " . number_format($jumlah_pinjaman2,0,',','.');
        $jasa_modal_anggota2 = "Rp " . number_format($jasa_modal_anggota2,0,',','.');
        $laba_penjualan2 = "Rp " . number_format($laba_penjualan2,0,',','.');
        $jasa_pinjaman2 = "Rp " . number_format($jasa_pinjaman2,0,',','.');
        $alokasi_nyata2 = "Rp " . number_format($alokasi_nyata2,0,',','.');
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var id_shu_session="<?php echo "$id_shu_session"; ?>";
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/BagiHasil/TabelRincianBagiHasil.php",
            method  : "POST",
            data 	:  { PageRincian: valueNext, BatasRincian: batas, KeywordRincian: keyword, id_shu_session: id_shu_session },
            success: function (data) {
                $('#MenampilkanTabelRincianBagiHasil').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var id_shu_session="<?php echo "$id_shu_session"; ?>";
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/BagiHasil/TabelRincianBagiHasil.php",
            method  : "POST",
            data 	:  { PageRincian: ValuePrev, BatasRincian: batas, KeywordRincian: keyword, id_shu_session: id_shu_session },
            success : function (data) {
                $('#MenampilkanTabelRincianBagiHasil').html(data);
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
            var id_shu_session="<?php echo "$id_shu_session"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/BagiHasil/TabelRincianBagiHasil.php",
                method  : "POST",
                data 	:  { PageRincian: PageNumber, BatasRincian: batas, KeywordRincian: keyword, id_shu_session: id_shu_session },
                success: function (data) {
                    $('#MenampilkanTabelRincianBagiHasil').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Nama Anggota</b>
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
                                <b>Bagi Hasil</b>
                            </th>
                            <th class="text-center">
                                <b>Opsi</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="6">';
                                echo '      <span class="text-danger">Belum Memiliki Data Anggota</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE id_shu_session='$id_shu_session' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM shu_rincian WHERE (id_shu_session='$id_shu_session') AND (nama_anggota like '%$keyword%' OR simpanan like '%$keyword%' OR pinjaman like '%$keyword%' OR penjualan like '%$keyword%' OR jasa_simpanan like '%$keyword%' OR jasa_pinjaman like '%$keyword%' OR jasa_penjualan like '%$keyword%' OR shu like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_shu_rincian= $data['id_shu_rincian'];
                                    $id_anggota= $data['id_anggota'];
                                    $nama_anggota= $data['nama_anggota'];
                                    $simpanan= $data['simpanan'];
                                    $pinjaman= $data['pinjaman'];
                                    $penjualan= $data['penjualan'];
                                    $jasa_simpanan= $data['jasa_simpanan'];
                                    $jasa_pinjaman= $data['jasa_pinjaman'];
                                    $jasa_penjualan= $data['jasa_penjualan'];
                                    $shu= $data['shu'];
                                    //Format Rupiah
                                    $simpanan = "" . number_format($simpanan,0,',','.');
                                    $pinjaman = "" . number_format($pinjaman,0,',','.');
                                    $penjualan = "" . number_format($penjualan,0,',','.');
                                    $jasa_simpanan = "" . number_format($jasa_simpanan,0,',','.');
                                    $jasa_pinjaman = "" . number_format($jasa_pinjaman,0,',','.');
                                    $jasa_penjualan = "" . number_format($jasa_penjualan,0,',','.');
                                    $shu = "" . number_format($shu,0,',','.');
                                    //Data Anggota
                                    $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                                    $DataAnggota = mysqli_fetch_array($QryAnggota);
                                    $tanggal_masuk= $DataAnggota['tanggal_masuk'];
                                    $strtotime=strtotime($tanggal_masuk);
                                    $TanggalMasuk=date('d/m/Y',$strtotime);
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left" align="left">
                                    <b>
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailRincian" data-id="<?php echo "$id_shu_rincian"; ?>" title="Detail Data Rincian">
                                            <?php echo "$nama_anggota";?>
                                        </a>
                                    </b>
                                    <br>
                                    <small class="credit" title="Tanggal Masuk">
                                        <?php 
                                            echo "<i class='bi bi-calendar'></i> $TanggalMasuk";
                                        ?>
                                    </small>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo "<b title='Jumlah Simpanan'><i class='bi bi-cash-coin'></i> $simpanan </b><br>";
                                        echo "<small title='Jasa Simpanan'><i class='bi bi-wallet'></i> $jasa_simpanan </small>";
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo "<b title='Jumlah Pinjaman'><i class='bi bi-cash-coin'></i> $pinjaman </b><br>";
                                        echo "<small title='Jasa Pinjaman'><i class='bi bi-wallet'></i> $jasa_pinjaman </small>";
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo "<b title='Jumlah Penjualan'><i class='bi bi-cash-coin'></i> $penjualan </b><br>";
                                        echo "<small title='Jasa Penjualan'><i class='bi bi-wallet'></i> $jasa_penjualan </small>";
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        echo "<b title='Bagi Hasil'><i class='bi bi-cash-coin'></i> $shu </b>";
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditRincian" data-id="<?php echo "$id_shu_rincian,$id_shu_session,$keyword,$batas,$page"; ?>" title="Edit Data Rincian Bagi Hasil">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>  
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteRincian" data-id="<?php echo "$id_shu_rincian,$id_shu_session,$keyword,$batas,$page"; ?>" title="Hapus Data Rincian Bagi Hasil">
                                            <i class="bi bi-x"></i>
                                        </button>  
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $no++; }}
                            ?>
                            
                    </tbody>
                    <tfooter>
                        <tr>
                            <td></td>
                            <td><b>JUMLAH</b><br><small><?php echo "$jml_data Record"; ?></small></td>
                            <td align="right">
                                <b><?php echo "$modal_anggota2"; ?></b><br>
                                <small><?php echo "$jasa_modal_anggota2"; ?></small>
                            </td>
                            <td align="right">
                                <b><?php echo "$jumlah_pinjaman2"; ?></b><br>
                                <small><?php echo "$jasa_pinjaman2"; ?></small>
                            </td>
                            <td align="right">
                                <b><?php echo "$jumlah_penjualan2"; ?></b><br>
                                <small><?php echo "$laba_penjualan2"; ?></small>
                            </td>
                            <td align="right">
                                <b><?php echo "$alokasi_nyata2"; ?></b><br>
                            </td>
                            <td></td>
                        </tr>
                    </tfooter>
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