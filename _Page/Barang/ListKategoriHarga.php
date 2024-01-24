<?php
    //menangkap data
    if(empty($_POST['jumlah_kategori_harga'])){
        $jumlah_kategori_harga=1;
    }else{
        $jumlah_kategori_harga=$_POST['jumlah_kategori_harga'];
    }
    $jumlah_kategori_harga_baru=$jumlah_kategori_harga+1;
    echo '<input type="hidden" name="jumlah_kategori_harga" id="jumlah_kategori_harga" value="'.$jumlah_kategori_harga_baru.'">';
    //Lakukan array/looping
    $a=1;
    $b=$jumlah_kategori_harga_baru;
    for ( $i=$a; $i<=$b; $i++ ){
        if(!empty($_POST["kategori_harga$i"])){
            $kategori_harga=$_POST["kategori_harga$i"];
        }else{
            $kategori_harga="";
        }
        if(!empty($_POST["harga_jual$i"])){
            $harga_jual=$_POST["harga_jual$i"];
        }else{
            $harga_jual="";
        }
?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kategori_harga<?php echo $i;?>"><small>Kategori Harga Jual <?php echo $i;?></small></label>
            <input type="text" name="kategori_harga<?php echo $i;?>" id="kategori_harga<?php echo $i;?>" class="form-control" value="<?php echo $kategori_harga;?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="harga_jual<?php echo $i;?>"><small>Harga Jual <?php echo $i;?></small></label>
            <input type="number" name="harga_jual<?php echo $i;?>" id="harga_jual<?php echo $i;?>" class="form-control" value="<?php echo $harga_jual;?>">
        </div>
    </div>
<?php } ?>