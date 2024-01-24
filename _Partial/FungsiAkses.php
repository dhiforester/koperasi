<?php
    function IjinAksesKode($Conn,$IdAksesBersangkutan, $KodeAksesBersangkutan){
        $QryIjinAkses = mysqli_query($Conn,"SELECT * FROM akses_ijin WHERE id_akses='$IdAksesBersangkutan' AND kode_akses='$KodeAksesBersangkutan'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryIjinAkses);
        if(!empty($DataDetailAkses['kode_akses'])){
            $kode=$DataDetailAkses['kode_akses'];
        }else{
            $kode="";
        }
        return $kode;
    }
    $AKS=IjinAksesKode($Conn,$SessionIdAkses,'AKS');
    $ANG=IjinAksesKode($Conn,$SessionIdAkses,'ANG');
    $SMPN=IjinAksesKode($Conn,$SessionIdAkses,'SMPN');
    $PNJM=IjinAksesKode($Conn,$SessionIdAkses,'PNJM');
    $BGH=IjinAksesKode($Conn,$SessionIdAkses,'BGH');
    $SPP=IjinAksesKode($Conn,$SessionIdAkses,'SPP');
    $SMB=IjinAksesKode($Conn,$SessionIdAkses,'SMB');
    $BTE=IjinAksesKode($Conn,$SessionIdAkses,'BTE');
    $STO=IjinAksesKode($Conn,$SessionIdAkses,'STO');
    $TRANS=IjinAksesKode($Conn,$SessionIdAkses,'TRANS');
    $PMB=IjinAksesKode($Conn,$SessionIdAkses,'PMB');
    $AKP=IjinAksesKode($Conn,$SessionIdAkses,'AKP');
    $JRNL=IjinAksesKode($Conn,$SessionIdAkses,'JRNL');
    $BKBS=IjinAksesKode($Conn,$SessionIdAkses,'BKBS');
    $NRC=IjinAksesKode($Conn,$SessionIdAkses,'NRC');
    $LBRG=IjinAksesKode($Conn,$SessionIdAkses,'LBRG');
    $RKP=IjinAksesKode($Conn,$SessionIdAkses,'RKP');
    $UMM=IjinAksesKode($Conn,$SessionIdAkses,'UMM');
    $ETAK=IjinAksesKode($Conn,$SessionIdAkses,'ETAK');
    $ATJR=IjinAksesKode($Conn,$SessionIdAkses,'ATJR');
    $EML=IjinAksesKode($Conn,$SessionIdAkses,'EML');
    $AKUM=IjinAksesKode($Conn,$SessionIdAkses,'AKUM');
    $AKEM=IjinAksesKode($Conn,$SessionIdAkses,'AKEM');
    $BNT=IjinAksesKode($Conn,$SessionIdAkses,'BNT');
    $DKM=IjinAksesKode($Conn,$SessionIdAkses,'DKM');
    $TNT=IjinAksesKode($Conn,$SessionIdAkses,'TNT');
?>