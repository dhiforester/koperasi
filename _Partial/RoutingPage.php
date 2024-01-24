<?php
    if(empty($_GET['Page'])){
        include "_Page/Dashboard/Dashboard.php";
    }else{
        $Page=$_GET['Page'];
        if($Page=="Version"){
            include "_Page/Version/Version.php";
        }else{
            if($Page=="Akses"){
                include "_Page/Akses/Akses.php";
            }else{
                if($Page=="SettingGeneral"){
                    include "_Page/SettingGeneral/SettingGeneral.php";
                }else{
                    if($Page=="EntitasAkses"){
                        include "_Page/EntitasAkses/EntitasAkses.php";
                    }else{
                        if($Page=="Anggota"){
                            include "_Page/Anggota/Anggota.php";
                        }else{
                            if($Page=="ApiDoc"){
                                include "_Page/ApiDoc/ApiDoc.php";
                            }else{
                                if($Page=="Tabungan"){
                                    include "_Page/Tabungan/Tabungan.php";
                                }else{
                                    if($Page=="Pinjaman"){
                                        include "_Page/Pinjaman/Pinjaman.php";
                                    }else{
                                        if($Page=="AutoJurnal"){
                                            include "_Page/AutoJurnal/AutoJurnal.php";
                                        }else{
                                            if($Page=="MyProfile"){
                                                include "_Page/MyProfile/MyProfile.php";
                                            }else{
                                                if($Page=="Help"){
                                                    include "_Page/Help/Help.php";
                                                }else{
                                                    if($Page=="SettingEmail"){
                                                        include "_Page/SettingService/SettingService.php";
                                                    }else{
                                                        if($Page=="RiwayatAnggota"){
                                                            include "_Page/RiwayatAnggota/RiwayatAnggota.php";
                                                        }else{
                                                            if($Page=="StockOpename"){
                                                                include "_Page/StockOpename/StockOpename.php";
                                                            }else{
                                                                if($Page=="Kunjungan"){
                                                                    include "_Page/Kunjungan/Kunjungan.php";
                                                                }else{
                                                                    if($Page=="KontenWeb"){
                                                                        include "_Page/KontenWeb/KontenWeb.php";
                                                                    }else{
                                                                        if($Page=="Error"){
                                                                            include "_Page/Error/Error.php";
                                                                        }else{
                                                                            if($Page=="Supplier"){
                                                                                include "_Page/Supplier/Supplier.php";
                                                                            }else{
                                                                                if($Page=="Barang"){
                                                                                    include "_Page/Barang/Barang.php";
                                                                                }else{
                                                                                    if($Page=="Transaksi"){
                                                                                        include "_Page/Transaksi/Transaksi.php";
                                                                                    }else{
                                                                                        if($Page=="Pembayaran"){
                                                                                            include "_Page/Pembayaran/Pembayaran.php";
                                                                                        }else{
                                                                                            if($Page=="Aktivitas"){
                                                                                                include "_Page/Aktivitas/Aktivitas.php";
                                                                                            }else{
                                                                                                if($Page=="AkunPerkiraan"){
                                                                                                    include "_Page/AkunPerkiraan/AkunPerkiraan.php";
                                                                                                }else{
                                                                                                    if($Page=="BarangExpired"){
                                                                                                        include "_Page/BarangExpired/BarangExpired.php";
                                                                                                    }else{
                                                                                                        if($Page=="WhatsappGateway"){
                                                                                                            include "_Page/WhatsappGateway/WhatsappGateway.php";
                                                                                                        }else{
                                                                                                            if($Page=="Jurnal"){
                                                                                                                include "_Page/Jurnal/Jurnal.php";
                                                                                                            }else{
                                                                                                                if($Page=="BukuBesar"){
                                                                                                                    include "_Page/BukuBesar/BukuBesar.php";
                                                                                                                }else{
                                                                                                                    if($Page=="NeracaSaldo"){
                                                                                                                        include "_Page/NeracaSaldo/NeracaSaldo.php";
                                                                                                                    }else{
                                                                                                                        if($Page=="LabaRugi"){
                                                                                                                            include "_Page/LabaRugi/LabaRugi.php";
                                                                                                                        }else{
                                                                                                                            if($Page=="RekapitulasiTransaksi"){
                                                                                                                                include "_Page/RekapitulasiTransaksi/RekapitulasiTransaksi.php";
                                                                                                                            }else{
                                                                                                                                if($Page=="Komisi"){
                                                                                                                                    include "_Page/Komisi/Komisi.php";
                                                                                                                                }else{
                                                                                                                                    if($Page=="BagiHasil"){
                                                                                                                                        include "_Page/BagiHasil/BagiHasil.php";
                                                                                                                                    }else{
                                                                                                                                        if($Page=="TamplateWa"){
                                                                                                                                            include "_Page/TamplateWa/TamplateWa.php";
                                                                                                                                        }else{
                                                                                                                                            if($Page=="RencanaKirim"){
                                                                                                                                                include "_Page/RencanaKirim/RencanaKirim.php";
                                                                                                                                            }else{
                                                                                                                                                if($Page=="WhatsappChatBox"){
                                                                                                                                                    include "_Page/WhatsappChatBox/WhatsappChatBox.php";
                                                                                                                                                }else{
                                                                                                                                                    if($Page=="CetakInvoice"){
                                                                                                                                                        include "_Page/CetakInvoice/CetakInvoice.php";
                                                                                                                                                    }else{
                                                                                                                                                        if($Page=="SettingForm"){
                                                                                                                                                            include "_Page/SettingForm/SettingForm.php";
                                                                                                                                                        }else{
                                                                                                                                                            if($Page=="CronJob"){
                                                                                                                                                                include "_Page/CronJob/CronJob.php";
                                                                                                                                                            }else{
                                                                                                                                                                include "_Page/Dashboard/Dashboard.php";
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
?>