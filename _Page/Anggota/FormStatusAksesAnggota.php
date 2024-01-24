<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses_anggota
    if(empty($_POST['id_akses_anggota'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3 text-danger">';
        echo '          ID Akses Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_akses_anggota=$_POST['id_akses_anggota'];
        //Buka data Akses Anggota
        $QryAksesAnggota = mysqli_query($Conn,"SELECT * FROM akses_anggota WHERE id_akses_anggota='$id_akses_anggota'")or die(mysqli_error($Conn));
        $DataAksesAnggota = mysqli_fetch_array($QryAksesAnggota);
        if(empty($DataAksesAnggota['id_akses_anggota'])){
            echo '  <div class="row">';
            echo '      <div class="col-md-12 mb-3 text-danger">';
            echo '          ID Akses Anggota Tersebut Tidak Ditemukan.';
            echo '      </div>';
            echo '  </div>';
        }else{
            $status= $DataAksesAnggota['status'];
            if($status=="Pending"){
                echo '  <div class="row">';
                echo '      <div class="col-md-12 mb-3 ">';
                echo '          ID Akses Anggota Tersebut Dalam Kondisi Pending, Dimana Yang Bersangkutan Belum Melakukan Verifikasi Email.';
                echo '      </div>';
                echo '  </div>';
            }else{
                if($status=="Active"){
                    echo '  <div class="row">';
                    echo '      <div class="col-md-12 mb-3 text-success">';
                    echo '          ID Akses Anggota Tersebut Sudah Active, Dimana Yang Bersangkutan Dapat Mengakses Akunnya.';
                    echo '      </div>';
                    echo '  </div>';
                }else{
                    echo '  <div class="row">';
                    echo '      <div class="col-md-12 mb-3 text-info">';
                    echo '          Silahkan pilih salah satu data anggota untuk dihubungkan dengan data akses!.';
                    echo '      </div>';
                    echo '  </div>';
                }
?>
    <form action="javascript:void(0);" id="CariPilihAnggota">
        <input type="hidden" name="id_akses_anggota" id="id_akses_anggota" value="<?php echo "$id_akses_anggota"; ?>">
        <div class="row">
            <div class="col-md-12">
                <b>Pilih Data Anggota Yang Akan Di Hubungkan</b>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mt-2">
                <select name="BatasCariAnggota" id="BatasCariAnggota" class="form-control">
                    <option value="5">5</option>
                    <option selected value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="250">250</option>
                    <option value="500">500</option>
                </select>
                <small for="BatasCariAnggota">Data</small>
            </div>
            <div class="col-md-6 mt-2" id="FormFilterKeyword">
                <input type="text" name="KeywordCariAnggota" id="KeywordCariAnggota" class="form-control">
                <label for="KeywordCariAnggota">Kata Kunci</label>
            </div>
            <div class="col-md-3 mt-2" id="FormFilterKeyword">
                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </div>
    </form>
    <div id="TabelPilihAnggota">

    </div>
<?php }}} ?>