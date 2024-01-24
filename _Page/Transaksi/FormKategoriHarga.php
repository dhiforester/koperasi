<?php
    //Koneksi
    include "../../_Config/Connection.php";
    //Tangkap Data
    if(empty($_POST['id_barang'])){
        echo '<label for="id_barang_harga">Kategori Harga</label>';
        echo '<select name="id_barang_harga" id="id_barang_harga" class="form-control">';
        echo '<option value="0">Harga Beli</option>';
        $QryHargaMulti= mysqli_query($Conn, "SELECT*FROM barang_harga");
        while ($DataHargaMulti = mysqli_fetch_array($QryHargaMulti)) {
            $id_barang_harga= $DataHargaMulti['id_barang_harga'];
            $kategori_harga= $DataHargaMulti['kategori_harga'];
            $HargaMutli= $DataHargaMulti['harga'];
            echo '<option value="'.$id_barang_harga.'">'.$kategori_harga.'</option>';
        }
        echo '</select>';
    }else{
        $id_barang=$_POST['id_barang'];
        if(empty($_POST['rincian_satuan_barang'])){
            echo '<label for="id_barang_harga">Kategori Harga</label>';
            echo '<select name="id_barang_harga" id="id_barang_harga" class="form-control">';
            echo '  <option value="0">Harga Beli</option>';
                $QryHargaMulti= mysqli_query($Conn, "SELECT*FROM barang_harga WHERE id_barang='$id_barang'");
                while ($DataHargaMulti = mysqli_fetch_array($QryHargaMulti)) {
                    $id_barang_harga= $DataHargaMulti['id_barang_harga'];
                    $kategori_harga= $DataHargaMulti['kategori_harga'];
                    $HargaMutli= $DataHargaMulti['harga'];
                    echo '<option value="'.$id_barang_harga.'">'.$kategori_harga.'</option>';
                }
            echo '</select>';
        }else{
            $rincian_satuan_barang=$_POST['rincian_satuan_barang'];
            //Mencari id_barang_satuan
            $Qrysatuan = mysqli_query($Conn,"SELECT * FROM barang_satuan WHERE id_barang='$id_barang' AND satuan_multi='$rincian_satuan_barang'")or die(mysqli_error($Conn));
            $DataSatuan = mysqli_fetch_array($Qrysatuan);
            if(empty($DataSatuan['id_barang_satuan'])){
                $id_barang_satuan=0;
            }else{
                $id_barang_satuan=$DataSatuan['id_barang_satuan'];
            }
            echo '<label for="id_barang_harga">Kategori Harga</label>';
            echo '<select name="id_barang_harga" id="id_barang_harga" class="form-control">';
            echo '  <option value="0">Harga Beli</option>';
                $QryHargaMulti= mysqli_query($Conn, "SELECT*FROM barang_harga WHERE id_barang='$id_barang' AND id_barang_satuan='$rincian_satuan_barang'");
                while ($DataHargaMulti = mysqli_fetch_array($QryHargaMulti)) {
                    $id_barang_harga= $DataHargaMulti['id_barang_harga'];
                    $kategori_harga= $DataHargaMulti['kategori_harga'];
                    $HargaMutli= $DataHargaMulti['harga'];
                    echo '<option value="'.$id_barang_harga.'">'.$kategori_harga.'</option>';
                }
            echo '</select>';
        }
    }
?>