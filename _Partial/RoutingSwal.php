<?php
    if(!empty($_SESSION['NotifikasiSwal'])){
        $NotifikasiSwal=$_SESSION['NotifikasiSwal'];
?>
    <!------- Notifikasi ------------>
    <?php if($NotifikasiSwal=="Login Berhasil"){ ?>
        <script>
            swal("Welcome back!", "Login Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Akses Berhasil"){ ?>
        <script>
            swal("Welcome back!", "Tambah Akses Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Akses Berhasil"){ ?>
        <script>
            swal("Welcome back!", "Hapus Akses Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Atur Akses Berhasil"){ ?>
        <script>
            swal("Welcome back!", "Atur Akses Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Anggota Berhasil"){ ?>
        <script>
            swal("Welcome back!", "Tambah Anggota Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Setting General Berhasil"){ ?>
        <script>
            swal("Success!", "Save General Settings Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Simpanan Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Simpanan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Pinjaman Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Pinjaman Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Auto Jurnal"){ ?>
        <script>
            swal("Success!", "Tambah Auto Jurnal Simpan/Pinjam Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Update Auto Jurnal Berhasil"){ ?>
        <script>
            swal("Success!", "Update Auto Jurnal Simpan/Pinjam Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Jurnal Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Jurnal Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Jurnal Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Jurnal Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Jurnal Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Jurnal Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Setting Email Berhasil"){ ?>
        <script>
            swal("Success!", "Save Email Settings Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Kirim Email Berhasil"){ ?>
        <script>
            swal("Success!", "Send Email Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Dokumentasi API Berhasil"){ ?>
        <script>
            swal("Success!", "Save API Documentation Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Stock Opename Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Stock Opename Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Pasien Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Patient Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Akses Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Access Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Password Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Password Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Help Berhasil"){ ?>
        <script>
            swal("Success!", "Save content data successfully", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Help Berhasil"){ ?>
        <script>
            swal("Success!", "Delete content data successfully", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Bagi Hasil Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Bagi Hasil Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Update Bagi Hasil Berhasil"){ ?>
        <script>
            swal("Success!", "Update Bagi Hasil Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Konten Web Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Konten Web Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Screening Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Screening Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Screening Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Screening Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Satuan Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Satuan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Satuan Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Satuan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Satuan Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Satuan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Harga Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Harga Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Update Kategori Harga Berhasil"){ ?>
        <script>
            swal("Success!", "Update Kategori Harga Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Expired Date Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Expired Date Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Expired Date Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Expired Date Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Pembayaran Berhasil"){ ?>
        <script>
            swal("Success!", "Simpan Pembayaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Pembayaran Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Pembayaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Tamplate Berhasil"){ ?>
        <script>
            swal("Success!", "Simpan Tamplate Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Rencana Kirim Pesan Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Rencana Kirim Pesan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Pendaftaran Berhasil"){ ?>
        <script>
            swal("Success!", "Pendaftaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Kirim Pesan Berhasil"){ ?>
        <script>
            swal("Success!", "Kirim Pesan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Form Setting Berhasil"){ ?>
        <script>
            swal("Success!", "Simpan Form Setting Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Form Setting Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Form Setting Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Draft Medrek Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Draft Medrek Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Draft Medrek Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Draft Medrek Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Draft Medrek Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Draft Medrek Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Master Pasien Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Master Pasien Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Wilayah Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Wilayah Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Dokter Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Data Tenaga Kesehatan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Tindakan Medis Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Tindakan Medis Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Supplier Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Supplier Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Barang Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Barang Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Rincian Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Rincian Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Rincian Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Rincian Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Rincian Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Rincian Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Transaksi Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Transaksi Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Jadwal Praktek Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Jadwal Praktek Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Testimoni Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Testimoni Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah FAQ Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah FAQ Berhasil", "success");
        </script>
    <?php } ?>
<?php 
    unset($_SESSION['NotifikasiSwal']);
    }
?>