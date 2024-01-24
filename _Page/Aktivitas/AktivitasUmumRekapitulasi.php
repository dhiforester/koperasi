<div class="card">
    <div class="card-header">
        <form action="javascript:void(0);" id="ProsesRekapAktivitasUmum">
            <div class="row">
                <div class="col-md-2 mt-3">
                    <select name="Dataset" id="Dataset" class="form-control">
                        <option value="">Pilih</option>
                        <option value="id_akses">Akses</option>
                        <option value="kategori_log">Kategori</option>
                        <option value="deskripsi_log">Deskripsi</option>
                    </select>
                    <small for="Dataset">Dataset</small>
                </div>
                <div class="col-md-2 mt-3">
                    <select name="mode_waktu" id="mode_waktu" class="form-control">
                        <option value="">Pilih</option>
                        <option value="Tahunan">Tahunan</option>
                        <option value="Bulanan">Bulanan</option>
                    </select>
                    <small for="mode_waktu">Mode Waktu</small>
                </div>
                <div class="col-md-3 mt-3">
                    <select name="Tahun" id="Tahun" class="form-control">
                        <?php
                            $TahunSekarang=date('Y');
                            $TahunKedepan=$TahunSekarang+5;
                            for ( $i=2005; $i<=$TahunKedepan; $i++ ){
                                if($TahunSekarang==$i){
                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                }else{
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                        ?>
                    </select>
                    <small for="tahun">Tahun</small>
                </div>
                <div class="col-md-3 mt-3" id="form_bulan">
                    <select name="Bulan" id="Bulan" class="form-control">
                        <option <?php if(date('m')=='01'){echo "selected";} ?> value="01">Januari</option>
                        <option <?php if(date('m')=='02'){echo "selected";} ?> value="02">Februari</option>
                        <option <?php if(date('m')=='03'){echo "selected";} ?> value="03">Maret</option>
                        <option <?php if(date('m')=='04'){echo "selected";} ?> value="04">April</option>
                        <option <?php if(date('m')=='05'){echo "selected";} ?> value="05">Mei</option>
                        <option <?php if(date('m')=='06'){echo "selected";} ?> value="06">Juni</option>
                        <option <?php if(date('m')=='07'){echo "selected";} ?> value="07">Juli</option>
                        <option <?php if(date('m')=='08'){echo "selected";} ?> value="08">Agustus</option>
                        <option <?php if(date('m')=='09'){echo "selected";} ?> value="09">September</option>
                        <option <?php if(date('m')=='10'){echo "selected";} ?> value="10">Oktober</option>
                        <option <?php if(date('m')=='11'){echo "selected";} ?> value="11">November</option>
                        <option <?php if(date('m')=='12'){echo "selected";} ?> value="12">Desember</option>
                    </select>
                    <small>Bulan</small>
                </div>
                <div class="col-md-2 mt-3">
                    <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                        <i class="bi bi-search"></i> Tampilkan
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body" >
        <div class="row">
            <div class="col-md-12" id="MenampilkanRekapAktivitasUmum">
                <?php
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                    echo '  Silahkan isi kategori dataset yang ingin ditampilkan, mode waktu,';
                    echo '  informasi waktu dan kemudian klik pada tombol tampilkan.';
                    echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                ?>
            </div>
        </div>
    </div>
</div>