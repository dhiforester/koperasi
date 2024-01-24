<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['pertanyaan'])){
        echo '<span class="text-danger">Pertanyaan Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['jawaban'])){
            echo '<span class="text-danger">Jawaban Tidak Boleh Kosong</span>';
        }else{
            $pertanyaan=$_POST['pertanyaan'];
            $jawaban=$_POST['jawaban'];
            $entry="INSERT INTO faq (
                pertanyaan,
                jawaban
            ) VALUES (
                '$pertanyaan',
                '$jawaban'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $_SESSION ["NotifikasiSwal"]="Tambah FAQ Berhasil";
                echo '<small class="text-success" id="NotifikasiTambahFaqBerhasil">Success</small>';
            }else{
                echo '<small class="text-danger">Input Data Gagal</small>';
            }
        }
    }
    
?>