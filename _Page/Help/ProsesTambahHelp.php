<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("UTC");
    $datetime=date('Y-m-d H:i:s');
    $datetime=strtotime($datetime);
    //Tangkap data
    if(empty($_POST['category'])){
        echo '<span class="text-danger">Category cannot be empty</span>';
    }else{
        if(empty($_POST['title'])){
            echo '<span class="text-danger">Title cannot be empty</span>';
        }else{
            if(empty($_POST['description'])){
                echo '<span class="text-danger">Description cannot be empty</span>';
            }else{
                //Buat Variabel
                $category=$_POST['category'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                //Simpan data
                $entry="INSERT INTO help (
                    title,
                    category,
                    description,
                    datetime
                ) VALUES (
                    '$title',
                    '$category',
                    '$description',
                    '$datetime'
                )";
                $Input=mysqli_query($Conn, $entry);
                if($Input){
                    $_SESSION ["NotifikasiSwal"]="Simpan Help Berhasil";
                    echo '<small class="text-success" id="NotifikasiTambahHelpBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">An error occurred while inputting data</small>';
                }
            }
        }
    }
?>