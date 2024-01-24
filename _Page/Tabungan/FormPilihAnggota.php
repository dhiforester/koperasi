<?php
    if(!empty($_POST['id_anggota'])){
        date_default_timezone_set('Asia/Jakarta');
        include "../../_Config/Connection.php";
        $id_anggota=$_POST['id_anggota'];
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $tanggal_masuk= $DataAnggota['tanggal_masuk'];
        $nama= $DataAnggota['nama'];
?>
<input type="hidden" name="id_anggota" value="<?php echo "$id_anggota"; ?>">
<div class="row">
        <div class="col col-md-12 text-center">
            <span class="modal-icon display-2-lg">
                <img src="assets/img/question.gif" width="70%">
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12 text-center mb-3">
            <small class="modal-title my-3">
                Apakah anda yakin akan menambahkan tabungan untuk <?php echo "<b>$nama</b>"; ?>?
            </small>
        </div>
    </div>
</div>
<?php 
    }else{
        $id_anggota="";
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center">';
        echo '          <small class="modal-title my-3">ID Anggota Tidak Boleh Kosong!</small>';
        echo '      </div>';
        echo '  </div>';
    }
?>