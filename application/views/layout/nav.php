<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <style type="text/css">
      .skin-blue-light .sidebar-menu>li>a {
         border-left: 3px solid transparent;
         font-weight: 400;
      }
   </style>
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <?php if ($user['level'] == 'Admin' && $user['jenis_kelamin'] == 'Laki-laki') { ?>
               <img src="<?= base_url() ?>assets/admin/img/user-7.png" class="user-image" alt="User Image">
            <?php } elseif ($user['level'] == 'Admin' && $user['jenis_kelamin'] == 'Perempuan') { ?>
               <img src="<?= base_url() ?>assets/admin/img/user-8.png" class="user-image" alt="User Image">
            <?php } elseif ($user['level'] == 'Pengemudi' && $user['jenis_kelamin'] == 'Laki-laki') { ?>
               <img src="<?= base_url() ?>assets/admin/img/user-9.png" class="user-image" alt="User Image">
            <?php } else { ?>
               <img src="<?= base_url() ?>assets/admin/img/user-0.png" class="user-image" alt="User Image">
            <?php } ?>
         </div>
         <div class="pull-left info">
            <p><?= $user['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> <?= $user['level']; ?></a>
         </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="header">DAFTAR MENU</li>
         <?php if ($user['level'] == 'Admin') { ?>
            <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
               <a href="<?= base_url('dashboard') ?>">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  <span class="pull-right-container">
                     <i class="fa pull-right"></i>
                  </span>
               </a>
            </li>
         <?php } ?>
         <li <?= $this->uri->segment(1) == 'order' ? 'class="active"' : '' ?>>
            <a href="<?= base_url('order') ?>">
               <i class="fa fa-list-alt"></i> <span>Data Order</span>
               <span class="pull-right-container">
               </span>
            </a>
         </li>
         <?php if ($user['level'] == 'Admin') { ?>
            <li <?= $this->uri->segment(1) == 'kardek' ? 'class="active"' : '' ?>>
               <a href="<?= base_url('kardek') ?>">
                  <i class="fa fa-book"></i> <span>Data Kardex</span>
                  <span class="pull-right-container">
                  </span>
               </a>
            </li>
            <li <?= $this->uri->segment(1) == 'pengemudi' ? 'class="active"' : '' ?>>
               <a href="<?= base_url('pengemudi') ?>">
                  <i class="fa fa-user"></i> <span>Data Pengemudi</span>
                  <span class="pull-right-container">
                  </span>
               </a>
            </li>
            <li <?= $this->uri->segment(1) == 'kendaraan' ? 'class="active"' : '' ?>>
               <a href="<?= base_url('kendaraan') ?>">
                  <i class="fa fa-truck"></i> <span>Data Kendaraan</span>
                  <span class="pull-right-container">
                  </span>
               </a>
            </li>
            <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
               <a href="<?= base_url('user') ?>">
                  <i class="fa fa-users"></i> <span>Data Pengguna</span>
                  <span class="pull-right-container">
                  </span>
               </a>
            </li>
            <li <?= $this->uri->segment(1) == 'bengkel' ? 'class="active"' : '' ?>>
               <a href="<?= base_url('bengkel') ?>">
                  <i class="fa fa-gears"></i> <span>Data Bengkel</span>
                  <span class="pull-right-container">
                  </span>
               </a>
            </li>
         <?php } ?>
         <?php if ($user['level'] == 'Pengemudi') { ?>
            <li class="treeview <?= $this->uri->segment(1) == 'service' || $this->uri->segment(1) == 'nota' || $this->uri->segment(1) == 'bengkel' ? 'active' : '' ?>">
               <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Service</span>
                  <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                  </span>
               </a>
               <ul class="treeview-menu">
                  <li <?= $this->uri->segment(1) == 'service' ? 'class="active"' : '' ?>>
                     <a href="<?= base_url('service') ?>">
                        <i class="fa fa-bookmark"></i> <span>Data Service</span>
                        <span class="pull-right-container">
                        </span>
                     </a>
                  </li>
                  <li <?= $this->uri->segment(1) == 'nota' ? 'class="active"' : '' ?>>
                     <a href="<?= base_url('nota') ?>">
                        <i class="fa fa-file-text-o"></i> <span>Data Nota</span>
                        <span class="pull-right-container">
                        </span>
                     </a>
                  </li>
                  <li <?= $this->uri->segment(1) == 'bengkel' ? 'class="active"' : '' ?>>
                     <a href="<?= base_url('bengkel') ?>">
                        <i class="fa fa-gears"></i> <span>Data Bengkel</span>
                        <span class="pull-right-container">
                        </span>
                     </a>
                  </li>
               </ul>
            </li>
         <?php } ?>
      </ul>
   </section>
   <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         <?= $title ?>
      </h1>
      <ol class="breadcrumb">
         <li <?= $this->uri->segment(1) == 'dashboard' ? 'class="active"' : '' ?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <?php $breadcrump = $this->uri->segment(1);
         if ($breadcrump != 'dashboard') { ?>
            <li class="active"><?= ucwords($this->uri->segment(1)); ?> </li>
            <?php if ($this->uri->segment(2)) { ?>
               <li class="active"><?= ucwords($this->uri->segment(2)); ?> </li>
         <?php
            }
         } ?>

      </ol>
   </section>

   <!-- Main content -->
   <section class="content">