<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //keyword
    if(!empty($_POST['PencarianAnggota'])){
        $keyword=$_POST['PencarianAnggota'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['JumlahDataAnggota'])){
        $batas=$_POST['JumlahDataAnggota'];
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
        $OrderBy="id_anggota";
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
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM anggota WHERE tanggal_masuk like '%$keyword%' OR nip like '%$keyword%' OR nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR status like '%$keyword%'"));
    }
?>
<script>
    //ketika klik next
    $('#NextPagePasien').click(function() {
        var valueNext=$('#NextPagePasien').val();
        var PencarianAnggota = $('#PencarianAnggota').val();
        var JumlahDataAnggota = $('#JumlahDataAnggota').val();
        $('#MenampilkanTabelAnggota').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelAnggota.php',
            data        : {page: valueNext, PencarianAnggota: PencarianAnggota, JumlahDataAnggota: JumlahDataAnggota},
            success     : function(data){
                $('#MenampilkanTabelAnggota').html(data);
            }
        });
    });
    //Ketika klik Previous
    $('#PrevPagePasien').click(function() {
        var ValuePrev = $('#PrevPagePasien').val();
        var PencarianAnggota = $('#PencarianAnggota').val();
        var JumlahDataAnggota = $('#JumlahDataAnggota').val();
        $('#MenampilkanTabelAnggota').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelAnggota.php',
            data        : {page: ValuePrev, PencarianAnggota: PencarianAnggota, JumlahDataAnggota: JumlahDataAnggota},
            success     : function(data){
                $('#MenampilkanTabelAnggota').html(data);
            }
        });
    });
    <?php 
        $JmlHalaman =ceil($jml_data/$batas); 
        $a=1;
        $b=$JmlHalaman;
        for ( $i =$a; $i<=$b; $i++ ){
    ?>
        //ketika klik page number
        $('#PageNumberPasien<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumberPasien<?php echo $i;?>').val();
            var PencarianAnggota = $('#PencarianAnggota').val();
            var JumlahDataAnggota = $('#JumlahDataAnggota').val();
            $('#MenampilkanTabelAnggota').html("Loading...");
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Transaksi/TabelAnggota.php',
                data        : {page: PageNumber, PencarianAnggota: PencarianAnggota, JumlahDataAnggota: JumlahDataAnggota},
                success     : function(data){
                    $('#MenampilkanTabelAnggota').html(data);
                }
            });
        });
    <?php } ?>
</script>
<div class="card-body p-0">
    <div class="row mt-4">
        <div class="col-md-12 p-0" style="height: 350px; overflow-y: scroll;">
            <div class="table-responsive p-0">
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
                                <b>Option</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td class="text-center text-danger" colspan="6">No Data</td>';
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
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "<small>$no</small>" ?>
                                </td>
                                <td class="text-xs" >
                                    <?php echo "<small>$nama</small>" ?>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-info btn-sm btn-floating" data-bs-toggle="modal" data-bs-target="#ModalPilihAnggota" data-id="<?php echo "$id_anggota"; ?>">
                                        <i class="bi bi-check"></i>
                                    </button>  
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
        <button class="btn btn-sm btn-outline-info" id="PrevPagePasien" value="<?php echo $prev;?>">
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
                    echo '<button class="btn btn-sm btn-info" id="PageNumberPasien'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                }else{
                    echo '<button class="btn btn-sm btn-outline-info" id="PageNumberPasien'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                }
            }
        ?>
        <button class="btn btn-sm btn-outline-info" id="NextPagePasien" value="<?php echo $next;?>">
            <span aria-hidden="true">»</span>
        </button>
    </div>
</div>