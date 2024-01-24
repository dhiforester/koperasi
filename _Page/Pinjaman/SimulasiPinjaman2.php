<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 mt-3">
                            <b class="card-title"><i class="bi bi-robot"></i> Simulasi Pinjaman</b>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><b>No</b></th>
                                        <th><b>Periode</b></th>
                                        <th><b>Pinjaman</b></th>
                                        <th><b>Angsuran</b></th>
                                        <th><b>Pokok</b></th>
                                        <th><b>Jasa</b></th>
                                        <th><b>Sisa</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(empty($_POST['GetIdPinjaman'])){
                                            echo '<tr><td colspan="7">ID Pinjaman Tidak Boleh Kosong</td></tr>';
                                        }else{
                                            $id_pinjaman=$_POST['GetIdPinjaman'];
                                            //Buka data pinjaman
                                            $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                            $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                            $id_anggota= $DataPinjaman['id_anggota'];
                                            $id_akses= $DataPinjaman['id_akses'];
                                            $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                            $tanggal_input= $DataPinjaman['tanggal_input'];
                                            $nama= $DataPinjaman['nama'];
                                            $jumlah_pinjaman= $DataPinjaman['jumlah_pinjaman'];
                                            $persen_jasa= $DataPinjaman['persen_jasa'];
                                            $nilai_angsuran= $DataPinjaman['nilai_angsuran'];
                                            $periode_angsuran= $DataPinjaman['periode_angsuran'];
                                            $token= $DataPinjaman['token'];
                                            $status= $DataPinjaman['status'];
                                            $strotime1=strtotime($tanggal_pinjaman);
                                            $tanggal_pinjaman2=date('d/m/Y',$strotime1);
                                            $strotime2=strtotime($tanggal_input);
                                            $tanggal_input=date('d/m/Y H:i',$strotime2);
                                            $jasa=($persen_jasa/100)*$jumlah_pinjaman;
                                            $pokok=$nilai_angsuran-$jasa;
                                            $jumlah_pinjaman_rp = "Rp " . number_format($jumlah_pinjaman,0,',','.');
                                            $nilai_angsuran_rp = "Rp " . number_format($nilai_angsuran,0,',','.');
                                            $jasa_rp = "Rp " . number_format($jasa,0,',','.');
                                            $pokok_rp = "Rp " . number_format($pokok,0,',','.');
                                            $JumlahDataAngsuran = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman'"));
                                            $SisaPeriodeAngsuran=$periode_angsuran-$JumlahDataAngsuran;
                                            $TotalAngsuranPokok=0;
                                            $TotalJasa=0;
                                            $TotalAngsuranBruto=0;
                                            $SisaPokok=$jumlah_pinjaman;
                                            $no = 0;
                                            //ARRAY ANGSURAN
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' ORDER BY id_pinjaman_angsuran ASC");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $no =$no+1;
                                                $tanggal= $data['tanggal'];
                                                $kategori_angsuran= $data['kategori_angsuran'];
                                                $jumlah= $data['jumlah'];
                                                $strotime1=strtotime($tanggal);
                                                $tanggal2=date('d/m/Y',$strotime1);
                                                $jasa=($persen_jasa/100)*$jumlah_pinjaman;
                                                $pokok2=$jumlah-$jasa;
                                                $SisaPokok=$SisaPokok-$pokok2;
                                                $jumlah = "" . number_format($jumlah,0,',','.');
                                                $SisaPokokRp = "" . number_format($SisaPokok,0,',','.');
                                                $pokok_rp2 = "" . number_format($pokok2,0,',','.');
                                                echo '<tr>';
                                                echo '  <td class="text-center">'.$no.'</td>';
                                                echo '  <td class="text-left">'.$tanggal2.'</td>';
                                                echo '  <td class="text-right">'.$jumlah_pinjaman_rp.'</td>';
                                                echo '  <td class="text-right">'.$nilai_angsuran_rp.'<br><small class="text-success">('.$jumlah.')</small></td>';
                                                echo '  <td class="text-right">'.$pokok_rp2.'</td>';
                                                echo '  <td class="text-right">'.$jasa_rp.' ('.$persen_jasa.'%)</td>';
                                                echo '  <td class="text-right">'.$SisaPokokRp.'</td>';
                                                echo '';
                                                echo '</tr>';
                                            }       
                                            for ( $i=$JumlahDataAngsuran+1; $i<=$periode_angsuran; $i++ ){
                                                $no =$no+1;
                                                $GetPeriodePinjaman=date('d/m/Y', strtotime('+'.$i.' month', strtotime($tanggal_pinjaman)));
                                                $SisaPokok=$SisaPokok-$pokok;
                                                $SisaPokokRp = "" . number_format($SisaPokok,0,',','.');
                                                echo '<tr>';
                                                echo '  <td class="text-center">'.$no.'</td>';
                                                echo '  <td class="text-left">'.$GetPeriodePinjaman.'</td>';
                                                echo '  <td class="text-right">'.$jumlah_pinjaman_rp.'</td>';
                                                echo '  <td class="text-right">'.$nilai_angsuran_rp.'</td>';
                                                echo '  <td class="text-right">'.$pokok_rp.'</td>';
                                                echo '  <td class="text-right">'.$jasa_rp.' ('.$persen_jasa.'%)</td>';
                                                echo '  <td class="text-right">'.$SisaPokokRp.'</td>';
                                                echo '';
                                                echo '</tr>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            Silahkan hitung kembali secara manual untuk memastikan simulasi pinjaman sudah terhitung dengan benar
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
