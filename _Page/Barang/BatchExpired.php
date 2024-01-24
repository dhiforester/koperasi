<div class="card mt-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-10 mt-2">
                <b class="card-title">
                    <i class="bi bi-calendar-check"></i> Batch & Expired Date
                </b>
            </div>
            <dv class="col-md-2 mt-2">
                <a href="javascript:void(0);" class="btn btn-sm btn-success mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahExpiredDate" data-id="<?php echo "$id_barang"; ?>">
                    <i class="bi bi-plus"></i> Tambah Expired Date
                </a>
            </dv>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>No.Batch</b>
                            </th>
                            <th class="text-center">
                                <b>Jumlah</b>
                            </th>
                            <th class="text-center">
                                <b>Expired</b>
                            </th>
                            <th class="text-center">
                                <b>Pemberitahuan</b>
                            </th>
                            <th class="text-center">
                                <b>Status</b>
                            </th>
                            <th class="text-center">
                                <b>Option</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //Menghitung jumlah data barang_harga
                            $JumlahDataBatch=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE id_barang='$id_barang'"));
                            if(empty($JumlahDataBatch)){
                                echo '<tr>';
                                echo '  <td class="text-center" colspan="7">';
                                echo '      Belum ada data Batch barang';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no=1;
                                $QryBatch = mysqli_query($Conn, "SELECT*FROM barang_bacth WHERE id_barang='$id_barang' ORDER BY id_barang_bacth ASC");
                                while ($DataBatch = mysqli_fetch_array($QryBatch)) {
                                    $id_barang_bacth= $DataBatch['id_barang_bacth'];
                                    $id_barang= $DataBatch['id_barang'];
                                    $no_batch= $DataBatch['no_batch'];
                                    $expired_date= $DataBatch['expired_date'];
                                    $qty_batch= $DataBatch['qty_batch'];
                                    $reminder_date= $DataBatch['reminder_date'];
                                    $StatusExpired= $DataBatch['status'];
                                    if(empty($DataBatch['id_barang_satuan'])){
                                        $id_barang_satuan=0;
                                        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                        $DataBarang = mysqli_fetch_array($QryBarang);
                                        $SatuanExpired= $DataBarang['satuan_barang'];
                                    }else{
                                        $id_barang_satuan= $DataBatch['id_barang_satuan'];
                                        $QrySatuanMultiDetail = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
                                        $DataSatuanMultiDetail = mysqli_fetch_array($QrySatuanMultiDetail);
                                        $SatuanExpired= $DataSatuanMultiDetail['satuan_multi'];
                                    }
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo "<small >$no</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$no_batch</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$qty_batch $SatuanExpired</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$expired_date</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$reminder_date</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo "<small>$StatusExpired</small>";
                                    ?>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-success btn-sm btn-floating" data-bs-toggle="modal" data-bs-target="#ModalEditExpiredDate" data-id="<?php echo "$id_barang_bacth"; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>  
                                    <button type="button" class="btn btn-danger btn-sm btn-floating" data-bs-toggle="modal" data-bs-target="#ModalDeleteExpiredDate" data-id="<?php echo "$id_barang_bacth"; ?>">
                                        <i class="bi bi-x"></i>
                                    </button>  
                                </td>
                            </tr>
                        <?php $no++;}} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <small class="credit">
            
        </small>
    </div>
</div>