<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        $id_simpanan="";
    }else{
        $id_simpanan=$_GET['id'];
    }
    if(empty($id_simpanan)){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Tabungan</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Simpanan Tidak Boleh Kosong.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Detail Tabungan';
        echo '  </div>';
        echo '</div>';
    }else{
        //Buka data simpanan
        $QrySimpanan = mysqli_query($Conn,"SELECT * FROM simpanan WHERE id_simpanan='$id_simpanan'")or die(mysqli_error($Conn));
        $DataSimpanan = mysqli_fetch_array($QrySimpanan);
        $id_simpanan= $DataSimpanan['id_simpanan'];
        $id_anggota= $DataSimpanan['id_anggota'];
        $kategori= $DataSimpanan['kategori'];
        $keterangan= $DataSimpanan['keterangan'];
        $nama= $DataSimpanan['nama'];
        $jumlah= $DataSimpanan['jumlah'];
        $tanggal= $DataSimpanan['tanggal'];
        $strotime=strtotime($tanggal);
        $tanggal=date('d/m/Y',$strotime);
        $jumlah = "" . number_format($jumlah,0,',','.');
?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <b class="card-title">
                                        <i class="bi bi-info-circle"></i> Detail Simpanan
                                    </b>
                                </div>
                                <div class="col-md-2">
                                    <a href="index.php?Page=Tabungan" class="btn btn-md btn-dark btn-rounded btn-block">
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
                                                <td><b>ID Simpanan</b></td>
                                                <td><b>:</b></td>
                                                <td><?php echo "$id_simpanan"; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Nama Anggota</b></td>
                                                <td><b>:</b></td>
                                                <td><?php echo "$nama"; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Tanggal</b></td>
                                                <td><b>:</b></td>
                                                <td><?php echo "$tanggal"; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Kategori</b></td>
                                                <td><b>:</b></td>
                                                <td><?php echo "$kategori"; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Keterangan</b></td>
                                                <td><b>:</b></td>
                                                <td><?php echo "$keterangan"; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Jumlah</b></td>
                                                <td><b>:</b></td>
                                                <td><?php echo "$jumlah"; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <b class="card-title">
                                        <i class="bi bi-table"></i> Jurnal Simpanan
                                    </b>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-md btn-primary btn-rounded btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahJurnalSimpanan" data-id="<?php echo "$id_simpanan"; ?>" title="TambahJurnal">
                                        <i class="bi bi-plus"></i> Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2"> 
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"><b>No</b></th>
                                                    <th class="text-center"><b>Tanggal</b></th>
                                                    <th class="text-center"><b>Referensi</b></th>
                                                    <th class="text-center"><b>Kode Akun</b></th>
                                                    <th class="text-center"><b>Nama Akun</b></th>
                                                    <th class="text-center"><b>Debet</b></th>
                                                    <th class="text-center"><b>Kredit</b></th>
                                                    <th class="text-center"><b>Opsi</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_simpanan='$id_simpanan'"));
                                                    if(empty($jml_data)){
                                                        echo '<tr>';
                                                        echo '  <td colspan="8" class="text-center">';
                                                        echo '      <span class="text-danger">Belum Ada Jurnal Untuk Referensi Ini</span>';
                                                        echo '  </td>';
                                                        echo '</tr>';
                                                    }else{
                                                        $no = 1;
                                                        //KONDISI PENGATURAN MASING FILTER
                                                        $query = mysqli_query($Conn, "SELECT*FROM jurnal WHERE id_simpanan='$id_simpanan'");
                                                        while ($data = mysqli_fetch_array($query)) {
                                                            $id_jurnal = $data['id_jurnal'];
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
                                                            
                                                            $id_perkiraan = $data['id_perkiraan'];
                                                            $tanggal = $data['tanggal'];
                                                            $tanggal=strtotime($tanggal);
                                                            $tanggal=date('d/m/y', $tanggal);
                                                            $kode_perkiraan = $data['kode_perkiraan'];
                                                            $nama_perkiraan = $data['nama_perkiraan'];
                                                            $d_k= $data['d_k'];
                                                            $nilai= $data['nilai'];
                                                            //Format rupiah
                                                            $NominalRp = "Rp " . number_format($nilai,0,',','.');
                                                    ?>
                                                        <tr>
                                                            <td class="text-center" align="center"><?php echo "<small>$no</small>";?></td>    
                                                            <td class="text-left" align="left"><?php echo "<small>$tanggal</small>";?></td>
                                                            <td class="text-left" align="left"><?php echo "<small>$LabelTransaksi</small>";?></td>
                                                            <td class="text-left" align="left"><?php echo "<small>$kode_perkiraan</small>";?></td>
                                                            <td class="text-left" align="left"><?php echo "<small>$nama_perkiraan</small>";?></td>
                                                            <td class="text-right" align="right">
                                                                <?php 
                                                                    if($d_k=="Debet")
                                                                    echo "<small>$NominalRp</small>";
                                                                ?>
                                                            </td>
                                                            <td class="text-right" align="right">
                                                                <?php 
                                                                    if($d_k=="Kredit")
                                                                    echo "<small>$NominalRp</small>";
                                                                ?>
                                                            </td>
                                                            <td class="text-center" align="center">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditJurnalSimpanan" data-id="<?php echo "$id_jurnal"; ?>" title="Edit Jurnal">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>  
                                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteJurnalSimpanan" data-id="<?php echo "$id_jurnal"; ?>" title="Hapus Jurnal">
                                                                        <i class="bi bi-x"></i>
                                                                    </button>   
                                                                </div>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    $no++; } }
                                                ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>