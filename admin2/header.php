<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="produk.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="config.php?logout=yes" class="nav-link">Logout</a>
        </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin/index3.html" class="brand-link">
      <img src="resource/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin SISku</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <?php

      $email_admin = $_SESSION['email_admin'];
      $query = "select * from admin where email_admin = '$email_admin'";
      $rows = mysqli_query($con, $query);
      while ($row = mysqli_fetch_array($rows)) {

      ?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="image/foto_admin/<?php echo $row['foto_admin']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['nama_admin']?></a>
        </div>
      </div>
    <?php } ?>

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
          <li class="nav-item <?php echo $menuMaster; ?>">
            <a href="#" class="nav-link <?php echo $menuMA; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="pelanggan.php" class="nav-link <?php echo $menuPelanggan; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Pelanggan</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="admin.php" class="nav-link <?php echo $menuAdmin; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="keranjang.php" class="nav-link <?php echo $menuKeranjang; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Keranjang</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="slider.php" class="nav-link <?php echo $menuSlider; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo $menuProduk; ?>">
            <a href="#" class="nav-link <?php echo $menuPdA; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="produk.php" class="nav-link <?php echo $menuPProduk; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="gambar-produk.php" class="nav-link <?php echo $menuGambarProduk; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Gambar Produk</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="produk-kategori.php" class="nav-link <?php echo $menuProdukKategori; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Produk Kategori</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="kategori.php" class="nav-link <?php echo $menuKategori; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo $menuPemesanan; ?>">
            <a href="#" class="nav-link <?php echo $menuPA; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Pemesanan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="pemesanan.php" class="nav-link <?php echo $menuPPemesanan; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Pemesanan</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="pemesanan-detail.php" class="nav-link <?php echo $menuPemesananDetail; ?>">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Pemesanan Detail</p>
                </a>
              </li>
            </ul>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tabel Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tabel Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <div>

    <script type="text/javascript">
      
    </script>