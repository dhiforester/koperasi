<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set("UTC");
    $datetime=date('Y-m-d H:i:s');
    $datetime=strtotime($datetime);
    //Tangkap data
    if(empty($_POST['id_help'])){
        echo '<span class="text-danger">ID Documentation cannot be empty</span>';
    }else{
        if(empty($_POST['category'])){
            echo '<span class="text-danger">Category cannot be empty</span>';
        }else{
            if(empty($_POST['title'])){
                echo '<span class="text-danger">Title cannot be empty</span>';
            }else{
                if(empty($_POST['description_edit'])){
                    echo '<span class="text-danger">Description cannot be empty</span>';
                }else{
                    //Buat Variabel
                    $id_help=$_POST['id_help'];
                    $category=$_POST['category'];
                    $title=$_POST['title'];
                    $description=$_POST['description_edit'];
                    //Simpan data
                    $UpdateHelpDocumentation = mysqli_query($Conn,"UPDATE help SET 
                        title='$title',
                        category='$category',
                        description='$description',
                        datetime='$datetime'
                    WHERE id_help='$id_help'") or die(mysqli_error($Conn)); 
                    if($UpdateHelpDocumentation){
                        $_SESSION ["NotifikasiSwal"]="Simpan Help Berhasil";
                        echo '<small class="text-success" id="NotifikasiEditHelpBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">An error occurred while inputting data</small>';
                    }
                }
            }
        }
    }
?>