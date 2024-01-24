<?php
    if(empty($_POST['id_help'])){
        echo '<tr><td colspan="3" align="center">Documentation Data ID Cannot Be Empty</td></tr>';
    }else{
        $id_help=$_POST['id_help'];
        //Koneksi
        include "../../_Config/Connection.php";
        echo '<input type="hidden" name="id_help" value="'.$id_help.'">';
        //Arraykan data akses
        $no=1;
        $QryAkses = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses ORDER BY akses ASC");
        while ($DataAkses = mysqli_fetch_array($QryAkses)) {
            $ListAkses=$DataAkses['akses'];
            //Cek pada data help akses
            $QryHelpAkses = mysqli_query($Conn,"SELECT * FROM help_access WHERE id_help='$id_help' AND akses='$ListAkses'")or die(mysqli_error($Conn));
            $DataHelpAkses = mysqli_fetch_array($QryHelpAkses);
            if(!empty($DataHelpAkses['id_help_access'])){
                $id_help_access=$DataHelpAkses['id_help_access'];
            }else{
                $id_help_access="";
            }
            echo '<tr>';
            echo '  <td align="center">'.$no.'</td>';
            echo '  <td align="left">'.$ListAkses.'</td>';
            echo '  <td align="center">';
            if(empty($DataHelpAkses['id_help_access'])){
                echo '      <input type="checkbox" name="akses[]" value="'.$ListAkses.'">';
            }else{
                echo '      <input type="checkbox" checked name="akses[]" value="'.$ListAkses.'">';
            }
            echo '  </td>';
            echo '</tr>';
            $no++;
        }
    }
?>