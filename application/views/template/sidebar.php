<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-danger">
  <!-- Brand Logo -->
  <a href="<?php echo base_url() ?>" class="brand-link navbar-danger">
    <img src="<?php echo base_url('assets/AdminLTE/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>E-Pasar</b> Dev</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/AdminLTE/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata("user"); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="<?php echo site_url('dashboard'); ?>" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-store-alt"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('administrator/transaksi'); ?>" class="nav-link active">
                <i class="far fas fa-shopping-cart nav-icon"></i>
                <p>Penjualan</p>
                <span class="right badge badge-danger">New</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Master
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">3</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('administrator/barang'); ?>" class="nav-link">
                <i class="far fas fa-briefcase nav-icon"></i>
                <p>Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('administrator/toko'); ?>" class="nav-link">
                <i class="far fas fa-store-alt nav-icon"></i>
                <p>Toko</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('administrator/kategori'); ?>" class="nav-link">
                <i class="far fas fa-list nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-lock"></i>
            <p>
              Private
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://dashboard.tawk.to/#/chat" target="_blank" class="nav-link">
                <i class="far fas fa-comments nav-icon"></i>
                <p>Live Chat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('administrator/ongkir'); ?>" class="nav-link">
                <i class="far fas fa-truck nav-icon"></i>
                <p>Ongkir</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('administrator/user'); ?>" class="nav-link">
                <i class="far fas fa-user-lock nav-icon"></i>
                <p>User</p>
              </a>
            </li>
          </ul>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>