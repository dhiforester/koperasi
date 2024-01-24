<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <form action="javascript:void(0);" id="ProsesSettingGeneral">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="title_page">App Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="title_page" id="title_page" class="form-control" placeholder="Your Business" value="<?php echo "$title_page"; ?>">
                                <small>Maximum 20 characters</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="kata_kunci">Keyword</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="kata_kunci" id="kata_kunci" class="form-control" value="<?php echo "$kata_kunci"; ?>">
                                <small>(Ex: keyword1, keyword2, keyword3)</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="deskripsi">Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"><?php echo "$deskripsi"; ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="alamat_bisnis">Address</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="alamat_bisnis" id="alamat_bisnis" cols="30" rows="3" class="form-control"><?php echo "$alamat_bisnis"; ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="email">Email Address</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="email_bisnis" id="email_bisnis" class="form-control" placeholder="email@domain.com" value="<?php echo "$email_bisnis"; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="telepon_bisnis">Phone Number</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="telepon_bisnis" id="telepon_bisnis" class="form-control" placeholder="+62" value="<?php echo "$telepon_bisnis"; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="favicon">Favicon Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="favicon" id="favicon" class="form-control">
                                <small>
                                    Maximum File 2 Mb 
                                    <?php
                                        if(!empty($favicon)){
                                            echo '<a href="assets/img/'.$favicon.'" target="_blank">View Image Here</a>';
                                        }
                                    ?>
                                </small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="logo">Logo Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="logo" id="logo" class="form-control">
                                <small>
                                    Maximum File 2 Mb
                                    <?php
                                        if(!empty($logo)){
                                            echo '<a href="assets/img/'.$logo.'" target="_blank">View Image Here</a>';
                                        }
                                    ?>
                                </small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="base_url">Base URL</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="base_url" id="base_url" class="form-control" placeholder="https://" value="<?php echo "$base_url"; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9 text-right" id="NotifikasiSimpanSettingGeneral">
                                <small class="text-dark">Make sure the setting form is filled in correctly.</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="bi bi-save"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>