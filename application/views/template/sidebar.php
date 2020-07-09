<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
          <div class="sidebar-brand-text mx-3"><img src="<?= base_url('assets/img/logo.bmp'); ?>" alt="logo" width="200px"></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/home') ?>">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Kelola User -->
     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/kelola_user') ?>">
               <i class="fas fa-fw fa-user"></i>
               <span>Kelola User</span>
          </a>
     </li>

     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/kelola_group') ?>">
               <i class="fas fa-fw fa-users"></i>
               <span>Group Input</span>
          </a>
     </li>

     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/kelola_bahan_baku') ?>">
               <i class="fas fa-fw fa-question-circle"></i>
               <span>Question Input</span>
          </a>
     </li>

     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/kelola_bahan_baku') ?>">
               <i class="fas fa-fw fa-question"></i>
               <span>Question type Input</span>
          </a>
     </li>

     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/kelola_bahan_baku') ?>">
               <i class="fas fa-fw fa-poll-h"></i>
               <span>Survey tittle android/ios</span>
          </a>
     </li>

     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/kelola_bahan_baku') ?>">
               <i class="fas fa-fw fa-database"></i>
               <span>View raw data</span>
          </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Logout -->
     <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout') ?>">
               <i class="fas fa-fw fa-window-close"></i>
               <span>Logout</span></a>
     </li>
     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

</ul>
<!-- End of Sidebar -->