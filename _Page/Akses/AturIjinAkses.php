<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_akses'])){
        echo '<section class="section dashboard">';
        echo '  <div class="row">';
        echo '      <div class="col-lg-12">';
        echo '          <div class="card">';
        echo '              <div class="card-body">';
        echo '                  ID Akses Tidak Boleh Kosong';
        echo '              </div>';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_akses=$_POST['id_akses'];
        $JumlahReferensi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_referensi"));
?>
    <script>
        //Kondisi ketika checkall checkd
        $("#checkall").click(function(){
            $('.checkall').not(this).prop('checked', this.checked);
        });
        //Proses Atur Ijin Akses
        $('#ProsesIjinAkses').submit(function(){
            $('#NotifikasiAturIjinAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
            var form = $('#ProsesIjinAkses')[0];
            var data = new FormData(form);
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Akses/ProsesIjinAkses.php',
                data 	    :  data,
                cache       : false,
                processData : false,
                contentType : false,
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#NotifikasiAturIjinAkses').html(data);
                    var NotifikasiAturIjinAksesBerhasil=$('#NotifikasiAturIjinAksesBerhasil').html();
                    if(NotifikasiAturIjinAksesBerhasil=="Success"){
                        var GetIdAkses=$('#GetIdAkses').html();
                        $('#HalamanDetailAkses').html('Loading...');
                        $.ajax({
                            type 	    : 'POST',
                            url 	    : '_Page/Akses/AturIjinAkses.php',
                            data 	    :  {id_akses: GetIdAkses},
                            success     : function(data){
                                $('#HalamanDetailAkses').html(data);
                                swal("Good Job!", "Atur Ijin Akses Berhasil!", "success");
                            }
                        });
                        
                    }
                }
            });
        });
    </script>
    <form action="javascript:void(0);" id="ProsesIjinAkses">
        <input type="hidden" name="id_akses" id="id_akses" value="<?php echo "$id_akses"; ?>">
        <div class="card">
            <div class="card-header">
                <b class="card-title">
                    <i class="bi bi-info-circle"></i> Atur Ijin Akses
                </b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive table-bordered table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <input class="form-check-input" type="checkbox" value="Ya" id="checkall" name="checkall">
                                        <label for="checkall"><b>Check</b></label>
                                    </th>
                                    <th class="text-center"><b>No</b></th>
                                    <th class="text-center"><b>Kode Akses</b></th>
                                    <th class="text-center"><b>Keterangan</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(empty($JumlahReferensi)){
                                        echo '<tr>';
                                        echo '  <td colspan="4" class="text-center">Tidak Ada Referensi Entitas Akses</td>';
                                        echo '</tr>';
                                    }else{
                                        $no=1;
                                        //Arraykan data referensi
                                        $query = mysqli_query($Conn, "SELECT*FROM akses_referensi ORDER BY kode_referensi ASC");
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id_akses_referensi= $data['id_akses_referensi'];
                                            $kode_referensi= $data['kode_referensi'];
                                            $keterangan= $data['keterangan'];
                                            //Cek Ijin Akses
                                            $CekIjinAkses = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses_ijin WHERE id_akses='$id_akses' AND kode_akses='$kode_referensi'"));
                                            if(empty($CekIjinAkses)){
                                                $Checked="";
                                            }else{
                                                $Checked="checked";
                                            }
                                            echo '<tr>';
                                            echo '  <td class="text-center">';
                                            echo '      <input class="form-check-input checkall" '.$Checked.' type="checkbox" value="'.$kode_referensi.'" id="'.$kode_referensi.'" name="'.$kode_referensi.'">';
                                            echo '  </td>';
                                            echo '  <td class="text-center">'.$no.'</td>';
                                            echo '  <td class="text-left"><label for="'.$kode_referensi.'">'.$kode_referensi.'</label></td>';
                                            echo '  <td class="text-left"><label for="'.$kode_referensi.'">'.$keterangan.'</label></td>';
                                            echo '</tr>';
                                            $no++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="NotifikasiAturIjinAkses">
                        <span class="text-primary">Pastikan Ijin Akses yang Anda Atur Sudah Benar!</span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Ijin Akses">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalKembalikanStandar" data-id="<?php echo "$id_akses"; ?>" title="Kembalikan Ke settingan Entitas Akses">
                    <i class="bi bi-arrow-counterclockwise"></i> Kembalikan Standar
                </button>
            </div>
        </div>
    </form>
<?php } ?>