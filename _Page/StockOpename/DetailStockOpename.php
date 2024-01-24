<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Stock Opename</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Stock Opename Tidak Boleh Kosong.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Error ID Null';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_stok_opename=$_GET['id'];
        //Buka data Stock Opename
        $QryStockOpename = mysqli_query($Conn,"SELECT * FROM stok_opename WHERE id_stok_opename='$id_stok_opename'")or die(mysqli_error($Conn));
        $DataStockOpename = mysqli_fetch_array($QryStockOpename);
        $id_akses= $DataStockOpename['id_akses'];
        $tanggal= $DataStockOpename['tanggal'];
        $status= $DataStockOpename['status'];
        //Buka nama akses
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $nama_akses= $DataDetailAkses['nama_akses'];
        //Format Tanggal
        $strtotime=strtotime($tanggal);
        $TanggalFormat=date('d/m/Y',$strtotime);
        //Inisiasi Status
        if($status=="Selesai"){
            $LabelStatus='<span class="badge badge-primary">Selesai</span>';
        }else{
            if($status=="Pending"){
                $LabelStatus='<span class="badge badge-warning">Pending</span>';
            }else{
                $LabelStatus='<span class="badge badge-dark">None</span>';
            }
        }
        //Hitung jumlah item
        $JumlahItem = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename'"));
        //Menghitung jumlah asset
        $SumJumlahAsset = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM stok_opename_barang WHERE id_stok_opename='$id_stok_opename'"));
        $JumlahAsset = $SumJumlahAsset['jumlah'];
        $JumlahAssetRp = "Rp " . number_format($JumlahAsset,0,',','.');
?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <b class="card-title">
                                <i class="bi bi-info-circle"></i> Info stock Opename
                            </b>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php?Page=StockOpename" class="btn btn-md btn-dark btn-rounded btn-block">
                                <i class="bi bi-arrow-left-short"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3 table table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td><b>ID Stock Opename</b></td>
                                        <td><?php echo "$id_stok_opename"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal</b></td>
                                        <td><?php echo "$TanggalFormat"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Petugas</b></td>
                                        <td><?php echo "$nama_akses"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Status</b></td>
                                        <td><?php echo "$LabelStatus"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah Item</b></td>
                                        <td><?php echo "$JumlahItem"; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Asset Item</b></td>
                                        <td><?php echo "$JumlahAssetRp"; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatasUraian">
                        <input type="hidden" name="id_stok_opename" id="id_stok_opename" value="<?php echo "$id_stok_opename"; ?>">
                        <div class="row">
                            <div class="col-md-1 mt-2">
                                <select name="BatasUraian" id="BatasUraian" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-3 mt-2">
                                <input type="text" name="KeywordStockOpenameBarang" id="KeywordStockOpenameBarang" class="form-control">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded" title="Cari Stock Opename">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-2">
                                <button type="button" class="btn btn-md btn-success btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalImportStockOpename" data-id="<?php echo "$id_stok_opename"; ?>" title="Import Stock Opename">
                                    <i class="bi bi-upload"></i> Import
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-2">
                                <button type="button" class="btn btn-md btn-info btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalExportStockOpename" data-id="<?php echo "$id_stok_opename"; ?>" title="Export Stock Opename">
                                    <i class="bi bi-download"></i> Export
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-2">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPilihBarang" data-id="<?php echo "$id_stok_opename"; ?>" title="Tambah Uraian Stock Opename Barang">
                                    <i class="bi bi-plus-lg"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelStockOpenameBarang">

                </div>
            </div>
        </div>
    </div>
<?php } ?>