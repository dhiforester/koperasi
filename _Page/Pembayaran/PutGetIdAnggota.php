<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_anggota'])){
        echo '<option value="">Pilih</option>';
    }else{
        $id_anggota=$_POST['id_anggota'];
        //Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $nama= $DataAnggota['nama'];
        echo '<option value="'.$id_anggota.'">'.$id_anggota.'.'.$nama.'</option>';
    }
?>