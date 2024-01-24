<?php
    //Koneksi
    include "../../_Config/Connection.php";
    //Tangkap id_anggota
    if(!empty($_POST['id_anggota'])){
        $id_anggota=$_POST['id_anggota'];
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $tanggal_masuk= $DataAnggota['tanggal_masuk'];
        $nama= $DataAnggota['nama'];
        echo '<option value="'.$id_anggota.'">'.$nama.'</option>';
    }
?>