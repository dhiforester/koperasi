<?php
    if(empty($_GET['Sub'])){
        include "_Page/RiwayatAnggota/Pembelian.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Pembelian"){
            include "_Page/RiwayatAnggota/Pembelian.php";
        }else{
            if($Sub=="Simpanan"){
                include "_Page/RiwayatAnggota/Simpanan.php";
            }else{
                if($Sub=="Pinjaman"){
                    include "_Page/RiwayatAnggota/Pinjaman.php";
                }else{
                    if($Sub=="Angsuran"){
                        include "_Page/RiwayatAnggota/Angsuran.php";
                    }else{
                        if($Sub=="DetailPembelian"){
                            include "_Page/RiwayatAnggota/DetailPembelian.php";
                        }else{
                            if($Sub=="DetailPinjaman"){
                                include "_Page/RiwayatAnggota/DetailPinjaman.php";
                            }else{
                                include "_Page/RiwayatAnggota/Pembelian.php";
                            }
                        }
                    }
                }
            }
        }
    }
?>