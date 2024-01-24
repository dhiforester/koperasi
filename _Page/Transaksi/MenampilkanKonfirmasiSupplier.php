<div class="modal-body">
    <?php
        //Koneksi
        include "../../_Config/Connection.php";
        if(empty($_POST['id_supplier'])){
            echo '<div class="row">';
            echo '  <div class="col-md-12 text-center text-danger">';
            echo '      ID Supplier Tidak Boleh Kosong!';
            echo '  </div>';
            echo '</div>';
        }else{
            $id_supplier=$_POST['id_supplier'];
            //Buka data Anggota
            $QrySupplier = mysqli_query($Conn,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'")or die(mysqli_error($Conn));
            $DataSupplier = mysqli_fetch_array($QrySupplier);
            $id_supplier= $DataSupplier['id_supplier'];
            $nama_supplier= $DataSupplier['nama_supplier'];
            echo '<div class="row">';
            echo '  <div class="col-md-12">';
            echo '      Apakah anda yakin akan memilih <b>'.$nama_supplier.'</b>?';
            echo '  </div>';
            echo '</div>';
        }
    ?>
</div>
<div class="modal-footer bg-info">
    <button type="button" class="btn btn-success btn-rounded" id="KonfirmasiPilihSupplier">
        <i class="bi bi-check-circle"></i> Konfirmasi
    </button>
    <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalCariSupplier">
        <i class="bi bi-arrow-left-circle"></i> Kembali
    </button>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>