<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    //keyword
    if(empty($_POST['GetIdPinjaman'])){
        echo 'ID Pinjaman Tidak Boleh Kosong';
    }else{
        $id_pinjaman=$_POST['GetIdPinjaman'];
        $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
        $DataPinjaman = mysqli_fetch_array($QryPinjaman);
        $jumlah_pinjaman= $DataPinjaman['jumlah_pinjaman'];
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman='$id_pinjaman'"));
?>
<div class="card-body">
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Tanggal</b>
                            </th>
                            <th class="text-center">
                                <b>Referensi</b>
                            </th>
                            <th class="text-center">
                                <b>Kode</b>
                            </th>
                            <th class="text-center">
                                <b>Akun</b>
                            </th>
                            <th class="text-center">
                                <b>Debet</b>
                            </th>
                            <th class="text-center">
                                <b>Kredit</b>
                            </th>
                            <th class="text-center">
                                <b>Opsi</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="7">';
                                echo '      <span class="text-danger">Belum Memiliki Data Jurnal</span>';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $no=1;
                                $JumlahSaldoDebet=0;
                                $JumlahSaldoKredit=0;
                                $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_pinjaman='$id_pinjaman' ORDER BY tanggal DESC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_jurnal= $data['id_jurnal'];
                                    if(empty($data['id_transaksi'])){
                                        if(empty($data['id_simpanan'])){
                                            if(empty($data['id_pinjaman_angsuran'])){
                                                if(empty($data['id_pinjaman'])){
                                                    if(empty($data['id_shu_session'])){
                                                        $LabelTransaksi="<span class='text-danger'>None</span>";
                                                    }else{
                                                        $id_shu_session = $data['id_shu_session'];
                                                        //buka SHU
                                                        $QryBagiHasil = mysqli_query($Conn,"SELECT * FROM shu_session WHERE id_shu_session='$id_shu_session'")or die(mysqli_error($Conn));
                                                        $DatabagiHasil = mysqli_fetch_array($QryBagiHasil);
                                                        $sesi_shu= $DatabagiHasil['sesi_shu'];
                                                        $LabelTransaksi="<span class='text-dark' title='Referensi Bagi Hasil'>BGHSL.$id_shu_session</span>";
                                                    }
                                                }else{
                                                    $id_pinjaman = $data['id_pinjaman'];
                                                    //buka pinjaman
                                                    $QryPinjaman = mysqli_query($Conn,"SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'")or die(mysqli_error($Conn));
                                                    $DataPinjaman = mysqli_fetch_array($QryPinjaman);
                                                    $tanggal_pinjaman= $DataPinjaman['tanggal_pinjaman'];
                                                    $LabelTransaksi="<span class='text-dark' title='Referensi Pinjaman'>PNJM.$id_pinjaman</span>";
                                                }
                                            }else{
                                                $id_pinjaman_angsuran = $data['id_pinjaman_angsuran'];
                                                //buka Angsuran
                                                $Qryangsuran = mysqli_query($Conn,"SELECT * FROM pinjaman_angsuran WHERE id_pinjaman_angsuran='$id_pinjaman_angsuran'")or die(mysqli_error($Conn));
                                                $DataAngsuran = mysqli_fetch_array($Qryangsuran);
                                                $KategoriTransaksi= $DataAngsuran['kategori_angsuran'];
                                                if($KategoriTransaksi=="Pokok"){
                                                    $LabelTransaksi="<span class='text-dark' title='Referensi Angsuran Pokok'>ANG.PKK.$id_pinjaman_angsuran</span>";
                                                }else{
                                                    if($KategoriTransaksi=="Denda"){
                                                        $LabelTransaksi="<span class='text-dark' title='Referensi Denda Angsuran'>ANG.DND.$id_pinjaman_angsuran</span>";
                                                    }else{
                                                        if($KategoriTransaksi=="Jasa"){
                                                            $LabelTransaksi="<span class='text-dark' title='Referensi Jasa Angsuran'>ANG.JSA.$id_pinjaman_angsuran</span>";
                                                        }else{
                                                            $LabelTransaksi="<span class='text-dark' title='Referensi Angsuran'>ANG.$id_pinjaman_angsuran</span>";
                                                        }
                                                    }
                                                }
                                                
                                            }
                                        }else{
                                            $id_simpanan = $data['id_simpanan'];
                                            //buka Simpanan
                                            $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
                                            $DataSimpanan = mysqli_fetch_array($QrySimpanan);
                                            $KategoriTransaksi= $DataSimpanan['kategori'];
                                            if($KategoriTransaksi=="Simpanan Pokok"){
                                                $LabelTransaksi="<span class='text-dark' title='Simpanan Pokok'>SMP.PKK.$id_simpanan</span>";
                                            }else{
                                                if($KategoriTransaksi=="Simpanan Wajib"){
                                                    $LabelTransaksi="<span class='text-dark' title='Simpanan Wajib'>SMP.WJB.$id_simpanan</span>";
                                                }else{
                                                    if($KategoriTransaksi=="Simpanan Sukarela"){
                                                        $LabelTransaksi="<span class='text-dark' title='Simpanan Sukarela'>SMP.SKR.$id_simpanan</span>";
                                                    }else{
                                                        if($KategoriTransaksi=="Penarikan"){
                                                            $LabelTransaksi="<span class='text-dark' title='Penarikan Dana'>SMP.PNR.$id_simpanan</span>";
                                                        }else{
                                                            $LabelTransaksi="<span class='text-dark' title='Simpanan Non Kategori'>SMP.$id_simpanan</span>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }else{
                                        $id_transaksi = $data['id_transaksi'];
                                        //buka Transaksi
                                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                        $KategoriTransaksi= $DataTransaksi['kategori'];
                                        if($KategoriTransaksi=="Penjualan"){
                                            $LabelTransaksi="<span class='text-dark' title='Transaksi Penjualan'>TRANS.PNJ.$id_transaksi</span>";
                                        }else{
                                            if($KategoriTransaksi=="Pembelian"){
                                                $LabelTransaksi="<span class='text-dark' title='Transaksi Pembelian'>TRANS.PMB.$id_transaksi</span>";
                                            }else{
                                                if($KategoriTransaksi=="Penerimaan"){
                                                    $LabelTransaksi="<span class='text-dark' title='Transaksi Penerimaan'>TRANS.PNRM.$id_transaksi</span>";
                                                }else{
                                                    if($KategoriTransaksi=="Pengeluaran"){
                                                        $LabelTransaksi="<span class='text-dark' title='Transaksi Pengeluaran'>TRANS.PNGL.$id_transaksi</span>";
                                                    }else{
                                                        $LabelTransaksi="<span class='text-dark' title='Transaksi'>TRANS.$id_transaksi</span>";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    $id_pinjaman_angsuran= $data['id_pinjaman_angsuran'];
                                    $id_pinjaman= $data['id_pinjaman'];
                                    $id_perkiraan= $data['id_perkiraan'];
                                    $tanggal= $data['tanggal'];
                                    $kode_perkiraan= $data['kode_perkiraan'];
                                    $nama_perkiraan= $data['nama_perkiraan'];
                                    $d_k= $data['d_k'];
                                    $nilai= $data['nilai'];
                                    $strotime1=strtotime($tanggal);
                                    $tanggal=date('d/m/Y',$strotime1);
                                    $jumlah = "" . number_format($nilai,0,',','.');
                                    if($d_k=="Debet"){
                                        $JumlahSaldoDebet=$JumlahSaldoDebet+$nilai;
                                        $JumlahSaldoKredit=$JumlahSaldoKredit+0;
                                    }else{
                                        $JumlahSaldoDebet=$JumlahSaldoDebet+0;
                                        $JumlahSaldoKredit=$JumlahSaldoKredit+$nilai;
                                    }
                                    $JumlahSaldoDebetRp = "" . number_format($JumlahSaldoDebet,0,',','.');
                                    $JumlahSaldoKreditRp = "" . number_format($JumlahSaldoKredit,0,',','.');
                                ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo ''.$tanggal.'';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo ''.$LabelTransaksi.'';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo ''.$kode_perkiraan.'.';
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo ''.$nama_perkiraan.'';
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        if($d_k=="Debet"){
                                            echo ''.$jumlah.'';
                                        }else{
                                            echo "-";
                                        }
                                        
                                    ?>
                                </td>
                                <td class="text-right" align="right">
                                    <?php 
                                        if($d_k=="Kredit"){
                                            echo ''.$jumlah.'';
                                        }else{
                                            echo "-";
                                        }
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditJurnal" data-id="<?php echo "$id_jurnal,$id_pinjaman"; ?>" title="Edit Data Jurnal">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>  
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusJurnal" data-id="<?php echo "$id_jurnal,$id_pinjaman"; ?>" title="Hapus Data Jurnal">
                                            <i class="bi bi-x"></i>
                                        </button>  
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $no++; }}
                            ?>
                            <tr>
                                <td></td>
                                <td colspan="4" align="left"><b>SALDO</b></td>
                                <td align="right"><b><?php echo "$JumlahSaldoDebetRp"; ?></b></td>
                                <td align="right"><b><?php echo "$JumlahSaldoKreditRp"; ?></b></td>
                                <td align="right"><b></b></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-center">
    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#ModalHapusSemuaJurnal" data-id="<?php echo "$id_pinjaman"; ?>" title="Hapus Semua Jurnal Pinjaman">
        <i class="bi bi-trash"></i> Hapus Jurnal
    </button>
</div>
<?php } ?>