<?php
    echo '<div class="pagetitle">';
    //Routing Page Title
    if(empty($_GET['Page'])){
        echo '<h1>Dashboard</h1>';
        echo '<nav>';
        echo '  <ol class="breadcrumb">';
        echo '      <li class="breadcrumb-item active">Dashboard</li>';
        echo '  </ol>';
        echo '</nav>';
    }else{
        if($_GET['Page']=="Version"){
            echo '<h1><i class="bi bi-person"></i> Tentang Aplikasi</h1>';
            echo '<nav>';
            echo '  <ol class="breadcrumb">';
            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
            echo '      <li class="breadcrumb-item active">Tentang Aplikasi</li>';
            echo '  </ol>';
            echo '</nav>';
        }else{
            if($_GET['Page']=="Akses"){
                if(empty($_GET['Sub'])){
                    echo '<h1><i class="bi bi-person"></i> Akses</h1>';
                    echo '<nav>';
                    echo '  <ol class="breadcrumb">';
                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                    echo '      <li class="breadcrumb-item active">Akses</li>';
                    echo '  </ol>';
                    echo '</nav>';
                }else{
                    if($_GET['Sub']=="AturIjinAkses"){
                        echo '<h1><i class="bi bi-person-badge"></i> Atur ijin Akses</h1>';
                        echo '<nav>';
                        echo '  <ol class="breadcrumb">';
                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Akses">Akses</a></li>';
                        echo '      <li class="breadcrumb-item active">Atur ijin Akses</li>';
                        echo '  </ol>';
                        echo '</nav>';
                    }else{
                        if($_GET['Sub']=="DetailAkses"){
                            echo '<h1><i class="bi bi-person-badge"></i> Detail Akses</h1>';
                            echo '<nav>';
                            echo '  <ol class="breadcrumb">';
                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                            echo '      <li class="breadcrumb-item"><a href="index.php?Page=Akses">Akses</a></li>';
                            echo '      <li class="breadcrumb-item active">Detail Akses</li>';
                            echo '  </ol>';
                            echo '</nav>';
                        }
                    }
                }
            }else{
                if($_GET['Page']=="SettingGeneral"){
                    echo '<h1><i class="bi bi-gear"></i> Pengaturan Umum</h1>';
                    echo '<nav>';
                    echo '  <ol class="breadcrumb">';
                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                    echo '      <li class="breadcrumb-item active">Pengaturan Umum</li>';
                    echo '  </ol>';
                    echo '</nav>';
                }else{
                    if($_GET['Page']=="EntitasAkses"){
                        if(empty($_GET['Sub'])){
                            echo '<h1><i class="bi bi-key"></i> Entitas Ases</h1>';
                            echo '<nav>';
                            echo '  <ol class="breadcrumb">';
                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                            echo '      <li class="breadcrumb-item active">Entitas Akses</li>';
                            echo '  </ol>';
                            echo '</nav>';
                        }else{
                            if($_GET['Sub']=="BuatEntitas"){
                                echo '<h1><i class="bi bi-key"></i> Entitas Ases</h1>';
                                echo '<nav>';
                                echo '  <ol class="breadcrumb">';
                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=EntitasAkses">Entitas Akses</a></li>';
                                echo '      <li class="breadcrumb-item active">Buat Entitas</li>';
                                echo '  </ol>';
                                echo '</nav>';
                            }
                        }
                        
                    }else{
                        if($_GET['Page']=="Anggota"){
                            echo '<h1><i class="bi bi-people"></i> Anggota</h1>';
                            echo '<nav>';
                            echo '  <ol class="breadcrumb">';
                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                            echo '      <li class="breadcrumb-item active">Anggota</li>';
                            echo '  </ol>';
                            echo '</nav>';
                        }else{
                            if($_GET['Page']=="Tabungan"){
                                
                                if(empty($_GET['Sub'])){
                                    echo '<h1><i class="bi bi-wallet"></i> Simpanan Anggota</h1>';
                                    echo '<nav>';
                                    echo '  <ol class="breadcrumb">';
                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                    echo '      <li class="breadcrumb-item active">Simpanan</li>';
                                    echo '  </ol>';
                                    echo '</nav>';
                                }else{
                                    if($_GET['Sub']=="TambahTabungan"){
                                        echo '<h1><i class="bi bi-wallet"></i> Simpanan Anggota</h1>';
                                        echo '<nav>';
                                        echo '  <ol class="breadcrumb">';
                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Tabungan">Simpanan</a></li>';
                                        echo '      <li class="breadcrumb-item active">Tambah Simpanan</li>';
                                        echo '  </ol>';
                                        echo '</nav>';
                                    }else{
                                        if($_GET['Sub']=="DetailTabungan"){
                                            echo '<h1><i class="bi bi-wallet"></i> Detail Simpanan</h1>';
                                            echo '<nav>';
                                            echo '  <ol class="breadcrumb">';
                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                            echo '      <li class="breadcrumb-item"><a href="index.php?Page=Tabungan">Simpanan</a></li>';
                                            echo '      <li class="breadcrumb-item active">Detail Simpanan</li>';
                                            echo '  </ol>';
                                            echo '</nav>';
                                        }
                                    }
                                }
                            }else{
                                if($_GET['Page']=="SettingEmail"){
                                    echo '<h1><i class="bi bi-envelope"></i> Pengaturan Email</h1>';
                                    echo '<nav>';
                                    echo '  <ol class="breadcrumb">';
                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                    echo '      <li class="breadcrumb-item active">Pengaturan Email</li>';
                                    echo '  </ol>';
                                    echo '</nav>';
                                }else{
                                    if($_GET['Page']=="ApiDoc"){
                                        echo '<h1><i class="bi bi-file-code"></i> Dokumentasi API</h1>';
                                        echo '<nav>';
                                        echo '  <ol class="breadcrumb">';
                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                        echo '      <li class="breadcrumb-item active">Dokumentasi API</li>';
                                        echo '  </ol>';
                                        echo '</nav>';
                                    }else{
                                        if($_GET['Page']=="Pinjaman"){
                                            if(empty($_GET['Sub'])){
                                                echo '<h1><i class="bi bi-bank"></i> Pinjaman</h1>';
                                                echo '<nav>';
                                                echo '  <ol class="breadcrumb">';
                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                echo '      <li class="breadcrumb-item active">Pinjaman</li>';
                                                echo '  </ol>';
                                                echo '</nav>';
                                            }else{
                                                $Sub=$_GET['Sub'];
                                                if($Sub=="TambahPinjaman"){
                                                    echo '<h1><i class="bi bi-bank"></i> Pinjaman</h1>';
                                                    echo '<nav>';
                                                    echo '  <ol class="breadcrumb">';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Pinjaman">Pinjaman</a></li>';
                                                    echo '      <li class="breadcrumb-item active">Tambah Pinjaman</li>';
                                                    echo '  </ol>';
                                                    echo '</nav>';
                                                }else{
                                                    if($Sub=="DetailPinjaman"){
                                                        echo '<h1><i class="bi bi-bank"></i> Pinjaman</h1>';
                                                        echo '<nav>';
                                                        echo '  <ol class="breadcrumb">';
                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Pinjaman">Pinjaman</a></li>';
                                                        echo '      <li class="breadcrumb-item active">Detail Pinjaman</li>';
                                                        echo '  </ol>';
                                                        echo '</nav>';
                                                    }else{
                                                        
                                                    }
                                                }
                                            }
                                            
                                        }else{
                                            if($_GET['Page']=="Partnership"){
                                                echo '<h1><i class="bi bi-building"></i> Mitra</h1>';
                                                echo '<nav>';
                                                echo '  <ol class="breadcrumb">';
                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                echo '      <li class="breadcrumb-item active">Mitra</li>';
                                                echo '  </ol>';
                                                echo '</nav>';
                                            }else{
                                                if($_GET['Page']=="AutoJurnal"){
                                                    echo '<h1><i class="bi bi-journal-medical"></i> Auto Jurnal</h1>';
                                                    echo '<nav>';
                                                    echo '  <ol class="breadcrumb">';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                    echo '      <li class="breadcrumb-item active">Auto Jurnal</li>';
                                                    echo '  </ol>';
                                                    echo '</nav>';
                                                }else{
                                                    if($_GET['Page']=="MyProfile"){
                                                        echo '<h1><i class="bi bi-person-circle"></i> Profile Saya</h1>';
                                                        echo '<nav>';
                                                        echo '  <ol class="breadcrumb">';
                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                        echo '      <li class="breadcrumb-item active">Profile Saya</li>';
                                                        echo '  </ol>';
                                                        echo '</nav>';
                                                    }else{
                                                        if($_GET['Page']=="Help"){
                                                            echo '<h1><i class="bi bi-person-circle"></i> Bantuan</h1>';
                                                            echo '<nav>';
                                                            echo '  <ol class="breadcrumb">';
                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                            echo '      <li class="breadcrumb-item active">Bantuan</li>';
                                                            echo '  </ol>';
                                                            echo '</nav>';
                                                        }else{
                                                            if($_GET['Page']=="RiwayatAnggota"){
                                                                if(empty($_GET['Sub'])){
                                                                    echo '<h1><i class="bi bi-clock"></i> Riwayat Pembelian</h1>';
                                                                    echo '<nav>';
                                                                    echo '  <ol class="breadcrumb">';
                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                    echo '      <li class="breadcrumb-item active">Riwayat Pembelian</li>';
                                                                    echo '  </ol>';
                                                                    echo '</nav>';
                                                                }else{
                                                                    $Sub=$_GET['Sub'];
                                                                    if($Sub=="Pembelian"){
                                                                        echo '<h1><i class="bi bi-clock"></i> Riwayat Pembelian</h1>';
                                                                        echo '<nav>';
                                                                        echo '  <ol class="breadcrumb">';
                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                        echo '      <li class="breadcrumb-item active">Riwayat Pembelian</li>';
                                                                        echo '  </ol>';
                                                                        echo '</nav>';
                                                                    }else{
                                                                        if($Sub=="Simpanan"){
                                                                            echo '<h1><i class="bi bi-clock"></i> Riwayat Simpanan</h1>';
                                                                            echo '<nav>';
                                                                            echo '  <ol class="breadcrumb">';
                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                            echo '      <li class="breadcrumb-item active">Riwayat Simpanan</li>';
                                                                            echo '  </ol>';
                                                                            echo '</nav>';
                                                                        }else{
                                                                            if($Sub=="Pinjaman"){
                                                                                echo '<h1><i class="bi bi-clock"></i> Riwayat Pinjaman</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Riwayat Pinjaman</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }else{
                                                                                if($Sub=="Angsuran"){
                                                                                    echo '<h1><i class="bi bi-clock"></i> Riwayat Angsuran</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Riwayat Angsuran</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }else{
                                                                                    if($Sub=="DetailPembelian"){
                                                                                        echo '<h1><i class="bi bi-info-circle"></i> Detail Transaksi</h1>';
                                                                                        echo '<nav>';
                                                                                        echo '  <ol class="breadcrumb">';
                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                        echo '      <li class="breadcrumb-item active">Detail Transaksi</li>';
                                                                                        echo '  </ol>';
                                                                                        echo '</nav>';
                                                                                    }else{
                                                                                        
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                
                                                            }else{
                                                                if($_GET['Page']=="StockOpename"){
                                                                    echo '<h1><i class="bi bi-truck-flatbed"></i> Stock Opename</h1>';
                                                                    echo '<nav>';
                                                                    echo '  <ol class="breadcrumb">';
                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                    echo '      <li class="breadcrumb-item active">Stock Opename</li>';
                                                                    echo '  </ol>';
                                                                    echo '</nav>';
                                                                }else{
                                                                    if($_GET['Page']=="JadwalPraktek"){
                                                                        echo '<h1><i class="bi bi-calendar-check"></i> Jadwal Praktek</h1>';
                                                                        echo '<nav>';
                                                                        echo '  <ol class="breadcrumb">';
                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                        echo '      <li class="breadcrumb-item active">Jadwal Praktek</li>';
                                                                        echo '  </ol>';
                                                                        echo '</nav>';
                                                                    }else{
                                                                        if($_GET['Page']=="Kunjungan"){
                                                                            if(empty($_GET['Sub'])){
                                                                                echo '<h1><i class="bi bi-journal-text"></i> Kunjungan</h1>';
                                                                                echo '<nav>';
                                                                                echo '  <ol class="breadcrumb">';
                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                echo '      <li class="breadcrumb-item active">Kunjungan</li>';
                                                                                echo '  </ol>';
                                                                                echo '</nav>';
                                                                            }else{
                                                                                $Sub=$_GET['Sub'];
                                                                                if($Sub=="Pendaftaran"){
                                                                                    echo '<h1><i class="bi bi-journal-text"></i> Pendaftaran Kunjungan</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Kunjungan">Kunjungan</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Pendaftaran Kunjungan</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }else{
                                                                                    if($Sub=="DetailKunjungan"){
                                                                                        echo '<h1><i class="bi bi-journal-text"></i> Detail Kunjungan</h1>';
                                                                                        echo '<nav>';
                                                                                        echo '  <ol class="breadcrumb">';
                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Kunjungan">Kunjungan</a></li>';
                                                                                        echo '      <li class="breadcrumb-item active">Detail Kunjungan</li>';
                                                                                        echo '  </ol>';
                                                                                        echo '</nav>';
                                                                                    }
                                                                                }
                                                                            }
                                                                        }else{
                                                                            if($_GET['Page']=="KontenWeb"){
                                                                                if($_GET['Sub']=="KontenUmum"){
                                                                                    echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Konten Web</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }
                                                                                if($_GET['Sub']=="PagePosting"){
                                                                                    echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Posting Web</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }
                                                                                if($_GET['Sub']=="TambahPagePosting"){
                                                                                    echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=KontenWeb&Sub=PagePosting">Posting</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Tambah Posting Web</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }
                                                                                if($_GET['Sub']=="EditPagePosting"){
                                                                                    echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=KontenWeb&Sub=PagePosting">Posting</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Edit Posting Web</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }
                                                                                if($_GET['Sub']=="UrlDinamis"){
                                                                                    echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">URL Dinamis</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }
                                                                                if($_GET['Sub']=="Testimoni"){
                                                                                    echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">Testimoni</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }
                                                                                if($_GET['Sub']=="FAQ"){
                                                                                    echo '<h1><i class="bi bi-google"></i> Konten Web</h1>';
                                                                                    echo '<nav>';
                                                                                    echo '  <ol class="breadcrumb">';
                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                    echo '      <li class="breadcrumb-item active">FAQ</li>';
                                                                                    echo '  </ol>';
                                                                                    echo '</nav>';
                                                                                }
                                                                            }else{
                                                                                if($_GET['Page']=="Supplier"){
                                                                                    if(empty($_GET['Sub'])){
                                                                                        echo '<h1><i class="bi bi-truck"></i> Supplier</h1>';
                                                                                        echo '<nav>';
                                                                                        echo '  <ol class="breadcrumb">';
                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                        echo '      <li class="breadcrumb-item active">Supplier</li>';
                                                                                        echo '  </ol>';
                                                                                        echo '</nav>';
                                                                                    }else{
                                                                                        $Sub=$_GET['Sub'];
                                                                                        if($Sub=="DetailSupplier"){
                                                                                            echo '<h1><i class="bi bi-truck"></i> Supplier</h1>';
                                                                                            echo '<nav>';
                                                                                            echo '  <ol class="breadcrumb">';
                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php?Page=Supplier">Supplier</a></li>';
                                                                                            echo '      <li class="breadcrumb-item active">Detail Supplier</li>';
                                                                                            echo '  </ol>';
                                                                                            echo '</nav>';
                                                                                        }else{
                                                                                            if($Sub=="Import"){
                                                                                                echo '<h1><i class="bi bi-truck"></i> Supplier</h1>';
                                                                                                echo '<nav>';
                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=Supplier">Supplier</a></li>';
                                                                                                echo '      <li class="breadcrumb-item active">Import Supplier</li>';
                                                                                                echo '  </ol>';
                                                                                                echo '</nav>';
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }else{
                                                                                    if($_GET['Page']=="Barang"){
                                                                                        if(empty($_GET['Sub'])){
                                                                                            echo '<h1><i class="bi bi-box-seam"></i> Barang</h1>';
                                                                                            echo '<nav>';
                                                                                            echo '  <ol class="breadcrumb">';
                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                            echo '      <li class="breadcrumb-item active">Barang</li>';
                                                                                            echo '  </ol>';
                                                                                            echo '</nav>';
                                                                                        }else{
                                                                                            $Sub=$_GET['Sub'];
                                                                                            if($Sub=="DetailBarang"){
                                                                                                echo '<h1><i class="bi bi-box-seam"></i> Barang</h1>';
                                                                                                echo '<nav>';
                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=Barang">Barang</a></li>';
                                                                                                echo '      <li class="breadcrumb-item active">Detail Barang</li>';
                                                                                                echo '  </ol>';
                                                                                                echo '</nav>';
                                                                                            }else{
                                                                                                if($Sub=="Import"){
                                                                                                    echo '<h1><i class="bi bi-box-seam"></i> Barang</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Barang">Barang</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Import Barang</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }else{
                                                                                        if($_GET['Page']=="Transaksi"){
                                                                                            if(empty($_GET['Sub'])){
                                                                                                echo '<h1><i class="bi bi-cart-check"></i> Transaksi</h1>';
                                                                                                echo '<nav>';
                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                echo '      <li class="breadcrumb-item active">Transaksi</li>';
                                                                                                echo '  </ol>';
                                                                                                echo '</nav>';
                                                                                            }else{
                                                                                                $Sub=$_GET['Sub'];
                                                                                                if($Sub=="TambahTransaksi"){
                                                                                                    echo '<h1><i class="bi bi-cart-check"></i> Tambah Transaksi</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Transaksi">Transaksi</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Tambah Transaksi</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }else{
                                                                                                    if($Sub=="DetailTransaksi"){
                                                                                                        echo '<h1><i class="bi bi-cart-check"></i> Detail Transaksi</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Transaksi">Transaksi</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Detail Transaksi</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }else{
                                                                                                        if($Sub=="EditTransaksi"){
                                                                                                            echo '<h1><i class="bi bi-cart-check"></i> Edit Transaksi</h1>';
                                                                                                            echo '<nav>';
                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php?Page=Transaksi">Transaksi</a></li>';
                                                                                                            echo '      <li class="breadcrumb-item active">Edit Transaksi</li>';
                                                                                                            echo '  </ol>';
                                                                                                            echo '</nav>';
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }else{
                                                                                            if($_GET['Page']=="Pembayaran"){
                                                                                                if(!empty($_GET['Sub'])){
                                                                                                    $Sub=$_GET['Sub'];
                                                                                                }else{
                                                                                                    $Sub="";
                                                                                                }
                                                                                                if($Sub=="TambahPembayaran"){
                                                                                                    echo '<h1><i class="bi bi-cash-coin"></i> Tambah Pembayaran</h1>';
                                                                                                    echo '<nav>';
                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=Pembayaran">Pembayaran</a></li>';
                                                                                                    echo '      <li class="breadcrumb-item active">Tambah Pembayaran</li>';
                                                                                                    echo '  </ol>';
                                                                                                    echo '</nav>';
                                                                                                }else{
                                                                                                    if($Sub=="EditPembayaran"){
                                                                                                        echo '<h1><i class="bi bi-cash-coin"></i> Tambah Pembayaran</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php?Page=Pembayaran">Pembayaran</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Edit Pembayaran</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }else{
                                                                                                        echo '<h1><i class="bi bi-cash-coin"></i> Pembayaran</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Pembayaran</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                if($_GET['Page']=="Aktivitas"){
                                                                                                    if($_GET['Sub']=="AktivitasUmum"||$_GET['Sub']==""){
                                                                                                        echo '<h1><i class="bi bi-record-btn"></i> Aktivitas Umum</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Aktivitas</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }
                                                                                                    if($_GET['Sub']=="Email"){
                                                                                                        echo '<h1><i class="bi bi-record-btn"></i> Aktivitas Email</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Aktivitas</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }
                                                                                                    if($_GET['Sub']=="APIs"){
                                                                                                        echo '<h1><i class="bi bi-record-btn"></i> Aktivitas APIs</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Aktivitas</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }
                                                                                                }else{
                                                                                                    if($_GET['Page']=="AkunPerkiraan"){
                                                                                                        echo '<h1><i class="bi bi-list-nested"></i> Akun Perkiraan</h1>';
                                                                                                        echo '<nav>';
                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                        echo '      <li class="breadcrumb-item active">Akun Perkiraan</li>';
                                                                                                        echo '  </ol>';
                                                                                                        echo '</nav>';
                                                                                                    }else{
                                                                                                        if($_GET['Page']=="BarangExpired"){
                                                                                                            if(empty($_GET['Sub'])){
                                                                                                                echo '<h1><i class="bi bi-calendar-check"></i> Batch & Expired</h1>';
                                                                                                                echo '<nav>';
                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                echo '      <li class="breadcrumb-item active">Batch & Expired</li>';
                                                                                                                echo '  </ol>';
                                                                                                                echo '</nav>';
                                                                                                            }else{
                                                                                                                if($_GET['Sub']=="Import"){
                                                                                                                    echo '<h1><i class="bi bi-calendar-check"></i> Batch & Expired</h1>';
                                                                                                                    echo '<nav>';
                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php?Page=BarangExpired">Batch & Expired</a></li>';
                                                                                                                    echo '      <li class="breadcrumb-item active">Import Batch & Expired</li>';
                                                                                                                    echo '  </ol>';
                                                                                                                    echo '</nav>';
                                                                                                                }else{
                                                                                                                    echo '<h1><i class="bi bi-calendar-check"></i> Batch & Expired</h1>';
                                                                                                                    echo '<nav>';
                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                    echo '      <li class="breadcrumb-item active">Batch & Expired</li>';
                                                                                                                    echo '  </ol>';
                                                                                                                    echo '</nav>';
                                                                                                                }
                                                                                                            }
                                                                                                        }else{
                                                                                                            if($_GET['Page']=="WhatsappGateway"){
                                                                                                                if($_GET['Sub']=="AkunWa"){
                                                                                                                    echo '<h1><i class="bi bi-whatsapp"></i> Akun Whatsapp</h1>';
                                                                                                                    echo '<nav>';
                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                    echo '      <li class="breadcrumb-item active">Akun Whatsapp</li>';
                                                                                                                    echo '  </ol>';
                                                                                                                    echo '</nav>';
                                                                                                                }else{
                                                                                                                    echo '<h1><i class="bi bi-whatsapp"></i> Whatsapp Gateway</h1>';
                                                                                                                    echo '<nav>';
                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                    echo '      <li class="breadcrumb-item active">Whatsapp Gateway</li>';
                                                                                                                    echo '  </ol>';
                                                                                                                    echo '</nav>';
                                                                                                                }
                                                                                                            }else{
                                                                                                                if($_GET['Page']=="Jurnal"){
                                                                                                                    echo '<h1><i class="bi bi-file-ruled"></i> Jurnal</h1>';
                                                                                                                    echo '<nav>';
                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                    echo '      <li class="breadcrumb-item active">Jurnal</li>';
                                                                                                                    echo '  </ol>';
                                                                                                                    echo '</nav>';
                                                                                                                }else{
                                                                                                                    if($_GET['Page']=="BukuBesar"){
                                                                                                                        echo '<h1><i class="bi bi-file-ruled"></i> Buku Besar</h1>';
                                                                                                                        echo '<nav>';
                                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                        echo '      <li class="breadcrumb-item active">Buku Besar</li>';
                                                                                                                        echo '  </ol>';
                                                                                                                        echo '</nav>';
                                                                                                                    }else{
                                                                                                                        if($_GET['Page']=="NeracaSaldo"){
                                                                                                                            echo '<h1><i class="bi bi-list"></i> Neraca Saldo</h1>';
                                                                                                                            echo '<nav>';
                                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                            echo '      <li class="breadcrumb-item active">Neraca Saldo</li>';
                                                                                                                            echo '  </ol>';
                                                                                                                            echo '</nav>';
                                                                                                                        }else{
                                                                                                                            if($_GET['Page']=="LabaRugi"){
                                                                                                                                echo '<h1><i class="bi bi-bxs-coin"></i> Laba-Rugi</h1>';
                                                                                                                                echo '<nav>';
                                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                echo '      <li class="breadcrumb-item active">Laba Rugi</li>';
                                                                                                                                echo '  </ol>';
                                                                                                                                echo '</nav>';
                                                                                                                            }else{
                                                                                                                                if($_GET['Page']=="RekapitulasiTransaksi"){
                                                                                                                                    echo '<h1><i class="bi bi-coin"></i> Rekapitulasi Transaksi</h1>';
                                                                                                                                    echo '<nav>';
                                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                    echo '      <li class="breadcrumb-item active">Rekapitulasi Transaksi</li>';
                                                                                                                                    echo '  </ol>';
                                                                                                                                    echo '</nav>';
                                                                                                                                }else{
                                                                                                                                    if($_GET['Page']=="BagiHasil"){
                                                                                                                                        if(empty($_GET['Sub'])){
                                                                                                                                            echo '<h1><i class="bi bi-coin"></i> Bagi Hasil</h1>';
                                                                                                                                            echo '<nav>';
                                                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                            echo '      <li class="breadcrumb-item active">Bagi Hasil</li>';
                                                                                                                                            echo '  </ol>';
                                                                                                                                            echo '</nav>';
                                                                                                                                        }else{
                                                                                                                                            $Sub=$_GET['Sub'];
                                                                                                                                            if($Sub=="DetailBagiHasil"){
                                                                                                                                                echo '<h1><i class="bi bi-coin"></i> Bagi Hasil</h1>';
                                                                                                                                                echo '<nav>';
                                                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php?Page=BagiHasil">Bagi Hasil</a></li>';
                                                                                                                                                echo '      <li class="breadcrumb-item active">Detail Bagi Hasil</li>';
                                                                                                                                                echo '  </ol>';
                                                                                                                                                echo '</nav>';
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        
                                                                                                                                    }else{
                                                                                                                                        if($_GET['Page']=="Komisi"){
                                                                                                                                            echo '<h1><i class="bi bi-coin"></i> Komisi</h1>';
                                                                                                                                            echo '<nav>';
                                                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                            echo '      <li class="breadcrumb-item active">Komisi</li>';
                                                                                                                                            echo '  </ol>';
                                                                                                                                            echo '</nav>';
                                                                                                                                        }else{
                                                                                                                                            if($_GET['Page']=="TamplateWa"){
                                                                                                                                                echo '<h1><i class="bi bi-whatsapp"></i> Tamplate Whatsapp</h1>';
                                                                                                                                                echo '<nav>';
                                                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                echo '      <li class="breadcrumb-item active">Tamplate Whatsapp</li>';
                                                                                                                                                echo '  </ol>';
                                                                                                                                                echo '</nav>';
                                                                                                                                            }else{
                                                                                                                                                if($_GET['Page']=="RencanaKirim"){
                                                                                                                                                    echo '<h1><i class="bi bi-calendar-check"></i> Rencana Kirim Pesan</h1>';
                                                                                                                                                    echo '<nav>';
                                                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                    echo '      <li class="breadcrumb-item active">Rencana Kirim Pesan</li>';
                                                                                                                                                    echo '  </ol>';
                                                                                                                                                    echo '</nav>';
                                                                                                                                                }else{
                                                                                                                                                    if($_GET['Page']=="WhatsappChatBox"){
                                                                                                                                                        echo '<h1><i class="bi bi-envelope"></i> Chat Box</h1>';
                                                                                                                                                        echo '<nav>';
                                                                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                        echo '      <li class="breadcrumb-item active">Chat Box</li>';
                                                                                                                                                        echo '  </ol>';
                                                                                                                                                        echo '</nav>';
                                                                                                                                                    }else{
                                                                                                                                                        if($_GET['Page']=="Error"){
                                                                                                                                                            echo '<h1><i class="bi bi-emoji-angry"></i> Error</h1>';
                                                                                                                                                            echo '<nav>';
                                                                                                                                                            echo '  <ol class="breadcrumb">';
                                                                                                                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                            echo '      <li class="breadcrumb-item active">Error</li>';
                                                                                                                                                            echo '  </ol>';
                                                                                                                                                            echo '</nav>';
                                                                                                                                                        }else{
                                                                                                                                                            if($_GET['Page']=="SettingForm"){
                                                                                                                                                                echo '<h1><i class="bi bi-window-desktop"></i> Tamplate Form Medrek</h1>';
                                                                                                                                                                echo '<nav>';
                                                                                                                                                                echo '  <ol class="breadcrumb">';
                                                                                                                                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                                echo '      <li class="breadcrumb-item active">Setting Form</li>';
                                                                                                                                                                echo '  </ol>';
                                                                                                                                                                echo '</nav>';
                                                                                                                                                            }else{
                                                                                                                                                                if($_GET['Page']=="NeracaSaldo"){
                                                                                                                                                                    echo '<h1><i class="bi bi-list-check"></i> Neraca Saldo</h1>';
                                                                                                                                                                    echo '<nav>';
                                                                                                                                                                    echo '  <ol class="breadcrumb">';
                                                                                                                                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                                    echo '      <li class="breadcrumb-item active">Neraca Saldo</li>';
                                                                                                                                                                    echo '  </ol>';
                                                                                                                                                                    echo '</nav>';
                                                                                                                                                                }else{
                                                                                                                                                                    if($_GET['Page']=="CronJob"){
                                                                                                                                                                        echo '<h1><i class="bi bi-arrow-repeat"></i> Cron Job</h1>';
                                                                                                                                                                        echo '<nav>';
                                                                                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                                        echo '      <li class="breadcrumb-item active">Cron Job</li>';
                                                                                                                                                                        echo '  </ol>';
                                                                                                                                                                        echo '</nav>';
                                                                                                                                                                    }else{
                                                                                                                                                                        echo '<h1><i class="bi bi-emoji-angry"></i> Error</h1>';
                                                                                                                                                                        echo '<nav>';
                                                                                                                                                                        echo '  <ol class="breadcrumb">';
                                                                                                                                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                                                                                                                                        echo '      <li class="breadcrumb-item active">Error</li>';
                                                                                                                                                                        echo '  </ol>';
                                                                                                                                                                        echo '</nav>';
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
            }
    }
    echo '</div>';
?>
