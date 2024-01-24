<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                <b>Keterangan :</b> 
                Silahkan pilih salah satu data Personnel pada tombol <i>Detail</i> untuk mengetahui uraian komisi.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-4 mt-3">
                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Kata Kunci">
                                <small>Pencarian</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <select name="id_mitra" id="id_mitra" class="form-control">
                                    
                                    <?php
                                        if($SessionAkses=="Admin"){
                                            echo '<option value="">Semua</option>';
                                            $QryMitra = mysqli_query($Conn, "SELECT*FROM mitra WHERE status_mitra='Valid' ORDER BY nama_mitra ASC");
                                            while ($DataMitra = mysqli_fetch_array($QryMitra)) {
                                                $id_mitra = $DataMitra['id_mitra'];
                                                $nama_mitra= $DataMitra['nama_mitra'];
                                                echo '<option value="'.$id_mitra.'">'.$nama_mitra.'</option>';
                                            }
                                        }else{
                                            $QryMitra = mysqli_query($Conn, "SELECT*FROM mitra WHERE id_mitra='$SessionIdMitra' AND status_mitra='Valid' ORDER BY nama_mitra ASC");
                                            while ($DataMitra = mysqli_fetch_array($QryMitra)) {
                                                $id_mitra = $DataMitra['id_mitra'];
                                                $nama_mitra= $DataMitra['nama_mitra'];
                                                echo '<option value="'.$id_mitra.'">'.$nama_mitra.'</option>';
                                            }
                                        }
                                        
                                    ?>
                                </select>
                                <small>Filter Mitra</small>
                            </div>
                            <div class="col-md-3 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanPersonnelMitra">

                </div>
            </div>
        </div>
    </div>
</section>