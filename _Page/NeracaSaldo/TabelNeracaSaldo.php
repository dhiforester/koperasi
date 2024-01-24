<?php
    //koneksi dan session
    //ini_set("display_errors","off");
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Periode Waktu
    if(empty($_POST['periode1'])){
        echo '<div class="card-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center">';
        echo '          <div class="alert alert-danger" role="alert">';
        echo '              Anda Belum Mengisi Periode Awal';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        if(empty($_POST['periode2'])){
            echo '<div class="card-body">';
            echo '  <div class="row">';
            echo '      <div class="col-md-12 text-center">';
            echo '          <div class="alert alert-danger" role="alert">';
            echo '              Anda Belum Mengisi Periode Akhir';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $periode1=$_POST['periode1'];
            $periode2=$_POST['periode2'];
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
                $ShortBy="ASC";
                $NextShort="DESC";
            }
            //OrderBy
            if(!empty($_POST['OrderBy'])){
                $OrderBy=$_POST['OrderBy'];
            }else{
                $OrderBy="kode";
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
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akun_perkiraan"));
            }else{
                $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE nama like '%$keyword%' OR name like '%$keyword%' OR saldo_normal like '%$keyword%'"));
            }
?>
    <script>
        //ketika klik next
        $('#NextPage').click(function() {
            var valueNext=$('#NextPage').val();
            var batas=$('#batas').val();
            var periode1=$('#periode1').val();
            var periode2=$('#periode2').val();
            var id_mitra=$('#id_mitra').val();
            $.ajax({
                url     : "_Page/NeracaSaldo/TabelNeracaSaldo.php",
                method  : "POST",
                data 	:  { page: valueNext, batas: batas, periode1: periode1, periode2: periode2, id_mitra: id_mitra },
                success: function (data) {
                    $('#MenampilkanTabelNeracaSaldo').html(data);
                }
            })
        });
        //Ketika klik Previous
        $('#PrevPage').click(function() {
            var ValuePrev = $('#PrevPage').val();
            var batas=$('#batas').val();
            var periode1=$('#periode1').val();
            var periode2=$('#periode2').val();
            var id_mitra=$('#id_mitra').val();
            $.ajax({
                url     : "_Page/NeracaSaldo/TabelNeracaSaldo.php",
                method  : "POST",
                data 	:  { page: ValuePrev, batas: batas, periode1: periode1, periode2: periode2, id_mitra: id_mitra },
                success : function (data) {
                    $('#MenampilkanTabelNeracaSaldo').html(data);
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
                var batas=$('#batas').val();
                var periode1=$('#periode1').val();
                var periode2=$('#periode2').val();
                var id_mitra=$('#id_mitra').val();
                $.ajax({
                    url     : "_Page/NeracaSaldo/TabelNeracaSaldo.php",
                    method  : "POST",
                    data 	:  { page: PageNumber, batas: batas, periode1: periode1, periode2: periode2, id_mitra: id_mitra },
                    success: function (data) {
                        $('#MenampilkanTabelNeracaSaldo').html(data);
                    }
                })
            });
        <?php } ?>
    </script>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th><b class="sub-title">No</b></th>
                        <th><b class="sub-title">Kode</b></th>
                        <th><b class="sub-title">Akun Perkiraan</b></th>
                        <th><b class="sub-title">SN</b></th>
                        <th><b class="sub-title">Debet</b></th>
                        <th><b class="sub-title">Kredit</b></th>
                        <th><b class="sub-title">Saldo</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1+$posisi;
                        //KONDISI PENGATURAN MASING FILTER
                        if(empty($keyword)){
                            $query = mysqli_query($Conn, "SELECT*FROM akun_perkiraan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                        }else{
                            $query = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE nama like '%$keyword%' OR name like '%$keyword%' OR saldo_normal like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                        }
                        while ($data = mysqli_fetch_array($query)) {
                            $id_perkiraan = $data['id_perkiraan'];
                            $kode_perkiraan = $data['kode'];
                            $nama_perkiraan = $data['nama'];
                            $level_perkiraan= $data['level'];
                            $saldo_normal= $data['saldo_normal'];
                            $status= $data['status'];
                            //WARNA TEXT
                            if($saldo_normal=='Kredit'){
                                $LabelSaldo="<b class='text-danger'>K</b>";
                            }else{
                                $LabelSaldo="<b class='text-info'>D</b>";
                            }
                            //menghitung jumlah anak
                            if($level_perkiraan=='1'){
                                $jml_anak_akun="2";
                            }else{
                                $jml_anak_akun = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM akun_perkiraan WHERE kd$level_perkiraan='$kode_perkiraan' AND level>'$level_perkiraan'"));
                            }
                            //Mengatur warna tabel
                            if($level_perkiraan=="1"){
                                $ClassTabel="table-primary";
                            }else{
                                if($level_perkiraan=="2"){
                                    $ClassTabel="table-info";
                                }else{
                                    if($level_perkiraan=="3"){
                                        $ClassTabel="table-secondary";
                                    }else{
                                        $ClassTabel="table-light";
                                    }
                                }
                            }
                        ?>
                            <tr class="table-light" data-toggle="modal" data-target="#ModalDetailAkun" data-id="<?php echo "$id_perkiraan";?>">
                                <td><?php echo "$no";?></td>    
                                <td class="" align="left">
                                    <?php 
                                        for ( $i = 1; $i<= $level_perkiraan; $i++ ){
                                            echo "&emsp;";
                                        }
                                        if(empty($jml_anak_akun)){
                                            echo "$kode_perkiraan";
                                        }else{
                                            echo "<b>$kode_perkiraan</b>";
                                        }
                                    ?>
                                </td>
                                <td class="">
                                    <?php 
                                        if(empty($jml_anak_akun)){
                                            echo "$nama_perkiraan";
                                        }else{
                                            echo "<b>$nama_perkiraan</b>";
                                        }
                                    ?>
                                </td>
                                <td class=""><?php echo "$LabelSaldo";?></td>
                                <td class="text-right">
                                    <?php
                                        $JumlahDebet=0;
                                        //Araykan semua anak akun ini
                                        $QryAnak = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level_perkiraan='$kode_perkiraan'");
                                        while ($DataAnak = mysqli_fetch_array($QryAnak)) {
                                            $kodePerkiraanAnakAkun = $DataAnak['kode'];
                                            //Hitung Jumlah Debet nilai pada jurnal anak akun
                                            $QryDebet = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE kode_perkiraan='$kodePerkiraanAnakAkun' AND tanggal>='$periode1' AND tanggal<='$periode2' AND d_k='Debet'") or die(mysqli_error($Conn));
                                            $DataDebet = mysqli_fetch_array($QryDebet);
                                            if(empty($DataDebet['nilai'])){
                                                $Debet="0";
                                            }else{
                                                $Debet=$DataDebet['nilai'];
                                            }
                                            $JumlahDebet=$JumlahDebet+$Debet;
                                        }
                                        
                                        $JumlahDebetRp = "" . number_format($JumlahDebet,0,',','.');
                                        echo "$JumlahDebetRp";
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php
                                        $JumlahKredit="0";
                                        //Araykan semua anak akun ini
                                        $QryAnak = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level_perkiraan='$kode_perkiraan'");
                                        while ($DataAnak = mysqli_fetch_array($QryAnak)) {
                                            $kodePerkiraanAnakAkun = $DataAnak['kode'];
                                            //Hitung Jumlah Debet nilai pada jurnal anak akun
                                            $QryKredit = mysqli_query($Conn, "SELECT SUM(nilai) AS nilai FROM jurnal WHERE kode_perkiraan='$kodePerkiraanAnakAkun' AND tanggal>='$periode1' AND tanggal<='$periode2' AND d_k='Kredit'") or die(mysqli_error($Conn));
                                            $DataKredit = mysqli_fetch_array($QryKredit);
                                            if(empty($DataKredit['nilai'])){
                                                $Kredit="0";
                                            }else{
                                                $Kredit=$DataKredit['nilai'];
                                            }
                                            $JumlahKredit=$JumlahKredit+$Kredit;
                                        }
                                        
                                        $JumlahKreditRp = "" . number_format($JumlahKredit,0,',','.');
                                        echo "$JumlahKreditRp";
                                    ?>
                                </td>
                                <td class="text-right">
                                    <?php
                                        if($saldo_normal=="Debet"){
                                            $Saldo=$JumlahDebet-$JumlahKredit;
                                        }else{
                                            $Saldo=$JumlahKredit-$JumlahDebet;
                                        }
                                        $SaldoRp = "" . number_format($Saldo,0,',','.');
                                        echo "<dt>$SaldoRp</dt>";
                                    ?>
                                </td>
                            </tr>
                    <?php
                        $no++; }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="_Page/NeracaSaldo/ProsesCetakNeraca.php?periode1=<?php echo "$periode1"; ?>&periode2=<?php echo "$periode2"; ?>" target="_blank" class="btn btn-md btn-rounded btn-outline-info">Cetak Neraca</a>
            </div>
        </div>
    </div>
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
    <div class="card-footer text-left">
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-info" id="PrevPage" value="<?php echo $prev;?>">
                <i class="bi bi-arrow-left"></i>
            </button>
            <?php 
                //Navigasi nomor
                if($JmlHalaman>5){
                    if($page>=3){
                        $a=$page-2;
                        $b=$page+2;
                        if($JmlHalaman<=$b){
                            $a=$page-2;
                            $b=$JmlHalaman;
                        }
                    }else{
                        $a=1;
                        $b=$page+2;
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
                        echo '<button type="button" class="btn btn-sm btn-primary" id="PageNumber'.$i.'" value="'.$i.'">';
                    }else{
                        echo '<button type="button" class="btn btn-sm btn-info" id="PageNumber'.$i.'" value="'.$i.'">';
                    }
                    echo ''.$i.'';
                    echo '</button>';
                }
            ?>
            <button type="button" class="btn btn-sm btn-info" id="NextPage" value="<?php echo $next;?>">
                <i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </div>
<?php
        }
    }
?>