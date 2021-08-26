<li class="nav-item">
    <a href="<?= base_url(); ?>" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('posit'); ?>" class="nav-link">
        <i class="nav-icon fas fa-plus-circle"></i>
        <p>
            Pos IT
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('pegawai'); ?>" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Pegawai
        </p>
    </a>
</li>
<!-- <li class="nav-item">
    <a href="<?= base_url('pc'); ?>" class="nav-link">
        <i class="nav-icon fas fa-laptop"></i>
        <p>
            PC/Laptop
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-mouse"></i>
        <p>
            Accessories
        </p>
    </a> -->
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('laporan/harian'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Harian</p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bulanan</p>
            </a>
        </li> -->
    </ul>
</li>

<?php if ($this->session->userdata('itusername') == "admin") { ?>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
                Database
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('administrator/users'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                </a>
            </li>
            <!-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bulanan</p>
            </a>
        </li> -->
        </ul>
    </li>
<?php } ?>
<li class="nav-item">
    <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
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