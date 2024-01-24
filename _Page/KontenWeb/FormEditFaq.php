<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    if(empty($_POST['id_faq'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3 text-center text-danger">';
        echo '      ID Testimoni Tidak Bisa Ditangkap Oleh Sistem!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_faq=$_POST['id_faq'];
        $QryFaq = mysqli_query($Conn,"SELECT * FROM faq WHERE id_faq='$id_faq'")or die(mysqli_error($Conn));
        $DataFaq = mysqli_fetch_array($QryFaq);
        $pertanyaan= $DataFaq['pertanyaan'];
        $jawaban= $DataFaq['jawaban'];
?>
    <input type="hidden" name="id_faq" id="id_faq" value="<?php echo "$id_faq";?>">
    <div class="row">
    <div class="col-md-12 mb-3">
        <label for="pertanyaan">Pertanyaan</label>
        <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="3" class="form-control"><?php echo "$pertanyaan"; ?></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="jawaban">Jawaban</label>
        <textarea name="jawaban" id="jawaban" cols="30" rows="3" class="form-control"><?php echo "$jawaban"; ?></textarea>
    </div>
</div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiEditFaq">
            <small class="credit text-primary">Pastikan FAQ Yang Anda Input Sudah Benar</small>
        </div>
    </div>
<?php } ?>