<header class="main-header">
   <!-- Logo -->
   <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIPEKEN</b></span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
            <!-- Notifications: style can be found in dropdown.less -->
            <?php if ($user['level'] == 'Admin') { ?>
               <li class="dropdown notifications-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-bell-o"></i>
                     <span class="label label-warning">
                        <?php
                        get_instance()->load->helper('sistem');
                        echo anyar();
                        ?>
                     </span>
                  </a>
                  <ul class="dropdown-menu">
                     <?php get_instance()->load->helper('sistem');
                     if (anyar() == 0) { ?>
                        <li class="header">Tidak Ada Order Pemeliharaan Baru</li>
                     <?php } else { ?>
                        <li class="header">Ada <?= anyar(); ?> Order Pemeliharaan Baru</li>
                     <?php } ?>
                     <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                           <?php get_instance()->load->helper('sistem');
                           $no = 0;
                           foreach (order_baru() as $anyar) { ?>
                              <li>
                                 <a href="<?= base_url('order') ?>">
                                    <i class="fa fa-user text-aqua"></i> <?= $anyar->ket_rusak ?>
                                 </a>
                              </li>
                           <?php if ($no == 5) {
                                 break;
                              }
                           } ?>
                        </ul>
                     </li>
                     <li class="footer"><a href="<?= base_url('order') ?>">View all</a></li>
                  </ul>
               </li>
            <?php } ?>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php if ($user['level'] == 'Admin' && $user['jenis_kelamin'] == 'Laki-laki') { ?>
                     <img src="<?= base_url() ?>assets/admin/img/user-7.png" class="user-image" alt="User Image">
                  <?php } elseif ($user['level'] == 'Admin' && $user['jenis_kelamin'] == 'Perempuan') { ?>
                     <img src="<?= base_url() ?>assets/admin/img/user-8.png" class="user-image" alt="User Image">
                  <?php } elseif ($user['level'] == 'Pengemudi' && $user['jenis_kelamin'] == 'Laki-laki') { ?>
                     <img src="<?= base_url() ?>assets/admin/img/user-9.png" class="user-image" alt="User Image">
                  <?php } else { ?>
                     <img src="<?= base_url() ?>assets/admin/img/user-0.png" class="user-image" alt="User Image">
                  <?php } ?>
                  <span class="hidden-xs"><?= $user['nama']; ?></span>
               </a>
               <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     <?php if ($user['level'] == 'Admin' && $user['jenis_kelamin'] == 'Laki-laki') { ?>
                        <img src="<?= base_url() ?>assets/admin/img/user-7.png" class="img-circle" alt="User Image">
                     <?php } elseif ($user['level'] == 'Admin' && $user['jenis_kelamin'] == 'Perempuan') { ?>
                        <img src="<?= base_url() ?>assets/admin/img/user-8.png" class="img-circle" alt="User Image">
                     <?php } elseif ($user['level'] == 'Pengemudi' && $user['jenis_kelamin'] == 'Laki-laki') { ?>
                        <img src="<?= base_url() ?>assets/admin/img/user-9.png" class="img-circle" alt="User Image">
                     <?php } else { ?>
                        <img src="<?= base_url() ?>assets/admin/img/user-0.png" class="img-circle" alt="User Image">
                     <?php } ?>
                     <br> <br>
                     <p>
                        <?= $user['nama']; ?> - <?php if ($user['level'] == 'Pengemudi') { ?>
                           <?= $user['level']; ?></a>
                        <?php } else { ?>
                           Kasubbag Umum
                        <?php } ?>
                     </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                     <div class="pull-left">
                        <a href="<?= base_url('user') ?>" class="btn btn-default btn-flat">Profil</a>
                     </div>
                     <div class="pull-right">
                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Keluar</a>
                     </div>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </nav>
</header>