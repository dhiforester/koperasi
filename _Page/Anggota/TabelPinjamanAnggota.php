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
        $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM pinjaman WHERE id_anggota='$id_anggota'"));
        $JumlahPinjaman = $SumPinjaman['jumlah_pinjaman'];
        $JumlahPinjaman = "" . number_format($JumlahPinjaman,0,',','.');
        //KeywordByPinjaman
        if(!empty($_POST['KeywordByPinjaman'])){
            $keyword_by=$_POST['KeywordByPinjaman'];
        }else{
            $keyword_by="";
        }
        //KeywordPinjaman
        if(!empty($_POST['KeywordPinjaman'])){
            $keyword=$_POST['KeywordPinjaman'];
        }else{
            $keyword="";
        }
        //BatasPinjaman
        if(!empty($_POST['BatasPinjaman'])){
            $batas=$_POST['BatasPinjaman'];
        }else{
            $batas="10";
        }
        //ShortByPinjaman
        if(!empty($_POST['ShortByPinjaman'])){
            $ShortBy=$_POST['ShortByPinjaman'];
            if($ShortBy=="ASC"){
                $NextShort="DESC";
            }else{
                $NextShort="ASC";
            }
        }else{
            $ShortBy="DESC";
            $NextShort="ASC";
        }
        //OrderByPinjaman
        if(!empty($_POST['OrderByPinjaman'])){
            $OrderBy=$_POST['OrderByPinjaman'];
        }else{
            $OrderBy="id_Pinjaman";
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE (id_anggota='$id_anggota')"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE (id_anggota='$id_anggota') AND (tanggal_pinjaman like '%$keyword%' OR tanggal_input like '%$keyword%' OR nama like '%$keyword%' OR jumlah_pinjaman like '%$keyword%' OR nilai_angsuran like '%$keyword%' OR periode_angsuran like '%$keyword%' OR status like '%$keyword%')"));
            }
        }else{
            if(empty($keyword)){
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE (id_anggota='$id_anggota')"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%')"));
            }
        }
