<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan entitas akses.';
                echo '  Anda bisa menambahkan beberapa entitas akses yang memiliki aturan standarnya masing-masing.';
                echo '  ketika anda membuat akses baru, anda masih bisa melakukan perubahan pada ijin akses tersebut.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas">
                        <div class="row">
                            <div class="col-md-2 mt-3"></div>
                            <div class="col-md-3 mt-3"></div>
                            <div class="col-md-2 mt-3"></div>
                            <div class="col-md-2 mt-3"></div>
                            <div class="col-md-3 text-center mt-3">
                                <a href="index.php?Page=EntitasAkses&Sub=BuatEntitas" class="btn btn-md btn-primary btn-block btn-rounded" title="Buat Entitas Akses Baru">
                                    <i class="bi bi-plus-lg"></i> Buat Entitas
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="MenampilkanTabelEntitasAkses">

                </div>
            </div>
        </div>
    </div>
</section>