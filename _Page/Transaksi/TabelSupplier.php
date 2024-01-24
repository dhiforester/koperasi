<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //keyword
    if(!empty($_POST['PencarianSupplier'])){
        $keyword=$_POST['PencarianSupplier'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['JumlahDataSupplier'])){
        $batas=$_POST['JumlahDataSupplier'];
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
        $OrderBy="id_supplier";
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
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM supplier WHERE nama_supplier like '%$keyword%' OR alamat_supplier like '%$keyword%' OR email_supplier like '%$keyword%' OR kontak_supplier like '%$keyword%'"));
    }
?>
<script>
    //ketika klik next
    $('#NextPageSupplier').click(function() {
        var valueNext=$('#NextPageSupplier').val();
        var PencarianSupplier = $('#PencarianSupplier').val();
        var JumlahDataSupplier = $('#JumlahDataSupplier').val();
        $('#MenampilkanTabelSupplier').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelSupplier.php',
            data        : {page: valueNext, PencarianSupplier: PencarianSupplier, JumlahDataSupplier: JumlahDataSupplier},
            success     : function(data){
                $('#MenampilkanTabelSupplier').html(data);
            }
        });
    });
    //Ketika klik Previous
    $('#PrevPageSupplier').click(function() {
        var ValuePrev = $('#PrevPageSupplier').val();
        var PencarianSupplier = $('#PencarianSupplier').val();
        var JumlahDataSupplier = $('#JumlahDataSupplier').val();
        $('#MenampilkanTabelSupplier').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Transaksi/TabelSupplier.php',
            data        : {page: ValuePrev, PencarianSupplier: PencarianSupplier, JumlahDataSupplier: JumlahDataSupplier},
            success     : function(data){
                $('#MenampilkanTabelSupplier').html(data);
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
        $('#PageNumberSupplier<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumberSupplier<?php echo $i;?>').val();
            var PencarianSupplier = $('#PencarianSupplier').val();
            var JumlahDataSupplier = $('#JumlahDataSupplier').val();
            $('#MenampilkanTabelSupplier').html("Loading...");
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Transaksi/TabelSupplier.php',
                data        : {page: PageNumber, PencarianSupplier: PencarianSupplier, JumlahDataSupplier: JumlahDataSupplier},
                success     : function(data){
                    $('#MenampilkanTabelSupplier').html(data);
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
                                <b>Nama Supplier</b>
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
                                    $query = mysqli_query($Conn, "SELECT*FROM supplier ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM supplier WHERE nama_supplier like '%$keyword%' OR alamat_supplier like '%$keyword%' OR email_supplier like '%$keyword%' OR kontak_supplier like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_supplier= $data['id_supplier'];
                                    $nama_supplier= $data['nama_supplier'];
                                    if(empty($data['alamat_supplier'])){
                                        $alamat_supplier='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $alamat_supplier= $data['alamat_supplier'];
                                    }
                                    if(empty($data['email_supplier'])){
                                        $email_supplier='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $email_supplier= $data['email_supplier'];
                                    }
                                    if(empty($data['kontak_supplier'])){
                                        $kontak_supplier='<span class="text-danger">Tidak Ada</span>';
                                    }else{
                                        $kontak_supplier= $data['kontak_supplier'];
                                    }
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "<small>$no</small>" ?>
                                </td>
                                <td class="text-xs" >
                                    <?php echo "<small>$nama_supplier</small>" ?>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-info btn-sm btn-floating" data-bs-toggle="modal" data-bs-target="#ModalPilihSupplier" data-id="<?php echo "$id_supplier"; ?>">
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
        <button class="btn btn-sm btn-outline-info" id="PrevPageSupplier" value="<?php echo $prev;?>">
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
                    echo '<button class="btn btn-sm btn-info" id="PageNumberSupplier'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                }else{
                    echo '<button class="btn btn-sm btn-outline-info" id="PageNumberSupplier'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                }
            }
        ?>
        <button class="btn btn-sm btn-outline-info" id="NextPageSupplier" value="<?php echo $next;?>">
            <span aria-hidden="true">»</span>
        </button>
    </div>
</div>