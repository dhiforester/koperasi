<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        $id_anggota="";
    }else{
        $id_anggota=$_GET['id'];
    }
    if(empty($id_anggota)){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Anggota</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Anggota Tidak Boleh Kosong.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Detail Anggota';
        echo '  </div>';
        echo '</div>';
    }else{
        //Buka data Anggota
        $QryAnggota = mysqli_query($Conn,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'")or die(mysqli_error($Conn));
        $DataAnggota = mysqli_fetch_array($QryAnggota);
        $id_anggota= $DataAnggota['id_anggota'];
        $tanggal_masuk= $DataAnggota['tanggal_masuk'];
        $nama= $DataAnggota['nama'];
        if(!empty($DataAnggota['image'])){
            $image= $DataAnggota['image'];
        }else{
            $image="No-Image.PNG";
        }
        if(!empty($DataAnggota['email'])){
            $email= $DataAnggota['email'];
        }else{
            $email='<span class="text-danger">Tidak Ada Email</span>';
        }
        if(!empty($DataAnggota['kontak'])){
            $kontak= $DataAnggota['kontak'];
        }else{
            $kontak='<span class="text-danger">Tidak Ada Kontak</span>';
        }
        if(!empty($DataAnggota['nip'])){
            $nip= $DataAnggota['nip'];
        }else{
            $nip='<span class="text-danger">Tidak Ada NIP</span>';
        }
        $status= $DataAnggota['status'];
        $strtotime=strtotime($tanggal_masuk);
        $TanggalMasuk=date('d/m/Y',$strtotime);
        if($status=="Active"){
            $LabelStatus='<span class="text-success">Active</span>';
        }else{
            $LabelStatus='<span class="text-danger">'.$status.'</span>';
        }
        //Jumlah Pembelian
        $SumPembelian = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(tagihan) AS tagihan FROM transaksi WHERE kategori='Pembelian' AND id_anggota='$id_anggota'"));
        $JumlahPembelian = $SumPembelian['tagihan'];
        $JumlahPembelian = "Rp " . number_format($JumlahPembelian,0,',','.');
        //Jumlah Simpanan
        $SumSimpanan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE (kategori='Simpanan Pokok' OR kategori='Simpanan Wajib' OR kategori='Simpanan Sukarela') AND (id_anggota='$id_anggota')"));
        $JumlahSmpanan = $SumSimpanan['jumlah'];
        $SumPenarikan = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM simpanan WHERE (kategori='Penarikan') AND (id_anggota='$id_anggota')"));
        $JumlahPenarikan = $SumPenarikan['jumlah'];
        $SaldoTabungan=$JumlahSmpanan-$JumlahPenarikan;
        $SaldoTabungan = "Rp " . number_format($SaldoTabungan,0,',','.');
        //Jumlah Saldo Pinjaman
        $SumPinjaman = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah_pinjaman) AS jumlah_pinjaman FROM pinjaman WHERE id_anggota='$id_anggota'"));
        $JumlahPinjaman = $SumPinjaman['jumlah_pinjaman'];
        $SumAngsuranPokok = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM pinjaman_angsuran WHERE id_anggota='$id_anggota' AND kategori_angsuran='Pokok'"));
        $JumlahAngsuranPokok = $SumAngsuranPokok['jumlah'];
        $SisaPinjaman=$JumlahPinjaman-$JumlahAngsuranPokok;
        $SisaPinjaman = "Rp " . number_format($SisaPinjaman,0,',','.');
?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <b class="card-title">
                        <i class="bi bi-info-circle"></i> Detail Anggota
                    </b>
                </div>
                <div class="col-md-2">
                    <a href="index.php?Page=Anggota" class="btn btn-md btn-dark btn-rounded btn-block">
                        <i class="bi bi-arrow-left-short"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-2"> 
                <div class="col-md-4 text-center">
                    <img src="assets/img/Anggota/<?php echo "$image"; ?>" alt="" width="70%" class="rounded-circle">
                </div>
                <div class="col-md-8">
                    <table class="table table-responsive">
                        <tbody>
                            <tr>
                                <td>
                                    <small><dt>ID Anggota</dt></small>
                                </td>
                                <td><b>:</b></td>
                                <td>
                                    <small id="GetIdAnggota"><?php echo $id_anggota; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>NIP</dt></small>
                                </td>
                                <td><b>:</b></td>
                                <td>
                                    <small><?php echo $nip; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Nama</dt></small>
                                </td>
                                <td><b>:</b></td>
                                <td>
                                    <small><?php echo $nama; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Tanggal Masuk</dt></small>
                                </td>
                                <td><b>:</b></td>
                                <td>
                                    <small><?php echo $tanggal_masuk; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Email</dt></small>
                                </td>
                                <td><b>:</b></td>
                                <td>
                                    <small><?php echo $email; ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <small><dt>Kontak</dt></small>
                                </td>
                                <td><b>:</b></td>
                                <td>
                                    <small><?php echo $kontak; ?></small>
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
        <div class="card-footer">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <button type="button" class="btn btn-md btn-block btn-success" data-bs-toggle="modal" data-bs-target="#ModalEditAnggota2" data-id="<?php echo "$id_anggota"; ?>" title="Edit Data Anggota">
                        <i class="bi bi-pencil-square"></i> Edit
                    </button>  
                </div>
                <div class="col-md-4 mb-2">
                    <button type="button" class="btn btn-danger btn-block btn-md" data-bs-toggle="modal" data-bs-target="#ModalDeleteAnggota2" data-id="<?php echo "$id_anggota"; ?>" title="Hapus Data Anggota">
                        <i class="bi bi-x"></i> Hapus
                    </button>  
                </div>
                <div class="col-md-4 mb-2">
                    <button type="button" class="btn btn-md btn-block btn-info" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots"></i> Lainnya
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="">
                            <a class="dropdown-item" href="javascript:void(0);" id="DashboardAnggota">Dashboard</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="PembelianAnggota">Transaksi</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="RincianAnggota">Rincian</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="SimpananAnggota">Simpanan</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="PinjamanAnggota">Pinjaman </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" id="BagiHasilAnggota">Bagi Hasil </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
    <section class="section dashboard" id="HalamanDetailLainnya">
        
    </section>
<?php } ?>