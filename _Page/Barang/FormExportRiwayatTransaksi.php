<?php
    if(empty($_POST['id_barang'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger">';
        echo '          ID Barang Tidak Boleh Kosong';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-success">';
        echo '  <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '      <i class="bi bi-x-circle"></i> Tutup';
        echo '  </button>';
        echo '</div>';
    }else{
        $id_barang=$_POST['id_barang'];
        //periode1
        if(!empty($_POST['periode1'])){
            $periode1=$_POST['periode1'];
        }else{
            $periode1="";
        }
        //periode2
        if(!empty($_POST['periode2'])){
            $periode2=$_POST['periode2'];
        }else{
            $periode2="";
        }
?>
    <form action="_Page/Barang/ExportRiwayatTransaksi.php" method="POST" target="_blank">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="id_barang">ID Barang</label>
                    <input type="text" readonly name="id_barang" class="form-control" value="<?php echo "$id_barang"; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="periode1">Periode awal</label>
                    <input type="date" name="periode1" class="form-control" value="<?php echo "$periode1"; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="periode2">Periode Akhir</label>
                    <input type="date" name="periode2" class="form-control" value="<?php echo "$periode2"; ?>">
                </div>
            </div>
        </div>
        <div class="modal-footer bg-success">
            <button type="submit" class="btn btn-primary btn-rounded">
                <i class="bi bi-download"></i> Download
            </button>
            <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Tutup
            </button>
        </div>
    </form>
<?php } ?>