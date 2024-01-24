<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_faq'])){
        echo '<span class="text-danger">ID FAQ Tidak Boleh Kosong</span>';
    }else{
        $id_faq=$_POST['id_faq'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM faq WHERE id_faq='$id_faq'") or die(mysqli_error($Conn));
        if ($query) {
            echo '<span class="text-success" id="NotifikasiHapusFaqBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal!</span>';
        }
    }
?>