<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesBuatEntitasBaru">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mb-2">
                                <b class="card-title">
                                    <i class="bi bi-plus-circle"></i> Buat Entitas Akses Baru
                                </b>
                            </div>
                            <div class="col-md-2 mb-2">
                                <a href="index.php?Page=EntitasAkses" class="btn btn-md btn-dark w-100 mt-2">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="akses">Nama Akses</label>
                                <input type="text" name="akses" id="akses" class="form-control" required>
                                <small>(Nama entitas akses yang akan menjadi standar)</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="class_label">Class Label</label>
                                <select name="class_label" id="class_label" class="form-control" required>
                                    <option class="bg bg-black" value="bg-black">bg-black</option>
                                    <option class="bg bg-danger" value="bg-danger">bg-danger</option>
                                    <option class="bg bg-dark" value="bg-dark">bg-dark</option>
                                    <option class="bg bg-grayish" value="bg-grayish">bg-grayish</option>
                                    <option class="bg bg-info" value="bg-info">bg-info</option>
                                    <option class="bg bg-local" value="bg-local">bg-local</option>
                                    <option class="bg bg-primary" value="bg-primary">bg-primary</option>
                                    <option class="bg bg-secondary" value="bg-secondary">bg-secondary</option>
                                    <option class="bg bg-success" value="bg-success">bg-success</option>
                                    <option class="bg bg-warning" value="bg-warning">bg-warning</option>
                                    <option class="bg bg-white" value="bg-white">bg-white</option>
                                </select>
                                <small>(Label warna di data akses)</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 table table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <input class="form-check-input" type="checkbox" value="Ya" id="checkall" name="checkall">
                                                <label for="checkall"><b>Check</b></label>
                                            </th>
                                            <th class="text-center"><b>No</b></th>
                                            <th class="text-center"><b>Kode</b></th>
                                            <th class="text-center"><b>Keterangan</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            //Arraykan data referensi
                                            $query = mysqli_query($Conn, "SELECT*FROM akses_referensi ORDER BY kode_referensi ASC");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id_akses_referensi= $data['id_akses_referensi'];
                                                $kode_referensi= $data['kode_referensi'];
                                                $keterangan= $data['keterangan'];
                                                echo '<tr>';
                                                echo '  <td class="text-center">';
                                                echo '      <input class="form-check-input checkall" type="checkbox" value="'.$kode_referensi.'" id="'.$kode_referensi.'" name="'.$kode_referensi.'">';
                                                echo '  </td>';
                                                echo '  <td class="text-center">'.$no.'</td>';
                                                echo '  <td class="text-left">'.$kode_referensi.'</td>';
                                                echo '  <td class="text-left">'.$keterangan.'</td>';
                                                echo '</tr>';
                                                $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3" id="NotifikasiBuatEntitas">
                                <span class="text-primary">Pastikan Ijin Akses Untuk Entitas Ini Sudah Benar!</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-md btn-warning">
                            <i class="bi bi-arrow-90deg-left"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>