<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_mitra'])){
        echo '<option value="">Pilih</option>';
    }else{
        $id_mitra=$_POST['id_mitra'];
        echo '<option value="">Pilih</option>';
        //Menampilkan Akun Perkiraan
        $QryAkun = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE id_mitra='$id_mitra' OR id_mitra='0' ORDER BY nama ASC");
        while ($DataAkun = mysqli_fetch_array($QryAkun)) {
            $id_perkiraan= $DataAkun['id_perkiraan'];
            $nama= $DataAkun['nama'];
            echo '<option value="'.$id_perkiraan.'">'.$nama.'</option>';
        }
    }
?>