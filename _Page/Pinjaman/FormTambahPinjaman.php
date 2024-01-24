<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    //Keyword_by
    $keyword_by="";
    //keyword
    if(!empty($_POST['KeywordAnggota'])){
        $keyword=$_POST['KeywordAnggota'];
    }else{
        $keyword="";
    }
    //batas
    $batas="10";
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
    $OrderBy="id_anggota";
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
    $('#NextPage2').click(function() {
        var valueNext2=$('#NextPage2').val();
        var batas2="<?php echo "$batas"; ?>";
        var keyword2="<?php echo "$keyword"; ?>";
        var keyword_by2="<?php echo "$keyword_by"; ?>";
        var OrderBy2="<?php echo "$OrderBy"; ?>";
        var ShortBy2="<?php echo "$ShortBy"; ?>";
        $('#FormTambahPinjaman').html('Loading..');
        $.ajax({
            url     : "_Page/Pinjaman/FormTambahPinjaman.php",
            method  : "POST",
            data 	:  { page: valueNext2, batas: batas2, KeywordAnggota: keyword2, keyword_by: keyword_by2, OrderBy: OrderBy2, ShortBy: ShortBy2 },
            success: function (data) {
                $('#FormTambahPinjaman').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage2').click(function() {
        var ValuePrev2 = $('#PrevPage2').val();
        var batas2="<?php echo "$batas"; ?>";
        var keyword2="<?php echo "$keyword"; ?>";
        var keyword_by2="<?php echo "$keyword_by"; ?>";
        var OrderBy2="<?php echo "$OrderBy"; ?>";
        var ShortBy2="<?php echo "$ShortBy"; ?>";
        $('#FormTambahPinjaman').html('Loading..');
        $.ajax({
            url     : "_Page/Pinjaman/FormTambahPinjaman.php",
            method  : "POST",
            data 	:  { page: ValuePrev2, batas: batas2, KeywordAnggota: keyword2, keyword_by: keyword_by2, OrderBy: OrderBy2, ShortBy: ShortBy2 },
            success : function (data) {
                $('#FormTambahPinjaman').html(data);
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
        $('#Page2Number<?php echo $i;?>').click(function() {
            var PageNumber2 = $('#Page2Number<?php echo $i;?>').val();
            var batas2="<?php echo "$batas"; ?>";
            var keyword2="<?php echo "$keyword"; ?>";
            var keyword_by2="<?php echo "$keyword_by"; ?>";
            var OrderBy2="<?php echo "$OrderBy"; ?>";
            var ShortBy2="<?php echo "$ShortBy"; ?>";
            $('#FormTambahPinjaman').html('Loading..');
            $.ajax({
                url     : "_Page/Pinjaman/FormTambahPinjaman.php",
                method  : "POST",
                data 	:  { page: PageNumber2, batas: batas2, KeywordAnggota: keyword2, keyword_by: keyword_by2, OrderBy: OrderBy2, ShortBy: ShortBy2 },
                success: function (data) {
                    $('#FormTambahPinjaman').html(data);
                }
            })
        });
    <?php } ?>
    //ketika klik page number
    $('#ProsesCariAnggota').submit(function() {
        var form = $('#ProsesCariAnggota')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Pinjaman/FormTambahPinjaman.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#FormTambahPinjaman').html(data);
            }
        });
    });
</script>
<form action="javascript:void(0);" id="ProsesCariAnggota">
    <div class="row">
        <div class="col-md-10 mb-3">
            <input type="text" name="KeywordAnggota" id="KeywordAnggota" class="form-control" placeholder="Cari Anggota" value="<?php echo "$keyword"; ?>">
        </div>
        <div class="col-md-2 mb-3">
            <button type="submit" class="btn btn-md btn-dark w-100">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
</form>
<div class="row mb-3">
    <div class="col-md-12" style="height: 350px; overflow-y: scroll;">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-items-center mb-0">
                <thead class="">
                    <tr>
                        <th class="text-center">
                            <b>ID</b>
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
                            echo '      <span class="text-danger">Belum Ada Data Anggota</span>';
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
                                <?php echo "$id_anggota" ?>
                            </td>
                            <td class="text-left" align="left">
                                <?php echo "$nama";?>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalPilihAnggota" data-id="<?php echo "$id_anggota"; ?>" title="Pilih Data Anggota">
                                        <i class="bi bi-check"></i> Pilih
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
<div class="row">
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
                        echo '<button class="btn btn-sm btn-info" id="Page2Number'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="Page2Number'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPage2" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>