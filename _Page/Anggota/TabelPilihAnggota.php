<?php
    //koneksi dan session
    date_default_timezone_set("Asia/Jakarta");
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_akses_anggota'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3 ">';
        echo '          ID Akses Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_akses_anggota=$_POST['id_akses_anggota'];
        //keyword
        if(!empty($_POST['KeywordCariAnggota'])){
            $keyword=$_POST['KeywordCariAnggota'];
        }else{
            $keyword="";
        }
        //batas
        if(!empty($_POST['BatasCariAnggota'])){
            $batas=$_POST['BatasCariAnggota'];
        }else{
            $batas="10";
        }
        //ShortBy
        $ShortBy="ASC";
        //OrderBy
        $OrderBy="nama";
        //Atur Page
        if(!empty($_POST['page'])){
            $page=$_POST['page'];
            $posisi = ( $page - 1 ) * $batas;
        }else{
            $page="1";
            $posisi = 0;
        }
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE tanggal_masuk like '%$keyword%' OR nip like '%$keyword%' OR nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR status like '%$keyword%'"));
        }
?>
    <script>
        //ketika klik next
        $('#NextPageCari').click(function() {
            var valueNext=$('#NextPageCari').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var id_akses_anggota="<?php echo "$id_akses_anggota"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPilihAnggota.php",
                method  : "POST",
                data 	:  { page: valueNext, BatasCariAnggota: batas, KeywordCariAnggota: keyword, id_akses_anggota: id_akses_anggota },
                success: function (data) {
                    $('#TabelPilihAnggota').html(data);
                }
            })
        });
        //Ketika klik Previous
        $('#PrevPageCari').click(function() {
            var ValuePrev = $('#PrevPageCari').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var id_akses_anggota="<?php echo "$id_akses_anggota"; ?>";
            $.ajax({
                url     : "_Page/Anggota/TabelPilihAnggota.php",
                method  : "POST",
                data 	:  { page: ValuePrev, BatasCariAnggota: batas, KeywordCariAnggota: keyword, id_akses_anggota: id_akses_anggota },
                success : function (data) {
                    $('#TabelPilihAnggota').html(data);
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
            $('#PageNumberCari<?php echo $i;?>').click(function() {
                var PageNumber = $('#PageNumberCari<?php echo $i;?>').val();
                var batas="<?php echo "$batas"; ?>";
                var keyword="<?php echo "$keyword"; ?>";
                var id_akses_anggota="<?php echo "$id_akses_anggota"; ?>";
                $.ajax({
                    url     : "_Page/Anggota/TabelPilihAnggota.php",
                    method  : "POST",
                    data 	:  { page: PageNumber, BatasCariAnggota: batas, KeywordCariAnggota: keyword, id_akses_anggota: id_akses_anggota },
                    success: function (data) {
                        $('#TabelPilihAnggota').html(data);
                    }
                })
            });
        <?php } ?>
    </script>
    <div class="row mt-3">
        <div class="col-md-12 text-center" style="height: 350px; overflow-y: scroll;">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Anggota</b>
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
                                echo '  <td colspan="3">';
                                echo '      <span class="text-danger">Belum Ada Permintaan Akses Anggota</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM anggota ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM anggota WHERE tanggal_masuk like '%$keyword%' OR nip like '%$keyword%' OR nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_anggota= $data['id_anggota'];
                                    $tanggal_masuk= $data['tanggal_masuk'];
                                    if(empty($data['nip'])){
                                        $nip='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $nip= $data['nip'];
                                    }
                                    
                                    $nama= $data['nama'];
                                    if(empty($data['email'])){
                                        $email='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $email= $data['email'];
                                    }
                                    if(empty($data['kontak'])){
                                        $kontak='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $kontak= $data['kontak'];
                                    }
                                    $image= $data['image'];
                                    $status= $data['status'];
                                    $strtotime=strtotime($tanggal_masuk);
                                    $TanggalMasuk=date('d/m/Y',$strtotime);
                                    if($status=="Active"){
                                        $LabelStatus='<span class="badge bg-success">Active</span>';
                                    }else{
                                        $LabelStatus='<span class="badge bg-danger">'.$status.'</span>';
                                    }
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo '<small>';
                                        echo "$no";
                                        echo '</small>';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<small class="credit">';
                                        echo "  <b>$nama</b><br>";
                                        echo "  <small>$TanggalMasuk</small>";
                                        echo '</small>';
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHubungkanAnggota" data-id="<?php echo "$id_anggota,$id_akses_anggota"; ?>" title="Hubungkan Akses Anggota">
                                            <i class="bi bi-check"></i>
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
    <div class="row mt-3">
        <div class="col-md-12">
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
                <button class="btn btn-sm btn-outline-info" id="PrevPageCari" value="<?php echo $prev;?>">
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
                            echo '<button class="btn btn-sm btn-info" id="PageNumberCari'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }else{
                            echo '<button class="btn btn-sm btn-outline-info" id="PageNumberCari'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }
                    }
                ?>
                <button class="btn btn-sm btn-outline-info" id="NextPageCari" value="<?php echo $next;?>">
                    <span aria-hidden="true">»</span>
                </button>
            </div>
        </div>
    </div>
<?php } ?>