<?php
    //Menangkap data dari form
    if(!empty($_POST['DataSet'])){
        $DataSet=$_POST['DataSet'];
    }else{
        $DataSet="";
    }
    if(!empty($_POST['DataValue'])){
        $DataValue=$_POST['DataValue'];
    }else{
        $DataValue="";
    }
    if(!empty($_POST['mode_waktu'])){
        $mode_waktu=$_POST['mode_waktu'];
    }else{
        $mode_waktu="Bulanan";
    }
    if(!empty($_POST['Tahun'])){
        $Tahun=$_POST['Tahun'];
    }else{
        $Tahun=date('Y');
    }
    if(!empty($_POST['Bulan'])){
        $Bulan=$_POST['Bulan'];
    }else{
        $Bulan=date('m');
    }
?>
<div class="card">
    <div class="card-header">
        <form action="index.php?Page=Aktivitas&Sub=AktivitasUmum&mode=Grafik" method="POST" id="ProsesTampilkanGrafikAktivitas">
            <div class="row">
                <div class="col-md-2 mt-3">
                    <select name="DataSet" id="DataSet" class="form-control">
                        <option value="">Semua</option>
                        <option value="id_akses">Akses</option>
                        <option value="kategori_log">Kategori</option>
                        <option value="deskripsi_log">Deskripsi</option>
                    </select>
                    <small>Data Set</small>
                </div>
                <div class="col-md-3 mt-3">
                    <select name="DataValue" id="DataValue" class="form-control">
                        <?php
                            echo '<option>Semua</option>';
                            if(empty($DataSet)){

                            }else{
                                $QryDataValue = mysqli_query($Conn, "SELECT DISTINCT $DataSet FROM log ORDER BY $DataSet asc");
                                while ($dATA = mysqli_fetch_array($QryDataValue)) {
                                    $lISTdATAvALUE= $dATA[$DataSet];
                                    if($DataSet=="id_akses"){
                                        //Buka data akses
                                        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$lISTdATAvALUE'")or die(mysqli_error($Conn));
                                        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                                        $nama_akses= $DataDetailAkses['nama_akses'];
                                        echo '<option value="'.$lISTdATAvALUE.'">'.$nama_akses.'</option>';
                                    }else{
                                        echo '<option value="'.$lISTdATAvALUE.'">'.$lISTdATAvALUE.'</option>';
                                    }
                                }
                            }
                        ?>
                    </select>
                    <small>Data Value</small>
                </div>
                <div class="col-md-2 mt-3">
                    <select name="mode_waktu" id="mode_waktu" class="form-control">
                        <option <?php if($mode_waktu=="Bulanan"){echo "selected";} ?> value="Bulanan">Bulanan</option>
                        <option <?php if($mode_waktu=="Tahunan"){echo "selected";} ?> value="Tahunan">Tahunan</option>
                    </select>
                    <small for="mode_waktu">Mode Waktu</small>
                </div>
                <div class="col-md-1 mt-3">
                    <select name="Tahun" id="Tahun" class="form-control">
                        <?php
                            $TahunSekarang=date('Y');
                            $TahunKedepan=$TahunSekarang+5;
                            for ( $i=2005; $i<=$TahunKedepan; $i++ ){
                                if($Tahun==$i){
                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                }else{
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                        ?>
                    </select>
                    <small for="tahun">Tahun</small>
                </div>
                <div class="col-md-2 mt-3" id="form_bulan">
                    <select name="Bulan" id="Bulan" class="form-control">
                        <option <?php if($Bulan=='01'){echo "selected";} ?> value="01">Januari</option>
                        <option <?php if($Bulan=='02'){echo "selected";} ?> value="02">Februari</option>
                        <option <?php if($Bulan=='03'){echo "selected";} ?> value="03">Maret</option>
                        <option <?php if($Bulan=='04'){echo "selected";} ?> value="04">April</option>
                        <option <?php if($Bulan=='05'){echo "selected";} ?> value="05">Mei</option>
                        <option <?php if($Bulan=='06'){echo "selected";} ?> value="06">Juni</option>
                        <option <?php if($Bulan=='07'){echo "selected";} ?> value="07">Juli</option>
                        <option <?php if($Bulan=='08'){echo "selected";} ?> value="08">Agustus</option>
                        <option <?php if($Bulan=='09'){echo "selected";} ?> value="09">September</option>
                        <option <?php if($Bulan=='10'){echo "selected";} ?> value="10">Oktober</option>
                        <option <?php if($Bulan=='11'){echo "selected";} ?> value="11">November</option>
                        <option <?php if($Bulan=='12'){echo "selected";} ?> value="12">Desember</option>
                    </select>
                    <small>Bulan</small>
                </div>
                <div class="col-md-2 mt-3">
                    <button type="submit" class="btn btn-md btn-primary btn-block">
                        <i class="bi bi-search"></i> Tampilkan
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div id="MenampilkanGrafikAktivitas">
                    Belum ada data yang bisa ditampilkan!
                </div>
            </div>
        </div>
    </div>
</div>