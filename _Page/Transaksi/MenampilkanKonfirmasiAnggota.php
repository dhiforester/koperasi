<div class="modal-body">
    <?php
        //Koneksi
        include "../../_Config/Connection.php";
        if(empty($_POST['id_anggota'])){
            echo '<div class="row">';
            echo '  <div class="col-md-12 text-center text-danger">';
            echo '      ID aNGGOTA Tidak Boleh Kosong!';
            echo '  </div>';
            echo '</div>';
        }else{
            $id_anggota=$_POST['id_anggota'];
            //Buka data Anggota
            $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
            $DataAnggota = mysqli_fetch_array($QryAnggota);
            $id_anggota= $DataAnggota['id_anggota'];
            $tanggal_masuk= $DataAnggota['tanggal_masuk'];
            $nama= $DataAnggota['nama'];
            echo '<div class="row">';
            echo '  <div class="col-md-12">';
            echo '      Apakah anda yakin akan memilih <b>'.$nama.'</b>?';
            echo '  </div>';
            echo '</div>';
        }
    ?>
</div>
<div class="modal-footer bg-info">
    <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiPilihAnggota">
        <i class="bi bi-check-circle"></i> Konfirmasi
    </button>
    <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalCariAnggota">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </button>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>