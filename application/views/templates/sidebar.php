    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WAHYU FR</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Melakukan Query Menu -->
      <?php 

        // Masukkan role_id kedalam $role_id
        $role_id = $this->session->userdata('role_id');

        // Lakukan JOIN antara Tabel user_menu dan Tabel User_access_menu
        $queryMenu = " SELECT `user_menu`.`id`, `menu`
                       FROM `user_menu` JOIN `user_access_menu`
                       ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                       WHERE `user_access_menu`.`role_id` = $role_id
                       ORDER BY `user_access_menu`.`menu_id` ASC
                      ";
        
        // Masukkan hasil dari JOIN tabel user_menu dan tabel User_access_menu ke $menu
        $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- LOOPING UNTUK MENU DISINI -->
      <?php foreach ($menu as $m) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          <?= $m['menu']; ?>
        </div>


        <!-- LOOPING UNTUK SUB MENU SESUAI MENU -->
        <?php 
          // masukkan $m['id'] kedalam $menuId
          $menuId = $m['id'];

          // Lakukan Query antara Tabel User Menu dan Tabel Sub Menu
          $querySubMenu = " SELECT *
                            FROM `user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                          ";

          // Masukkan hasil GABUNGAN dari Tabel User Menu dan Tabel User Sub Menu
          $subMenu = $this->db->query($querySubMenu)->result_array();
          
        ?>
          <!-- Proses Looping untuk Sub Menu yang sesuai dengan menu -->
          <?php foreach($subMenu as $sm) : ?>

          <!-- Kasi Kondisi dimana menu yang dipilih maka menu tersebut berlabel Aktif -->
          <?php if ($title == $sm['title']) : ?>

              <li class="nav-item active">

              <?php else : ?>

              <li class="nav-item">

          <?php endif; ?>

              <!-- Proses Looping Submenu nya disini -->
                  <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                  <i class="<?= $sm['icon']?>"></i>
                  <span><?= $sm['title']?></span></a>
              </li>

          <?php endforeach; ?>

          <!-- Divider -->
          <hr class="sidebar-divider mt-3">

      <?php endforeach; ?>

      <!-- logout -->
      <div class="sidebar-heading">
        Logout
      </div>

      <!-- Menu - Logout -->
      <li class="nav-item">
        <a class="nav-link"  href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout User</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->