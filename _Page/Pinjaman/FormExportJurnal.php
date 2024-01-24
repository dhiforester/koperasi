<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_pinjaman'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col col-md-12 text-center text-danger">';
        echo '          ID Pinjaman Tidak Boleh Kosong';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '      <i class="bi bi-x-circle"></i> Tutup';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_pinjaman=$_POST['id_pinjaman'];
        //Cek jumlah jurnal
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman='$id_pinjaman'"));
        if(empty($jml_data)){
            echo '<div class="modal-body">';
            echo '  <div class="row">';
            echo '      <div class="col col-md-12 text-center text-danger">';
            echo '          Tidak ada data jurnal untuk pinjaman ini';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
            echo '<div class="modal-footer bg-info">';
            echo '  <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
            echo '      <i class="bi bi-x-circle"></i> Tutup';
            echo '  </button>';
            echo '</div>';
        }else{
?>
    <div class="modal-body">
        <input type="hidden" name="id_pinjaman" value="<?php echo "$id_pinjaman"; ?>">
        <?php
            echo '<div class="modal-body">';
            echo '  <div class="row">';
            echo '      <div class="col col-md-12 text-center">';
            echo '          Apakah Anda Yakin Akan Export Data Jurnal';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        ?>
    </div>
    <div class="modal-footer bg-info">
        <button type="submit" class="btn btn-primary btn-rounded">
            <i class="bi bi-download"></i> Export
        </button>
        <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Tutup
        </button>
    </div>
<?php }} ?>