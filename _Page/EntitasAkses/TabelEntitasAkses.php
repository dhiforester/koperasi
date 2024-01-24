<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT akses FROM akses_entitas"));
    $JumlahReferensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_referensi"));
?>
<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Akses</b>
                            </th>
                            <th class="text-center">
                                <b>Label</b>
                            </th>
                            <th class="text-center">
                                <b>User</b>
                            </th>
                            <th class="text-center">
                                <b>Rules</b>
                            </th>
                            <th class="text-center">
                                <b>Opsi</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="6">';
                                echo '      <span class="text-danger">Tidak Ada Entitas Akses Yang Terdata</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no = 1;
                                $query = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses_entitas ORDER BY akses ASC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $akses= $data['akses'];
                                    //Bka Detail Akses entitas
                                    $QryEntitas = mysqli_query($Conn,"SELECT * FROM akses_entitas WHERE akses='$akses'")or die(mysqli_error($Conn));
                                    $DataEntitas = mysqli_fetch_array($QryEntitas);
                                    $class_label = $DataEntitas['class_label'];
                                    $JumlahUser = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='$akses'"));
                                    $JumlahRules = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_entitas WHERE akses='$akses'"));
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left text-xs" align="left">
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailEntitas" data-id="<?php echo "$akses"; ?>" title="Detail Entitas Akses">
                                        <?php echo "<b>$akses</b>"; ?>
                                    </a>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<span class="badge badge-sm '.$class_label.'">'.$akses.'</span>';
                                    ?>
                                </td>
                                <td class="text-left text-xs" align="left">
                                    <?php 
                                        echo "$JumlahUser User"; 
                                    ?>
                                </td>
                                <td class="text-left text-xs" align="left">
                                    <?php 
                                        echo "$JumlahRules Record"; 
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditEntitas" data-id="<?php echo "$akses"; ?>" title="Ubah Entitas Akses">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>  
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteEntitas" data-id="<?php echo "$akses"; ?>" title="Hapus Entitas Akses">
                                            <i class="bi bi-x"></i>
                                        </button>   
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $no++; }}
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-left">
    <small>
        <b>Jumlah Entitas :</b> <?php echo $jml_data;?><br>
        <b>Jumlah Referensi :</b> <?php echo $JumlahReferensi;?>
    </small>
</div>