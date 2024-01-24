<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_help'])){
        echo '<span class="text-danger">Help Documentation ID Cannot Be Captured By System</span>';
    }else{
        if(empty($_POST['akses'])){
            echo '<span class="text-danger">Access Name Cannot Be Captured By System</span>';
        }else{
            $JumlahDataYangDipilih=count($_POST['akses']);
            $id_help=$_POST['id_help'];
            //Hapus data 
            $HapusHelAkses = mysqli_query($Conn, "DELETE FROM help_access WHERE id_help='$id_help'") or die(mysqli_error($Conn));
            if(!$HapusHelAkses) {
                echo '<span class="text-danger">An error occurred while deleting previous data</span>';
            }else{
                $sukses_simpan=0;
                for($x=0;$x<$JumlahDataYangDipilih;$x++){
                    $akses=$_POST["akses"][$x];
                    //Simpan Data
                    $QrySave="INSERT INTO help_access (
                        id_help,
                        akses
                    ) VALUES (
                        '$id_help',
                        '$akses'
                    )";
                    $Input=mysqli_query($Conn, $QrySave);
                    if($Input){
                        $sukses_simpan=$sukses_simpan+1;
                    }else{
                        $sukses_simpan=$sukses_simpan+0;
                    }
                }
                if($JumlahDataYangDipilih==$sukses_simpan){
                    $_SESSION ["NotifikasiSwal"]="Simpan Help Berhasil";
                    echo '<span class="text-success" id="NotifikasiSimpanAksesHelpBerhasil">Success</span>';
                }else{
                    echo '<span class="text-danger">Some Data Cannot Be Saved</span>';
                }
            }
        }
    }
?>