<?php
    //Tangkap id_pinjaman
    if(empty($_GET['id'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Anggota Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pinjaman=$_GET['id'];
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
        $tanggal_pinjaman=date('d/m/Y',$strotime1);
        $strotime2=strtotime($tanggal_input);
        $tanggal_input=date('d/m/Y H:i',$strotime2);
        $jumlah_pinjaman_rp = "Rp " . number_format($jumlah_pinjaman,0,',','.');
        $nilai_angsuran = "Rp " . number_format($nilai_angsuran,0,',','.');
        if($status=="Pending"){
            $LabelStatus='<span class="badge bg-inf">Pending</span>';
        }else{
            if($status=="Active"){
                $LabelStatus='<span class="badge bg-primary">Active</span>';
            }else{
                if($status=="Lunas"){
                    $LabelStatus='<span class="badge bg-sccess">Active</span>';
                }else{
                    if($status=="Macet"){
                        $LabelStatus='<span class="badge bg-danger">Macet</span>';
                    }else{
                        $LabelStatus='<span class="badge bg-dark">'.$status.'</span>';
                    }
                }
            }
        }
        $JumlahDataAngsuran=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman'"));
?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <b class="card-title">
                                    <i class="bi bi-info-circle"></i> Detail Pinjaman
                                </b>
                            </div>
                            <div class="col-md-2">
                                <a href="index.php?Page=RiwayatAnggota&Sub=Pinjaman" class="btn btn-md btn-info btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-short"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2"> 
                            <div class="col-md-12">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <small><dt>ID Pinjaman</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small id="GetIdPinjaman"><?php echo "$id_pinjaman"; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Tanggal Pinjaman</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $tanggal_pinjaman; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Tanggal Input</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $tanggal_input; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Nama Anggota</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $nama; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Jumlah Pinjaman</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $jumlah_pinjaman; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Jumlah Angsuran</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo "$nilai_angsuran ($persen_jasa %)"; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Periode Angsuran</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo "$periode_angsuran Kali" ; ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <small><dt>Status</dt></small>
                                            </td>
                                            <td><b>:</b></td>
                                            <td>
                                                <small><?php echo $LabelStatus; ?></small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
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
                                            <b>Kategori</b>
                                        </th>
                                        <th class="text-center">
                                            <b>Jumlah</b>
                                        </th>
                                        <th class="text-center">
                                            <b>Sisa</b>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(empty($JumlahDataAngsuran)){
                                            echo '<tr>';
                                            echo '  <td colspan="5">';
                                            echo '      <span class="text-danger">Belum Memiliki Data Angsuran</span>';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }else{
                                            $no = 1;
                                            $SisaPinjaman=$jumlah_pinjaman;
                                            //KONDISI PENGATURAN MASING FILTER
                                            $query = mysqli_query($Conn, "SELECT*FROM pinjaman_angsuran WHERE id_pinjaman='$id_pinjaman' ORDER BY id_pinjaman_angsuran ASC");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id_pinjaman_angsuran= $data['id_pinjaman_angsuran'];
                                                $id_akses= $data['id_akses'];
                                                $tanggal= $data['tanggal'];
                                                $kategori_angsuran= $data['kategori_angsuran'];
                                                $jumlah= $data['jumlah'];
                                                $strotime1=strtotime($tanggal);
                                                $tanggal=date('d/m/Y',$strotime1);
                                                $jumlahRp = "" . number_format($jumlah,0,',','.');
                                                if($kategori_angsuran=="Pokok"){
                                                    $SisaPinjaman=$SisaPinjaman-$jumlah;
                                                    $LabelKategoriAngsuran='<span class="badge badge-primary"><i class="bi bi-tag"></i> Pokok</span>';
                                                }else{
                                                    if($kategori_angsuran=="Jasa"){

                                                        $LabelKategoriAngsuran='<span class="badge badge-warning"><i class="bi bi-tag"></i> Jasa</span>';
                                                    }else{
                                                        if($kategori_angsuran=="Denda"){
                                                            $LabelKategoriAngsuran='<span class="badge badge-danger"><i class="bi bi-tag"></i> Denda</span>';
                                                        }else{
                                                            $LabelKategoriAngsuran='<span class="badge badge-dark"><i class="bi bi-tag"></i> None</span>';
                                                        }
                                                    }
                                                }
                                                $SisaPinjamanRp = "" . number_format($SisaPinjaman,0,',','.');
                                            ?>
                                        <tr>
                                            <td class="text-center text-xs">
                                                <?php echo "$no" ?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php 
                                                    echo '<i class="bi bi-calendar"></i> '.$tanggal.'';
                                                ?>
                                            </td>
                                            <td class="text-left" align="left">
                                                <?php 
                                                    echo ''.$LabelKategoriAngsuran.'';
                                                ?>
                                            </td>
                                            <td class="text-right" align="right">
                                                <?php 
                                                    echo ''.$jumlahRp.'';
                                                ?>
                                            </td>
                                            <td class="text-right" align="right">
                                                <?php 
                                                    echo ''.$SisaPinjamanRp.'';
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++; }}
                                        ?>
                                        <!-- <tr>
                                            <td></td>
                                            <td colspan="3" align="left"><b>JUMLAH ANGSURAN</b></td>
                                            <td align="right"><b><?php echo "$JumlahTotalAngsuran"; ?></b></td>
                                            <td align="right"><b></b></td>
                                            <td align="right"><b></b></td>
                                        </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php } ?>