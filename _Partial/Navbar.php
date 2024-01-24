<header id="header" class="header fixed-top d-flex align-items-center landing_background">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/<?php echo "$logo"; ?>" alt="">
            <span class="d-none d-lg-block text-white"><?php echo "$title_page"; ?></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div>
    <div class="search-bar">
        <form action="index.php?Page=Help&Sub=HelpHome" class="search-form d-flex align-items-center" method="POST">
            <input type="text" name="keyword" placeholder="Cari Bantuan" title="Cari Bantuan">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="javascript:void(0);">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <?php
                        if(!empty($JumlahNotifikasi)){
                            echo '<span class="badge bg-danger rounded-pill badge-number">'.$JumlahNotifikasi.'</span>';
                        }
                    ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        <?php
                            if(!empty($JumlahNotifikasi)){
                                echo 'Anda Memiliki '.$JumlahNotifikasi.' Pemberitahuan';
                            }else{
                                echo 'Tidak Ada Pemberitahuan<br>';
                                echo '<small><a href="index.php?Page=Notifikasi">Lihat Semua Pemberitahuan</a></small>';
                            }
                        ?>
                    </li>
                    <?php
                        if(!empty($JumlahNotifikasi)){
                            //Looping Notifikasi
                            $QryNotifikasi = mysqli_query($Conn, "SELECT*FROM notifikasi WHERE id_akses='$SessionIdAkses' AND status_notifikasi='Pending' ORDER BY id_notifikasi DESC LIMIT 10");
                            while ($DataNotifikasi = mysqli_fetch_array($QryNotifikasi)) {
                                $id_notifikasi= $DataNotifikasi['id_notifikasi'];
                                $datetime_notifikasi= $DataNotifikasi['datetime_notifikasi'];
                                $kategori_notifikasi= $DataNotifikasi['kategori_notifikasi'];
                                $notifikasi= $DataNotifikasi['notifikasi'];
                                $status_notifikasi= $DataNotifikasi['status_notifikasi'];
                                echo '<li><hr class="dropdown-divider"></li>';
                                echo '<li class="notification-item">';
                                echo '  <i class="bi bi-check-circle text-success"></i>';
                                echo '  <div>';
                                echo '      <h4><a href="index.php?Page=Notifikasi">'.$kategori_notifikasi.'</a></h4>';
                                echo '      <p>'.$notifikasi.'</p>';
                                echo '  </div>';
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </li>
            
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/User/<?php echo $SessionGambar;?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $SessionNama;?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo $SessionNama;?></h6>
                        <span><?php echo $SessionAkses;?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile">
                            <i class="bi bi-person"></i>
                            <span>Profile Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php
                        if($SessionAkses!=="Anggota"){
                            echo '<li>';
                            echo '  <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile&Sub=EditProfile&id_akses='.$SessionIdAkses.'">';
                            echo '      <i class="bi bi-gear"></i>';
                            echo '      <span>Edit Profile</span>';
                            echo '  </a>';
                            echo '</li>';
                        }else{
                            echo '<li>';
                            echo '  <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile&Sub=EditProfileAnggota&id_akses_anggota='.$SessionIdAksesAnggota.'">';
                            echo '      <i class="bi bi-gear"></i>';
                            echo '      <span>Edit Profile</span>';
                            echo '  </a>';
                            echo '</li>';
                        }
                    ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <?php
                        if($SessionAkses!=="Anggota"){
                            echo '<li>';
                            echo '  <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile&Sub=ChangePassword&id_akses='.$SessionIdAkses.'">';
                            echo '      <i class="bi bi-key"></i>';
                            echo '      <span>Ganti Password</span>';
                            echo '  </a>';
                            echo '</li>';
                        }else{
                            echo '<li>';
                            echo '  <a class="dropdown-item d-flex align-items-center" href="index.php?Page=MyProfile&Sub=ChangePasswordAnggota&id_akses='.$SessionIdAksesAnggota.'">';
                            echo '      <i class="bi bi-key"></i>';
                            echo '      <span>Ganti Password</span>';
                            echo '  </a>';
                            echo '</li>';
                        }
                    ?>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="index.php?Page=Help&Sub=HelpHome">
                            <i class="bi bi-question-circle"></i>
                            <span>Butuh Bantuan?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>