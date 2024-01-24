
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="javascript:void(0);" id="ProsesEditPagePosting">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">
                                    Edit Data Posting Web
                                </h4>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=KontenWeb&Sub=PagePosting" class="btn btn-md btn-dark btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-short"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                            if(empty($_GET['id'])){
                                echo '<div class="row">';
                                echo '  <div class="col-md-12 mb-3 text-center">';
                                echo '      Data ID Postr Tidak Boleh Kosong';
                                echo '  </div>';
                                echo '</div>';
                            }else{
                                $id_konten_posting=$_GET['id'];
                                //Buka data
                                $QryPagePosting = mysqli_query($Conn,"SELECT * FROM konten_posting WHERE id_konten_posting='$id_konten_posting'")or die(mysqli_error($Conn));
                                $DataPagePosting = mysqli_fetch_array($QryPagePosting);
                                $id_konten_posting = $DataPagePosting['id_konten_posting'];
                                $judul_posting= $DataPagePosting['judul_posting'];
                                $tag_posting= $DataPagePosting['tag_posting'];
                                $kategori_posting= $DataPagePosting['kategori_posting'];
                                $isi_posting= $DataPagePosting['isi_posting'];
                                $status_posting= $DataPagePosting['status_posting'];
                                $image_posting= $DataPagePosting['image_posting'];
                                $datetime_posting= $DataPagePosting['datetime_posting'];
                        ?>
                            <input type="hidden" name="id_konten_posting_edit" id="id_konten_posting_edit" value="<?php echo "$id_konten_posting"; ?>">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="id_setting_api_key">API Key</label>
                                    <select name="id_setting_api_key" id="id_setting_api_key" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php
                                            $QryApiKey = mysqli_query($Conn, "SELECT*FROM setting_api_key ORDER BY title_api_key ASC");
                                            while ($DataApiKey = mysqli_fetch_array($QryApiKey)) {
                                                $id_setting_api_key_list= $DataApiKey['id_setting_api_key'];
                                                $title_api_key_list= $DataApiKey['title_api_key'];
                                                if($id_setting_api_key_list==$id_konten_posting ){
                                                    echo '<option selected value="'.$id_setting_api_key_list.'">'.$title_api_key_list.'</option>';
                                                }else{
                                                    echo '<option value="'.$id_setting_api_key_list.'">'.$title_api_key_list.'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="judul_posting">Judul Posting</label>
                                    <input type="text" name="judul_posting" id="judul_posting" class="form-control" value="<?php echo "$judul_posting"; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="kategori_posting">Kategori</label>
                                    <select name="kategori_posting" id="kategori_posting" class="form-control">
                                        <option <?php if($kategori_posting==""){echo "selected";} ?> value="">Pilih</option>
                                        <option <?php if($kategori_posting=="Laman Mandiri"){echo "selected";} ?> value="Laman Mandiri">Laman Mandiri</option>
                                        <option <?php if($kategori_posting=="Blog"){echo "selected";} ?> value="Blog">Blog</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="tag_posting">Tag/Label</label>
                                    <input type="text" name="tag_posting" id="tag_posting" class="form-control" value="<?php echo "$tag_posting"; ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="image_posting">Gambar/Cover</label>
                                    <input type="file" name="image_posting" id="image_posting" class="form-control">
                                    <small>
                                        <?php
                                            if(!empty($image_posting)){
                                                echo '<a href="assets/img/Posting/'.$image_posting.'" target="_blank">View Image</a>';
                                            }else{
                                                echo '<i class="text-danger">No Image</i>';
                                            }
                                        ?>
                                        
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="isi_posting">Isi Posting</label>
                                    <textarea name="isi_posting_edit" id="isi_posting_edit" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="status_posting">Status</label>
                                    <select name="status_posting" id="status_posting" class="form-control">
                                        <option <?php if($status_posting==""){echo "selected";} ?> value="">Pilih</option>
                                        <option <?php if($status_posting=="Publish"){echo "selected";} ?> value="Publish">Publish</option>
                                        <option <?php if($status_posting=="Draft"){echo "selected";} ?> value="Draft">Draft</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="datetime_posting">Tanggal</label>
                                    <input type="date" name="datetime_posting" id="datetime_posting" class="form-control" value="<?php echo "$datetime_posting"; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="NotifikasiEditPosting">
                                    <span class="text-primary">Pastikan Form Sudah Terisi Dengan Benar</span>
                                </div>
                                <div class="col-md-12" id="NotifikasiEditPagePosting2">
                                    
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-rounded btn-primary" id="ClickEditPagePosting">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>