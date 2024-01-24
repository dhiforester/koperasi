<?php
    //Tangkap variabel
    if(!empty($_POST['GetPpnPersen'])){
        $GetPpnPersen=$_POST['GetPpnPersen'];
    }else{
        $GetPpnPersen=0;
    }
    if(!empty($_POST['GetSubtotal'])){
        $GetSubtotal=$_POST['GetSubtotal'];
    }else{
        $GetSubtotal=0;
    }
    //menghilangkan tanda titik
    $GetPpnPersen= str_replace(".", "", $GetPpnPersen);
    $GetSubtotal= str_replace(".", "", $GetSubtotal);
    $GetPpnRpEdit=($GetPpnPersen/100)*$GetSubtotal;
    $GetPpnRpEdit = "" . number_format($GetPpnRpEdit,0,',','.');
    echo "$GetPpnRpEdit";
?>