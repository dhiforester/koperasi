<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_testimoni'])){
        echo '<span class="text-danger">ID Testimoni tidak boleh Kosong</span>';
    }else{
        $id_testimoni=$_POST['id_testimoni'];
        $QryPagePosting = mysqli_query($Conn,"SELECT * FROM testimoni WHERE id_testimoni='$id_testimoni'")or die(mysqli_error($Conn));
        $DataPagePosting = mysqli_fetch_array($QryPagePosting);
        $image= $DataPagePosting['image'];
        //Unlink Page Posting
        $UrlImagePosting="../../assets/img/Testimoni/$image";
        unlink($UrlImagePosting);
        if(!file_exists($UrlImagePosting)){
            //Proses hapus data
            $HapusPagePosting = mysqli_query($Conn, "DELETE FROM testimoni WHERE id_testimoni='$id_testimoni'") or die(mysqli_error($Conn));
            if($HapusPagePosting){
                echo '<span class="text-success" id="NotifikasiHapusTestimoniBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Data Gagal!</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus File Gagal!</span>';
        }
    }
?>