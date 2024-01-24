<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("Asia/Jakarta");
    $tanggal_sekarang=date('Y-m-d');
    //HanyaExpired
    if(!empty($_POST['HanyaExpired'])){
        $HanyaExpired=$_POST['HanyaExpired'];
    }else{
        $HanyaExpired="";
    }
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
        $OrderBy="id_barang_bacth";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if($SessionAkses=="Admin"){
        if($HanyaExpired=="Ya"){
            if(empty($keyword_by)){
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE (kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%' OR no_batch like '%$keyword%' OR expired_date like '%$keyword%' OR qty_batch like '%$keyword%'  OR reminder_date like '%$keyword%' OR status like '%$keyword%') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }
            }else{
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE ($keyword_by like '%$keyword%') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }
            }
        }else{
            if(empty($keyword_by)){
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%' OR no_batch like '%$keyword%' OR expired_date like '%$keyword%' OR qty_batch like '%$keyword%'  OR reminder_date like '%$keyword%' OR status like '%$keyword%'"));
                }
            }else{
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE $keyword_by like '%$keyword%'"));
                }
            }
        }
        //Menghitung barang Expired
        $JumlahExpired = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE expired_date<='$tanggal_sekarang' AND status='Terdaftar'"));
        $JumlahNotifikasi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE reminder_date<='$tanggal_sekarang' AND status='Terdaftar'"));
    }else{
        if($HanyaExpired=="Ya"){
            if(empty($keyword_by)){
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE (id_mitra='$SessionIdMitra') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE (id_mitra='$SessionIdMitra') AND (kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%' OR no_batch like '%$keyword%' OR expired_date like '%$keyword%' OR qty_batch like '%$keyword%'  OR reminder_date like '%$keyword%' OR status like '%$keyword%') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }
            }else{
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE (id_mitra='$SessionIdMitra') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE (id_mitra='$SessionIdMitra') AND ($keyword_by like '%$keyword%') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
                }
            }
        }else{
            if(empty($keyword_by)){
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE id_mitra='$SessionIdMitra'"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE (id_mitra='$SessionIdMitra') AND (kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%' OR no_batch like '%$keyword%' OR expired_date like '%$keyword%' OR qty_batch like '%$keyword%'  OR reminder_date like '%$keyword%' OR status like '%$keyword%')"));
                }
            }else{
                if(empty($keyword)){
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE id_mitra='$SessionIdMitra'"));
                }else{
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE (id_mitra='$SessionIdMitra') AND ($keyword_by like '%$keyword%')"));
                }
            }
        }
        //Menghitung barang Expired
        $JumlahExpired = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE (id_mitra='$SessionIdMitra') AND (expired_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
        $JumlahNotifikasi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth  WHERE (id_mitra='$SessionIdMitra') AND (reminder_date<='$tanggal_sekarang') AND (status='Terdaftar')"));
    }
    
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var HanyaExpired="<?php echo "$HanyaExpired"; ?>";
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/BarangExpired/TabelBarangExpired.php",
            method  : "POST",
            data 	:  { HanyaExpired: HanyaExpired, page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelBarangExpired').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas="<?php echo "$batas"; ?>";
        var HanyaExpired="<?php echo "$HanyaExpired"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/BarangExpired/TabelBarangExpired.php",
            method  : "POST",
            data 	:  { HanyaExpired: HanyaExpired, page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelBarangExpired').html(data);
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
            var HanyaExpired="<?php echo "$HanyaExpired"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/BarangExpired/TabelBarangExpired.php",
                method  : "POST",
                data 	:  { HanyaExpired: HanyaExpired, page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelBarangExpired').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <?php
                // if(empty($HanyaExpired)){
                //     if(!empty($JumlahExpired)||!empty($JumlahNotifikasi)){
                //         echo '<div class="alert alert-danger" role="alert">';
                //         if(!empty($JumlahExpired)&&empty($JumlahNotifikasi)){
                //             echo '  Ada <b>'.$JumlahExpired.'</b> item barang yang telah melewati batas expired. <a href="index.php?Page=BarangExpired&short_expired=Ya">Tampilkan</a>';
                //         }else{
                //             if(!empty($JumlahNotifikasi)&&empty($JumlahExpired)){
                //                 echo '  Ada <b>'.$JumlahNotifikasi.'</b> item barang yang akan melewati batas expired. <a href="index.php?Page=BarangExpired&short_expired=Ya">Tampilkan</a>';
                //             }else{
                //                 echo '  Ada <b>'.$JumlahExpired.'</b> item barang yang telah melewati batas expired.<br>';
                //                 echo '  Ada <b>'.$JumlahNotifikasi.'</b> item barang yang akan melewati batas expired. <br><a href="index.php?Page=BarangExpired&short_expired=Ya">Tampilkan</a>';
                //             }
                //         }
                //         echo '</div>';
                //     }
                // }
            ?>
        </div>
    </div>
    <?php
        // if($HanyaExpired=="Ya"){
        //     echo '<div class="row">';
        //     echo '  <div class="col col-md-12 text-center">';
        //     echo '      Hanya menampilkan data item yang expired. <a href="index.php?Page=BarangExpired">Kembali Ke Semua Data</a>';
        //     echo '  </div>';
        //     echo '</div>';
        // }
    ?>
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
                                <b>Exp/Batch</b>
                            </th>
                            <th class="text-center">
                                <b>Barang</b>
                            </th>
                            <th class="text-center">
                                <b>Qty</b>
                            </th>
                            <th class="text-center">
                                <b>Status</b>
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
                                echo '  <td colspan="7">';
                                echo '      <span class="text-danger">No Data</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if($HanyaExpired=="Ya"){
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE (kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%' OR no_batch like '%$keyword%' OR expired_date like '%$keyword%' OR qty_batch like '%$keyword%'  OR reminder_date like '%$keyword%' OR status like '%$keyword%') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE ($keyword_by like '%$keyword%') AND (expired_date<='$tanggal_sekarang' OR reminder_date<='$tanggal_sekarang') AND (status='Terdaftar') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }
                                }else{
                                    if(empty($keyword_by)){
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE kode_barang like '%$keyword%' OR nama_barang like '%$keyword%' OR satuan like '%$keyword%' OR no_batch like '%$keyword%' OR expired_date like '%$keyword%' OR qty_batch like '%$keyword%'  OR reminder_date like '%$keyword%' OR status like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }else{
                                        if(empty($keyword)){
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }else{
                                            $query = mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                        }
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_barang_bacth= $data['id_barang_bacth'];
                                    $id_barang= $data['id_barang'];
                                    $id_barang_satuan= $data['id_barang_satuan'];
                                    $kode_barang= $data['kode_barang'];
                                    $nama_barang= $data['nama_barang'];
                                    $satuan= $data['satuan'];
                                    $no_batch= $data['no_batch'];
                                    if(empty($data['expired_date'])){
                                        $expired_date="No Data";
                                    }else{
                                        $expired_date= $data['expired_date'];
                                    }
                                    
                                    $qty_batch= $data['qty_batch'];
                                    $reminder_date= $data['reminder_date'];
                                    $status= $data['status'];
                                    if($status=="Terdaftar"){
                                        $LabelStatus='<span class="badge badge-primary">Terdaftar</span>';
                                    }else{
                                        if($status=="Terjual"){
                                            $LabelStatus='<span class="badge badge-success">Terjual</span>';
                                        }else{
                                            if($status=="None"){
                                                $LabelStatus='<span class="badge badge-dark">None</span>';
                                            }else{
                                                if($status==""){
                                                    $LabelStatus='<span class="badge badge-danger">No Status</span>';
                                                }else{
                                                    $LabelStatus='<span class="badge badge-danger">No Status</span>';
                                                }
                                            }
                                        }
                                    }
                                    if($expired_date<=$tanggal_sekarang){
                                        $Kelasbaris='text-danger';
                                    }else{
                                        if($reminder_date<=$tanggal_sekarang){
                                            $Kelasbaris='text-warning';
                                        }else{
                                            $Kelasbaris='text-dark';
                                        }
                                    }
                                    $ExpStrtotime=strtotime($expired_date);
                                    $ExpiredDate=date('d/m/Y',$ExpStrtotime);
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left" align="left">
                                    <b>
                                        <i class="bi bi-calendar"></i>
                                        <a href="javascript:void(0);" class="<?php echo "$Kelasbaris";?>">
                                            <?php echo "$ExpiredDate";?>
                                        </a>
                                    </b><br>
                                    <?php echo '<i class="bi bi-qr-code"></i> '.$no_batch.'';?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<b><i class='bi bi-box'></i> $nama_barang</b><br>";
                                        echo "<small><i class='bi bi-qr-code'></i> $kode_barang</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<b><i class='bi bi-box'></i> $qty_batch $satuan</b><br>";
                                        echo "<i><i class='bi bi-bell'></i> $reminder_date</i>";
                                    ?>
                                </td>
                                <td class="text-center" align="center">
                                    <?php 
                                        echo "$LabelStatus";
                                    ?>
                                </td>
                                <td align="center">  
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditBarangExpired" data-id="<?php echo "$id_barang_bacth,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>  
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteBarangExpired" data-id="<?php echo "$id_barang_bacth,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>">
                                            <i class="bi bi-x"></i>
                                        </button>   
                                    </div>
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