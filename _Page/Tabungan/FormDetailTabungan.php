<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_tabungan
    if(empty($_POST['id_tabungan'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Wilayah Tidak Dapat Ditangkap Oleh Sistem.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_tabungan=$_POST['id_tabungan'];
        //Buka data askes
        $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_tabungan'")or die(mysqli_error($Conn));
        $DataSimpanan = mysqli_fetch_array($QrySimpanan);
        $id_simpanan= $DataSimpanan['id_simpanan'];
        $id_anggota= $DataSimpanan['id_anggota'];
        $kategori= $DataSimpanan['kategori'];
        $keterangan= $DataSimpanan['keterangan'];
        $nama= $DataSimpanan['nama'];
        $jumlah= $DataSimpanan['jumlah'];
        $tanggal= $DataSimpanan['tanggal'];
        $strotime=strtotime($tanggal);
        $tanggal=date('d/m/Y',$strotime);
        $jumlah = "" . number_format($jumlah,0,',','.');
?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        <td><b>Nama Anggota</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$nama"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$tanggal"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Kategori</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$kategori"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Keterangan</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$keterangan"; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jumlah</b></td>
                        <td><b>:</b></td>
                        <td><?php echo "$jumlah"; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <a href="index.php?Page=Tabungan&Sub=DetailTabungan&id=<?php echo "$id_simpanan"; ?>" class="btn btn-success btn-rounded">
        <i class="bi bi-three-dots"></i> Selengkapnya
    </a>
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>
<?php } ?>