<aside id="sidebar" class="sidebar menu_background">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu==""){echo "";}else{echo "collapsed";} ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php if(!empty($AKS)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Akses"){echo "collapsed";} ?>" href="index.php?Page=Akses">
                    <i class="bi bi-person"></i>
                    <span>Akses</span>
                </a>
            </li>
        <?php }if(!empty($ANG)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Anggota"){echo "collapsed";} ?>" href="index.php?Page=Anggota">
                    <i class="bi bi-person-circle"></i>
                    <span>Anggota</span>
                </a>
            </li>
        <?php }if(!empty($SMPN)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Tabungan"){echo "collapsed";} ?>" href="index.php?Page=Tabungan">
                    <i class="bi bi-wallet"></i>
                    <span>Simpanan</span>
                </a>
            </li>
        <?php }if(!empty($PNJM)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Pinjaman"){echo "collapsed";} ?>" href="index.php?Page=Pinjaman">
                    <i class="bi bi-bank"></i>
                    <span>Pinjaman</span>
                </a>
            </li>
        <?php }if(!empty($BGH)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="BagiHasil"){echo "collapsed";} ?>" href="index.php?Page=BagiHasil">
                    <i class="bi bi-coin"></i>
                    <span>Bagi Hasil</span>
                </a>
            </li>
        <?php }if(!empty($SPP)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Supplier"){echo "collapsed";} ?>" href="index.php?Page=Supplier">
                    <i class="bi bi-truck"></i>
                    <span>Supplier</span>
                </a>
            </li>
        <?php }if(!empty($SPP)||!empty($BTE)||!empty($STO)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu=="Barang"||$PageMenu=="BarangExpired"||$PageMenu=="StockOpename"){echo "";}else{echo "collapsed";} ?>" data-bs-target="#icons2-nav" data-bs-toggle="collapse" href="javascript:void(0);">
                    <i class="bi bi-box-seam"></i>
                    <span>Barang</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons2-nav" class="nav-content collapse <?php if($PageMenu=="Barang"||$PageMenu=="BarangExpired"||$PageMenu=="StockOpename"){echo "show";} ?>" data-bs-parent="#sidebar-nav">
                    <?php if(!empty($SPP)){ ?>
                        <li>
                            <a href="index.php?Page=Barang" class="<?php if($PageMenu=="Barang"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Master Barang</span>
                            </a>
                        </li>
                    <?php }if(!empty($BTE)){ ?>
                        <li>
                            <a href="index.php?Page=BarangExpired" class="<?php if($PageMenu=="BarangExpired"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Batch & Expired</span>
                            </a>
                        </li>
                    <?php }if(!empty($STO)){ ?>
                        <li>
                            <a href="index.php?Page=StockOpename" class="<?php if($PageMenu=="StockOpename"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Stock Opename</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php }if(!empty($TRANS)||!empty($PMB)||!empty($AKP)||!empty($JRNL)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu=="Transaksi"||$PageMenu=="Pembayaran"||$PageMenu=="AkunPerkiraan"||$PageMenu=="Jurnal"){echo "";}else{echo "collapsed";} ?>" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="javascript:void(0);">
                    <i class="bi bi-gem"></i>
                    <span>Keuangan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse <?php if($PageMenu=="Transaksi"||$PageMenu=="Pembayaran"||$PageMenu=="AkunPerkiraan"||$PageMenu=="Jurnal"){echo "show";} ?>" data-bs-parent="#sidebar-nav">
                    <?php if(!empty($TRANS)){ ?>    
                        <li>
                            <a href="index.php?Page=Transaksi" class="<?php if($PageMenu=="Transaksi"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Transaksi</span>
                            </a>
                        </li>
                    <?php }if(!empty($PMB)){ ?>
                        <li>
                            <a href="index.php?Page=Pembayaran" class="<?php if($PageMenu=="Pembayaran"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Pembayaran</span>
                            </a>
                        </li>
                    <?php }if(!empty($AKP)){ ?>
                        <li>
                            <a href="index.php?Page=AkunPerkiraan" class="<?php if($PageMenu=="AkunPerkiraan"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Akun Perkiraan</span>
                            </a>
                        </li>
                    <?php }if(!empty($JRNL)){ ?>
                        <li>
                            <a href="index.php?Page=Jurnal" class="<?php if($PageMenu=="Jurnal"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Jurnal Akuntansi</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php }if(!empty($BKBS)||!empty($NRC)||!empty($LBRG)||!empty($RKP)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu=="BukuBesar"||$PageMenu=="NeracaSaldo"||$PageMenu=="LabaRugi"||$PageMenu=="RekapitulasiTransaksi"){echo "";}else{echo "collapsed";} ?>" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="javascript:void(0);">
                    <i class="bi bi-bar-chart"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse <?php if($PageMenu=="BukuBesar"||$PageMenu=="NeracaSaldo"||$PageMenu=="LabaRugi"||$PageMenu=="RekapitulasiTransaksi"){echo "show";} ?>" data-bs-parent="#sidebar-nav">
                    <?php if(!empty($BKBS)){ ?>    
                        <li>
                            <a href="index.php?Page=BukuBesar" class="<?php if($PageMenu=="BukuBesar"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Buku Besar</span>
                            </a>
                        </li>
                    <?php }if(!empty($NRC)){ ?>  
                        <li>
                            <a href="index.php?Page=NeracaSaldo" class="<?php if($PageMenu=="NeracaSaldo"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Neraca saldo</span>
                            </a>
                        </li>
                    <?php }if(!empty($LBRG)){ ?> 
                        <li>
                            <a href="index.php?Page=LabaRugi" class="<?php if($PageMenu=="LabaRugi"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Laba Rugi</span>
                            </a>
                        </li>
                    <?php }if(!empty($RKP)){ ?> 
                        <li>
                            <a href="index.php?Page=RekapitulasiTransaksi" class="<?php if($PageMenu=="RekapitulasiTransaksi"){echo "active";} ?>">
                            <i class="bi bi-circle"></i><span>Rekapitulasi</span>
                            </a>
                        </li>
                    <?php } ?> 
                </ul>
            </li>
        <?php }if(!empty($ATJR)||!empty($EML)||!empty($ETAK)||!empty($UMM)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu=="SettingGeneral"||$PageMenu=="EntitasAkses"||$PageMenu=="AutoJurnal"){echo "";}else{echo "collapsed";} ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="javascript:void(0);">
                    <i class="bi bi-gear"></i>
                        <span>Pengaturan</span><i class="bi bi-chevron-down ms-auto">
                    </i>
                </a>
                <ul id="components-nav" class="nav-content collapse <?php if($PageMenu=="SettingGeneral"||$PageMenu=="EntitasAkses"||$PageMenu=="AutoJurnal"){echo "show";} ?>" data-bs-parent="#sidebar-nav">
                    <?php if(!empty($UMM)){ ?>  
                        <li>
                            <a href="index.php?Page=SettingGeneral" class="<?php if($PageMenu=="SettingGeneral"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Umum</span>
                            </a>
                        </li>
                    <?php }if(!empty($ETAK)){ ?>  
                        <li>
                            <a href="index.php?Page=EntitasAkses" class="<?php if($PageMenu=="EntitasAkses"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Entitas Akses</span>
                            </a>
                        </li>
                    <?php }if(!empty($ATJR)){ ?>  
                        <li>
                            <a href="index.php?Page=AutoJurnal" class="<?php if($PageMenu=="AutoJurnal"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Auto Jurnal</span>
                            </a>
                        </li>
                    <?php }if(!empty($EML)){ ?>  
                        <li>
                            <a href="index.php?Page=SettingEmail" class="<?php if($PageMenu=="SettingEmail"){echo "active";} ?>">
                                <i class="bi bi-circle"></i><span>Email</span>
                            </a>
                        </li>
                    <?php } ?>  
                </ul>
            </li>
        <?php }if(!empty($AKEM)||!empty($AKUM)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu=="Aktivitas"){echo "";}else{echo "collapsed";} ?>" data-bs-target="#catatan-aktivitas" data-bs-toggle="collapse" href="javascript:void(0);">
                    <i class="bi bi-record-btn"></i><span>Aktivitas</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="catatan-aktivitas" class="nav-content collapse <?php if($PageMenu=="Aktivitas"){echo "show";} ?>" data-bs-parent="#sidebar-nav">
                    <?php if(!empty($AKUM)){ ?>  
                        <li>
                            <a href="index.php?Page=Aktivitas&Sub=AktivitasUmum" class="<?php if($SubMenu=="AktivitasUmum"){echo "active";} ?>">
                            <i class="bi bi-circle"></i><span>Aktivitas Umum</span>
                            </a>
                        </li>
                    <?php }if(!empty($AKEM)){ ?> 
                        <li>
                            <a href="index.php?Page=Aktivitas&Sub=Email" class="<?php if($SubMenu=="Email"){echo "active";} ?>">
                            <i class="bi bi-circle"></i><span>Email</span>
                            </a>
                        </li>
                    <?php } ?> 
                </ul>
            </li>
        <li class="nav-heading">Fitur Lainnya</li>
        <?php }if(!empty($BNT)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Help"){echo "collapsed";} ?>" href="index.php?Page=Help&Sub=HelpData">
                    <i class="bi bi-question"></i>
                    <span>Bantuan</span>
                </a>
            </li>
        <?php }if(!empty($DKM)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="ApiDoc"){echo "collapsed";} ?>" href="index.php?Page=ApiDoc">
                    <i class="bi bi-file-code"></i>
                    <span>Dokumentasi APIs</span>
                </a>
            </li>
        <?php }if(!empty($TNT)){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Version"){echo "collapsed";} ?>" href="index.php?Page=Version">
                    <i class="bi bi-info-circle"></i>
                    <span>Tentang</span>
                </a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>
</aside> 