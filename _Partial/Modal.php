<?php
    include "_Page/Logout/ModalLogout.php";
    if(empty($_GET['Page'])){
        $Page="";
    }else{
        $Page=$_GET['Page'];
    }
    if($Page=="Akses"){
        include "_Page/Akses/ModalAkses.php";
    }else{
        if($Page=="SettingGeneral"){
            include "_Page/SettingGeneral/ModalSettingGeneral.php";
        }else{
            if($Page=="EntitasAkses"){
                include "_Page/EntitasAkses/ModalEntitasAkses.php";
            }else{
                if($Page=="Anggota"){
                    include "_Page/Anggota/ModalAnggota.php";
                }else{
                    if($Page=="ApiDoc"){
                        include "_Page/ApiDoc/ModalApiDoc.php";
                    }else{
                        if($Page=="Tabungan"){
                            include "_Page/Tabungan/ModalTabungan.php";
                        }else{
                            if($Page=="Pinjaman"){
                                include "_Page/Pinjaman/ModalPinjaman.php";
                            }else{
                                if($Page=="AutoJurnal"){
                                    include "_Page/AutoJurnal/ModalAutoJurnal.php";
                                }else{
                                    if($Page=="MyProfile"){
                                        include "_Page/MyProfile/ModalMyProfile.php";
                                    }else{
                                        if($Page=="Help"){
                                            include "_Page/Help/ModalHelp.php";
                                        }else{
                                            if($Page=="SettingEmail"){
                                                include "_Page/SettingService/ModalSettingService.php";
                                            }else{
                                                if($Page=="StockOpename"){
                                                    include "_Page/StockOpename/ModalStockOpename.php";
                                                }else{
                                                    if($Page=="JadwalPraktek"){
                                                        include "_Page/JadwalPraktek/ModalJadwalPraktek.php";
                                                    }else{
                                                        if($Page=="Kunjungan"){
                                                            include "_Page/Kunjungan/ModalKunjungan.php";
                                                        }else{
                                                            if($Page=="KontenWeb"){
                                                                include "_Page/KontenWeb/ModalKontenWeb.php";
                                                            }else{
                                                                if($Page=="Supplier"){
                                                                    include "_Page/Supplier/ModalSupplier.php";
                                                                }else{
                                                                    if($Page=="Barang"){
                                                                        include "_Page/Barang/ModalBarang.php";
                                                                    }else{
                                                                        if($Page=="Transaksi"){
                                                                            include "_Page/Transaksi/ModalTransaksi.php";
                                                                        }else{
                                                                            if($Page=="Pembayaran"){
                                                                                include "_Page/Pembayaran/ModalPembayaran.php";
                                                                            }else{
                                                                                if($Page=="Aktivitas"){
                                                                                    include "_Page/Aktivitas/ModalAktivitas.php";
                                                                                }else{
                                                                                    if($Page=="AkunPerkiraan"){
                                                                                        include "_Page/AkunPerkiraan/ModalAkunPerkiraan.php";
                                                                                    }else{
                                                                                        if($Page=="WhatsappGateway"){
                                                                                            include "_Page/WhatsappGateway/ModalWhatsappGateway.php";
                                                                                        }else{
                                                                                            if($Page=="BarangExpired"){
                                                                                                include "_Page/BarangExpired/ModalBarangExpired.php";
                                                                                            }else{
                                                                                                if($Page=="Jurnal"){
                                                                                                    include "_Page/Jurnal/ModalJurnal.php";
                                                                                                }else{
                                                                                                    if($Page=="BukuBesar"){
                                                                                                        include "_Page/BukuBesar/ModalBukuBesar.php";
                                                                                                    }else{
                                                                                                        if($Page=="NeracaSaldo"){
                                                                                                            include "_Page/NeracaSaldo/ModalNeracaSaldo.php";
                                                                                                        }else{
                                                                                                            if($Page=="LabaRugi"){
                                                                                                                include "_Page/LabaRugi/ModalLabaRugi.php";
                                                                                                            }else{
                                                                                                                if($Page=="RekapitulasiTransaksi"){
                                                                                                                    include "_Page/RekapitulasiTransaksi/ModalRekapitulasiTransaksi.php";
                                                                                                                }else{
                                                                                                                    if($Page=="Komisi"){
                                                                                                                        include "_Page/Komisi/ModalKomisi.php";
                                                                                                                    }else{
                                                                                                                        if($Page=="BagiHasil"){
                                                                                                                            include "_Page/BagiHasil/ModalBagiHasil.php";
                                                                                                                        }else{
                                                                                                                            if($Page=="TamplateWa"){
                                                                                                                                include "_Page/TamplateWa/ModalTamplateWa.php";
                                                                                                                            }else{
                                                                                                                                if($Page=="RencanaKirim"){
                                                                                                                                    include "_Page/RencanaKirim/ModalRencanaKirim.php";
                                                                                                                                }else{
                                                                                                                                    if($Page=="WhatsappChatBox"){
                                                                                                                                        include "_Page/WhatsappChatBox/ModalWhatsappChatBox.php";
                                                                                                                                    }else{
                                                                                                                                        if($Page=="SettingForm"){
                                                                                                                                            include "_Page/SettingForm/ModalSettingForm.php";
                                                                                                                                        }else{
                                                                                                                                    
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