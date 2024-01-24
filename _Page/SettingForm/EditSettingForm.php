<?php
    if(empty($_GET['id'])){
        $id_form_medrek="";
        echo '<section class="section dashboard">';
        echo '  <div class="row">';
        echo '      <div class="col-lg-12">';
        echo '          <div class="card">';
        echo '              <div class="card-body">';
        echo '                  ID Form Tidak Boleh Kosong!';
        echo '              </div>';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</section>';
    }else{
        $id_form_medrek=$_GET['id'];
        //Buka detail FormSetting
        $QryFormSetting = mysqli_query($Conn,"SELECT * FROM form_medrek WHERE id_form_medrek='$id_form_medrek'")or die(mysqli_error($Conn));
        $DataFormSetting = mysqli_fetch_array($QryFormSetting);
        $id_form_medrek = $DataFormSetting['id_form_medrek'];
        $nama_form_medrek= $DataFormSetting['nama_form_medrek'];
        $deskripsi_form_medrek= $DataFormSetting['deskripsi_form_medrek'];
        $form_medrek= $DataFormSetting['form_medrek'];
        $updatetime= $DataFormSetting['updatetime'];
?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <form action="javascript:void(0);" id="ProsesEditFormSetting">
                    <input type="hidden" name="id_form_medrek" id="id_form_medrek" value="<?php echo "$id_form_medrek";?>">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10 mb-3">
                                    <h4>Form Tamplate Medrek</h4>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <a href="index.php?Page=SettingForm" class="btn btn-md btn-dark btn-block btn-rounded">
                                        <i class="bi bi-arrow-left-circle"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_form_medrek">Nama Form</label>
                                    <input type="text" name="nama_form_medrek" id="nama_form_medrek" class="form-control" value="<?php echo "$nama_form_medrek";?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deskripsi_form_medrek">Keterangan Form</label>
                                    <input type="text" name="deskripsi_form_medrek" id="deskripsi_form_medrek" class="form-control" value="<?php echo "$deskripsi_form_medrek";?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="get_setting_form">Tamplate Form</label>
                                    <textarea name="get_setting_form" id="get_setting_form" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3" id="NotifikasiEditSettingForm">
                                    <span class="text-primary">Pastikan Tamplate Yang Anda Buat Sudah Sesuai</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-md btn-primary" id="ClickEditFormSetting">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php } ?>