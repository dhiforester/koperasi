<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas">
                        <div class="row">
                            <div class="col-md-3 text-center mt-3 mb-3">
                                <a href="index.php?Page=SettingForm&Sub=TambahSettingForm" class="btn btn-md btn-primary btn-block btn-rounded">
                                    <i class="bi bi-save"></i> Buat Tamplate
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="MenampilkanTabelSettingForm">
                            
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php
                        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM form_medrek"));
                        echo "JUMLAH DATA : $jml_data";
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>