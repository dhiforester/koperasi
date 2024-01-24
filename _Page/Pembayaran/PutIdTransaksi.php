<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_transaksi'])){
        echo '<option value="">Pilih</option>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //keyword_by
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_transaksi= $DataTransaksi['id_transaksi'];
        $kategori= $DataTransaksi['kategori'];
        echo '<option value="'.$id_transaksi.'">'.$id_transaksi.'.'.$kategori.'</option>';
    }
?>