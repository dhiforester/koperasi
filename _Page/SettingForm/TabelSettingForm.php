<?php
    //koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM form_medrek"));
?>
<div class="table-responsive">
    <table class="table table-hover table-bordered align-items-center mb-0">
        <thead class="">
            <tr>
                <th class="text-center">
                    <b>No</b>
                </th>
                <th class="text-center">
                    <b>Nama Form</b>
                </th>
                <th class="text-center">
                    <b>Update Time</b>
                </th>
                <th class="text-center">
                    <b>Option</b>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(empty($jml_data)){
                    echo '<tr>';
                    echo '  <td colspan="4" class="text-center">';
                    echo '      <span class="text-danger">No Data</span>';
                    echo '  </td>';
                    echo '</tr>';
                }else{
                    $no=1;
                    $QryForm = mysqli_query($Conn, "SELECT * FROM form_medrek ORDER BY id_form_medrek ASC");
                    while ($DataForm = mysqli_fetch_array($QryForm)) {
                        $id_form_medrek=$DataForm['id_form_medrek'];
                        $nama_form_medrek=$DataForm['nama_form_medrek'];
                        $deskripsi_form_medrek=$DataForm['deskripsi_form_medrek'];
                        $form_medrek=$DataForm['form_medrek'];
                        $updatetime=$DataForm['updatetime'];
                        //Format ulang tanggal
                        $strtotime=strtotime($updatetime);
                        $tanggal_update=date('d F y H:i', $strtotime);
                    ?>
                        <tr>
                            <td class="text-xs" align="right">
                                <?php echo "$no" ?>
                            </td>
                            <td class="text-left" align="left">
                                <small class="credit">
                                    <?php echo "<b>$nama_form_medrek</b><br>";?>
                                    <?php echo "<i>$deskripsi_form_medrek</i><br>";?>
                                </small>
                            </td>
                            <td class="text-left text-xs">
                                <?php echo "<small>$tanggal_update</small>" ?>
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <a href="index.php?Page=SettingForm&Sub=EditSettingForm&id=<?php echo $id_form_medrek;?>" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>  
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteSettingForm" data-id="<?php echo "$id_form_medrek"; ?>">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                <?php
                            $no++; 
                        }
                    }
                ?>
        </tbody>
    </table>
</div>