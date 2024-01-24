<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_mitra'])){
        echo '<span class="text-danger">ID mitra Tidak Boleh Kosong!</span>';
    }else{
        $id_mitra=$_POST['id_mitra'];
        $HapusRincian = mysqli_query($Conn, "DELETE FROM transaksi_rincian WHERE id_mitra='$id_mitra' AND id_akses='$SessionIdAkses' AND id_transaksi='0'") or die(mysqli_error($Conn));
        if($HapusRincian){
            echo '<span class="text-success" id="NotifikasiBatalkanTransaksiBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Batalkan Transaksi Gagal</span>';
        }
    }
?>