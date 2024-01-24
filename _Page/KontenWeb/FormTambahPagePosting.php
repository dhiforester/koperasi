<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesTambahPosting">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">
                                    Form Buat Halaman Posting
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
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="id_setting_api_key">API Key</label>
                                <select name="id_setting_api_key" id="id_setting_api_key" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                        $QryApiKey = mysqli_query($Conn, "SELECT*FROM setting_api_key ORDER BY title_api_key ASC");
                                        while ($DataApiKey = mysqli_fetch_array($QryApiKey)) {
                                            $id_setting_api_key= $DataApiKey['id_setting_api_key'];
                                            $title_api_key= $DataApiKey['title_api_key'];
                                            echo '<option value="'.$id_setting_api_key.'">'.$title_api_key.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="judul_posting">Judul Posting</label>
                                <input type="text" name="judul_posting" id="judul_posting" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="kategori_posting">Kategori</label>
                                <select name="kategori_posting" id="kategori_posting" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Laman Mandiri">Laman Mandiri</option>
                                    <option value="Blog">Blog</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="tag_posting">Tag/Label</label>
                                <input type="text" name="tag_posting" id="tag_posting" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="image_posting">Gambar/Cover</label>
                                <input type="file" name="image_posting" id="image_posting" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="isi_posting">Isi Posting</label>
                                <textarea name="isi_posting" id="isi_posting" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="status_posting">Status</label>
                                <select name="status_posting" id="status_posting" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Publish">Publish</option>
                                    <option value="Draft">Draft</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="datetime_posting">Tanggal</label>
                                <input type="date" name="datetime_posting" id="datetime_posting" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="NotifikasiTambahPagePosting">
                                <span class="text-primary">Pastikan Form Sudah Terisi Dengan Benar</span>
                            </div>
                            <div class="col-md-12" id="NotifikasiTambahPagePosting2">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-rounded btn-primary" id="ClickSimpanPagePosting">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>