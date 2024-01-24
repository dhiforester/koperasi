<?php
    date_default_timezone_set("Asia/Jakarta");
    include "../../_Config/Connection.php";
    if(empty($_POST['id_faq'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3 text-center text-danger">';
        echo '      ID FAQ Tidak Bisa Ditangkap Oleh Sistem!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_faq=$_POST['id_faq'];
        $QryFaq = mysqli_query($Conn,"SELECT * FROM faq WHERE id_faq='$id_faq'")or die(mysqli_error($Conn));
        $DataFaq = mysqli_fetch_array($QryFaq);
        $pertanyaan= $DataFaq['pertanyaan'];
        $jawaban= $DataFaq['jawaban'];
?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        <td><b>Petanyaan</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $pertanyaan; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jawaban</b></td>
                        <td><b>:</b></td>
                        <td><?php echo $jawaban; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>