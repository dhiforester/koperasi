<?php
    //Koneksi dan SessionLogin
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['id_perkiraan'])){
        echo '<i class="text-danger">ID Perkiraan Tidak dapat ditangkap pada saat proses hapus data</i>';
    }else{
        $id_perkiraan=$_POST['id_perkiraan'];
        //Buka Data Akun Perkiraan
        $Qry = mysqli_query($Conn,"SELECT * FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        $kode = $Data['kode'];
        $nama = $Data['nama'];
        $level = $Data['level'];
        $saldo_normal = $Data['saldo_normal'];
        $status = $Data['status'];
        //Validasi apakah akun terhubung dengan auto jurnal
        //Pembelian
        $CekAutiJurnalTransaksiPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE trans_account1='$id_perkiraan'"));
        $CekAutiJurnalKasPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE cash_account1='$id_perkiraan'"));
        $CekAutiJurnalUtangPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE debt_account1='$id_perkiraan'"));
        $CekAutiJurnalPiutangPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE receivables_account1='$id_perkiraan'"));
        //Penjualan
        $CekAutiJurnalTransaksiPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE trans_account2='$id_perkiraan'"));
        $CekAutiJurnalKasPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE cash_account2='$id_perkiraan'"));
        $CekAutiJurnalUtangPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE debt_account2='$id_perkiraan'"));
        $CekAutiJurnalPiutangPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE receivables_account2='$id_perkiraan'"));
        //Simpan-pinjam debet
        $CekAutiJurnalSimpanPinjamDebet=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM auto_jurnal WHERE debet_id='$id_perkiraan'"));
        //Simpan-pinjam kredit
        $CekAutiJurnalSimpanPinjamKredit=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM auto_jurnal WHERE kredit_id='$id_perkiraan'"));
        //Inisiasi labal Pembelian
        if(!empty($CekAutiJurnalTransaksiPembelian)){
            echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Transaksi Pembelian</i>';
        }else{
            if(!empty($CekAutiJurnalKasPembelian)){
                echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Kas Pembelian</i>';
            }else{
                if(!empty($CekAutiJurnalUtangPembelian)){
                    echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Utang Pembelian</i>';
                }else{
                    if(!empty($CekAutiJurnalPiutangPembelian)){
                        echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Piutang Pembelian</i>';
                    }else{
                        //Inisiasi labal Penjualan
                        if(!empty($CekAutiJurnalTransaksiPenjualan)){
                            echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Transaksi Penjualan</i>';
                        }else{
                            if(!empty($CekAutiJurnalKasPenjualan)){
                                echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Kas Penjualan</i>';
                            }else{
                                if(!empty($CekAutiJurnalUtangPenjualan)){
                                    echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Utang Penjualan</i>';
                                }else{
                                    if(!empty($CekAutiJurnalPiutangPenjualan)){
                                        echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Piutang Penjualan</i>';
                                    }else{
                                        if(!empty($CekAutiJurnalSimpanPinjamDebet)){
                                            echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Simpan-Pinjam Debet</i>';
                                        }else{
                                            if(!empty($CekAutiJurnalSimpanPinjamKredit)){
                                                echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena terhubung dengan <b>Auto Jurnal</b> Simpan-Pinjam Kredit</i>';
                                            }else{
                                                //Arraykan anak akun
                                                $JumlahTemuan=0;
                                                $query2 = mysqli_query($Conn, "SELECT*FROM akun_perkiraan WHERE kd$level='$kode' AND level>'$level'");
                                                while ($data2 = mysqli_fetch_array($query2)) {
                                                    $id_perkiraan2 = $data2['id_perkiraan'];
                                                    //Pembelian
                                                    $CekAutiJurnalTransaksiPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE trans_account1='$id_perkiraan2'"));
                                                    $CekAutiJurnalKasPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE cash_account1='$id_perkiraan2'"));
                                                    $CekAutiJurnalUtangPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE debt_account1='$id_perkiraan2'"));
                                                    $CekAutiJurnalPiutangPembelian=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE receivables_account1='$id_perkiraan2'"));
                                                    $TotalAutoJurnalPembelian=$JumlahTemuan+$CekAutiJurnalTransaksiPembelian+$CekAutiJurnalKasPembelian+$CekAutiJurnalUtangPembelian+$CekAutiJurnalPiutangPembelian;
                                                    //Penjualan
                                                    $CekAutiJurnalTransaksiPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE trans_account2='$id_perkiraan2'"));
                                                    $CekAutiJurnalKasPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE cash_account2='$id_perkiraan2'"));
                                                    $CekAutiJurnalUtangPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE debt_account2='$id_perkiraan2'"));
                                                    $CekAutiJurnalPiutangPenjualan=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM setting_autojurnal WHERE receivables_account2='$id_perkiraan2'"));
                                                    $TotalAutoJurnalPenjualan=$CekAutiJurnalTransaksiPenjualan+$CekAutiJurnalKasPenjualan+$CekAutiJurnalUtangPenjualan+$CekAutiJurnalPiutangPenjualan;
                                                    //Simpan-pinjam debet
                                                    $CekAutiJurnalSimpanPinjamDebet=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM auto_jurnal WHERE debet_id='$id_perkiraan2'"));
                                                    //Simpan-pinjam kredit
                                                    $CekAutiJurnalSimpanPinjamKredit=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM auto_jurnal WHERE kredit_id='$id_perkiraan2'"));
                                                    $JumlahTemuan=$TotalAutoJurnalPembelian+$TotalAutoJurnalPenjualan+$CekAutiJurnalSimpanPinjamDebet+$CekAutiJurnalSimpanPinjamKredit;
                                                }
                                                if(!empty($JumlahTemuan)){
                                                    echo '<i class="text-danger">Akun Perkiraan Tidak dapat dihapus karena beberapa anak akun terhubung dengan <b>Auto Jurnal</b></i>';
                                                }else{
                                                    //Proses hapus data akun perkiraan
                                                    $query = mysqli_query($Conn, "DELETE FROM akun_perkiraan WHERE id_perkiraan='$id_perkiraan'") or die(mysqli_error($Conn));
                                                    if ($query) {
                                                        //Hapus data anak akun
                                                        $query2 = mysqli_query($Conn, "DELETE FROM akun_perkiraan WHERE kd$level='$kode' AND level>'$level'") or die(mysqli_error($Conn));
                                                        if($query2){
                                                            echo '<i class="text-success" id="NotifikasiHapusAkunPerkiraanBerhasil">Success</i>';
                                                        }else{
                                                            echo '<i class="text-danger">Delete Anak Akun Gagal</i>';
                                                        }
                                                    }else{
                                                        echo '<i class="text-danger">Delete Akun Perkiraan Gagal</i>';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>