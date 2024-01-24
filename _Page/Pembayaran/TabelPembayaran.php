<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/SettingPayment.php";
    include "../../_Config/UpdateStatusPembayaran.php";
    include "../../_Config/Session.php";
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
        $OrderBy="id_pembayaran";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE tanggal like '%$keyword%' OR metode like '%$keyword%' OR kategori like '%$keyword%' OR jumlah like '%$keyword%' OR keterangan like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Pembayaran/TabelPembayaran.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelPembayaran').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Pembayaran/TabelPembayaran.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelPembayaran').html(data);
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
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Pembayaran/TabelPembayaran.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPembayaran').html(data);
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
                            <th><b>No</b></th>
                            <th><b>Tanggal</b></th>
                            <th><b>Supplier</b></th>
                            <th><b>Anggota</b></th>
                            <th><b>Petugas</b></th>
                            <th><b>Jumlah</b></th>
                            <th><b>Opsi</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="7">';
                                echo '      Tidak Ada Data pembayaran';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE tanggal like '%$keyword%' OR metode like '%$keyword%' OR kategori like '%$keyword%' OR jumlah like '%$keyword%' OR keterangan like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM transaksi_pembayaran WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_pembayaran = $data['id_pembayaran'];
                                    $id_akses = $data['id_akses'];
                                    $id_anggota = $data['id_anggota'];
                                    $id_supplier = $data['id_supplier'];
                                    $kategori = $data['kategori'];
                                    $tanggal = $data['tanggal'];
                                    $metode = $data['metode'];
                                    $jumlah = $data['jumlah'];
                                    //Format rupiah
                                    $TagihanRp = "Rp " . number_format($jumlah,0,',','.');
                                    $strtotime=strtotime($tanggal);
                                    $tanggal=date('d/m/Y H:i',$strtotime);
                                    //Buka data petugas
                                    if(!empty($data['id_akses'])){
                                        $QryAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                                        $DataAkses = mysqli_fetch_array($QryAkses);
                                        if(empty($DataAkses['nama_akses'])){
                                            $NamaAkses="None";
                                        }else{
                                            $NamaAkses= $DataAkses['nama_akses'];
                                        }
                                    }else{
                                        $NamaAkses="None";
                                    }
                                    //Buka data asnggota
                                    if(!empty($data['id_anggota'])){
                                        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
                                        $DataAnggota = mysqli_fetch_array($QryAnggota);
                                        if(empty($DataAnggota['nama'])){
                                            $NamaAnggota="None";
                                        }else{
                                            $NamaAnggota= $DataAnggota['nama'];
                                        }
                                    }else{
                                        $NamaAnggota="None";
                                    }
                                    //Buka Supplier
                                    if(!empty($data['id_supplier'])){
                                        $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
                                        $DataSupplier = mysqli_fetch_array($QrySupplier);
                                        $NamaSupplier= $DataSupplier['nama_supplier'];
                                    }else{
                                        $NamaSupplier="None";
                                    }
                            ?>
                            <tr tabindex="0" class="table-light">
                                <td class="text-center" align="center"><?php echo "<small>$no</small>";?></td>    
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailPembayaran" data-id="'.$id_pembayaran.'" title="Detail Pembayaran">';
                                        echo "  <b><i class='bi bi-calendar-check'></i> $tanggal</b><br>";
                                        echo '</a>';
                                        echo "<small><i class='bi bi-tag'></i> $kategori</small>";
                                    ?>
                                </td>
                                
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small><i class='bi bi-truck'></i> $NamaSupplier</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small><i class='bi bi-people'></i> $NamaAnggota</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small><i class='bi bi-person-circle'></i> $NamaAkses</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="right">
                                    <?php 
                                        echo "<b>$TagihanRp</b><br>";
                                        echo "<small>$metode</small>";
                                    ?>
                                </td>
                                <td class="text-center" align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success" title="Edit Pembayaran"  data-bs-toggle="modal" data-bs-target="#ModalEditPembayaran" data-id="<?php echo "$id_pembayaran"; ?>">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" title="Hapus Pembayaran"  data-bs-toggle="modal" data-bs-target="#ModalDeletePembayaran" data-id="<?php echo "$id_pembayaran,$keyword,$batas,$ShortBy,$OrderBy,$page,$posisi,$keyword_by"; ?>">
                                            <i class="bi bi-x"></i>
                                        </button>
                                    </div>
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