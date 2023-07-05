<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('assets/') ?>images/shop.png" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Sarana Doa Bersama</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/images/profil/' . $akun['foto_profil']); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php if ($akun['id_akun']) { ?>
                    <a href="#" class="d-block"><?= $akun['nama_pengguna']; ?></a>
                <?php } else { ?>
                    <a href="<?= base_url('auth/logout/') ?>" id="autoKlik">Submit</a>
                    <script>
                        var button = document.getElementById("autoKlik");
                        setInterval(function() {
                            button.click();
                        }, 1000);
                    </script>
                <?php } ?>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard'); ?>" class="nav-link 
                        <?php if ($active == 'Dashboard') {
                            echo 'active';
                        }; ?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Dashboard
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <?php if ($akun['level'] == 'Administrator') { ?>
                    <li class="nav-header">Manajemen Akun</li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/akun/'); ?>" class="nav-link 
                    <?php if ($active == 'Akun') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Data Pengguna
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Manajemen Karyawan</li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/jabatan/'); ?>" class="nav-link 
                    <?php if ($active == 'Jabatan') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-star"></i>
                            <p>
                                Jabatan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/karyawan/'); ?>" class="nav-link 
                    <?php if ($active == 'Karyawan') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Karyawan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/gaji/'); ?>" class="nav-link 
                    <?php if ($active == 'Gaji') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Penggajian
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/presensi/'); ?>" class="nav-link 
                    <?php if ($active == 'Presensi') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Presensi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/lembur/'); ?>" class="nav-link 
                    <?php if ($active == 'Lembur') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Lembur
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Pencatatan Keuangan</li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/pemasukan/'); ?>" class="nav-link 
                    <?php if ($active == 'Pemasukan') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Pemasukan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin/pengeluaran/'); ?>" class="nav-link 
                    <?php if ($active == 'Pengeluaran') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Pengeluaran
                            </p>
                        </a>
                    </li>
                <?php } elseif ($akun['level'] == 'Admin Lapangan') { ?>
                    <li class="nav-header">Manajemen Karyawan</li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin_lapangan/karyawan/'); ?>" class="nav-link 
                    <?php if ($active == 'Karyawan') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Karyawan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin_lapangan/presensi/'); ?>" class="nav-link 
                    <?php if ($active == 'Presensi') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Presensi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin_lapangan/lembur/'); ?>" class="nav-link 
                    <?php if ($active == 'Lembur') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-user-check"></i>
                            <p>
                                Lembur
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Pencatatan Keuangan</li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin_lapangan/pemasukan/'); ?>" class="nav-link 
                    <?php if ($active == 'Pemasukan') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Pemasukan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?= base_url('admin_lapangan/pengeluaran/'); ?>" class="nav-link 
                    <?php if ($active == 'Pengeluaran') {
                        echo 'active';
                    }; ?>">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Pengeluaran
                            </p>
                        </a>
                    </li>
                <?php } else { ?>
                <?php }  ?>
                <li class="nav-header">Session</li>
                <li class="nav-item ">
                    <a href="<?= base_url('auth/logout/'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">