<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_faq'])){
        echo '<span class="text-danger">ID FAQ Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['pertanyaan'])){
            echo '<span class="text-danger">Pertanyaan Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['jawaban'])){
                echo '<span class="text-danger">Jawaban Tidak Boleh Kosong</span>';
            }else{
                $id_faq=$_POST['id_faq'];
                $pertanyaan=$_POST['pertanyaan'];
                $jawaban=$_POST['jawaban'];
                $UpdateFaq = mysqli_query($Conn,"UPDATE faq SET 
                    pertanyaan='$pertanyaan',
                    jawaban='$jawaban'
                WHERE id_faq='$id_faq'") or die(mysqli_error($Conn)); 
                if($UpdateFaq){
                    echo '<small class="text-success" id="NotifikasiEditFaqBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Update Data Gagal</small>';
                }
            }
        }
    }
?>