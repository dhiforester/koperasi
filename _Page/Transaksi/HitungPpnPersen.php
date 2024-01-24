<?php
    //Tangkap variabel
    if(!empty($_POST['GetPpnRp'])){
        $GetPpnRp=$_POST['GetPpnRp'];
    }else{
        $GetPpnRp=0;
    }
    if(!empty($_POST['GetSubtotal'])){
        $GetSubtotal=$_POST['GetSubtotal'];
    }else{
        $GetSubtotal=0;
    }
    //menghilangkan tanda titik
    $GetPpnRp= str_replace(".", "", $GetPpnRp);
    $GetSubtotal= str_replace(".", "", $GetSubtotal);
    $GetPpnPersenEdit=($GetPpnRp/$GetSubtotal)*100;
    $GetPpnPersenEdit = "" . number_format($GetPpnPersenEdit,0,',','.');
    echo "$GetPpnPersenEdit";
?>