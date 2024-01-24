<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_konten_posting'])){
        echo '<span class="text-danger">ID Konten tidak boleh Kosong</span>';
    }else{
        $id_konten_posting=$_POST['id_konten_posting'];
        $QryPagePosting = mysqli_query($Conn,"SELECT * FROM konten_posting WHERE id_konten_posting='$id_konten_posting'")or die(mysqli_error($Conn));
        $DataPagePosting = mysqli_fetch_array($QryPagePosting);
        $image_posting= $DataPagePosting['image_posting'];
        //Unlink Page Posting
        $UrlImagePosting="../../assets/img/Posting/$image_posting";
        unlink($UrlImagePosting);
        if(!file_exists($UrlImagePosting)){
            //Proses hapus data
            $HapusPagePosting = mysqli_query($Conn, "DELETE FROM konten_posting WHERE id_konten_posting='$id_konten_posting'") or die(mysqli_error($Conn));
            if($HapusPagePosting){
                echo '<span class="text-success" id="NotifikasiHapusPagePostingBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Hapus Data Gagal!</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus File Gagal!</span>';
        }
    }
?>