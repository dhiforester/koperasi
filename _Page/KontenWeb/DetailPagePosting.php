
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="card-title">
                                Detail Data Posting Web
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
                            $judul_posting= $DataPagePosting['judul_posting'];
                            $tag_posting= $DataPagePosting['tag_posting'];
                            $kategori_posting= $DataPagePosting['kategori_posting'];
                            $isi_posting= $DataPagePosting['isi_posting'];
                            $status_posting= $DataPagePosting['status_posting'];
                            $image_posting= $DataPagePosting['image_posting'];
                            $datetime_posting= $DataPagePosting['datetime_posting'];
                    ?>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h2><?php echo "$judul_posting"; ?></h2>
                                <small><?php echo "Tag: $tag_posting"; ?></small><br>
                                <small><?php echo "Date Post: $datetime_posting"; ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <img src="assets/img/Posting/<?php echo "$image_posting"; ?>" alt="" width="70%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <?php echo "$isi_posting"; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-footer">
                    <a href="index.php?Page=KontenWeb&Sub=EditPagePosting&id=<?php echo "$id_konten_posting"; ?>" class="btn btn-md btn-rounded btn-dark">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>