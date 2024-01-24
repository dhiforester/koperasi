<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_konten_url'])){
        echo '<span class="text-danger">ID Konten tidak boleh Kosong</span>';
    }else{
        $id_konten_url=$_POST['id_konten_url'];
        $QryPagePosting = mysqli_query($Conn,"SELECT * FROM konten_url WHERE id_konten_url='$id_konten_url'")or die(mysqli_error($Conn));
        $DataPagePosting = mysqli_fetch_array($QryPagePosting);
        $image_url= $DataPagePosting['image_url'];
        //Unlink Page Posting
        $UrlImagePosting="../../assets/img/Posting/$image_url";
        unlink($UrlImagePosting);
        if(!file_exists($UrlImagePosting)){
            //Proses hapus data
            $HapusPagePosting = mysqli_query($Conn, "DELETE FROM konten_url WHERE id_konten_url='$id_konten_url'") or die(mysqli_error($Conn));
            if($HapusPagePosting){
                echo '<span class="text-success" id="NotifikasiHapusPUrlDinamisBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Data Gagal!</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus File Gagal!</span>';
        }
    }
?>