<?php
    //Koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['tanggal'])){
        echo '<span class="text-danger">Tanggal Tidak Boleh Kosong</span>';
    }else{
        if(empty($_POST['jam'])){
            echo '<span class="text-danger">Jam Transaksi Tidak Boleh Kosong</span>';
        }else{
            if(empty($_POST['kategori'])){
                echo '<span class="text-danger">Kategori Tidak Boleh Kosong</span>';
            }else{
                if(empty($_POST['status'])){
                    echo '<span class="text-danger">Status Transaksi Tidak Boleh Kosong</span>';
                }else{
                    if(empty($_POST['id_anggota'])){
                        $id_anggota=0;
                    }else{
                        $id_anggota=$_POST['id_anggota'];
                    }
                    if(empty($_POST['id_supplier'])){
                        $id_supplier=0;
                    }else{
                        $id_supplier=$_POST['id_supplier'];
                    }
                    $tanggal=$_POST['tanggal'];
                    $jam=$_POST['jam'];
                    $tanggal="$tanggal $jam";
                    $kategori=$_POST['kategori'];
                    $status=$_POST['status'];
                    if(empty($_POST['metode'])){
                        $metode="Cash";
                    }else{
                        $metode=$_POST['metode'];
                    }
                    if(empty($_POST['pembayaran'])){
                        $pembayaran="0";
                    }else{
                        $pembayaran=$_POST['pembayaran'];
                    }
                    if(empty($_POST['keterangan'])){
                        $keterangan="";
                    }else{
                        $keterangan=$_POST['keterangan'];
                    }
                    if(empty($_POST['jumlah_transaksi'])){
                        $JumlahTagihan="0";
                    }else{
                        $JumlahTagihan=$_POST['jumlah_transaksi'];
                    }
                    if(empty($_POST['kembalian'])){
                        $kembalian="0";
                    }else{
                        $kembalian=$_POST['kembalian'];
                    }
                    $JumlahTagihan= str_replace(".", "", $JumlahTagihan);
                    $pembayaran= str_replace(".", "", $pembayaran);
                    $kembalian= str_replace(".", "", $kembalian);
                    if(!preg_match("/^[0-9]*$/", $JumlahTagihan)){
                        echo "Jumlah Tagihan Hanya Boleh Angka";   
                    }else{
                        if(!preg_match("/^[0-9]*$/", $pembayaran)){
                            echo "Jumlah Pembayaran Hanya Boleh Angka";   
                        }else{
                            if(!preg_match("/^[0-9]*$/", $kembalian)){
                                echo "Jumlah Kembalian Hanya Boleh Angka";   
                            }else{
                                //Buat id_transaksi
                                $QryTransaksi=mysqli_query($Conn, "SELECT max(id_transaksi) as id_transaksi FROM transaksi")or die(mysqli_error($Conn));
                                while($HasilNilaiTransaksi=mysqli_fetch_array($QryTransaksi)){
                                    $id_transaksi_max=$HasilNilaiTransaksi['id_transaksi'];
                                }
                                $id_transaksi=$id_transaksi_max+1;
                                //Cek keberadaan Auto Jurnal
                                $QryAutoJurnal = mysqli_query($Conn,"SELECT * FROM setting_autojurnal WHERE id_akses='$SessionIdAkses'")or die(mysqli_error($Conn));
                                $DataAutoJurnal = mysqli_fetch_array($QryAutoJurnal);
                                if(!empty($DataAutoJurnal['id_setting_autojurnal'])){
                                    $id_setting_autojurnal = $DataAutoJurnal['id_setting_autojurnal'];
                                    $trans_account1 = $DataAutoJurnal['trans_account1'];
                                    $cash_account1 = $DataAutoJurnal['cash_account1'];
                                    $debt_account1 = $DataAutoJurnal['debt_account1'];
                                    $receivables_account1 = $DataAutoJurnal['receivables_account1'];
                                    $trans_account2 = $DataAutoJurnal['trans_account2'];
                                    $cash_account2 = $DataAutoJurnal['cash_account2'];
                                    $debt_account2 = $DataAutoJurnal['debt_account2'];
                                    $receivables_account2 = $DataAutoJurnal['receivables_account2'];
                                    //Inisiasi utang piutang
                                    if($kategori=="Pembelian"){
                                        if($JumlahTagihan==$pembayaran){
                                            $UtangPiutang="Lunas";
                                            $Selisih="0";
                                            //Simpan ke jurnal Pembelian Lunas
                                            include "../../_Page/Transaksi/JurnalPembelianLunas.php";
                                        }else{
                                            if($JumlahTagihan>$pembayaran){
                                                $UtangPiutang="Utang";
                                                $Selisih=$JumlahTagihan-$pembayaran;
                                                include "../../_Page/Transaksi/JurnalPembelianUtang.php";
                                            }else{
                                                $UtangPiutang="Piutang";
                                                $Selisih=$pembayaran-$JumlahTagihan;
                                                include "../../_Page/Transaksi/JurnalPembelianPiutang.php";
                                            }
                                        }
                                    }else{
                                        if($kategori=="Penjualan"){
                                            if($JumlahTagihan==$pembayaran){
                                                $UtangPiutang="Lunas";
                                                $Selisih="0";
                                                include "../../_Page/Transaksi/JurnalPenjualanLunas.php";
                                            }else{
                                                if($JumlahTagihan>$pembayaran){
                                                    $UtangPiutang="Piutang";
                                                    $Selisih=$JumlahTagihan-$pembayaran;
                                                    include "../../_Page/Transaksi/JurnalPenjualanPiutang.php";
                                                }else{
                                                    $UtangPiutang="Utang";
                                                    $Selisih=$pembayaran-$JumlahTagihan;
                                                    include "../../_Page/Transaksi/JurnalPenjualanUtang.php";
                                                }
                                            }
                                        }else{
                                            $UtangPiutang="";
                                            $Selisih="";
                                            $ValidasiAutoJurnal="Valid";
                                        }
                                    }
                                }else{
                                    $ValidasiAutoJurnal="Valid";
                                }
                                if($ValidasiAutoJurnal=="Valid"){
                                    //Simpan data
                                    $EntryData="INSERT INTO transaksi (
                                        id_transaksi,
                                        id_akses,
                                        id_anggota,
                                        id_supplier,
                                        tanggal,
                                        kategori,
                                        tagihan,
                                        pembayaran,
                                        kembalian,
                                        metode,
                                        keterangan,
                                        status
                                    ) VALUES (
                                        '$id_transaksi',
                                        '$SessionIdAkses',
                                        '$id_anggota',
                                        '$id_supplier',
                                        '$tanggal',
                                        '$kategori',
                                        '$JumlahTagihan',
                                        '$pembayaran',
                                        '$kembalian',
                                        '$metode',
                                        '$keterangan',
                                        '$status'
                                    )";
                                    $InputData=mysqli_query($Conn, $EntryData);
                                    if($InputData){
                                        if($status=="Lunas"){
                                            $JumlahPembayaran=$JumlahTagihan;
                                        }else{
                                            $JumlahPembayaran=$pembayaran;
                                        }
                                        //Simpan data
                                        $EntryDataPembayaran="INSERT INTO transaksi_pembayaran (
                                            id_transaksi,
                                            id_akses,
                                            id_anggota,
                                            id_supplier,
                                            kategori,
                                            tanggal,
                                            metode,
                                            jumlah,
                                            keterangan
                                        ) VALUES (
                                            '$id_transaksi',
                                            '$SessionIdAkses',
                                            '$id_anggota',
                                            '$id_supplier',
                                            '$kategori',
                                            '$tanggal',
                                            '$metode',
                                            '$JumlahPembayaran',
                                            ''
                                        )";
                                        $InputDataPembayaran=mysqli_query($Conn, $EntryDataPembayaran);
                                        if($InputDataPembayaran){
                                            $ValidasiDataPembayaran="Valid";
                                        }else{
                                            $ValidasiDataPembayaran="Terjadi Kesalahan Pada Saat Menyimpan Data Pembayaran";
                                        }
                                        if($ValidasiDataPembayaran!=="Valid"){
                                            echo '<span class="text-danger">'.$ValidasiDataPembayaran.'</span>';
                                        }else{
                                            //Update Transaksi rincian
                                            $UpdateRincian = mysqli_query($Conn,"UPDATE transaksi_rincian SET 
                                                id_transaksi='$id_transaksi',
                                                id_anggota='$id_anggota',
                                                id_supplier='$id_supplier',
                                                tanggal='$tanggal'
                                            WHERE id_akses='$SessionIdAkses' AND id_transaksi='0'") or die(mysqli_error($Conn));
                                            if($UpdateRincian){
                                                //Hapus data transaksi sementara
                                                $HapusTransaksiSementara = mysqli_query($Conn, "DELETE FROM transaksi_sementara WHERE id_akses='$SessionIdAkses'") or die(mysqli_error($Conn));
                                                if($HapusTransaksiSementara){
                                                    //Arraykan Rincian Barang
                                                    $QryRincian = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_transaksi='$id_transaksi'");
                                                    while ($DataRincian = mysqli_fetch_array($QryRincian)) {
                                                        if(!empty($DataRincian['id_barang'])){
                                                            $id_transaksi_rincian= $DataRincian['id_transaksi_rincian'];
                                                            echo "ID Rincian $id_transaksi_rincian ";
                                                            $id_barang= $DataRincian['id_barang'];
                                                            $id_barang_harga= $DataRincian['id_barang_harga'];
                                                            $id_barang_satuan= $DataRincian['id_barang_satuan'];
                                                            $qty= $DataRincian['qty'];
                                                            //Buka data barang
                                                            $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                                            $DataBarang = mysqli_fetch_array($QryBarang);
                                                            $id_barang= $DataBarang['id_barang'];
                                                            $stok_barang= $DataBarang['stok_barang'];
                                                            $konversi_barang= $DataBarang['konversi'];
                                                            //Kurangi stok barang langsung disini sesuai dengan multi harga
                                                            if(empty($DataRincian['id_barang_satuan'])){
                                                                if($kategori=="Penjualan"){
                                                                    $StokBaru=$stok_barang-$qty;
                                                                }else{
                                                                    if($kategori=="Pembelian"){
                                                                        $StokBaru=$stok_barang+$qty;
                                                                    }else{
                                                                        $StokBaru=$stok_barang;
                                                                    }
                                                                }
                                                                echo "Stok Baru $StokBaru";
                                                                //Update Stok Barang
                                                                $UpdateStokBarang = mysqli_query($Conn, "UPDATE barang SET stok_barang='$StokBaru' WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                                                                //Lakukan Perulangan untuk melakukan edit pada stok multi satuan
                                                                //KONDISI PENGATURAN MASING FILTER
                                                                //Arraykan data muti harga
                                                                $QryListMulti = mysqli_query($Conn, "SELECT*FROM barang_satuan WHERE id_barang='$id_barang'");
                                                                while ($DataListMulti = mysqli_fetch_array($QryListMulti)) {
                                                                    $id_barang_satuan_list = $DataListMulti['id_barang_satuan'];
                                                                    $konversiList = $DataListMulti['konversi_multi'];
                                                                    $stokList= $DataListMulti['stok_multi'];
                                                                    //Hitung mencari stok baru masing-masing list
                                                                    $stokBaruList=($konversi_barang/$konversiList)*$StokBaru;
                                                                    //Lakukan update data stok masing-masing list
                                                                    $EditMultiSatuan = mysqli_query($Conn, "UPDATE barang_satuan SET stok_multi='$stokBaruList' WHERE  	id_barang_satuan='$id_barang_satuan_list'") or die(mysqli_error($Conn)); 
                                                                }
                                                            }else{
                                                                //Buka data multi harga
                                                                $QryMulti = mysqli_query($Conn, "SELECT * FROM barang_satuan WHERE id_barang_satuan='$id_barang_satuan'")or die(mysqli_error($Conn));
                                                                $DataMulti = mysqli_fetch_array($QryMulti);
                                                                $satuanMulti=$DataMulti['satuan_multi'];
                                                                $konversiMulti=$DataMulti['konversi_multi'];
                                                                $stokMulti=$DataMulti['stok_multi'];
                                                                //Konversikan qty multi menjadi qty utama
                                                                $qty=$konversiMulti/$konversi_barang*$qty;
                                                                if($kategori=="Penjualan"){
                                                                    $StokBaru=$stok_barang-$qty;
                                                                }else{
                                                                    if($kategori=="Pembelian"){
                                                                        $StokBaru=$stok_barang+$qty;
                                                                    }else{
                                                                        $StokBaru=$stok_barang;
                                                                    }
                                                                }
                                                                //Edit Ke data Barang
                                                                $EditBarang = mysqli_query($Conn, "UPDATE barang SET stok_barang='$StokBaru' WHERE id_barang='$id_barang'") or die(mysqli_error($Conn)); 
                                                                //Buka data Barang
                                                                $QryBarang = mysqli_query($Conn, "SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                                                                $DataBarang = mysqli_fetch_array($QryBarang);
                                                                $satuanBarang=$DataBarang['satuan_barang'];
                                                                $konversiBarang=$DataBarang['konversi'];
                                                                $stokBarang=$DataBarang['stok_barang'];
                                                                //Lakukan Perulangan untuk melakukan edit pada stok multi satuan
                                                                $QryListMulti = mysqli_query($Conn, "SELECT*FROM barang_satuan WHERE id_barang='$id_barang'");
                                                                while ($DataListMulti = mysqli_fetch_array($QryListMulti)) {
                                                                    $id_barang_satuan_list = $DataListMulti['id_barang_satuan'];
                                                                    $konversiList = $DataListMulti['konversi_multi'];
                                                                    $satuanList = $DataListMulti['satuan_multi'];
                                                                    $stokList= $DataListMulti['stok_multi'];
                                                                    //Hitung mencari stok baru masing-masing list
                                                                    $stokBaruList=($konversiBarang/$konversiList)*$stokBarang;
                                                                    //Lakukan update data stok masing-masing list
                                                                    $EditMultiSatuan = mysqli_query($Conn, "UPDATE barang_satuan SET stok_multi='$stokBaruList' WHERE id_barang_satuan='$id_barang_satuan_list'") or die(mysqli_error($Conn)); 
                                                                }
                                                            }
                                                        }
                                                    }
                                                    echo '<small class="text-success" id="NotifikasiTambahTransaksiBerhasil">Success</small>';
                                                    $KategoriLog="Transaksi";
                                                    $KeteranganLog="Input Transaksi  $id_transaksi Berhasil";
                                                    include "../../_Config/InputLog.php";
                                                }else{
                                                    echo '<span class="text-danger">Terjadi Kesalahan Pada Saat Menghapus Transaksi Sementara</span>';
                                                }
                                            }else{
                                                echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data rincian!</span>';
                                            }
                                        }
                                    }else{
                                        echo '<span class="text-danger">Terjadi kesalahan pada saat menyimpan data transaksi!</span>';
                                    }
                                }else{
                                    echo '<span class="text-danger">'.$ValidasiAutoJurnal.'</span>';
                                    echo '<span class="text-danger">'.$JumlahTagihan.'</span><br>';
                                    echo '<span class="text-danger">'.$pembayaran.'</span><br>';
                                    echo '<span class="text-danger">'.$UtangPiutang.'</span><br>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>