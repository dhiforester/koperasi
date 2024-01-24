<?php
    //koneksi dan session
    ini_set("display_errors","off");
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //keyword
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
    //KeywordBy
    if(!empty($_POST['KeywordBy'])){
        $KeywordBy=$_POST['KeywordBy'];
    }else{
        $KeywordBy="";
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
        $OrderBy="id_jurnal";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($KeywordBy)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE nama_perkiraan like '%$keyword%' OR tanggal like '%$keyword%' OR kode_perkiraan like '%$keyword%' OR nilai like '%$keyword%' OR d_k like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE $KeywordBy like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas=$('#batas').val();
        var keyword=$('#keyword').val();
        $('#MenampilkanTabelJurnal').html('Loading..');
        $.ajax({
            url     : "_Page/Jurnal/TabelJurnal.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword },
            success: function (data) {
                $('#MenampilkanTabelJurnal').html(data);
            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas=$('#batas').val();
        var keyword=$('#keyword').val();
        $('#MenampilkanTabelJurnal').html('Loading..');
        $.ajax({
            url     : "_Page/Jurnal/TabelJurnal.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword },
            success : function (data) {
                $('#MenampilkanTabelJurnal').html(data);
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
            var keyword=$('#keyword').val();
            $('#MenampilkanTabelJurnal').html('Loading..');
            $.ajax({
                url     : "_Page/Jurnal/TabelJurnal.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword },
                success: function (data) {
                    $('#MenampilkanTabelJurnal').html(data);
                }
            })
        });
    <?php } ?>
</script>
<input type="hidden" name="GetPage" id="GetPage" value="<?php echo "$page";?>">
<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th><b>No</b></th>
                            <th><b>Tanggal</b></th>
                            <th><b>Referensi</b></th>
                            <th><b>Kode Akun</b></th>
                            <th><b>Nama Akun</b></th>
                            <th><b>Debet</b></th>
                            <th><b>Kredit</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="7" class="text-center">';
                                echo '      <span class="text-danger">Tidak Ada Data Jurnal</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($KeywordBy)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM jurnal ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE nama_perkiraan like '%$keyword%' OR tanggal like '%$keyword%' OR kode_perkiraan like '%$keyword%' OR nilai like '%$keyword%' OR d_k like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM jurnal ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE $KeywordBy like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_jurnal = $data['id_jurnal'];
                                    if(empty($data['id_transaksi'])){
                                        if(empty($data['id_simpanan'])){
                                            if(empty($data['id_pinjaman_angsuran'])){
                                                if(empty($data['id_pinjaman'])){
                                                    if(empty($data['id_shu_session'])){
                                                        $LabelTransaksi="<span class='text-danger'>None</span>";
                                                    }else{
                                                        $id_shu_session = $data['id_shu_session'];
                                                        //buka SHU
                                                        $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                                        $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                                        $sesi_shu= $DatabagiHasil['sesi_shu'];
                                                        $LabelTransaksi="<span class='text-success' title='Referensi Bagi Hasil'>BGHSL.$id_shu_session</span>";
                                                    }
                                                }else{
                                                    $id_pinjaman = $data['id_pinjaman'];
                                                    //buka pinjaman
                                                    $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                                    $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                                    $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                                    $LabelTransaksi="<span class='text-success' title='Referensi Pinjaman'>PNJM.$id_pinjaman</span>";
                                                }
                                            }else{
                                                $id_pinjaman_angsuran = $data['id_pinjaman_angsuran'];
                                                //buka Angsuran
                                                $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                                                $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                                $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                                if($KategoriTransaksi=="Pokok"){
                                                    $LabelTransaksi="<span class='text-success' title='Referensi Angsuran Pokok'>ANG.PKK.$id_pinjaman_angsuran</span>";
                                                }else{
                                                    if($KategoriTransaksi=="Denda"){
                                                        $LabelTransaksi="<span class='text-success' title='Referensi Denda Angsuran'>ANG.DND.$id_pinjaman_angsuran</span>";
                                                    }else{
                                                        if($KategoriTransaksi=="Jasa"){
                                                            $LabelTransaksi="<span class='text-success' title='Referensi Jasa Angsuran'>ANG.JSA.$id_pinjaman_angsuran</span>";
                                                        }else{
                                                            $LabelTransaksi="<span class='text-success' title='Referensi Angsuran'>ANG.$id_pinjaman_angsuran</span>";
                                                        }
                                                    }
                                                }
                                                
                                            }
                                        }else{
                                            $id_simpanan = $data['id_simpanan'];
                                            //buka Simpanan
                                            $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                                            $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                                            $KategoriTransaksi= $DataSimpanan['kategori'];
                                            if($KategoriTransaksi=="Simpanan Pokok"){
                                                $LabelTransaksi="<span class='text-success' title='Simpanan Pokok'>SMP.PKK.$id_simpanan</span>";
                                            }else{
                                                if($KategoriTransaksi=="Simpanan Wajib"){
                                                    $LabelTransaksi="<span class='text-success' title='Simpanan Wajib'>SMP.WJB.$id_simpanan</span>";
                                                }else{
                                                    if($KategoriTransaksi=="Simpanan Sukarela"){
                                                        $LabelTransaksi="<span class='text-success' title='Simpanan Sukarela'>SMP.SKR.$id_simpanan</span>";
                                                    }else{
                                                        if($KategoriTransaksi=="Penarikan"){
                                                            $LabelTransaksi="<span class='text-success' title='Penarikan Dana'>SMP.PNR.$id_simpanan</span>";
                                                        }else{
                                                            $LabelTransaksi="<span class='text-success' title='Simpanan Non Kategori'>SMP.$id_simpanan</span>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }else{
                                        $id_transaksi = $data['id_transaksi'];
                                        //buka Transaksi
                                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                        $KategoriTransaksi= $DataTransaksi['kategori'];
                                        if($KategoriTransaksi=="Penjualan"){
                                            $LabelTransaksi="<span class='text-success' title='Transaksi Penjualan'>TRANS.PNJ.$id_transaksi</span>";
                                        }else{
                                            if($KategoriTransaksi=="Pembelian"){
                                                $LabelTransaksi="<span class='text-success' title='Transaksi Pembelian'>TRANS.PMB.$id_transaksi</span>";
                                            }else{
                                                if($KategoriTransaksi=="Penerimaan"){
                                                    $LabelTransaksi="<span class='text-success' title='Transaksi Penerimaan'>TRANS.PNRM.$id_transaksi</span>";
                                                }else{
                                                    if($KategoriTransaksi=="Pengeluaran"){
                                                        $LabelTransaksi="<span class='text-success' title='Transaksi Pengeluaran'>TRANS.PNGL.$id_transaksi</span>";
                                                    }else{
                                                        $LabelTransaksi="<span class='text-success' title='Transaksi'>TRANS.$id_transaksi</span>";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    $id_perkiraan = $data['id_perkiraan'];
                                    $tanggal = $data['tanggal'];
                                    $tanggal=strtotime($tanggal);
                                    $tanggal=date('d/m/y', $tanggal);
                                    $kode_perkiraan = $data['kode_perkiraan'];
                                    $nama_perkiraan = $data['nama_perkiraan'];
                                    $d_k= $data['d_k'];
                                    $nilai= $data['nilai'];
                                    //Format rupiah
                                    $NominalRp = "Rp " . number_format($nilai,0,',','.');

                            ?>
                                <tr tabindex="0" class="table-light" data-bs-toggle="modal" data-bs-target="#ModalDetailJurnal" data-id="<?php echo "$id_jurnal,$keyword,$batas,$ShortBy,$OrderBy,$page";?>" onmousemove="this.style.cursor='pointer'">
                                    <td class="text-center" align="center"><?php echo "<small>$no</small>";?></td>    
                                    <td class="text-left" align="left"><?php echo "<small>$tanggal</small>";?></td>
                                    <td class="text-left" align="left"><?php echo "<small>$LabelTransaksi</small>";?></td>
                                    <td class="text-left" align="left"><?php echo "<small>$kode_perkiraan</small>";?></td>
                                    <td class="text-left" align="left"><?php echo "<small>$nama_perkiraan</small>";?></td>
                                    <td class="text-right" align="right">
                                        <?php 
                                            if($d_k=="Debet")
                                            echo "<small>$NominalRp</small>";
                                        ?>
                                    </td>
                                    <td class="text-right" align="right">
                                        <?php 
                                            if($d_k=="Kredit")
                                            echo "<small>$NominalRp</small>";
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            $no++; } }
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