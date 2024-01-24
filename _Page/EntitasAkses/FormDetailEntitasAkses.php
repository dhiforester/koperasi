<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap aksses
    if(empty($_POST['akses'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '         Tidak ada informasi akses yang ditangkap sistem.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $akses=$_POST['akses'];
        //Buka data entitas
        $Qry = mysqli_query($Conn,"SELECT * FROM akses_entitas WHERE akses='$akses'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        $class_label = $Data['class_label'];
        $JumlahUser = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='$akses'"));
        $JumlahRules = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_entitas WHERE akses='$akses'"));
?>
    <div class="row">
        <div class="col-md-12 mb-2">
            <table>
                <tr>
                    <td><b>Nama Akses</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$akses"; ?></td>
                </tr>
                <tr>
                    <td><b>Class Label</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$class_label"; ?></td>
                </tr>
                <tr>
                    <td><b>Jumlah User</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$JumlahUser Orang"; ?></td>
                </tr>
                <tr>
                    <td><b>Jumlah Rules</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$JumlahRules Record"; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-responsive  mb-2" style="height: 300px; overflow-y: scroll;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><b>No</b></th>
                        <th class="text-center"><b>Kode</b></th>
                        <th class="text-center"><b>Keterangan</b></th>
                        <th class="text-center"><b>status</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    //Arraykan data referensi
                    $query = mysqli_query($Conn, "SELECT*FROM akses_referensi ORDER BY kode_referensi ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_akses_referensi= $data['id_akses_referensi'];
                        $kode_referensi= $data['kode_referensi'];
                        $keterangan= $data['keterangan'];
                        //Cek status
                        $CekStatus=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_entitas WHERE akses='$akses' AND kode_akses='$kode_referensi'"));
                        if(empty($CekStatus)){
                            $status='<span class="text-danger"><i class="bi bi-x"></i> No</span>';
                        }else{
                            $status='<span class="text-success"><i class="bi bi-check"></i> Yes</span>';
                        }
                        echo '<tr>';
                        echo '  <td class="text-center">'.$no.'</td>';
                        echo '  <td class="text-left">'.$kode_referensi.'</td>';
                        echo '  <td class="text-left">'.$keterangan.'</td>';
                        echo '  <td class="text-center">'.$status.'</td>';
                        echo '</tr>';
                        $no++;
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>