?>
    <script>
        //ketika klik next
        $('#NextPagePinjaman').click(function() {
            var valueNext=$('#NextPagePinjaman').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPinjamanAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: valueNext, BatasPinjaman: batas, KeywordPinjaman: keyword, KeywordByPinjaman: keyword_by, OrderByPinjaman: OrderBy, ShortByPinjaman: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPinjaman').html(data);

                }
            })
        });
        //Ketika klik Previous
        $('#PrevPagePinjaman').click(function() {
            var PrevPagePinjaman=$('#PrevPagePinjaman').val();
            var id_anggota="<?php echo "$id_anggota"; ?>";
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPinjamanAnggota.php",
                method  : "POST",
                data 	:  { id_anggota: id_anggota, page: PrevPagePinjaman, BatasPinjaman: batas, KeywordPinjaman: keyword, KeywordByPinjaman: keyword_by, OrderByPinjaman: OrderBy, ShortByPinjaman: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPinjaman').html(data);

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
            $('#PageNumberPinjaman<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumberPinjaman<?php echo $i;?>').val();
                var id_anggota="<?php echo "$id_anggota"; ?>";
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var keyword_by="<?php echo "$keyword_by"; ?>";
                var OrderBy="<?php echo "$OrderBy"; ?>";
                var ShortBy="<?php echo "$ShortBy"; ?>";
                $.ajax({
                    url     : "_Page/Anggota/TabelPinjamanAnggota.php",
                    method  : "POST",
                    data 	:  { id_anggota: id_anggota, page: PageNumber, BatasPinjaman: batas, KeywordPinjaman: keyword, KeywordByPinjaman: keyword_by, OrderByPinjaman: OrderBy, ShortByPinjaman: ShortBy },
                    success: function (data) {
                        $('#MenampilkanTabelPinjaman').html(data);
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
                                    <b>Nama Anggota</b>
                                </th>
                                <th class="text-center">
                                    <b>Tanggal</b>
                                </th>
                                <th class="text-center">
                                    <b>Pinjaman</b>
                                </th>
                                <th class="text-center">
                                    <b>Angsuran</b>
                                </th>
                                <th class="text-center">
                                    <b>Status</b>
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
                                    echo '  <td colspan="7">';
                                    echo '      <span class="text-danger">Belum Memiliki Data Pinjaman</span>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $no = 1+$posisi;
                                    //KONDISI PENGATURAN MASING FILTER
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman WHERE (id_anggota='$id_anggota') AND (tanggal_pinjaman like '%$keyword%' OR tanggal_input like '%$keyword%' OR nama like '%$keyword%' OR jumlah_pinjaman like '%$keyword%' OR nilai_angsuran like '%$keyword%' OR periode_angsuran like '%$keyword%' OR status like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman WHERE id_anggota='$id_anggota' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman WHERE (id_anggota='$id_anggota') AND ($keyword_by like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_pinjaman= $data['id_pinjaman'];
                                        $id_anggota= $data['id_anggota'];
                                        $id_akses= $data['id_akses'];
                                        $tanggal_pinjaman= $data['tanggal_pinjaman'];
                                        $tanggal_input= $data['tanggal_input'];
                                        $nama= $data['nama'];
                                        $jumlah_pinjaman1= $data['jumlah_pinjaman'];
                                        $persen_jasa= $data['persen_jasa'];
                                        $estimasi_jasa= $data['estimasi_jasa'];
                                        $nilai_angsuran= $data['nilai_angsuran'];
                                        $periode_angsuran= $data['periode_angsuran'];
                                        $token= $data['token'];
                                        $status= $data['status'];
                                        $strotime1=strtotime($tanggal_pinjaman);
                                        $tanggal_pinjaman=date('d/m/Y',$strotime1);
                                        $strotime2=strtotime($tanggal_input);
                                        $tanggal_input=date('d/m/Y',$strotime2);
                                        $jumlah_pinjaman = "" . number_format($jumlah_pinjaman1,0,',','.');
                                        $nilai_angsuran = "" . number_format($nilai_angsuran,0,',','.');
                                        $estimasi_jasa = "" . number_format($estimasi_jasa,0,',','.');
                                        if($status=="Pending"){
                                            $LabelStatus='<span class="badge bg-inf">Pending</span>';
                                        }else{
                                            if($status=="Active"){
                                                $LabelStatus='<span class="badge bg-primary">Active</span>';
                                            }else{
                                                if($status=="Lunas"){
                                                    $LabelStatus='<span class="badge bg-sccess">Active</span>';
                                                }else{
                                                    if($status=="Macet"){
                                                        $LabelStatus='<span class="badge bg-danger">Macet</span>';
                                                    }else{
                                                        $LabelStatus='<span class="badge bg-dark">'.$status.'</span>';
                                                    }
                                                }
                                            }
                                        }
                                        //Buka Anggota
                                        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                                        $DataAnggota = mysqli_fetch_array($QryAnggota);
                                        if(!empty($DataAnggota['email'])){
                                            $email= $DataAnggota['email'];
                                        }else{
                                            $email="No Email";
                                        }
                                        //Buka data akses
                                        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                                        if(empty($DataDetailAkses['nama_akses'])){
                                            $nama_akses='<span class="text-danger">None</span>';
                                        }else{
                                            $nama_akses= $DataDetailAkses['nama_akses'];
                                        }
                                        //Cek Jurnal
                                        $CekJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman='$id_pinjaman'"));
                                        if(!empty($CekJurnal)){
                                            $LabelJurnal='<span class="text-success" title="Tersedia Jurnal"><i class="bi bi-check-circle"></i> Jurnal</span>';
                                        }else{
                                            $LabelJurnal='<span class="text-dark" title="Tidak Tersedia Jurnal"><i class="bi bi-x"></i> None</span>';
                                        }
                                        //Jumlah Angsuran
                                        $JumlahAngsuranBerjalan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Pokok'"));
                                        //Jumlah Total Angsuran
                                        if(!empty($JumlahAngsuranBerjalan)){
                                            $SumAngsuran = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Pokok'"));
                                            $JumlahAngsuran1 = $SumAngsuran['jumlah'];
                                            $JumlahAngsuran = "" . number_format($JumlahAngsuran1,0,',','.');
                                            $SumAngsuranJasa = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' AND kategori_angsuran='Jasa'"));
                                            $JumlahAngsuranJasa = $SumAngsuranJasa['jumlah'];
                                            $JumlahAngsuranJasa = "" . number_format($JumlahAngsuranJasa,0,',','.');
                                            //Sisa Angsuran
                                            $JumlahSisaAngsuran1=$jumlah_pinjaman1-$JumlahAngsuran1;
                                            $JumlahSisaAngsuran = "" . number_format($JumlahSisaAngsuran1,0,',','.');
                                        }else{
                                            $JumlahAngsuran1 =0;
                                            $JumlahAngsuran = "" . number_format($JumlahAngsuran1,0,',','.');
                                            $JumlahAngsuranJasa =0;
                                            $JumlahAngsuranJasa = "" . number_format($JumlahAngsuranJasa,0,',','.');
                                            $JumlahSisaAngsuran1=$jumlah_pinjaman1;
                                            $JumlahSisaAngsuran = "" . number_format($JumlahSisaAngsuran1,0,',','.');
                                        }
                                    ?>
                                <tr>
                                    <td class="text-center text-xs">
                                        <?php echo "$no" ?>
                                    </td>
                                    <td class="text-left" align="left">
                                        <b>
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailPinjaman" data-id="<?php echo "$id_pinjaman"; ?>" title="Detail Data pinjaman">
                                                <?php echo '<i class="bi bi-people"></i> '.$nama.'';?>
                                            </a>
                                        </b>
                                        <br>
                                        <small class="credit">
                                            <?php 
                                                echo "<i class='bi bi-envelope'></i> $email<br>";
                                                echo "<span title='Petugas/User Yang Entry'><i class='bi bi-person-circle'></i> $nama_akses</span><br>";
                                            ?>
                                        </small>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small class="credit">
                                            <?php 
                                                echo "<span title='Tanggal Pinjaman'><i class='bi bi-calendar-check'></i> $tanggal_pinjaman </span><br>";
                                                echo "<span title='Tanggal Input'><i class='bi bi-pencil'></i> $tanggal_input</span>";
                                            ?>
                                        </small>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small class="credit">
                                            <?php 
                                                echo "<b title='Jumlah Pinjaman'><i class='bi bi-cash-coin'></i> $jumlah_pinjaman </b><br>";
                                                echo "<span title='Sisa Pokok'><i class='bi bi-coin'></i> ($JumlahSisaAngsuran)</span><br>";
                                                echo "<span title='Estimasi Jasa'><i class='bi bi-bank'></i> $estimasi_jasa ($persen_jasa%)</span>";
                                            ?>
                                        </small>
                                    </td>
                                    <td class="text-left" align="left">
                                        <small class="credit">
                                            <?php 
                                                echo "<b title='Nilai Angsuran'><i class='bi bi-coin'></i> $nilai_angsuran</b><br>";
                                                echo "<span title='Total Angsuran'><i class='bi bi-cash'></i> ($JumlahAngsuran)</span><br>";
                                                echo "<span title='Periode Angsuran'><i class='bi bi-clock'></i> $JumlahAngsuranBerjalan/$periode_angsuran Rcrd</span>";
                                            ?>
                                        </small>
                                    </td>
                                    <td class="text-center" align="center">
                                        <small class="credit">
                                            <?php 
                                                echo "<b>$LabelStatus</b><br>";
                                                echo "$LabelJurnal";
                                            ?>
                                        </small>
                                        <br>
                                    </td>
                                    <td align="center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditPinjaman" data-id="<?php echo "$id_pinjaman,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Edit Data pinjaman">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>  
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeletePinjaman" data-id="<?php echo "$id_pinjaman,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Data pinjaman">
                                                <i class="bi bi-x"></i>
                                            </button>  
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    $no++; }}
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
            <button class="btn btn-sm btn-outline-info" id="PrevPagePinjaman" value="<?php echo $prev;?>">
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumberPinjaman'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumberPinjaman'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPagePinjaman" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
<?php } ?>