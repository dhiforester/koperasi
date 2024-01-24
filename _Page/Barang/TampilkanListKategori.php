<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Hitung data barang
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori_harga"));
?>
<script>
    <?php 
        $query = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
        while ($data = mysqli_fetch_array($query)) {
            $id= $data['id_barang_kategori_harga'];
    ?>
        //ketika klik page number
        $('#HapusKategoriHargaBarang<?php echo $id;?>').click(function() {
            var id_barang_kategori_harga =<?php echo $id;?>;
            $('#DataNomor<?php echo $id; ?>').html('Loading..');
            $.ajax({
                url     : "_Page/Barang/ProsesHapusKategoriHargaBarang.php",
                method  : "POST",
                data 	:  { id_barang_kategori_harga: id_barang_kategori_harga },
                success: function (data) {
                    $('#DataNomor<?php echo $id; ?>').html(data);
                    var NotifikasiTambahBarangBerhasil=$('#NotifikasiTambahBarangBerhasil').html();
                        if(NotifikasiTambahBarangBerhasil=="Success"){
                        $.ajax({
                            type 	    : 'POST',
                            url 	    : '_Page/Barang/TampilkanListKategori.php',
                            success     : function(data){
                                $('#TampilkanListKategori').html(data);
                            }
                        });
                    }
                }
            })
        });
    <?php } ?>
</script>
<table class="table table-hover table-bordered align-items-center mb-0">
    <thead class="">
        <tr>
            <th class="text-center">
                <b>No</b>
            </th>
            <th class="text-center">
                <b>Kategori</b>
            </th>
            <th class="text-center">
                <b>Option</b>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(empty($jml_data)){
                echo '<tr>';
                echo '  <td colspan="3" align="center">';
                echo '      <span class="text-danger">Tidak Ada Data Kategori Harga</span>';
                echo '  </td>';
                echo '</tr>';
            }else{
                $no = 1;
                $query = mysqli_query($Conn, "SELECT*FROM barang_kategori_harga");
                while ($data = mysqli_fetch_array($query)) {
                    $id_barang_kategori_harga= $data['id_barang_kategori_harga'];
                    $kategori_harga= $data['kategori_harga'];
            ?>
                <tr>
                    <td class="text-center text-xs">
                        <?php echo "$no";?>
                    </td>
                    <td class="text-left text-xs" id="DataNomor<?php echo $id_barang_kategori_harga; ?>">
                        <?php echo "$kategori_harga";?>
                    </td>
                    <td align="center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger btn-sm" id="HapusKategoriHargaBarang<?php echo $id_barang_kategori_harga; ?>" title="Hapus Kategori Harga">
                                <i class="bi bi-x"></i>
                            </button>  
                        </div>
                    </td>
                </tr>
            <?php $no++; }} ?>
    </tbody>
</table>