<label for="PilihSupplier">Supplier</label>
<select name="id_supplier" id="PilihSupplier" class="form-control">
    <option value="">Pilih</option>
    <?php
        if(!empty($GetIdMitraUrl)){
            $QrySupplierByMitra = mysqli_query($Conn, "SELECT*FROM supplier WHERE id_mitra='$GetIdMitraUrl' ORDER BY id_supplier ASC");
            while ($DataSupplierByMitra = mysqli_fetch_array($QrySupplierByMitra)) {
                $id_supplier= $DataSupplierByMitra['id_supplier'];
                $NamaSupplier= $DataSupplierByMitra['nama_supplier'];
                if($GetIdSupplier==$id_supplier){
                    echo '<option selected value="'.$id_supplier.'">'.$NamaSupplier.'</option>';
                }else{
                    echo '<option value="'.$id_supplier.'">'.$NamaSupplier.'</option>';
                }
            }
        }
    ?>
</select>