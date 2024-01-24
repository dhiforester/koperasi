<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_konten_posting_edit'])){
        $id_konten_posting="";
    }else{
        $id_konten_posting=$_POST['id_konten_posting_edit'];
    }
    if(empty($_POST['isi_posting_edit'])){
        $isi_posting="";
    }else{
        $isi_posting=$_POST['isi_posting_edit'];
    }
    echo "$id_konten_posting. $isi_posting";
    //Update
    $Update = mysqli_query($Conn,"UPDATE konten_posting SET 
        isi_posting='$isi_posting'
    WHERE id_konten_posting='$id_konten_posting'") or die(mysqli_error($Conn)); 
    if($Update){
        $_SESSION ["NotifikasiSwal"]="Simpan Konten Web Berhasil";
        echo '<small class="text-success" id="NotifikasiEditPostingBerhasil2">Success</small>';
    }else{
        echo '<small class="text-danger">Update Isi Konten Gagal</small>';
    }
?>