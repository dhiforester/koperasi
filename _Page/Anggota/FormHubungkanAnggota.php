<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_anggota
    if(empty($_POST['id_anggota'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3 text-danger">';
        echo '          ID Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        //Tangkap id_akses_anggota
        if(empty($_POST['id_akses_anggota'])){
            echo '  <div class="row">';
            echo '      <div class="col-md-12 mb-3 text-danger">';
            echo '          ID Akses Anggota Tidak Boleh Kosong.';
            echo '      </div>';
            echo '  </div>';
        }else{
            $id_anggota=$_POST['id_anggota'];
            $id_akses_anggota=$_POST['id_akses_anggota'];
            //Buka data Anggota
            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
            $DataAnggota = mysqli_fetch_array($QryAnggota);
            if(empty($DataAnggota['id_anggota'])){
                echo '  <div class="row">';
                echo '      <div class="col-md-12 mb-3 text-danger">';
                echo '          ID Anggota Yang Anda Pilih Tidak Valid.';
                echo '      </div>';
                echo '  </div>';
            }else{
                //Buka data akses_anggota
                $QryAksesAnggota = mysqli_query($Conn,"SELECT * FROM akses_anggota WHERE id_akses_anggota='$id_akses_anggota'")or die(mysqli_error($Conn));
                $DataAksesAnggota = mysqli_fetch_array($QryAksesAnggota);
                if(empty($DataAksesAnggota['id_akses_anggota'])){
                    echo '  <div class="row">';
                    echo '      <div class="col-md-12 mb-3 text-danger">';
                    echo '          ID Akses Anggota Yang Anda Pilih Tidak Valid.';
                    echo '      </div>';
                    echo '  </div>';
                }else{
                    $id_anggota= $DataAnggota['id_anggota'];
?>
    <div class="row">
        <div class="col col-md-12 text-center">
            <span class="modal-icon display-2-lg">
                <img src="assets/img/question.gif" width="70%">
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2" id="NotifikasiHubungkanAnggota">
            <small class="text-primary">Apakah anda yakin ingin menghubungkan Anggota Ini Dengan Data Akses?</small>
        </div>
    </div>
<?php }}}} ?>