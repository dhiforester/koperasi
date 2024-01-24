<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_shu_session
    if(empty($_POST['id_shu_session'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Sesi Bagi Hasil Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_shu_session=$_POST['id_shu_session'];
?>
    <div class="modal-body">
        <div class="row">
            <div class="col col-md-12 mb-3">
                <b>Silahkan Baca Petunjuk Berikut Ini.</b>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12 mb-3" style="height: 350px; overflow-y: scroll;">
                <ul>
                    <li>
                        Silahkan Download Tamplate Rincian Bagi Hasil Pada Tombol "Download Tamplate" di bawah.
                    </li>
                    <li>
                        Ikuti semua kolom data pada format excel yang anda download tadi.
                    </li>
                    <li>
                        ID Sesi adalah ID bagi hasil yang ada pada halaman ini, kolom ini wajib diisi.
                    </li>
                    <li>
                        ID anggota adalah ID utama anggota yangharus sesuai dengan nama pada data anggota, kolom ini wajib diisi.
                    </li>
                    <li>
                        Pastikan anda menyimpan data yang akan diimport dalam format excel.
                    </li>
                    <li>
                        Untuk memulai import data rincian, klik pada tombol "Lanjutkan".
                    </li>
                    <li>
                        Upload data exceltadi pad form yang disediakan.
                    </li>
                    <li>
                        Selesaikan proses dengan memilih tombol import.
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="_Page/BagiHasil/DownloadTamplateBagiHasil.php?id_shu_session=<?php echo "$id_shu_session"; ?>" class="btn btn-md btn-warning w-100" target="_blank">
                    <i class="bi bi-download"></i> Download Tamplate
                </a>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-warning">
        <div class="row">
            <div class="col-md-12 mb-2">
                <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalImportRincian" data-id="<?php echo "$id_shu_session"; ?>">
                    <i class="bi bi-arrow-right"></i> Lanjutkan
                </button>
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
<?php } ?>