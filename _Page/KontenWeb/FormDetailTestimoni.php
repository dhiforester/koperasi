<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    if(empty($_POST['id_testimoni'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3 text-center text-danger">';
        echo '      ID Testimoni Tidak Bisa Ditangkap Oleh Sistem!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_testimoni=$_POST['id_testimoni'];
        $QryTestimoni = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_testimoni='$id_testimoni'")or die(mysqli_error($Conn));
        $DataTestimoni = mysqli_fetch_array($QryTestimoni);
        $tanggal= $DataTestimoni['tanggal'];
        $nama= $DataTestimoni['nama'];
        $email= $DataTestimoni['email'];
        $image= $DataTestimoni['image'];
        $testimoni= $DataTestimoni['testimoni'];
        $status= $DataTestimoni['status'];
        $strtotime=strtotime($tanggal);
        $tanggal=date('d/m/y H:i',$strtotime);
?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        <td><b>Tanggal</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $tanggal; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama User</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td><b>Testimoni</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $testimoni; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-3 text-center">
            <img src="assets/img/Testimoni/<?php echo $image; ?>" alt="" width="200px" class="rounded">
        </div>
    </div>
<?php } ?>